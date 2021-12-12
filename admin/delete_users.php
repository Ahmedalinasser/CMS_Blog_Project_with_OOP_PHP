<?php include("includes/init.php"); ?> 

<?php  
  if (!$session->is_logedIn())
    {redirect("login.php");}
    ?>


  <?php 

    if (empty($_GET["id"])) {
        redirect("users.php");
    }

    $user = User::selectById($_GET["id"]);
      if ($user) {
        $user->delete();
        redirect("users.php");
      }else{
        redirect("users.php");
      }
  ?>

  <?php 



// if (empty($_GET["id"])) {
//   redirect("users.php");
// }

// $user = user::selectById($_GET["id"])

// if ($user) {
//   $user->delete_user();
  
// }else{
//   redirect("users.php");
// }




// if (empty($_GET["id"])) {
//   redirect("user.php");
// }


// $user = user::selectById($_GET["id"])
// if ($user) {
//   $user->delete();
// }else{
// redirect("user.php");

// }


// if (empty($_GET["id"])) {
//   redirect("user.php");
// }

// $user = user::selectById($_GET["id"]));
 

// if ($user) {
//   $user->delete();
// }else{

//   redirect("user.php");
// }



   ?>