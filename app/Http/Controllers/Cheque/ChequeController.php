<?php

namespace App\Http\Controllers\Cheque;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Cheque;
use App\CaseFile;
use Storage;
use Illuminate\Http\Request;

class ChequeController extends Controller
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
        $model = str_slug('cheque','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $cheque = Cheque::where('case_file_id', 'LIKE', "%$keyword%")
                ->orWhere('attachment', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $cheque = Cheque::paginate($perPage);
            }

            return view('cheque.cheque.index', compact('cheque'));
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
        $model = str_slug('cheque','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('cheque.cheque.create');
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
        $model = str_slug('cheque','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            extract( $request->all());
            $requestData = $request->all();
            $casefile = CaseFile::where('id',$request->case_file_id)->first();
            if($request->hasFile('attachment')){
                $attachment = Storage::disk('website')->put($casefile->name_of_parties.'/Accounts/', $request->attachment);
                $this->uploadToDropBox($casefile->name_of_parties.'/Accounts',$request->attachment,array_reverse(explode('/', $attachment))[0],$this->accessToken);
            }else{
            }
            $requestData['attachment'] = $attachment;
            Cheque::create($requestData);
            return back()->with('flash_message', 'Cheque added!');
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
        $model = str_slug('cheque','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $cheque = Cheque::findOrFail($id);
            return view('cheque.cheque.show', compact('cheque'));
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
        $model = str_slug('cheque','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $cheque = Cheque::findOrFail($id);
            return view('cheque.cheque.edit', compact('cheque'));
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
        $model = str_slug('cheque','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $cheque = Cheque::findOrFail($id);
             $cheque->update($requestData);

             return redirect('cheque/cheque')->with('flash_message', 'Cheque updated!');
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
        $model = str_slug('cheque','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Cheque::destroy($id);

            return back()->with('flash_message', 'Cheque deleted!');
        }
        return response(view('403'), 403);

    }
}
