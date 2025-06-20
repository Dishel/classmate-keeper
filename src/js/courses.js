$(document).ready(function () {
  console.log("courses.js loaded");

  $.getJSON(
    "/controllers/coursesController.php",
    { op: "getCourses" },
    function (data, textStatus, jqXHR) {
      console.log("Courses data received:", data);
      if (data.error) {
        console.error("Error fetching courses:", data.error);
      } else {
        $("#coursesList").html(data.courses);
      }
    }
  );
});
