<div class="form-group {{$errors->has('label') ? 'has-danger':''}}">
    <label class="form-control-label" for="form_residence_label" >{{__('Type residence')}}</label>
    <input type="text" name="label" id="form_type_residence" required class="form-control {{$errors->has('ype_residence') ? 'is-invalid':''}}" placeholder="{{__('type residence')}}" value="{{$residence->label}}">
    @include('alerts.feedback',['field'=>'label'])
</div>
