<div class="form-group {{ $errors->has('case_id') ? 'has-error' : ''}}">
    <label for="case_id" class="col-md-4 control-label">{{ 'Case Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="case_id" type="number" id="case_id" value="{{ $caseoriginate->case_id??''}}" >
        {!! $errors->first('case_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('originate_id') ? 'has-error' : ''}}">
    <label for="originate_id" class="col-md-4 control-label">{{ 'Originate Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="originate_id" type="number" id="originate_id" value="{{ $caseoriginate->originate_id??''}}" >
        {!! $errors->first('originate_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText??'Create' }}">
    </div>
</div>