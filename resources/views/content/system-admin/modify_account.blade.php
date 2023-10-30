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
          <label for="defaultFormControlInput" class="form-label">Password</label>
            <input type="password" name = "password"class="form-control" aria-describedby="defaultFormControlHelp" placeholder="Change the password here" />
            <div id="defaultFormControlHelp" class="form-text">We'll never share your details with anyone else.</div>
            
          </div>
          <div class="col-md-6">
    <label for="userType" class="form-label">User Type</label>
    <select class="form-select" name="userType" aria-label="Default select example">
        <option value="Student" {{ $result->userType === 'Student' ? 'selected' : '' }}>Student</option>
        <option value="Faculty" {{ $result->userType === 'Faculty' ? 'selected' : '' }}>Faculty</option>
        <option value="System Admin" {{ $result->userType === 'System Admin' ? 'selected' : '' }}>System Admin</option>
        <option value="Academic Admin" {{ $result->userType === 'Academic Admin' ? 'selected' : '' }}>Academic Admin</option>
    </select>

    <div class="col-md-6">
    <label for="isDean" class="form-check form-switch">
        <input class="form-check-input" type="checkbox" name="isDean" id="isDean" value="1" {{ $result->is_dean ? 'checked' : '' }}>
        Dean
    </label>
</div>

</div>


        </div>
        <div class="row">
          <div class="col-md-6">
            <label for="defaultFormControlInput" class="form-label">College</label>
            <select class="form-select" name="college" id="collegeSelect" aria-label="Default select example" >
                <option selected>Open this select menu</option>
                @foreach($collegeList as $list)
                    <option value="{{ $list->id }}" {{ $list->id == $result->collegeID ? 'selected' : '' }}>
                        {{ $list->college_name }}
                    </option>
                @endforeach
            </select>
          </div>

          <div class="col-md-6">
            <label for="defaultFormControlInput" class="form-label">Department</label>
            <select class="form-select" name = "department" id="departmentSelect" aria-label="Default select example">
              <option selected>Open this select menu</option>
              @foreach($dep as $list)
                    <option value="{{ $list->id }}" {{ $list->id == $result->departmentID ? 'selected' : '' }}>
                        {{ $list->department_name }}
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
                <input name = "dep" id="dep" type="text" value="{{ $result->departmentID }}" style="display: none;">
                <button type="button" class="btn rounded-pill btn-primary" id="submit" disabled>Submit</button>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>

<script src="{{ asset(mix('assets/vendor/libs/jquery/jquery.js')) }}"></script>
<script src="{{ asset('storage/js/submit-modify.js') }}"></script>
<script src="{{ asset('storage/js/acc-fetch-departments.js') }}"></script>

<script>

document.addEventListener('DOMContentLoaded', function() {
  // This code will run when the page is ready
  var selectedCollegeId = $('#collegeSelect').val();
  var dep = $('#dep').val();
  console.log(dep);
  // Make an Ajax request to fetch departments for the selected college
  $.ajax({
          url: '/acc-fetch-departments', // Update this URL to match your Laravel route
          method: 'GET',
          data: { college_id: selectedCollegeId, dep: dep },
          success: function (data) {
              // Populate department select with fetched data
              $('#departmentSelect').html(data);
          }
      });
});



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



document.addEventListener('DOMContentLoaded', function() {
    const userTypeSelect = document.querySelector('select[name="userType"]');
    const deanCheckbox = document.getElementById('isDean');
    const departmentSelect = document.querySelector('select[name="department"]');
    const isDean = {{ $result->is_dean ? 'true' : 'false' }};

    // Store the initial value of the Department dropdown
    const initialDepartmentValue = departmentSelect.value;

    // Store the initial state of the Dean checkbox
    let initialDeanState = deanCheckbox.checked;

    // Add an event listener to the user type dropdown
    userTypeSelect.addEventListener('change', function() {
        updateDeanCheckbox(this.value);
    });

    // Add an event listener to the Dean checkbox
    deanCheckbox.addEventListener('change', function() {
        updateDepartmentSelect(this.checked);
    });

    function updateDeanCheckbox(userType) {
        if (userType === 'Academic Admin') {
            deanCheckbox.removeAttribute('disabled');
            departmentSelect.disabled = deanCheckbox.checked;
            departmentSelect.value = ''; // Clear the Department dropdown
            departmentSelect.querySelector('option[value=""]').innerText = 'Select a department'; // Set the placeholder text
        } else {
            deanCheckbox.setAttribute('disabled', 'disabled');
            deanCheckbox.checked = false;
            departmentSelect.disabled = false;
        }
    }

    function updateDepartmentSelect(deanChecked) {
        departmentSelect.disabled = deanChecked;
        if (!deanChecked) {
            departmentSelect.value = ''; // Clear the Department dropdown
        } else {
            departmentSelect.value = initialDepartmentValue; // Reset the Department dropdown
        }
    }

    // Trigger initial update
    updateDeanCheckbox(userTypeSelect.value);
});





</script>




  
</div>
@endsection