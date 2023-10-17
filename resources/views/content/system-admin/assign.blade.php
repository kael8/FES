@extends('content.system-admin.layouts.contentNavbarLayout')

@section('title', 'Basic Inputs - Forms')

@section('page-script')
<script src="{{asset('assets/js/form-basic-inputs.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Forms /</span> Basic Inputs
</h4>
<div class="row">
<form id="formAuthentication" class="mb-3">
          @csrf
            <div id="error-message"></div>
  <div class="col-md-12">
    <div class="card mb-4">
      <h5 class="card-header">Default</h5>
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <label for="defaultFormControlInput" class="form-label">StudentID</label>
            <input type="text" name = "studentID" class="form-control" aria-describedby="defaultFormControlHelp" />
            <div id="defaultFormControlHelp" class="form-text">We'll never share your details with anyone else.</div>
          </div>
          <div class="col-md-6">
            <label for="defaultFormControlInput" class="form-label">FacultyID</label>
            <input type="text" name = "facultyID" class="form-control" aria-describedby="defaultFormControlHelp" />
            <div id="defaultFormControlHelp" class="form-text">We'll never share your details with anyone else.</div>
          </div>
        </div>
        
        
        <div class="row">
          <div class="col-md-12">
            <div class="row justify-content-end">
              <div class="col-auto">
                <div class="mb-3">
                  <button type="button" class="btn rounded-pill btn-primary" id="submit">Submit</button>
                </div>
                  
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>


<script src="{{ asset(mix('assets/vendor/libs/jquery/jquery.js')) }}"></script>
<script src="{{ asset('storage/js/submit-assign.js') }}"></script>
  
@endsection
