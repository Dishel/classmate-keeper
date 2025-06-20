$(document).ready(function () {
  console.log("Dashboard script loaded");

  $.getJSON(
    "/controllers/dashboardController.php",
    { op: "loadDashboardData" },
    function (data, textStatus, jqXHR) {
      console.log(data);
      if (data.error) {
        console.error("Error:", data.error);
      } else {
        $("#total-students").text(data.totalStudents);
        $("#active-courses").text(data.activeCourses);
        $("#upcoming-classes").html(data.upcomingClasses);
      }
    }
  );
});
