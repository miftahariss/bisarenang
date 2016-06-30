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
            <h2>Basic to Swim</h2>
        </div>
        <?php if ($basic > 0) :?>
            <ul class="collapsible" data-collapsible="accordion">
                <?php foreach($basic as $item): ?>
                    <li class="wow fadeInRight" data-wow-delay="1s"> <!-- DATA WOW DELAY KELIPATAN TAMBAH 1 -->
                        <a href="<?php echo base_url(); ?>basicswim/<?php echo $item['permalink']; ?>">
                            <div class="collapsible-header" style="background-image: url(<?php echo base_url() ?>asset_admin/assets/uploads/cover/original/<?php echo $item['filename']; ?>);">
                                <p><?php echo $item['title']; ?></p>
                            </div>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul> <!-- COLLAPSIBLE -->
        <?php endif; ?>
    </div> <!-- CONTAINER -->
</div> <!-- SECTION -->