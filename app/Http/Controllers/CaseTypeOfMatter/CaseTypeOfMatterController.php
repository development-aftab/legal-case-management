<?php

namespace App\Http\Controllers\CaseTypeOfMatter;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\CaseTypeOfMatter;
use Illuminate\Http\Request;

class CaseTypeOfMatterController extends Controller
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
        $model = str_slug('casetypeofmatter','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $casetypeofmatter = CaseTypeOfMatter::where('case_id', 'LIKE', "%$keyword%")
                ->orWhere('type_of_matter_id', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $casetypeofmatter = CaseTypeOfMatter::paginate($perPage);
            }

            return view('caseTypeOfMatter.case-type-of-matter.index', compact('casetypeofmatter'));
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
        $model = str_slug('casetypeofmatter','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('caseTypeOfMatter.case-type-of-matter.create');
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
        $model = str_slug('casetypeofmatter','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            CaseTypeOfMatter::create($requestData);
            return redirect('caseTypeOfMatter/case-type-of-matter')->with('flash_message', 'CaseTypeOfMatter added!');
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
        $model = str_slug('casetypeofmatter','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $casetypeofmatter = CaseTypeOfMatter::findOrFail($id);
            return view('caseTypeOfMatter.case-type-of-matter.show', compact('casetypeofmatter'));
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
        $model = str_slug('casetypeofmatter','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $casetypeofmatter = CaseTypeOfMatter::findOrFail($id);
            return view('caseTypeOfMatter.case-type-of-matter.edit', compact('casetypeofmatter'));
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
        $model = str_slug('casetypeofmatter','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $casetypeofmatter = CaseTypeOfMatter::findOrFail($id);
             $casetypeofmatter->update($requestData);

             return redirect('caseTypeOfMatter/case-type-of-matter')->with('flash_message', 'CaseTypeOfMatter updated!');
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
        $model = str_slug('casetypeofmatter','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            CaseTypeOfMatter::destroy($id);

            return redirect('caseTypeOfMatter/case-type-of-matter')->with('flash_message', 'CaseTypeOfMatter deleted!');
        }
        return response(view('403'), 403);

    }
}
