function result(dataId) {
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    var res = document.getElementById("res"); // Fix the element selection

    $.ajax({
        type: "POST",
        url: "/pro-result",
        data: { dataId: dataId },
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        success: function (response) {
            if (response.status_code === 0) { // Compare with integer 0
                res.style.display = "block";
                $('#A').html(response.A);
                $('#B').html(response.B);
                $('#C').html(response.C);
                $('#D').html(response.D);
                $('#total').html(response.total);
                $('#rt').html('Rating Period: ' + response.rating_period);
                $('#nf').html('Name of Faculty: ' + response.name);
                $('#cs').html('Contract of Service: ' + response.service);
                $('#cd').html('College/Department: ' + response.dep);
                scrollToElement("res");
            } else {
                $('#error-message').html(response.Message);
                $('#error-message').css('color', 'tomato');
                $('#error-message').css('font-size', '0.7rem');
            }
        },
    });
}

function scrollToElement(elementId) {
    var element = document.getElementById(elementId);
    if (element) {
        element.scrollIntoView({ behavior: "smooth" }); // Scroll to the element smoothly
    }
}