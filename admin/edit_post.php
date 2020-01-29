<?php 
  include '../libs/database.php';
  include '../libs/config.php';
  include '../functions.php';

  $db = new Database;

  $cat_query = "Select * from categories";
  $categories = $db->select($cat_query);

  $eid = $_GET['id'];
  $query = "select * from posts where id = $eid";
  $posts = $db->select($query);
  $row1 = $posts->fetch_array(); 

  if(isset($_POST['update'])){
      $title = mysqli_real_escape_string($db->link,$_POST['title']);
      $cat = mysqli_real_escape_string($db->link,$_POST['cat']);
      $content = mysqli_real_escape_string($db->link,$_POST['content']);
      $author = mysqli_real_escape_string($db->link,$_POST['author']);
      $tags = mysqli_real_escape_string($db->link,$_POST['tags']);

      if($title == '' || $cat == '' || $content == '' || $author == '' || $tags == ''){
        echo "Fill all the fields";
      }else{
        $up_query = "update posts set category = $cat , title = '$title' ,content = '$content',author = '$author',tags= '$tags' where id = $eid";
        $db->update($up_query);
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
        <h2>Update Post</h2><hr>

        <form action="edit_post.php?id=<?php echo $eid ?>" method="post">
          <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="<?php echo $row1['title'] ?>" placeholder="Enter Title">
          </div>
          <div class="form-group">
            <label>Category</label>
            <select class="form-control" name="cat">
              <option>Select Category</option>
              <?php while($row = $categories->fetch_array()): ?>
              <option value="<?php echo $row['id'] ?>" <?php if($row1['category'] == $row['id']) echo "selected" ?> > <?php echo $row['title'] ?></option>
              <?php endwhile; ?>
            </select>
          </div>
          <div class="form-group">
            <label>Content</label>
            <textarea name="content" class="form-control" rows="3" placeholder="Enter Content"><?php echo $row1['content'] ?></textarea>
          </div>
          <div class="form-group">
            <label >Author</label>
            <input type="text" name="author" class="form-control" placeholder="Enter Author" value="<?php echo $row1['author'] ?>">
          </div>
          <div class="form-group">
            <label>Tags</label>
            <input type="text" name="tags" class="form-control" placeholder="Enter Tags" value="<?php echo $row1['tags'] ?>">
          </div>
          
          <button type="submit" name="update" class="btn btn-success">Update</button>
          <a href="index.php" class="btn btn-danger">Cancel</a>
        </form>
