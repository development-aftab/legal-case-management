<?php

namespace App\Http\Controllers\CaseTag;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\CaseTag;
use Illuminate\Http\Request;

class CaseTagController extends Controller
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
        $model = str_slug('casetag','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $casetag = CaseTag::where('name', 'LIKE', "%$keyword%")
                ->orWhere('case_id', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $casetag = CaseTag::paginate($perPage);
            }

            return view('caseTag.case-tag.index', compact('casetag'));
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
        $model = str_slug('casetag','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('caseTag.case-tag.create');
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
        $model = str_slug('casetag','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            CaseTag::create($requestData);
            return redirect('caseTag/case-tag')->with('flash_message', 'CaseTag added!');
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
        $model = str_slug('casetag','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $casetag = CaseTag::findOrFail($id);
            return view('caseTag.case-tag.show', compact('casetag'));
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
        $model = str_slug('casetag','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $casetag = CaseTag::findOrFail($id);
            return view('caseTag.case-tag.edit', compact('casetag'));
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
        $model = str_slug('casetag','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $casetag = CaseTag::findOrFail($id);
             $casetag->update($requestData);

             return redirect('caseTag/case-tag')->with('flash_message', 'CaseTag updated!');
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
        $model = str_slug('casetag','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            CaseTag::destroy($id);

            return redirect('caseTag/case-tag')->with('flash_message', 'CaseTag deleted!');
        }
        return response(view('403'), 403);

    }
}
