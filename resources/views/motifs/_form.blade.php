<div class="form-group {{$errors->has('motif') ? 'has-danger' : ''}}">
 <label class="form-control-label" for="form_name_motif">{{__('Motif')}}</label>
 <input type="text" name="motif" required class="form-control {{$errors->has('motif') ? 'is-invalid' :''}}" placeholder="{{__('motif')}}" value="{{$motif->motif}}">
 @include('alerts.feedback',['field'=>'motif'])
</div>
