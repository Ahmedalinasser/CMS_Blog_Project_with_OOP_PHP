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
                            Photos
                            <small>Subheading</small>
                        </h1>
                        
                        <?php      
                        $photos = Photo::selectAll();
                        ?>

                        <div class="col-md-12">
                        
                            <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>photo</th>
                                            <th>Caption</th>
                                            <th>Id</th>
                                            <th>file name</th>
                                            <th>title</th>
                                            <th>size</th>
                                            <th>comments No.</th>
                                            <th>Link</th>
                                        </tr>
                                    </thead>                      
                                   
                                    <tbody>
                                          <?php foreach ($photos as $photo): ?>
                                        <tr>
                                            <td><img src="<?php echo $photo->photo_path(); ?>" width="110" height="70" >
                                            <div class="action_links">
                                                <a href="delete_photo.php?id=<?php echo $photo->id; ?>">Delete</a>
                                                <a href="edite_photo.php?id=<?php echo $photo->id; ?>">Edit</a>
                                                <a href="../photo.php?id=<?php echo $photo->id; ?>">View</a>
                                            </div>
                                        </td>
                                            <td><?php echo $photo->caption; ?></td>
                                            <td><?php echo $photo->id; ?></td>
                                            <td><?php echo $photo->filename; ?></td>
                                            <td><?php echo $photo->title; ?></td>
                                            <td><?php echo $photo->size; ?></td>
                                            <td><?php $comments = Comment::find_the_comments($photo->id);
                                                echo count($comments); ?></td>
                                            <td><a href="comments_photos.php?id=<?php echo $photo->id; ?>">View </a></td>
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