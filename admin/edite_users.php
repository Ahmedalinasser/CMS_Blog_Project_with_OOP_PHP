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

                    if (empty($_GET["id"])) {
                        redirect("users.php");
                    }else{


                            $user = User::selectById($_GET["id"]);
                            if (isset($_POST["update"])) {
                                

                                if ($user) {
                                    $user->username = $_POST["username"];
                                    $user->password = $_POST["password"];
                                    $user->first_name = $_POST["first_name"];
                                    $user->last_name = $_POST["last_name"];
                                    $user->set_file($_FILES["user_image"]);
                                    $user->save();
 
                                }
                            }
                        }


                        ?>

                    <form method="post" action="" enctype="multipart/form-data">

                        <div class="col-md-8">
                            
                            <div class="form-group">
                                <label for="caption"> Picture</label>     
                                <img src=" <?php echo $user->img_placeholder(); ?>" width="125" height="90">
                            </div>

                             <div class="form-group">
                                <input type="file" name="user_image">
                            </div> 

                            
                            <div class="form-group">
                                <label for="caption"> Username</label>     
                                <input type="text " name="username" class="form-control" value="<?php echo $user->username; ?>">
                            </div>

                            <div class="form-group">
                                <label for="caption"> Password</label>   
                                <input type="password" name="password" class="form-control" value="" placeholder="Change your Password Please......">
                            </div>
                            <div class="form-group">
                                <label for="caption"> First name</label>   
                                <input type="text " name="first_name" class="form-control" value="<?php echo $user->first_name; ?>">
                            </div>
                            <div class="form-group">
                                <label for="caption"> Last name</label>   
                                <input type="text " name="last_name" class="form-control" value="<?php echo $user->last_name; ?>">
                            </div> 
                            

                        </div>

                         <div class="col-md-4" >
                                <div  class="photo-info-box">
                                    <div class="info-box-header">
                                       <h4>Save <span id="toggle" class="glyphicon glyphicon-menu-up pull-right"></span></h4>
                                    </div>
                                <div class="inside">
                                  <div class="box-inner">
                                     <p class="text">
                                       <span class="glyphicon glyphicon-calendar"></span> Uploaded on: April 22, 2030 @ 5:26
                                      </p>
                                      <p class="text ">
                                        Photo Id: <span class="data photo_id_box">34</span>
                                      </p>
                                      <p class="text">
                                        Filename: <span class="data">image.jpg</span>
                                      </p>
                                     <p class="text">
                                      File Type: <span class="data">JPG</span>
                                     </p>
                                     <p class="text">
                                       File Size: <span class="data">3245345</span>
                                     </p>
                                  </div>
                                  <div class="info-box-footer clearfix">
                                    <div class="info-box-delete pull-left">
                                        <a  href="delete_users.php?id=<?php echo $user->id; ?>" class="btn btn-danger btn-lg ">Delete</a>   
                                    </div>
                                    <div class="info-box-update pull-right ">
                                        <input type="submit" name="update" value="Update" class="btn btn-primary btn-lg ">
                                    </div>   
                                  </div>
                                </div>          
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