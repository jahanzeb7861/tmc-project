
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


$("#add").on("submit", function (e) {
  e.preventDefault();
  var page = $("#page").val();
  $(".btn-sbmit").attr("disabled", "disabled");
  $.ajax({
    url: "include/insert.php?page=" + page,
    type: "POST",
    data: new FormData(this),
    contentType: false,
    processData: false,
    dataType: "JSON",
    success: function (result) {
      $(".btn-sbmit").removeAttr("disabled");
      $("#alert").html(
        ` <div class="alert alert-${result['status']} inverse alert-dismissible fade show" role="alert">
        <div class=" align-items-center d-flex justify-content-between">
          <p class="m-0 w-100">${result['message']}</p>
          <span class="closeAlert">&times;</span>
        </div>
        ${result['status'] == 'error' ?
          `<div class="view-error">
                <p  id="viewError">View Error</p>
                <div id="errDisp" style="display:none;">${result['error']}</div>
            </div>`
          : ''}
    </div>`
      );
      $("html, body").animate(
        {
          scrollTop: 0,
        },
        1000
      );
      if (result['status'] == "success") {
        $("#add").trigger("reset");

      }
    }

  });
});

$(document).on('click', '.closeAlert', function () {
  $('.alert-dismissible').fadeOut();
  $("#alert").html();
})

$(document).on('click', '#viewError', function () {
  $('#errDisp').toggle();

})

$("#update").on("submit", function (e) {
  e.preventDefault();
  var page = $("#page").val();
  $(".btn-sbmit").attr("disabled", "disabled");
  $.ajax({
    url: "include/update.php?page=" + page,
    type: "POST",
    data: new FormData(this),
    contentType: false,
    processData: false,
    dataType: "JSON",
    success: function (result) {
      $(".btn-sbmit").removeAttr("disabled");
      $("#alert").html(
        ` <div class="alert alert-${result['status']} inverse alert-dismissible fade show" role="alert">
        <div class=" align-items-center d-flex justify-content-between">
          <p class="m-0 w-100">${result['message']}</p>
          <span class="closeAlert">&times;</span>
        </div>
        ${result['status'] == 'error' ?
          `<div class="view-error">
                <p  id="viewError">View Error</p>
                <div id="errDisp" style="display:none;">${result['error']}</div>
            </div>`
          : ''}
    </div>`
      );

      $("html, body").animate(
        {
          scrollTop: 0,
        },
        1000
      );

    },
  });
});

jQuery(document).on("submit", "#delete", function (e) {
  e.preventDefault();
  $(".btn-sbmit").attr("disabled", "disabled");
  var page = $("#delete_route").val();
  $.ajax({
    url: page,
    type: "DELETE",
    cache: false,
    processData: false,
    dataType: "JSON",
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function (result) {
      $(".btn-sbmit").removeAttr("disabled");
      if (result['status'] == "success") {
        setTimeout(() => {
          location.reload();
        }, 500);

      }

      $("#alert").html(
        ` <div class="alert alert-${result['status']} inverse alert-dismissible fade show" role="alert">
        <div class=" align-items-center d-flex justify-content-between">
          <p class="m-0 w-100">${result['message']}</p>
          <span class="closeAlert">&times;</span>
        </div>
        ${result['status'] == 'error' ?
          `<div class="view-error">
                <p  id="viewError">View Error</p>
                <div id="errDisp" style="display:none;">${result['error']}</div>
            </div>`
          : ''}
    </div>`
      );
      $("html, body").animate(
        {
          scrollTop: 0,
        },
        1000
      );

    }


  });
});

