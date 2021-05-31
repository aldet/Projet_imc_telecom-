<div class="form-group {{$errors->has('code_mache') ? 'has-danger' : ''}}">
    <label class="form-control-label" for="form_code_marche">{{__('Code marché')}}</label>
    <input type="text" name="code_marche" id="form_code_marche" required class="form-control {{$errors->has('code_marche') ? 'is-invalid':''}}" placeholder="{{__('code marche')}}" value="{{$marche->code_marche}}">
    @include('alerts.feedback',['field'=>'code_marche'])
</div>
<div class="form-group {{$errors->has('label_mache') ? 'has-danger' : ''}}">
    <label class="form-control-label" for="form_label_marche">{{__('label marché')}}</label>
    <input type="text" name="label_marche" id="form_label_marche" required class="form-control {{$errors->has('label_marche') ? 'is-invalide':''}}" placeholder="{{__('nom marche')}}" value="{{$marche->label_marche}}">
    @include('alerts.feedback',['field'=>'label_marche'])
</div>

