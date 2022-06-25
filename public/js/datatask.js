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

$(document).ready(function () {
  komentar();
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
