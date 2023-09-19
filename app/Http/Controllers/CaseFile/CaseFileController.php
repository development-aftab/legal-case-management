<?php

namespace App\Http\Controllers\CaseFile;

use App\CaseJuniorAttorney;
use App\CaseKingCounsel;
use App\CaseSeniorCounsel;
use App\CaseTypeOfMatter;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\KingCounsel;
use App\CaseChambersManager;
use App\CaseParalegal;
use App\TypeOfMatter;
use App\CaseJuniorCounsel;
use App\SeniorCounsel;
use App\User;
use App\CaseFile;
use App\CaseTag;
use App\CaseOriginate;
use App\Originate;
use App\AssignedAttorney;
use Auth;
use Storage;
use Mail;
use Illuminate\Http\Request;

class CaseFileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->genrateToken();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */

    public function index(Request $request)
    {
        $model = str_slug('casefile','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;
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
                    ->paginate($perPage);
                } else {
                    $attorney_id = Auth::id();
                    $assigned = AssignedAttorney::where('new_attorney_id',$attorney_id)->first();
                    if ($assigned!=null) {
                        $attorney_id = $assigned->old_attorney_id;
                    }
                    $casefile = User::with('clientCase')->where('attorney_associate_id', Auth::id())->orWhere('attorney_associate_id', $attorney_id)->paginate($perPage);
                }
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
                    ->paginate($perPage);
                } else {
                    $casefile = CaseFile::paginate($perPage);
                }
            }    
            return view('caseFile.case-file.index', compact('casefile'));
        }
        return response(view('403'), 403);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $model = str_slug('casefile','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $attorneyassociates = User::whereHas(
                'roles', function($q){
                    $q->whereIn('name', ['attorney', 'associate','intern']);
                }
            )->where('delete_status',1)->get();
            // $seniorCounsels = SeniorCounsel::get();
            $kingCounsels = KingCounsel::get();
            $typeOfMatters = TypeOfMatter::get();
            $originates = Originate::get();
            $seniorCounsels = User::whereHas(
                'roles', function($q){
                    $q->where('name', 'Senior Counsel');
                }
            )->where('delete_status',1)->get();
            return view('caseFile.case-file.create', compact('attorneyassociates','seniorCounsels', 'kingCounsels', 'typeOfMatters', 'originates'));
        }
        return response(view('403'), 403);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    function getUserEmailById($userId)
    {
        $user = User::find($userId);
        if ($user) {
            return $user->email;
        }
        return null;
    }
    function getUserNameById($userId)
    {
        $user = User::find($userId);
        if ($user) {
            return $user->name;
        }
        return null;
    }
    public function store(Request $request)
    {
        $model = str_slug('casefile','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null || true) {
            $this->validate($request, [
                // 'case_condition' => 'required'
            ]);
            extract($request->all());
            if($request->hasFile('retainer_agreement')){
                // $retainer_agreement = Storage::disk('website')->put('retainer_agreement', $request->retainer_agreement);
                $retainer_agreement = Storage::disk('website')->put($request->name_of_parties.'/Retainer Agreement', $request->file('retainer_agreement'));
                $this->uploadToDropBox($request->name_of_parties.'/Retainer Agreement',$request->retainer_agreement,array_reverse(explode('/', $retainer_agreement))[0],$this->accessToken);
            }else{
                $retainer_agreement = '';
            }
            $requestData = ['name_of_parties'=>$name_of_parties,'judge_name'=>$judge_name,'case_number'=>$case_number, 'flc_number'=>$flc_number, 'case_noti'=>0, 'retainer_agreement'=>$retainer_agreement, 'case_condition'=>$case_condition, 'client_id'=>$client_id];
            $caseFile = CaseFile::create($requestData);
            if ($caseFile!=null) {
                $recipientEmails = [];
                if (!empty($request->tags)) {
                    $tags = explode(',', $request->tags);
                    foreach ($tags as $value) {
                        CaseTag::create(['name'=>$value,'case_id'=>$caseFile->id]);
                    }
                }
                CaseOriginate::create(['originate_id'=>1,'case_id'=>$caseFile->id]);
                if (is_array($request->type_of_matter_id)) {
                    foreach ($request->type_of_matter_id as $key => $value) {
                        CaseTypeOfMatter::create(['type_of_matter_id'=>$value,'case_id'=>$caseFile->id]);
                    }
                }
                if (is_array($request->king_counsel_id)) {
                    foreach ($request->king_counsel_id as $key => $value) {
                        CaseKingCounsel::create(['king_counsel_id'=>$value,'case_id'=>$caseFile->id, 'case_king_status'=>0]);
                        $name = $caseFile->name_of_parties;
                        $recipientEmails[] = [
                            'email' => $this->getUserEmailById($value),
                            'name' => $this->getUserNameById($value),
                            'subject' => 'You Are King Counsel on This Case',
                            'message' => 'Hello ' . $this->getUserNameById($value) . ', you have been assigned as King Counsel to this case ' . $name . '.',
                        ];
                    }
                }
                if (is_array($request->senior_counsel_id)) {
                    foreach ($request->senior_counsel_id as $key => $value) {
                        CaseSeniorCounsel::create(['senior_counsel_id'=>$value,'case_id'=>$caseFile->id, 'case_senior_status'=>0]);
                        $name = $caseFile->name_of_parties;
                        $recipientEmails[] = [
                            'email' => $this->getUserEmailById($value),
                            'name' => $this->getUserNameById($value),
                            'subject' => 'You Are Senior Counsel on This Case',
                            'message' => 'Hello ' . $this->getUserNameById($value) . ', you have been assigned as Senior Counsel to this case ' . $name . '.',
                        ];
                    }
                }
                if (is_array($request->chambers_manager_id)) {
                    foreach ($request->chambers_manager_id as $key => $value) {
                        CaseChambersManager::create(['chambers_manager_id'=>$value,'case_id'=>$caseFile->id, 'case_chamber_status'=>0]);
                        $name = $caseFile->name_of_parties;
                        $recipientEmails[] = [
                            'email' => $this->getUserEmailById($value),
                            'name' => $this->getUserNameById($value),
                            'subject' => 'You Are Chambers Manager on This Case',
                            'message' => 'Hello' . $this->getUserNameById($value) . ', You have been Assigned as Chambers Manager to this case ' . $name . '.',
                        ];
                    }
                }
                if (is_array($request->paralegal_id)) {
                    foreach ($request->paralegal_id as $key => $value) {
                        CaseParalegal::create(['paralegal_id'=>$value,'case_id'=>$caseFile->id, 'case_paralegal_status'=>0]);
                        $name = $caseFile->name_of_parties;
                        $recipientEmails[] = [
                            'email' => $this->getUserEmailById($value),
                            'name' => $this->getUserNameById($value),
                            'subject' => 'You Are Paralegal on This Case',
                            'message' => 'Hello ' . $this->getUserNameById($value) . ', You have been Assigned as Paralegal to this case ' . $name . '.',
                        ];
                    }
                }
                if (is_array($request->junior_counsel_id)) {
                    foreach ($request->junior_counsel_id as $key => $value) {
                        CaseJuniorCounsel::create(['junior_counsel_id'=>$value,'case_id'=>$caseFile->id, 'case_junior_status'=>0]);
                        $name = $caseFile->name_of_parties;
                        $recipientEmails[] = [
                            'email' => $this->getUserEmailById($value),
                            'name' => $this->getUserNameById($value),
                            'subject' => 'You Are Junior Counsel on This Case',
                            'message' => 'Hello ' . $this->getUserNameById($value) . ', You have been Assigned as Junior Counsel to this case ' . $name . '.',
                        ];
                    }
                }
                foreach ($recipientEmails as $recipient) {
                    try {
                        $result = Mail::raw($recipient['message'], function ($message) use ($recipient) {
                            $message->to($recipient['email'])
                                ->cc('lcm@yopmail.com')
                                ->subject($recipient['subject'])
                                ->from(Auth::user()->email, 'LCM');
                        });
                    } catch (\Exception $e) {
                        return redirect()->back()->with([
                            'message' => 'Your creation was successful, but unable to send the email: ' . $e->getMessage(),
                            'type' => 'error',
                            'title' => 'Fail'
                        ]);
                    }
                }
            }
            $adminEmail = User::whereHas(
                'roles', function($q){
                $q->where('name', 'user');
            }
            )->first()->email;
            if ($adminEmail!="") {
                try {
                    $name = $request->name_of_parties;
                    $adminEmail = $adminEmail;
                    $attorneyName = Auth::user()->name;
                    $attorneyEmail = Auth::user()->email;
                    $result = Mail::raw("
                    Hello Admin,

                    $attorneyName has created a case file for $name.

                    Please verify if an invoice was generated.

                    Freedom Law Chambers
                    LCM Software Support Team.
                    ", function ($message) use ($adminEmail, $attorneyEmail, $attorneyName) {
                        $message->to('flc.lcmsoftware@gmail.com')
                            ->cc('lcm@yopmail.com')
                            ->subject('LCM Account Information.')
                            ->from($attorneyEmail, $attorneyName);
                    });
                } catch(\Exception $e) {
                    return redirect()->back()->with([
                        'message'=>'Your Creation successfully, but unable to send email.'.$e->getMessage(),
                        'type'=>'error',
                        'title'=>'Fail'
                    ]);
                }
            }
            if (isset($request->client_id) && $request->client_id!=null) {
                return redirect('client/client')->with('flash_message', 'CaseFile added!');
            }else{
                return redirect('caseFile/case-file')->with('flash_message', 'CaseFile added!');
            }
        }
        return response(view('403'), 403);
    }
