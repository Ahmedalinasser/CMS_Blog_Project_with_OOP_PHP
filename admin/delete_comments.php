<?php include("includes/init.php"); ?> 

<?php  
  if (!$session->is_logedIn())
    {redirect("login.php");}
    ?>


  <?php 

    if (empty($_GET["id"])) {
        redirect("comments.php");
    }

    $comment = Comment::selectById($_GET["id"]);
      if ($comment) {
        $comment->delete();
        redirect("comments.php");
      }else{
        redirect("comments.php");
      }
  ?>

  <?php 



// if (empty($_GET["id"])) {
//   redirect("comments.php");
// }

// $comment = comment::selectById($_GET["id"])

// if ($comment) {
//   $comment->delete_comment();
  
// }else{
//   redirect("comments.php");
// }




// if (empty($_GET["id"])) {
//   redirect("comment.php");
// }


// $comment = comment::selectById($_GET["id"])
// if ($comment) {
//   $comment->delete();
// }else{
// redirect("comment.php");

// }


// if (empty($_GET["id"])) {
//   redirect("comment.php");
// }

// $comment = comment::selectById($_GET["id"]));
 

// if ($comment) {
//   $comment->delete();
// }else{

//   redirect("comment.php");
// }



   ?>