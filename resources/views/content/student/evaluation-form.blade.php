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
                  <td><strong>5</strong></td>
                  <td>Outstanding</td>
                  <td>The performance almost always exceeds the job requirements. The faculty is an exceptional role model.</td>   
                </tr>
                <tr>
                  <td><strong>4</strong></td>
                  <td>Very Satisfactory</td>
                  <td>The performance meets and often exceeds the job requirements.</td>   
                </tr>
                <tr>
                  <td><strong>3</strong></td>
                  <td>Satisfactory</td>
                  <td>The performance meets job requirements.</td>   
                </tr>
                <tr>
                  <td><strong>2</strong></td>
                  <td>Fair</td>
                  <td>The performance needs some development to meet job requirements.</td>   
                </tr>
                <tr>
                  <td><strong>1</strong></td>
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
<script src="{{ asset('storage/js/fetch-faculties.js') }}"></script>

  
@endsection
