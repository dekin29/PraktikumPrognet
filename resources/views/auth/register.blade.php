@section('title', 'Login')
@extends('layouts.userLayout')
@section('add_css')
@stop
@section('content')
    <!-- site__body -->
    <div class="site__body">
        <!-- page -->
        <div class="page">
            <!-- page__header -->
            <div class="page__header">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <ol class="page__header-breadcrumbs breadcrumb">
                                {{-- <li class="breadcrumb-item">
                                    <a href="index-2.html">Home</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="#">Furniture</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Current Page</li> --}}
                            </ol>
                            <h1 class="page__header-title decor-header decor-header--align--center">Register Account</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page__header / end -->
            <!-- page__body -->
            <div class="page__body">
                <div class="block">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3 d-flex">
                            </div>
                            <div class="col-md-6 d-flex">
                                <div class="card flex-grow-1 mb-0">
                                    <div class="card__header">
                                        <h4 class="decor-header">Register</h4>
                                    </div>
                                    <div class="card__content">
                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label>Name</label> 
                                                <input id="name" name="name" type="text" class="form-control" placeholder="Enter name" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Email address</label> 
                                                <input id="email" name="email" type="email" class="form-control" placeholder="Enter email" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label> 
                                                <input id="password" name="password" type="password" class="form-control" placeholder="Password" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Repeat Password</label> 
                                                <input id="password_confirm" name="password_confirmation" type="password" class="form-control" placeholder="Password" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Register</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page__body / end -->
        </div>
        <!-- page / end -->
    </div>
    <!-- site__body / end -->
@stop
@section('add_js')
@stop
