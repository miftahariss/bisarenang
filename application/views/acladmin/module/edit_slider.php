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
            <td>Link</td>
            <td>
                <input type="text" name="link" value="<?php echo $article->link ?>" class="input input-block-level" />
                <span class="alert-error"><?php echo form_error('link')?></span>
            </td>
        </tr>
        <tr>
            <td>Foto <code>Maksimal 2MB</code></td>
            <td>
            	<?php if ($article->filename == ""): ?>
            		<span class="label label-important">Foto tidak ditemukan!</span>
            	<?php else: ?>
            		<img src="<?php echo base_url()?>asset_admin/assets/uploads/cover/small/<?php echo $article->filename ?>" /><br />
            	<?php endif; ?>
                <input type="file" name="userfile" /><code>minimum file dimension 1250x500 pixel</code>
                <span class="alert-error"><?php echo form_error('userfile'); ?></span>
            </td>
        </tr>
        <input type="hidden" name="id_account" value="<?php echo $article->id_account; ?>" />
    </table>
<!--    <table class="table table-striped" id="editPhoto">
        <tr>
            <th colspan="5">Gallery <a class="btn" onclick="editPhoto()"><span class="icon icon-plus-sign"></span> Add Photo</a></th>
        </tr>
        <tr>

            <td><u><b>Judul Foto</b></u></td>
            <td><u><b>Deskripsi Foto</b></u></td>
            <td><u><b>Foto</b></u></td>
            <td><u><b>Aksi</b></u></td>
        </tr>
        <?php foreach ($photos as $photo): ?>
            <tr>

                <td>
                    <?php echo $photo->title?>
                </td>
                <td>
                    <?php echo $photo->body?>
                </td>
                <td>
                    <?php if ($photo->filename == 0): ?>
                        <span class="label label-important">Foto tidak ditemukan!</span>
                    <?php else: ?>
                        <img class="thumbnail" src="<?php echo base_url()?>asset_admin/assets/uploads/gallery/small/<?php echo $photo->filename?>" width="100" /><br />
                    <?php endif; ?>
                </td>
                <td>
                    <?php echo anchor('/admin/acladmin/edit_gallery_photo/' . $article->id . '/' . $photo->id, "<span class='icon-edit'></span> Edit",array('class'=>'btn','onclick'=>"return confirm('yakin mau edit photo ini?')"));?>
                    <?php echo anchor('/admin/acladmin/articlegaleridelete/' . $article->id . '/' . $photo->id, "<span class='icon-remove-sign'></span> Delete",array('class'=>'btn','onclick'=>"return confirm('yakin mau delete photo ini?')"));?>
                </td>
            </tr>
            <input type="hidden" name="id_photo" value="<?php echo $photo->id ?>" />
        <?php endforeach; ?>

    </table>-->

    <table class="table table-striped">
        <tr>
            <td><input type="submit" class="btn btn-large btn-primary" name="submit" value="Update" /></td>
        </tr>
    </table>
</form>
<script type="text/javascript" src="<?php echo base_url();?>asset_admin/assets/js/ckeditor/ckeditor.js"></script>
<script type="text/javascript">CKEDITOR.replace ('body', {toolbar : 'Basic'})</script>