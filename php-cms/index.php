<?php

include('admin/includes/database.php');
include('admin/includes/config.php');
include('admin/includes/functions.php');

?>
<!doctype html>
<html>

<head>

  <meta charset="UTF-8">
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8">

  <title>Website Admin</title>

  <link href="styles.css" type="text/css" rel="stylesheet">

  <script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>

</head>

<body>

  <h1>CMS front end - Portifolio</h1>

  <?php

  $query = 'SELECT *
    FROM projects
    ORDER BY date DESC';
  $result = mysqli_query($connect, $query);

  ?>
  <?php if (mysqli_num_rows($result) > 0) : ?>
    <p>There are <?php echo mysqli_num_rows($result); ?> projects in the database!</p>
  <?php endif; ?>

  <?php while ($record = mysqli_fetch_assoc($result)) : ?>

    <div>

      <h2><?php echo $record['title']; ?></h2>
      <?php echo $record['content']; ?>

      <?php if ($record['photo']) : ?>

        <p>The image can be inserted using a base64 image:</p>

        <img src="<?php echo $record['photo']; ?>">

        <p>Or by streaming the image through the image.php file:</p>

        <img src="admin/image.php?type=project&id=<?php echo $record['id']; ?>&width=100&height=100">

      <?php else : ?>

        <p>This record does not have an image!</p>

      <?php endif; ?>

    </div>


  <?php endwhile; ?>


  <!--Work Section-->
  <h2> Work Experience</h2>

  <?php

  $query = 'SELECT *
  FROM work_experience
  ORDER BY end_to DESC';
  $result = mysqli_query($connect, $query);

  ?>
  <div class="container">
    <?php while ($record = mysqli_fetch_assoc($result)) : ?>

      <div class="items  border">

        <h3>Job Title:<?php echo $record['job_title']; ?></h3>
        <p>Company Name:<?php echo $record['company_name']; ?></p>
        <p>Start:<?php echo $record['start_from']; ?></p>
        <p>End:<?php echo $record['end_to']; ?></p>

      </div>


    <?php endwhile; ?>
  </div>
  <!--Skills-->
  <?php

  $query = 'SELECT *
FROM skills';
  $result = mysqli_query($connect, $query);

  ?>
  <h2>Skills</h2>
  <div class="container">

    <?php while ($record = mysqli_fetch_assoc($result)) : ?>
      <div class="items">
        <div class="container-vertical">
          <?php if ($record['photo']) : ?>
            <img class="items" src="admin/image.php?type=skill&id=<?php echo $record['id']; ?>&width=100&height=100">
          <?php endif; ?>
          <h3 class="no-margin items">Skill Name:<?php echo $record['skill_name']; ?></h3>

          <?php if ($record['url']) : ?>
            <a class="items" href=<?= $record['url'] ?> target="_blank">Credential</a>
          <?php endif; ?>
        </div>
      </div>
    <?php endwhile; ?>
  </div>

  <!--Education Section-->
  <?php

  $query = 'SELECT *
  FROM education
  ORDER BY start DESC';
  $result = mysqli_query($connect, $query);

  ?>
  <h2>Education</h2>
  <div class="container">
    <?php while ($record = mysqli_fetch_assoc($result)) : ?>
      <div class="items  border">

        <h3>Title:<?php echo $record['title']; ?></h3>
        <p>Start:<?php echo $record['start']; ?></p>
        <p>End:<?php echo $record['end']; ?></p>
        <p>Degree:<?php echo $record['degree']; ?></p>
        <p>Location:<?php echo $record['location']; ?></p>
      </div>


    <?php endwhile; ?>

  </div>
</body>

</html>