function readGambar() {
  const sampul = document.querySelector("#fotoInput");

  const imgPreview = document.querySelector(".fotoProfile");

  const fileSampul = new FileReader();
  fileSampul.readAsDataURL(sampul.files[0]);

  fileSampul.onload = function (e) {
    imgPreview.src = e.target.result;
  };
}
$(document).ready(function () {
  $(".formTambah").submit(function (e) {
    e.preventDefault();
    $.ajax({
      type: "post",
      url: $(this).attr("action"),
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      dataType: "json",
      beforeSend: function () {
        $(".btn-tambahprofile").attr("disabled", "disabled");
        $(".btn-tambahprofile").html(`<div class="spinner-border text-light mt-1" role="status">
              <span class="sr-only">Loading...</span>
            </div>`);
      },
      complete: function () {
        $(".btn-tambahprofile").removeAttr("disabled");
        $(".btn-tambahprofile").removeClass("spinner-border text-light");
        $(".btn-tambahprofile").html("Add");
      },
      success: function (response) {
        if (response.error) {
          if (response.error.nama) {
            $("#nama").removeClass("d-none");
            $("#nama").addClass("styleValidation");
            $("#nama").html(response.error.nama);
          } else {
            $("#nama").addClass("d-none");
          }

          if (response.error.alamat) {
            $("#alamat").removeClass("d-none");
            $("#alamat").addClass("styleValidation");
            $("#alamat").html(response.error.alamat);
          } else {
            $("#alamat").addClass("d-none");
          }

          if (response.error.foto) {
            $("#foto").removeClass("d-none");
            $("#foto").addClass("styleValidation");
            $("#foto").html(response.error.foto);
          } else {
            $("#foto").addClass("d-none");
          }
        } else {
          if (response.success) {
            $("#nama").addClass("d-none");
            $("#nomor").addClass("d-none");
            $("#alamat").addClass("d-none");
            $("#foto").addClass("d-none");
            Swal.fire({
              icon: "success",
              title: "Berhasil",
              text: response.success,
            }).then(function () {
              window.location.href = "/home/profile";
            });
          }
        }
      },
      error: function (xhr, ajaxOptions, thrownError) {},
    });
    return false;
  });

  $(".formEdit").submit(function (e) {
    e.preventDefault();
    console.log("pok");
    $.ajax({
      type: "post",
      url: $(this).attr("action"),
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      dataType: "json",
      beforeSend: function () {
        $(".btn-editProfile").attr("disabled", "disabled");
        $(".btn-editProfile").html(`<div class="spinner-border text-light mt-1" role="status">
          <span class="sr-only">Loading...</span>
        </div>`);
      },
      complete: function () {
        $(".btn-editProfile").removeAttr("disabled");
        $(".btn-editProfile").removeClass("spinner-border text-light");
        $(".btn-editProfile").html("Edit");
      },
      success: function (response) {
        if (response.error) {
          if (response.error.nama) {
            $("#nama").removeClass("d-none");
            $("#nama").addClass("styleValidation");
            $("#nama").html(response.error.nama);
          } else {
            $("#nama").addClass("d-none");
          }

          if (response.error.alamat) {
            $("#alamat").removeClass("d-none");
            $("#alamat").addClass("styleValidation");
            $("#alamat").html(response.error.alamat);
          } else {
            $("#alamat").addClass("d-none");
          }

          if (response.error.foto) {
            $("#foto").removeClass("d-none");
            $("#foto").addClass("styleValidation");
            $("#foto").html(response.error.foto);
          } else {
            $("#foto").addClass("d-none");
          }
        } else {
          if (response.success) {
            $("#nama").addClass("d-none");
            $("#nomor").addClass("d-none");
            $("#alamat").addClass("d-none");
            $("#foto").addClass("d-none");
            Swal.fire({
              icon: "success",
              title: "Berhasil",
              text: response.success,
            }).then(function () {
              window.location.href = "/home/profile";
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

$(".btnEdit").on("click", function () {
  $.ajax({
    url: "/home/getDetailProfile",
    dataType: "json",
    success: function (response) {
      console.log(response);
      $("#namaInput").val(response.user.nama);
      $("#alamatInput").val(response.user.alamat);
      $("#fotolama").val(response.user.foto);
      $(".fotoProfile").attr("src", "/images/" + response.user.foto);
    },
    error: function (xhr, ajaxOptions, thrownError) {},
  });
});
