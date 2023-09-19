<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\File;
use App\Order;
use App\CaseFile;
use Storage;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public $accessToken;
    public function __construct(){
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
        $model = str_slug('order','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $order = Order::where('case_file_id', 'LIKE', "%$keyword%")
                ->orWhere('attachment', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $order = Order::paginate($perPage);
            }

            return view('order.order.index', compact('order'));
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
        $model = str_slug('order','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('order.order.create');
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
        $model = str_slug('order','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            extract( $request->all());
            $requestData = $request->all();
            $casefile = CaseFile::where('id',$request->case_file_id)->first();
            if($request->hasFile('attachment')){
                // $attachment = Storage::disk('website')->put('order_attachment', $request->attachment);
                $attachment = Storage::disk('website')->put($casefile->name_of_parties.'/Accounts/', $request->attachment);
                $this->uploadToDropBox($casefile->name_of_parties.'/Accounts',$request->attachment,array_reverse(explode('/', $attachment))[0],$this->accessToken);
            }else{
            }
            $requestData['attachment'] = $attachment;
            
            Order::create($requestData);
            return back()->with('flash_message', 'Order added!');
        }
        return response(view('403'), 403);
    }
//    public function uploadToDropBox($folderPath, $file, $fileName)
//    {
//
//        $endpoint = env('DROPBOX_API_END_POINT');
//
//        $endpoint = env('DROPBOX_API_END_POINT');
//        $accessToken = $this->accessToken;
//
//        $headers = [
//            'Authorization: Bearer ' . $accessToken,
//            'Content-Type: application/octet-stream',
//            'Dropbox-API-Arg: {"path": "/LCM/'.$folderPath.'/'. $fileName . '","mode": "add"}',
//        ];
//        $fileContents = file_get_contents($file->getPathname());
//        $ch = curl_init();
//        curl_setopt($ch, CURLOPT_URL, $endpoint);
//        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//        curl_setopt($ch, CURLOPT_POST, true);
//        curl_setopt($ch, CURLOPT_POSTFIELDS, $fileContents);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        $response = curl_exec($ch);
//        curl_close($ch);
//
//        return $response ;
//
//
//        $headers = [
//            'Authorization' => 'Bearer ' . $this->accessToken,
////            'Content-Type' => 'application/octet-stream',
////            'Dropbox-API-Arg' => json_encode([
////                "path" => "/LCM/".$folderPath.'/'.$fileName,
////                "mode" => "add"
////            ]),
//            'Dropbox-API-Arg' => json_encode([
//                "path" => "/LCM/Accounts/".$fileName,
//                "mode" => "add"
//            ]),
//        ];
//
//        $fileContents = file_get_contents($file->getPathname());
//
//        $response = Http::withHeaders($headers)->withBody($fileContents, 'application/octet-stream')->post($endpoint);
//        if ($response->successful()) {
//            return $response->body();
//        } else {
//            // Handle the error
//            // You might want to throw an exception or log this instead of using var_dump
//            var_dump($response->body());
//            return;
//        }
//    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $model = str_slug('order','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $order = Order::findOrFail($id);
            return view('order.order.show', compact('order'));
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
        $model = str_slug('order','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $order = Order::findOrFail($id);
            return view('order.order.edit', compact('order'));
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
        $model = str_slug('order','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $order = Order::findOrFail($id);
             $order->update($requestData);

             return redirect('order/order')->with('flash_message', 'Order updated!');
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
        $model = str_slug('order','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Order::destroy($id);

            return back()->with('flash_message', 'Order deleted!');
        }
        return response(view('403'), 403);

    }
}
