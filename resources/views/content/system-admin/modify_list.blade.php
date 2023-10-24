@extends('content.system-admin.layouts.contentNavbarLayout')

@section('title', 'Tables - Basic Tables')

@section('content')

<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Tables /</span> Basic Tables
</h4>

<!-- Responsive Table -->
<div class="card">
<div class="container">
  <div class="row align-items-center">
    <div class="col-md-7 text-start">
      <h5 class="card-header">Responsive Table</h5>
    </div>
    <div class="col-md-5 text-end">
      <div class="input-group" style="width: 100%; display: flex; justify-content: center; align-items: center;box-shadow: none;">
          <form method="GET" action="{{ route('systemadmin.modifylist') }}" class="w-100">
              <div class="input-group mb-3" style="padding-top: 5%;box-shadow: none;">
                  <input type="search" name="search" id="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="search-addon" style="width: 150px;" />
                  <button type="submit" class="btn btn-outline-primary">Search</button>
              </div>
          </form>
      </div>
    </div>


  </div>
</div>


  <div class="table-responsive text-nowrap" id="table">
    <table class="table">
      <thead>
        <tr class="text-nowrap">
          <th>ID</th>
          <th>Name</th>
          <th>College</th>
          <th>Department</th>
          <th>User Type</th>
          <th>Email</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      @foreach ($result as $item)
      <tr>
          <th scope="row">{{ $item->studentID }}</th>
          <td>{{ $item->name }}</td>
          <td>{{ $item->college_name }}</td>
          <td>{{ $item->department_name }}</td>
          <td>{{ $item->userType }}</td>
          <td>{{ $item->email }}</td>
          <td>
            <a href="{{ url('/system-admin/modify-account') }}?id={{ $item->studentID }}" class="btn btn-primary btn-sm">Modify</a>
            <button class="btn btn-danger btn-sm delete-button" data-student-id="{{ $item->studentID }}" data-user-name="{{ $item->name }}">Remove</button>
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

<!-- Modal for Delete Confirmation -->
<div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to remove <span id="deleteUserNamePlaceholder"></span>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form method="post" action="{{ url('/remove-account') }}">
                    @csrf
                    <input type="hidden" name="id" id="deleteStudentIDInput" value="">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Add these before your custom script -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
  $(document).ready(function() {
    $('.delete-button').on('click', function() {
        const button = $(this);
        const studentID = button.data('student-id');
        const userName = button.data('user-name');
        const modal = $('#deleteConfirmationModal');
        modal.find('#deleteUserNamePlaceholder').text(userName);
        modal.find('#deleteStudentIDInput').val(studentID);
        modal.modal('show');
    });
  });
</script>

<script>
    $(document).ready(function() {
        $("#searchButton").click(function() {
          var searchTerm = $("#search").val();
          console.log(searchTerm);
          var csrfToken = $('meta[name="csrf-token"]').attr('content');

          $.ajax({
              type: "GET",
              url: "/system-admin/modifylist",
              data: {search:searchTerm},
              dataType: "json",
              headers: {
                  'X-CSRF-TOKEN': csrfToken
              },
              success: function(response) {
                  if(response.status_code == '0')
                  {
                      $('#table').html(response.table)
                  }
                  else
                  {
                      $('#error-message').html(response.Message);
                      $('#error-message').css('color', 'tomato');
                      $('#error-message').css('font-size', '0.7rem');
                  }
              },
          })
            
        });
    });
</script>

@endsection
