@extends("dashboard.app")
@section("title", "Tag")
@section("main")
    <div class="card">
        <div class="card-body">
            @if(session("successMsg"))
                <div class="alert alert-success">{{ session("successMsg") }}</div>
            @endif

            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <h4><strong>TAG</strong></h4>

            <div class="mt-3 dashboard-main-list">
                @foreach($tags as $tag)
                    <a href="#modalUpdate" data-toggle="modal" data-tag="{{ $tag }}">{{ $tag->name }} ({{ $tag->_total }})</a>
                    <br />
                @endforeach
            </div>

            @if(count($tags) == 0)
                <span class="center-block mt-4">Belum ada Data.</span>
            @endif
        </div>
    </div>

    <div class="modal fade" role="dialog" id="modalUpdate">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <div class="modal-body">
                    <form method="post" id="formModalUpdate">
                        @csrf

                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="name" class="form-control" id="textNameModalUpdate"/>
                        </div>

                        <div class="right-block">
                            <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">BATAL</button>
                            <button type="submit" class="btn btn-success">SIMPAN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $("#modalUpdate").on("show.bs.modal", (e) => {
            const tag = $(e.relatedTarget).data("tag");
            $("#textNameModalUpdate").attr("value", tag.name);
            $("#formModalUpdate").attr("action", "/dashboard/tag/update/"+tag.id);
        });
    </script>
@endsection