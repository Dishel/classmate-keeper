$(document).ready(function () {
  console.log("courses.js loaded");

  getCourses();

  $("#modalCourse").on("hide.bs.modal", function () {
    $(".modal-title").text("Create New Course");
    $(".modal-title").siblings("p").show();
  });
});

$(document).on("click", ".btn-edit", function () {
  const courseId = $(this).data("course-id");
  $.getJSON(
    "/controllers/coursesController.php",
    { op: "getCourse", id: courseId },
    function (data, textStatus, jqXHR) {
      console.log("Course details fetched:", data);
      if (data.error) {
        console.error("Error fetching course details:", data.message[0]);
        $("#courseDetails").html(`<p>${data.message}</p>`);
      } else {
        $(".modal-title").text("Edit Course");
        $(".modal-title").siblings("p").hide();
        $("#courseTitle").val(data.course.name);
        $("#courseCode").val(data.course.code);
        $("#courseDescription").val(data.course.description);
        $("#courseStatus").val(data.course.status);
        $("#courseStartDate").val(data.course.startDate);
        $("#courseEndDate").val(data.course.endDate);
        $("#courseId").val(data.course.id);
        $("#modalCourse").modal("show");
      }
    }
  );
});

$("form").on("submit", function (e) {
  e.preventDefault(); // Prevent the default form submission

  $.ajax({
    url: "/controllers/coursesController.php",
    type: "POST",
    data: {
      op: "addCourse",
      id: $("#courseId").val(),
      name: $("#courseTitle").val(),
      code: $("#courseCode").val(),
      description: $("#courseDescription").val(),
      status: $("#courseStatus").val(),
      startDate: $("#courseStartDate").val(),
      endDate: $("#courseEndDate").val(),
    },
    success: function (data) {
      console.log("Form submitted successfully:", data);
      if (data.error) {
        console.error(data.message);
      } else {
        getCourses();
        $("form")[0].reset();
        $("#modalCourse").modal("hide");
        getCourses();
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.error("Error submitting form:", textStatus, errorThrown);
      alert("An error occurred while submitting the form.");
    },
  });
});

function getCourses() {
  $.getJSON(
    "/controllers/coursesController.php",
    { op: "getCourses" },
    function (data, textStatus, jqXHR) {
      if (data.error) {
        console.error("Error fetching courses:", data.message[0]);
        $("#coursesList").html(`<p>${data.message}</p>`);
      } else {
        $("#coursesList").html(data.courses);
      }
    }
  );
}
