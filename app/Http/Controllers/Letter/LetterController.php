<?php

namespace App\Http\Controllers\Letter;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Letter;
use App\CaseFile;
use Storage;
use Illuminate\Http\Request;

class LetterController extends Controller
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
        $model = str_slug('letter','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $letter = Letter::where('case_file_id', 'LIKE', "%$keyword%")
                ->orWhere('attachment', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $letter = Letter::paginate($perPage);
            }

            return view('letter.letter.index', compact('letter'));
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
        $model = str_slug('letter','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('letter.letter.create');
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
        $model = str_slug('letter','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            extract( $request->all());
            $requestData = $request->all();
            $casefile = CaseFile::where('id',$request->case_file_id)->first();
            if($request->hasFile('attachment')){
                // $attachment = Storage::disk('website')->put('order_attachment', $request->attachment);
                $attachment = Storage::disk('website')->put($casefile->name_of_parties.'/Accounts/', $request->attachment);
                $this->uploadToDropBox($casefile->name_of_parties.'/Accounts',$request->attachment,array_reverse(explode('/', $attachment))[0],$this->accessToken);
            }else{
            }
            $requestData['attachment'] = $attachment;
            Letter::create($requestData);
            return back()->with('flash_message', 'Letter added!');
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
        $model = str_slug('letter','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $letter = Letter::findOrFail($id);
            return view('letter.letter.show', compact('letter'));
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
        $model = str_slug('letter','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $letter = Letter::findOrFail($id);
            return view('letter.letter.edit', compact('letter'));
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
        $model = str_slug('letter','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $letter = Letter::findOrFail($id);
             $letter->update($requestData);

             return redirect('letter/letter')->with('flash_message', 'Letter updated!');
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
        $model = str_slug('letter','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Letter::destroy($id);

            return back()->with('flash_message', 'Letter deleted!');
        }
        return response(view('403'), 403);

    }
}
