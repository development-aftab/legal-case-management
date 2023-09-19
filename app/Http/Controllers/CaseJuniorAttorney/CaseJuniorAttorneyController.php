<?php

namespace App\Http\Controllers\CaseJuniorAttorney;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\CaseJuniorAttorney;
use Illuminate\Http\Request;

class CaseJuniorAttorneyController extends Controller
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
        $model = str_slug('casejuniorattorney','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $casejuniorattorney = CaseJuniorAttorney::where('case_id', 'LIKE', "%$keyword%")
                ->orWhere('junior_attorney_id', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $casejuniorattorney = CaseJuniorAttorney::paginate($perPage);
            }

            return view('caseJuniorAttorney.case-junior-attorney.index', compact('casejuniorattorney'));
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
        $model = str_slug('casejuniorattorney','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('caseJuniorAttorney.case-junior-attorney.create');
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
        $model = str_slug('casejuniorattorney','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            CaseJuniorAttorney::create($requestData);
            return redirect('caseJuniorAttorney/case-junior-attorney')->with('flash_message', 'CaseJuniorAttorney added!');
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
        $model = str_slug('casejuniorattorney','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $casejuniorattorney = CaseJuniorAttorney::findOrFail($id);
            return view('caseJuniorAttorney.case-junior-attorney.show', compact('casejuniorattorney'));
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
        $model = str_slug('casejuniorattorney','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $casejuniorattorney = CaseJuniorAttorney::findOrFail($id);
            return view('caseJuniorAttorney.case-junior-attorney.edit', compact('casejuniorattorney'));
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
        $model = str_slug('casejuniorattorney','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $casejuniorattorney = CaseJuniorAttorney::findOrFail($id);
             $casejuniorattorney->update($requestData);

             return redirect('caseJuniorAttorney/case-junior-attorney')->with('flash_message', 'CaseJuniorAttorney updated!');
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
        $model = str_slug('casejuniorattorney','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            CaseJuniorAttorney::destroy($id);

            return redirect('caseJuniorAttorney/case-junior-attorney')->with('flash_message', 'CaseJuniorAttorney deleted!');
        }
        return response(view('403'), 403);

    }
}
