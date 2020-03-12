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

            <div class="mt-3 dashboard-main-list">
                @foreach($quotes as $quote)
                    <i>{{ $quote->quote }}</i>

                    <div class="right-block">
                        <a href="/dashboard/quote/update/{{ $quote->id }}"><i class="fas fa-pencil-alt text-warning mr-2"></i><span class="text-warning mr-3"><strong>PERBARUI</strong></span></a>
                        <a href="#modalDelete" data-toggle="modal" data-quote="{{ $quote }}"><i class="fas fa-trash text-danger mr-2"></i><span class="text-danger"><strong>HAPUS</strong></span></a>
                    </div>

                    <hr />
                @endforeach
            </div>

            <div class="dashboard-main-pagination">
                <ul class="pagination"></ul>
            </div>

            @if(count($quotes) == 0)
                <span class="center-block mt-4">Belum ada Data.</span>
            @endif
        </div>
    </div>

    <div class="modal fade" role="dialog" id="modalDelete">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <div class="modal-body">
                    <p id="pModalDelete"></p>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">BATAL</button>
                    <a id="aModalDelete" href="/" class="btn btn-danger">HAPUS</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        var prepare = 0;

        if("{!! method_exists($quotes, 'total') ? $quotes->total() : 0 !!}" != 0){
            $(".pagination").twbsPagination({
                totalPages: "{!! method_exists($quotes, 'lastPage') ? $quotes->lastPage() : 0 !!}",
                visiblePages: 3,
                first: "Awal",
                last: "Terakhir",
                prev: null,
                next: null,
                startPage: isNaN(parseInt("{!! app('request')->query('page') !!}")) ? 1 : parseInt("{!! app('request')->query('page') !!}"),
                onPageClick: (evt, page) => {
                    prepare += 1;

                    if(prepare == 2){
                        location.href = "/dashboard/quote?page=" + page;                  
                    }
                }
            });
        }

        $("#modalDelete").on("show.bs.modal", (e) => {
            const quote = $(e.relatedTarget).data("quote");
            $("#aModalDelete").attr("href", "/dashboard/quote/delete/"+quote.id);
            $("#pModalDelete").append("Hapus " + quote.quote + " ?");
        });
    </script>
@endsection