@extends('layouts.app', [
        'namePage' => 'Register page',
        'activePage' => 'register',
        'backgroundImage' => asset('assets') . "/img/bg16.jpg",
        ])
@section('content')
    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="title p-5">Modifier client</h5>
                    </div>
                    <form method="POST" action="">
                        @csrf
                        @method("PUT")
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="form-control-label" for="form_residence_id">{{__('Motif')}}</label>
                                    <div class="select">
                                        <select name="client[motif_id]" class="form-control">
                                            @foreach($motifs as $motif)
                                                <option value="{{$motif->id}}">{{$motif->motif}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
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
                        <div class="card-footer text-center">
                            <a href="{{route('client.index')}}" class="btn btn-default btn-round mr-4">{{__('Cancel')}}</a>
                            <button type="submit" class="btn btn-primary btn-round">{{__('Save')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
