<?php

namespace App\Http\Controllers\TypeOfMatter;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\TypeOfMatter;
use Illuminate\Http\Request;

class TypeOfMatterController extends Controller
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
        $model = str_slug('typeofmatter','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $typeofmatter = TypeOfMatter::where('name', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $typeofmatter = TypeOfMatter::paginate($perPage);
            }

            return view('typeOfMatter.type-of-matter.index', compact('typeofmatter'));
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
        $model = str_slug('typeofmatter','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('typeOfMatter.type-of-matter.create');
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
        $model = str_slug('typeofmatter','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            TypeOfMatter::create($requestData);
            return redirect('typeOfMatter/type-of-matter')->with('flash_message', 'TypeOfMatter added!');
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
        $model = str_slug('typeofmatter','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $typeofmatter = TypeOfMatter::findOrFail($id);
            return view('typeOfMatter.type-of-matter.show', compact('typeofmatter'));
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
        $model = str_slug('typeofmatter','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $typeofmatter = TypeOfMatter::findOrFail($id);
            return view('typeOfMatter.type-of-matter.edit', compact('typeofmatter'));
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
        $model = str_slug('typeofmatter','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $typeofmatter = TypeOfMatter::findOrFail($id);
             $typeofmatter->update($requestData);

             return redirect('typeOfMatter/type-of-matter')->with('flash_message', 'TypeOfMatter updated!');
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
        $model = str_slug('typeofmatter','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            TypeOfMatter::destroy($id);

            return redirect('typeOfMatter/type-of-matter')->with('flash_message', 'TypeOfMatter deleted!');
        }
        return response(view('403'), 403);

    }
}
