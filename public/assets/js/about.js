// Function For creating response 

function alertMessage(result) {
    return ` <div class="alert alert-${result['status']} inverse alert-dismissible fade show" role="alert">
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

// ------------------------------------------
// Text Content Start ----------------------
// ------------------------------------------

jQuery(document).on('submit', '.contentform', function (e) {
    e.preventDefault();
    jQuery('.submit-btn').html(
        `<div class="spinner-border text-white mr-2 align-self-center loader-sm "></div> Loading...`
    );

    let action = jQuery(this).attr('action');
    jQuery.ajax({
        type: 'POST',
        url: action,
        data: new FormData(this),
        contentType: false,
        processData: false,
        dataType: "JSON",
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        },
        success: function (result) {
            jQuery("#contentalert").html(alertMessage(result));

            if (result['status'] == "success") {
                setTimeout(() => {
                    location.reload()
                }, 1000);
            }

            // Additional logic for success can go here
        },
        error: function (error) {
            jQuery('.submit-btn').html(`Try Again!`);
        },
        complete: function () {
            // This will be executed whether the request is successful or not
            jQuery('.submit-btn').html(`Save Changes`);
        }
    });

})

jQuery(document).on('click', '.edit-content', function () {
    let id = $(this).data('id');
    let content = atob($(this).attr('content'));
    $("#content_id").val(id)
    $("#content-text").val(content)
    $('#contentModal').modal('show')

})


// ------------------------------------------
// Text Content END ----------------------
// ------------------------------------------


// ------------------------------------------
// Image Content Start ----------------------
// ------------------------------------------
jQuery(document).on('submit', '.mediaform', function (e) {
    e.preventDefault();
    jQuery('.submit-btn').html(
        `<div class="spinner-border text-white mr-2 align-self-center loader-sm "></div> Loading...`
    );

    let action = jQuery(this).attr('action');
    jQuery.ajax({
        type: 'POST',
        url: action,
        data: new FormData(this),
        contentType: false,
        processData: false,
        dataType: "JSON",
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        },
        success: function (result) {
            jQuery("#mediaalert").html(alertMessage(result));

            if (result['status'] == "success") {
                setTimeout(() => {
                    location.reload()
                }, 1000);
            }

            // Additional logic for success can go here
        },
        error: function (error) {
            jQuery('.submit-btn').html(`Try Again!`);
        },
        complete: function () {
            // This will be executed whether the request is successful or not
            jQuery('.submit-btn').html(`Save Changes`);
        }
    });

})

jQuery(document).on('click', '.edit-image-content', function () {
    let id = $(this).data('id');
    let image = $(`img[data-id=${id}]`).attr("src")

    // let content = atob($(this).attr('content'));
    $("#media_id").val(id)
    $(".media_previewer").attr("src", image)
    $('#imageContentModal').modal('show')

})
// ------------------------------------------
// Image Content END ----------------------
// ------------------------------------------