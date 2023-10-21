$(document).ready(function() {
    $('#process').on('click', function(e) {
        e.preventDefault();

        // Disable the button
        $(this).prop('disabled', true);

        // Hide the original text and show the loading icon
        $('#process-text').hide();
        $('#loading-icon').show();

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
                // Update the button content to "Success" and show the success icon
                

                // Hide the loading icon after a brief delay
                setTimeout(function() {
                    $('#loading-icon').hide();
                    $('#process-text').hide();
                    $('#cancel').hide();
                    $('#process').hide();
                    $('#success-icon').show();
                }, 500);

                if (response.status_code == '1') {
                    // Delay hiding the "Success" text and icon by 2 seconds
                    setTimeout(function() {
                        $('#confirmationModal').modal('hide');
                        $('#process-text').hide();
                        $('#success-icon').hide();
                        window.location.href = '/academic-admin/summary-eval?evalid=' + response.evalid;
                    }, 2000);
                } else {
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
