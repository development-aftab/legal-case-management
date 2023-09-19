<div class="form-group {{ $errors->has('case_file_id') ? 'has-error' : ''}}">
    <label for="case_file_id" class="col-md-4 control-label">{{ 'Case File Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="case_file_id" type="number" id="case_file_id" value="{{ $letter->case_file_id??''}}" >
        {!! $errors->first('case_file_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('attachment') ? 'has-error' : ''}}">
    <label for="attachment" class="col-md-4 control-label">{{ 'Attachment' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="attachment" type="text" id="attachment" value="{{ $letter->attachment??''}}" >
        {!! $errors->first('attachment', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText??'Create' }}">
    </div>
</div>
