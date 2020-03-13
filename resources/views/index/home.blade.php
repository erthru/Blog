@extends("index.app")
@section("title", "Selamat Datang Di, eh apa ini ?")
@section("body")
<div class="container">
    @if(!empty(app("request")->query("query")))
        <div class="alert alert-warning">
            Menampilkan hasil pencarian dari: {{ app("request")->query("query") }}
        </div>
    @endif

    @if(!empty(app("request")->query("popular_posts")) && app("request")->query("popular_posts") == "1")
        <div class="alert alert-warning">
            Data diurutkan berdasarkan yang populer
        </div>
    @endif

    @if(!empty(app("request")->query("tag")))
        <div class="alert alert-warning">
            Menampilkan konten dengan tag {{ app("request")->query("tag") }}
        </div>
    @endif

    <div class="grid">
        @foreach($mix as $item)
            @if($item["type"] == "content")
                <div class="grid-item">
                    <div class="card">
                        @if($item['content']['thumb'] != "")
                            <img src="{{ url('/img') . '/' . $item['content']['thumb'] }}" class="card-img-top"/>
                        @endif

                        <div class="card-body">
                            <i class="fas fa-grip-lines text-danger fa-sm"></i>
                            <strong style="font-size: 17px" class="text-black-50 ml-2">Konten</strong>

                            <h5 class="card-title mt-2">{{ $item["content"]["title"] }}</h5>
                            <h6 class="card-subtitle text-muted" style="margin-top: -8px">{{ dateFormat($item["content"]["created_at"]) }}</h6>

                            <p class="mt-3 text-body max-lines-3">{{ strip_tags($item["content"]["body"]) }}</p>
                        
                            <a href="/{{ $item['content']['for_url'] }}" class="btn btn-danger w-100">LIHAT</a>
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

    <div class="main-pagination mt-5">
        <ul class="pagination justify-content-center"></ul>
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

    const contentTotal = "{!! method_exists($contents, 'total') ? $contents->total() : 0 !!}";
    const quoteTotal = "{!! method_exists($quotes, 'total') ? $contents->total() : 0 !!}";

    var total = contentTotal > quoteTotal ? contentTotal : quoteTotal;
    var mode = contentTotal > quoteTotal ? "content" : "quote";

    if("{!! app('request')->query('tag') !!}" != ""){
        total = "{!! method_exists($tags, 'total') ?$tags->total() : 0 !!}";
        mode = "tags";
    }

    var prepare = 0;

    console.log(mode);

    if(total != 0){
        $(".pagination").twbsPagination({
            totalPages: mode == "tags" ? "{!! method_exists($tags, 'lastPage') ? $tags->lastPage() : 0 !!}" : (mode == "content" ? "{!! method_exists($contents, 'lastPage') ? $contents->lastPage() : 0 !!}" : "{!! method_exists($quotes, 'lastPage') ? $quotes->lastPage() : 0 !!}"),
            visiblePages: 3,
            first: "Awal",
            last: "Terakhir",
            prev: null,
            next: null,
            hideOnlyOnePage: true,
            startPage: isNaN(parseInt("{!! app('request')->query('page') !!}")) ? 1 : parseInt("{!! app('request')->query('page') !!}"),
            onPageClick: (evt, page) => {
                prepare += 1;

                if(prepare == 2){
                    if(location.href.indexOf("?tag=") > -1){
                        location.href = "?tag={!! app('request')->query('tag') !!}&page=" + page;
                    }else{
                        location.href = "?page=" + page;
                    }                  
                }
            }
        });
    }
</script>
@endsection

