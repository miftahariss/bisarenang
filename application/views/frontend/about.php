<div class="section">
	<div class="container">
        <!-- <div class="breadcrumb-wrap">
            <a href="index.html" class="breadcrumb">Home</a>
            <a href="about.html" class="breadcrumb">About</a>
        </div> -->
        <?php echo $this->breadcrumbs->show(); ?>
    </div>
</div> <!-- SECTION -->

<div class="section">
	<div class="container">
    	<div class="section-title">
        	<h2><?php echo $content_about[0]->title; ?></h2>
        </div>
        
        <div class="about">
        	<?php echo $content_about[0]->body; ?>
        </div> <!-- ABOUT -->
    </div> <!-- CONTAINER -->
</div> <!-- SECTION -->