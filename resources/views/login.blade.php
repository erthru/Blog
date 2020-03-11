<html>
    <head>
        @include("head")
        <title>Login | {{ env("APP_NAME") }}</title>
    </head>

    <body>
        <main>
            <div class="container mt-4">
                <div class="row justify-content-md-center">
                    <div class="col-12 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                @if(session("loginError"))
                                    <div class="alert alert-danger">{{ session("loginError") }}</div>
                                @endif

                                @if(session("logoutSuccess"))
                                    <div class="alert alert-danger">{{ session("logoutSuccess") }}</div>
                                @endif
                                
                                <h4><strong>DASHBOARD LOGIN</strong></h4>
                                <form method="post" action="/dashboard/login" class="mt-4">
                                    @csrf

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" placeholder="example@email.com" name="email" />
                                    </div>

                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" placeholder="Your Password" name="password" />
                                    </div>

                                    <button type="submit" class="btn btn-success w-100 mt-2">LOGIN</button>
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
                </div>
            </div>
        </main>
    </body>
</html>