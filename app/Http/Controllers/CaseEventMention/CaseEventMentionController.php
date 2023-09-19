<?php

namespace App\Http\Controllers\CaseEventMention;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\CaseEventMention;
use Illuminate\Http\Request;

class CaseEventMentionController extends Controller
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
        $model = str_slug('caseeventmention','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $caseeventmention = CaseEventMention::where('case_event_id', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $caseeventmention = CaseEventMention::paginate($perPage);
            }

            return view('caseEventMention.case-event-mention.index', compact('caseeventmention'));
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
        $model = str_slug('caseeventmention','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('caseEventMention.case-event-mention.create');
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
        $model = str_slug('caseeventmention','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            CaseEventMention::create($requestData);
            return redirect('caseEventMention/case-event-mention')->with('flash_message', 'CaseEventMention added!');
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
        $model = str_slug('caseeventmention','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $caseeventmention = CaseEventMention::findOrFail($id);
            return view('caseEventMention.case-event-mention.show', compact('caseeventmention'));
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
        $model = str_slug('caseeventmention','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $caseeventmention = CaseEventMention::findOrFail($id);
            return view('caseEventMention.case-event-mention.edit', compact('caseeventmention'));
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
        $model = str_slug('caseeventmention','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $caseeventmention = CaseEventMention::findOrFail($id);
             $caseeventmention->update($requestData);

             return redirect('caseEventMention/case-event-mention')->with('flash_message', 'CaseEventMention updated!');
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
        $model = str_slug('caseeventmention','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            CaseEventMention::destroy($id);

            return redirect('caseEventMention/case-event-mention')->with('flash_message', 'CaseEventMention deleted!');
        }
        return response(view('403'), 403);

    }
}
