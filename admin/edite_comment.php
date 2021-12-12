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
                            comments
                            <small>Subheading</small>
                        </h1>
                        
                        <?php      



                        if (empty($_GET["id"])) {
                            redirect("comments.php");

                        }else{

                            $comment = Comment::selectById($_GET["id"]);
                            if (isset($_POST["update"])) {
                                
                                if ($comment) {
                                    $comment->author = $_POST["author"];
                                    $comment->body = $_POST["body"];
                                    $comment->alternate_text = $_POST["alternate_text"];
                                    $comment->description = $_POST["description"];
                                    $comment->save_general(); 
                                }
                            }
                        }


                        ?>

                    <form method="post" action="" enctype="multipart/form-data">

                        <div class="col-md-8">
                            
                            <div class="form-group">
                                <label for="caption"> Picture</label>     
                                <img src=" <?php echo $comment->comment_path(); ?>" width="125" height="90">
                            </div>

                             <div class="form-group">
                                <input type="file" name="file_upload">
                            </div> 

                           <!--  <div class="form-group">

                               <input type="file" name="file_upload" >
                           </div> -->
                            
                            
                            
                            <div class="form-group">
                                <label for="caption"> title</label>     
                                <input type="text " name="title" class="form-control" value="<?php echo $comment->title; ?>">
                            </div>

                            <div class="form-group">
                                <label for="caption"> Caption</label>   
                                <input type="text " name="caption" class="form-control" value="<?php echo $comment->caption; ?>">
                            </div>
                            <div class="form-group">
                                <label for="caption"> Alternate Text</label>   
                                <input type="text " name="alternate_text" class="form-control" value="<?php echo $comment->alternate_text; ?>">
                            </div>
                            <div class="form-group">
                                <label for="caption"> Description</label> 
                                <textarea class="form-control" name="description" id="" cols="30" rows="10"><?php echo $comment->description; ?></textarea>
                            </div>
                        </div>


                            <div class="col-md-4" >
                                <div  class="comment-info-box">
                                    <div class="info-box-header">
                                       <h4>Save <span id="toggle" class="glyphicon glyphicon-menu-up pull-right"></span></h4>
                                    </div>
                                <div class="inside">
                                  <div class="box-inner">
                                     <p class="text">
                                       <span class="glyphicon glyphicon-calendar"></span> Uploaded on: April 22, 2030 @ 5:26
                                      </p>
                                      <p class="text ">
                                        comment Id: <span class="data comment_id_box">34</span>
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
                                        <a  href="delete_comment.php?id=<?php echo $comment->id; ?>" class="btn btn-danger btn-lg ">Delete</a>   
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
//     redierct("comment.php");
// }


// $comment = comment::selectById($_GET["id"]);

// if ($comment) {
    
//     if (isset($_POST["update"])) {
//         $comment->title = $_POST["title"];
//         $comment->description = $_POST["description"];

//         $comment->set_file();
//         $comment->save();
//     }
// }









   ?>