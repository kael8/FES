@extends('content.student.layouts.contentNavbarLayout')

@section('title', 'Basic Inputs - Forms')

@section('page-script')
<script src="{{asset('assets/js/form-basic-inputs.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Forms /</span> Basic Inputs
</h4>

<div class="row">
  <div class="col-md-12">
    <div class="card mb-4">
      <h5 class="card-header">Faculty</h5>
      <div class="card-body">
      <form id="formAuthentication" class="mb-3">
      @csrf
        <div id="error-message"></div>
        <div class="row">
        <div class="col-md-6">
          <div class="mb-3">
            <label for="collegeSelect" class="form-label">College</label>
            <select class="form-select" name="college" id="collegeSelect" aria-label="College select">
              <option selected disabled>Open this select menu</option>
              @foreach($collegeList as $list)
                <option value="{{ $list->id }}">{{ $list->college_name }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-md-6">
          <div class="mb-3">
            <label for="departmentSelect" class="form-label">Department</label>
            <select name="department" class="form-select" id="departmentSelect" aria-label="Department select" disabled>
              <option selected disabled>Select Department</option>
              <!-- Departments will be dynamically populated here via JavaScript -->
            </select>
          </div>
        </div>

          <div class="col-md-6">
            
                <div class="mb-3">
                  <label for="exampleFormControlSelect1" class="form-label">Program</label>
                  <select name="program" class="form-select" id="programSelect" aria-label="Program select" disabled>
                    <option selected disabled>Select Program</option>
                    <!-- Departments will be dynamically populated here via JavaScript -->
                  </select>
                </div>
              
            
          </div>

          <div class="col-md-6">
            <div class="mb-3">
              <label for="exampleDataList" class="form-label">Faculty</label>
              <select name="faculty" class="form-select" id="facultySelect" aria-label="Faculty select" disabled>
                <option selected disabled>Select Faculty</option>
                <!-- Departments will be dynamically populated here via JavaScript -->
              </select>
              
          
            </div>
          </div>
          <div class="col-md-6">
            
                <div class="mb-3">
                  <label for="exampleFormControlSelect1" class="form-label">Academic Year</label>
                  <select name="AY" class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                      <option selected>Academic Year & Semester Period</option>
                      @foreach ($academicYears as $academicYear)
                          <option value="{{ $academicYear }}">{{ $academicYear }}</option>
                      @endforeach

                  </select>

                </div>
              
            
          </div>

          <div class="col-md-6">
            
                <div class="mb-3">
                  <label for="exampleFormControlSelect1" class="form-label">Semester</label>
                  <select name = "semester"class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                    <option selected>Academic Year & Semester Period</option>
                    <option value="1st">1st</option>
                    <option value="2nd">2nd</option>
                    <option value="Summer">Summer</option>
                  </select>
                </div>
              
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="card mb-4">
      <h5 class="card-header">Default</h5>
      <div class="card-body">
      <div class="mb-3">
          <!-- Striped Rows -->
        <div class="card">
          <h6 class="card-header">Instructions: Please evaluate the faculty using the scale below. Select the number that corresponds to your rating.</h6>
          <div class="table-responsive text-nowrap">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Scale</th>
                  <th>Descriptive Rating</th>
                  <th>Qualitative Descriptions</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                <tr>
                  <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>5</strong></td>
                  <td>Outstanding</td>
                  <td>The performance almost always exceeds the job requirements. The faculty is an exceptional role model.</td>   
                </tr>
                <tr>
                  <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>4</strong></td>
                  <td>Very Satisfactory</td>
                  <td>The performance meets and often exceeds the job requirements.</td>   
                </tr>
                <tr>
                  <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>3</strong></td>
                  <td>Satisfactory</td>
                  <td>The performance meets job requirements.</td>   
                </tr>
                <tr>
                  <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>2</strong></td>
                  <td>Fair</td>
                  <td>The performance needs some development to meet job requirements.</td>   
                </tr>
                <tr>
                  <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>1</strong></td>
                  <td>Poor</td>
                  <td>The faculty fails to meet job requirements.</td>   
                </tr>
              </tbody>
            </table>
          </div>
        </div>
<!--/ Striped Rows -->
      </div>
    </div>
  </div>
</div>



  <div class="col-md-12">
    <div class="card mb-4">
      <h5 class="card-header">Default</h5>
      <div class="card-body">
      <div class="mb-3">
          <!-- Striped Rows -->
        <div class="card">
          <h6 class="card-header">Instructions: Please evaluate the faculty using the scale below. Select the number that corresponds to your rating.</h6>
          <div class="table-responsive text-nowrap">
            <table class="table table-striped">
              <thead align="center">
                  <tr>
                      <!-- First Header -->
                      <th colspan="1">A. Commitment</th>
                      <!-- Second Header -->
                      <th colspan="5">Scale</th>
                  </tr>
                  <tr align="center">
                      <!-- Subheader in the 2nd Header -->
                      <th></th>
                      <!-- Individual columns in the 2nd Header -->
                      <th>5</th>
                      <th>4</th>
                      <th>3</th>
                      <th>2</th>
                      <th>1</th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <!-- Data Rows -->
                      <td class="text-wrap">1. Demonstrates sensitivity to student's ability to attend and absorb content information.</td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="A1" class="form-check-input" type="radio" value="5" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="A1" class="form-check-input" type="radio" value="4" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="A1" class="form-check-input" type="radio" value="3" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="A1" class="form-check-input" type="radio" value="2" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="A1" class="form-check-input" type="radio" value="1" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>

                  </tr>
                  <tr>
                      <td class="text-wrap">2. Integrates sensitivity his/her learning objectives with those of the students in a collaborative process.</td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="A2" class="form-check-input" type="radio" value="5" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="A2" class="form-check-input" type="radio" value="4" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="A2" class="form-check-input" type="radio" value="3" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="A2" class="form-check-input" type="radio" value="2" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="A2" class="form-check-input" type="radio" value="1" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                  </tr>
                  <tr>
                      <td class="text-wrap">3. Make oneself self-available to students beyond official time.</td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="A3" class="form-check-input" type="radio" value="5" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="A3" class="form-check-input" type="radio" value="4" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="A3" class="form-check-input" type="radio" value="3" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="A3" class="form-check-input" type="radio" value="2" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="A3" class="form-check-input" type="radio" value="1" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                  </tr>
                  <tr>
                      <td class="text-wrap">4. Regularly comes to class on time, well-groomed and well-prepared to complete assigned responsibilities.</td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="A4" class="form-check-input" type="radio" value="5" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="A4" class="form-check-input" type="radio" value="4" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="A4" class="form-check-input" type="radio" value="3" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="A4" class="form-check-input" type="radio" value="2" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="A4" class="form-check-input" type="radio" value="1" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                  </tr>
                  <tr>
                      <td class="text-wrap">5. Keeps accurate records of students' performance and prompt submission of the same.</td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="A5" class="form-check-input" type="radio" value="5" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="A5" class="form-check-input" type="radio" value="4" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="A5" class="form-check-input" type="radio" value="3" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="A5" class="form-check-input" type="radio" value="2" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="A5" class="form-check-input" type="radio" value="1" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                  </tr>
              </tbody>
              <thead align="center">
                  <tr>
                      <!-- First Header -->
                      <th colspan="1">B. Knowledge of Subject</th>
                      <!-- Second Header -->
                      <th colspan="5">Scale</th>
                  </tr>
                  <tr align="center">
                      <!-- Subheader in the 2nd Header -->
                      <th></th>
                      <!-- Individual columns in the 2nd Header -->
                      <th>5</th>
                      <th>4</th>
                      <th>3</th>
                      <th>2</th>
                      <th>1</th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <!-- Data Rows -->
                      <td class="text-wrap">1. Demonstrates mastery of the subject matter (explains the subject matter without relying solely on the prescribed textbook.)</td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="B1" class="form-check-input" type="radio" value="5" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="B1" class="form-check-input" type="radio" value="4" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="B1" class="form-check-input" type="radio" value="3" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="B1" class="form-check-input" type="radio" value="2" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="B1" class="form-check-input" type="radio" value="1" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>

                  </tr>
                  <tr>
                      <td class="text-wrap">2. Draws and shares information on the state of the art theory and practice in his/her discipline</td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="B2" class="form-check-input" type="radio" value="5" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="B2" class="form-check-input" type="radio" value="4" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="B2" class="form-check-input" type="radio" value="3" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="B2" class="form-check-input" type="radio" value="2" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="B2" class="form-check-input" type="radio" value="1" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                  </tr>
                  <tr>
                      <td class="text-wrap">3. Integrates the subject to practical circumstances and learning intents/purposes of students.</td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="B3" class="form-check-input" type="radio" value="5" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="B3" class="form-check-input" type="radio" value="4" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="B3" class="form-check-input" type="radio" value="3" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="B3" class="form-check-input" type="radio" value="2" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="B3" class="form-check-input" type="radio" value="1" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                  </tr>
                  <tr>
                      <td class="text-wrap">4. Explains the relevance of present topics to the previous lessons, and relates the subject matter to relevant current issues and/or daily life activities.</td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="B4" class="form-check-input" type="radio" value="5" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="B4" class="form-check-input" type="radio" value="4" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="B4" class="form-check-input" type="radio" value="3" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="B4" class="form-check-input" type="radio" value="2" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="B4" class="form-check-input" type="radio" value="1" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                  </tr>
                  <tr>
                      <td class="text-wrap">5. Demonstrates up-to-date knowledge and/or awareness on current trends and issues of the subject.</td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="B5" class="form-check-input" type="radio" value="5" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="B5" class="form-check-input" type="radio" value="4" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="B5" class="form-check-input" type="radio" value="3" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="B5" class="form-check-input" type="radio" value="2" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="B5" class="form-check-input" type="radio" value="1" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                  </tr>
              </tbody>
              <thead align="center">
                  <tr>
                      <!-- First Header -->
                      <th colspan="1">C. Teaching for Independent Learning</th>
                      <!-- Second Header -->
                      <th colspan="5">Scale</th>
                  </tr>
                  <tr align="center">
                      <!-- Subheader in the 2nd Header -->
                      <th></th>
                      <!-- Individual columns in the 2nd Header -->
                      <th>5</th>
                      <th>4</th>
                      <th>3</th>
                      <th>2</th>
                      <th>1</th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <!-- Data Rows -->
                      <td class="text-wrap">1. Creates teaching strategies that allow students to practice using concepts they need to understand (interactive discussion).</td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="C1" class="form-check-input" type="radio" value="5" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="C1" class="form-check-input" type="radio" value="4" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="C1" class="form-check-input" type="radio" value="3" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="C1" class="form-check-input" type="radio" value="2" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="C1" class="form-check-input" type="radio" value="1" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>

                  </tr>
                  <tr>
                      <td class="text-wrap">2. Enhances student self-esteem and/or gives dues recognition to students' performance/potentials.</td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="C2" class="form-check-input" type="radio" value="5" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="C2" class="form-check-input" type="radio" value="4" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="C2" class="form-check-input" type="radio" value="3" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="C2" class="form-check-input" type="radio" value="2" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="C2" class="form-check-input" type="radio" value="1" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                  </tr>
                  <tr>
                      <td class="text-wrap">3. Integrates the subject to practical circumstances and learning intents/purposes of students.</td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="C3" class="form-check-input" type="radio" value="5" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="C3" class="form-check-input" type="radio" value="4" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="C3" class="form-check-input" type="radio" value="3" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="C3" class="form-check-input" type="radio" value="2" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="C3" class="form-check-input" type="radio" value="1" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                  </tr>
                  <tr>
                      <td class="text-wrap">4. Allows students to think independently and make their own decisions and holding them accountable for their performance based largely on their success in executing decisions.</td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="C4" class="form-check-input" type="radio" value="5" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="C4" class="form-check-input" type="radio" value="4" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="C4" class="form-check-input" type="radio" value="3" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="C4" class="form-check-input" type="radio" value="2" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="C4" class="form-check-input" type="radio" value="1" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                  </tr>
                  <tr>
                      <td class="text-wrap">5. Encourages students to learn beyond what is required and helps/guides the students how to apply the concepts learned.</td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="C5" class="form-check-input" type="radio" value="5" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="C5" class="form-check-input" type="radio" value="4" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="C5" class="form-check-input" type="radio" value="3" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="C5" class="form-check-input" type="radio" value="2" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="C5" class="form-check-input" type="radio" value="1" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                  </tr>
              </tbody>
              <thead align="center">
                  <tr>
                      <!-- First Header -->
                      <th colspan="1">D. Management of Learning</th>
                      <!-- Second Header -->
                      <th colspan="5">Scale</th>
                  </tr>
                  <tr align="center">
                      <!-- Subheader in the 2nd Header -->
                      <th></th>
                      <!-- Individual columns in the 2nd Header -->
                      <th>5</th>
                      <th>4</th>
                      <th>3</th>
                      <th>2</th>
                      <th>1</th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <!-- Data Rows -->
                      <td class="text-wrap">1. Creates opportunities for intensive and/or extensive contribution of students in the class activities (e.g breaks class into dyads, triads, or buss/tasks groups.)</td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="D1" class="form-check-input" type="radio" value="5" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="D1" class="form-check-input" type="radio" value="4" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="D1" class="form-check-input" type="radio" value="3" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="D1" class="form-check-input" type="radio" value="2" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="D1" class="form-check-input" type="radio" value="1" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>

                  </tr>
                  <tr>
                      <td class="text-wrap">2. Assume roles as facilitator, resource person, coach, inquisitor, integrator, referee in drawing students to contribute to knowledge and understanding of the concepts at hands.</td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="D2" class="form-check-input" type="radio" value="5" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="D2" class="form-check-input" type="radio" value="4" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="D2" class="form-check-input" type="radio" value="3" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="D2" class="form-check-input" type="radio" value="2" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="D2" class="form-check-input" type="radio" value="1" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                  </tr>
                  <tr>
                      <td class="text-wrap">3. Designs and implements learning conditions and experience that promote healthy exchange and/or confrontations</td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="D3" class="form-check-input" type="radio" value="5" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="D3" class="form-check-input" type="radio" value="4" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="D3" class="form-check-input" type="radio" value="3" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="D3" class="form-check-input" type="radio" value="2" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="D3" class="form-check-input" type="radio" value="1" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                  </tr>
                  <tr>
                      <td class="text-wrap">4. Structures/re-structures learning and teaching-learning context to enhance attainment of collective learning objectives.</td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="D4" class="form-check-input" type="radio" value="5" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="D4" class="form-check-input" type="radio" value="4" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="D4" class="form-check-input" type="radio" value="3" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="D4" class="form-check-input" type="radio" value="2" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="D4" class="form-check-input" type="radio" value="1" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                  </tr>
                  <tr>
                      <td class="text-wrap">5. Use of Instructional Materials (audio/video materials: fieldtrips, film showing, computer aided instruction and etc.) to reinforce learning processes.</td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="D5" class="form-check-input" type="radio" value="5" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="D5" class="form-check-input" type="radio" value="4" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="D5" class="form-check-input" type="radio" value="3" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="D5" class="form-check-input" type="radio" value="2" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check mt-3">
                          <input name="D5" class="form-check-input" type="radio" value="1" id="defaultRadio1" />
                          <label class="form-check-label" for="defaultRadio1">
                          </label>
                        </div>
                      </td>
                  </tr>
              </tbody>
              <thead>
                <tr>
                  <th colspan="6">
                    <label for="exampleFormControlTextarea1" class="form-label">Comment</label>
                    <textarea name = "comment"class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                  </th>
                </tr>
              </thead>
              
            </table>
            
          </div>
        </div>
<!--/ Striped Rows -->
      </div>
      <div class="row justify-content-end">
        <div class="col-auto">
            <button type="button" class="btn rounded-pill btn-primary" id="submit">Submit</button>
        </div>
      </div>
    </div>
  </div>
</div>
</form>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script src="{{ asset(mix('assets/vendor/libs/jquery/jquery.js')) }}"></script>
<script src="{{ asset('storage/js/submit-eval.js') }}"></script>

<!-- Department -->
<script src="{{ asset('storage/js/fetch-departments.js') }}"></script>

<!-- Program -->
<script src="{{ asset('storage/js/fetch-programs.js') }}"></script>

<!-- Program -->
<script src="{{ asset('storage/js/fetch-faculties.js') }}"></script>

  <!-- Form controls -->
  <div class="col-md-6">
    <div class="card mb-4">
      <h5 class="card-header">Form Controls</h5>
      <div class="card-body">
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Email address</label>
          <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" />
        </div>
        <div class="mb-3">
          <label for="exampleFormControlReadOnlyInput1" class="form-label">Read only</label>
          <input class="form-control" type="text" id="exampleFormControlReadOnlyInput1" placeholder="Readonly input here..." readonly />
        </div>
        <div class="mb-3">
          <label for="exampleFormControlReadOnlyInputPlain1" class="form-label">Read plain</label>
          <input type="text" readonly class="form-control-plaintext" id="exampleFormControlReadOnlyInputPlain1" value="email@example.com" />
        </div>
        <div class="mb-3">
          <label for="exampleFormControlSelect1" class="form-label">Example select</label>
          <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
            <option selected>Open this select menu</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="exampleDataList" class="form-label">Datalist example</label>
          <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
          <datalist id="datalistOptions">
            <option value="San Francisco">
            <option value="New York">
            <option value="Seattle">
            <option value="Los Angeles">
            <option value="Chicago">
          </datalist>
        </div>
        <div class="mb-3">
          <label for="exampleFormControlSelect2" class="form-label">Example multiple select</label>
          <select multiple class="form-select" id="exampleFormControlSelect2" aria-label="Multiple select example">
            <option selected>Open this select menu</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
          </select>
        </div>
        <div>
          <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
      </div>
    </div>
  </div>

  <!-- Input Sizing -->
  <div class="col-md-6">
    <div class="card mb-4">
      <h5 class="card-header">Input Sizing</h5>
      <div class="card-body">
        <small class="text-light fw-semibold">Input text</small>

        <div class="mt-2 mb-3">
          <label for="largeInput" class="form-label">Large input</label>
          <input id="largeInput" class="form-control form-control-lg" type="text" placeholder=".form-control-lg" />
        </div>
        <div class="mb-3">
          <label for="defaultInput" class="form-label">Default input</label>
          <input id="defaultInput" class="form-control" type="text" placeholder="Default input" />
        </div>
        <div>
          <label for="smallInput" class="form-label">Small input</label>
          <input id="smallInput" class="form-control form-control-sm" type="text" placeholder=".form-control-sm" />
        </div>

      </div>
      <hr class="m-0" />
      <div class="card-body">
        <small class="text-light fw-semibold">Input select</small>
        <div class="mt-2 mb-3">
          <label for="largeSelect" class="form-label">Large select</label>
          <select id="largeSelect" class="form-select form-select-lg">
            <option>Large select</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="defaultSelect" class="form-label">Default select</label>
          <select id="defaultSelect" class="form-select">
            <option>Default select</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
          </select>
        </div>
        <div>
          <label for="smallSelect" class="form-label">Small select</label>
          <select id="smallSelect" class="form-select form-select-sm">
            <option>Small select</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
          </select>
        </div>
      </div>
    </div>
  </div>

  <!-- Default Checkboxes and radios & Default checkboxes and radios -->
  <div class="col-xl-6">

    <div class="card mb-4">
      <h5 class="card-header">Checkboxes and Radios</h5>
      <!-- Checkboxes and Radios -->
      <div class="card-body">
        <div class="row gy-3">
          <div class="col-md">
            <small class="text-light fw-semibold">Checkboxes</small>
            <div class="form-check mt-3">
              <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" />
              <label class="form-check-label" for="defaultCheck1">
                Unchecked
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" checked />
              <label class="form-check-label" for="defaultCheck2">
                Indeterminate
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="defaultCheck3" checked />
              <label class="form-check-label" for="defaultCheck3">
                Checked
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="disabledCheck1" disabled />
              <label class="form-check-label" for="disabledCheck1">
                Disabled Unchecked
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="disabledCheck2" disabled checked />
              <label class="form-check-label" for="disabledCheck2">
                Disabled Checked
              </label>
            </div>
          </div>
          <div class="col-md">
            <small class="text-light fw-semibold">Radio</small>
            <div class="form-check mt-3">
              <input name="default-radio-1" class="form-check-input" type="radio" value="" id="defaultRadio1" />
              <label class="form-check-label" for="defaultRadio1">
                Unchecked
              </label>
            </div>
            <div class="form-check">
              <input name="default-radio-1" class="form-check-input" type="radio" value="" id="defaultRadio2" checked />
              <label class="form-check-label" for="defaultRadio2">
                Checked
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" value="" id="disabledRadio1" disabled />
              <label class="form-check-label" for="disabledRadio1">
                Disabled unchecked
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" value="" id="disabledRadio2" disabled checked />
              <label class="form-check-label" for="disabledRadio2">
                Disabled checkbox
              </label>
            </div>
          </div>
        </div>
      </div>
      <hr class="m-0" />
      <!-- Inline Checkboxes -->
      <div class="card-body">
        <div class="row gy-3">
          <div class="col-md">
            <small class="text-light fw-semibold d-block">Inline Checkboxes</small>
            <div class="form-check form-check-inline mt-3">
              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" />
              <label class="form-check-label" for="inlineCheckbox1">1</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2" />
              <label class="form-check-label" for="inlineCheckbox2">2</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3" disabled />
              <label class="form-check-label" for="inlineCheckbox3">3 (disabled)</label>
            </div>
          </div>
          <div class="col-md">
            <small class="text-light fw-semibold d-block">Inline Radio</small>
            <div class="form-check form-check-inline mt-3">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" />
              <label class="form-check-label" for="inlineRadio1">1</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2" />
              <label class="form-check-label" for="inlineRadio2">2</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3" disabled />
              <label class="form-check-label" for="inlineRadio3">3 (disabled)</label>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Switches -->
    <div class="card mb-4">
      <h5 class="card-header">Switches</h5>
      <div class="card-body">
        <div class="form-check form-switch mb-2">
          <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
          <label class="form-check-label" for="flexSwitchCheckDefault">Default switch checkbox input</label>
        </div>
        <div class="form-check form-switch mb-2">
          <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
          <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch checkbox input</label>
        </div>
        <div class="form-check form-switch mb-2">
          <input class="form-check-input" type="checkbox" id="flexSwitchCheckDisabled" disabled>
          <label class="form-check-label" for="flexSwitchCheckDisabled">Disabled switch checkbox input</label>
        </div>
        <div class="form-check form-switch">
          <input class="form-check-input" type="checkbox" id="flexSwitchCheckCheckedDisabled" checked disabled>
          <label class="form-check-label" for="flexSwitchCheckCheckedDisabled">Disabled checked switch checkbox input</label>
        </div>
      </div>
    </div>

    <!-- Range -->
    <div class="card mb-4 mb-xl-0">
      <h5 class="card-header">Range</h5>
      <div class="card-body">
        <div class="mb-3">
          <label for="formRange1" class="form-label">Example range</label>
          <input type="range" class="form-range" id="formRange1">
        </div>
        <div class="mb-3">
          <label for="disabledRange" class="form-label">Disabled range</label>
          <input type="range" class="form-range" id="disabledRange" disabled>
        </div>
        <div class="mb-3">
          <label for="formRange2" class="form-label">Min and max</label>
          <input type="range" class="form-range" min="0" max="5" id="formRange2">
        </div>
        <div>
          <label for="formRange3" class="form-label">Steps</label>
          <input type="range" class="form-range" min="0" max="5" step="0.5" id="formRange3">
        </div>
      </div>
    </div>

  </div>

  <div class="col-xl-6">
    <!-- HTML5 Inputs -->
    <div class="card mb-4">
      <h5 class="card-header">HTML5 Inputs</h5>
      <div class="card-body">
        <div class="mb-3 row">
          <label for="html5-text-input" class="col-md-2 col-form-label">Text</label>
          <div class="col-md-10">
            <input class="form-control" type="text" value="{{ config('variables.templateName') }}" id="html5-text-input" />
          </div>
        </div>
        <div class="mb-3 row">
          <label for="html5-search-input" class="col-md-2 col-form-label">Search</label>
          <div class="col-md-10">
            <input class="form-control" type="search" value="Search ..." id="html5-search-input" />
          </div>
        </div>
        <div class="mb-3 row">
          <label for="html5-email-input" class="col-md-2 col-form-label">Email</label>
          <div class="col-md-10">
            <input class="form-control" type="email" value="john@example.com" id="html5-email-input" />
          </div>
        </div>
        <div class="mb-3 row">
          <label for="html5-url-input" class="col-md-2 col-form-label">URL</label>
          <div class="col-md-10">
            <input class="form-control" type="url" value="{{ config('variables.creatorUrl') }}" id="html5-url-input" />
          </div>
        </div>
        <div class="mb-3 row">
          <label for="html5-tel-input" class="col-md-2 col-form-label">Phone</label>
          <div class="col-md-10">
            <input class="form-control" type="tel" value="90-(164)-188-556" id="html5-tel-input" />
          </div>
        </div>
        <div class="mb-3 row">
          <label for="html5-password-input" class="col-md-2 col-form-label">Password</label>
          <div class="col-md-10">
            <input class="form-control" type="password" value="password" id="html5-password-input" />
          </div>
        </div>
        <div class="mb-3 row">
          <label for="html5-number-input" class="col-md-2 col-form-label">Number</label>
          <div class="col-md-10">
            <input class="form-control" type="number" value="18" id="html5-number-input" />
          </div>
        </div>
        <div class="mb-3 row">
          <label for="html5-datetime-local-input" class="col-md-2 col-form-label">Datetime</label>
          <div class="col-md-10">
            <input class="form-control" type="datetime-local" value="2021-06-18T12:30:00" id="html5-datetime-local-input" />
          </div>
        </div>
        <div class="mb-3 row">
          <label for="html5-date-input" class="col-md-2 col-form-label">Date</label>
          <div class="col-md-10">
            <input class="form-control" type="date" value="2021-06-18" id="html5-date-input" />
          </div>
        </div>
        <div class="mb-3 row">
          <label for="html5-month-input" class="col-md-2 col-form-label">Month</label>
          <div class="col-md-10">
            <input class="form-control" type="month" value="2021-06" id="html5-month-input" />
          </div>
        </div>
        <div class="mb-3 row">
          <label for="html5-week-input" class="col-md-2 col-form-label">Week</label>
          <div class="col-md-10">
            <input class="form-control" type="week" value="2021-W25" id="html5-week-input" />
          </div>
        </div>
        <div class="mb-3 row">
          <label for="html5-time-input" class="col-md-2 col-form-label">Time</label>
          <div class="col-md-10">
            <input class="form-control" type="time" value="12:30:00" id="html5-time-input" />
          </div>
        </div>
        <div class="mb-3 row">
          <label for="html5-color-input" class="col-md-2 col-form-label">Color</label>
          <div class="col-md-10">
            <input class="form-control" type="color" value="#666EE8" id="html5-color-input" />
          </div>
        </div>
        <div class="row">
          <label for="html5-range" class="col-md-2 col-form-label">Range</label>
          <div class="col-md-10">
            <input type="range" class="form-range mt-3" id="html5-range" />
          </div>
        </div>
      </div>
    </div>

    <!-- File input -->
    <div class="card">
      <h5 class="card-header">File input</h5>
      <div class="card-body">
        <div class="mb-3">
          <label for="formFile" class="form-label">Default file input example</label>
          <input class="form-control" type="file" id="formFile">
        </div>
        <div class="mb-3">
          <label for="formFileMultiple" class="form-label">Multiple files input example</label>
          <input class="form-control" type="file" id="formFileMultiple" multiple>
        </div>
        <div>
          <label for="formFileDisabled" class="form-label">Disabled file input example</label>
          <input class="form-control" type="file" id="formFileDisabled" disabled>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
