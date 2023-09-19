<?php

namespace App\Http\Controllers\SeniorCounsel;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\SeniorCounsel;
use Illuminate\Http\Request;

class SeniorCounselController extends Controller
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
        $model = str_slug('seniorcounsel','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $seniorcounsel = SeniorCounsel::where('name', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $seniorcounsel = SeniorCounsel::paginate($perPage);
            }

            return view('seniorCounsel.senior-counsel.index', compact('seniorcounsel'));
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
        $model = str_slug('seniorcounsel','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('seniorCounsel.senior-counsel.create');
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
        $model = str_slug('seniorcounsel','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            SeniorCounsel::create($requestData);
            return redirect('seniorCounsel/senior-counsel')->with('flash_message', 'SeniorCounsel added!');
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
        $model = str_slug('seniorcounsel','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $seniorcounsel = SeniorCounsel::findOrFail($id);
            return view('seniorCounsel.senior-counsel.show', compact('seniorcounsel'));
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
        $model = str_slug('seniorcounsel','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $seniorcounsel = SeniorCounsel::findOrFail($id);
            return view('seniorCounsel.senior-counsel.edit', compact('seniorcounsel'));
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
        $model = str_slug('seniorcounsel','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $seniorcounsel = SeniorCounsel::findOrFail($id);
             $seniorcounsel->update($requestData);

             return redirect('seniorCounsel/senior-counsel')->with('flash_message', 'SeniorCounsel updated!');
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
        $model = str_slug('seniorcounsel','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            SeniorCounsel::destroy($id);

            return redirect('seniorCounsel/senior-counsel')->with('flash_message', 'SeniorCounsel deleted!');
        }
        return response(view('403'), 403);

    }
}
