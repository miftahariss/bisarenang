<div class="container">
    <div class="navbar navbar-inverse">
        <div class="navbar-inner">
            <a href="#" class="brand"><strong>CMS</strong></a>
            <ul class="nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class=" icon-home"></span> Home</a>
                    <ul class="dropdown-menu">
                        <!-- <li><a href="<?php echo base_url()?>backend/acladmin/add_article"><span class="icon-plus-sign"></span> Add Article</a></li> -->
                        <li><a href="<?php echo base_url()?>backend/acladmin/view_slider"><span class="icon-list"></span> View Slider</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Blog <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url()?>backend/acladmin/add_blog"><span class="icon-plus-sign"></span> Add Bloig</a></li>
                        <li><a href="<?php echo base_url()?>backend/acladmin/view_blog"><span class="icon-list"></span> View Bog</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Product <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url()?>backend/acladmin/add_product"><span class="icon-plus-sign"></span> Add Product</a></li>
                        <li><a href="<?php echo base_url()?>backend/acladmin/view_product"><span class="icon-list"></span> View Product</a></li>
                        <li><a href="<?php echo base_url()?>backend/acladmin/view_kategori"><span class="icon-list"></span> View Kategori</a></li>
                    </ul>
                </li>
                 <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Store <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url()?>backend/acladmin/view_store"><span class="icon-list"></span> View Store</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">About <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url()?>backend/acladmin/view_about"><span class="icon-list"></span> View About</a></li>
                    </ul>
                </li>

                <!-- Only Administrator -->
                <?php if( $this->session->userdata('role') == 1 ): ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Administrator <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url()?>backend/acladmin/add_user"><span class="icon-plus-sign"></span> Add New User</a></li>
                        <li><a href="<?php echo base_url()?>backend/acladmin/view_user"><span class="icon-list"></span> View User</a></li>
                        <!--<li><a href="<?php echo base_url()?>backend/acladmin/archive_user"><span class="icon-trash"></span> Archive User</a></li>-->
                    </ul>
                </li>
                <?php endif ?>
                <!-- Only Administrator -->

            </ul>
<!--            <ul class="pull-right nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?=$this->session->userdata('name')?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url()?>backend/acladmin/edit_password"><span class="icon-edit"></span> Edit Password</a></li>
                        <li><a href="<?php echo base_url()?>backend/cmsauth/logout"><span class="icon-lock"></span> Logout</a></li>
                    </ul>
                </li>
            </ul>-->
<!--            <form class="navbar-search pull-right">-->
<!--                <input type="text" class="input-block-level search-query" placeholder="Search...">-->
<!--            </form>-->
        </div>
    </div><!-- end navbar-->
</div>