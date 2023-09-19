<?php

namespace App\Http\Controllers\ClientAttitude;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\ClientAttitude;
use Illuminate\Http\Request;

class ClientAttitudeController extends Controller
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
        $model = str_slug('clientattitude','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $clientattitude = ClientAttitude::where('name', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $clientattitude = ClientAttitude::paginate($perPage);
            }

            return view('clientAttitude.client-attitude.index', compact('clientattitude'));
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
        $model = str_slug('clientattitude','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('clientAttitude.client-attitude.create');
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
        $model = str_slug('clientattitude','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            ClientAttitude::create($requestData);
            return redirect('clientAttitude/client-attitude')->with('flash_message', 'ClientAttitude added!');
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
        $model = str_slug('clientattitude','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $clientattitude = ClientAttitude::findOrFail($id);
            return view('clientAttitude.client-attitude.show', compact('clientattitude'));
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
        $model = str_slug('clientattitude','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $clientattitude = ClientAttitude::findOrFail($id);
            return view('clientAttitude.client-attitude.edit', compact('clientattitude'));
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
        $model = str_slug('clientattitude','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $clientattitude = ClientAttitude::findOrFail($id);
             $clientattitude->update($requestData);

             return redirect('clientAttitude/client-attitude')->with('flash_message', 'ClientAttitude updated!');
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
        $model = str_slug('clientattitude','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            ClientAttitude::destroy($id);

            return redirect('clientAttitude/client-attitude')->with('flash_message', 'ClientAttitude deleted!');
        }
        return response(view('403'), 403);

    }
}
