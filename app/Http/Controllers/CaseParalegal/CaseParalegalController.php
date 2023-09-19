<?php

namespace App\Http\Controllers\CaseParalegal;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\CaseParalegal;
use Illuminate\Http\Request;

class CaseParalegalController extends Controller
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
        $model = str_slug('caseparalegal','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $caseparalegal = CaseParalegal::where('case_id', 'LIKE', "%$keyword%")
                ->orWhere('paralegal_id', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $caseparalegal = CaseParalegal::paginate($perPage);
            }

            return view('caseParalegal.case-paralegal.index', compact('caseparalegal'));
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
        $model = str_slug('caseparalegal','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('caseParalegal.case-paralegal.create');
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
        $model = str_slug('caseparalegal','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            CaseParalegal::create($requestData);
            return redirect('caseParalegal/case-paralegal')->with('flash_message', 'CaseParalegal added!');
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
        $model = str_slug('caseparalegal','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $caseparalegal = CaseParalegal::findOrFail($id);
            return view('caseParalegal.case-paralegal.show', compact('caseparalegal'));
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
        $model = str_slug('caseparalegal','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $caseparalegal = CaseParalegal::findOrFail($id);
            return view('caseParalegal.case-paralegal.edit', compact('caseparalegal'));
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
        $model = str_slug('caseparalegal','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $caseparalegal = CaseParalegal::findOrFail($id);
             $caseparalegal->update($requestData);

             return redirect('caseParalegal/case-paralegal')->with('flash_message', 'CaseParalegal updated!');
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
        $model = str_slug('caseparalegal','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            CaseParalegal::destroy($id);

            return redirect('caseParalegal/case-paralegal')->with('flash_message', 'CaseParalegal deleted!');
        }
        return response(view('403'), 403);

    }
}
