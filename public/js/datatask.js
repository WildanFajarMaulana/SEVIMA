function komentar() {
  $.ajax({
    url: "/home/getKomentar",
    dataType: "json",
    data: { id_task: $(".id_task").val() },
    success: function (response) {
      $(".c-siswa").html(response.data);
    },
    error: function (xhr, ajaxOptions, thrownError) {},
  });
}
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
if ($(".gambarTask").attr("src", "/images/")) {
  $(".gambarTask").addClass("d-none");
}
$(document).ready(function () {
  komentar();
  $(".formSubmitTask").submit(function (e) {
    e.preventDefault();
    if ($("#gambarInput").val() == "") {
      $("#gambar").removeClass("d-none");
      $("#gambar").addClass("stylevalidation");
      $("#gambar").html("image must be filled");
      return false;
    } else {
      $("#gambar").addClass("d-none");
    }
    $.ajax({
      type: "post",
      url: $(this).attr("action"),
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      dataType: "json",
      beforeSend: function () {
        $(".btn-submittask").attr("disabled", "disabled");
        $(".btn-submittask").html(`<div class="spinner-border text-light mt-1" role="status">
                <span class="sr-only">Loading...</span>
              </div>`);
      },
      complete: function () {
        $(".btn-submittask").removeAttr("disabled");
        $(".btn-submittask").removeClass("spinner-border text-light");
        $(".btn-submittask").html("Submit");
      },
      success: function (response) {
        if (response.error) {
          if (response.error.gambar) {
            $("#gambar").removeClass("d-none");
            $("#gambar").addClass("stylevalidation");
            $("#gambar").html(response.error.gambar);
          } else {
            $("#gambar").addClass("d-none");
          }
        }
        if (response.success) {
          Swal.fire({
            icon: "success",
            title: "Berhasil",
            text: response.success,
          }).then(function () {
            window.location.href = "/home/datatask/" + response.id_task + "/" + response.id_room;
          });
        }
      },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
      },
    });
    return false;
  });
  $(".formKomentar").submit(function (e) {
    e.preventDefault();
    $.ajax({
      type: "post",
      url: $(this).attr("action"),
      data: $(this).serialize(),
      dataType: "json",
      success: function (response) {
        if (response.success) {
          komentar();
        }
      },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
      },
    });
    return false;
  });
});
$(".detailKirim").on("click", function () {
  let id = $(this).attr("data-id");

  $.ajax({
    type: "get",
    url: "/home/getDetailKirim",
    data: {
      id: id,
    },
    dataType: "json",
    success: function (response) {
      $(".body-detail-task-kirim").html(response.data);
    },
    error: function (xhr, ajaxOptions, thrownError) {},
  });
});
$(".detailSubmit").on("click", function () {
  let id = $(this).attr("data-id");

  $.ajax({
    type: "get",
    url: "/home/getDetailSubmit",
    data: {
      id: id,
    },
    dataType: "json",
    success: function (response) {
      $(".imageDetailTask").attr("src", "/images/" + response.data.gambar);
    },
    error: function (xhr, ajaxOptions, thrownError) {},
  });
});

$(".kirimSubmit").on("click", function () {
  let id_task = $(".id_task").val();
  let id_room = $(".id_room").val();

  Swal.fire({
    title: "Yakin Kirim Task?",
    text: "Kamu Tidak Bisa Mengembalikannya Lagi!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Ya,Kirim",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "post",
        url: "/home/kirimTask",
        data: {
          id_task: id_task,
          id_room: id_room,
        },
        dataType: "json",
        success: function (response) {
          if (response.success) {
            Swal.fire({
              icon: "success",
              title: "Berhasil",
              text: response.success,
            }).then(function () {
              window.location.href = "/home/datatask/" + id_task + "/" + id_room;
            });
          }
        },
        error: function (xhr, ajaxOptions, thrownError) {},
      });
    }
  });
});

$(".cancelTask").on("click", function () {
  let id_task = $(".id_task").val();
  let id_room = $(".id_room").val();

  Swal.fire({
    title: "Yakin Cancel Task?",
    text: "Cancel?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Ya,Kirim",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "post",
        url: "/home/cancelTask",
        data: {
          id_task: id_task,
          id_room: id_room,
        },
        dataType: "json",
        success: function (response) {
          if (response.success) {
            Swal.fire({
              icon: "success",
              title: "Berhasil",
              text: response.success,
            }).then(function () {
              window.location.href = "/home/datatask/" + id_task + "/" + id_room;
            });
          }
        },
        error: function (xhr, ajaxOptions, thrownError) {
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        },
      });
    }
  });
});
