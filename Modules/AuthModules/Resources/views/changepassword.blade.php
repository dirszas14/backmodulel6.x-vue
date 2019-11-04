@extends('layouts.master')
@section('title','Forget Password')
@section('headernav')
<header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-box"></i>
                        Dashboard
                    </h4>
                </div>
            </div>
            <div class="row">
                <ul class="nav responsive-tab nav-material nav-material-white" id="v-pills-tab">
                    <li>
                        <a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1">
                                <i class="fas fa-unlock"></i> Change Password</a>
                    </li>
                </ul>
                {{-- <a class="btn-fab absolute fab-right-bottom btn-primary" data-toggle="control-sidebar">
                    <i class="icon icon-menu"></i>
                </a> --}}
            </div>
        </div>
    </header>
@endsection
@section('content')
    {{-- <h1>Forget Password</h1> --}}
    <div class="row">
        <br>
        <div class="col-lg-6 offset-lg-3">
            <div class="paper-card">
                <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        @if (session('status'))
                        <div class="alert alert-danger">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{session('success')}}
                        </div>
                    @endif
                    <form action="/auth/changepassword" method="POST">
                        @csrf
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="">Current Password</label>
                                            <input type="password" name="current_password" class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                                <label for="">New Password</label>
                                            <input type="password" name="password" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="">Re-Password</label>
                                            <input type="password" name="password_confirmation" class="form-control"/>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block" >Change Password <i class="fas fa-lock"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
    
