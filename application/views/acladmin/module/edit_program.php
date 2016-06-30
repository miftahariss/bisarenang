<script type="text/javascript">
var current = 1;
            
function editPhoto() {
    current++;
    var strToAddPhoto = '<tr><td><input type="text" name="title_photo[]" class="input-xlarge" /></td><td><input type="text" name="desc_photo[]" class="input-xlarge" /></td><td><input type="file" name="galleryfile[]" required="required"/></td><td><a onclick="$(this).closest(\'tr\').remove();" class="btn"><span class=\'icon-remove-sign\'></span> Delete</a></td></tr>';

    $('#editPhoto').append(strToAddPhoto);
}
    
</script>
<h3 class="alert alert-info"><?php echo $title; ?></h3>
<form action="" method="post" enctype="multipart/form-data">
    <?php //print_r($content) ?>
    <table class="table table-striped">
        <tr>
            <a href="<?php echo base_url()?>admin/acladmin/add_program_artikel/<?php echo $article->id; ?>" class="btn tambah_artikel"><span class="icon-plus-sign"></span> Tambah Artikel</a>
            <?php $attributes = array('class'=>'navbar-form pull-left'); ?>
            <?php /* echo form_open('admin/acladmin/search_media', $attributes); ?>
                <span class="pull-right"><input type="submit" class="btn btn-primary" name="submit" value="Search" /></span>
                <span class="pull-right"><input type="text" class="input-xlarge" name="search" placeholder="Search by title" /></span>
            <?php echo form_close(); */ ?>
        </tr>
        <tr>
            <td>Judul</td>
            <td>
                <input type="text" name="title" value="<?php echo $article->title; ?>" class="input input-block-level" />
                <span class="alert-error"><?php echo form_error('title')?></span>
            </td>
            <td></td>
        </tr>
        <tr>
            <td>Short Desc</td>
            <td>
                <input type="text" name="short_desc" value="<?php echo $article->short_desc ?>" class="input input-block-level" />
                <span class="alert-error"><?php echo form_error('short_desc')?></span>
            </td>
            <td></td>
        </tr>
        <tr>
            <td>Headline</td>
            <td>
                <input type="checkbox" name="headline" value="1" <?php if($article->headline == 1){echo 'checked="checked"';} ?>>
                <span class="alert-error"><?php echo form_error('headline')?></span>
            </td>
        </tr>
        <tr>
            <td>Foto <code>Maksimal 2MB</code></td>
            <td>
            	<?php if ($article->filename == 0): ?>
            		<span class="label label-important">Foto tidak ditemukan!</span>
            	<?php else: ?>
            		<img src="<?php echo base_url()?>asset_admin/assets/uploads/cover/small/<?php echo $article->filename ?>" /><br />
            	<?php endif; ?>
                <input type="file" name="userfile" />
                <span class="alert-error"><?php echo form_error('userfile'); ?></span>
            </td>
            <td></td>
        </tr>
        <input type="hidden" name="id_account" value="<?php echo $article->id_account; ?>" />
    </table>

    <table class="table table-striped">
        <tr>
            <td><input type="submit" class="btn btn-large btn-primary" name="submit" value="Update" /></td>
        </tr>
    </table>
</form>
<table class="table table-hover table-condensed">
    <tbody class="alert alert-info">
        <th>ID</th>
        <th>Title</th>
        <th>Foto</th>
        <th>Level</th>
        <th>Created Date</th>
        <th>Modified Date</th>
        <th>Action</th>
    </tbody>
    <?php if (is_array($artikel_program)) : ?>
        <?php foreach ($artikel_program as $r) : ?>
        <tr>
            <td><?php echo $r->id; ?></td>
            <td><?php echo $r->title; ?></td>
            <td>
                <?php if ($r->filename == 0): ?>
                    <img class="thumbnail" src="http://img.youtube.com/vi/<?php echo $r->video_id; ?>/2.jpg" width="70">
                <?php else: ?>
                    <img class="thumbnail" src="<?php echo base_url()?>asset_admin/assets/uploads/cover/small/<?php echo $r->filename?>" width="70" />
                <?php endif; ?>
            </td>
            <td>
                <?php if($r->level == 1): ?>
                    Beginner
                <?php elseif($r->level == 2): ?>
                    Intermediate
                <?php elseif($r->level == 3): ?>
                    Advance
                <?php endif; ?>
            </td>
            <td><small>
            <?php 
                if ($r->created_date > date('Y')) {
                    echo date('l, d M Y', $r->created_date); 
                } else {
                    echo '-';
                }
            ?></small>
            </td>
            <td><small>
            <?php 
                if ($r->modified_date > $r->created_date ) {
                    echo date('l, d M Y', $r->modified_date); 
                } else {
                    echo '-';
                }
            ?></small>
            </td>
            <td>
                <div class="btn-group">
                    <button class="btn dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
                    <ul class="dropdown-menu">
<!--                        <li><a href="#<?php //echo base_url()?>" target="_blank"><span class="icon-list-alt"></span> Detail</a></li>-->
                        <li><a href="<?php echo base_url()?>admin/acladmin/edit_program_artikel/<?php echo $r->id ?>/<?php echo $r->id_program; ?>"><span class="icon-edit"></span> Edit</a></li>
                        <li><a href="<?php echo base_url()?>admin/acladmin/delete_program_artikel/<?php echo $r->id ?>/<?php echo $r->id_program; ?>" onclick="return confirm('Yakin data ini ingin dihapus?')"><span class="icon-remove-sign"></span> Delete</a></li>
                    </ul>
                </div>
            </td>
        </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</table>
<script type="text/javascript" src="<?php echo base_url();?>asset_admin/assets/js/ckeditor/ckeditor.js"></script>
<script type="text/javascript">CKEDITOR.replace ('body', {toolbar : 'Basic'})</script>