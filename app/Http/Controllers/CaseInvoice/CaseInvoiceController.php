<?php

namespace App\Http\Controllers\CaseInvoice;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\User;
use PDF;
use App\CaseInvoice;
use Illuminate\Http\Request;

class CaseInvoiceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->genrateToken();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */

    public function index(Request $request)
    {
        $model = str_slug('caseinvoice','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $caseinvoice = CaseInvoice::where('date', 'LIKE', "%$keyword%")
                ->orWhere('vat_number', 'LIKE', "%$keyword%")
                ->orWhere('invoice_number', 'LIKE', "%$keyword%")
                ->orWhere('subject', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('senior_counsel_fees', 'LIKE', "%$keyword%")
                ->orWhere('junior_counsel_fees', 'LIKE', "%$keyword%")
                ->orWhere('instructing_attorney_fees', 'LIKE', "%$keyword%")
                ->orWhere('vat_value', 'LIKE', "%$keyword%")
                ->orWhere('total', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $caseinvoice = CaseInvoice::paginate($perPage);
            }

            return view('caseInvoice.case-invoice.index', compact('caseinvoice'));
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
        $model = str_slug('caseinvoice','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('caseInvoice.case-invoice.create');
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
        $model = str_slug('caseinvoice','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $requestData = $request->all();
            $requestData['invoice_noti'] = 0;
            $caseinvoice = CaseInvoice::create($requestData);
            $lcm = User::where('id', 2)->get();
            $pdf = PDF::loadView('website.pdf.invoice', ['caseinvoice' => $caseinvoice, 'lcm' => $lcm]);
            $content = $pdf->output();

            $fileName = 'Invoice_'.$caseinvoice->id;
            $directory = 'website/' . $caseinvoice->caseFile->name_of_parties .'/Accounts';
            $storagePath = public_path($directory);
            $storagePath = str_replace('/', DIRECTORY_SEPARATOR, $storagePath);
            if (!file_exists($storagePath)) {
                mkdir($storagePath, 0755, true);
            }
            $filePath = $storagePath . DIRECTORY_SEPARATOR . $fileName . '.pdf';
            $pdf->save($filePath);

            // Upload to Dropbox
            $folderPath = $caseinvoice->caseFile->name_of_parties . '/Accounts';
            $result = $this->uploadToDropBox($folderPath, $content, $fileName, $this->accessToken,true);

            return redirect('have_invoice/' . $requestData['case_file_id'])->with('flash_message', 'CaseInvoice added!');
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
        $model = str_slug('caseinvoice','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $caseinvoice = CaseInvoice::findOrFail($id);
            $lcm = User::where('id', 2)->get();
            return view('caseInvoice.case-invoice.show', compact('caseinvoice', 'lcm'));
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
        $model = str_slug('caseinvoice','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $caseinvoice = CaseInvoice::findOrFail($id);
            return view('caseInvoice.case-invoice.edit', compact('caseinvoice'));
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
        $model = str_slug('caseinvoice','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $caseinvoice = CaseInvoice::findOrFail($id);
             $caseinvoice->update($requestData);

             return redirect('caseInvoice/case-invoice')->with('flash_message', 'CaseInvoice updated!');
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
        $model = str_slug('caseinvoice','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            CaseInvoice::destroy($id);

            return back()->with('flash_message', 'CaseInvoice deleted!');
        }
        return response(view('403'), 403);

    }
}
