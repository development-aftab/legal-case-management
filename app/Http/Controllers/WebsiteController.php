<?php

namespace App\Http\Controllers;

use App\PaymentMethod;
use Illuminate\Http\Request;
use App\User;
use Dompdf\Dompdf;
use App\CaseTag;
use App\Role;
use App\CaseParalegal;
use App\SeniorCounsel;
use App\CaseTypeOfMatter;
use App\CaseSeniorCounsel;
use App\CaseEventMention;
use App\CaseKingCounsel;
use App\CaseJuniorAttorney;
use App\CaseJuniorCounsel;
use App\KingCounsel;
use App\TypeOfMatter;
use App\Accounting;
use App\Originate;
use App\CaseFile;
use App\CaseInvoice;
use App\BillOfCost;
use App\CaseOriginate;
use App\OriginatingProcessed;
use Storage;
use setasign\Fpdi\Fpdi;
use Mail;
use PDF;
use Auth;
use Webklex\PDFMerger\Facades\PDFMergerFacade as PDFMerger;
class WebsiteController extends Controller
{
    public function __construct()
    {
        $this->genrateToken();
    }
    public function index(){
        return view('website.index');
    }
    public function attorneyAssociateStatus($id=null,$status=null) {
        if (User::where('id',$id)->update(['status'=>$status])) {
            return back()->with('flash_message', 'Status Updated!');
        }
        return response(view('403'), 403);
    }
    public function attorneyAssociateDelete($id=null,$delete_status=null) {
        if (User::where('id',$id)->update(['delete_status'=>$delete_status])) {
            return back()->with('flash_message', 'Delete Success!');
        }
        return response(view('403'), 403);
    }

