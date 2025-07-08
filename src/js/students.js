$(document).ready(function () {
  $("#studentTable").DataTable({
    ajax: {
      url: "/controllers/studentsController.php",
      data: {
        op: "listStudents",
      },
      dataSrc: "students",
    },
    columns: [
      {
        render: function (data, type, row) {
          return `<p>${row.lastname} ${row.name}</p>`;
        },
      },
      { data: "phone", orderable: false },
      {
        orderable: false,
        searchable: false,
        render: function (data, type, row) {
          return `<div class="options">
            <div class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="true">
              <i class="bi bi-three-dots"></i>
            </div>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item edit-student" data-id="${row.id}"><i class="bi bi-pencil"></i> Edit</a></li>
              <li><a class="text-danger dropdown-item delete-student" data-id="${row.id}"><i class="bi bi-trash"></i> Delete</a></li>
            </ul>
          </div>`;
        },
      },
    ],
  });
});

$("form").on("submit", function (e) {
  e.preventDefault();

  $.ajax({
    url: "/controllers/studentsController.php",
    type: "POST",
    data: {
      op: "addStudent",
      id: $("#id").val(),
      name: $("#studentName").val(),
      lastName: $("#studentLastName").val(),
      phone: $("#studentPhone").val(),
    },
    dataType: "json",
    success: function (response) {
      if (response.error) {
        console.log("Error saving student: " + response.message);
      } else {
        $("#studentTable").DataTable().ajax.reload();
        $("form")[0].reset();
        console.log("Student saved successfully!");
      }
    },
    error: function () {
      alert("An error occurred while saving the student.");
    },
  });
});

$(document).on("click", ".edit-student", function () {
  const studentId = $(this).data("id");

  $.ajax({
    url: "/controllers/studentsController.php",
    type: "POST",
    data: {
      op: "getStudent",
      id: studentId,
    },
    dataType: "json",
    success: function (response) {
      if (response.error) {
        console.log("Error fetching student data: " + response.message);
      } else {
        $("#id").val(response.student.id);
        $("#studentName").val(response.student.name);
        $("#studentLastName").val(response.student.lastname);
        $("#studentPhone").val(response.student.phone);
      }
    },
    error: function () {
      alert("An error occurred while fetching the student data.");
    },
  });
});

$(document).on("click", ".delete-student", function () {
  const studentId = $(this).data("id");

  if (confirm("Are you sure you want to delete this student?")) {
    $.ajax({
      url: "/controllers/studentsController.php",
      type: "POST",
      data: {
        op: "deleteStudent",
        id: studentId,
      },
      dataType: "json",
      success: function (response) {
        if (response.error) {
          console.log(`Error deleting student: ${response.message}. ${response.hostmessage}. ${response.dbmessage}`);
        } else {
          $("#studentTable").DataTable().ajax.reload();
          console.log(response.message);
        }
      },
      error: function () {
        alert("An error occurred while deleting the student.");
      },
    });
  }
});
