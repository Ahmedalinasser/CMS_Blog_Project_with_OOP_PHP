<?php include("includes/init.php"); ?> 

<?php  
  if (!$session->is_logedIn())
    {redirect("login.php");}
    ?>


  <?php 

    if (empty($_GET["id"])) {
        redirect("photos.php");
    }

    $photo = Photo::selectById($_GET["id"]);
      if ($photo) {
        $photo->delete_photo();
        redirect("photos.php");
      }else{
        redirect("photos.php");
      }
  ?>

  <?php 



// if (empty($_GET["id"])) {
//   redirect("photos.php");
// }

// $photo = Photo::selectById($_GET["id"])

// if ($photo) {
//   $photo->delete_photo();
  
// }else{
//   redirect("photos.php");
// }




// if (empty($_GET["id"])) {
//   redirect("photo.php");
// }


// $photo = Photo::selectById($_GET["id"])
// if ($photo) {
//   $photo->delete();
// }else{
// redirect("photo.php");

// }


// if (empty($_GET["id"])) {
//   redirect("photo.php");
// }

// $photo = Photo::selectById($_GET["id"]));
 

// if ($photo) {
//   $photo->delete();
// }else{

//   redirect("photo.php");
// }



   ?>