<?php

namespace App\Http\Controllers\CourtAttendantsNote;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Storage;
use App\CourtAttendantsNote;
use App\CaseFile;
use Illuminate\Http\Request;

class CourtAttendantsNoteController extends Controller
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
        $model = str_slug('courtattendantsnote','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $courtattendantsnote = CourtAttendantsNote::where('case_file_id', 'LIKE', "%$keyword%")
                ->orWhere('category_id', 'LIKE', "%$keyword%")
                ->orWhere('date_time', 'LIKE', "%$keyword%")
                ->orWhere('attachment', 'LIKE', "%$keyword%")
                ->orWhere('note', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                // $courtattendantsnote = CourtAttendantsNote::where('id', 'case_file_id')->paginate($perPage);
                $courtattendantsnote = CourtAttendantsNote::paginate($perPage);
            }

            return view('courtAttendantsNote.court-attendants-note.index', compact('courtattendantsnote'));
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
        $model = str_slug('courtattendantsnote','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('courtAttendantsNote.court-attendants-note.create');
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
        $model = str_slug('courtattendantsnote','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            extract($request->all());   
            $case_file = CaseFile::where('id',$case_file_id)->first();
            if($request->hasFile('attachment')){
                // $attachment = Storage::disk('website')->put('attachment', $request->attachment);
                $attachment = Storage::disk('website')->put($case_file->name_of_parties.'/Court Attendance Notes', $request->attachment);
                $this->uploadToDropBox($case_file->name_of_parties.'/Court Attendance Notes',$request->attachment,array_reverse(explode('/',$attachment))[0],$this->accessToken);
            }else{
                $attachment = '';
            }
            $nextCourtCategoryId = $request->filled('next_court_category_id') ? $next_court_category_id : null;
            $requestData = ['case_file_id'=>$case_file_id,'category_id'=>$category_id, 'date'=>$date, 'check_in'=>$check_in , 'check_out'=>$check_out , 'attachment'=>$attachment, 'next_court_date'=>$next_court_date, 'next_court_category_id'=>$nextCourtCategoryId , 'note'=>$note];
            CourtAttendantsNote::create($requestData);
            return redirect(url('court_attendants_notes',$case_file_id))->with('flash_message', 'CourtAttendanceNote added!');
//            return redirect('court_attendants_notes')->with('flash_message', 'CourtAttendantsNote added!');
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
        $model = str_slug('courtattendantsnote','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $courtattendantsnote = CourtAttendantsNote::findOrFail($id);
            return view('courtAttendantsNote.court-attendants-note.show', compact('courtattendantsnote'));
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
        $model = str_slug('courtattendantsnote','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $courtattendantsnote = CourtAttendantsNote::findOrFail($id);
            return view('courtAttendantsNote.court-attendants-note.edit', compact('courtattendantsnote'));
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
        $model = str_slug('courtattendantsnote','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $courtattendantsnote = CourtAttendantsNote::findOrFail($id);
             $courtattendantsnote->update($requestData);

             return redirect('courtAttendantsNote/court-attendants-note')->with('flash_message', 'CourtAttendantsNote updated!');
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
        $model = str_slug('courtattendantsnote','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            CourtAttendantsNote::destroy($id);

            return redirect('courtAttendantsNote/court-attendants-note')->with('flash_message', 'CourtAttendantsNote deleted!');
        }
        return response(view('403'), 403);

    }
}
