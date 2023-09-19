<?php

namespace App\Http\Controllers\CaseOriginate;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\CaseOriginate;
use Illuminate\Http\Request;

class CaseOriginateController extends Controller
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
        $model = str_slug('caseoriginate','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $caseoriginate = CaseOriginate::where('case_id', 'LIKE', "%$keyword%")
                ->orWhere('originate_id', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $caseoriginate = CaseOriginate::paginate($perPage);
            }

            return view('caseOriginate.case-originate.index', compact('caseoriginate'));
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
        $model = str_slug('caseoriginate','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('caseOriginate.case-originate.create');
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
        $model = str_slug('caseoriginate','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            CaseOriginate::create($requestData);
            return redirect('caseOriginate/case-originate')->with('flash_message', 'CaseOriginate added!');
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
        $model = str_slug('caseoriginate','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $caseoriginate = CaseOriginate::findOrFail($id);
            return view('caseOriginate.case-originate.show', compact('caseoriginate'));
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
        $model = str_slug('caseoriginate','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $caseoriginate = CaseOriginate::findOrFail($id);
            return view('caseOriginate.case-originate.edit', compact('caseoriginate'));
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
        $model = str_slug('caseoriginate','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $caseoriginate = CaseOriginate::findOrFail($id);
             $caseoriginate->update($requestData);

             return redirect('caseOriginate/case-originate')->with('flash_message', 'CaseOriginate updated!');
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
        $model = str_slug('caseoriginate','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            CaseOriginate::destroy($id);

            return redirect('caseOriginate/case-originate')->with('flash_message', 'CaseOriginate deleted!');
        }
        return response(view('403'), 403);

    }
}
