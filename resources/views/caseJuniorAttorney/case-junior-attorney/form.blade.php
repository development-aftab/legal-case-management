<div class="form-group {{ $errors->has('case_id') ? 'has-error' : ''}}">
    <label for="case_id" class="col-md-4 control-label">{{ 'Case Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="case_id" type="number" id="case_id" value="{{ $casejuniorattorney->case_id??''}}" >
        {!! $errors->first('case_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('junior_attorney_id') ? 'has-error' : ''}}">
    <label for="junior_attorney_id" class="col-md-4 control-label">{{ 'Junior Attorney Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="junior_attorney_id" type="number" id="junior_attorney_id" value="{{ $casejuniorattorney->junior_attorney_id??''}}" >
        {!! $errors->first('junior_attorney_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText??'Create' }}">
    </div>
</div>
