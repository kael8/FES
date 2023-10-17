$(document).ready(function() {
    $('#process').on('click', function(e) {
        e.preventDefault();

        console.log('ey');
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        var facultyId = $('#facultyId').text();
        var facultyName = $('#facultyName').text();
        var academicYear = $('#academicYear').text();
        var semester = $('#semester').text();

        $.ajax({
            type: "POST",
            url: "/analyze-sentiment",
            data: {
                facultyId: facultyId,
                facultyName: facultyName,
                academicYear: academicYear,
                semester: semester
            },
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            success: function(response) {
                if(response.status_code == '0')
                {
                    location.href = '/';
                }
                else
                {
                    // Error: Display an error message using SweetAlert
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message
                    });
                }
            },
        });
    });
});
