@extends('layouts.nonavnofooter')

@section('content')
<main>
    <div id="primary" class="p-t-b-100 height-full">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mx-md-auto paper-card">
                    <div class="text-center">

                        <h3 class="mt-2">Welcome Back</h3>
                        <p class="p-t-b-20">Hey Soldier welcome back signin now there is lot of new stuff waiting
                            for you</p>
                        @if (session('status'))
                        <div class="alert alert-danger">
                            {{ session('status') }}
                        </div>
                        @endif
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                    <form method="POST" action="auth/login">
                        @csrf
                        <div class="form-group has-icon"><i class="far fa-envelope"></i>
                            <input type="email" name="email" class="form-control form-control-lg"
                                placeholder="Email Address">
                        </div>
                        <div class="form-group has-icon"><i class="fas fa-key"></i>
                            <input type="password" name="password" class="form-control form-control-lg"
                                placeholder="Password">
                        </div>
                        <input type="submit" class="btn btn-primary btn-lg btn-block mb-3" value="Log In">
                        <a href="{{route('password.request')}}" class="forget-pass ">Forget Password</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- #primary -->
</main>

@endsection