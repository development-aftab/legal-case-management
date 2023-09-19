<?php

namespace App\Http\Controllers\ClientPaymentMethod;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\ClientPaymentMethod;
use Illuminate\Http\Request;

class ClientPaymentMethodController extends Controller
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
        $model = str_slug('clientpaymentmethod','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $clientpaymentmethod = ClientPaymentMethod::where('client_id', 'LIKE', "%$keyword%")
                ->orWhere('payment_method_id', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $clientpaymentmethod = ClientPaymentMethod::paginate($perPage);
            }

            return view('clientPaymentMethod.client-payment-method.index', compact('clientpaymentmethod'));
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
        $model = str_slug('clientpaymentmethod','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('clientPaymentMethod.client-payment-method.create');
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
        $model = str_slug('clientpaymentmethod','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            ClientPaymentMethod::create($requestData);
            return redirect('clientPaymentMethod/client-payment-method')->with('flash_message', 'ClientPaymentMethod added!');
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
        $model = str_slug('clientpaymentmethod','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $clientpaymentmethod = ClientPaymentMethod::findOrFail($id);
            return view('clientPaymentMethod.client-payment-method.show', compact('clientpaymentmethod'));
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
        $model = str_slug('clientpaymentmethod','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $clientpaymentmethod = ClientPaymentMethod::findOrFail($id);
            return view('clientPaymentMethod.client-payment-method.edit', compact('clientpaymentmethod'));
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
        $model = str_slug('clientpaymentmethod','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $clientpaymentmethod = ClientPaymentMethod::findOrFail($id);
             $clientpaymentmethod->update($requestData);

             return redirect('clientPaymentMethod/client-payment-method')->with('flash_message', 'ClientPaymentMethod updated!');
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
        $model = str_slug('clientpaymentmethod','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            ClientPaymentMethod::destroy($id);

            return redirect('clientPaymentMethod/client-payment-method')->with('flash_message', 'ClientPaymentMethod deleted!');
        }
        return response(view('403'), 403);

    }
}
