        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                    </button>
                    <h1 class="modal-title">Assigned Clients</h1></div>
                <div class="modal-body">
                    <input type="hidden" name="old_attorney_id" id="old_attorney_id">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Client Name</th>
                                <th>Email</th>
                                <th scope="col">ID No</th>
                                <th scope="col">Marital Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($client as $value)
                                <tr>
                                    <td>{{$value->name??''}}</td>
                                    <td>{{$value->email??''}}</td>
                                    <td>
                                        {{$value->profile->id_number??''}}
                                    </td>
                                    <td>
                                        {{$value->profile->marital_status??''}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>