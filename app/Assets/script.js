$(document).ready(function () {
  $("#load-data-button").click(function () {
    $.ajax({
      url: "/records/load_data",
      type: "GET",
      success: function (response) {
        $("#data-container").html(response);
      },
      error: function (xhr, status, error) {
        console.error(error);
      },
    });
  });
});
