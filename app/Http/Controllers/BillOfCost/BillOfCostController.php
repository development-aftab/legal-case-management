<?php

namespace App\Http\Controllers\BillOfCost;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\User;
use App\BillOfCost;
use App\CaseFile;
use View;
use PhpWord;
use Illuminate\Http\Request;

class BillOfCostController extends Controller
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
        $model = str_slug('billofcost','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $billofcost = BillOfCost::where('case_id', 'LIKE', "%$keyword%")
                ->paginate($perPage);
                $lcm = User::where('id', '2')->get();
            } else {
                $billofcost = BillOfCost::paginate($perPage);
                $lcm = User::where('id', '2')->get();
            }

            return view('billOfCost.bill-of-cost.index', compact('billofcost', 'lcm'));
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
        $model = str_slug('billofcost','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('billOfCost.bill-of-cost.create');
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
    public function store(Request $request){
        $model = str_slug('billofcost','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            $case_id = CaseFile::where('id', $request->case_id)->first();
            $requestData['bill_noti'] = 0;
            $billofcost = BillOfCost::create($requestData);
    
            $phpWord = new \PhpOffice\PhpWord\PhpWord();
            $section = $phpWord->addSection();
            $billofcost = BillOfCost::with('casefile.originatingProcess.orignatingProcesseds')->findOrFail($billofcost->id);
            $lcm = User::where('id', 2)->get();
            $content = View::make('website.word.cost', ['billofcost'=>$billofcost, 'lcm'=>$lcm])->render();
            \PhpOffice\PhpWord\Shared\Html::addHtml($section, $content);
            
            $directory = public_path('website/'. $case_id->name_of_parties .'/Accounts');
            $filename = 'billofcost'. $billofcost->id .'.docx';
            $filepath = $directory . '/' . $filename;
            
            $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
            $objWriter->save($filepath);

            // Upload the file to Dropbox
            $dropboxFolderPath = $case_id->name_of_parties . '/Accounts';
            $fileToUpload = new \Illuminate\Http\File($filepath);
            $this->uploadToDropBox($dropboxFolderPath, $fileToUpload,$filename,$this->accessToken);
    
            return redirect('have_billofcost/' . $requestData['case_id'])->with('flash_message', 'BillOfCost added!');
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
        $model = str_slug('billofcost','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $billofcost = BillOfCost::findOrFail($id);
            $lcm = User::where('id', '2')->get();
            return view('billOfCost.bill-of-cost.show', compact('billofcost', 'lcm'));
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
        $model = str_slug('billofcost','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $billofcost = BillOfCost::findOrFail($id);
            return view('billOfCost.bill-of-cost.edit', compact('billofcost'));
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
        $model = str_slug('billofcost','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $billofcost = BillOfCost::findOrFail($id);
             $billofcost->update($requestData);

             return redirect('billOfCost/bill-of-cost')->with('flash_message', 'BillOfCost updated!');
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
        $model = str_slug('billofcost','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            BillOfCost::destroy($id);

            return back()->with('flash_message', 'BillOfCost deleted!');
        }
        return response(view('403'), 403);

    }
}
