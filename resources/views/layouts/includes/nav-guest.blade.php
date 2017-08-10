<ul class="nav navbar-nav navbar-right">
    <li><p class="navbar-text">Already have an account?</p></li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
        <ul id="login-dp" class="dropdown-menu">
            <li>
                <div class="row">
                    <div class="col-md-12">
<!--                                    Login via
                                    <div class="social-buttons">
                                        <a href="#" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
                                        <a href="#" class="btn btn-tw"><i class="fa fa-twitter"></i> Twitter</a>
                                    </div>
                                    or-->
                        <form class="form" role="form" method="post" action="{{ route('post-login') }}" accept-charset="UTF-8" id="login-nav">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label class="sr-only" for="email">Email address</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                                <div class="help-block text-right"><a href="{{ route('forgot-password') }}">Forget the password ?</a></div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Sign me in</button>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" id="remember">
                                    Remember Me
                                </label>
                            </div>
                        </form>
                    </div>
                    <div class="bottom text-center">
                        Don't have an account? <a href="{{ route('register') }}"><b>Sign Up</b></a>
                    </div>
                </div>
            </li>
        </ul>
    </li>
</ul>