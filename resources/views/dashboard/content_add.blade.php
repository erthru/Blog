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
                                <input type="text" class="form-control" placeholder="New Adventure" name="title" value="{{ old('title') }}"/>
                            </div>
                            
                            <div class="form-group">
                                <label>Isi</label>
                                <textarea type="text" class="form-control" placeholder="Isi konten" name="body" id="body">{{ old('body') }}</textarea>
                            </div>
                        </div>

                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label>Thumbnail</label>
                                <input type="file" name="thumbnail">
                            </div>

                            <div class="form-group">
                                <label>Tags (Pisahkan dengan koma)</label>
                                <input type="text" class="form-control" placeholder="travel,food,coding" name="tags" value="{{ old('tags') }}"/>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" name="isPage" value="1"/>
                                <label class="form-check-label">Set sebagai laman. <a href="#modalLamanInfo" data-toggle="modal">Info?</a></label>
                            </div>

                            <button type="submit" class="btn btn-success">TAMBAH</button>
                        </div>
                    </div>
                </form>

                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
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

    <script>
        ClassicEditor.create(document.querySelector('#body'), {
            ckfinder: {
                uploadUrl: "/api/open/external/ckeditor_upload_image"
            }
        });
    </script>
@endsection