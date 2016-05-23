<div class="section">
	<div class="container">
        <!-- <div class="breadcrumb-wrap">
            <a href="index.html" class="breadcrumb">Home</a>
            <a href="program.html" class="breadcrumb">Program</a>
            <a href="#" class="breadcrumb">Program Detail</a>
        </div> -->
        <?php echo $this->breadcrumbs->show(); ?>
    </div>
</div> <!-- SECTION -->

<div class="section">
	<div class="container">
    	<div class="section-title">
        	<h2><?php echo $content_detail[0]->title; ?></h2>
        </div>
        
        <div class="program-wrap  valign-wrapper detail-margin">
            <img class="valign" src="<?php echo base_url() ?>asset_admin/assets/uploads/cover/original/<?php echo $content_detail[0]->filename; ?>" alt="<?php echo $content_detail[0]->title; ?>">
            
            <div class="program-caption">
                <h3><?php echo $program_title[0]->title; ?></h3>
            </div>
        </div> <!-- PROGRAM WRAP -->
        
        <div class="detail-wrap">
        	<h5><?php echo $program_title[0]->title; ?></h5>
            
            <?php echo $content_detail[0]->body; ?>
        </div> <!-- DETAIL WRAP -->
    </div> <!-- CONTAINER -->
</div> <!-- SECTION -->