<div class="form-group {{$errors->has('name_statut') ? 'has-danger':""}}">
    <label class="form-control-label" for="form_name_statut">{{('Statut')}}</label>
    <input type="text" name="name_statut" id="form_name_statut" required class="form-control {{$errors->has('name_statut') ? 'is-invalid' : ''}}" placeholder="{{__('statut')}}" value="{{$statut->name_statut}}">
    @include('alerts.feedback',['field'=>'name_statut'])
</div>
<div class="form-group">
    <label for="exampleFormControlSelect2">Type motif</label>
    <select class="form-control" name="type_statut" id="exampleFormControlSelect2">
        <option>client</option>
        <option>rdv</option>
    </select>
</div>