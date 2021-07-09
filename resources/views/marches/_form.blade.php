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
<div class="form-group {{$errors->has('date_debut') ? 'has-danger' :' '}}">
    <label class="form-control-label" for="form_date_debut">{{__('Date debut')}}</label>
    <input type="date" name="date_debut" id="form_date_debut" required class="form-control {{$errors->has('date_debut') ? 'is-invalid':''}}" placeholder="{{__('Date debut')}}" value="{{$marche->date_debut}}">
    @include('alerts.feedback',['field'=>'date_debut'])
</div>
<div class="form-group {{$errors->has('date_actu') ? 'has-danger':''}}">
    <label class="form-control-label" for="form_date_actu">{{__('Date actuelle')}}</label>
    <input type="date" name="date_actu" id="form_date_actu" required class="form-control {{$errors->has('date_actu') ? 'is-invalid':''}}" placeholder="{{__('Date actuelle')}}" value="{{$marche->date_actu}}">
    @include('alerts.feedback',['field'=>'date_fin'])
</div>
<div class="form-group {{$errors->has('date_fin') ? 'has-danger':''}}">
    <label class="form-control-label" for="form_date_fin">{{__('Date fin')}}</label>
    <input type="date" name="date_fin" id="form_date_fin" required class="form-control {{$errors->has('date_fin') ? 'is-invalid':''}}" placeholder="{{__('Date fin')}}" value="{{$marche->date_fin}}">
    @include('alerts.feedback',['field'=>'date_fin'])
</div>
<div class="form-group">
    <label for="exampleFormControlSelect2">Statut marché</label>
    <select multiple class="form-control" name="statut" id="exampleFormControlSelect2">
        <option>0</option>
        <option>1</option>
        <option>2</option>
        <option>3</option>
    </select>
</div>

<div class="form-group {{$errors->has('date_debut') ? 'has-danger': ''}}">
    <label class="form-control-label" for="form_date_debut">{{__()}}</label>
</div>
