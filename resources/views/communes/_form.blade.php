 <div class="form-group {{$errors->has('name_commune') ? 'has-danger':''}}">
     <label class="form-control-label" for="form_name_commune">{{__('Nom commune')}}</label>
     <input type="text" name="name_commune" id="form_name_commune" required class="form-control {{ $errors->has('name_commune') ? 'is-invalid' : '' }}" placeholder="{{ __('nom') }}" value="{{ $commune->name_commune}}">
     @include('alerts.feedback', ['field' => 'name'])
 </div>


