<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Accounting;
use Illuminate\Http\Request;

class AccountingController extends Controller
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
        $model = str_slug('accounting','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $accounting = Accounting::where('payment_method_id', 'LIKE', "%$keyword%")
                ->orWhere('payment_date', 'LIKE', "%$keyword%")
                ->orWhere('paid_ammount', 'LIKE', "%$keyword%")
                ->orWhere('balance_amount', 'LIKE', "%$keyword%")
                ->orWhere('total_ammount', 'LIKE', "%$keyword%")
                ->orWhere('case_file_id', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $accounting = Accounting::paginate($perPage);
            }

            return view('accounting.accounting.index', compact('accounting'));
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
        $model = str_slug('accounting','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('accounting.accounting.create');
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
        $model = str_slug('accounting','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $requestData = $request->all();
            Accounting::create($requestData);
            return redirect('accounting/accounting')->with('flash_message', 'Accounting added!');
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
        $model = str_slug('accounting','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $accounting = Accounting::findOrFail($id);
            return view('accounting.accounting.show', compact('accounting'));
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
        $model = str_slug('accounting','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $accounting = Accounting::findOrFail($id);
            return view('accounting.accounting.edit', compact('accounting'));
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
        $model = str_slug('accounting','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $accounting = Accounting::findOrFail($id);
             $accounting->update($requestData);

             return redirect('accounting/accounting')->with('flash_message', 'Accounting updated!');
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
        $model = str_slug('accounting','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Accounting::destroy($id);

            return redirect('accounting/accounting')->with('flash_message', 'Accounting deleted!');
        }
        return response(view('403'), 403);

    }
}
