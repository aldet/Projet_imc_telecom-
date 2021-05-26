
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="form-row">
   <div class="form-group col-md-6 {{$errors->has('personne.name') ? 'has-danger' : ''}}">
       <label class="form-control-label" for="form_name_technicien" >{{__('Nom')}}</label>
       <input type="text" name="personne[name_dieuveil]" id="form_name_technicien" required class="form-control {{$errors->has('name') ? 'is-invalid':''}}" placeholder="{{__('nom')}}" value="{{ old('personne.name', $technicien->personne->name) }}">
       @include('alerts.feedback',['field'=>'personne.name'])
   </div>
    <div class="form-group  col-md-6 {{$errors->has('personne.prenom') ? 'has-danger': ''}}">
        <label class="form-control-label" for="form_prenom_technicien">{{ __('Prenom') }}</label>
        <input type="text" name="personne[prenom]" id="form_prenom_technicien" required class="form-control {{ $errors->has('prenom') ? ' is-invalid' : '' }}" placeholder="{{ __('prenom') }}" value="{{ old('personne.prenom', $technicien->personne->prenom) }}">
        @include('alerts.feedback', ['field' => 'personne.prenom'])
    </div>
</div>
<div class="form-group {{$errors->has('email') ? 'has-danger': ''}}">
    <label class="form-control-label" for="form_email_technicien">{{ __('Email') }}</label>
    <input type="email" name="personne[email]" id="form_prenom_client" required class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('email') }}" value="{{  $technicien->personne->email}}">
    @include('alerts.feedback', ['field' => 'email'])
</div>
<div class="form-row">
    <div class="form-group col-md-6 {{$errors->has('matricule') ? 'has-danger': ''}}">
        <label class="form-control-label" for="form_matricule_technicien">{{ __('Matricule') }}</label>
        <input type="text" name="technicien[matricule]" id="form_matricule_personne" required class="form-control {{ $errors->has('matricule') ? ' is-invalid' : '' }}" placeholder="{{ __('matricule') }}" value="{{  old('technicien.matricule', $technicien->matricule) }}">
        @include('alerts.feedback', ['field' => 'matricule'])
    </div>
    <div class="mb-3 col-md-6 {{$errors->has('photo') ? 'has-danger':''}}">
        <label for="form_photo_technicien" class="form-control-label">{{ __('Photo') }}</label>
        <input  type="file" name="photo" id="form_photo_technicien" required class="form-control {{$errors->has('photo') ? 'is-invalid':''}}" >
        @include('alerts.feedback',['field'=>'photo'])
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6 {{$errors->has('personne.adresse') ? 'has-danger': ''}}">
        <label class="form-control-label" for="form_adresse_technicien">{{ __('Adresse') }}</label>
        <input type="text" name="personne[adresse]" id="form_adresse_technicien" required class="form-control {{ $errors->has('adresse') ? ' is-invalid' : '' }}" placeholder="{{ __('adresse') }}" value="{{  old('personne.adresse', $technicien->personne->adresse) }}">
        @include('alerts.feedback', ['field' => 'personne.adresse'])
    </div>
    <div class="form-group col-md-6 {{$errors->has('personne.code_postal') ? 'has-danger': ''}}">
        <label class="form-control-label" for="form_code_postal_technicien">{{ __('Code postal') }}</label>
        <input type="text" name="personne[code_postal]" id="form_code_postal_technicien" required class="form-control {{ $errors->has('code_postal') ? ' is-invalid' : '' }}" placeholder="{{ __('code postal') }}" value="{{ old('personne.code_postal', $technicien->personne->code_postal) }}">
        @include('alerts.feedback', ['field' => 'code_postal'])
    </div>
</div>
<div class="form-group {{$errors->has('personne.adresse_map') ? 'has-danger': ''}}">
    <label class="form-control-label" for="form_adresse_map_client">{{ __('Adresse map') }}</label>
    <input type="text" name="personne[adresse_map]" id="form_adresse_map_client" required class="form-control {{ $errors->has('adresse_map') ? ' is-invalid' : '' }}" placeholder="{{ __('adresse map') }}" value="{{ old('personne.adresse_map', $technicien->personne->adresse_map) }}">
    @include('alerts.feedback', ['field' => 'personne.adresse_map'])
</div>
<div class="form-row">
    <div class="form-group col-md-6 {{$errors->has('personne.telephone') ? 'has-danger': ''}}">
        <label class="form-control-label" for="form_telephone_technicien">{{ __('Numero telephone') }}</label>
        <input type="text" name="personne[telephone]" id="form_telephone_technicien" required class="form-control {{ $errors->has('telephone') ? ' is-invalid' : '' }}" placeholder="{{ __('telephone') }}" value="{{ old('personne.telephone', $technicien->personne->telephone) }}">
        @include('alerts.feedback', ['field' => 'personne.telephone'])
    </div>

    <div class="form-group col-md-6 {{$errors->has('personne.telephone_fixe') ? 'has-danger': ''}}">
        <label class="form-control-label" for="form_telephone_fixe_technicien">{{ __('Telephone fixe') }}</label>
        <input type="text" name="personne[telephone_fixe]" id="form_telephone_fixe_client" required class="form-control {{ $errors->has('telephone') ? ' is-invalid' : '' }}" placeholder="{{ __('telephone fixe') }}" value="{{ old('personne.telephone_fixe',$technicien->personne->telephone_fixe)}}">
        @include('alerts.feedback', ['field' => 'personne.telephone_fixe'])
    </div>
</div>
<div class="form-group">
  <label class="form-control-label">{{__('Competence')}}</label>
  <select name="id_des_competences_du_technicien[]" multiple class="form-control">
      @foreach($competences as $competence)
          <option value="{{$competence->id}}">{{$competence->label}}</option>
      @endforeach
  </select>
</div>



