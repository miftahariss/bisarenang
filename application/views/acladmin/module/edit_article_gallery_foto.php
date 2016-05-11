<h3 class="alert alert-info"><?php echo $title; ?></h3>
<a class="btn" href="<?php echo base_url()?>backend/acladmin/edit_project/<?=$this->uri->segment(4)?>"><span class="icon-arrow-left"></span> Gallery Album</a><hr />
<?php foreach ($photos as $result) : ?>
<form action="" method="post" enctype="multipart/form-data">
    <table class="table table-striped">
        <tr>
            <td>Judul Foto</td>
            <td>
                <input type="text" name="title" value="<?php echo $result->title; ?>" class="input input-block-level" />
                <span class="alert-error"><?php echo form_error('title')?></span>
            </td>
        </tr>
        <tr>
            <td>Deskripsi Foto</td>
            <td>
                <textarea type="text" name="body" class="input input-block-level"><?php echo $result->body; ?></textarea>
                <span class="alert-error"><?php echo form_error('body')?></span>
            </td>
        </tr>
        <tr>
            <td>Foto<code>Maksimal 2MB</code></td>
            <td>
            	<?php if ($result->filename == 0): ?>
            		<span class="label label-important">Foto tidak ditemukan!</span>
            	<?php else: ?>
            		<img src="<?php echo base_url()?>asset_admin/assets/uploads/cover/small/<?php echo $result->filename ?>" /><br />
            	<?php endif; ?>
                <input type="file" name="userfile" /><code>minimum file dimension 980 x 600 pixel</code>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" class="btn btn-large btn-primary" name="submit" value="Update" /></td>
        </tr>
    </table>
</form>
<?php endforeach; ?>