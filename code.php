<?php
session_start();
require 'dbcon.php';

if (isset($_POST['delete_student'])) {
    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);

    // Check if the student exists
    $check_query = "SELECT id FROM students WHERE id = ?";
    $check_stmt = mysqli_prepare($con, $check_query);
    mysqli_stmt_bind_param($check_stmt, "i", $student_id);
    mysqli_stmt_execute($check_stmt);
    mysqli_stmt_store_result($check_stmt);

    if (mysqli_stmt_num_rows($check_stmt) > 0) {
        // Student exists, proceed with deletion
        $query = "DELETE FROM students WHERE id = ?";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "i", $student_id);
        mysqli_stmt_execute($stmt);

        if ($stmt) {
            $_SESSION['message'] = "Student Deleted successfully";
            header("Location: index.php");
            exit(0);
        } else {
            $_SESSION['message'] = "Student could not be Deleted UNFORTUNATELY. Error: " . mysqli_error($con);
            header("Location: index.php");
            exit(0);
        }
    } else {
        // Student not found
        $_SESSION['message'] = "Student not found";
        header("Location: index.php");
        exit(0);
    }
}


if(isset($_POST['update_student'])){
  $student_id = mysqli_real_escape_string($con, $_POST['student_id']);

  $name = mysqli_real_escape_string($con, $_POST['name']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $phone = mysqli_real_escape_string($con, $_POST['phone']);
  $course = mysqli_real_escape_string($con, $_POST['course']);

  $query = "UPDATE students SET name='$name', email='$email', phone='$phone', course='$course' WHERE id='$student_id' ";

  $query_run = mysqli_query($con, $query);

  if ($query_run) {
    $_SESSION['message'] = "Student updated succesfully";
    header("Location: index.php");
    exit(0);
  } else {
    $_SESSION['message'] = "Student could not be updated";
    header("Location: index.php");
    exit(0);
  }
}

if (isset($_POST['save_student'])) {
  $name = mysqli_real_escape_string($con, $_POST['name']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $phone = mysqli_real_escape_string($con, $_POST['phone']);
  $course = mysqli_real_escape_string($con, $_POST['course']);

  $query = "INSERT INTO students (name, email, phone, course) VALUES ('$name', '$email', '$phone', '$course')";

  $query_run = mysqli_query($con, $query);

  if ($query_run) {
    $_SESSION['message'] = "Student created succesfully";
    header("Location: student-create.php");
    exit(0);
  } else {
    $_SESSION['message'] = "Student could nof be created";
    header("Location: student-create.php");
    exit(0);
  }
}

?>
