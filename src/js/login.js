$(document).ready(function () {
  console.log("Login script loaded");
  $("form").on("submit", function (e) {
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
      method: "POST",
      url: "/controllers/loginController.php",
      data: formData,
      contentType: false,
      processData: false,
      dataType: "JSON",
      success: function (response) {
        console.log("Response received:", response);
        if (response.error) {
          $("#error-message").text(response.message[0]).show();
        } else {
          window.location.href = "/views/dashboard/";
        }
      },
      error: function (xhr, status, error) {
        console.error("Error occurred:", error);
        $("#error-message").text("An error occurred. Please try again.").show();
      }
    });
  });
});
