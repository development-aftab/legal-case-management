    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                </button>
                <h1 class="modal-title">Master File</h1></div>
            <form name="form1">
            </form>
            <div class="modal-body">
                <form method="POST" action="{{ route('master_file') }}">
                    @csrf
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">E-Files Name</th>
                                <th scope="col">E-Files</th>
                                <th scope="col">Doc Pages</th>
                                <th scope="col">Select</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($caseOriginates as $value)
                                @foreach($value->orignatingProcesseds as $process)
                                    <tr>
                                        <td>{{ $process->title ??''}}</td>
                                        <td><a href="{{ asset('website') }}/{{ $process->file ??''}}" target="_blank" >abc file.pdf</a></td>
                                        <td>{{ preg_match_all("/\/Page\W/", file_get_contents(public_path('website').'/'.$process->file??''))}} Pages</td>
                                        <td>
                                            <div class="custom_check">
                                                <input type="checkbox" name="process_id[]" value="{{ $process->id }}" checked>
                                            </div>
                                        </td>
                                    </tr>   
                                @endforeach
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn_black btn_block">Preview</button>
                    </div>
                </form>
            </div>
        </div>
    </div>