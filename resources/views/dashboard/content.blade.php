@extends("dashboard.app")
@section("title", "Konten")
@section("main")
    <div class="dashboard-content-section">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-9">
                        <h4><strong>KONTEN</strong></h4>
                        <a href="/dashboard/content/add" class="text-success">+ Tambah</a>
                    </div>

                    <div class="col-12 col-md-3">
                        <form class="form-inline my-2 my-lg-0" action="/dashboard/content" method="get">
                            <input type="search" class="form-control" style="width: 100%" name="query" placeholder="cari konten" value="{{ app('request')->query('query') }}" required/>
                        </form>
                    </div>
                </div>

                @if(count($content) == 0)
                    <span class="center-block mt-4">Belum ada Data.</span>
                @endif
            </div>
        </div>
    </div>
@endsection