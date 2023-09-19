<?php

namespace App\Http\Controllers\AssignedCase;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\AssignedCase;
use Illuminate\Http\Request;

class AssignedCaseController extends Controller
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
        $model = str_slug('assignedcase','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $assignedcase = AssignedCase::where('new_attorney_id', 'LIKE', "%$keyword%")
                ->orWhere('old_attorney_id', 'LIKE', "%$keyword%")
                ->orWhere('client_id', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $assignedcase = AssignedCase::paginate($perPage);
            }

            return view('assignedCase.assigned-case.index', compact('assignedcase'));
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
        $model = str_slug('assignedcase','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('assignedCase.assigned-case.create');
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
        $model = str_slug('assignedcase','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            AssignedCase::create($requestData);
            return back()->with('flash_message', 'AssignedCase added!');
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
        $model = str_slug('assignedcase','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $assignedcase = AssignedCase::findOrFail($id);
            return view('assignedCase.assigned-case.show', compact('assignedcase'));
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
        $model = str_slug('assignedcase','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $assignedcase = AssignedCase::findOrFail($id);
            return view('assignedCase.assigned-case.edit', compact('assignedcase'));
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
        $model = str_slug('assignedcase','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $assignedcase = AssignedCase::findOrFail($id);
             $assignedcase->update($requestData);

             return redirect('assignedCase/assigned-case')->with('flash_message', 'AssignedCase updated!');
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
        $model = str_slug('assignedcase','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            AssignedCase::destroy($id);

            return redirect('assignedCase/assigned-case')->with('flash_message', 'AssignedCase deleted!');
        }
        return response(view('403'), 403);

    }
}
