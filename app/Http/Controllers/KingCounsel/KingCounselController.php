<?php

namespace App\Http\Controllers\KingCounsel;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\KingCounsel;
use Illuminate\Http\Request;

class KingCounselController extends Controller
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
        $model = str_slug('kingcounsel','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $kingcounsel = KingCounsel::where('name', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $kingcounsel = KingCounsel::paginate($perPage);
            }

            return view('kingCounsel.king-counsel.index', compact('kingcounsel'));
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
        $model = str_slug('kingcounsel','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('kingCounsel.king-counsel.create');
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
        $model = str_slug('kingcounsel','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            KingCounsel::create($requestData);
            return redirect('kingCounsel/king-counsel')->with('flash_message', 'KingCounsel added!');
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
        $model = str_slug('kingcounsel','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $kingcounsel = KingCounsel::findOrFail($id);
            return view('kingCounsel.king-counsel.show', compact('kingcounsel'));
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
        $model = str_slug('kingcounsel','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $kingcounsel = KingCounsel::findOrFail($id);
            return view('kingCounsel.king-counsel.edit', compact('kingcounsel'));
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
        $model = str_slug('kingcounsel','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $kingcounsel = KingCounsel::findOrFail($id);
             $kingcounsel->update($requestData);

             return redirect('kingCounsel/king-counsel')->with('flash_message', 'KingCounsel updated!');
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
        $model = str_slug('kingcounsel','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            KingCounsel::destroy($id);

            return redirect('kingCounsel/king-counsel')->with('flash_message', 'KingCounsel deleted!');
        }
        return response(view('403'), 403);

    }
}
