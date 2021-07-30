<div class="row">
    <div class="form-group col-md-6">
        <div class="form-group col-md-6">
            <label class="form-control-label" for="form_date_fin">{{__('Nouveau contact')}}</label>
            <input type="text" name="nouveau_contact"  required class="form-control" >
            @include('alerts.feedback',['field'=>'date_fin'])
        </div>
        <div class="form-group col-md-6">
            <label class="form-control-label">{{__('Consigne')}}</label>
            <textarea class="form-control" name="description"></textarea>
        </div>
    </div>
</div>