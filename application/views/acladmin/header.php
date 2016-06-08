<div class="container">
    <div class="navbar navbar-inverse">
        <div class="navbar-inner">
            <a href="#" class="brand"><strong>CMS</strong></a>
            <ul class="nav">
                <li class="dropdown">
                    <a href="<?php echo base_url()?>admin/acladmin" class="dropdown-toggle"><span class=" icon-home"></span> Home</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Blog <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url()?>admin/acladmin/add_blog"><span class="icon-plus-sign"></span> Add Bloig</a></li>
                        <li><a href="<?php echo base_url()?>admin/acladmin/view_blog"><span class="icon-list"></span> View Bog</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Safety Swim <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url()?>admin/acladmin/add_safety"><span class="icon-plus-sign"></span> Add Safety Swim</a></li>
                        <li><a href="<?php echo base_url()?>admin/acladmin/view_safety"><span class="icon-list"></span> View Safety Swim</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Program <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url()?>admin/acladmin/add_program"><span class="icon-plus-sign"></span> Add Program</a></li>
                        <li><a href="<?php echo base_url()?>admin/acladmin/view_program"><span class="icon-list"></span> View Program</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">About <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url()?>admin/acladmin/view_about"><span class="icon-list"></span> View About</a></li>
                    </ul>
                </li>

                <!-- Only Administrator -->
                <?php if( $this->session->userdata('role') == 1 ): ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Administrator <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url()?>admin/acladmin/add_user"><span class="icon-plus-sign"></span> Add New User</a></li>
                        <li><a href="<?php echo base_url()?>admin/acladmin/view_user"><span class="icon-list"></span> View User</a></li>
                        <!--<li><a href="<?php echo base_url()?>admin/acladmin/archive_user"><span class="icon-trash"></span> Archive User</a></li>-->
                    </ul>
                </li>
                <?php endif ?>
                <!-- Only Administrator -->

            </ul>
<!--            <ul class="pull-right nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?=$this->session->userdata('name')?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url()?>admin/acladmin/edit_password"><span class="icon-edit"></span> Edit Password</a></li>
                        <li><a href="<?php echo base_url()?>admin/cmsauth/logout"><span class="icon-lock"></span> Logout</a></li>
                    </ul>
                </li>
            </ul>-->
<!--            <form class="navbar-search pull-right">-->
<!--                <input type="text" class="input-block-level search-query" placeholder="Search...">-->
<!--            </form>-->
        </div>
    </div><!-- end navbar-->
</div>