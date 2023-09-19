<div class="form-group {{ $errors->has('case_id') ? 'has-error' : ''}}">
    <label for="case_id" class="col-md-4 control-label">{{ 'Case Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="case_id" type="number" id="case_id" value="{{ $caseparalegal->case_id??''}}" >
        {!! $errors->first('case_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('paralegal_id') ? 'has-error' : ''}}">
    <label for="paralegal_id" class="col-md-4 control-label">{{ 'Paralegal Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="paralegal_id" type="number" id="paralegal_id" value="{{ $caseparalegal->paralegal_id??''}}" >
        {!! $errors->first('paralegal_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText??'Create' }}">
    </div>
</div>
