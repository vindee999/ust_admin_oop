<?php 
  include '../libs/database.php';
  include '../libs/config.php';
  include '../functions.php';

  $db = new Database;

  $cat_query = "Select * from categories";
  $categories = $db->select($cat_query);

  if(isset($_POST['submit'])){
      $title = mysqli_real_escape_string($db->link,$_POST['title']);
      $cat = mysqli_real_escape_string($db->link,$_POST['cat']);
      $content = mysqli_real_escape_string($db->link,$_POST['content']);
      $author = mysqli_real_escape_string($db->link,$_POST['author']);
      $tags = mysqli_real_escape_string($db->link,$_POST['tags']);

      if($title == '' || $cat == '' || $content == '' || $author == '' || $tags == ''){
        echo "Fill all the fields";
      }else{
        $ins_query = "insert into posts (category,title,content,author,tags) values ($cat,'$title','$content','$author','$tags')";
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
        <h2>Add New Post</h2><hr>

        <form action="add_post.php" method="post">
          <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" placeholder="Enter Title">
          </div>
          <div class="form-group">
            <label>Category</label>
            <select class="form-control" name="cat">
              <option>Select Category</option>
              <?php while($row = $categories->fetch_array()): ?>
              <option value="<?php echo $row['id'] ?>"><?php echo $row['title'] ?></option>
              <?php endwhile; ?>
            </select>
          </div>
          <div class="form-group">
            <label>Content</label>
            <textarea name="content" class="form-control" rows="3" placeholder="Enter Content"></textarea>
          </div>
          <div class="form-group">
            <label >Author</label>
            <input type="text" name="author" class="form-control" placeholder="Enter Author">
          </div>
          <div class="form-group">
            <label>Tags</label>
            <input type="text" name="tags" class="form-control" placeholder="Enter Tags">
          </div>
          
          <button type="submit" name="submit" class="btn btn-success">Submit</button>
          <a href="index.php" class="btn btn-danger">Cancel</a>
        </form>
