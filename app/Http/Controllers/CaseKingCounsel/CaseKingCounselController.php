<?php

namespace App\Http\Controllers\CaseKingCounsel;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\CaseKingCounsel;
use Illuminate\Http\Request;

class CaseKingCounselController extends Controller
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
        $model = str_slug('casekingcounsel','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $casekingcounsel = CaseKingCounsel::where('case_id', 'LIKE', "%$keyword%")
                ->orWhere('king_counsel_id', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $casekingcounsel = CaseKingCounsel::paginate($perPage);
            }

            return view('caseKingCounsel.case-king-counsel.index', compact('casekingcounsel'));
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
        $model = str_slug('casekingcounsel','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('caseKingCounsel.case-king-counsel.create');
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
        $model = str_slug('casekingcounsel','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            CaseKingCounsel::create($requestData);
            return redirect('caseKingCounsel/case-king-counsel')->with('flash_message', 'CaseKingCounsel added!');
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
        $model = str_slug('casekingcounsel','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $casekingcounsel = CaseKingCounsel::findOrFail($id);
            return view('caseKingCounsel.case-king-counsel.show', compact('casekingcounsel'));
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
        $model = str_slug('casekingcounsel','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $casekingcounsel = CaseKingCounsel::findOrFail($id);
            return view('caseKingCounsel.case-king-counsel.edit', compact('casekingcounsel'));
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
        $model = str_slug('casekingcounsel','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $casekingcounsel = CaseKingCounsel::findOrFail($id);
             $casekingcounsel->update($requestData);

             return redirect('caseKingCounsel/case-king-counsel')->with('flash_message', 'CaseKingCounsel updated!');
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
        $model = str_slug('casekingcounsel','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            CaseKingCounsel::destroy($id);

            return redirect('caseKingCounsel/case-king-counsel')->with('flash_message', 'CaseKingCounsel deleted!');
        }
        return response(view('403'), 403);

    }
}
