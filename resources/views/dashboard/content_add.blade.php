@extends("dashboard.app")
@section("title","Konten Tambah")
@section("main")
    <div class="dashboard-content-section">
        <div class="card">
            <div class="card-body">
                <h4><strong>TAMBAH</strong></h4>
                
                <form class="mt-3" action="/dashboard/content/add" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-12 col-md-9">
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" class="form-control" placeholder="New Adventure" name="title" required />
                            </div>
                            
                            <div class="form-group">
                                <label>Isi</label>
                                <textarea type="text" class="form-control" placeholder="Isi konten" name="body" required ></textarea>
                            </div>
                        </div>

                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label>Thumbnail</label>
                                <input type="file" name="thumbnail"/>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" name="isPage" value="1"/>
                                <label class="form-check-label" for="exampleCheck1">Set sebagai laman. <a href="#modalLamanInfo" data-toggle="modal">Info?</a></label>
                            </div>

                            <button type="submit" class="btn btn-success">TAMBAH</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="modalLamanInfo">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Informasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <p>Konten ini akan dikategorikan sebagai halaman. konten ini tidak akan tampil di halaman beranda.</p>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection