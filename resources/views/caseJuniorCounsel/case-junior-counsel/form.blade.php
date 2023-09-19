<div class="form-group {{ $errors->has('junior_counsel_id') ? 'has-error' : ''}}">
    <label for="junior_counsel_id" class="col-md-4 control-label">{{ 'Junior Counsel Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="junior_counsel_id" type="number" id="junior_counsel_id" value="{{ $casejuniorcounsel->junior_counsel_id??''}}" >
        {!! $errors->first('junior_counsel_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('case_id') ? 'has-error' : ''}}">
    <label for="case_id" class="col-md-4 control-label">{{ 'Case Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="case_id" type="number" id="case_id" value="{{ $casejuniorcounsel->case_id??''}}" >
        {!! $errors->first('case_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText??'Create' }}">
    </div>
</div>