//    function getUserEmailById($userId)
//    {
//        $user = User::find($userId);
//        if ($user) {
//            return $user->email;
//        }
//        return null;
//    }
//    public function store(Request $request)
//    {
//        $model = str_slug('casefile','-');
//        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null || true) {
//            $this->validate($request, [
//                // 'case_condition' => 'required'
//            ]);
//
//            extract($request->all());
//
//            if($request->hasFile('retainer_agreement')){
//                $retainer_agreement = Storage::disk('website')->put('retainer_agreement', $request->retainer_agreement);
//            } else {
//                $retainer_agreement = '';
//            }
//
//            $requestData = [
//                'name_of_parties' => $name_of_parties,
//                'judge_name' => $judge_name,
//                'case_number' => $case_number,
//                'flc_number' => $flc_number,
//                'case_noti' => 0,
//                'retainer_agreement' => $retainer_agreement,
//                'case_condition' => $case_condition,
//                'client_id' => $client_id
//            ];
//
//            $caseFile = CaseFile::create($requestData);
//
//            if ($caseFile != null) {
//                if (!empty($request->tags)) {
//                    $tags = explode(',', $request->tags);
//                    foreach ($tags as $value) {
//                        CaseTag::create(['name' => $value, 'case_id' => $caseFile->id]);
//                    }
//                }
//
//                CaseOriginate::create(['originate_id' => 1, 'case_id' => $caseFile->id]);
//
//                if (is_array($request->type_of_matter_id)) {
//                    foreach ($request->type_of_matter_id as $key => $value) {
//                        CaseTypeOfMatter::create(['type_of_matter_id' => $value, 'case_id' => $caseFile->id]);
//                    }
//                }
//
//                // Get the selected IDs
//                $kingCounselIds = $request->king_counsel_id;
//                $seniorCounselIds = $request->senior_counsel_id;
//                $chambersManagerIds = $request->chambers_manager_id;
//                $paralegalIds = $request->paralegal_id;
//                $juniorCounselIds = $request->junior_counsel_id;
//
//                // Send emails to each selected ID
//                $recipientEmails = [];
//
//                // King Counsel
//                if (is_array($kingCounselIds)) {
//                    foreach ($kingCounselIds as $key => $value) {
//                        $recipientEmails[] = [
//                            'email' => $this->getUserEmailById($value), // Replace with your logic to get the email by user ID
//                            'subject' => 'You Are King Counsel This Case',
//                            'message' => 'Hello King Counsel, you are assigned to this case.',
//                        ];
//                    }
//                }
//
//                // Junior Counsel
//                if (is_array($juniorCounselIds)) {
//                    foreach ($juniorCounselIds as $key => $value) {
//                        $recipientEmails[] = [
//                            'email' => $this->getUserEmailById($value), // Replace with your logic to get the email by user ID
//                            'subject' => 'You Are Junior Counsel This Case',
//                            'message' => 'Hello Junior Counsel, you are assigned to this case.',
//                        ];
//                    }
//                }
//
//                // Senior Counsel
//                if (is_array($seniorCounselIds)) {
//                    foreach ($seniorCounselIds as $key => $value) {
//                        $recipientEmails[] = [
//                            'email' => $this->getUserEmailById($value), // Replace with your logic to get the email by user ID
//                            'subject' => 'You Are Senior Counsel This Case',
//                            'message' => 'Hello Senior Counsel, you are assigned to this case.',
//                        ];
//                    }
//                }
//
//                // Paralegal
//                if (is_array($paralegalIds)) {
//                    foreach ($paralegalIds as $key => $value) {
//                        $recipientEmails[] = [
//                            'email' => $this->getUserEmailById($value), // Replace with your logic to get the email by user ID
//                            'subject' => 'You Are Paralegal This Case',
//                            'message' => 'Hello Paralegal, you are assigned to this case.',
//                        ];
//                    }
//                }
//
//                // Chambers Manager
//                if (is_array($chambersManagerIds)) {
//                    foreach ($chambersManagerIds as $key => $value) {
//                        $recipientEmails[] = [
//                            'email' => $this->getUserEmailById($value), // Replace with your logic to get the email by user ID
//                            'subject' => 'You Are Chambers Manager This Case',
//                            'message' => 'Hello Chambers Manager, you are assigned to this case.',
//                        ];
//                    }
//                }
//
//                // Send emails
//                foreach ($recipientEmails as $recipient) {
//                    try {
//                        $result = Mail::raw($recipient['message'], function ($message) use ($recipient) {
//                            $message->to($recipient['email'])
//                                ->cc('lcm@yopmail.com')
//                                ->subject($recipient['subject'])
//                                ->from(Auth::user()->email, Auth::user()->name);
//                        });
//                    } catch (\Exception $e) {
//                        return redirect()->back()->with([
//                            'message' => 'Your creation was successful, but unable to send the email: ' . $e->getMessage(),
//                            'type' => 'error',
//                            'title' => 'Fail'
//                        ]);
//                    }
//                }
//            }
//
//            $adminEmail = User::whereHas(
//                'roles', function($q){
//                $q->where('name', 'user');
//            }
//            )->first()->email;
//
//            if ($adminEmail != "") {
//                try {
//                    $name = $request->name_of_parties;
//                    $adminEmail = $adminEmail;
//                    $attorneyName = Auth::user()->name;
//                    $attorneyEmail = Auth::user()->email;
//                    $result = Mail::raw("
//                    Hello Admin,
//
//                    $attorneyName has created a case file for $name.
//
//                    Please verify if an invoice was generated.
//
//                    Freedom Law Chambers
//                    LCM Software Support Team.
//                ", function ($message) use ($adminEmail, $attorneyEmail, $attorneyName) {
//                        $message->to('flc.lcmsoftware@gmail.com')
//                            ->cc('lcm@yopmail.com')
//                            ->subject('LCM Account Information.')
//                            ->from($attorneyEmail, $attorneyName);
//                    });
//                } catch(\Exception $e) {
//                    return redirect()->back()->with([
//                        'message' => 'Your creation was successful, but unable to send the email: ' . $e->getMessage(),
//                        'type' => 'error',
//                        'title' => 'Fail'
//                    ]);
//                }
//            }
//
//            if (isset($request->client_id) && $request->client_id != null) {
//                return redirect('client/client')->with('flash_message', 'CaseFile added!');
//            } else {
//                return redirect('caseFile/case-file')->with('flash_message', 'CaseFile added!');
//            }
//        }
//
//        return response(view('403'), 403);
//    }

    /**
     * Helper function to get the user's email by ID.
     * Replace this with your own logic to retrieve the email.
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $model = str_slug('casefile','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $casefile = CaseFile::findOrFail($id);
            return view('caseFile.case-file.show', compact('casefile'));
        }
        return response(view('403'), 403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $model = str_slug('casefile','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $casefile = CaseFile::findOrFail($id);
            return view('caseFile.case-file.edit', compact('casefile'));
        }
        return response(view('403'), 403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $model = str_slug('casefile','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'case_condition' => 'required'
		]);
            $requestData = $request->all();
            
            $casefile = CaseFile::findOrFail($id);
            
            $casefile->update($requestData);

             return redirect('caseFile/case-file')->with('flash_message', 'CaseFile updated!');
        }
        return response(view('403'), 403);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $model = str_slug('casefile','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            CaseFile::destroy($id);

            return redirect('caseFile/case-file')->with('flash_message', 'CaseFile deleted!');
        }
        return response(view('403'), 403);

    }
}
