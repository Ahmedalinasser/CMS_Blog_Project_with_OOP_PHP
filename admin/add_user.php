<?php include("includes/header.php"); ?>

<?php if (!$session->is_logedIn()) {
    redirect("login.php");   
} ?>

        <!-- Navigation -->

        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

            <!-- Top navgation bar  -->

                <?php  include("includes/top_nav.php") ?>

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            
                <?php  include("includes/side_nav.php") ?>

            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">
            <!--  Page Body -->

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            users
                            <small>Subheading</small>
                        </h1>
                        
                        <?php      

                    

                            $user = new User();
                            if (isset($_POST["create"])) {
                                

                                if ($user) {
                                    $user->username = $_POST["username"];
                                    $user->password = $_POST["password"];
                                    $user->first_name = $_POST["first_name"];
                                    $user->last_name = $_POST["last_name"];
                                    $user->set_file($_FILES["user_image"]);
                                    $user->save();
 
                                }
                            }


                        ?>

                    <form method="post" action="" enctype="multipart/form-data">

                        <div class="col-md-6 col-md-offset-3">
                            <!-- 
                            <div class="form-group">
                                <label for="caption"> Picture</label>     
                                <img src="<?php //echo $user-> img_placeholder(); ?>" width="125" height="90">
                            </d -->iv>
                            <!-- it will dont work because of the condtion of cheking on if the img is allready exsists  -->
                             <div class="form-group">
                                <input type="file" name="user_image">
                            </div> 

                            
                            <div class="form-group">
                                <label for="caption"> Username</label>     
                                <input type="text " name="username" class="form-control" >
                            </div>

                            <div class="form-group">
                                <label for="caption"> Password</label>   
                                <input type="password" name="password" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="caption"> First name</label>   
                                <input type="text " name="first_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="caption"> Last name</label>   
                                <input type="text " name="last_name" class="form-control">
                            </div> 
                            <div class="form-group">   
                                <input type="submit" name="create" class="btn btn-primary pull-right">
                            </div>

                        </div>


                    </form>

                        </div>
                </div>
                <!-- /.row -->

            </div>



            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>


  <?php 



// if  (empty($_GET["id"])) {
//     redierct("user.php");
// }


// $user = user::selectById($_GET["id"]);

// if ($user) {
    
//     if (isset($_POST["update"])) {
//         $user->title = $_POST["title"];
//         $user->description = $_POST["description"];

//         $user->set_file();
//         $user->save();
//     }
// }









   ?>