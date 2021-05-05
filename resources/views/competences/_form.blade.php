<div class="form-row">
    <div class="form-group col-md-4 {{$errors->has('label') ? 'has-danger':''}}">
        <label class="form-control-label" for="form_name_competence">{{__('Label')}}</label>
        <input type="text" name="label" id="form_label_competence" required class="form-control {{$errors->has('label') ? 'is-invalid' : ''}}" placeholder="{{__('label')}}" value="{{$competence->label}}">
        @include('alerts.feedback',['field'=>'label'])
    </div>
    <di class="form-group col-md-8 {{$errors->has('description') ? 'ha-danger':''}}">
        <label class="form-control-label" for="form_description_competence">{{__('Description')}}</label>
        <textarea name="description" class="form-control {{$errors->has('description') ? 'is-invalid':''}}" placeholder="{{__('description')}}" >{{$competence->description}}</textarea>
        @include('alerts.feedback',['field'=>'description'])
    </di>
</div>