    public function  filter(Request $request,$name=null){
        if($name==null || $name=='clear_filter' || $name=='admin' || $name=='user'){
            return redirect(url('attorneyAssociate/attorney-associate'));
        }else{
            $attorneyassociate = User::whereHas(
                'roles', function($q) use($name){
                $q->where('name', $name);
            }
            )->where('delete_status',1)->orderBy('id', 'DESC')->paginate(25);
            $roles = Role::whereBetween('id', [3, 5])->get();
            $attorney = User::whereHas(
                'roles', function($q){
                $q->where('name', 'attorney');
            }
            )->where('delete_status',1)->orderBy('id', 'DESC')->get();
            $filter=$name;
            return view('attorneyAssociate.attorney-associate.index', compact('attorneyassociate', 'attorney', 'roles','filter'));
        }

    }//end filterRole function.
    public function allFilter(Request $request,$name=null){
        if($name==null || $name=='clear_filter' || $name=='admin' || $name=='user'){
            return redirect(url('users'));
        }else{
            $users = User::whereHas(
                'roles', function($q) use($name){
                $q->where('name', $name);
            }
            )->where('delete_status',1)->orderBy('id', 'DESC')->paginate(25);
            $roles = Role::whereNotIn('id', [1, 2])->get();
            $filter=$name;
            return view('users.index',compact('users','roles','filter'));
        }
    }//end filterRole function.
    public function createCaseFile($clientId=null){
        // $attorneyassociates = User::whereHas(
        //     'roles', function($q){
        //         $q->whereIn('name', ['attorney', 'associate' ,'intern']);
        //     }
        // )->where('delete_status',1)->get();
        // $seniorCounsels = SeniorCounsel::get();
        // $kingCounsels = KingCounsel::get();
        $typeOfMatters = TypeOfMatter::get();
        $originates = Originate::get();
        $seniorCounsels = User::whereHas(
            'roles', function($q){
            $q->whereIn('name', ['Attorney','Intern']);
        }
        )->whereNotIn('id',[Auth::id()])->where('delete_status',1)->get();
        $kingCounsels = User::whereHas(
            'roles', function($q){
            $q->whereIn('name', ['Attorney','Intern']);
        }
        )->whereNotIn('id',[Auth::id()])->where('delete_status',1)->get();
        $ChambersManagers = User::whereHas(
            'roles', function($q){
            $q->where('name', 'Chambers Manager');
        }
        )->where('delete_status',1)->get();
        $Paralegals = User::whereHas(
            'roles', function($q){
            $q->whereIn('name', ['Attorney','Intern']);
        }
        )->whereNotIn('id',[Auth::id()])->where('delete_status',1)->get();
        $juniorCounsels = User::whereHas(
            'roles', function($q){
            $q->whereIn('name', ['Attorney','Intern']);
        }
        )->whereNotIn('id',[Auth::id()])->where('delete_status',1)->get();
        return view('caseFile.case-file.create', compact('seniorCounsels', 'kingCounsels','juniorCounsels', 'typeOfMatters', 'clientId','originates','ChambersManagers','Paralegals'));
    }
    public function editCaseFile($casefileId=null){
        $attorneyassociates = User::whereHas(
            'roles', function($q){
            $q->whereIn('name', ['attorney', 'associate','intern']);
        }
        )->where('delete_status',1)->get();
        $casefile = CaseFile::FindorFail($casefileId);
        $seniorCounsels = User::whereHas(
            'roles', function($q){
            $q->where('name', 'Senior Counsel');
        }
        )->where('delete_status',1)->get();
        $casetags = CaseTag::get();
        $kingCounsels = User::whereHas(
            'roles', function($q){
            $q->where('name', 'King Counsel');
        }
        )->where('delete_status',1)->get();
        $ChambersManagers = User::whereHas(
            'roles', function($q){
            $q->where('name', 'Chambers Manager');
        }
        )->where('delete_status',1)->get();
        $Paralegals = User::whereHas(
            'roles', function($q){
            $q->where('name', 'Paralegal');
        }
        )->where('delete_status',1)->get();
        $juniorCounsels = User::whereHas(
            'roles', function($q){
            $q->where('name', 'Junior Counsel');
        }
        )->where('delete_status',1)->get();
        $typeOfMatters = TypeOfMatter::get();
        $originates = Originate::get();
        return view('dashboard.edit_casefile', compact('casefileId', 'juniorCounsels','Paralegals','ChambersManagers','casetags', 'casefile', 'attorneyassociates','seniorCounsels','kingCounsels','typeOfMatters','originates'));
    }
    public function updateCaseFile(Request $request){
        extract($request->all());
        $case = CaseFile::find($id);
        if ($request->hasFile('retainer_agreement')){
            $retainer_agreement = Storage::disk('website')->put('retainer_agreement', $request->retainer_agreement);
            Storage::disk('website')->delete($case->retainer_agreement);
        } else {
            $retainer_agreement = $case->retainer_agreement;
        }
        $requestData = ['name_of_parties'=>$name_of_parties,'judge_name'=>$judge_name,'case_number'=>$case_number, 'retainer_agreement'=>$retainer_agreement, 'case_condition'=>$case_condition];
        CaseFile::where('id' ,$id)->update($requestData);
        CaseTypeOfMatter::where('case_id', $id)->delete();
        if (is_array($request->type_of_matter_id)) {
            foreach ($request->type_of_matter_id as $value) {
                CaseTypeOfMatter::create([
                    'type_of_matter_id' => $value,
                    'case_id' => $id,
                ]);
            }
        }
        CaseKingCounsel::where('case_id', $id)->delete();
        if (is_array($request->king_counsel_id)) {
            foreach ($request->king_counsel_id as $value) {
                CaseKingCounsel::create([
                    'king_counsel_id' => $value,
                    'case_id' => $id,
                ]);
            }
        }
        CaseSeniorCounsel::where('case_id', $id)->delete();
        if (is_array($request->senior_counsel_id)) {
            foreach ($request->senior_counsel_id as $value) {
                CaseSeniorCounsel::create([
                    'senior_counsel_id' => $value,
                    'case_id' => $id,
                ]);
            }
        }
        CaseJuniorAttorney::where('case_id', $id)->delete();
        if (is_array($request->junior_attorney_id)) {
            foreach ($request->junior_attorney_id as $value) {
                CaseJuniorAttorney::create([
                    'junior_attorney_id' => $value,
                    'case_id' => $id,
                ]);
            }
        }
        return back()->with('flash_message', 'Case File Update!');
    }
    public function originatingProcess($id=null){
        // $client = CaseFile::findOrFail($id);
        $Originate = CaseOriginate::where('id',$id)->first();
        $Processed = OriginatingProcessed::orderBy('id','desc')->where('originate_id',$Originate->id)->get();
        $attorneyassociates = User::whereHas(
            'roles', function($q){
            $q->whereIn('name', ['attorney', 'associate' ,'intern']);
        }
        )->where('delete_status',1)->get();
        $case = Casefile::FindOrFail($id);
        $client_id = $case->client_id;
        $client = User::findOrFail($client_id);
        $attorney = $client->attorney_associate_id;
        // $Processed->where('form_id','1')->count();
        // $client = CaseFile::with('CaseOriginate')->findOrFail($id);
        return view('dashboard.originating_process', compact('Originate','Processed','attorneyassociates','attorney'));
    }
    public function originatingProcessed(Request $request){
        $filrname =  $request->filrname;
        // OriginatingProcessed::where('originate_id',$request->originate_id)->where('form_id',$request->form_id)->delete();
        foreach ($request->data as $key => $value) {
            if (isset($value['id'])) {
                if (isset($value['image'])) {
                    $image = Storage::disk('website')->put('originating_processed',$value['image']);
                    OriginatingProcessed::where('id',$value['id'])->update(['originate_id'=>$value['originate_id'],'title'=>$value['title'],'form_id'=>$value['form_id'],'file'=>$image,'description'=>$value['description'],'date'=>$value['date']]);
                }else{

                    OriginatingProcessed::where('id',$value['id'])->update(['originate_id'=>$value['originate_id'],'title'=>$value['title'],'form_id'=>$value['form_id'],'description'=>$value['description'],'date'=>$value['date']]);
                }

            }else{

                $image = Storage::disk('website')->put('originating_processed',$value['image']);
                OriginatingProcessed::create(['originate_id'=>$value['originate_id'],'title'=>$value['title'],'form_id'=>$value['form_id'],'file'=>$image,'description'=>$value['description'],'date'=>$value['date']]);
            }
        }
        $OriginatingProcessed = OriginatingProcessed::where('originate_id',$request->originate_id)->where('form_id',$request->form_id)->get();
        return (string) view('website.ajax.form_div', compact('filrname','OriginatingProcessed'));
    }
    public function processBillOfCost(Request $request){
        extract($request->all());
        if ($case_id!=null){
            $caseOriginate = CaseOriginate::where('case_id',$case_id)->first();
            if ($caseOriginate!=null) {
                $caseOriginate_id = $caseOriginate->id;
                if($request->hasFile('file')){
                    $file = Storage::disk('website')->put('originating_processed', $request->file);
                }else{
                    $file = '';
                }
                $requestData = ['title'=>$title,'file'=>$file, 'date'=>$date, 'originate_id'=>$caseOriginate_id];
                OriginatingProcessed::create($requestData);
            }else{
                return back()->with('flash_message', 'You Are Not Select Originating Processed of This Case!');
            }

        }
        return back()->with('flash_message', 'Document Center added!');
    }//end processBillOfCost function
    public function originatingProcessedDestory($id=null)
    {
        OriginatingProcessed::destroy($id);
        return back()->with('flash_message', 'File Deleted Successfully!');
        return response(view('403'), 403);
    }
    public function billOfCostAjax(Request $request){
        // return $attorney_fees;
        if ($request->type=='workdone'){
            return  $result = OriginatingProcessed::where('id', $request->id)->update(['description_workdone'=>$request->attorney_fees]);
        }elseif ($request->type=='attorney_fees'){
            return  $result = OriginatingProcessed::where('id', $request->id)->update(['attorney_fees'=>$request->attorney_fees]);
        }else{
            return  $result = OriginatingProcessed::where('id', $request->id)->update([ 'dibursements'=>$request->attorney_fees]);
        }
    }//end function trainEditModalAjax.

