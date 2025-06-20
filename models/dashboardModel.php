<?php require_once "../config/connection.php";
class Dashboard
{

  public function __construct() {}

  public function getTotalStudents()
  {
    $query = "SELECT COUNT(*) AS total FROM students";
    return ejecutarConsultaSimpleFila($query);
  }

  public function getActiveCourses()
  {
    $query = "SELECT COUNT(*) AS total FROM courses WHERE status = 'active'";
    return ejecutarConsultaSimpleFila($query);
  }

  public function getPendingNotifications()
  {
    $query = "SELECT COUNT(*) AS total FROM notifications WHERE status = 'pending'";
    return ejecutarConsultaSimpleFila($query);
  }

  public function upcomingClasses()
  {
    $query = "SELECT * FROM sessions s 
    INNER JOIN courses c ON s.course_id = c.id 
    WHERE c.status = 'active' AND s.date >= CURDATE()
    ORDER BY date ASC LIMIT 5";
    return ejecutarConsulta($query);
  }
}
