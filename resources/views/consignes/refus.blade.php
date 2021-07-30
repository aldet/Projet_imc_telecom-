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
                            <h5 class="title">{{__("Statut")}}</h5>
                         <form method="POST" action="{{ route('refus-action',['client' => $client->id]) }}">
                            @csrf
                            @method("GET")
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <input name="client_id" value="{{ $client->id }}" type="hidden" />
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
        </div>
    </div>
@endsection    