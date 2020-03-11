@extends("dashboard.app")
@section("title", "Quote")
@section("main")
    <div class="card">
        <div class="card-body">
            @if(session("successMsg"))
                <div class="alert alert-success">{{ session("successMsg") }}</div>
            @endif

            <div class="row">
                <div class="col-12 col-md-9">
                    <h4><strong>QUOTE</strong></h4>
                    <a href="/dashboard/quote/add" class="text-success">+ Tambah</a>
                </div>

                <div class="col-12 col-md-3">
                    <form class="form-inline my-2 my-lg-0" action="/dashboard/quote" method="get">
                        <input type="search" class="form-control" style="width: 100%" name="query" placeholder="cari quote" value="{{ app('request')->query('query') }}"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection