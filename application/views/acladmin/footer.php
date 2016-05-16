<div class="container">
    <div class="breadcrumb">
        <a href="<?php echo base_url() ?>" target="_blank">Home Page</a>
        <a href="<?php echo base_url()?>backend/cmsauth/logout"><span class="icon-lock"></span> Logout</a>
<!--        <a href="<?php echo base_url() ?>acladmin/view_news">Article</a> /
        <a href="<?php echo base_url() ?>acladmin/view_event">Event</a> /-->

        <!-- Only Administrator -->
        <?php if ($this->session->userdata('role') == 1): ?>

<!--            <a href="<?php echo base_url() ?>acladmin/view_channel">Channel</a> /
            <a href="<?php echo base_url() ?>acladmin/view_user">User</a> /-->

        <?php endif ?>
        <!-- Only Administrator -->

        <span class="pull-right">&copy bisarenang <?php echo date('Y') ?></span>
    </div>
    <hr/>
</div>