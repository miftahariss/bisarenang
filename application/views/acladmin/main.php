<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo isset($title) ? $title : '' ?> - CMS</title>
<meta name="robots" content="noindex, nofollow" />
<link href="<?php echo base_url()?>asset_admin/assets/css/bootstrap.css" type="text/css" rel="stylesheet" />
<link href="<?php echo base_url()?>asset_admin/assets/css/bootstrap-responsive.css" type="text/css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>asset_admin/assets/css/jquery.tagsinput.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="<?php echo base_url()?>asset_admin/assets/js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>asset_admin/assets/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>asset_admin/assets/js/jquery-ui-1.8.21.custom.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>asset_admin/assets/js/bootstrap.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url()?>asset_admin/assets/js/bootstrap-dropdown.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>asset_admin/assets/js/bootstrap-tooltip.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>asset_admin/assets/js/jquery.tagsinput.js"></script>
<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/jquery-ui.min.js'></script>
<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/themes/start/jquery-ui.css" />

<?php if ($page == 'add_event' || $page == 'edit_event' ||
          $page == 'add_news' || $page == 'edit_news'): ?>
          
<script type="text/javascript" src=" https://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.8.24/themes/base/jquery-ui.css">
<script src="http://code.jquery.com/ui/1.8.24/jquery-ui.js"></script>
<script type="text/javascript">
    $(function() {
      $(".datepicker").datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: "-50:+0",
        dateFormat: 'yy-mm-dd'
      });
    });
    
    var current = 1;
    
    function addPhoto() {
        //current keeps track of how many people we have.
        current++;
        var strToAddPhoto = "<tr><td></td><td><input type=\"text\" name=\"title_photo[]\" class=\"input-xlarge\" /></td><td><input type=\"text\" name=\"desc_photo[]\" class=\"input-xlarge\" /></td><td><input type=\"file\" name=\"galleryfile[]\" required=\"required\"/></td><td><a onclick=\"$(this).closest('tr').remove();\" class=\"btn\"><span class='icon-remove-sign'></span> Delete</a></td></tr>";
		
        $('#photo').append(strToAddPhoto)
    }

    function editPhoto() {
		current++;
		var strToAddPhoto = '<tr><td><input type="text" name="title_photo[]" class="input-xlarge" /></td><td><input type="text" name="desc_photo[]" class="input-xlarge" /></td><td><input type="file" name="galleryfile[]" required="required"/></td><td><a onclick="$(this).closest(\'tr\').remove();" class="btn"><span class=\'icon-remove-sign\'></span> Delete</a></td></tr>';

		$('#editPhoto').append(strToAddPhoto);
    }
</script>
<?php endif; ?>

</head>
<body>
<?php echo $this->load->view('acladmin/header') ?>
    
<div class="container">
    <div class="well well-small">
        <?php echo isset($content) ? $content : ''; ?>
        
        <?php if ($page=='home'): ?>
        	<div class="hero-unit">
        		<h1>Welcome to</h1>
        		<center><img src="<?php echo base_url()?>asset_admin/styles/images/logo_cms.png" width="380" /></center>
        	</div>
        <?php endif; ?>
        
    </div>
</div>
    
<?php echo $this->load->view('acladmin/footer') ?>
</body>
</html>