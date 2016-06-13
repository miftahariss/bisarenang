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
            <td>Level</td>
            <td>
                <select name="level" required="required">
                    <option value="">-- Pilih Level --</option>
                    <option value="1" <?php if($article->level == 1){ echo 'selected'; } ?>>BEGINNER</option>
                    <option value="2" <?php if($article->level == 2){ echo 'selected'; } ?>>INTERMEDIATE</option>
                    <option value="3" <?php if($article->level == 3){ echo 'selected'; } ?>>ADVANCED</option>
                </select>
                <span class="alert-error"><?php echo form_error('level')?></span>
            </td>
        </tr>
        <tr>
            <td>Isi</td>
            <td>
                <textarea type="text" name="body"><?php echo $article->body; ?></textarea>
                <span class="alert-error"><?php echo form_error('body')?></span>
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
<script type="text/javascript" src="<?php echo base_url();?>asset_admin/assets/js/ckeditor/ckeditor.js"></script>
<script type="text/javascript">CKEDITOR.replace ('body', {toolbar : 'Basic'})</script>