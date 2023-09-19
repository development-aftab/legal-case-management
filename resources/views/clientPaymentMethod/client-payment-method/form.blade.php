<div class="form-group {{ $errors->has('client_id') ? 'has-error' : ''}}">
    <label for="client_id" class="col-md-4 control-label">{{ 'Client Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="client_id" type="number" id="client_id" value="{{ $clientpaymentmethod->client_id??''}}" >
        {!! $errors->first('client_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('payment_method_id') ? 'has-error' : ''}}">
    <label for="payment_method_id" class="col-md-4 control-label">{{ 'Payment Method Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="payment_method_id" type="number" id="payment_method_id" value="{{ $clientpaymentmethod->payment_method_id??''}}" >
        {!! $errors->first('payment_method_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText??'Create' }}">
    </div>
</div>
