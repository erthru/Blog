@extends("dashboard.app")
@section("title", "Dashboard")
@section("main")
    <div class="dashboard-content-section">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-9">
                        <h4><strong>KONTEN</strong></h4>
                    </div>

                    <div class="col-12 col-md-3">
                        <form class="form-inline my-2 my-lg-0" action="/dashboard/content" method="get">
                            <input type="search" class="form-control" style="width: 73%" name="query" placeholder="cari konten" value="{{ app('request')->query('query') }}" required/>
                            <button class="btn btn-success ml-2" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection