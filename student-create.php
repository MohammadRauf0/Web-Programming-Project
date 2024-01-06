<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Student Add</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

  <div class="container mt-5">

    <?php
      include('message.php');
    ?>

    <div class="row">
    <div class="col"></div>
      <div class="col">
        <div class="card">
          <div class="card-header">
            <h4>
              Student Add
              <a href="index.php" class="btn btn-danger float-end">BACK</a>
            </h4>
          </div>

          <div class="card-body">
            <form action="code.php" method="POST">

              <div class="mb-3">
                <label>Student Name</label>
                <input type="text" name="name" class="form-control">
              </div>

              <div class="mb-3">
                <label>Student Email</label>
                <input type="text" name="email" class="form-control">
              </div>

              <div class="mb-3">
                <label>Student Phone Number</label>
                <input type="text" name="phone" class="form-control">
              </div>

              <div class="mb-3">
                <label>Student Course</label>
                <input type="text" name="course" class="form-control">
              </div>

              <div class="mb-3">
                <button class="btn btn-primary" type="submit" name="save_student">Save Student</button>
              </div>

            </form>
          </div>
        </div>
      </div>
      <div class="col"></div>
    </div>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>