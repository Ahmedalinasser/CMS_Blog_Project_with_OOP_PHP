<?php include("includes/init.php"); ?> 

<?php  
  if (!$session->is_logedIn())
    {redirect("login.php");}
    ?>


  <?php 

    if (empty($_GET["id"])) {
        redirect("comments_photos.php");
    }

    $comment = Comment::selectById($_GET["id"]);
      if ($comment) {
        $comment->delete();
        redirect("comments_photos.php?id={$comment->photo_id}");
      }else{
        redirect("comments_photos.php");
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