<?php

namespace App\Http\Controllers\CaseJuniorCounsel;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\CaseJuniorCounsel;
use Illuminate\Http\Request;

class CaseJuniorCounselController extends Controller
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
        $model = str_slug('casejuniorcounsel','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $casejuniorcounsel = CaseJuniorCounsel::where('junior_counsel_id', 'LIKE', "%$keyword%")
                ->orWhere('case_id', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $casejuniorcounsel = CaseJuniorCounsel::paginate($perPage);
            }

            return view('caseJuniorCounsel.case-junior-counsel.index', compact('casejuniorcounsel'));
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
        $model = str_slug('casejuniorcounsel','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('caseJuniorCounsel.case-junior-counsel.create');
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
        $model = str_slug('casejuniorcounsel','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            CaseJuniorCounsel::create($requestData);
            return redirect('caseJuniorCounsel/case-junior-counsel')->with('flash_message', 'CaseJuniorCounsel added!');
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
        $model = str_slug('casejuniorcounsel','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $casejuniorcounsel = CaseJuniorCounsel::findOrFail($id);
            return view('caseJuniorCounsel.case-junior-counsel.show', compact('casejuniorcounsel'));
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
        $model = str_slug('casejuniorcounsel','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $casejuniorcounsel = CaseJuniorCounsel::findOrFail($id);
            return view('caseJuniorCounsel.case-junior-counsel.edit', compact('casejuniorcounsel'));
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
        $model = str_slug('casejuniorcounsel','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $casejuniorcounsel = CaseJuniorCounsel::findOrFail($id);
             $casejuniorcounsel->update($requestData);

             return redirect('caseJuniorCounsel/case-junior-counsel')->with('flash_message', 'CaseJuniorCounsel updated!');
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
        $model = str_slug('casejuniorcounsel','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            CaseJuniorCounsel::destroy($id);

            return redirect('caseJuniorCounsel/case-junior-counsel')->with('flash_message', 'CaseJuniorCounsel deleted!');
        }
        return response(view('403'), 403);

    }
}
