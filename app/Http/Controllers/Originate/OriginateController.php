<?php

namespace App\Http\Controllers\Originate;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Originate;
use Illuminate\Http\Request;

class OriginateController extends Controller
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
        $model = str_slug('originate','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $originate = Originate::where('name', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $originate = Originate::paginate($perPage);
            }

            return view('originate.originate.index', compact('originate'));
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
        $model = str_slug('originate','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('originate.originate.create');
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
        $model = str_slug('originate','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            Originate::create($requestData);
            return redirect('originate/originate')->with('flash_message', 'Originate added!');
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
        $model = str_slug('originate','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $originate = Originate::findOrFail($id);
            return view('originate.originate.show', compact('originate'));
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
        $model = str_slug('originate','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $originate = Originate::findOrFail($id);
            return view('originate.originate.edit', compact('originate'));
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
        $model = str_slug('originate','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $originate = Originate::findOrFail($id);
             $originate->update($requestData);

             return redirect('originate/originate')->with('flash_message', 'Originate updated!');
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
        $model = str_slug('originate','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Originate::destroy($id);

            return redirect('originate/originate')->with('flash_message', 'Originate deleted!');
        }
        return response(view('403'), 403);

    }
}
