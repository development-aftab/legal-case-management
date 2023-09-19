<div class="form-group {{ $errors->has('case_id') ? 'has-error' : ''}}">
    <label for="case_id" class="col-md-4 control-label">{{ 'Case Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="case_id" type="number" id="case_id" value="{{ $casechambersmanager->case_id??''}}" >
        {!! $errors->first('case_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('chambers_manager_id') ? 'has-error' : ''}}">
    <label for="chambers_manager_id" class="col-md-4 control-label">{{ 'Chambers Manager Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="chambers_manager_id" type="number" id="chambers_manager_id" value="{{ $casechambersmanager->chambers_manager_id??''}}" >
        {!! $errors->first('chambers_manager_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText??'Create' }}">
    </div>
</div>
