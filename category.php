<?php 
  include 'libs/database.php';
  include 'libs/config.php';
  include 'functions.php';

  $db = new Database;

  if($_GET['id']){
    $id = $_GET['id'];
  }else{
    $id = 1;
  }
  $query = "Select * from posts where category = $id order by id desc";
  $posts = $db->select($query);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <link rel="canonical" href="https://getbootstrap.com/docs/3.3/examples/blog/">

    <title>PHP Blog in OOP</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="bootstrap/custom.css" rel="stylesheet">

    
  </head>

  <body>

    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item active" href="index.php">Home</a>
          <a class="blog-nav-item" href="posts.php">All Posts</a>
          <a class="blog-nav-item" href="services.php">Services</a>
          <a class="blog-nav-item" href="about.php">About Us</a>
          <a class="blog-nav-item" href="contact.php">Contact Us</a>
        </nav>
      </div>
    </div>

    <div class="container">

      <div class="blog-header">
        <h1 class="blog-title">PHP Tutorial Blog</h1>
        <p class="lead blog-description">Its all about PHP tutorial.</p>
      </div>

      <div class="row">

        <div class="col-sm-8 blog-main">

          <?php if($posts): ?>
            <?php while($row = $posts->fetch_array()): ?>
            <div class="blog-post">
              <h2 class="blog-post-title"><?php echo $row['title']  ?></h2>
              <p class="blog-post-meta"><?php echo formate_date($row['date'])  ?> by <a href="#"><?php echo $row['author']  ?></a></p>

              <p><?php echo substr($row['content'],0,200)  ?></p>
              <a class="readmore" href="single.php?id=<?php echo $row['id'] ?>">Read more</a>
            </div><!-- /.blog-post -->
            <?php endwhile; ?>
          <?php else: echo "No POsts"; endif; ?>

          <?php include 'includes/footer.php' ?>