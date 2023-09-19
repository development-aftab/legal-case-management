<div class="form-group {{ $errors->has('case_event_id') ? 'has-error' : ''}}">
    <label for="case_event_id" class="col-md-4 control-label">{{ 'Case Event Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="case_event_id" type="number" id="case_event_id" value="{{ $caseeventmention->case_event_id??''}}" >
        {!! $errors->first('case_event_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="col-md-4 control-label">{{ 'User Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="user_id" type="number" id="user_id" value="{{ $caseeventmention->user_id??''}}" >
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText??'Create' }}">
    </div>
</div>
