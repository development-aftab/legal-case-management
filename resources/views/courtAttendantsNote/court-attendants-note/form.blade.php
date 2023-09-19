<div class="form-group {{ $errors->has('case_file_id') ? 'has-error' : ''}}">
    <label for="case_file_id" class="col-md-4 control-label">{{ 'Case File Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="case_file_id" type="text" id="case_file_id" value="{{ $courtattendantsnote->case_file_id??''}}" >
        {!! $errors->first('case_file_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
    <label for="category_id" class="col-md-4 control-label">{{ 'Category Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="category_id" type="number" id="category_id" value="{{ $courtattendantsnote->category_id??''}}" >
        {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('date_time') ? 'has-error' : ''}}">
    <label for="date_time" class="col-md-4 control-label">{{ 'Date Time' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="date_time" type="text" id="date_time" value="{{ $courtattendantsnote->date_time??''}}" >
        {!! $errors->first('date_time', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('attachment') ? 'has-error' : ''}}">
    <label for="attachment" class="col-md-4 control-label">{{ 'Attachment' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="attachment" type="text" id="attachment" value="{{ $courtattendantsnote->attachment??''}}" >
        {!! $errors->first('attachment', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('note') ? 'has-error' : ''}}">
    <label for="note" class="col-md-4 control-label">{{ 'Note' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="note" type="number" id="note" value="{{ $courtattendantsnote->note??''}}" >
        {!! $errors->first('note', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText??'Create' }}">
    </div>
</div>
