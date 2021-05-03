<div class="form-row">
   <div class="form-group col-md-6 {{$errors->has('name') ? 'has-danger' : ''}}">
       <label class="form-control-label" for="form_name_technicien" >{{__('Nom')}}</label>
       <input type="text" name="name" id="form_name_technicien" required class="form-control {{$errors->has('name') ? 'is-invalid':''}}" placeholder="{{__('nom')}}" value="{{$technicien->personne->name}}">
       @include('alerts.feedback',['field'=>'name'])
   </div>
    <div class="form-group  col-md-6 {{$errors->has('prenom') ? 'has-danger': ''}}">
        <label class="form-control-label" for="form_prenom_technicien">{{ __('Prenom') }}</label>
        <input type="text" name="personne[prenom]" id="form_prenom_technicien" required class="form-control {{ $errors->has('prenom') ? ' is-invalid' : '' }}" placeholder="{{ __('prenom') }}" value="{{$technicien->personne->prenom }}">
        @include('alerts.feedback', ['field' => 'prenom'])
    </div>
</div>
<div class="form-group {{$errors->has('email') ? 'has-danger': ''}}">
    <label class="form-control-label" for="form_email_client">{{ __('Email') }}</label>
    <input type="email" name="personne[email]" id="form_email_technicien" required class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('email') }}" value="{{$technicien->personne->email}}">
    @include('alerts.feedback', ['field' => 'email'])
</div>
<div class="form-group {{$errors->has('matricule') ? 'has-danger': ''}}">
    <label class="form-control-label" for="form_matricule_technicien">{{ __('Matricule') }}</label>
    <input type="text" name="technicien[matricule]" id="form_matricule_personne" required class="form-control {{ $errors->has('matricule') ? ' is-invalid' : '' }}" placeholder="{{ __('matricule') }}" value="{{$technicien->matricule}}">
    @include('alerts.feedback', ['field' => 'matricule'])
</div>
<div class="form-row">
    <div class="form-group col-md-6 {{$errors->has('adresse') ? 'has-danger': ''}}">
        <label class="form-control-label" for="form_adresse_technicien">{{ __('Adresse') }}</label>
        <input type="text" name="personne[adresse]" id="form_adresse_technicien" required class="form-control {{ $errors->has('adresse') ? ' is-invalid' : '' }}" placeholder="{{ __('adresse') }}" value="{{$technicien->personne->adresse }}">
        @include('alerts.feedback', ['field' => 'adresse'])
    </div>
    <div class="form-group col-md-6 {{$errors->has('code_postal') ? 'has-danger': ''}}">
        <label class="form-control-label" for="form_code_postal_technicien">{{ __('Code postal') }}</label>
        <input type="text" name="personne[code_postal]" id="form_code_postal_technicien" required class="form-control {{ $errors->has('code_postal') ? ' is-invalid' : '' }}" placeholder="{{ __('code postal') }}" value="{{$technicien->personne->code_postal }}">
        @include('alerts.feedback', ['field' => 'code_postal'])
    </div>
</div>
<div class="form-group {{$errors->has('adresse_map') ? 'has-danger': ''}}">
    <label class="form-control-label" for="form_adresse_map_client">{{ __('Adresse map') }}</label>
    <input type="text" name="personne[adresse_map]" id="form_adresse_map_client" required class="form-control {{ $errors->has('adresse_map') ? ' is-invalid' : '' }}" placeholder="{{ __('adresse map') }}" value="{{$technicien->personne->adresse_map}}">
    @include('alerts.feedback', ['field' => 'adresse_map'])
</div>
<div class="form-row">
    <div class="form-group col-md-6 {{$errors->has('telephone') ? 'has-danger': ''}}">
        <label class="form-control-label" for="form_telephone_technicien">{{ __('Numero telephone') }}</label>
        <input type="text" name="personne[telephone]" id="form_telephone_technicien" required class="form-control {{ $errors->has('telephone') ? ' is-invalid' : '' }}" placeholder="{{ __('telephone') }}" value="{{$technicien->personne->telephone}}">
        @include('alerts.feedback', ['field' => 'telephone'])
    </div>
    <div class="form-group col-md-6 {{$errors->has('telephone_fixe') ? 'has-danger': ''}}">
        <label class="form-control-label" for="form_telephone_fixe_technicien">{{ __('Telephone fixe') }}</label>
        <input type="text" name="personne[telephone_fixe]" id="form_telephone_fixe_client" required class="form-control {{ $errors->has('telephone') ? ' is-invalid' : '' }}" placeholder="{{ __('telephone fixe') }}" value="{{  $technicien->personne->telephone_fixe}}">
        @include('alerts.feedback', ['field' => 'telephone_fixe'])
    </div>
</div>


