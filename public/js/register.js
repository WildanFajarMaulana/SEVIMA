$(document).ready(function () {
  $(".formRegister").submit(function (e) {
    e.preventDefault();
    $.ajax({
      type: "post",
      url: $(this).attr("action"),
      data: $(this).serialize(),
      dataType: "json",
      beforeSend: function () {
        $(".btnregister").attr("disabled", "disabled");
        $(".btnregister").html(`<div class="spinner-border text-light mt-2" role="status">
            <span class="sr-only">Loading...</span>
          </div>`);
      },
      complete: function () {
        $(".btnregister").removeAttr("disabled");
        $(".btnregister").removeClass("spinner-border text-light");
        $(".btnregister").html("REGISTER");
      },
      success: function (response) {
        if (response.error) {
          if (response.error.username) {
            $("#username").removeClass("d-none");
            $("#username").html(response.error.username);
          } else {
            $("#username").addClass("d-none");
          }
          if (response.error.role) {
            $("#role").removeClass("d-none");
            $("#role").html(response.error.role);
          } else {
            $("#role").addClass("d-none");
          }
          if (response.error.password) {
            $("#password").removeClass("d-none");
            $("#password").html(response.error.password);
          } else {
            $("#password").addClass("d-none");
          }
          if (response.error.konfirmasiPassword) {
            $("#konfirmasiPassword").removeClass("d-none");
            $("#konfirmasiPassword").html(response.error.konfirmasiPassword);
          } else {
            $("#konfirmasiPassword").addClass("d-none");
          }
        } else {
          if (response.success) {
            $("#usernameInput").val("");
            $("#passwordInput").val("");
            $("#konfirmasiPasswordInput").val("");
            $("#roleInput").val("");
            $("#username").addClass("d-none");
            $("#role").addClass("d-none");
            $("#password").addClass("d-none");
            $("#konfirmasiPassword").addClass("d-none");
            swal.fire({
              icon: "success",
              title: "Berhasil",
              text: response.success,
            });
          }
        }
      },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
      },
    });
    return false;
  });
});
