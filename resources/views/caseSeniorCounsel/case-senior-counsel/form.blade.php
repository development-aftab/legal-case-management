<div class="form-group {{ $errors->has('case_id') ? 'has-error' : ''}}">
    <label for="case_id" class="col-md-4 control-label">{{ 'Case Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="case_id" type="number" id="case_id" value="{{ $caseseniorcounsel->case_id??''}}" >
        {!! $errors->first('case_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('senior_counsel_id') ? 'has-error' : ''}}">
    <label for="senior_counsel_id" class="col-md-4 control-label">{{ 'Senior Counsel Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="senior_counsel_id" type="number" id="senior_counsel_id" value="{{ $caseseniorcounsel->senior_counsel_id??''}}" >
        {!! $errors->first('senior_counsel_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText??'Create' }}">
    </div>
</div>
