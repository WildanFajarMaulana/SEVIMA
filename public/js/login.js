$(document).ready(function () {
  $(".formLogin").submit(function (e) {
    e.preventDefault();

    $.ajax({
      type: "post",
      url: $(this).attr("action"),
      data: $(this).serialize(),
      dataType: "json",
      beforeSend: function () {
        $(".btnLogin").attr("disabled", "disabled");
        $(".btnLogin").html(`<div class="spinner-border text-light mt-2" role="status">
          <span class="sr-only">Loading...</span>
        </div>`);
      },
      complete: function () {
        $(".btnLogin").removeAttr("disabled");
        $(".btnLogin").removeClass("spinner-border text-light");
        $(".btnLogin").html("LOGIN");
      },
      success: function (response) {
        if (response.errorValid) {
          if (response.errorValid.username) {
            $("#username").removeClass("d-none");
            $("#username").html(response.errorValid.username);
          } else {
            $("#username").addClass("d-none");
          }
          if (response.errorValid.password) {
            $("#password").removeClass("d-none");
            $("#password").html(response.errorValid.password);
          } else {
            $("#password").addClass("d-none");
          }
        } else {
          if (response.successSiswa) {
            $("#usernameInput").val("");
            $("#passwordInput").val("");
            $("#username").addClass("d-none");
            $("#password").addClass("d-none");
            Swal.fire({
              type: "success",
              title: "Login Berhasil!",
              text: "Anda akan di arahkan dalam 3 Detik",
              timer: 3000,
              showCancelButton: false,
              showConfirmButton: false,
            }).then(function () {
              window.location.href = "/home/";
            });
          } else if (response.successGuru) {
            $("#usernameInput").val("");
            $("#passwordInput").val("");
            $("#username").addClass("d-none");
            $("#password").addClass("d-none");
            Swal.fire({
              type: "success",
              title: "Login Berhasil!",
              text: "Anda akan di arahkan dalam 3 Detik",
              timer: 3000,
              showCancelButton: false,
              showConfirmButton: false,
            }).then(function () {
              window.location.href = "/home/";
            });
          } else if (response.successNull) {
            $("#usernameInput").val("");
            $("#passwordInput").val("");
            $("#username").addClass("d-none");
            $("#password").addClass("d-none");
            Swal.fire({
              type: "error",
              title: "Login Gagal!",
              text: response.successNull,
            });
          } else if (response.errorPassword) {
            $("#usernameInput").val("");
            $("#passwordInput").val("");
            $("#username").addClass("d-none");
            $("#password").addClass("d-none");
            Swal.fire({
              type: "error",
              title: "Login Gagal!",
              text: response.errorPassword,
            });
          } else {
            $("#usernameInput").val("");
            $("#passwordInput").val("");
            $("#username").addClass("d-none");
            $("#password").addClass("d-none");
            Swal.fire({
              type: "error",
              title: "Login Gagal!",
              text: response.errorUsername,
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
