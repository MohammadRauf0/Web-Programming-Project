<?php
session_start();
require 'dbcon.php';
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Table</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

  <div class="container mt-5">
    <div class="row">
      <div class="col-md-12">
        <div class="card">

          <div class="card-header">
            <h4>Student details</h4>
            <a href="student-create.php" class="btn btn-primary float-end">Add Students</a>
          </div>

          <div class="card-body">

            <table class="table table-bordered table-striped">

              <thead>
                <tr>
                  <th>ID</th>
                  <th>Student Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Course</th>
                  <th>Action</th>
                  </th>
              </thead>

              <tbody>
                <?php
                $query = "SELECT * FROM students";
                $query_run = mysqli_query($con, $query);

                if (mysqli_num_rows($query_run) > 0) {
                  foreach ($query_run as $student) {
                ?>
                    <tr>
                      <td><?= $student['id']; ?></td>
                      <td><?= $student['name']; ?></td>
                      <td><?= $student['email']; ?></td>
                      <td><?= $student['phone']; ?></td>
                      <td><?= $student['course']; ?></td>
                      <td>
                        <a href="student-view.php?id=<?= $student['id']; ?>" class="btn btn-info btn-sm">View</a>
                        <a href="student-edit.php?id=<?= $student['id']; ?>" class="btn btn-success btn-sm">Edit</a>

                        <form action="code.php" method="POST" class="d-inline">
                          <input type="hidden" name="student_id" value="<?=$student['id']; ?>">
                          <button type="submit" name="delete_student" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                      </td>
                    </tr>
                <?php
                  }
                } else {
                  echo "<h5> No Record Found </h5>";
                }
                ?>

              </tbody>

            </table>

          </div>

        </div>
      </div>
    </div>

    <?php include('message.php'); ?>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>