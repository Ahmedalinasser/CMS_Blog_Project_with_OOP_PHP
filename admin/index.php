<?php include("includes/header.php"); ?>

<?php //if (!$session->is_loged_in()) {
    //redirect("login.php");   
//} 
if (!$session->is_logedIn()) {
    redirect("login.php");   
} 
    /*!$session->is_logedIn() ? redirect("login.php"): false ;*/
?>

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

                <?php  include("includes/admin_content.php") ?>

            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>