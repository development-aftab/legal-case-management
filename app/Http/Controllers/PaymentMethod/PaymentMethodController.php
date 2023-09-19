<?php

namespace App\Http\Controllers\PaymentMethod;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\PaymentMethod;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
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
        $model = str_slug('paymentmethod','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $paymentmethod = PaymentMethod::where('name', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $paymentmethod = PaymentMethod::paginate($perPage);
            }

            return view('paymentMethod.payment-method.index', compact('paymentmethod'));
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
        $model = str_slug('paymentmethod','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('paymentMethod.payment-method.create');
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
        $model = str_slug('paymentmethod','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            PaymentMethod::create($requestData);
            return redirect('paymentMethod/payment-method')->with('flash_message', 'PaymentMethod added!');
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
        $model = str_slug('paymentmethod','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $paymentmethod = PaymentMethod::findOrFail($id);
            return view('paymentMethod.payment-method.show', compact('paymentmethod'));
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
        $model = str_slug('paymentmethod','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $paymentmethod = PaymentMethod::findOrFail($id);
            return view('paymentMethod.payment-method.edit', compact('paymentmethod'));
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
        $model = str_slug('paymentmethod','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $paymentmethod = PaymentMethod::findOrFail($id);
             $paymentmethod->update($requestData);

             return redirect('paymentMethod/payment-method')->with('flash_message', 'PaymentMethod updated!');
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
        $model = str_slug('paymentmethod','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            PaymentMethod::destroy($id);

            return redirect('paymentMethod/payment-method')->with('flash_message', 'PaymentMethod deleted!');
        }
        return response(view('403'), 403);

    }
}
