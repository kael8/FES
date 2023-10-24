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
            <input type="text" name="id" style="display: none;" value="{{ $result->id }}">
            <label for="defaultFormControlInput" class="form-label">Name</label>
            <input type="text" name = "name" class="form-control" value="{{ $result->name }}" placeholder="John Doe" aria-describedby="defaultFormControlHelp" />
            <div id="defaultFormControlHelp" class="form-text">We'll never share your details with anyone else.</div>
          </div>
          <div class="col-md-6">
            <label for="defaultFormControlInput" class="form-label">StudentID</label>
            <input type="text" name = "studentID" class="form-control" value="{{ $result->studentID }}" placeholder="2010460-1" aria-describedby="defaultFormControlHelp" />
            <div id="defaultFormControlHelp" class="form-text">We'll never share your details with anyone else.</div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <label for="defaultFormControlInput" class="form-label">Email</label>
            <input type="email" name = "email" class="form-control" value="{{ $result->email }}" placeholder="example@mail.com" aria-describedby="defaultFormControlHelp" />
            <div id="defaultFormControlHelp" class="form-text">We'll never share your details with anyone else.</div>
          </div>
          <div class="col-md-6">
    <label for="exampleFormControlSelect1" class="form-label">User Type</label>
    <select class="form-select" name="userType" aria-label="Default select example">
        <option value="Student" {{ $result->userType === 'Student' ? 'selected' : '' }}>Student</option>
        <option value="Faculty" {{ $result->userType === 'Faculty' ? 'selected' : '' }}>Faculty</option>
        <option value="System Admin" {{ $result->userType === 'System Admin' ? 'selected' : '' }}>System Admin</option>
        <option value="Academic Admin" {{ $result->userType === 'Academic Admin' ? 'selected' : '' }}>Academic Admin</option>
    </select>
</div>

        </div>
        <div class="row">

          <div class="col-md-6">
            <label for="defaultFormControlInput" class="form-label">College</label>
            <select class="form-select" name="college" aria-label="Default select example">
              <option value="">Open this select menu</option>
              @foreach($collegeList as $list)
                  <option value="{{ $list->id }}" {{ $list->id == $result->collegeID ? 'selected' : '' }}>
                      {{ $list->college_name }}
                  </option>
              @endforeach
            </select>

            <div id="defaultFormControlHelp" class="form-text">We'll never share your details with anyone else.</div>
          </div>
        
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="row justify-content-end">
              <div class="col-auto">
                <button type="button" class="btn rounded-pill btn-primary" id="submit" disabled>Submit</button>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const submitButton = document.getElementById('submit');
    const inputFields = document.querySelectorAll('.form-control');
    const selectElements = document.querySelectorAll('select');

    // Store the initial input and select values
    const initialValues = {};

    inputFields.forEach(inputField => {
        initialValues[inputField.name] = inputField.value;
        inputField.addEventListener('input', handleInput);
    });

    selectElements.forEach(selectElement => {
        initialValues[selectElement.name] = selectElement.value;
        selectElement.addEventListener('change', handleInput);
    });

    function handleInput() {
        // Check if any input or select value has changed
        const isInputChanged = Array.from(inputFields).some(inputField => {
            return inputField.value !== initialValues[inputField.name];
        });

        const isSelectChanged = Array.from(selectElements).some(selectElement => {
            return selectElement.value !== initialValues[selectElement.name];
        });

        // Enable or disable the submit button accordingly
        submitButton.disabled = !isInputChanged && !isSelectChanged;
    }
});
</script>



<script src="{{ asset(mix('assets/vendor/libs/jquery/jquery.js')) }}"></script>
<script src="{{ asset('storage/js/submit-modify.js') }}"></script>
  
</div>
@endsection
