<?php

namespace App\Http\Controllers\Shortcut;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Shortcut;
use Illuminate\Http\Request;

class ShortcutController extends Controller
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
        $model = str_slug('shortcut','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $shortcut = Shortcut::where('name', 'LIKE', "%$keyword%")
                ->orWhere('url', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $shortcut = Shortcut::paginate($perPage);
            }

            return view('shortcut.shortcut.index', compact('shortcut'));
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
        $model = str_slug('shortcut','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('shortcut.shortcut.create');
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
        $model = str_slug('shortcut','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'name' => 'required',
			'url' => 'required'
		]);
            $requestData = $request->all();
            
            Shortcut::create($requestData);
            return redirect('shortcut/shortcut')->with('flash_message', 'Shortcut added!');
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
        $model = str_slug('shortcut','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $shortcut = Shortcut::findOrFail($id);
            return view('shortcut.shortcut.show', compact('shortcut'));
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
        $model = str_slug('shortcut','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $shortcut = Shortcut::findOrFail($id);
            return view('shortcut.shortcut.edit', compact('shortcut'));
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
        $model = str_slug('shortcut','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'name' => 'required',
			'url' => 'required'
		]);
            $requestData = $request->all();
            
            $shortcut = Shortcut::findOrFail($id);
             $shortcut->update($requestData);

             return redirect('shortcut/shortcut')->with('flash_message', 'Shortcut updated!');
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
        $model = str_slug('shortcut','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Shortcut::destroy($id);

            return redirect('shortcut/shortcut')->with('flash_message', 'Shortcut deleted!');
        }
        return response(view('403'), 403);

    }
}
