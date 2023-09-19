<?php

namespace App\Http\Controllers\OriginatingProcessed;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\OriginatingProcessed;
use Illuminate\Http\Request;

class OriginatingProcessedController extends Controller
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
        $model = str_slug('originatingprocessed','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $originatingprocessed = OriginatingProcessed::where('originate_id', 'LIKE', "%$keyword%")
                ->orWhere('title', 'LIKE', "%$keyword%")
                ->orWhere('file', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $originatingprocessed = OriginatingProcessed::paginate($perPage);
            }

            return view('originatingProcessed.originating-processed.index', compact('originatingprocessed'));
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
        $model = str_slug('originatingprocessed','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('originatingProcessed.originating-processed.create');
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
        $model = str_slug('originatingprocessed','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            // return $request->all();
            extract($request->all());
            if($request->hasFile('image')){
                $image = Storage::disk('website')->put('originating_processed', $request->image);
            }else{
                $image = '';
            }
            $requestData = ['title'=>$title,'image'=>$image];
            OriginatingProcessed::create($requestData);
            return back()->with('flash_message', 'OriginatingProcessed added!');
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
        $model = str_slug('originatingprocessed','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $originatingprocessed = OriginatingProcessed::findOrFail($id);
            return view('originatingProcessed.originating-processed.show', compact('originatingprocessed'));
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
        $model = str_slug('originatingprocessed','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $originatingprocessed = OriginatingProcessed::findOrFail($id);
            return view('originatingProcessed.originating-processed.edit', compact('originatingprocessed'));
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
        $model = str_slug('originatingprocessed','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $originatingprocessed = OriginatingProcessed::findOrFail($id);
             $originatingprocessed->update($requestData);

             return redirect('originatingProcessed/originating-processed')->with('flash_message', 'OriginatingProcessed updated!');
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
        $model = str_slug('originatingprocessed','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            OriginatingProcessed::destroy($id);

            return redirect('originatingProcessed/originating-processed')->with('flash_message', 'File deleted successfully!');
        }
        return response(view('403'), 403);

    }
}
