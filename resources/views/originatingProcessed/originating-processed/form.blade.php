{{-- <div class="form-group {{ $errors->has('originate_id') ? 'has-error' : ''}}">
    <label for="originate_id" class="col-md-4 control-label">{{ 'Originate Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="originate_id" type="text" id="originate_id" value="{{ $originatingprocessed->originate_id??''}}" >
        {!! $errors->first('originate_id', '<p class="help-block">:message</p>') !!}
    </div>
</div> --}}
<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="col-md-4 control-label">{{ 'Title' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="title" type="text" id="title" value="{{ $originatingprocessed->title??''}}" >
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('file') ? 'has-error' : ''}}">
    <label for="file" class="col-md-4 control-label">{{ 'File' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="file" type="file" id="file" accept="application/pdf" value="{{ $originatingprocessed->file??''}}" >
        {!! $errors->first('file', '<p class="help-block">:message</p>') !!}
    </div>
</div>
{{-- <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="col-md-4 control-label">{{ 'Description' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="description" type="text" id="description" value="{{ $originatingprocessed->description??''}}" >
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div> --}}

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText??'Create' }}">
    </div>
</div>
