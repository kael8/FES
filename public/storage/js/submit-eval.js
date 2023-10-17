$(document).ready(function() {
    $('#submit').on('click', function(e) {
        e.preventDefault();

        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: "POST",
            url: "/pro-submit-eval",
            data: $('#formAuthentication').serialize(),
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
        })
    });
});