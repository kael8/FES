@extends('layouts/blankLayout')

@section('title', 'Login Basic - Pages')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection

@section('content')
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
      <!-- Register -->
      <div class="card">
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center" style="padding-bottom: 20px;">
            <a href="{{url('/')}}">
              <span class="app-brand-logo demo">@include('_partials.macros')</span>
              <span class="app-brand-text demo text-body"></span>
            </a>
          </div>
          <!-- /Logo -->
          <h4 style="text-align: center;">Welcome to {{config('variables.templateName')}}</h4>
          <p class="mb-4">Please sign-in to your account to continue</p>

          <form id="formAuthentication" class="mb-3">
          @csrf
            <div id="error-message"></div>
            <div class="mb-3">
              <label for="email" class="form-label">Student ID</label>
              <input type="text" class="form-control" id="student-id" name="student-id" placeholder="Enter your student id" autofocus>
            </div>
            <div class="mb-3 form-password-toggle">
              <div class="d-flex justify-content-between">
                <label class="form-label" for="password">Password</label>
                <a href="{{url('auth/forgot-password-basic')}}">
                  <small>Forgot Password?</small>
                </a>
              </div>
              <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>
            <div class="mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="remember-me">
                <label class="form-check-label" for="remember-me">
                  Remember Me
                </label>
              </div>
            </div>
            <div class="mb-3">
              <button class="btn btn-primary d-grid w-100" type="submit" id = "login">Sign in</button>
            </div>
          </form>

        </div>
      </div>
    <!-- /Register -->
  </div>
</div>
</div>
<script src="{{ asset(mix('assets/vendor/libs/jquery/jquery.js')) }}"></script>
<script src="{{ asset('storage/js/login.js') }}"></script>


@endsection
