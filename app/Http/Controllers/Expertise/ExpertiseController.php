<?php

namespace App\Http\Controllers\Expertise;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Expertise;
use Illuminate\Http\Request;

class ExpertiseController extends Controller
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
        $model = str_slug('expertise','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $expertise = Expertise::where('name', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $expertise = Expertise::paginate($perPage);
            }

            return view('expertise.expertise.index', compact('expertise'));
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
        $model = str_slug('expertise','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('expertise.expertise.create');
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
        $model = str_slug('expertise','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            Expertise::create($requestData);
            return redirect('expertise/expertise')->with('flash_message', 'Expertise added!');
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
        $model = str_slug('expertise','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $expertise = Expertise::findOrFail($id);
            return view('expertise.expertise.show', compact('expertise'));
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
        $model = str_slug('expertise','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $expertise = Expertise::findOrFail($id);
            return view('expertise.expertise.edit', compact('expertise'));
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
        $model = str_slug('expertise','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $expertise = Expertise::findOrFail($id);
             $expertise->update($requestData);

             return redirect('expertise/expertise')->with('flash_message', 'Expertise updated!');
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
        $model = str_slug('expertise','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Expertise::destroy($id);

            return redirect('expertise/expertise')->with('flash_message', 'Expertise deleted!');
        }
        return response(view('403'), 403);

    }
}
