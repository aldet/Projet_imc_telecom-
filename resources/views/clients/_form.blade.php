<div class="form-row">
    <div class="form-group  col-md-6 {{$errors->has('name') ? 'has-danger': ''}}">
        <label class="form-control-label" for="form_name_client">{{ __('Nom') }}</label>
        <input type="text" name="personne[name]" id="form_name_client" required class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="{{ __('nom') }}" value="{{ $client->personne->name }}">
        @include('alerts.feedback', ['field' => 'name'])
    </div>
    <div class="form-group  col-md-6 {{$errors->has('prenom') ? 'has-danger': ''}}">
        <label class="form-control-label" for="form_prenom_client">{{ __('Prenom') }}</label>
        <input type="text" name="personne[prenom]" id="form_prenom_client" required class="form-control {{ $errors->has('prenom') ? ' is-invalid' : '' }}" placeholder="{{ __('prenom') }}" value="{{  $client->personne->prenom }}">
        @include('alerts.feedback', ['field' => 'prenom'])
    </div>
</div>
<div class="form-group {{$errors->has('email') ? 'has-danger': ''}}">
    <label class="form-control-label" for="form_email_client">{{ __('Email') }}</label>
    <input type="email" name="personne[email]" id="form_prenom_client" required class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('email') }}" value="{{  $client->personne->email}}">
    @include('alerts.feedback', ['field' => 'email'])
</div>
<div class="form-group {{$errors->has('matricule') ? 'has-danger': ''}}">
    <label class="form-control-label" for="form_matricule_client">{{ __('Matricule') }}</label>
    <input type="text" name="client[matricule]" id="form_matricule_client" required class="form-control {{ $errors->has('matricule') ? ' is-invalid' : '' }}" placeholder="{{ __('matricule') }}" value="{{  $client->matricule}}">
    @include('alerts.feedback', ['field' => 'matricule'])
</div>
<div class="form-row">
    <div class="form-group col-md-6 {{$errors->has('adresse') ? 'has-danger': ''}}">
        <label class="form-control-label" for="form_adresse_client">{{ __('Adresse') }}</label>
        <input type="text" name="personne[adresse]" id="form_adresse_client" required class="form-control {{ $errors->has('adresse') ? ' is-invalid' : '' }}" placeholder="{{ __('adresse') }}" value="{{  $client->personne->adresse }}">
        @include('alerts.feedback', ['field' => 'adresse'])
    </div>
    <div class="form-group col-md-6 {{$errors->has('code_postal') ? 'has-danger': ''}}">
        <label class="form-control-label" for="form_code_postal_client">{{ __('Code postal') }}</label>
        <input type="text" name="personne[code_postal]" id="form_code_postal_client" required class="form-control {{ $errors->has('code_postal') ? ' is-invalid' : '' }}" placeholder="{{ __('code postal') }}" value="{{  $client->personne->code_postal }}">
        @include('alerts.feedback', ['field' => 'code_postal'])
    </div>
</div>
<div class="form-group {{$errors->has('adresse_map') ? 'has-danger': ''}}">
    <label class="form-control-label" for="form_adresse_map_client">{{ __('Adresse map') }}</label>
    <input type="text" name="personne[adresse_map]" id="form_adresse_map_client" required class="form-control {{ $errors->has('adresse_map') ? ' is-invalid' : '' }}" placeholder="{{ __('adresse map') }}" value="{{  $client->adresse_map}}">
    @include('alerts.feedback', ['field' => 'adresse_map'])
</div>
<div class="form-row">
    <div class="form-group col-md-6 {{$errors->has('telephone') ? 'has-danger': ''}}">
        <label class="form-control-label" for="form_telephone_client">{{ __('Numero telephone') }}</label>
        <input type="text" name="personne[telephone]" id="form_telephone_client" required class="form-control {{ $errors->has('telephone') ? ' is-invalid' : '' }}" placeholder="{{ __('telephone') }}" value="{{  $client->personne->telephone}}">
        @include('alerts.feedback', ['field' => 'telephone'])
    </div>
    <div class="form-group col-md-6 {{$errors->has('telephone_fixe') ? 'has-danger': ''}}">
        <label class="form-control-label" for="form_telephone_fixe_client">{{ __('Telephone fixe') }}</label>
        <input type="text" name="personne[telephone_fixe]" id="form_telephone_fixe_client" required class="form-control {{ $errors->has('telephone') ? ' is-invalid' : '' }}" placeholder="{{ __('telephone fixe') }}" value="{{  $client->personne->telephone_fixe}}">
        @include('alerts.feedback', ['field' => 'telephone_fixe'])
    </div>
</div>
