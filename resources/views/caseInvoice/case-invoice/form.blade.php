<div class="form-group {{ $errors->has('date') ? 'has-error' : ''}}">
    <label for="date" class="col-md-4 control-label">{{ 'Date' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="date" type="text" id="date" value="{{ $caseinvoice->date??''}}" >
        {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('vat_number') ? 'has-error' : ''}}">
    <label for="vat_number" class="col-md-4 control-label">{{ 'Vat Number' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="vat_number" type="text" id="vat_number" value="{{ $caseinvoice->vat_number??''}}" >
        {!! $errors->first('vat_number', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('invoice_number') ? 'has-error' : ''}}">
    <label for="invoice_number" class="col-md-4 control-label">{{ 'Invoice Number' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="invoice_number" type="text" id="invoice_number" value="{{ $caseinvoice->invoice_number??''}}" >
        {!! $errors->first('invoice_number', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('subject') ? 'has-error' : ''}}">
    <label for="subject" class="col-md-4 control-label">{{ 'Subject' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="subject" type="text" id="subject" value="{{ $caseinvoice->subject??''}}" >
        {!! $errors->first('subject', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="col-md-4 control-label">{{ 'Description' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="description" type="text" id="description" value="{{ $caseinvoice->description??''}}" >
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('senior_counsel_fees') ? 'has-error' : ''}}">
    <label for="senior_counsel_fees" class="col-md-4 control-label">{{ 'Senior Counsel Fees' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="senior_counsel_fees" type="text" id="senior_counsel_fees" value="{{ $caseinvoice->senior_counsel_fees??''}}" >
        {!! $errors->first('senior_counsel_fees', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('junior_counsel_fees') ? 'has-error' : ''}}">
    <label for="junior_counsel_fees" class="col-md-4 control-label">{{ 'Junior Counsel Fees' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="junior_counsel_fees" type="text" id="junior_counsel_fees" value="{{ $caseinvoice->junior_counsel_fees??''}}" >
        {!! $errors->first('junior_counsel_fees', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('instructing_attorney_fees') ? 'has-error' : ''}}">
    <label for="instructing_attorney_fees" class="col-md-4 control-label">{{ 'Instructing Attorney Fees' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="instructing_attorney_fees" type="text" id="instructing_attorney_fees" value="{{ $caseinvoice->instructing_attorney_fees??''}}" >
        {!! $errors->first('instructing_attorney_fees', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('vat_value') ? 'has-error' : ''}}">
    <label for="vat_value" class="col-md-4 control-label">{{ 'Vat Value' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="vat_value" type="text" id="vat_value" value="{{ $caseinvoice->vat_value??''}}" >
        {!! $errors->first('vat_value', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('total') ? 'has-error' : ''}}">
    <label for="total" class="col-md-4 control-label">{{ 'Total' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="total" type="text" id="total" value="{{ $caseinvoice->total??''}}" >
        {!! $errors->first('total', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText??'Create' }}">
    </div>
</div>