$("#fupdate").on("submit", function (e) {
  // alert ('omk')
  e.preventDefault();
  var page = $("#page-update").val();
  $(".btn-sbmit").attr("disabled", "disabled");
  $.ajax({
    url: "admin/include/update.php?page=" + page,
    type: "POST",
    data: new FormData(this),
    contentType: false,
    cache: false,
    processData: false,
    dataType: "JSON",
    success: function (result) {
      //  alert(result)
      $(".btn-sbmit").removeAttr("disabled");
      if (result['res'] == "success") {
        $("#alertuser").html(
          '<div class="alert alert-success inverse alert-dismissible fade show" role="alert"><i class="icon-thumb-up alert-center"></i><p><b> Well done! </b>Successfully Updated.</p></div>'
        );
        // $("#update").trigger('reset');
        $("html, body").animate(
          {
            scrollTop: 0,
          },
          1000
        );
      } else if (result['res'] == "databasewrong") {
        $("#alertuser").html(
          '<div class="alert alert-danger inverse alert-dismissible fade show" role="alert"><i class="icon-thumb-down"></i><p>Something Error on Database</p></button></div>'
        );
        $("html, body").animate(
          {
            scrollTop: 0,
          },
          1000
        );
      } else if (result['res'] == "format") {
        $("html, body").animate(
          {
            scrollTop: 0,
          },
          1000
        );
        $("#alertuser").html(
          '<div class="alert alert-danger inverse alert-dismissible fade show" role="alert"><i class="icon-thumb-down"></i><p>Incorrect Image Format</p></button></div>'
        );
      }
    },
  });
});

$("#forgotpassword").on("submit", function (e) {
  e.preventDefault();
  $("button:submit").attr("disabled", "disabled");
  $.ajax({
    url: "include/fetch.php?page=forgot",
    type: "POST",
    data: new FormData(this),
    contentType: false,
    cache: false,
    processData: false,
    dataType: "json",
    success: function (result) {
      $("html, body").animate(
        {
          scrollTop: 0,
        },
        1000
      );
      $("button:submit").removeAttr("disabled");
      if (result.result == "true") {
        $("#forgotpassword").trigger("reset");
        $("#alert").html(
          '<br><div class=" alert-success kt-alert kt-alert--outline alert alert-blue alert-dismissible" role="alert">      <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>     <span>Successfully Send account Recover code on your email !</span></div>'
        );
      } else if (result.result == "databasewrong") {
        $("#alert").html(
          '<br><div class="kt-alert kt-alert--outline  alert-danger alert alert-orange alert-dismissible" role="alert">      <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>     <span>Something Error on Database</span></div>'
        );
      } else if (result.result == "req") {
        $("#alert").html(
          '<br><div class="kt-alert kt-alert--outline  alert-danger alert alert-orange alert-dismissible" role="alert">      <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>     <span>Email/Username Field are Required</span></div>'
        );
      } else if (result.result == "notfound") {
        $("#alert").html(
          '<br><div class="kt-alert kt-alert--outline alert alert-orange  alert-danger alert-dismissible" role="alert">      <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>     <span>This email not found</span></div>'
        );
      }
    },
  });
});

$("#updatepassword_reset").on("submit", function (e) {
  e.preventDefault();
  $("button:submit").attr("disabled", "disabled");
  $.ajax({
    url: "include/update.php?page=updatepassword_reset",
    type: "POST",
    data: new FormData(this),
    contentType: false,
    cache: false,
    processData: false,
    dataType: "json",
    success: function (result) {
      $("html, body").animate(
        {
          scrollTop: 0,
        },
        1000
      );
      $("button:submit").removeAttr("disabled");
      if (result.result == "true") {
        $("#updatepassword_reset").trigger("reset");
        $("#alert").html(
          '<br><div class="kt-alert kt-alert--outline alert alert-blue alert-dismissible alert-success" role="alert">      <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>     <span>Your Password Successfully Updated Kindly Login Your Account</span></div>'
        );
        setTimeout(function () {
          window.open("index", "_self");
        }, 2000);
      } else if (result.result == "databasewrong") {
        $("#alert").html(
          '<br><div class="kt-alert kt-alert--outline alert alert-orange alert-dismissible alert-danger" role="alert">      <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>     <span>Something Error on Database</span></div>'
        );
      } else if (result.result == "databasewrong") {
        $("#alert").html(
          '<br><div class="kt-alert kt-alert--outline alert alert-orange alert-dismissible alert-danger" alert-danger role="alert">      <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>     <span>Something Error on Database</span></div>'
        );
      } else if (result.result == "req") {
        $("#alert").html(
          '<br><div class="kt-alert kt-alert--outline alert alert-orange alert-dismissible alert-danger" role="alert">      <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>     <span>Email/Username Field are Required</span></div>'
        );
      } else if (result.result == "notmatch") {
        $("#alert").html(
          '<br><div class="kt-alert kt-alert--outline alert alert-orange alert-dismissible alert-danger" role="alert">      <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>     <span>Your Confirm Password Not Match</span></div>'
        );
      }
    },
  });
});