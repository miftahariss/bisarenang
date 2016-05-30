<div class="section">
	<div class="container">
        <!-- <div class="breadcrumb-wrap">
            <a href="index.html" class="breadcrumb">Home</a>
            <a href="contact.html" class="breadcrumb">Contact</a>
        </div> -->
        <?php echo $this->breadcrumbs->show(); ?>
    </div>
</div> <!-- SECTION -->

<div class="section">
	<div class="container">
    	<div class="section-title">
        	<h2>Contact</h2>
            <?php if($this->session->flashdata('success')): ?>
                <font style="color: blue;"><?php echo $this->session->flashdata('success') ?></font>
            <?php endif; ?>
        </div>
        
        <form id="contact" method="POST">
        	<ul>
            	<li>
                	<label for="name">NAME</label>
                    <input name="name" placeholder="Name" id="name" type="text" required>
                    <?php echo form_error('name'); ?>
                </li>
                
                <li>
                	<label for="email">EMAIL</label>
                    <input name="email" placeholder="Email" id="email" type="email" required>
                    <?php echo form_error('email'); ?>
                </li>
                
                <li>
                	<label for="message">MESSAGE</label>
                    <textarea name="message" id="message" required></textarea>
                    <?php echo form_error('message'); ?>
                </li>
                
                <li>
                	<label for="first_name">ARE YOU A ROBOT?</label>
                    <div class="captcha">
                        <div class="g-recaptcha" data-sitekey="<?php echo $siteKey; ?>"></div>
                        <script type="text/javascript"
                                src="https://www.google.com/recaptcha/api.js?hl=<?php echo $lang; ?>">
                        </script>
                    </div>
                </li>
                
                <li>
                	<div class="submit"><button type="submit" name="submit" value="submit">Submit</button></div>
                </li>
            </ul>
        </form>
    </div> <!-- CONTAINER -->
</div> <!-- SECTION -->