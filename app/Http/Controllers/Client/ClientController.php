<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\User;
use App\Profile;
use App\Role;
use App\PaymentMethod;
use App\Firm;
use App\ClientAttitude;
use App\ClientPaymentMethod;
use App\Client;
use Mail;
use Auth;
use Storage;
use Illuminate\Http\Request;
use App\AssignedAttorney;
class ClientController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */

    public function index(Request $request)
    {
        $model = str_slug('client','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if(Auth::user()->roles[0]->name=='attorney'){
                if (!empty($keyword)) {
                    $client = User::whereHas(
                        'roles', function($q){
                            $q->where('name', 'client');}
                    )
                    ->orWhere('email', 'LIKE', "%$keyword%")
                    ->orWhere('address', 'LIKE', "%$keyword%")
                    ->orWhere('contact', 'LIKE', "%$keyword%")
                    ->orWhere('next_of_kin', 'LIKE', "%$keyword%")
                    ->orWhere('salary', 'LIKE', "%$keyword%")
                    ->orWhere('marital_status', 'LIKE', "%$keyword%")
                    ->orWhere('id_number', 'LIKE', "%$keyword%")
                    ->orWhere('payment_method_id', 'LIKE', "%$keyword%")
                    ->orWhere('attorney_associate_id', 'LIKE', "%$keyword%")
                    ->orWhere('condition', 'LIKE', "%$keyword%")
                    ->orWhere('frim_id', 'LIKE', "%$keyword%")
                    ->orWhere('frim_description', 'LIKE', "%$keyword%")
                    ->orWhere('client_attitude_id', 'LIKE', "%$keyword%")
                    ->orWhere('client_attitude_description', 'LIKE', "%$keyword%")
                    ->where('attorney_associate_id', $attorney_id)->paginate($perPage);
                } else {
                    $attorney_id = Auth::id();
                    $assigned = AssignedAttorney::where('new_attorney_id',$attorney_id)->first();
                    if ($assigned!=null) {
                        $attorney_id = $assigned->old_attorney_id;
                    }
                    $client = User::whereHas(
                        'roles', function($q){
                            $q->where('name', 'client');
                        }
                    )->where('delete_status',1)->orderBy('id', 'DESC')->where('attorney_associate_id', Auth::id())->orWhere('attorney_associate_id', $attorney_id)->paginate($perPage);
                }
            }else if(Auth::user()->roles[0]->name=='intern'){
                if (!empty($keyword)) {
                    $client = User::whereHas(
                        'roles', function($q){
                            $q->where('name', 'client');}
                    )
                    ->orWhere('email', 'LIKE', "%$keyword%")
                    ->orWhere('address', 'LIKE', "%$keyword%")
                    ->orWhere('contact', 'LIKE', "%$keyword%")
                    ->orWhere('next_of_kin', 'LIKE', "%$keyword%")
                    ->orWhere('salary', 'LIKE', "%$keyword%")
                    ->orWhere('marital_status', 'LIKE', "%$keyword%")
                    ->orWhere('id_number', 'LIKE', "%$keyword%")
                    ->orWhere('payment_method_id', 'LIKE', "%$keyword%")
                    ->orWhere('attorney_associate_id', 'LIKE', "%$keyword%")
                    ->orWhere('condition', 'LIKE', "%$keyword%")
                    ->orWhere('frim_id', 'LIKE', "%$keyword%")
                    ->orWhere('frim_description', 'LIKE', "%$keyword%")
                    ->orWhere('client_attitude_id', 'LIKE', "%$keyword%")
                    ->orWhere('client_attitude_description', 'LIKE', "%$keyword%")
                    ->where('attorney_associate_id', $attorney_id)->paginate($perPage);
                } else {
                    $attorney_id = Auth::id();
                    $assigned = AssignedAttorney::where('new_attorney_id',$attorney_id)->first();
                    if ($assigned!=null) {
                        $attorney_id = $assigned->old_attorney_id;
                    }
                    $client = User::whereHas(
                        'roles', function($q){
                            $q->where('name', 'client');
                        }
                    )->where('delete_status',1)->orderBy('id', 'DESC')->where('attorney_associate_id', Auth::id())->orWhere('attorney_associate_id', $attorney_id)->paginate($perPage);
                }
            }else{
                if (!empty($keyword)) {
                    $client = User::whereHas(
                        'roles', function($q){
                            $q->where('name', 'client');}
                    )
                    ->orWhere('email', 'LIKE', "%$keyword%")
                    ->orWhere('address', 'LIKE', "%$keyword%")
                    ->orWhere('contact', 'LIKE', "%$keyword%")
                    ->orWhere('next_of_kin', 'LIKE', "%$keyword%")
                    ->orWhere('salary', 'LIKE', "%$keyword%")
                    ->orWhere('marital_status', 'LIKE', "%$keyword%")
                    ->orWhere('id_number', 'LIKE', "%$keyword%")
                    ->orWhere('payment_method_id', 'LIKE', "%$keyword%")
                    ->orWhere('attorney_associate_id', 'LIKE', "%$keyword%")
                    ->orWhere('condition', 'LIKE', "%$keyword%")
                    ->orWhere('frim_id', 'LIKE', "%$keyword%")
                    ->orWhere('frim_description', 'LIKE', "%$keyword%")
                    ->orWhere('client_attitude_id', 'LIKE', "%$keyword%")
                    ->orWhere('client_attitude_description', 'LIKE', "%$keyword%")
                    ->paginate($perPage);
                } else {
                    $client = User::whereHas(
                        'roles', function($q){
                            $q->where('name', 'client');
                        }
                    )->where('delete_status',1)->orderBy('id', 'DESC')->paginate($perPage);
                }
            }

            return view('client.client.index', compact('client'));
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
        $model = str_slug('client','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $attorneyassociates = User::whereHas(
                'roles', function($q){
                    $q->whereIn('name', ['attorney', 'associate','intern']);
                }
            )->where('delete_status',1)->get();
            $payments = PaymentMethod::get();
            $firms = Firm::whereIn('id',[1,2,3])->get();
            $client_attitudes = ClientAttitude::whereIn('id',[1,2,3,4])->get();
            return view('client.client.create', compact('attorneyassociates', 'payments', 'firms', 'client_attitudes'));
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
    public function store(Request $request)
    {   
        $model = str_slug('client','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'name' => 'required',
			'email' => 'required'
		]);
        extract($request->all());

        if($request->hasFile('document')){
            $document = Storage::disk('website')->put('documents', $request->document);
        }else{
            $document = '';
        }

        if($request->client_attitude_other){
            $client_attitude_id = ClientAttitude::create(['name'=>$request->client_attitude_other])->id;
        }
        if($request->firm_other){
            $firm_id = Firm::create(['name'=>$request->firm_other])->id;
        }
        $assignAttorney = $request->attorney_associate_id;
        $requestData = ['name'=>$name,'document'=>$document, 'contact'=>$contact, 'email'=>$email, 'noti_status'=>0, 'attorney_associate_id'=>$assignAttorney, 'firm_id'=>$firm_id, 'client_attitude_id'=>$client_attitude_id];
        $user = User::create($requestData);
        Profile::create(['user_id'=>$user->id,'address'=>$address,'next_of_kin'=>$next_of_kin,'salary'=>$salary,'marital_status'=>$marital_status,'id_number'=>$id_number, 'condition'=>$condition]);
        $role = Role::find(6);
        $user->assignRole($role->name);
        if (is_array($request->payment_method_id)) {
            foreach ($request->payment_method_id as $key => $value) {
                $paymentMethod = ClientPaymentMethod::create(['client_id'=>$user->id,'payment_method_id'=>$value]);
            }
        }
        if (true) {
            try{
                $name= $request->name;
                $assignAttorney = $request->attorney_email;
                $assignAttorneyName = $request->attorney_name;
                $result = Mail::raw("
Hello $assignAttorneyName, 

Mr. $name is a client of Freedom law chambers and the client’s case has been assigned to you. 

The client’s information can be viewed on your dashboard.

Freedom Law Chambers
LCM Software Support Team.
                ", function ($message) use ($assignAttorney) {
                    $message->to($assignAttorney)->cc('lcm@yopmail.com')->subject('LCM Account Information.');
                });
            }catch(\Exception $e){
                return redirect()->back()->with(['message'=>'Your Creation successfully, but unable to send email.'.$e->getMessage(),'type'=>'error','title'=>'Fail']);;          
            }
        }

            return redirect('client/client')->with('flash_message', 'Client added!');
        }
        return response(view('403'), 403);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $model = str_slug('client','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $client = User::with('clientCase')->findOrFail($id);
            $attorneyassociates = User::whereHas(
                'roles', function($q){
                    $q->whereIn('name', ['attorney', 'associate','intern']);
                }
            )->where('delete_status',1)->get();
            $payments = PaymentMethod::get();
            $firms = Firm::get();
            $client_attitudes = ClientAttitude::get();
            return view('client.client.show', compact('client','attorneyassociates', 'payments', 'firms', 'client_attitudes'));
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
        $model = str_slug('client','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $client = User::findOrFail($id);
            $attorneyassociates = User::whereHas(
                'roles', function($q){
                    $q->whereIn('name', ['attorney', 'associate','intern']);
                }
            )->where('delete_status',1)->get();
            $payments = PaymentMethod::get();
            $firms = Firm::whereIn('id',[1,2,3,$client->firm_id])->get();
            $client_attitudes = ClientAttitude::whereIn('id',[$client->client_attitude_id,1,2,3,4])->get();
            return view('client.client.edit', compact('client', 'payments', 'firms', 'client_attitudes', 'attorneyassociates'));
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
        $model = str_slug('client','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'name' => 'required',
			'email' => 'required'
		]);
            extract($request->all());
            
            $client = User::findOrFail($id);

            if ($request->hasFile('document')){
                $document = Storage::disk('website')->put('documents', $request->document);
                Storage::disk('website')->delete($client->document);
            }else{
                $document  = $client->document;
            }//end if else.
            $requestData = ['name'=>$name, 'contact'=>$contact, 'document'=>$document,'email'=>$email, 'attorney_associate_id'=>$attorney_associate_id, 'firm_id'=>$firm_id, 'client_attitude_id'=>$client_attitude_id];
            User::where('id' ,$id)->update($requestData);
            $profile = ['address'=>$address,'next_of_kin'=>$next_of_kin,'salary'=>$salary,'marital_status'=>$marital_status,'id_number'=>$id_number, 'condition'=>$condition];
            Profile::where('user_id', $id)->update($profile);

            ClientPaymentMethod::where('client_id', $id)->delete();
            if (is_array($request->payment_method_id)) {
                foreach ($request->payment_method_id as $value) {
                    ClientPaymentMethod::create([
                        'payment_method_id' => $value,
                        'client_id' => $id,
                    ]);
                }
            }
            return redirect('client/client')->with('flash_message', 'Client updated!');
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
        $model = str_slug('client','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Client::destroy($id);

            return redirect('client/client')->with('flash_message', 'Client deleted!');
        }
        return response(view('403'), 403);

    }
}
