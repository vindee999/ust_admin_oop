<?php 
  include '../libs/database.php';
  include '../libs/config.php';
  include '../functions.php';

  $db = new Database;

  $eid = $_GET['id'];
  $cat_query = "select * from categories where id = $eid";
  $categories = $db->select($cat_query);
  $row = $categories->fetch_array();

  if(isset($_POST['cat_update'])){
      $title = mysqli_real_escape_string($db->link,$_POST['title']);

      if($title == ''){
        echo "Fill all the fields";
      }else{
        $up_query = "update categories set title = '$title' where id = $eid";
        $db->insert($up_query);
      }
  }

  if(isset($_GET['delete_id'])){
      $did = $_GET['delete_id'];
      $del_query = "delete from categories where id = $did";
      $db->delete($del_query);
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
        <h2>Update Category</h2><hr>

        <form action="edit_cat.php?id=<?php echo $eid; ?>" method="post">
          <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="<?php echo $row['title'] ?>" placeholder="Enter Title">
          </div>
          
          <button type="submit" name="cat_update" class="btn btn-success">Update</button>
          <a href="index.php" class="btn btn-danger">Cancel</a>
          <a href="edit_cat.php?id=<?php echo $eid ?>&delete_id=<?php echo $eid ?>" class="btn btn-warning">Delete</a>
        </form>
