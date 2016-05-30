<div class="slider-wrap">
    <?php if(count($content_headline) > 0): ?>
	<div class="slider">
        <?php foreach($content_headline as $data): ?>
            <div class="slide">
                <img src="<?php echo base_url() ?>asset_admin/assets/uploads/cover/original/<?php echo $data->filename; ?>" alt="<?php echo $data->title; ?>">
                
                <div class="slider-caption">
                    <h1><?php echo $data->title; ?></h1>
                    
                    <p>
                    	<?php echo $data->short_desc; ?>
                    </p>
                    
                    <a href="<?php echo base_url(); ?>blog/<?php echo $data->permalink; ?>">Read More</a>
                </div> <!-- SLIDER CAPTION -->
            </div> <!-- SLIDE -->
        <?php endforeach; ?>
    </div> <!-- SLIDER -->
    <?php endif; ?>
    
    <div class="content-panel-wrap">
    	<div class="content-panel content-about wow fadeInUp" data-wow-delay="200ms">
        	<p class="content-panel-title">About bisarenang.com</p>
            
            <div class="content-line"></div>
            
            <p>
            	We combine the science of behavior change with. unwavering personal support, so you can make changes that actually stick. It’s an approach shown to reduce risk factors for type 2 diabetes and heart disease. What’s more, the average participant loses over 10 pounds along the way.
            </p>
            
            <a href="#"><img src="<?php echo base_url(); ?>assets/images/arrow-content-panel.png" alt="Arrow"></a>
        </div> <!-- CONTENT PANEL ABOUT -->
        
        <div class="content-panel content-program wow fadeInUp" data-wow-delay="600ms">
        	<p class="content-panel-title">Program</p>
            
            <div class="content-line"></div>
            
            <p>
            	We combine the science of behavior change with. unwavering personal support, so you can make changes that actually stick. It’s an approach shown to reduce risk factors for type 2 diabetes and heart disease. What’s more, the average participant loses over 10 pounds along the way.
            </p>
            
            <a href="#"><img src="<?php echo base_url(); ?>assets/images/arrow-content-panel.png" alt="Arrow"></a>
        </div> <!-- CONTENT PANEL ABOUT -->
        
        <div class="content-panel content-basicswim wow fadeInUp" data-wow-delay="1000ms">
        	<p class="content-panel-title">Basic Swim</p>
            
            <div class="content-line"></div>
            
            <p>
            	We combine the science of behavior change with. unwavering personal support, so you can make changes that actually stick. It’s an approach shown to reduce risk factors for type 2 diabetes and heart disease. What’s more, the average participant loses over 10 pounds along the way.
            </p>
            
            <a href="#"><img src="<?php echo base_url(); ?>assets/images/arrow-content-panel.png" alt="Arrow"></a>
        </div> <!-- CONTENT PANEL ABOUT -->
    </div> <!-- CONTENT PANEL WRAP -->
</div> <!-- SLIDER WRAP -->

<div class="section">
	<div class="container">
    	<div class="section-title">
        	<h2>Blog</h2>
            <p>Way to get newest info.</p>
        </div>
        
        <?php if(count($content_blog) > 0): ?>
        <div class="section-blog">
            <?php foreach($content_blog as $data): ?>
                <div class="blog-box wow fadeInLeftBig" data-wow-delay="200ms">
                    <div class="blog-box-img" style="background-image: url('<?php echo base_url() ?>asset_admin/assets/uploads/cover/original/<?php echo $data->filename; ?>');">
                    	<!-- AMBIL IMAGE DARI BACKGROUND -->
                    </div>
                    
                    <div class="blog-box-content">
                    	<a href="<?php echo base_url(); ?>blog/<?php echo $data->permalink; ?>" class="blog-box-title">
                        	<?php echo $data->title; ?>
                        </a>
                        
                        <div class="blog-box-line"></div>
                        
                        <p class="blog-box-text">
                        	<?php echo $data->short_desc; ?>
                        </p>
                    </div>
                </div> <!-- BLOG BOX -->
            <?php endforeach; ?>
        </div> <!-- SECTION BLOG -->
        <?php endif; ?>
    </div> <!-- CONTAINER -->
</div> <!-- SECTION -->

<?php if(count($program_headline) > 0): ?>
<div class="section bg-basicswim">
	<div class="container">
    	<div class="section-title wow fadeInDown"  style="color: #fff;">
        	<h2><?php echo $program_headline[0]->title; ?></h2>
        </div>

        <div class="basicswim-content">
            <p>
                <?php echo $program_headline[0]->short_desc; ?>
            </p>
        </div>
        
        <?php $program_level = $this->m_frontend->getProgramLevel($program_headline[0]->id); ?>
        <?php if(count($program_level) > 0): ?>
            <div class="section-basicswim">
                <?php foreach($program_level as $item): ?>
                    <?php if($item->level == 1): ?>
                        <?php $v = 'beginner'; ?>
                    <?php elseif($item->level == 2): ?>
                        <?php $v = 'intermediate'; ?>
                    <?php elseif($item->level == 3): ?>
                        <?php $v = 'advance'; ?>
                    <?php endif; ?>
                	<div class="basicswim-box wow flipInY">
                        <a href="<?php echo base_url('program/'.$v.'/'.$item->permalink); ?>" class="basicswim-step step-one">
                            <?php if($item->level == 1): ?>
                                Beginner
                            <?php elseif($item->level == 2): ?>
                                Intermediate
                            <?php elseif($item->level == 3): ?>
                                Advance
                            <?php endif; ?>
                        </a>
                        
                        <div class="basicswim-line"></div>
                        
                        <a href="<?php echo base_url('program/'.$v.'/'.$item->permalink); ?>" class="basicswim-title step-one">
                            <?php echo $item->title; ?>
                        </a>
                        
                        <div class="basicswim-line"></div>
                        
                        <p class="basicswim-text">
                            <?php echo $item->short_desc; ?>
                        </p>
                    </div> <!-- BASIC SWIM BOX -->
                <?php endforeach; ?>
            </div> <!-- SECTION BASIC SWIM -->
        <?php endif; ?>
    </div> <!-- CONTAINER -->
</div> <!-- SECTION -->
<?php endif; ?>