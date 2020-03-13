@extends("dashboard.app")
@section("title", "Profil")
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

            <center class="pt-3 pb-3">
                <img src="{{ url('/avatar') . '/' . $writer->avatar }}" class="rounded-circle" width="140px" height="140px" />
                
                <div class="mt-2">
                    <a href="#modalUpdateAvatar" data-toggle="modal" class="text-success"><strong>Ganti Avatar</strong></a>
                </div>
                
                <h4 class="mt-4"><strong>{{ $writer->full_name }}</strong><a href="#modalUpdateFullName" data-toggle="modal"><i class="fas fa-pencil-alt" style="color: black; font-size: 18px; margin-bottom: 2px; margin-left: 10px"></i></a></h4>
                <p>{{ $writer->bio }}<a href="#modalUpdateBio" data-toggle="modal"><i class="fas fa-pencil-alt" style="color: black; font-size: 14px; margin-bottom: 1px; margin-left: 10px"></i></a></p>
            </center>
        </div>
    </div>

    <div class="modal fade" role="dialog" id="modalUpdateFullName">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Perbarui Nama Lengkap</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <div class="modal-body">
                    <form method="post" action="/dashboard/profile/update/full_name">
                        @csrf

                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control" name="full_name" value="{{ $writer->full_name }}"/>
                        </div>

                        <div class="right-block">
                            <button type="submit" class="btn btn-success mr-2">SIMPAN</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">BATAL</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" role="dialog" id="modalUpdateBio">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Perbarui Bio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <div class="modal-body">
                    <form method="post" action="/dashboard/profile/update/bio">
                        @csrf
                        
                        <div class="form-group">
                            <label>Bio</label>
                            <textarea type="text" class="form-control" name="bio">{{ $writer->bio }}</textarea>
                        </div>

                        <div class="right-block">
                            <button type="submit" class="btn btn-success mr-2">SIMPAN</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">BATAL</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" role="dialog" id="modalUpdateAvatar">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Perbarui Avatar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <div class="modal-body">
                    <form method="post" action="/dashboard/profile/update/avatar" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group">
                            <label>Pilih avatar</label>
                            <br />
                            <input type="file" name="avatar" />
                        </div>

                        <div class="right-block">
                            <button type="submit" class="btn btn-success mr-2">SIMPAN</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">BATAL</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection