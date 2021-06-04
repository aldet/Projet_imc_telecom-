<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Consigne
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('consigne.store')}}">
                        @csrf
                        @method('PUT')
                        <textarea class="form-control"></textarea>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