    public function originatingAjax(Request $request){
        try {
            $caseOriginate = CaseOriginate::where('id',$request->originate_id)->first();
            $folder = $caseOriginate->getCaseDetail->name_of_parties;
            $image = Storage::disk('website')->put($folder.'/Documents',$request->file);
            $this->uploadToDropBox($folder.'/Documents',$request->file,array_reverse(explode('/', $image))[0],$this->accessToken);
            $OriginatingProcessed = OriginatingProcessed::create(['originate_id'=>$request->originate_id,'title'=>$request->title,'file'=>$image,'description'=>$request->description,'date'=>$request->date]);
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            \Log::error($e);
            return response()->json(['success' => false, 'error' => 'An error occurred while submitting the form.']);
        }
    }//end function trainEditModalAjax.
    public function originatingUpdateAjax(Request $request){
        $OriginatingProcessed = OriginatingProcessed::findOrFail($request->id);
        if ($request->hasFile('file')){
            $Originatingfile = Storage::disk('website')->put('originating_processed', $request->file);
            Storage::disk('website')->delete($OriginatingProcessed->file);
        }else{
            $Originatingfile  = $OriginatingProcessed->file;
        }//end if else.
        $OriginatingProcessed = OriginatingProcessed::where('id', $request->id)->update(['title'=>$request->title,'file'=>$Originatingfile,'description'=>$request->description,'date'=>$request->date]);
        return back()->with('flash_message', 'Document Center Updated!');
    }//end function trainEditModalAjax.
    public function generateMasterFile($case_file_id){
        $caseOriginates = CaseOriginate::where('case_id',$case_file_id)->get();
        return (string) view('website.ajax.generate_master_file_ajax',compact('caseOriginates'));
    }//end generateMasterFile function.

