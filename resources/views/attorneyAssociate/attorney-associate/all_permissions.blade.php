<div class="form-group {{ $errors->has('new_role_name') ? 'has-error' : ''}}">
    <div class="col-md-12">
        <input class="form-control" name="new_role_name" type="text" id="status" value="{{ $attorneyassociate->new_role_name??''}}" required placeholder="Enter New Role" >
        {!! $errors->first('new_role_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="create_user_sec">
    <div class="input-group">
        <ul class="icheck-list">
            @foreach($permissions as $key=>$permission)
                <li>
                    <div style="position: relative;" class="icheckbox_square">
                        <input type="checkbox" class="check" name='premission_id[]' value="{{$permission->id ??''}}" id="square-checkbox-{{$key}}" data-checkbox="icheckbox_square">
                        <label for="square-checkbox-{{$key}}"></label>
                    </div>
                    <label for="square-checkbox-{{$key}}">{{ucwords(str_replace('-',' ',$permission->name ??''))}}</label>
                </li>
            @endforeach
        </ul>
    </div>
</div>

{{-- Leadup --}}

{{-- <div class="form-group {{ $errors->has('new_role_name') ? 'has-error' : ''}}">
    <label for="status" class="col-md-4 control-label">{{ 'New Role' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="new_role_name" type="text" id="status" value="{{ $salesman->new_role_name??''}}" required >
        {!! $errors->first('new_role_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group">
    <label for="status" class="col-md-4 control-label">{{ 'Permissions' }}</label>
    <div class="mb-3 checkbox_btn_box col-md-12">
        @forelse($permissions as $key=>$permission)
            <div class="single_checkbox_btn borderRadius">
                <input type="checkbox" class="form-check-input" name="permissions[]" id="permissions{{$key}}" value="{{$permission->id}}">
                <div class="green_circle"></div>
                <label for="permissions{{$key}}" class="form-label input_labels p-18">{{ucwords(str_replace('-',' ',$permission->name)) }}</label>
            </div>
        @empty
            <div class="col-md-6">
                <input class="form-control"  type="text" value="Not Available" disabled >
            </div>
        @endforelse
    </div>
</div>   --}}