<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

    <!-- Nav Bar Starts -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav m-auto mb-2 mb-lg-0">

        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./index.php">Add Post</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./allPosts.php">All Post</a>
        </li>

      </ul>
    </div>
  </div>
</nav>
    <!-- Nav Bar Ends -->
    <!-- Form Starts -->
    <div class="card col-lg-6 mx-auto mt-5">
        <div class="card-header">Add Post</div>
        <div class="card-body">

            <form action="./controller/storePost.php" method="POST">

                <input value="<?= $_SESSION['old']['title'] ?? '' ?>" name="title" type="text" placeholder="Post Title" class="form-control my-3">

                <?php
                if(isset($_SESSION['errors']['title_error'])){
                    ?>

                    <span class="text-danger">
                    <?=$_SESSION['errors']['title_error'];?>
                    </span>

                    <?php
                }
                
                ?>

                <textarea name="details" placeholder="Post Detail" class="form-control my-3"><?= $_SESSION['old']['details'] ?? '' ?></textarea>

                <?php
                if(isset($_SESSION['errors']['detail_error'])){
                    ?>

                    <span class="text-danger">
                    <?=$_SESSION['errors']['detail_error'];?>
                    </span>

                    <?php
                }
                
                ?>
                <input value="<?= $_SESSION['old']['author'] ?? '' ?>" name="author" type="text" placeholder="Post author" class="form-control my-3">
                <button class="btn btn-info">Submit</button> <br>

                <span class="text-info">
                <?= isset($_SESSION['scs']) ? $_SESSION['scs'] : ''?>
                </span>

            </form>
        </div>
    </div>
    
    <!-- Form Ends -->
   

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

<?php
session_unset();
?>