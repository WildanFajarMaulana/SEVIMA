$(document).ready(function () {
  $(".formLearning").submit(function (e) {
    e.preventDefault();

    $.ajax({
      type: "post",
      url: $(this).attr("action"),
      data: $(this).serialize(),
      dataType: "json",
      beforeSend: function () {
        $(".btnLearning").attr("disabled", "disabled");
        $(".btnLearning").html(`<div class="spinner-border text-light mt-2" role="status">
            <span class="sr-only">Loading...</span>
          </div>`);
      },
      complete: function () {
        $(".btnLearning").removeAttr("disabled");
        $(".btnLearning").removeClass("spinner-border text-light");
        $(".btnLearning").html("Add");
      },
      success: function (response) {
        if (response.errorValid) {
          if (response.errorValid.nama_pembelajaran) {
            $("#namaPembelajaran").removeClass("d-none");
            $("#namaPembelajaran").addClass("styleValidation");
            $("#namaPembelajaran").html(response.errorValid.nama_pembelajaran);
          } else {
            $("#namaPembelajaran").addClass("d-none");
          }
          if (response.errorValid.kelas) {
            $("#kelas").removeClass("d-none");
            $("#kelas").addClass("styleValidation");
            $("#kelas").html(response.errorValid.kelas);
          } else {
            $("#kelas").addClass("d-none");
          }
          if (response.errorValid.kode_room) {
            $("#kodeRoom").removeClass("d-none");
            $("#kodeRoom").addClass("styleValidation");
            $("#kodeRoom").html(response.errorValid.kode_room);
          } else {
            $("#kodeRoom").addClass("d-none");
          }
        } else {
          if (response.success) {
            $("#namaPembelajaran").addClass("d-none");
            $("#kelas").addClass("d-none");
            $("#kodeRoom").addClass("d-none");
            Swal.fire({
              icon: "success",
              title: "Berhasil",
              text: response.success,
            }).then(function () {
              window.location.href = "/home/learning";
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
