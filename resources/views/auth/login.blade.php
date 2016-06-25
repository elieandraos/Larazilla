@extends('admin.auth')

@section('content')
    
    <section id="sign-in">

        <!-- Background Bubbles -->
        <canvas id="bubble-canvas"></canvas>
        <!-- /Background Bubbles -->

        <!-- Sign In Form -->
         <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}

            <div class="card-panel clearfix">

                <div class="row">
                    <div class="col"></div>
                </div>

                <!-- Email -->
                <div class="input-field">
                    <i class="fa fa-user prefix" style="margin-top: 15px;"></i>
                    <input id="username-input" type="text" class="validate" name="email" value="{{ old('email') }}">
                    <label for="username-input">Email</label>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif       
                </div>
                <!-- /Email -->


                <!-- Password -->
                <div class="input-field">
                    <i class="fa fa-unlock-alt prefix" style="margin-top: 15px;"></i>
                    <input id="password-input" type="password" class="validate" name="password">
                    <label for="password-input">Password</label>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <!-- /Password -->

                <div class="switch">
                    <label>
                        <input type="checkbox" checked  name="remember"/>
                        <span class="lever"></span>
                        Remember
                    </label>
                </div>

                <button type="submit" class="waves-effect waves-light btn-large z-depth-0 z-depth-1-hover">Sign In</button>
            </div>

            <?php /* <div class="links right-align">
                <a href="page-forgot-password.html">Forgot Password?</a>
            </div> */ ?>

        </form>
        <!-- /Sign In Form -->

    </section>
@endsection
