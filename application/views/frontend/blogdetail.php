<div class="section">
	<div class="container">
        <!-- <div class="breadcrumb-wrap">
            <a href="index.html" class="breadcrumb">Home</a>
            <a href="blog.html" class="breadcrumb">Blog</a>
            <a href="#" class="breadcrumb">Blog Detail</a>
        </div> -->
        <?php echo $this->breadcrumbs->show(); ?>
    </div>
</div> <!-- SECTION -->

<div class="section">
	<div class="container">
    	<div class="section-title">
        	<h2><?php echo $content_detail[0]->title; ?></h2>
        </div>
        
        <div class="blog-img-wrap  valign-wrapper detail-margin">
            <img class="valign" src="<?php echo base_url() ?>asset_admin/assets/uploads/cover/original/<?php echo $content_detail[0]->filename; ?>" alt="Program-1">
        </div> <!-- BLOG WRAP -->
        
        <div class="detail-wrap">
        	<?php echo $content_detail[0]->body; ?>
        </div> <!-- DETAIL WRAP -->
    </div> <!-- CONTAINER -->
</div> <!-- SECTION -->