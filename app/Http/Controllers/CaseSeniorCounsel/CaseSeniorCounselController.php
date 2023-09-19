<?php

namespace App\Http\Controllers\CaseSeniorCounsel;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\CaseSeniorCounsel;
use Illuminate\Http\Request;

class CaseSeniorCounselController extends Controller
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
        $model = str_slug('caseseniorcounsel','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $caseseniorcounsel = CaseSeniorCounsel::where('case_id', 'LIKE', "%$keyword%")
                ->orWhere('senior_counsel_id', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $caseseniorcounsel = CaseSeniorCounsel::paginate($perPage);
            }

            return view('caseSeniorCounsel.case-senior-counsel.index', compact('caseseniorcounsel'));
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
        $model = str_slug('caseseniorcounsel','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('caseSeniorCounsel.case-senior-counsel.create');
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
        $model = str_slug('caseseniorcounsel','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            CaseSeniorCounsel::create($requestData);
            return redirect('caseSeniorCounsel/case-senior-counsel')->with('flash_message', 'CaseSeniorCounsel added!');
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
        $model = str_slug('caseseniorcounsel','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $caseseniorcounsel = CaseSeniorCounsel::findOrFail($id);
            return view('caseSeniorCounsel.case-senior-counsel.show', compact('caseseniorcounsel'));
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
        $model = str_slug('caseseniorcounsel','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $caseseniorcounsel = CaseSeniorCounsel::findOrFail($id);
            return view('caseSeniorCounsel.case-senior-counsel.edit', compact('caseseniorcounsel'));
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
        $model = str_slug('caseseniorcounsel','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $caseseniorcounsel = CaseSeniorCounsel::findOrFail($id);
             $caseseniorcounsel->update($requestData);

             return redirect('caseSeniorCounsel/case-senior-counsel')->with('flash_message', 'CaseSeniorCounsel updated!');
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
        $model = str_slug('caseseniorcounsel','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            CaseSeniorCounsel::destroy($id);

            return redirect('caseSeniorCounsel/case-senior-counsel')->with('flash_message', 'CaseSeniorCounsel deleted!');
        }
        return response(view('403'), 403);

    }
}
