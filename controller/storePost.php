<?php
session_start();
include "../db/env.php";

// *Get Data

$title = $_REQUEST['title'];
$details = $_REQUEST['details'];
$author = $_REQUEST['author'];

// *Data Validation

$errors = [];
// *title
if( empty($title) ){
    $errors['title_error'] = 'bondhu eita kono kaj korla title na diye';
}elseif(strlen($title) > 60){
    $errors['title_error'] = 'the name is too big for a human you robot ';
}
// *details
if(empty($details)){
    $errors['detail_error'] = 'upore thik but niche nemei vul jao tartari details deo ekhoni...';
}
// *if we have errors
if(count($errors) > 0){
    $_SESSION['old'] = $_REQUEST;
    $_SESSION['errors'] = $errors;

    // *header
    header("Location: ../index.php");

}else{
  $query = "INSERT INTO post(title, detail, author) VALUES ('$title','$details','$author')";
  $res = mysqli_query($conn,$query);

  if($res){
    $_SESSION['scs'] = 'Your data has been successfully submitted';
    header("Location: ../index.php");
  }
}



