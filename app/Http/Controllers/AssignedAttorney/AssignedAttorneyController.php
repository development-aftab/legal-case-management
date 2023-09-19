<?php

namespace App\Http\Controllers\AssignedAttorney;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\AssignedAttorney;
use Illuminate\Http\Request;

class AssignedAttorneyController extends Controller
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
        $model = str_slug('assignedattorney','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $assignedattorney = AssignedAttorney::where('old_attorney_id', 'LIKE', "%$keyword%")
                ->orWhere('new_attorney_id', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $assignedattorney = AssignedAttorney::paginate($perPage);
            }

            return view('assignedAttorney.assigned-attorney.index', compact('assignedattorney'));
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
        $model = str_slug('assignedattorney','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('assignedAttorney.assigned-attorney.create');
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
        
        $model = str_slug('assignedattorney','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            AssignedAttorney::create($requestData);
            return back()->with('flash_message', 'AssignedAttorney added!');
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
        $model = str_slug('assignedattorney','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $assignedattorney = AssignedAttorney::findOrFail($id);
            return view('assignedAttorney.assigned-attorney.show', compact('assignedattorney'));
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
        $model = str_slug('assignedattorney','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $assignedattorney = AssignedAttorney::findOrFail($id);
            return view('assignedAttorney.assigned-attorney.edit', compact('assignedattorney'));
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
        $model = str_slug('assignedattorney','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $assignedattorney = AssignedAttorney::findOrFail($id);
             $assignedattorney->update($requestData);

             return redirect('assignedAttorney/assigned-attorney')->with('flash_message', 'AssignedAttorney updated!');
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
        $model = str_slug('assignedattorney','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            AssignedAttorney::destroy($id);

            return redirect('assignedAttorney/assigned-attorney')->with('flash_message', 'AssignedAttorney deleted!');
        }
        return response(view('403'), 403);

    }
}
