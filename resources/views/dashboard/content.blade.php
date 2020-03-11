@extends("dashboard.app")
@section("title", "Konten")
@section("main")
    <div class="dashboard-content-section">
        <div class="card">
            <div class="card-body">
                @if(session("successMsg"))
                    <div class="alert alert-success">{{ session("successMsg") }}</div>
                @endif
                
                <div class="row">
                    <div class="col-12 col-md-9">
                        <h4><strong>KONTEN</strong></h4>
                        <a href="/dashboard/content/add" class="text-success">+ Tambah</a>
                    </div>

                    <div class="col-12 col-md-3">
                        <form class="form-inline my-2 my-lg-0" action="/dashboard/content" method="get">
                            <input type="search" class="form-control" style="width: 100%" name="query" placeholder="cari konten" value="{{ app('request')->query('query') }}"/>
                        </form>
                    </div>
                </div>

                <div class="mt-3 dashboard-content-list">
                    @foreach($contents as $content)
                        <h5><a href="/dashboard/content/show/{{ $content->id }}"><strong>{{ $content->title }}</strong></a></h5>
                        <p class="max-lines-3">{{ strip_tags($content->body) }}</p>

                        <div class="right-block">
                            <a href="#"><i class="fas fa-trash text-danger mr-2"></i><span class="text-danger"><strong>HAPUS</strong></span></a>
                        </div>
                        <hr />
                    @endforeach
                </div>

                <div class="dashboard-content-pagination">
                    <ul class="pagination"></ul>
                </div>

                @if(count($contents) == 0)
                    <span class="center-block mt-4">Belum ada Data.</span>
                @endif
            </div>
        </div>
    </div>

    <script>
        var prepare = 0;
        
        $(".pagination").twbsPagination({
            totalPages: "{!! $contents->lastPage() !!}",
            visiblePages: 5,
            first: "Awal",
            last: "Terakhir",
            prev: "<<",
            next: ">>",
            startPage: isNaN(parseInt("{!! app('request')->query('page') !!}")) ? 1 : parseInt("{!! app('request')->query('page') !!}"),
            onPageClick: (evt, page) => {
                prepare += 1;

                if(prepare == 2){
                    if(location.href.indexOf("is_page=1") > -1){
                        location.href = "?is_page=1&page=" + page
                    }else{
                        location.href = "?page=" + page
                    }                    
                }
            }
        });
    </script>
@endsection