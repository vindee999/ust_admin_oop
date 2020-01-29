<?php 
  include '../libs/database.php';
  include '../libs/config.php';
  include '../functions.php';

  $db = new Database;

  if(isset($_POST['cat_submit'])){
      $title = mysqli_real_escape_string($db->link,$_POST['title']);

      if($title == ''){
        echo "Fill all the fields";
      }else{
        $ins_query = "insert into categories (title) values ('$title')";
        $db->insert($ins_query);
      }
  }

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

    <title>Admin Panel</title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../bootstrap/custom.css" rel="stylesheet">

    
  </head>

  <body>

    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item active" href="index.php">Admin Panel</a>
          <a class="blog-nav-item" href="">Add Post</a>
          <a class="blog-nav-item" href="">Add Category</a>
          <a class="blog-nav-item pull-right" href="localhost/ustad_admin_oop">View Log</a>
          <a class="blog-nav-item pull-right" href="logout.php">Logout</a>
        </nav>
      </div>
    </div>

    <div class="container">

      <div class="row">

        <div class="col-sm-12 blog-main">
        <br>
        <h2>Add New Category</h2><hr>

        <form action="add_cat.php" method="post">
          <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" placeholder="Enter Title">
          </div>
          
          <button type="submit" name="cat_submit" class="btn btn-success">Submit</button>
          <a href="index.php" class="btn btn-danger">Cancel</a>
        </form>
