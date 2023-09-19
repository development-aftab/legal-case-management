<div class="form-group {{ $errors->has('payment_method_id') ? 'has-error' : ''}}">
    <label for="payment_method_id" class="col-md-4 control-label">{{ 'Payment Method Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="payment_method_id" type="number" id="payment_method_id" value="{{ $accounting->payment_method_id??''}}" >
        {!! $errors->first('payment_method_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('last_payment_date') ? 'has-error' : ''}}">
    <label for="last_payment_date" class="col-md-4 control-label">{{ 'Last Payment Date' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="last_payment_date" type="text" id="last_payment_date" value="{{ $accounting->last_payment_date??''}}" >
        {!! $errors->first('last_payment_date', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('next_payment_date') ? 'has-error' : ''}}">
    <label for="next_payment_date" class="col-md-4 control-label">{{ 'Next Payment Date' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="next_payment_date" type="text" id="next_payment_date" value="{{ $accounting->next_payment_date??''}}" >
        {!! $errors->first('next_payment_date', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('paid_ammount') ? 'has-error' : ''}}">
    <label for="paid_ammount" class="col-md-4 control-label">{{ 'Paid Ammount' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="paid_ammount" type="text" id="paid_ammount" value="{{ $accounting->paid_ammount??''}}" >
        {!! $errors->first('paid_ammount', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('balance_ammount') ? 'has-error' : ''}}">
    <label for="balance_ammount" class="col-md-4 control-label">{{ 'Balance Ammount' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="balance_ammount" type="text" id="balance_ammount" value="{{ $accounting->balance_ammount??''}}" >
        {!! $errors->first('balance_ammount', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('case_file_id') ? 'has-error' : ''}}">
    <label for="case_file_id" class="col-md-4 control-label">{{ 'Case File Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="case_file_id" type="text" id="case_file_id" value="{{ $accounting->case_file_id??''}}" >
        {!! $errors->first('case_file_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText??'Create' }}">
    </div>
</div>
