@extends('content.academic-admin.layouts.contentNavbarLayout')

@section('title', 'Tables - Basic Tables')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Pending Evaluation
</h4>

<!-- Basic Bootstrap Table -->
<div class="card">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-7 text-start">
        <h5 class="card-header">Pending Evaluation</h5>
      </div>
      <div class="col-md-5 text-end">
        <div class="input-group" style="width: 100%; display: flex; justify-content: center; align-items: center;box-shadow: none;">
            <form method="GET" action="{{ route('academicadmin.pending-eval') }}" class="w-100">
                <div class="input-group mb-3" style="padding-top: 5%;box-shadow: none;">
                    <input type="search" name="search" id="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="search-addon" style="width: 150px;" />
                    <button type="submit" class="btn btn-outline-primary">Search</button>
                </div>
            </form>
        </div>
      </div>


    </div>
  </div>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>Faculty</th>
          <th>College</th>
          <th>SY & Semester</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
      @foreach($result as $record)
      <tr>
        <td>{{ $record->name }}</td>
        <td>{{ $record->college_name }}</td>
        <td>{{ $record->academic_period }}</td>
        <td>{{ $record->evaluated }}</td>
        <td>
          <button class="btn btn-sm btn-primary analyze-button" 
                  data-faculty-id="{{ $record->faculty_id }}" 
                  data-faculty-name="{{ $record->name }}" 
                  data-academic-year="{{ $record->academic_year }}" 
                  data-semester="{{ $record->semester }}">Analyze</button>
          <a href="#" class="btn btn-sm btn-danger">Delete</a>
        </td>
      </tr>
      @endforeach

      </tbody>
    </table>
  </div>
  <div class="card-footer">
  {{ $result->appends(['search' => $search])->links() }}
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmationModalLabel">Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to analyze <span id="facultyName"></span> (ID: <span id="facultyId"></span>) for academic year <span id="academicYear"></span>, <span id="semester"></span> semester?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cancel" onclick="closeModal()">Cancel</button>
        <button type="button" class="btn btn-primary" id="process">
            <span id="process-text">OK</span>
            <span id="loading-icon" style="display: none;">Loading...</span>
            
        </button>
        <button type="button" class="btn btn-light"id="success-icon" style="display: none;"><p>Success!
        <span ><i class="fa-solid fa-circle-check fa-2xl" style="color: #37ff00;"></i></span></p>
      </button>  



      </div>
      
    </div>
  </div>
</div>

<!--/ Basic Bootstrap Table -->


<script src="{{ asset(mix('assets/vendor/libs/jquery/jquery.js')) }}"></script>
<script src="{{ asset('storage/js/process.js') }}"></script>

<script>
  $(document).ready(function() {
  $('.analyze-button').click(function() {
    var facultyId = $(this).data('faculty-id');
    var facultyName = $(this).data('faculty-name');
    var academicYear = $(this).data('academic-year');
    var semester = $(this).data('semester');
    $('#facultyId').text(facultyId);
    $('#facultyName').text(facultyName);
    $('#academicYear').text(academicYear);
    $('#semester').text(semester);
    $('#confirmationModal').modal('show');
  });
});

function startAnalysis() {
  var facultyId = $('#facultyId').text();
  var facultyName = $('#facultyName').text();
  var academicYear = $('#academicYear').text();
  var semester = $('#semester').text();
  console.log("Analysis started for faculty: " + facultyName + " (ID: " + facultyId + ") - Academic Year: " + academicYear + " - Semester: " + semester);

  // Close the modal if needed
  $('#confirmationModal').modal('hide');
}
function closeModal() {
  $('#confirmationModal').modal('hide');
}
</script>

@endsection
