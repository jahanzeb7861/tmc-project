// Function For creating response 

function alertMessage(result) {
    return ` <div class="alert alert-${result['status']} inverse alert-dismissible " role="alert" style='display:block'>
<div class=" align-items-center d-flex justify-content-between">
  <p class="m-0 w-100">${result['message']}</p>
  <span class="closeAlert">&times;</span>
</div>
${result['status'] == 'danger' ?
            `<div class="view-error">
                                    <p  id="viewError">View Error</p>
                                    <div id="errDisp" style="display:none;">${result['error']}</div>
                                </div>`
            : ''}
</div>`
}

// Close Alert
$(document).on('click', '.closeAlert', function () {
    $('.alert-dismissible').fadeOut();
    $("#alert").html();
})

// Cloase if error
$(document).on('click', '#viewError', function () {
    $('#errDisp').toggle();

})

jQuery(document).on('submit', '#contact', function (e) {
    e.preventDefault();
    jQuery('.submit-btn').html(
        `<div class="spinner-border text-white mr-2 align-self-center loader-sm "></div> Loading...`
    );

    let action = jQuery(this).attr('action');
    let method = jQuery(this).attr('method');
    $.ajax({
        type: 'POST',
        url: action,
        data: new FormData(this),
        contentType: false,
        processData: false,
        dataType: "JSON",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (result) {
            $("#alert").html(alertMessage(result));
            $("html, body").animate({
                scrollTop: 0,
            }, 1000);

            if (result['status'] == "success" && method.toLowerCase() === 'post') {
                $("#contact").trigger("reset");
            }
 
        },
        error: function (error) {
            console.log(error);
            jQuery('.submit-btn').html(`Try Again!`);
        },
        complete: function () {
            // This will be executed whether the request is successful or not
            jQuery('.submit-btn').html(`Save Changes`);
        }
    });
});