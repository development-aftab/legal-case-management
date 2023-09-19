<div class="form-group {{ $errors->has('case_id') ? 'has-error' : ''}}">
    <label for="case_id" class="col-md-4 control-label">{{ 'Case Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="case_id" type="number" id="case_id" value="{{ $casekingcounsel->case_id??''}}" >
        {!! $errors->first('case_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('king_counsel_id') ? 'has-error' : ''}}">
    <label for="king_counsel_id" class="col-md-4 control-label">{{ 'King Counsel Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="king_counsel_id" type="number" id="king_counsel_id" value="{{ $casekingcounsel->king_counsel_id??''}}" >
        {!! $errors->first('king_counsel_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText??'Create' }}">
    </div>
</div>
