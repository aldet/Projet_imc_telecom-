@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="form-group {{$errors->has('date_debut') ? 'has-danger' :' '}}">
    <label class="form-control-label" for="form_date_debut">{{__('Date debut')}}</label>
    <input type="date" name="date_debut" id="form_date_debut" required class="form-control {{$errors->has('date_debut') ? 'is-invalid':''}}" placeholder="{{__('Date debut')}}" value="{{$maille->date_debut}}">
    @include('alerts.feedback',['field'=>'date_debut'])
</div>
<div class="form-group {{$errors->has('date_actu') ? 'has-danger':''}}">
    <label class="form-control-label" for="form_date_actu">{{__('Date actuelle')}}</label>
    <input type="date" name="date_actu" id="form_date_actu" required class="form-control {{$errors->has('date_actu') ? 'is-invalid':''}}" placeholder="{{__('Date actuelle')}}" value="{{$maille->date_actu}}">
    @include('alerts.feedback',['field'=>'date_fin'])
</div>
<div class="form-group {{$errors->has('date_fin') ? 'has-danger':''}}">
    <label class="form-control-label" for="form_date_fin">{{__('Date fin')}}</label>
    <input type="date" name="date_fin" id="form_date_fin" required class="form-control {{$errors->has('date_fin') ? 'is-invalid':''}}" placeholder="{{__('Date fin')}}" value="{{$maille->date_fin}}">
    @include('alerts.feedback',['field'=>'date_fin'])
</div>
