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
                                        <li class="nav-item"><a class="nav-link text-white" href="/"><strong>TENTANG</strong></a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="header-top-right">
                                    <ul class="nav">
                                        <li class="nav-item"><a class="nav-link text-white" href="/"><i class="fab fa-facebook-f fa-sm"></i></a></li>
                                        <li class="nav-item"><a class="nav-link text-white" href="/"><i class="fab fa-instagram fa-sm"></i></a></li>
                                        <li class="nav-item"><a class="nav-link text-white" href="/"><i class="fab fa-medium-m fa-sm"></i></a></li>
                                        <li class="nav-item"><a class="nav-link text-white" href="/"><i class="fab fa-github-alt fa-sm"></i></a></li>
                                        <li class="nav-item"><a class="nav-link text-white" href="/"><i class="fab fa-linkedin-in fa-sm"></i></a></li>
                                        <li class="nav-item"><a class="nav-link text-white" href="/"><i class="fas fa-search fa-sm"></i></a></li>
                                    </ul>
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
                        <li class="nav-item"><a class="nav-link" href="/"><strong>POSTINGAN POPULER</strong></a></li>
                        <li class="nav-item"><a class="nav-link" href="/"><strong>TAG</strong></a></li>
                        <li class="nav-item"><a class="nav-link" href="/"><strong>KEBIJAKAN PRIBADI</strong></a></li>
                    </ul>
                </div>
            </div>
        </header>
        
        <br />

        <main>
            <div class="content-section">
                @yield("body")
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
                                        <a class="nav-link text-secondary" href="#"><i class="fab fa-facebook-f fa-lg"></i></a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link text-secondary" href="#"><i class="fab fa-instagram fa-lg"></i></a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link text-secondary" href="#"><i class="fab fa-medium-m fa-lg"></i></a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link text-secondary" href="#"><i class="fab fa-github-alt fa-lg"></i></a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link text-secondary" href="#"><i class="fab fa-linkedin-in fa-lg"></i></a>
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