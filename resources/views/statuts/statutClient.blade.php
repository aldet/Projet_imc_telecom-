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
                        <h5 class="title">{{ __("Statut client") }}</h5>
                   </div>
                   <form method="POST" action="">
                    @csrf
                    @method("PUT")
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="form-control-label" for="form_residence_id">{{__('Statut client')}}</label>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                          Dropdown button
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                          <li><a class="dropdown-item" href="#">Action</a></li>
                                          <li><a class="dropdown-item" href="#">Another action</a></li>
                                          <li><a class="dropdown-item" href="#">Something else here</a></li>
                                        </ul>
                                      </div>
                                </div>
                            </div>
                        </div>
                  </form>
               </div>
           </div>
        </div>
    </div>
@endsection