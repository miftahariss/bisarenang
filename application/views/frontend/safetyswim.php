<div class="section">
    <div class="container">
        <!-- <div class="breadcrumb-wrap">
            <a href="index.html" class="breadcrumb">Home</a>
            <a href="safetyswim.html" class="breadcrumb">Safety Swim</a>
        </div> -->
        <?php echo $this->breadcrumbs->show(); ?>
    </div>
</div> <!-- SECTION -->

<div class="section">
    <div class="container">
        <div class="section-title wow fadeInDown">
            <h2>Safety to Swim</h2>
        </div>

        <?php if (count($content_safety) > 0) :?>
            <?php foreach($content_safety as $data): ?>
                <div class="safetyswim-box wow fadeInRightBig">
                    <div class="safetyswim-img">
                        <img src="<?php echo base_url() ?>asset_admin/assets/uploads/cover/original/<?php echo $data->filename; ?>" alt="<?php echo $data->title; ?>">
                    </div>
                    
                    <p>
                        <?php echo $data->short_desc; ?>
                    </p>
                </div> <!-- SAFETY SWIM BOX -->
            <?php endforeach; ?>
        <?php endif; ?>
    </div> <!-- CONTAINER -->
</div> <!-- SECTION -->