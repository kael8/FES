$(document).ready(function() {
    $('#submit').on('click', function(e) {
        e.preventDefault();

        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: "POST",
            url: "/pro-submit-assign",
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
                    $('#error-message').html(response.Message);
                    $('#error-message').css('color', 'tomato');
                    $('#error-message').css('font-size', '0.7rem');
                }
            },
        })
    });
});