<?php

include('includes/database.php');
include('includes/config.php');
include('includes/functions.php');

secure();

if (isset($_POST['company_name'])) {

  if ($_POST['company_name']) {

    $query = 'INSERT INTO work_experience (
        company_name,
        job_title,
        start_from,
        end_to
      ) VALUES (
         "' . mysqli_real_escape_string($connect, $_POST['company_name']) . '",
         "' . mysqli_real_escape_string($connect, $_POST['job_title']) . '",
         "' . mysqli_real_escape_string($connect, $_POST['start_from']) . '",
         "' . mysqli_real_escape_string($connect, $_POST['end_to']) . '"
      )';
    mysqli_query($connect, $query);

    set_message('Work Experience has been added');
  }

  header('Location: work.php');
  die();
}

include('includes/header.php');

?>

<h2>Add Work</h2>

<form method="post">

  <label for="company_name">Company Name:</label>
  <input type="text" name="company_name" id="company_name">
  <br>


  <label for="job_title">Job Title:</label>
  <input type="text" name="job_title" id="job_title">

  <br>

  <label for="start_from">Start Year:</label>
  <input type="text" name="start_from" id="start_from">

  <br>
  <label for="end_to">End Year:</label>
  <input type="text" name="end_to" id="end_to">

  <br>


  <input type="submit" value="Add Work Experience">

</form>

<p><a href="work.php"><i class="fas fa-arrow-circle-left"></i> Return to Work List</a></p>


<?php

include('includes/footer.php');

?>