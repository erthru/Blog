@extends("index.app")
@section("title", "Selamat Datang Di, eh apa ini ?")
@section("body")
<div class="container">
    <div class="grid">
        @foreach($mix as $item)
            @if($item["type"] == "content")
                <div class="grid-item">
                    <div class="card">
                        <img src="{{ url('/img') . '/' . $item['content']['thumb'] }}" class="card-img-top"/>

                        <div class="card-body">
                            <i class="fas fa-grip-lines text-danger fa-sm"></i>
                            <strong style="font-size: 17px" class="text-black-50 ml-2">Article</strong>

                            <h5 class="card-title mt-2">{{ $item["content"]["title"] }}</h5>
                            <h6 class="card-subtitle text-muted" style="margin-top: -8px">{{ dateFormat($item["content"]["created_at"]) }}</h6>

                            <p class="mt-3 text-body max-lines-3">{{ $item["content"]["body"] }}</p>
                        
                            <a href="/{{ preg_replace('/\s+/', '-', strtolower($item['content']['title'])) }}" class="btn btn-danger w-100">LIHAT</a>
                        </div>
                    </div>
                </div>
            @else
                <div class="grid-item">
                    <div class="card text-white bg-dark">
                        <div class="card-body">
                            <i class="fas fa-quote-left fa-lg"></i>
                            <h4 class="ml-4 mt-2"><i><strong>{{ $item["quote"]["quote"] }}</strong></i></h4>

                            <br />
                            
                            <div class="row">
                                <div class="col-8 align-self-center">
                                    <div class="ml-2">
                                        <i class="fas fa-grip-lines text-danger fa-sm"></i>
                                        <span class="ml-2"><i>{{ $item["quote"]["writer"]["full_name"] }}</i></span>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <img src="{{ url('/avatar') . '/' . $item['quote']['writer']['avatar'] }}" class="rounded-circle right-block mr-2" width="58px" height="58px"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>

<script>
    window.addEventListener('load', function () {
        $('.grid').masonry({
            itemSelector: '.grid-item',
            horizontalOrder: true,
            percentPosition: true
        });
    })
</script>
@endsection

