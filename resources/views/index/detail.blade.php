@extends("index.app")

@section("title")
    {{ $content->title }}
@endsection

@section("body")
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title content-detail-title">{{ $content->title }}</h3>

                <div class="content-detail-subtitle">
                    <i class="fas fa-grip-lines text-danger fa-sm"></i>
                    <i class="fas fa-grip-lines text-danger fa-sm"></i>
                    <i class="fas fa-grip-lines text-danger fa-sm mr-2"></i>
                    <strong>{{ $content->writer->full_name }} &#9679; {{ dateFormatMin($content->created_at) }}</strong>
                    <i class="fas fa-grip-lines text-danger fa-sm ml-2"></i>
                    <i class="fas fa-grip-lines text-danger fa-sm"></i>
                    <i class="fas fa-grip-lines text-danger fa-sm"></i>
                </div>
            </div>

            @if($content->thumb != "")
                <img src="{{ url('/img') . '/' . $content->thumb }}" class="card-img-top mt-3"/>
            @endif

            <div class="card-body">
                <div class="content-entry">
                    {!! html_entity_decode($content->body) !!}
                </div>

                @if(count($content->tag) != 0)
                    <div class="content-tags">
                        @foreach($content->tag as $tag)
                            <a href="/tag/{{ $tag->name }}">{{ $tag->name }}</a>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-9">
                        <i class="fas fa-grip-lines text-danger fa-lg pb-1"></i>
                        <span class="content-author-name">{{ $content->writer->full_name }}</span>
                        <br />
                        <p class="content-author-desc">{{ $content->writer->bio }}</p>
                    </div>

                    <div class="col-12 col-md-3">
                        <div class="content-author-avatar">
                            <img src="{{ url('/avatar') . '/' . $content->writer->avatar }}" class="rounded-circle" width="90px" height="90px"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if($related != null)
            <div class="card mt-3">
                <div class="card-body">
                    <i class="fas fa-grip-lines text-danger fa-lg pb-1"></i>
                    <span class="content-related-title">RELATED CONTENT</span>

                    <div class="content-related-list">
                        <div class="row">
                            @foreach($related as $item)
                                <div class="col-12 col-md-4 pb-3">
                                    <img src="{{ url('/img') . '/' . $item->content->thumb }}" width="100%" height="300px" class="pb-2"/>
                                    <a href="/{{ preg_replace('/\s+/', '-', strtolower($item->content->title)) }}" class="h5">{{ $item->content->title }}</a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection