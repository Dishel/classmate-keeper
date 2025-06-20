<?php require_once "../config/connection.php";

class Course
{
  // Constructor
  public function __construct() {}

  // Get all courses
  public function getAllCourses()
  {
    $query = "SELECT c.name, c.code, c.description, COUNT(DISTINCT e.student_id) AS enrolled_students, COUNT(s.id) AS shceduled_sessions
    FROM courses c
    LEFT JOIN enroll e ON c.id = e.course_id
    LEFT JOIN sessions s ON c.id = s.course_id
    GROUP BY c.id, c.name, c.code
    ORDER BY c.name;";
    return ejecutarConsulta($query);
  }

  // Get course by ID
  public function getCourseById($id)
  {
    $query = "SELECT * FROM courses WHERE id = ?";
    return ejecutarConsultaSimpleFila($query, "i", [$id]);
  }

  // Add a new course
  public function addCourse($name, $description, $status)
  {
    $query = "INSERT INTO courses (name, description, status) VALUES (?, ?, ?)";
    return ejecutarConsulta($query, "ssi", [$name, $description, $status]);
  }

  // Update an existing course
  public function updateCourse($id, $name, $description, $status)
  {
    $query = "UPDATE courses SET name = ?, description = ?, status = ? WHERE id = ?";
    return ejecutarConsulta($query, "ssii", [$name, $description, $status, $id]);
  }

  // Delete a course
  public function deleteCourse($id)
  {
    $query = "DELETE FROM courses WHERE id = ?";
    return ejecutarConsulta($query, "i", [$id]);
  }
}
