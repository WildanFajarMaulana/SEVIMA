function readGambar() {
  $(".gambarTask").removeClass("d-none");
  const sampul = document.querySelector("#gambarInput");

  const imgPreview = document.querySelector(".gambarTask");

  const fileSampul = new FileReader();
  fileSampul.readAsDataURL(sampul.files[0]);

  fileSampul.onload = function (e) {
    imgPreview.src = e.target.result;
  };
}
$(document).ready(function () {
  if ($(".gambarTask").attr("src", "/images/")) {
    $(".gambarTask").addClass("d-none");
  }
  $(".formAddTask").submit(function (e) {
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
        $(".btn-tambahtask").attr("disabled", "disabled");
        $(".btn-tambahtask").html(`<div class="spinner-border text-light mt-1" role="status">
                <span class="sr-only">Loading...</span>
              </div>`);
      },
      complete: function () {
        $(".btn-tambahtask").removeAttr("disabled");
        $(".btn-tambahtask").removeClass("spinner-border text-light");
        $(".btn-tambahtask").html("Add Task");
      },
      success: function (response) {
        if (response.error) {
          if (response.error.judul) {
            $("#judul").removeClass("d-none");
            $("#judul").addClass("styleValidation");
            $("#judul").html(response.error.judul);
          } else {
            $("#judul").addClass("d-none");
          }

          if (response.error.sub_judul) {
            $("#sub_judul").removeClass("d-none");
            $("#sub_judul").addClass("styleValidation");
            $("#sub_judul").html(response.error.sub_judul);
          } else {
            $("#sub_judul").addClass("d-none");
          }

          if (response.error.gambar) {
            $("#gambar").removeClass("d-none");
            $("#gambar").addClass("styleValidation");
            $("#gambar").html(response.error.gambar);
          } else {
            $("#gambar").addClass("d-none");
          }
        } else {
          if (response.success) {
            $("#judul").addClass("d-none");
            $("#sub_judul").addClass("d-none");
            $("#gambar").addClass("d-none");
            Swal.fire({
              icon: "success",
              title: "Berhasil",
              text: response.success,
            }).then(function () {
              window.location.href = "/home/dataroom/" + $("#id_room").val();
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
