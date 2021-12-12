<?php include("includes/header.php"); ?>

<?php require_once("includes/init.php") ?>

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
                            redirect("photos.php");
                        }



                        $comments = Comment::find_the_comments($_GET["id"]);

                        ?>

                        <div class="col-md-12">
                        
                            <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>photo_id</th>
                                            <th>author</th>
                                            <th>body</th>
                                            
                                        </tr>
                                    </thead>                      
                                   
                                    <tbody>
                                          <?php foreach ($comments as $comment): ?>
                                        <tr>
                                            <td><?php echo $comment->id; ?></td>
                                            <!-- <td> -->
                                           <!-- <img src="<?php //echo $comment->img_placeholder(); ?>" width="110" height="70" > -->

                                        <!-- </td> -->
                                            
                                            <td><?php echo $comment->photo_id; ?>
                                            <div class="pictures_link">
                                                <a href="delete_comment_photo.php?id=<?php echo $comment->id; ?>">Delete</a>
                                                <a href="edite_comments.php?id=<?php echo $comment->id; ?>">Edit</a>
                                                <a href="#">View</a>
                                            </td>
                                            </div>
                                            <td><?php echo $comment->author; ?></td>
                                            <td><?php echo $comment->body; ?></td>
                                        </tr>
                                         <?php endforeach ?>
                                    </tbody>


                            </table>



                    </div>
                </div>
                <!-- /.row -->

            </div>



            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>