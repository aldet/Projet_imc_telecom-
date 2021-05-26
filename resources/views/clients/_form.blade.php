@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session('databaseError'))
    <div class="alert alert-danger">{{ session('databaseError') }}</div>
@endif
<div class="form-row">
    <div class="form-group  col-md-6 {{$errors->has('name') ? 'has-danger': ''}}">
        <label class="form-control-label" for="form_name_client">{{ __('Nom') }}</label>
        <input type="text" name="personne[name]" id="form_name_client" required class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="{{ __('nom') }}" value="{{ old('personne.name', $client->personne->name)}}">
        @include('alerts.feedback', ['field' => 'name'])
    </div>
    <div class="form-group  col-md-6 {{$errors->has('prenom') ? 'has-danger': ''}}">
        <label class="form-control-label" for="form_prenom_client">{{ __('Prenom') }}</label>
        <input type="text" name="personne[prenom]" id="form_prenom_client" required class="form-control {{ $errors->has('prenom') ? ' is-invalid' : '' }}" placeholder="{{ __('prenom') }}" value="{{ old('personne.prenom',$client->personne->prenom)  }}">
        @include('alerts.feedback', ['field' => 'prenom'])
    </div>
</div>
<div class="form-group {{$errors->has('email') ? 'has-danger': ''}}">
    <label class="form-control-label" for="form_email_client">{{ __('Email') }}</label>
    <input type="email" name="personne[email]" id="form_prenom_client" required class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('email') }}" value="{{ old('personne.email',$client->personne->email)}}">
    @include('alerts.feedback', ['field' => 'email'])
</div>
<div class="form-group {{$errors->has('matricule') ? 'has-danger': ''}}">
    <label class="form-control-label" for="form_matricule_client">{{ __('Matricule') }}</label>
    <input type="text" name="client[matricule]" id="form_matricule_client" required class="form-control {{ $errors->has('matricule') ? ' is-invalid' : '' }}" placeholder="{{ __('matricule') }}" value="{{  old('client.matricule',$client->matricule)}}">
    @include('alerts.feedback', ['field' => 'matricule'])
</div>
<div class="form-row">
    <div class="form-group col-md-6 {{$errors->has('adresse') ? 'has-danger': ''}}">
        <label class="form-control-label" for="form_adresse_client">{{ __('Adresse') }}</label>
        <input type="text" name="personne[adresse]" id="form_adresse_client" required class="form-control {{ $errors->has('adresse') ? ' is-invalid' : '' }}" placeholder="{{ __('adresse') }}" value="{{ old('personne.adresse', $client->personne->adresse)}}">
        @include('alerts.feedback', ['field' => 'adresse'])
    </div>
    <div class="form-group col-md-6 {{$errors->has('code_postal') ? 'has-danger': ''}}">
        <label class="form-control-label" for="form_code_postal_client">{{ __('Code postal') }}</label>
        <input type="text" name="personne[code_postal]" id="form_code_postal_client" required class="form-control {{ $errors->has('code_postal') ? ' is-invalid' : '' }}" placeholder="{{ __('code postal') }}" value="{{old('personne.code_postal',$client->personne->code_postal) }}">
        @include('alerts.feedback', ['field' => 'code_postal'])
    </div>
</div>
<div class="form-group {{$errors->has('adresse_map') ? 'has-danger': ''}}">
    <label class="form-control-label" for="form_adresse_map_client">{{ __('Adresse map') }}</label>
    <input type="text" name="personne[adresse_map]" id="form_adresse_map_client" required class="form-control {{ $errors->has('adresse_map') ? ' is-invalid' : '' }}" placeholder="{{ __('adresse map') }}" value="{{ old('personne.adresse_map',$client->personne->adresse_map)}}">
    @include('alerts.feedback', ['field' => 'adresse_map'])
</div>
<div class="form-row">
    <div class="form-group col-md-6 {{$errors->has('telephone') ? 'has-danger': ''}}">
        <label class="form-control-label" for="form_telephone_client">{{ __('Numero telephone') }}</label>
        <input type="text" name="personne[telephone]" id="form_telephone_client" required class="form-control {{ $errors->has('telephone') ? ' is-invalid' : '' }}" placeholder="{{ __('telephone') }}" value="{{old('personne.telephone',$client->personne->telephone)}}">
        @include('alerts.feedback', ['field' => 'telephone'])
    </div>
    <div class="form-group col-md-6 {{$errors->has('telephone_fixe') ? 'has-danger': ''}}">
        <label class="form-control-label" for="form_telephone_fixe_client">{{ __('Telephone fixe') }}</label>
        <input type="text" name="personne[telephone_fixe]" id="form_telephone_fixe_client" required class="form-control {{ $errors->has('telephone') ? ' is-invalid' : '' }}" placeholder="{{ __('telephone fixe') }}" value="{{old('personne.telephone_fixe',$client->personne->telephone_fixe)}}">
        @include('alerts.feedback', ['field' => 'telephone_fixe'])
    </div>
</div>
<div class="form-group">
    <label class="form-control-label" for="form_id_commune">{{ __('Commune') }}</label>
    <div class="select">
        <select name="client[commune_id]" class="form-control">
            @foreach($communes as $commune)
                <option value="{{$commune->id}}" >{{$commune->name_commune}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <label class="form-control-label" for="form_residence_id">{{__('Type residence')}}</label>
    <div class="select">
        <select name="client[residence_id]" class="form-control">
            @foreach($residences as $residence)
                <option value="{{$residence->id}}">{{$residence->label}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <label class="form-control-label" for="form_statut_id">{{__('Statut')}}</label>
    <div class="select">
        <select name="client[statut_id]" class="form-control">
            @foreach($statuts as $statut)
                <option value="{{$statut->id}}">{{$statut->name_statut}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
    <label class="form-control-label" for="form_residence_id">{{__('Type residence')}}</label>
    <div class="select">
        <select name="client[motif_id]" class="form-control">
            @foreach($motifs as $motif)
                <option value="{{$motif->id}}">{{$motif->motif}}</option>
            @endforeach
        </select>
    </div>
</div>
