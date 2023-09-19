            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                        </button>
                        <h1 class="modal-title">Assign To New Attorney </h1></div>
                    <div class="modal-body">
                        <form method="POST" action="{{ url('/assignedCase/assigned-case') }}" accept-charset="UTF-8"
                            class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="old_attorney_id" id="old_attorney_id" value="{{$client->attorney_associate_id}}">
                            <input type="hidden" name="client_id" id="client_id" value="{{$client->id}}">
                            <input type="hidden" name="case_id" id="case_id" value="{{$case_id}}">
                            <input type="hidden" name="status" value="1">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">Attorney Name</th>
                                        <th>Email</th>
                                        <th scope="col">Expertise</th>
                                        <th scope="col">Select</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($attorney as $item)
                                            <tr>
                                                <td>{{$item->name??''}}</td>
                                                <td>{{$item->email??''}}</td>
                                                <td>
                                                    <select class="form-control" name="" id="">
                                                        @foreach($item->expertise as $value)
                                                            <option value="">{{$value->name??''}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    {{-- <div class="custom_radio">
                                                    <input type="radio" id="row1" name="" >
                                                    <label for="row1"></label>
                                                    </div> --}}
                                                    <div class="custom_check">
                                                        <input type="radio" name="new_attorney_id" value="{{ $item->id }}">
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn_black btn_block">Assign Attorney</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>