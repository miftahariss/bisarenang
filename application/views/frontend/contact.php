<div class="section">
	<div class="container">
        <div class="breadcrumb-wrap">
            <a href="index.html" class="breadcrumb">Home</a>
            <a href="contact.html" class="breadcrumb">Contact</a>
        </div>
    </div>
</div> <!-- SECTION -->

<div class="section">
	<div class="container">
    	<div class="section-title">
        	<h2>Contact</h2>
        </div>
        
        <form id="contact">
        	<ul>
            	<li>
                	<label for="name">NAME</label>
                    <input placeholder="Name" id="name" type="text" required>
                </li>
                
                <li>
                	<label for="email">EMAIL</label>
                    <input placeholder="Email" id="email" type="email" required>
                </li>
                
                <li>
                	<label for="message">MESSAGE</label>
                    <textarea id="message" required></textarea>
                </li>
                
                <li>
                	<label for="first_name">ARE YOU A ROBOT?</label>
                    <div class="captcha"><img src="<?php echo base_url(); ?>assets/images/captcha.jpg"></div>
                </li>
                
                <li>
                	<div class="submit"><button type="submit">Submit</button></div>
                </li>
            </ul>
        </form>
    </div> <!-- CONTAINER -->
</div> <!-- SECTION -->