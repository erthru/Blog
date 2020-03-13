<html>
    <head>
        @include("head")
        <title>@yield("title") | {{ env("APP_NAME") }}</title>
    </head>

    <body>
        <header>
            <div class="header-section">
                <div class="header-top">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="header-top-left">
                                    <ul class="nav">
                                        <li class="nav-item"><a class="nav-link text-white" href="/"><strong>BERANDA</strong></a></li>
                                        <li class="nav-item"><a class="nav-link text-white" href="/tentang"><strong>TENTANG</strong></a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="header-top-right">
                                    <ul class="nav">
                                        <li class="nav-item"><a class="nav-link text-white" href="https://fb.com/erthru" target="blank"><i class="fab fa-facebook-f fa-sm"></i></a></li>
                                        <li class="nav-item"><a class="nav-link text-white" href="https://instagram.com/_supriantold" target="blank"><i class="fab fa-instagram fa-sm"></i></a></li>
                                        <li class="nav-item"><a class="nav-link text-white" href="https://medium.com/@erthru" target="blank"><i class="fab fa-medium-m fa-sm"></i></a></li>
                                        <li class="nav-item"><a class="nav-link text-white" href="https://github.com/erthru" target="blank"><i class="fab fa-github-alt fa-sm"></i></a></li>
                                        <li class="nav-item"><a class="nav-link text-white" href="http://linkedin.com/in/erthru" target="blank"><i class="fab fa-linkedin-in fa-sm"></i></a></li>
                                        <li class="nav-item"><a class="nav-link text-white" href="#collapseExample" target="blank" data-toggle="collapse"><i class="fas fa-search fa-sm"></i></a></li>
                                    </ul>
                                    
                                    <div class="collapse header-search" id="collapseExample">
                                        <form method="get" action="/">
                                            <input type="search" class="form-control" name="query" placeholder="cari sesuatu"/>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="header-title">
                    <a href="/">ērthrน</a>
                </div>

                <div class="header-nav">
                    <hr />
                    <ul class="nav header-nav-content justify-content-center">
                        <li class="nav-item"><a class="nav-link" href="/"><strong>BERANDA</strong></a></li>
                        <li class="nav-item"><a class="nav-link" href="?popular_posts=1"><strong>POSTINGAN POPULER</strong></a></li>
                        <li class="nav-item"><a class="nav-link" href="#modalTag" data-toggle="modal"><strong>TAG</strong></a></li>
                        <li class="nav-item"><a class="nav-link" href="/kebijakan-pribadi"><strong>KEBIJAKAN PRIBADI</strong></a></li>
                    </ul>
                </div>
            </div>
        </header>
        
        <br />

        <main>
            <div class="main-section">
                @yield("body")
            </div>

            <div class="modal fade" role="dialog" id="modalTag">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tag</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                        <div class="modal-body">
                            @foreach($availableTags as $tag)
                                <a href="?tag={{ $tag->name }}" style="color: black">{{ $tag->name }} ({{ $tag->_total }})</a>
                                <br />
                            @endforeach
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <br />

        <footer>
            <div class="footer-section">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="footer-left">
                                <a href="/" style="font-size: 40px; color: black">ērthrน</a>
                                <br />
                                <span style="font-size: 14px">&copy; {{ now()->year }} - erthru.id</span>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 align-self-center">
                            <div class="footer-right">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a class="nav-link text-secondary" href="https://fb.com/erthru" target="blank"><i class="fab fa-facebook-f fa-lg"></i></a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link text-secondary" href="https://instagram.com/_supriantold" target="blank"><i class="fab fa-instagram fa-lg"></i></a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link text-secondary" href="https://medium.com/@erthru" target="blank"><i class="fab fa-medium-m fa-lg"></i></a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link text-secondary" href="https://github.com/erthru" target="blank"><i class="fab fa-github-alt fa-lg"></i></a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link text-secondary" href="https://linkedin.com/in/erthru" target="blank"><i class="fab fa-linkedin-in fa-lg"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>