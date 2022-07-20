<?php

include('includes/database.php');
include('includes/config.php');
include('includes/functions.php');

secure();

if (!isset($_GET['id'])) {

  header('Location: work.php');
  die();
}

if (isset($_POST['company_name'])) {

  if ($_POST['company_name']) {

    $query = 'UPDATE work_experience SET
      company_name = "' . mysqli_real_escape_string($connect, $_POST['company_name']) . '",
      job_title = "' . mysqli_real_escape_string($connect, $_POST['job_title']) . '",
      start_from = "' . mysqli_real_escape_string($connect, $_POST['start_from']) . '",
      end_to = "' . mysqli_real_escape_string($connect, $_POST['end_to']) . '"
      WHERE id = ' . $_GET['id'] . '
      LIMIT 1';
    mysqli_query($connect, $query);

    set_message('Work Experience has been updated');
  }

  header('Location: work.php');
  die();
}


if (isset($_GET['id'])) {

  $query = 'SELECT *
    FROM work_experience
    WHERE id = ' . $_GET['id'] . '
    LIMIT 1';
  $result = mysqli_query($connect, $query);

  if (!mysqli_num_rows($result)) {

    header('Location: work.php');
    die();
  }

  $record = mysqli_fetch_assoc($result);
}

include('includes/header.php');

?>

<h2>Edit Work Experience</h2>

<form method="post">

  
<label for="company_name">Company Name:</label>
  <input type="text" name="company_name" id="company_name" value="<?php echo htmlentities($record['company_name']) ?>">
  <br>


  <label for="job_title">Job Title:</label>
  <input type="text" name="job_title" id="job_title"  value="<?php echo htmlentities($record['job_title']) ?>">

  <br>

  <label for="start_from">Start Year:</label>
  <input type="text" name="start_from" id="start_from"  value="<?php echo htmlentities($record['start_from']) ?>">

  <br>
  <label for="end_to">End Year:</label>
  <input type="text" name="end_to" id="end_to"  value="<?php echo htmlentities($record['end_to']) ?>">

  <br>


  <input type="submit" value="Edit Work Experience">


</form>

<p><a href="work.php"><i class="fas fa-arrow-circle-left"></i> Return to Work Experience List</a></p>


<?php

include('includes/footer.php');

?>