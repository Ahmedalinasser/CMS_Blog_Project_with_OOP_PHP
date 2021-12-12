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
                            users
                            <small>Subheading</small>
                        </h1>

                        <a href="add_user.php" class="btn btn-primary">Add User</a>
                        
                        <?php      
                        $users = User::selectAll();
                        ?>

                        <div class="col-md-12">
                        
                            <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Photo</th>
                                            <th>username</th>
                                            <th>First name</th>
                                            <th>Last name</th>
                                        </tr>
                                    </thead>                      
                                   
                                    <tbody>
                                          <?php foreach ($users as $user): ?>
                                        <tr>
                                            <td><?php echo $user->id; ?></td>
                                            <td>
                                           <img src="<?php echo $user->img_placeholder(); ?>" width="110" height="70" >

                                        </td>
                                            
                                            <td><?php echo $user->username; ?>
                                            <div class="pictures_link">
                                                <a href="delete_users.php?id=<?php echo $user->id; ?>">Delete</a>
                                                <a href="edite_users.php?id=<?php echo $user->id; ?>">Edit</a>
                                                <a href="#">View</a>
                                            </td>
                                            </div>
                                            <td><?php echo $user->first_name; ?></td>
                                            <td><?php echo $user->last_name; ?></td>
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