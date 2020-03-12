@extends("dashboard.app")
@section("title", "Gambar")
@section("main")
    <div class="card">
        <div class="card-body">
            @if(session("successMsg"))
                <div class="alert alert-success">{{ session("successMsg") }}</div>
            @endif

            <h4><strong>GAMBAR</strong></h4>
            
            <div class="dashboard-main-list mt-3">
                <div class="dashboard-grid">
                    @foreach($images as $image)
                        @if($image["name"] != "forGit")
                        <div class="dashboard-grid-item">
                            <img src="{{ url('/img') . '/' . $image['name'] }}" width="100%"/>
                            
                            <div style="position: absolute; bottom:0; width: 100%; background: rgba(0,0,0,.5); color: white; padding: 10px">
                                <div class="row">
                                    <div class="col-8">
                                        <strong>Size: {{ $image["size"] }}</strong>
                                    </div>

                                    <div class="col-4">
                                        <a href="#modalDelete" data-delete="{{ $image['name'] }}" data-toggle="modal"><i class="fas fa-trash fa-1x text-danger right-block" style="margin-top: 2px"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>

            @if(count($images) < 2)
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
                    <p>Hapus gambar yang dipilih ?</p>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">BATAL</button>
                    <a id="aModalDelete" href="/" class="btn btn-danger">HAPUS</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener('load', function () {
            $('.dashboard-grid').masonry({
                itemSelector: '.dashboard-grid-item',
                horizontalOrder: true,
                percentPosition: true
            });
        })

        $("#modalDelete").on("show.bs.modal", (e) => {
            const del = $(e.relatedTarget).data("delete");
            $("#aModalDelete").attr("href", "/dashboard/image?delete="+del);
        });
    </script>
@endsection