    public function getClient($client_id){
        $client = User::whereHas(
            'roles', function($q){
            $q->where('name', 'client');
        }
        )->orderBy('id', 'DESC')->where('attorney_associate_id', $client_id)->get();
        return (string) view('website.ajax.get_client_ajax',compact('client'));
    }
    public function getCase($case_id){
        // $client = User::whereHas(
        //     'roles', function($q){
        //     $q->where('name', 'client');
        // }
        // )->orderBy('id', 'DESC')->where('attorney_associate_id', $case_id)->get();
        $caseFile = CaseFile::findOrFail($case_id);
        return (string) view('website.ajax.get_case_ajax',compact('caseFile'));
    }
    function convertToPdfA($inputFile, $outputFile)
    {
        // Use Ghostscript to convert the PDF to PDF/A
        $ghostscriptCommand = "gs -dPDFA=2 -dBATCH -dNOPAUSE -sProcessColorModel=DeviceRGB -sDEVICE=pdfwrite -sPDFACompatibilityPolicy=1 -sOutputFile='{$outputFile}' '{$inputFile}'";
        shell_exec($ghostscriptCommand);
    }

    function previewMasterFiles(Request $request){
        // $caseOriginates = OriginatingProcessed::whereIn('id',$request->process_id)->get();
        // $oMerger = PDFMerger::init();
        // $delete_arr  =  [];
        // foreach ($caseOriginates as $key => $value) {
        //     $pdf = PDF::loadView('website.pdf.dynamic_pdf_title',['title'=>$value->title]);
        //     $pdf->save('website/'.$value->title.'.pdf')->setPaper('A4', 'landscape');
        //     $oMerger->addPDF('website/'.$value->title.'.pdf');
        //     $oMerger->addPDF('website' . '/' . $value->file, 'all');
        //     array_push($delete_arr,$value->title.'.pdf');
        // }
        // $oMerger->merge();
        // Storage::disk('website')->delete($delete_arr);
        // return $oMerger->stream('master_file');

        // IT IS RUN PROPER BUT NOT ACCEPT PDF THEN MODIFY PDF/A

        // $caseOriginates = OriginatingProcessed::whereIn('id',$request->process_id)->get();
        // $oMerger = PDFMerger::init();
        // $delete_arr  =  [];
        // foreach ($caseOriginates as $key => $value) {
        //     $pdf = PDF::loadView('website.pdf.dynamic_pdf_title',['title'=>$value->title]);
        //     $pdf->save('website/'.$value->title.'.pdf')->setPaper('A4', 'landscape');
        //     $oMerger->addPDF('website/'.$value->title.'.pdf', [1]);
        //     $oMerger->addPDF('website' . '/' . $value->file, 'all');
        //     array_push($delete_arr,$value->title.'.pdf');
        // }
        // $oMerger->merge();
        // Storage::disk('website')->delete($delete_arr);
        // return $oMerger->stream('master_file');


        $caseOriginates = OriginatingProcessed::whereIn('id', $request->process_id)->get();
        $oMerger = PDFMerger::init();
        $delete_arr = [];

        foreach ($caseOriginates as $key => $value) {
            $pdf = PDF::loadView('website.pdf.dynamic_pdf_title',['title'=>$value->title]);
            $pdf->save('website/'.$value->title.'.pdf')->setPaper('A4', 'landscape');
            // Convert the original PDF file to PDF/A format before adding to the merger
            $pdfAOutputFile = public_path('website/merge_files/' . $value->title . '.pdf');
            $this->convertToPdfA('website' . '/' . $value->file, $pdfAOutputFile);

            // Load the converted PDF/A file instead of the original PDF
            $oMerger->addPDF('website/'.$value->title.'.pdf');
            $oMerger->addPDF($pdfAOutputFile);

            array_push($delete_arr,$value->title.'.pdf');
        }

        $oMerger->merge();
        Storage::disk('website')->delete($delete_arr);
        return $oMerger->stream('master_file');

    }//end generateMasterFile function.
    public function getCountNotiCase(){
        $noti = CaseFile::where('case_noti',0)->count();
        $invoiceNoti = CaseInvoice::where('invoice_noti',0)->count();
        $billNoti = billOfCost::where('bill_noti',0)->count();
        $accountingNoti = Accounting::where('noti_status',0)->count();
        return response(['result'=>'success','noti'=>$noti, 'invoiceNoti'=>$invoiceNoti, 'billNoti'=>$billNoti , 'accountingNoti'=>$accountingNoti]);
    }
    public function getCaseNotification(Request $request){
        $caseNoti =  CaseFile::where('case_noti',0)->orderBy('id', 'DESC')->get();
        $invoiceNoti = CaseInvoice::where('invoice_noti',0)->orderBy('id', 'DESC')->get();
        $billNoti = billOfCost::where('bill_noti',0)->orderBy('id', 'DESC')->get();
        $accountingNoti = Accounting::where('noti_status',0)->orderBy('id', 'DESC')->get();
        return (string) view('website.ajax.case_notification',compact('caseNoti','invoiceNoti', 'billNoti','accountingNoti'));
    }
    public function viewRemove($id){
        return CaseFile::where('id',$id)->update(['case_noti'=>1]);
    }
    public function viewRemoveInvoice($id){
        return CaseInvoice::where('id',$id)->update(['invoice_noti'=>1]);
    }
    public function viewRemoveCost($id){
        return billOfCost::where('id',$id)->update(['bill_noti'=>1]);
    }
    public function viewRemoveAccounting($id){
        return Accounting::where('id',$id)->update(['noti_status'=>1]);
    }
    public function getCountAssignAttorney(){
        $assign = User::where('noti_status',0)->count();
        $event = CaseEventMention::where('case_event_noti',0)->count();
        $juniorCounsels = CaseJuniorCounsel::where('case_junior_status',0)->count();
        $seniorCounsel = CaseSeniorCounsel::where('case_senior_status',0)->count();
        $kingCounsel = CaseKingCounsel::where('case_king_status',0)->count();
        $paralegalCounsel = CaseParalegal::where('case_paralegal_status',0)->count();
        return response(['result'=>'success','assign'=>$assign, 'event'=>$event,'juniorCounsels'=>$juniorCounsels, 'seniorCounsel'=>$seniorCounsel,'kingCounsel'=>$kingCounsel,'paralegalCounsel'=>$paralegalCounsel]);
    }
    public function getAttorneyNotification(Request $request){
        $attorneyNoti =  User::where('noti_status',0)->where('attorney_associate_id',Auth::id())->orderBy('id', 'DESC')->get();
        $attorneyEventNoti =  CaseEventMention::where('case_event_noti',0)->where('user_id',Auth::id())->orderBy('id', 'DESC')->get();
        $juniorCounsels = CaseJuniorCounsel::where('junior_counsel_id',Auth::id())->where('case_junior_status',0)->orderBy('id','DESC')->get();
        $seniorCounsel = CaseSeniorCounsel::where('senior_counsel_id',Auth::id())->where('case_senior_status',0)->orderBy('id','DESC')->get();
        $kingCounsel = CaseKingCounsel::where('king_counsel_id',Auth::id())->where('case_king_status',0)->orderBy('id','DESC')->get();
        $paralegalCounsel = CaseParalegal::where('paralegal_id',Auth::id())->where('case_paralegal_status',0)->orderBy('id','DESC')->get();
        return (string) view('website.ajax.attorney_notification',compact('attorneyNoti','attorneyEventNoti','juniorCounsels','seniorCounsel','kingCounsel','paralegalCounsel'));
    }
    public function viewRemoveAssignAttorney($id){
        return User::where('id',$id)->update(['noti_status'=>1]);
    }
    public function viewRemoveEvent($id){
        return CaseEventMention::where('id',$id)->update(['case_event_noti'=>1]);
    }
    public function viewRemoveParalegalCounsel($id){
        return CaseParalegal::where('id',$id)->update(['case_paralegal_status'=>1]);
    }
    public function viewRemoveKingCounsel($id){
        return CaseKingCounsel::where('id',$id)->update(['case_king_status'=>1]);
    }
    public function viewRemoveSeniorCounsel($id){
        return CaseSeniorCounsel::where('id',$id)->update(['case_senior_status'=>1]);
    }
    public function viewRemoveJuniorCounsel($id){
        return CaseJuniorCounsel::where('id',$id)->update(['case_junior_status'=>1]);
    }
    public function checkEmail(Request $request){
        if (User::where('email', $request->email)->exists()){
            return 'yes';
        }else{
            return 'no';
        }
    }//end checkEmail function.
    public function fileMail(Request $request){
        $file = $request->input('file');
        $title = $request->input('title');
        $caseName = $request->input('case_name');
        $fileName = basename($file);
        $userIds = $request->input('user_id', []);
        $users = User::whereIn('id', $userIds)->get();
        $sharedUserId = User::findOrFail(Auth::id());
        foreach ($users as $user) {
            Mail::send('website.email_templates.file',['file' => $file, 'title' => $title, 'caseName' => $caseName,'user' => $user, 'fileName' => $fileName,'sharedUserId' => $sharedUserId],function($message) use($file, $fileName, $user){
                $message->to($user->email, $user->name)->cc('lcm@yopmail.com', 'Developer')->subject('LCM Shared File!');;
            });
        }
        return back()->with('flash_message', 'File sent successfully');
    }
    public function caseSeniorCounsel(){
        $seniorCounsels = CaseSeniorCounsel::where('senior_counsel_id', Auth::id())->get();
        if ($seniorCounsels->isNotEmpty()) {
            $senior = $seniorCounsels->pluck('case_id');
            $casefile = Casefile::whereIn('id', $senior)->orderBy('id', 'DESC')->get();
        } else {
            $casefile = "";
        }
        return view('dashboard.case_senior', compact('casefile'));
    }

