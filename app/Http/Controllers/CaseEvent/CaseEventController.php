<?php

namespace App\Http\Controllers\CaseEvent;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\CaseEvent;
use Carbon\Carbon;
use App\CaseEventMention;
use Mail;
use Illuminate\Http\Request;

class CaseEventController extends Controller
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
        $model = str_slug('caseevent','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $caseevent = CaseEvent::where('name', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->orWhere('date', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $caseevent = CaseEvent::paginate($perPage);
            }

            return view('caseEvent.case-event.index', compact('caseevent'));
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
        $model = str_slug('caseevent','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('caseEvent.case-event.create');
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
        $model = str_slug('caseevent','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first() != null) {
            $requestData = $request->all();
            $caseEvent = CaseEvent::create($requestData);
            if ($caseEvent != null) {
                if (is_array($request->user_id)) {
                    foreach ($request->user_id as $value) {
                        $caseEventMention = CaseEventMention::create(['case_event_id' => $caseEvent->id, 'user_id' => $value, 'case_event_noti' => 0]);
                        try {
                            $data = [
                                'name' => $caseEventMention->user->name,
                                'email' => $caseEventMention->user->email,
                                'eventName' => $caseEvent->name,
                                'date' => Carbon::parse($caseEvent->date)->format('d M Y'),
                                'time' => Carbon::parse($caseEvent->time)->format('H:i'),
                                'location' => $caseEvent->location,
                                'description' => $caseEvent->description,
                                'login' => env('APP_URL'),
                            ];
                            Mail::send('website.email_templates.event_email', ['data' => $data], function ($message) use ($data) {
                                $message->to($data['email'], $data['name'])
                                    ->cc('lcm@yopmail.com', 'Developer')
                                    ->subject('LCM Account');
                            });
                        } catch (\Exception $e) {
                            return redirect()->back()->with([
                                'message' => 'Your Creation was successful, but unable to send the email. ' . $e->getMessage(),
                                'type' => 'error',
                                'title' => 'Fail'
                            ]);
                        }
                    }
                }
            }

            return back()->with('flash_message', 'CaseEvent added!');
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
        $model = str_slug('caseevent','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $caseevent = CaseEvent::findOrFail($id);
            return view('caseEvent.case-event.show', compact('caseevent'));
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
        $model = str_slug('caseevent','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $caseevent = CaseEvent::findOrFail($id);
            return view('caseEvent.case-event.edit', compact('caseevent'));
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
        $model = str_slug('caseevent','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $caseevent = CaseEvent::findOrFail($id);
             $caseevent->update($requestData);

             return redirect('caseEvent/case-event')->with('flash_message', 'CaseEvent updated!');
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
        $model = str_slug('caseevent','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            CaseEvent::destroy($id);

            return redirect('caseEvent/case-event')->with('flash_message', 'CaseEvent deleted!');
        }
        return response(view('403'), 403);

    }
}
