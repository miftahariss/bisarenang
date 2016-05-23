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
        </tr>
        <tr>
            <td>Short Desc</td>
            <td>
                <input type="text" name="short_desc" value="<?php echo $article->short_desc ?>" class="input input-block-level" />
                <span class="alert-error"><?php echo form_error('short_desc')?></span>
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
        </tr>
        <input type="hidden" name="id_account" value="<?php echo $article->id_account; ?>" />
    </table>

    <table class="table table-striped">
        <tr>
            <td><input type="submit" class="btn btn-large btn-primary" name="submit" value="Update" /></td>
        </tr>
    </table>
</form>