    public function caseJuniorCounsel(){
        $juniorCounsels = CaseJuniorCounsel::where('junior_counsel_id', Auth::id())->get();
        if ($juniorCounsels->isNotEmpty()) {
            $junior = $juniorCounsels->pluck('case_id');
            $casefile = Casefile::whereIn('id', $junior)->orderBy('id', 'DESC')->get();
        } else {
            $casefile = "";
        }
        return view('dashboard.case_senior', compact('casefile'));
    }
    public function casekingCounsel(){
        $kingCounsels = CaseKingCounsel::where('king_counsel_id', Auth::id())->get();
        if ($kingCounsels->isNotEmpty()) {
            $king = $kingCounsels->pluck('case_id');
            $casefile = Casefile::whereIn('id', $king)->orderBy('id', 'DESC')->get();
        } else {
            $casefile = "";
        }
        return view('dashboard.case_senior', compact('casefile'));
    }
    public function caseParalegal(){
        $paralegals = CaseParalegal::where('paralegal_id', Auth::id())->get();
        if ($paralegals->isNotEmpty()) {
            $paralegal = $paralegals->pluck('case_id');
            $casefile = Casefile::whereIn('id', $paralegal)->orderBy('id', 'DESC')->get();
        } else {
            $casefile = "";
        }
        return view('dashboard.case_senior', compact('casefile'));
    }
//    Dropbox Api Token
    public function testing() {
        $appKey = 'e2msce0nbcipv89';
        $appSecret = '32rov02843t6txi';
        $redirectUri = 'https://lcm.thebackendprojects.com/access_token';

        $clientId = $appKey;
        $clientSecret = $appSecret;

        // Step 1: Redirect the user to Dropbox authorization page
        $authorizationUrl = 'https://www.dropbox.com/oauth2/authorize';
        $queryParams = http_build_query([
            'client_id' => $clientId,
            'response_type' => 'code',
//            'redirect_uri' => $redirectUri,
            'token_access_type' => 'offline',
        ]);
        $authorizationRedirectUrl = $authorizationUrl . '?' . $queryParams;

        return redirect($authorizationRedirectUrl);

        // Step 2: After the user grants access, Dropbox will redirect back to the redirect URI with a code parameter

        // Step 3: Exchange the authorization code for an access token
        $code = $_GET['code']; // Assuming the code is received as a query parameter

//
//        // Store the access token for later use
//        // You can save it in a database or session, depending on your needs
//
//        // Example: Save the access token in the session
//        session(['dropbox_access_token' => $accessToken]);
//
//        // Redirect the user to a success page or perform other actions
        return redirect('/success');
    }
    public function accessToken(){
        $tokenUrl = 'https://api.dropbox.com/oauth2/token';
        $postData = [
            'grant_type' => 'authorization_code',
            'code' => 'oAnrq614HWcAAAAAAAAAlwJ-p9O_21uKhL155po0Zcc',
            'client_id' => 'e2msce0nbcipv89',
            'client_secret' => '32rov02843t6txi',
//            'redirect_uri' => 'https://lcm.thebackendprojects.com/access_token',
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $tokenUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));

