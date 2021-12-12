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
                            Upload
                            <small>Subheading</small>
                        </h1>
                        
                        <?php 
                        $message = "";
                        if (isset($_POST["submit"])) {

                            $photo = new Photo();
                            $photo->title = $_POST["title"];  
                            $photo->caption = $_POST["caption"];
                            $photo->set_file($_FILES['file_upload']);

                            if ($photo->save()) {
                                  $message = "photo uploead successfully";
                              }  
                        }

                            


                         ?>

                        <div class="col">
                        <?php echo $message; ?>      
                        <form action = "" method= "post" enctype="multipart/form-data">
                            
                           <div class="form-group">
                                <div><label>Photo Title</label></div>
                               <input type="text" name="title" calss ="from-control">
                           </div>

                           <div class="form-group">
                                <div><label>Photo caption</label></div>
                               <input type="text" name="caption" calss ="from-control">
                           </div> 

                           <div class="form-group">
                               <input type="file" name="file_upload" >
                           </div> 
                           <input type="submit" name="submit">
    
    
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
  //   $message = "";
  // if (isset($_POST["submit"])) {
  //     $photo = new Photo();
  //     $photo->title = $_POST["title"];
  //     $photo->set_file($_FILES["file_upload"]);

  //     if ($this->save_photo()) {
  //       $message = " Uploaded successfully .....";
  //     }
  //   }  

 ?>











