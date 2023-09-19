<div class="form-group {{ $errors->has('old_attorney_id') ? 'has-error' : ''}}">
    <label for="old_attorney_id" class="col-md-4 control-label">{{ 'Old Attorney Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="old_attorney_id" type="number" id="old_attorney_id" value="{{ $assignedattorney->old_attorney_id??''}}" >
        {!! $errors->first('old_attorney_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('new_attorney_id') ? 'has-error' : ''}}">
    <label for="new_attorney_id" class="col-md-4 control-label">{{ 'New Attorney Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="new_attorney_id" type="number" id="new_attorney_id" value="{{ $assignedattorney->new_attorney_id??''}}" >
        {!! $errors->first('new_attorney_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="col-md-4 control-label">{{ 'Status' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="status" type="text" id="status" value="{{ $assignedattorney->status??''}}" >
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText??'Create' }}">
    </div>
</div>
