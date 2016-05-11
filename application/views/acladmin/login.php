<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin - CMS</title>
<meta name="robots" content="noindex, nofollow" />
<link href="<?php echo base_url()?>asset_admin/assets/css/bootstrap.css" type="text/css" rel="stylesheet" />
<link href="<?php echo base_url()?>asset_admin/assets/css/bootstrap-responsive.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo base_url()?>asset_admin/assets/js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>asset_admin/assets/js/bootstrap.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>asset_admin/assets/js/bootstrap-dropdown.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>asset_admin/assets/js/bootstrap-tooltip.js"></script>
</head>
<body>
    <div class="container">
        <form action="<?php echo base_url()?>backend/cmsauth/check" method="post" class="form-signin">
            <?php if ($this->session->flashdata('error')) : ?>
            <div class="alert alert-error alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <?php echo $this->session->flashdata('error'); ?>
            </div>
            <?php endif ?>
            <h4 class="form-signin-heading">Please sign in</h4>
            <input type="text" name="email" class="input input-xlarge" placeholder="Username / Email" required="">
            <input type="password" name="password" class="input input-xlarge" placeholder="Password" required="">
            <button class="btn btn-block btn-info" type="submit">Sign in</button>
        </form>
    </div>
</body>
</html>
