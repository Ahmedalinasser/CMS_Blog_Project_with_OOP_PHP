<?php require_once("admin/includes/init.php"); ?>
<?php include("includes/header.php"); ?>    

<?php 

if (empty($_GET["id"])) {
    redirect("index.php");
}

$photo = Photo::selectById($_GET["id"]);


if (isset($_POST["submit"])) {
        
        $author = trim($_POST["author"]);
        $body = trim($_POST["body"]);
        $new_comments = Comment::create_comment( $photo->id , $author , $body);
        if ($new_comments && $new_comments->save_general()) {
            redirect("photo.php?id={$photo->id}");
        }else{
            $message = "there was propblem in saving ...... ";
        }

    }else{

        $author = "";
        $body = "";
       

    }


  $comments = Comment::find_the_comments($photo->id);

?>
            <div class="row">
 
            <div class="col-lg-8">

                <!-- Blog Post -->

                <!-- Title -->
                <h1><?php echo $photo->title ?></h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">Start Bootstrap</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on August 24, 2013 at 9:00 PM</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="admin/<?php echo $photo->photo_path(); ?>" alt="">

                 <p> <?php echo $photo->caption; ?></p>
                <hr>


                <!-- Post Content -->
                <p class="lead"> <?php echo $photo->description; ?>  </p>   

                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->

<!-- ************************************************************** -->


                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" method="Post">
                        <div class="form-group">
                            <label>Author</label>
                            <input type="text" name="author" class="form-control">
                        </div>
                        <div class="form-group">
                            <textarea name="body" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>


<!-- ************************************************************* -->



                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                <?php foreach ($comments as $comment):?>
                <div class="media">
                  
                    <a class="pull-left" href="#">
                        Author image
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">
                            <?php echo $comment->author; ?>
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        <?php echo $comment->body; ?>
                    </div>
                
                </div>

                <?php endforeach ; ?>
                <!-- Comment -->
               

            </div>



            
            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

            
                 <?php include("includes/sidebar.php"); ?>



        </div>
        <!-- /.row -->


        <?php include("includes/footer.php"); ?>

        </div>