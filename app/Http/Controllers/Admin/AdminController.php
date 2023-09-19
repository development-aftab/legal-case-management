<?php

namespace App\Http\Controllers\Admin;

use App\BillOfCost;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\User;
use Dompdf\Dompdf;
use App\Role;
use App\PaymentMethod;
use App\CaseJuniorCounsel;
use App\Firm;
use App\CaseOriginate;
use App\CaseEventMention;
use App\AssignedAttorney;
use App\AssignedCase;
use App\Accounting;
use App\Letter;
use App\CourtAttendantsNote;
use App\KingCounsel;
use App\Order;
use App\CaseKingCounsel;
use App\CaseSeniorCounsel;
use App\Cheque;
use App\CaseTag;
use App\Allocatur;
use App\CaseFile;
use App\CaseChambersManager;
use App\TypeOfMatter;
use App\SeniorCounsel;
use App\CaseEvent;
use App\OriginatingProcessed;
use App\ClientAttitude;
use App\Category;
use App\CaseInvoice;
use Auth;
use Carbon\Carbon;
use PDF;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Mail;
use View;
use PhpWord;
class AdminController extends Controller
{
    public function __construct()
    {
        $this->genrateToken();
    }
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(){
        $userRole = Auth::user()->roles[0]->name;
        if ($userRole=='Senior Counsel' || $userRole=='Junior Counsel' || $userRole=='King Counsel' || $userRole=='Paralegal') {
            return redirect('case_management');
        }else{
            $perPage = 5;
            $attorneies = User::whereHas(
                'roles', function($q){
                    $q->where('name', 'attorney');
                }
            )->where('delete_status',1)->get();
            $allAttorney = $attorneies->count();
            $activeAttorney = $attorneies->where('status',1)->count();
            $associates = User::whereHas(
                'roles', function($q){
                    $q->where('name', 'associate');
                }
            )->get();
            $allAssociate = $associates->count();
            $activeAssociate = $associates->where('status',1)->count();
            $clients = User::whereHas(
                'roles', function($q){
                    $q->where('name', 'client');
                }
            )->get();
            $allClient = $clients->count();
            $activeClient = $clients->where('status',1)->count();
//            $casefile = CaseFile::with('originatingProcess.orignatingProcesseds')->get();


            if($userRole=='user'){
                $caseEvent = CaseEvent::with('caseEventMentions')->get();
                $casefile = CaseFile::with('originatingProcess.orignatingProcesseds')->get();
            }elseif($userRole=='secretary'){
                $caseEvent = CaseEvent::with('caseEventMentions')->get();
                $casefile = CaseFile::with('originatingProcess.orignatingProcesseds')->get();
            }else{
                $caseEventMentions = CaseEventMention::where('user_id',Auth::id())->pluck('case_event_id');
                $caseEvent = CaseEvent::whereIn('id',$caseEventMentions)->get();
                $attorney_id = Auth::id();
                $assigned = AssignedAttorney::where('new_attorney_id', $attorney_id)->first();
                if ($assigned != null) {
                    $attorney_id = $assigned->old_attorney_id;
                }
                $assigned_case_id = AssignedCase::where('new_attorney_id', $attorney_id)->first();
                $attorney_case_id = null;
                if ($assigned_case_id != null) {
                    $attorney_case_id = $assigned_case_id->old_attorney_id;
                }
                $casefile = User::with('clientCase')
                    ->where('attorney_associate_id', Auth::id())
                    ->orWhere('attorney_associate_id', $attorney_id)
                    ->when($attorney_case_id !== null, function ($query) use ($attorney_case_id) {
                        return $query->orWhere('attorney_associate_id', $attorney_case_id);
                    })
                    ->orderBy('id', 'DESC')
                    ->get();
            }
    //        $assignedCases = User::with('clientCase')->where('attorney_associate_id', Auth::id())->get();
            $attorneyassociate = User::whereHas(
                'roles', function($q){
                $q->whereIn('name', ['attorney', 'associate']);
            }
            )->orderBy('id', 'DESC')->paginate($perPage);
            $roles = Role::whereBetween('id', [3, 4])->get();
//            $client = User::whereHas(
//                'roles', function($q){
//                $q->where('name', 'client');
//            }
//            )->orderBy('id', 'DESC')->where('attorney_associate_id', Auth::id())->paginate($perPage);

            $attorney_id = Auth::id();
            $assigned = AssignedAttorney::where('new_attorney_id',$attorney_id)->first();
            if ($assigned!=null) {
                $attorney_id = $assigned->old_attorney_id;
            }
            $client = User::with('clientCase')->where('attorney_associate_id', $attorney_id)->orWhere('attorney_associate_id', $attorney_id)->orderBy('id','DESC')->get();
            return view('dashboard.index', compact('attorneies', 'client', 'roles', 'caseEvent', 'attorneyassociate', 'allAttorney', 'activeAttorney', 'associates', 'allAssociate', 'activeAssociate', 'clients', 'allClient', 'activeClient', 'casefile'));
        }//end if else.

    }
    public function attorneyAssociates(){
        // $roles = Role::whereNotIn('name',['admin','user','client', 'attorney', 'associate', 'secretary'])->orderBy('id','DESC')->get();
        $roles = User::whereHas(
                    'roles', function($q){
                        $q->whereNotIn('name', ['admin','user','client', 'attorney', 'associate', 'secretary']);
                    }
                )->orderBy('id', 'DESC')->get();
        return view('dashboard.attorney_associates', compact('roles'));
    }
    public function attorneyAssociatesCreate(){
        return view('dashboard.attorney_associates_create');
    }
    public function clients(){
        return view('dashboard.clients');
    }
    public function createInvoice($caseFileId=null){
        $casefile = CaseFile::where('id', $caseFileId)->get();
        $lcm = User::where('id', 2)->get();
//        $client = User::where('id', 'client_id')->get();
        return view('dashboard.create_invoice', compact('caseFileId', 'casefile', 'lcm'));
    }
    public function invoicePdf($id){
        $caseinvoice = CaseInvoice::findOrFail($id);
        $lcm = User::where('id', 2)->get();
//        $imagePath = public_path('website/assets/images/big_logo.png}}');
//        $imageData = "data:image/png;base64,". base64_encode(file_get_contents($imagePath));
//        $logo = ($imageData);
//        $imageData = file_get_contents($imagePath);
//        $logo = base64_encode($imageData);
//        return $pdf = View('website.pdf.invoice',['caseinvoice'=>$caseinvoice, 'lcm'=>$lcm]);
        $pdf = PDF::loadView('website.pdf.invoice',['caseinvoice'=>$caseinvoice, 'lcm'=>$lcm]);
        $fileName = 'Invoice';
        return $pdf->stream($fileName.'.pdf');
    }
    public function sample($id){
        $caseinvoice = CaseOriginate::findOrFail($id);
        $pdf = PDF::loadView('website.pdf.master_file');
        return $pdf->stream('ddsds' .'.pdf' ,['caseOriginates'=>$caseOriginates]);
    }
    // public function billOfCostPdf($id){
    //     $billofcost = BillOfCost::findOrFail($id);
    //     $lcm = User::where('id', 2)->get();
    //     $pdf = PDF::loadView('website.pdf.cost',['billofcost'=>$billofcost, 'lcm'=>$lcm]);
    //     $fileName = 'Cost';

