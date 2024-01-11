<?php
session_start();

include "./db/env.php";

$query = "SELECT * FROM post";
$res = mysqli_query($conn,$query);
$post = mysqli_fetch_all($res,1);

// echo "<pre>";
// print_r(count($post));
// echo "</pre>";
// exit();

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
    <div class="card col-lg-8 mx-auto mt-5">
        <div class="card-header">All Posts</div>
        <div class="card-body">

        <table class="table">
            <tr>
              <th>#</th>
              <th>title</th>
              <th>Details</th>
              <th>author</th>
            </tr>

            <?php
            if( count($post) > 0 ){
            foreach($post as $key=> $post){
              ?>

            <tr>
              <td><?= ++$key ?></td>
              <td><?= $post['title']?></td>
              <td><?= strlen($post['detail']) > 15 ? substr($post['detail'],0,15) .'...' : $post['detail'] ?></td>
              <td>
                <img style="width: 40px; height: 40px; object-fit: cover;" src="https://api.dicebear.com/7.x/lorelei-neutral/svg?seed=<?= $post['author']?>" alt="">
                <?= $post['author']?>
              </td>
            </tr>

              <?php
            }
          }else{
            ?>

             <tr>
             <td colspan="4" class="text-center"><h3>No Posts😭</h6></td>
            </tr>
            <?php
           }
            ?>


        </table>

        </div>
    </div>
    
    <!-- Form Ends -->
   

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

<?php
session_unset();
?> 