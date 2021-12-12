<?php include("includes/header.php"); ?>



    <?php 


        $page = !empty($_GET["page"]) ? (int)$_GET["page"] : 1 ;

    $itemsPerPage = 8;
    $itemsTotalCount = Photo::countAll();

    $pagi = new Paginate( $page , $itemsPerPage , $itemsTotalCount);

    $sql = "SELECT * FROM photos LIMIT {$itemsPerPage} OFFSET {$pagi->offSet()}";
    $photos = Photo::passQuery($sql);

     ?>

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-12">

                <div class="thumbnails row">
                    <?php foreach ($photos as $photo) : ?>
                <div class="col-xs-6 col-md-3">  
                             
                    <a href="photo.php?id=<?php echo $photo->id; ?>" class="thumbnail">
                        <img src="admin/<?php echo $photo->photo_path(); ?>" class="img-responsive home_page_photo">
                    </a>
             
                </div>
                   <?php endforeach ?> 
                </div>

                <div class="row">
                    <ul class="pager">
                        <?php 
                            if ($pagi->totalPages()>1) {
                                if ($pagi->has_back()) {
                                    echo " <li class='previous'><a href='index.php?page={$pagi->back()}'>Back</a></li>";
                                }



                                for ($i=1; $i <= $pagi->totalPages() ; $i++) { 
                                    if ($i == $pagi->page) {
                                        echo "<li ><a href='index.php?page={$i}'>$i</a></li>";
                                    }else{
                                        echo "<li><a href='index.php?page={$i}'>$i</a></li>";
                                    }                                     
                                }

                                if ($pagi->has_next()) {
                                    echo " <li class='next'><a href='index.php?page={$pagi->next()}'>next</a></li>";
                                }
                            }

                         ?>
                        
                        
                    </ul>  
                </div>

            </div>

        </div>


            <!-- Blog Sidebar Widgets Column -->
           <!--  <div class="col-md-4">

            
                 <?php //include("includes/sidebar.php"); ?>



        </div >-->
        <!-- /.row -->

        <?php include("includes/footer.php"); ?>