    //     // Return the PDF as a download
    //     return $pdf->stream($fileName.'.pdf');
    // }

    public function billOfCostPdf(Request $request,$id)
    {

        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();
        $billofcost = BillOfCost::with('casefile.originatingProcess.orignatingProcesseds')->findOrFail($id);
        $lcm = User::where('id', 2)->get();
        $content = View::make('website.word.cost', ['billofcost'=>$billofcost, 'lcm'=>$lcm])->render();
        \PhpOffice\PhpWord\Shared\Html::addHtml($section, $content);
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save('billofcost.docx');
        return response()->download('billofcost.docx');



        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $content = View::make('website.word.cost', ['billofcost'=>$billofcost, 'lcm'=>$lcm])->render();
        \PhpOffice\PhpWord\Shared\Html::addHtml($section, $content);

        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save('billofcost.docx');

        return response()->download('billofcost.docx');
    }


    public function demo(){
        $pdf = PDF::loadView('website.pdf.demo')->setPaper('a4', 'landscape');
        $fileName = 'Demo';
        return $pdf->stream($fileName.'.pdf');
    }
    public function Invoice(){
        return view('dashboard.invoice');
    }
    public function createClients(){
        $attorneyassociates = User::whereHas(
            'roles', function($q){
                $q->whereIn('name', ['attorney', 'associate']);
            }
        )->get();
        $payments = PaymentMethod::get();
        $firms = Firm::get();
        $client_attitudes = ClientAttitude::get();
        return view('dashboard.create_clients', compact('attorneyassociates', 'payments', 'firms', 'client_attitudes'));
    }
    public function createCaseFile(){
        $attorneyassociates = User::whereHas(
            'roles', function($q){
                $q->whereIn('name', ['attorney', 'associate']);
            }
        )->get();
        // $seniorCounsels = SeniorCounsel::get();
        $kingCounsels = KingCounsel::get();
        $typeOfMatters = TypeOfMatter::get();
        return $seniorCounsels = User::whereHas(
            'roles', function($q){
                $q->where('name', 'Senior Counsel');
            }
        )->where('delete_status',1)->get();
        return view('dashboard.create_case_file', compact('attorneyassociates','seniorCounsels', 'kingCounsels', 'typeOfMatters'));
    }
    public function createCourtAttendantsNote($caseFileId=null){
        $categorys = category::get();
        return view('dashboard.create_court_attendants_notes', compact('categorys', 'caseFileId'));
    }
    public function caseManagement(Request $request){
        // $casefile = User::with('clientCase')->where('attorney_associate_id', Auth::id())->get();
        if(Auth::user()->hasRole('attorney')){
            if (!empty($keyword)) {
                $casefile = CaseFile::where('case_number', 'LIKE', "%$keyword%")
                ->orWhere('name_of_parties', 'LIKE', "%$keyword%")
                ->orWhere('instruction_attorney_id', 'LIKE', "%$keyword%")
                ->orWhere('junior_attorney_id', 'LIKE', "%$keyword%")
                ->orWhere('senior_counsel_id', 'LIKE', "%$keyword%")
                ->orWhere('king_counsel_id', 'LIKE', "%$keyword%")
                ->orWhere('retainer_agreement', 'LIKE', "%$keyword%")
                ->orWhere('type_of_matter_id', 'LIKE', "%$keyword%")
                ->orWhere('case_condition', 'LIKE', "%$keyword%")
                ->get();
            } else {
//                $attorney_id = Auth::id();
//                $assigned = AssignedAttorney::where('new_attorney_id',$attorney_id)->first();
//                if ($assigned!=null) {
//                   $attorney_id = $assigned->old_attorney_id;
//                }
//                $assigned_case_id = AssignedCase::where('new_attorney_id',$attorney_id)->first();
//                if ($assigned_case_id!=null) {
//                    $attorney_case_id = $assigned_case_id->old_attorney_id;
//                }
//                $casefile = User::with('clientCase')->where('attorney_associate_id', Auth::id())->orWhere('attorney_associate_id', $attorney_id)->orWhere('attorney_associate_id', $attorney_case_id)->orderBy('id','DESC')->get();
//                    $attorney = User::whereHas(
//                            'roles', function($q){
//                                $q->where('name', 'attorney');
//                            }
//                        )->orderBy('id', 'DESC')->get();
                $attorney_id = Auth::id();
                $assigned = AssignedAttorney::where('new_attorney_id', $attorney_id)->first();
                if ($assigned != null) {
                    $attorney_id = $assigned->old_attorney_id;
                }
                $assigned_case_id = AssignedCase::where('new_attorney_id', $attorney_id)->first();
                $attorney_case_id = null;
                if ($assigned_case_id != null) {
                    $attorney_case_id = $assigned_case_id->old_attorney_id;
                }
                $casefile = User::with('clientCase')
                    ->where('attorney_associate_id', Auth::id())
                    ->orWhere('attorney_associate_id', $attorney_id)
                    ->when($attorney_case_id !== null, function ($query) use ($attorney_case_id) {
                        return $query->orWhere('attorney_associate_id', $attorney_case_id);
                    })
                    ->orderBy('id', 'DESC')
                    ->get();
                $attorney = User::whereHas('roles', function ($q) {
                    $q->where('name', 'attorney');
                })
                    ->orderBy('id', 'DESC')
                    ->get();
            }
            return view('dashboard.case_management', compact('casefile','attorney','assigned_case_id'));
        }else if(Auth::user()->hasRole('intern')){
            if (!empty($keyword)) {
                $casefile = CaseFile::where('case_number', 'LIKE', "%$keyword%")
                ->orWhere('name_of_parties', 'LIKE', "%$keyword%")
                ->orWhere('instruction_attorney_id', 'LIKE', "%$keyword%")
                ->orWhere('junior_attorney_id', 'LIKE', "%$keyword%")
                ->orWhere('senior_counsel_id', 'LIKE', "%$keyword%")
                ->orWhere('king_counsel_id', 'LIKE', "%$keyword%")
                ->orWhere('retainer_agreement', 'LIKE', "%$keyword%")
                ->orWhere('type_of_matter_id', 'LIKE', "%$keyword%")
                ->orWhere('case_condition', 'LIKE', "%$keyword%")
                ->get();
            } else {
                $attorney_id = Auth::id();
                $assigned = AssignedAttorney::where('new_attorney_id',$attorney_id)->first();
                if ($assigned!=null) {
                   $attorney_id = $assigned->old_attorney_id;
                }
                $assigned_case_id = AssignedCase::where('new_attorney_id',$attorney_id)->first();

                $casefile = User::with('clientCase')->where('attorney_associate_id', Auth::id())->orWhere('attorney_associate_id', $attorney_id)->orderBy('id','DESC')->get();
                    $attorney = User::whereHas(
                            'roles', function($q){
                                $q->where('name', 'attorney');
                            }
                        )->orderBy('id', 'DESC')->get();
            }
            return view('dashboard.case_management', compact('casefile','attorney','assigned_case_id'));
        }else if(Auth::user()->hasRole('Senior Counsel')){
            if (!empty($keyword)) {
                $casefile = CaseFile::where('case_number', 'LIKE', "%$keyword%")
                ->orWhere('name_of_parties', 'LIKE', "%$keyword%")
                ->orWhere('instruction_attorney_id', 'LIKE', "%$keyword%")
                ->orWhere('junior_attorney_id', 'LIKE', "%$keyword%")
                ->orWhere('senior_counsel_id', 'LIKE', "%$keyword%")
                ->orWhere('king_counsel_id', 'LIKE', "%$keyword%")
                ->orWhere('retainer_agreement', 'LIKE', "%$keyword%")
                ->orWhere('type_of_matter_id', 'LIKE', "%$keyword%")
                ->orWhere('case_condition', 'LIKE', "%$keyword%")
                ->get();
            } else {
                $caseIds = CaseSeniorCounsel::where('senior_counsel_id',Auth::id())->pluck('case_id');
                $casefile = CaseFile::whereIn('id',$caseIds)->orderBy('id','DESC')->get();
                // return $casefile = User::with('clientCase')->orderBy('id','DESC')->get();
            }
            return view('dashboard.case_management', compact('casefile'));
        }else if(Auth::user()->hasRole('Paralegal')){
            if (!empty($keyword)) {
                $casefile = CaseFile::where('case_number', 'LIKE', "%$keyword%")
                ->orWhere('name_of_parties', 'LIKE', "%$keyword%")
                ->orWhere('instruction_attorney_id', 'LIKE', "%$keyword%")
                ->orWhere('junior_attorney_id', 'LIKE', "%$keyword%")
                ->orWhere('senior_counsel_id', 'LIKE', "%$keyword%")
                ->orWhere('king_counsel_id', 'LIKE', "%$keyword%")
                ->orWhere('retainer_agreement', 'LIKE', "%$keyword%")
                ->orWhere('type_of_matter_id', 'LIKE', "%$keyword%")
                ->orWhere('case_condition', 'LIKE', "%$keyword%")
                ->get();
            } else {
                $caseIds = CaseParalegal::where('paralegal_id',Auth::id())->pluck('case_id');
                $casefile = CaseFile::whereIn('id',$caseIds)->orderBy('id','DESC')->get();
            }
            return view('dashboard.case_management', compact('casefile'));
        }else if(Auth::user()->hasRole('Junior Counsel')){
            if (!empty($keyword)) {
                $casefile = CaseFile::where('case_number', 'LIKE', "%$keyword%")
                    ->orWhere('name_of_parties', 'LIKE', "%$keyword%")
                    ->orWhere('instruction_attorney_id', 'LIKE', "%$keyword%")
                    ->orWhere('junior_attorney_id', 'LIKE', "%$keyword%")
                    ->orWhere('senior_counsel_id', 'LIKE', "%$keyword%")
                    ->orWhere('king_counsel_id', 'LIKE', "%$keyword%")
                    ->orWhere('retainer_agreement', 'LIKE', "%$keyword%")
                    ->orWhere('type_of_matter_id', 'LIKE', "%$keyword%")
                    ->orWhere('case_condition', 'LIKE', "%$keyword%")
                    ->get();
            } else {
                $caseIds = CaseJuniorCounsel::where('junior_counsel_id',Auth::id())->pluck('case_id');
                $casefile = CaseFile::whereIn('id',$caseIds)->orderBy('id','DESC')->get();
            }
            return view('dashboard.case_management', compact('casefile'));
        }else if(Auth::user()->hasRole('King Counsel')){
            if (!empty($keyword)) {
                $casefile = CaseFile::where('case_number', 'LIKE', "%$keyword%")
                ->orWhere('name_of_parties', 'LIKE', "%$keyword%")
                ->orWhere('instruction_attorney_id', 'LIKE', "%$keyword%")
                ->orWhere('junior_attorney_id', 'LIKE', "%$keyword%")
                ->orWhere('senior_counsel_id', 'LIKE', "%$keyword%")
                ->orWhere('king_counsel_id', 'LIKE', "%$keyword%")
                ->orWhere('retainer_agreement', 'LIKE', "%$keyword%")
                ->orWhere('type_of_matter_id', 'LIKE', "%$keyword%")
                ->orWhere('case_condition', 'LIKE', "%$keyword%")
                ->get();
            } else {
                $caseIds = CaseKingCounsel::where('king_counsel_id',Auth::id())->pluck('case_id');
                $casefile = CaseFile::whereIn('id',$caseIds)->orderBy('id','DESC')->get();
            }
            return view('dashboard.case_management', compact('casefile'));
        }else if(Auth::user()->hasRole('Chambers Manager')){
            if (!empty($keyword)) {
                $casefile = CaseFile::where('case_number', 'LIKE', "%$keyword%")
                ->orWhere('name_of_parties', 'LIKE', "%$keyword%")
                ->orWhere('instruction_attorney_id', 'LIKE', "%$keyword%")
                ->orWhere('junior_attorney_id', 'LIKE', "%$keyword%")
                ->orWhere('senior_counsel_id', 'LIKE', "%$keyword%")
                ->orWhere('king_counsel_id', 'LIKE', "%$keyword%")
                ->orWhere('retainer_agreement', 'LIKE', "%$keyword%")
                ->orWhere('type_of_matter_id', 'LIKE', "%$keyword%")
                ->orWhere('case_condition', 'LIKE', "%$keyword%")
                ->get();
            } else {
                $caseIds = CaseChambersManager::where('chambers_manager_id',Auth::id())->pluck('case_id');
                $casefile = CaseFile::whereIn('id',$caseIds)->orderBy('id','DESC')->get();
            }
            return view('dashboard.case_management', compact('casefile'));
        }else{
            if (!empty($keyword)) {
                $casefile = CaseFile::where('case_number', 'LIKE', "%$keyword%")
                ->orWhere('name_of_parties', 'LIKE', "%$keyword%")
                ->orWhere('instruction_attorney_id', 'LIKE', "%$keyword%")
                ->orWhere('junior_attorney_id', 'LIKE', "%$keyword%")
                ->orWhere('senior_counsel_id', 'LIKE', "%$keyword%")
                ->orWhere('king_counsel_id', 'LIKE', "%$keyword%")
                ->orWhere('retainer_agreement', 'LIKE', "%$keyword%")
                ->orWhere('type_of_matter_id', 'LIKE', "%$keyword%")
                ->orWhere('case_condition', 'LIKE', "%$keyword%")
                ->get();
            } else {
                $casefile = CaseFile::with('originatingProcess.orignatingProcesseds')->orderBy('id','DESC')->get();
                $attorney = User::whereHas(
                        'roles', function($q){
                        $q->where('name', 'attorney');
                    }
                    )->orderBy('id', 'DESC')->get();
            }
        }
        // return $files;
        return view('dashboard.case_management', compact('casefile','attorney'));
    }
    public function account(){
         $casefile = CaseFile::OrderBy('created_at', 'DESC')->get();
        return view('dashboard.account', compact('casefile'));
    }
    public function billOfCost($caseFileId=null, $slug=null){
        if ($slug=='case'){
            $casefile = CaseFile::with('originatingProcess.orignatingProcesseds','tags')->where('id', $caseFileId)->get();
            $lcm = User::where('id', '2')->get();
            $cost = BillOfCost::where('case_id', $caseFileId)->get();
        }
        else{
            $casefile = CaseFile::with('originatingProcess.orignatingProcesseds','tags')->where('id', $caseFileId)->get();
            $lcm = User::where('id', '2')->get();
            $cost = BillOfCost::where('case_id', $caseFileId)->get();
        }
//        return $caseTags = CaseTag::where('case_id', $caseFileId)->get();
        return view('dashboard.bill_of_cost', compact('caseFileId', 'casefile', 'lcm', 'cost'));
    }
    public function caseDetail(){
        return view('dashboard.case_detail');
    }
    public function originatingProcess(){
        return view('dashboard.originating_process');
    }
    public function courtAttendantsNotes($caseFileId=null){
        if(Auth::user()->roles[0]->name=='attorney'){
            if (!empty($keyword)) {
                $courtattendantsnote = CourtAttendantsNote::where('case_file_id', 'LIKE', "%$keyword%")
                ->orWhere('category_id', 'LIKE', "%$keyword%")
                ->orWhere('date_time', 'LIKE', "%$keyword%")
                ->orWhere('attachment', 'LIKE', "%$keyword%")
                ->orWhere('note', 'LIKE', "%$keyword%")
                ->orderBy('id', 'DESC')->get();
            } else {
                // $courtattendantsnote = CourtAttendantsNote::where('id', 'case_file_id')->paginate($perPage);
                $courtattendantsnote = CourtAttendantsNote::where('case_file_id', $caseFileId)->orderBy('id','DESC')->get();
            }
        }if(Auth::user()->roles[0]->name=='intern'){
            if (!empty($keyword)) {
                $courtattendantsnote = CourtAttendantsNote::where('case_file_id', 'LIKE', "%$keyword%")
                ->orWhere('category_id', 'LIKE', "%$keyword%")
                ->orWhere('date_time', 'LIKE', "%$keyword%")
                ->orWhere('attachment', 'LIKE', "%$keyword%")
                ->orWhere('note', 'LIKE', "%$keyword%")
                ->orderBy('id', 'DESC')->get();
            } else {
                // $courtattendantsnote = CourtAttendantsNote::where('id', 'case_file_id')->paginate($perPage);
                $courtattendantsnote = CourtAttendantsNote::where('case_file_id', $caseFileId)->orderBy('id','DESC')->get();
            }
        }else{
            if (!empty($keyword)) {
                $courtattendantsnote = CourtAttendantsNote::where('case_file_id', 'LIKE', "%$keyword%")
                ->orWhere('category_id', 'LIKE', "%$keyword%")
                ->orWhere('date_time', 'LIKE', "%$keyword%")
                ->orWhere('attachment', 'LIKE', "%$keyword%")
                ->orWhere('note', 'LIKE', "%$keyword%")
                ->get();
            } else {
//                $courtattendantsnote = CourtAttendantsNote::where('id', 'case_file_id')->paginate($perPage);
//                $courtattendantsnote = CourtAttendantsNote::where('case_file_id', $caseFileId)->orderBy('id','DESC')->get();
                $case = Casefile::FindOrFail($caseFileId);
                $client_id = $case->client_id;
                $client = User::findOrFail($client_id);
                $attorney = $client->attorney_associate_id;
                $courtattendantsnote = CourtAttendantsNote::where('case_file_id', $caseFileId)->orderBy('updated_at', 'DESC')->get();
                return view('dashboard.court_attendants_notes', compact('courtattendantsnote','caseFileId','attorney'));
            }
        }
        return view('dashboard.court_attendants_notes', compact('courtattendantsnote','caseFileId'));
    }
    public function createEmployeeProfile(){
        return view('dashboard.create_employee_profile');
    }
    public function attorneyDashboard(){
        return view('dashboard.attorney_dashboard');
    }
    public function assignedCases(){

        return view('dashboard.assigned_cases');
    }
    public function assignedCaseAttorney($id, $case_id){
        $client = User::where('id',$id)->first();
        $attorney = User::whereHas(
            'roles', function($q){
                $q->where('name', 'attorney');
            }
        )->where('status',1)->whereNotIn('id',[$client->attorney_associate_id])->orderBy('id', 'DESC')->get();
        return view('website.ajax.assigned_case_attorney', compact('attorney','client','case_id'));
    }
    public function caseAccounting(Request $request, $caseFileId=null){
//        return $caseFileId;
        // $perPage = 25;
        // return $caseAccounting = Accounting::where('case_file_id', $caseFileId)->pluck('table_id');
        $caseAccounting = Accounting::where('case_file_id', $caseFileId)->groupBy('table_id')->pluck('table_id')->toArray();
        $accounting = Accounting::where('case_file_id', $caseFileId)->whereIn('table_id', $caseAccounting)->get();
        $casefile = CaseFile::where('id', $caseFileId)->get();
        $payment = PaymentMethod::get();
        return view('accounting.accounting.index', compact( 'caseFileId', 'accounting', 'casefile','payment','caseAccounting'));
    }
    public function caseAccounts(Request $request)
    {
        $requestData = $request->all();
        $casefile = CaseFile::where('id',$request->case_file_id)->first();
        if($request->hasFile('upload_receipt')){
            // $recipt = Storage::disk('website')->put('payment_receipt', $request->upload_receipt);
            $recipt = Storage::disk('website')->put($casefile->name_of_parties.'/Accounts/', $request->upload_receipt);
            $this->uploadToDropBox($casefile->name_of_parties.'/Accounts',$request->upload_receipt,array_reverse(explode('/',$recipt))[0],$this->accessToken);
        }else{
        }
        $requestData['upload_receipt'] = $recipt;
        $requestData['noti_status'] = 0;
        $requestData['table_id'] = $request->table_id;
        $requestData['description'] = $request->description;
        Accounting::create($requestData);
        return back()->with('flash_message', 'Accounting added!');
    }
    public function caseOrder(Request $request, $caseFileId=null){
        //        return $caseFileId;
        $perPage = 25;
        $order = Order::where('case_file_id', $caseFileId)->paginate($perPage);
        $casefile = CaseFile::where('id', $caseFileId)->get();
        return view('order.order.index', compact( 'caseFileId', 'order', 'casefile'));
    }
    public function caseLetter(Request $request, $caseFileId=null){
        //        return $caseFileId;
        $perPage = 25;
        $letter = Letter::where('case_file_id', $caseFileId)->paginate($perPage);
        $casefile = CaseFile::where('id', $caseFileId)->get();
        return view('letter.letter.index', compact( 'caseFileId', 'letter', 'casefile'));
    }
    public function caseCheque(Request $request, $caseFileId=null){
        // return $caseFileId;
        $perPage = 25;
        $cheque = Cheque::where('case_file_id', $caseFileId)->paginate($perPage);
        $casefile = CaseFile::where('id', $caseFileId)->get();
        return view('cheque.cheque.index', compact( 'caseFileId', 'cheque', 'casefile'));
    }
    public function caseAllocatur(Request $request, $caseFileId=null){
        // return $caseFileId;
        $perPage = 25;
        $allocatur = Allocatur::where('case_file_id', $caseFileId)->paginate($perPage);
        $casefile = CaseFile::where('id', $caseFileId)->get();
        return view('allocatur.allocatur.index', compact( 'caseFileId', 'allocatur', 'casefile'));
    }
    public function caseStatus(Request $request){
        if ($request->val == 1) {
            CaseFile::where('id',$request->id)->update(['status'=>1]);
        }elseif ($request->val == 0){
            CaseFile::where('id',$request->id)->update(['status'=>0]);
        }
        return response(['result'=>'success','msg'=>"Status changed"]);
    }
    public function haveInvoice(Request $request, $caseFileId=null){
        $keyword = $request->get('search');
        $perPage = 25;
        if (!empty($keyword)) {
            $caseinvoice = CaseInvoice::where('case_file_id', 'LIKE', "%$keyword%")
                ->orWhere('vat_number', 'LIKE', "%$keyword%")
                ->orWhere('invoice_number', 'LIKE', "%$keyword%")
                ->orWhere('subject', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('senior_counsel_fees', 'LIKE', "%$keyword%")
                ->orWhere('junior_counsel_fees', 'LIKE', "%$keyword%")
                ->orWhere('instructing_attorney_fees', 'LIKE', "%$keyword%")
                ->orWhere('vat_value', 'LIKE', "%$keyword%")
                ->orWhere('total', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $caseinvoice = CaseInvoice::where('case_file_id', $caseFileId)->paginate($perPage);
        }

        return view('caseInvoice.case-invoice.index', compact('caseinvoice', 'caseFileId'));
    }
    public function haveBillOfCost(Request $request, $caseFileId=null){
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $billofcost = BillOfCost::where('case_id', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            $lcm = User::where('id', '2')->get();
        } else {
            $billofcost = BillOfCost::where('case_id', $caseFileId)->paginate($perPage);
            $lcm = User::where('id', '2')->get();
        }

        return view('billOfCost.bill-of-cost.index', compact('billofcost', 'lcm', 'caseFileId'));
    }
    /** Reminder Email Event  */

    public function reminderEmail()
    {
        try {
            $currentDate = Carbon::today();
            $previousDate = $currentDate->subDay();
            $previousDate = $previousDate->format('Y-m-d');

            $caseEvents = CaseEvent::with('caseEventMentions')->where('date', date('Y-m-d'))->get();

            foreach ($caseEvents as $caseEvent) {
                foreach ($caseEvent->caseEventMentions as $item) {
                    $user_email = $item->user->email;
                    $user_name = $item->user->name;
                    $eventName = $caseEvent->name;
                    $eventTime = Carbon::parse($caseEvent->time)->format('H:i');
                    $eventLocation = $caseEvent->location;
                    $eventDescription = $caseEvent->description;
                    $login = env('APP_URL');
                    $event_date = $caseEvent->date;
                    $oneday = Carbon::parse($event_date)->subDay()->format('Y-m-d');
                    $date = $currentDate->format('Y-m-d');
                    if ($oneday==$date){
                        Mail::send('website.email_templates.event_reminder_email', [
                            'user_name' => $user_name,
                            'user_email' => $user_email,
                            'eventName' => $eventName,
                            'eventDate' => $event_date,
                            'eventTime' => $eventTime,
                            'eventLocation' => $eventLocation,
                            'eventDescription' => $eventDescription,
                            'login' => $login
                        ], function ($message) use ($user_name, $user_email) {
                            $message->to($user_email, $user_name)
                                ->cc('lcm@yopmail.com', 'Developer')
                                ->subject('Urgent Reminder');
                        });
                    }
                }
            }
            return redirect('dashboard');
        } catch (\Exception $e) {
            return redirect()->back()->with([
                'message' => 'Your Creation was successful, but unable to send the email. ' . $e->getMessage(),
                'type' => 'error',
                'title' => 'Fail'
            ]);
        }
    }


    /**  */
}
