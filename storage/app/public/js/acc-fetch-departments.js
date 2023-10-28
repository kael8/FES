$(document).ready(function () {
  // Event listener for user type selection
  $('#userType').on('change', function () {
      var selectedUserType = $(this).val();
      var selectedCollegeId = $('#collegeSelect').val();

      // Check if the selected user type is "Dean"
      if (selectedUserType === 'Dean') {
          // If user is a Dean, disable department select and clear its options
          $('#departmentSelect').prop('disabled', true);
          $('#departmentSelect').empty();
      } else {
          // For other user types, enable department select
          $('#departmentSelect').prop('disabled', false);

          // Fetch departments based on the selected college
          fetchDepartments(selectedCollegeId);
      }
  });

  // Event listener for college selection
  $('#collegeSelect').on('change', function () {
      var selectedCollegeId = $(this).val();
      var selectedUserType = $('#userType').val();

      // Fetch departments based on the selected college if user is not a Dean
      if (selectedUserType !== 'Dean') {
          fetchDepartments(selectedCollegeId);
      }
  });

  // Function to fetch departments based on the selected college
  function fetchDepartments(collegeId) {
      $.ajax({
          url: '/acc-fetch-departments', // Update this URL to match your Laravel route
          method: 'GET',
          data: { college_id: collegeId },
          success: function (data) {
              // Populate department select with fetched data
              $('#departmentSelect').html(data);
          }
      });
  }

  // Trigger the change event on user type select to initially handle the state
  $('#userType').change();
});