        return $response = curl_exec($ch);
        die;
        $error = curl_error($ch);
        curl_close($ch);

        if ($error) {
            // Handle curl error
            echo 'Curl error: ' . $error;
            return;
        }

        $responseData = json_decode($response, true);

        if (isset($responseData['error'])) {
            // Handle API error
            echo 'API error: ' . $responseData['error_description'];
            return;
        }

        if (!isset($responseData['access_token'])) {
            // Access token is not present in the response
            echo 'Access token not found in the response.';
            return;
        }

        return $accessToken = $responseData['access_token'];
    }
    public function refreshToken(){
        $tokenUrl = 'https://api.dropbox.com/oauth2/token';
        $postData = [
            'refresh_token' => env('DROPBOX_REFRESH_TOKEN'),
            'grant_type' => 'refresh_token',
            'client_id' => 'e2msce0nbcipv89',
            'client_secret' => '32rov02843t6txi',
//            'redirect_uri' => 'https://lcm.thebackendprojects.com/access_token',
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $tokenUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));

        $response = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);

        if ($error) {
            // Handle curl error
            echo 'Curl error: ' . $error;
            return;
        }

        $responseData = json_decode($response, true);

        if (isset($responseData['error'])) {
            // Handle API error
            echo 'API error: ' . $responseData['error_description'];
            return;
        }

        if (!isset($responseData['access_token'])) {
            // Access token is not present in the response
            echo 'Access token not found in the response.';
            return;
        }

        return $accessToken = $responseData['access_token'];
    }
//    End Dropbox Api Token
    public function financialReport(){
        $paymentMethod = PaymentMethod::get();
        $accounting = Accounting::get();
//        $casefiles = CaseFile::get();
        return view('dashboard.financial_report', compact('paymentMethod','accounting'));
    }
    public function phpCheck(){
        return phpinfo();
    }
}


