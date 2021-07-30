<div class="form-group {{ $errors->has('titre') ? 'has-danger':'' }}">
   <label for="" class="form-control-label">{{ __('titre') }}</label>
   <input type="text" name="titre" id="form_titre_planing" required class="form-control {{ $errors->has('titre') ? 'is-invalid' : '' }}" placeholder="{{ __('titre') }}" value="">
    @include('alerts.feedback',['field'=>'title'])
</div>
<div class="row">
    <div class="form-group col-md-6">
        <label for="" class="form-control-label">{{ __('Date debut') }}</label>
        <input type="datetime-local" name="date_debut" class="form-control">
    </div>
    <div class="form-group col-md-6">
        <label for="" class="form-control-label">{{ __('Date fin') }}</label>
        <input type="datetime-local" name="date_fin" class="form-control">
    </div>
</div>