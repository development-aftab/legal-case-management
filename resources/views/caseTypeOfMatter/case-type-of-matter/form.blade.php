<div class="form-group {{ $errors->has('case_id') ? 'has-error' : ''}}">
    <label for="case_id" class="col-md-4 control-label">{{ 'Case Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="case_id" type="number" id="case_id" value="{{ $casetypeofmatter->case_id??''}}" >
        {!! $errors->first('case_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('type_of_matter_id') ? 'has-error' : ''}}">
    <label for="type_of_matter_id" class="col-md-4 control-label">{{ 'Type Of Matter Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="type_of_matter_id" type="number" id="type_of_matter_id" value="{{ $casetypeofmatter->type_of_matter_id??''}}" >
        {!! $errors->first('type_of_matter_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText??'Create' }}">
    </div>
</div>
