@extends("dashboard.app")
@section("title", "Quote Perbarui")
@section("main")
    <div class="card">
        <div class="card-body">
            <h4><strong>PERBARUI</strong></h4>

            <form class="mt-3" method="post" action="/dashboard/quote/update/{{ $quote->id }}">
                @csrf

                <div class="form-group">
                    <label>Quote</label>
                    <textarea placeholder="Tulis quote mu di sini" class="form-control" name="quote">{{ $quote->quote }}</textarea>
                </div>

                <button type="submit" class="btn btn-success">SIMPAN</button>
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
@endsection