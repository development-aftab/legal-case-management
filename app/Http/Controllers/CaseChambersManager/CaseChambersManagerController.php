<?php

namespace App\Http\Controllers\CaseChambersManager;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\CaseChambersManager;
use Illuminate\Http\Request;

class CaseChambersManagerController extends Controller
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
        $model = str_slug('casechambersmanager','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $casechambersmanager = CaseChambersManager::where('case_id', 'LIKE', "%$keyword%")
                ->orWhere('chambers_manager_id', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $casechambersmanager = CaseChambersManager::paginate($perPage);
            }

            return view('caseChambersManager.case-chambers-manager.index', compact('casechambersmanager'));
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
        $model = str_slug('casechambersmanager','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('caseChambersManager.case-chambers-manager.create');
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
        $model = str_slug('casechambersmanager','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            CaseChambersManager::create($requestData);
            return redirect('caseChambersManager/case-chambers-manager')->with('flash_message', 'CaseChambersManager added!');
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
        $model = str_slug('casechambersmanager','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $casechambersmanager = CaseChambersManager::findOrFail($id);
            return view('caseChambersManager.case-chambers-manager.show', compact('casechambersmanager'));
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
        $model = str_slug('casechambersmanager','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $casechambersmanager = CaseChambersManager::findOrFail($id);
            return view('caseChambersManager.case-chambers-manager.edit', compact('casechambersmanager'));
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
        $model = str_slug('casechambersmanager','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $casechambersmanager = CaseChambersManager::findOrFail($id);
             $casechambersmanager->update($requestData);

             return redirect('caseChambersManager/case-chambers-manager')->with('flash_message', 'CaseChambersManager updated!');
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
        $model = str_slug('casechambersmanager','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            CaseChambersManager::destroy($id);

            return redirect('caseChambersManager/case-chambers-manager')->with('flash_message', 'CaseChambersManager deleted!');
        }
        return response(view('403'), 403);

    }
}
