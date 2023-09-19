<?php

namespace App\Http\Controllers\Allocatur;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Allocatur;
use App\CaseFile;
use Storage;
use Illuminate\Http\Request;

class AllocaturController extends Controller
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
        $model = str_slug('allocatur','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $allocatur = Allocatur::where('case_file_id', 'LIKE', "%$keyword%")
                ->orWhere('attachment', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $allocatur = Allocatur::paginate($perPage);
            }

            return view('allocatur.allocatur.index', compact('allocatur'));
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
        $model = str_slug('allocatur','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('allocatur.allocatur.create');
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
        $model = str_slug('allocatur','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            extract( $request->all());
            $requestData = $request->all();
            $casefile = CaseFile::where('id',$request->case_file_id)->first();
            if($request->hasFile('attachment')){
                // $attachment = Storage::disk('website')->put('order_attachment', $request->attachment);
                $attachment = Storage::disk('website')->put($casefile->name_of_parties.'/Accounts/', $request->attachment);
                $this->uploadToDropBox($casefile->name_of_parties.'/Accounts',$request->attachment,array_reverse(explode('/',$attachment))[0],$this->accessToken);
            }else{
            }
            $requestData['attachment'] = $attachment;
            Allocatur::create($requestData);
            return back()->with('flash_message', 'Allocatur added!');
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
        $model = str_slug('allocatur','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $allocatur = Allocatur::findOrFail($id);
            return view('allocatur.allocatur.show', compact('allocatur'));
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
        $model = str_slug('allocatur','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $allocatur = Allocatur::findOrFail($id);
            return view('allocatur.allocatur.edit', compact('allocatur'));
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
        $model = str_slug('allocatur','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $allocatur = Allocatur::findOrFail($id);
             $allocatur->update($requestData);

             return redirect('allocatur/allocatur')->with('flash_message', 'Allocatur updated!');
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
        $model = str_slug('allocatur','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Allocatur::destroy($id);

            return back()->with('flash_message', 'Allocatur deleted!');
        }
        return response(view('403'), 403);

    }
}
