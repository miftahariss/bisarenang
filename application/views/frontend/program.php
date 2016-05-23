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
                        
                        <?php $program_level = $this->m_frontend->getProgramLevel($data->id); ?>
                        <?php if(count($program_level) > 1): ?>
                            <div class="collapsible-body">
                                <ul>
                                    <?php foreach($program_level as $item): ?>
                                        <?php if($item->level == 1): ?>
                                            <?php $v = 'beginner'; ?>
                                        <?php elseif($item->level == 2): ?>
                                            <?php $v = 'intermediate'; ?>
                                        <?php elseif($item->level == 3): ?>
                                            <?php $v = 'advance'; ?>
                                        <?php endif; ?>
                                        <li>
                                            <a href="<?php echo base_url('program/'.$v.'/'.$item->permalink); ?>">
                                                <?php if($item->level == 1): ?>
                                                    Beginner
                                                <?php elseif($item->level == 2): ?>
                                                    Intermediate
                                                <?php elseif($item->level == 3): ?>
                                                    Advance
                                                <?php endif; ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    </li>
                    <?php $i++; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul> <!-- COLLAPSIBLE -->
    </div> <!-- CONTAINER -->
</div> <!-- SECTION -->