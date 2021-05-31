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
                       <h5 class="title p-5">Modifier commune</h5>
                   </div>
                   <form method="POST" action="{{route('commune.update',$commune)}}">
                       @csrf
                       @method('PUT')
                       <div class="card-body">
                           @include('communes._form',['acton'=>route('commune.store'),'method'=>'POST'])
                       </div>
                       <div class="card-footer text-center">
                           <a href="{{ route('commune.show',$commune) }}" class="btn btn-default btn-round mr-4">{{__('Cancel')}}</a>
                           <button type="submit" class="btn btn-primary btn-round">{{__('Save')}}</button>
                       </div>
                   </form>
               </div>
           </div>
       </div>
    </div>
@endsection
