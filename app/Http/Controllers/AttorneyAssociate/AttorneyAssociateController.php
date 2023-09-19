<?php

namespace App\Http\Controllers\AttorneyAssociate;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Role;
use App\Profile;
use App\Permission;
use App\User;
use App\Expertise;
use App\AttorneyAssociate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;
use Mail;
use Auth;
class AttorneyAssociateController extends Controller
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
        $model = str_slug('attorneyassociate','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            
            if (!empty($keyword)) {
                $attorneyassociate = User::whereHas(
                    'roles', function($q){
                        $q->whereIn('name', ['attorney', 'associate', 'secretary','intern']);
                    }
                )->orWhere('email', 'LIKE', "%$keyword%")
                    ->orWhere('bar_number', 'LIKE', "%$keyword%")
                    ->orWhere('contact', 'LIKE', "%$keyword%")
                    ->orWhere('certificate', 'LIKE', "%$keyword%")
                    ->orWhere('resume', 'LIKE', "%$keyword%")
                    ->orWhere('status', 'LIKE', "%$keyword%")
                    ->orderBy('id', 'DESC')->paginate($perPage);
                    $roles = Role::whereBetween('id', [3, 5])->get();
                    $attorney = User::whereHas(
                        'roles', function($q){
                        $q->where('name', 'attorney');
                    }
                    )->orderBy('id', 'DESC')->get();
            } else {
                $attorneyassociate = User::whereHas(
                    'roles', function($q){
                        $q->whereIn('name', ['attorney', 'associate', 'secretary', 'intern']);
                    }
                )->where('delete_status',1)->orderBy('id', 'DESC')->paginate($perPage);
                $roles = Role::whereIn('id', [3, 4, 5, 22])->get();
                $attorney = User::whereHas(
                    'roles', function($q){
                    $q->where('name', 'attorney');
                }
                )->where('delete_status',1)->orderBy('id', 'DESC')->get();
            }
            return view('attorneyAssociate.attorney-associate.index', compact('attorneyassociate', 'roles', 'attorney'));
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
        
        $model = str_slug('attorneyassociate','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            // $roles = Role::whereBetween('id', [3, 5])->get();
            $roles = Role::whereNotIn('name',['admin','user','client','Junior Counsel','Senior Counsel','King Counsel','Paralegal'])->with('permissions')->orderBy('id','DESC')->get();
            // return $permissions = Role::where('name','attroney')->with('permissions')->orderBy('id','DESC')->get();
            // return $permissions = Permission::whereIn('name',['view-client','view-casefile', 'add-casefile', 'add-paymentmethod', 'view-paymentmethod'])->get();
            // return $permissions = Role::with('permissions')->where('name', 'employe')->get();
            return view('attorneyAssociate.attorney-associate.create', compact('roles'));
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
        extract($request->all());
        $model = str_slug('attorneyassociate','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required',
            ]);
            if($request->hasFile('resume')){
                $resume = Storage::disk('website')->put('resumes', $request->resume);
            }else{
                $resume = '';
            }
            if($request->hasFile('certificate')){
                $certificate = Storage::disk('website')->put('certificates', $request->certificate);
            }else{
                $certificate = '';
            }
            $random_password = rand('11111111','99999999');
            $requestData = ['name'=>$name,'bar_number'=>$bar_number, 'contact'=>$contact, 'email'=>$email, 'resume'=>$resume, 'certificate'=>$certificate, 'signature'=>$signature, 'password'=>bcrypt($random_password)];
            $user = User::create($requestData);
            if ($file = $request->file('pic')) {
                $extension = $file->extension()?: 'png';
                $destinationPath = public_path() . '/storage/uploads/users/';
                $safeName = str_random(10) . '.' . $extension;
                $file->move($destinationPath, $safeName);
                $pic = $safeName;
            }else{
                $pic = 'no_avatar.jpg';
            }
            Profile::create(['user_id'=>$user->id,'address'=>$address,'dob'=>$dob,'pic'=>$pic,'bio'=>$bio]);
            if ($role_id !='custom_role'){
                $role = Role::where('name',$role_id)->first();
                $user->assignRole($role->name);
                $roleName = $role->name;
            }else{
                $role = Role::firstOrCreate(['name' => $request->new_role_name]);
                if($request->premission_id != '' || $request->premission_id != null){
                    $role->permissions()->sync($request->premission_id);
                    $user->assignRole($role->name);
                    $roleName = $role->name;
                }
            }//end if else.
            $flashMessage = $roleName . ' added!';
            if ($user!=null) {
                foreach (explode(',', $request->expertise) as $key => $value) {
                    Expertise::create(['name'=>$value,'user_id'=>$user->id]);
                }
            }
            try{
                $data = array(
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => $random_password,
                    'login_url' => env('APP_URL'),
                );
                Mail::send('website.email_templates.registration_employee_email',['data'=>$data],function($message) use($data){
                    $message->to($data['email'], $data['name'])->cc('lcm@yopmail.com', 'Developer')->subject('Account Registration successful');;
                });
            }catch (\Exception $e){

            }//end try catch.
            return redirect(url('attorneyAssociate/attorney-associate'))->with('flash_message',$flashMessage);
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
    public function show(Request $request, $id)
    {
        $model = str_slug('attorneyassociate','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $attorneyassociate = User::with('roles.permissions')->findOrFail($id);
            $roles = Role::whereIn('name',['attorney','associate', 'secretary', 'intern'])->get();
            //$permissions = Permission::weher('');
            // $role = Role::findOrfail($request->id);
            // return $role_permissions = $roles->permissions()->pluck('id')->toArray();
            return view('attorneyAssociate.attorney-associate.show', compact('attorneyassociate', 'roles'));
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
        $model = str_slug('attorneyassociate','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $attorneyassociate = User::findOrFail($id);
            $roles = Role::whereIn('name',['attorney','associate', 'secretary','intern'])->with('permissions')->get();
            $permissions = Permission::whereIn('name',['view-client','view-casefile', 'add-casefile', 'add-paymentmethod', 'view-paymentmethod'])->get();
            return view('attorneyAssociate.attorney-associate.edit', compact('attorneyassociate', 'roles', 'permissions'));
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
        $model = str_slug('attorneyassociate','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'name' => 'required',
			'email' => 'required'
		]);
            extract($request->all());
            $user = User::find($id);
            if ($request->hasFile('resume')){
                $resume = Storage::disk('website')->put('resumes', $request->resume);
                Storage::disk('website')->delete($user->resume);
            }else{
                $resume  = $user->resume;
            }//end if else.
            if ($request->hasFile('certificate')){
                $certificate = Storage::disk('website')->put('certificates', $request->certificate);
                Storage::disk('website')->delete($user->certificate);
            }else{
                $certificate  = $user->certificate;
            }//end if else.
            if ($request->signature){
                $signature = $request->signature;
            }else{
                $signature  = $user->signature;
            }//end if else.
            $requestData = ['name'=>$name,'bar_number'=>$bar_number, 'contact'=>$contact, 'signature'=>$signature, 'email'=>$email, 'resume'=>$resume, 'certificate'=>$certificate];
            User::where('id' ,$id)->update($requestData);
//            if ($file = $request->file('pic')) {
//                $extension = $file->extension()?: 'png';
//                $destinationPath = public_path() . '/storage/uploads/users/';
//                $safeName = str_random(10) . '.' . $extension;
//                $file->move($destinationPath, $safeName);
//                //delete old pic if exists
//                if (isset($user->profile) && File::exists($destinationPath . $user->profile->pic)) {
//                    File::delete($destinationPath . $user->profile->pic);
//                }
//                $pic=$safeName;
//            }else{
//                $pic = $user->profile->pic;
//            }
            if ($file = $request->file('pic')) {
                $extension = $file->extension()?: 'png';
                $destinationPath = public_path() . '/storage/uploads/users/';
                $safeName = str_random(10) . '.' . $extension;
                $file->move($destinationPath, $safeName);
                //delete old pic if exists
                if (File::exists($destinationPath . $request->file('pic'))) {
                    File::delete($destinationPath . $request->file('pic'));
                }
                //save new file path into db
                $pic = $safeName;
            }else{
                $pic = $user->profile->pic;
            }
            $profile = ['address'=>$address,'dob'=>$dob,'pic'=>$pic,'bio'=>$bio];
            Profile::where('user_id', $id)->update($profile);
            if ($user!=null) {
                foreach (explode(',', $request->expertise) as $key => $value) {
                    Expertise::create(['name'=>$value,'user_id'=>$user->id]);
                }
            }
            return redirect('attorneyAssociate/attorney-associate')->with('flash_message', 'AttorneyAssociate updated!');
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
        $model = str_slug('attorneyassociate','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            AttorneyAssociate::destroy($id);

            return redirect('attorneyAssociate/attorney-associate')->with('flash_message', 'AttorneyAssociate deleted!');
        }
        return response(view('403'), 403);

    }
    public function getRoleDetails($role){
        if ($role=='custom_role'){
            $permissions = Permission::whereIn('id',[6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37])->get();
            return (string) view('attorneyAssociate.attorney-associate.all_permissions',compact('permissions'));
        }else{
            $role = Role::with('permissions')->where('name',$role)->first();
            return (string) view('attorneyAssociate.attorney-associate.role_permissions',compact('role'));
        }//end if else.
    }//end getRoleDetails function.
}
