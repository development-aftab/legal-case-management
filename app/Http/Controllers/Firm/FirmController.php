<?php

namespace App\Http\Controllers\Firm;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Firm;
use Illuminate\Http\Request;

class FirmController extends Controller
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
        $model = str_slug('firm','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $firm = Firm::where('name', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $firm = Firm::paginate($perPage);
            }

            return view('firm.firm.index', compact('firm'));
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
        $model = str_slug('firm','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('firm.firm.create');
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
        $model = str_slug('firm','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            Firm::create($requestData);
            return redirect('firm/firm')->with('flash_message', 'Firm added!');
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
        $model = str_slug('firm','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $firm = Firm::findOrFail($id);
            return view('firm.firm.show', compact('firm'));
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
        $model = str_slug('firm','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $firm = Firm::findOrFail($id);
            return view('firm.firm.edit', compact('firm'));
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
        $model = str_slug('firm','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $firm = Firm::findOrFail($id);
             $firm->update($requestData);

             return redirect('firm/firm')->with('flash_message', 'Firm updated!');
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
        $model = str_slug('firm','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Firm::destroy($id);

            return redirect('firm/firm')->with('flash_message', 'Firm deleted!');
        }
        return response(view('403'), 403);

    }
}
