<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
            </button>
            <h1 class="modal-title">Client Case</h1></div>
        <div class="modal-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">CV Number</th>
                        <th scope="col">Name Of Parties</th>
                        <th scope="col">Client Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Next Court Date</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{@$caseFile->caseInvoice->invoice_number??''}}</td>
                            <td>{{@$caseFile->name_of_parties??''}}</td>
                            <td>{{@$caseFile->client->name??''}}</td>
                            @if($caseFile->status == 0)
                                <td class="">
                                    Complete
                                </td>
                            @else
                                <td class="">
                                    Active
                                </td>
                            @endif
                            <td>{{@$caseFile->courtAttendantsNote->next_court_date??'Not Available'}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>