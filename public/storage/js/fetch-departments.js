$(document).ready(function () {
    // Event listener for college selection
    $('#collegeSelect').on('change', function () {
      var selectedCollegeId = $(this).val();

      // Make an Ajax request to fetch departments for the selected college
      $.ajax({
        url: '/fetch-departments', // Update this URL to match your Laravel route
        method: 'GET',
        data: { college_id: selectedCollegeId },
        success: function (data) {
          // Enable department select and populate with fetched data
          $('#departmentSelect').prop('disabled', false);
          $('#departmentSelect').html(data);
        }
      });
    });
  });