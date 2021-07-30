
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="form-group {{$errors->has('motif') ? 'has-danger' : ''}}">
 <label class="form-control-label" for="form_name_motif">{{__('Motif')}}</label>
 <input type="text" name="motif" required class="form-control {{$errors->has('motif') ? 'is-invalid' :''}}" placeholder="{{__('motif')}}" value="{{$motif->motif}}">
 @include('alerts.feedback',['field'=>'motif'])
</div>

<div class="form-group">
    <label for="exampleFormControlSelect2">Type motif</label>
    <select class="form-control" name="type_motif" id="exampleFormControlSelect2">
        <option>client</option>
        <option>rdv</option>
    </select>
</div>
   