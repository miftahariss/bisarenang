<div class="section">
    <div class="container">
        <!-- <div class="breadcrumb-wrap">
            <a href="index.html" class="breadcrumb">Home</a>
            <a href="program.html" class="breadcrumb">Program</a>
        </div> -->
        <?php echo $this->breadcrumbs->show(); ?>
    </div>
</div> <!-- SECTION -->

<div class="section">
    <div class="container">
        <div class="section-title wow fadeInDown">
            <h2>Program</h2>
        </div>
        
        <ul class="collapsible" data-collapsible="accordion">
            <?php if (count($content_program) > 0) :?>
                <?php $i = 1; ?>
                <?php foreach($content_program as $data): ?>
                    <li class="wow fadeInRight" data-wow-delay="<?php echo $i; ?>s"> <!-- DATA WOW DELAY KELIPATAN TAMBAH 1 -->
                        <div class="collapsible-header" style="background-image: url(<?php echo base_url() ?>asset_admin/assets/uploads/cover/original/<?php echo $data->filename; ?>);">
                            <p><?php echo $data->title; ?></p>
                        </div>
                        
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="#">Beginner</a></li>
                                <li><a href="#">Intermediate</a></li>
                                <li><a href="#">Advance</a></li>
                            </ul>
                        </div>
                    </li>
                    <?php $i++; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul> <!-- COLLAPSIBLE -->
    </div> <!-- CONTAINER -->
</div> <!-- SECTION -->