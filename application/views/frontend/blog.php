<div class="section">
	<div class="container">
        <!-- <div class="breadcrumb-wrap">
            <a href="index.html" class="breadcrumb">Home</a>
            <a href="blog.html" class="breadcrumb">Blog</a>
        </div> -->
        <?php echo $this->breadcrumbs->show(); ?>
    </div>
</div> <!-- SECTION -->

<div class="section">
	<div class="container">
    	<div class="section-title">
        	<h2>Blog</h2>
        </div>
        
        <div class="blog-wrap">	
            <?php if ($blog > 0) :?>
                <?php foreach($blog as $item): ?>
                	<div class="article-box wow bounceInRight">
                        <?php if($item['filename'] != ""): ?>
                        	<div class="article-img" style="background-image: url('<?php echo base_url() ?>asset_admin/assets/uploads/cover/original/<?php echo $item['filename']; ?>');">
                            	<!-- IMAGE AMBIL DARI BACKGROUND -->
                            </div>
                        <?php else: ?>
                            <div class="article-img" style="background-image: url('http://img.youtube.com/vi/<?php echo $item['video_id']; ?>/0.jpg');">
                                <!-- IMAGE AMBIL DARI BACKGROUND -->
                            </div>
                        <?php endif; ?>
                        
                        <a href="<?php echo base_url(); ?>blog/<?php echo $item['permalink']; ?>" class="article-title">
                        	<?php echo $item['title']; ?>
                        </a>
                        
                        <p>
                        	<?php echo $item['short_desc']; ?>
                        </p>
                        
                        <a href="<?php echo base_url(); ?>blog/<?php echo $item['permalink']; ?>">Read More</a>
                    </div> <!-- ARTICLE BOX -->
                <?php endforeach; ?>
            <?php endif; ?>
            
            <!-- <ul class="pagination">
                <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                <li class="active"><a href="#!">1</a></li>
                <li class=""><a href="#!">2</a></li>
                <li><a href="#!">3</a></li>
                <li><a href="#!">4</a></li>
                <li><a href="#!">5</a></li>
                <li><a href="#!"><i class="material-icons">chevron_right</i></a></li>
            </ul> -->
            <?php echo $page_links; ?>
        </div> <!-- BLOG WRAP -->
    </div> <!-- CONTAINER -->
</div> <!-- SECTION -->