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
        <tr>
            <td><h4>BEGINNER</h4></td><td></td><td></td>
        </tr>
        <tr>
            <td>Judul</td>
            <td>Foto Utama</td>
            <td>Aksi</td>
        </tr>
        <tr>
            <td><?php echo $program_beginner->title; ?></td>
            <td><img src="<?php echo base_url()?>asset_admin/assets/uploads/cover/small/<?php echo $program_beginner->filename ?>" /></td>
            <td>
                <?php echo anchor('/backend/acladmin/edit_program_level/' . $article->id . '/' . $program_beginner->id.'/1', "<span class='icon-edit'></span> Edit",array('class'=>'btn','onclick'=>"return confirm('yakin mau edit program ini?')"));?>
            </td>
        </tr>
        <tr>
            <td><h4>INTERMEDIATE</h4></td><td></td><td></td>
        </tr>
        <tr>
            <td>Judul</td>
            <td>Foto Utama</td>
            <td>Aksi</td>
        </tr>
        <tr>
            <td><?php echo $program_intermediate->title; ?></td>
            <td><img src="<?php echo base_url()?>asset_admin/assets/uploads/cover/small/<?php echo $program_intermediate->filename ?>" /></td>
            <td>
                <?php echo anchor('/backend/acladmin/edit_program_level/' . $article->id . '/' . $program_intermediate->id.'/2', "<span class='icon-edit'></span> Edit",array('class'=>'btn','onclick'=>"return confirm('yakin mau edit program ini?')"));?>
            </td>
        </tr>
        <tr>
            <td><h4>ADVANCED</h4></td><td></td><td></td>
        </tr>
        <tr>
            <td>Judul</td>
            <td>Foto Utama</td>
            <td>Aksi</td>
        </tr>
        <tr>
            <td><?php echo $program_advanced->title; ?></td>
            <td><img src="<?php echo base_url()?>asset_admin/assets/uploads/cover/small/<?php echo $program_advanced->filename ?>" /></td>
            <td>
                <?php echo anchor('/backend/acladmin/edit_program_level/' . $article->id . '/' . $program_advanced->id.'/3', "<span class='icon-edit'></span> Edit",array('class'=>'btn','onclick'=>"return confirm('yakin mau edit program ini?')"));?>
            </td>
        </tr>
    </table>

    <!-- <table class="table table-striped" id="editPhoto">
        <tr>
            <th colspan="5">Gallery <a class="btn" onclick="editPhoto()"><span class="icon icon-plus-sign"></span> Add Photo</a></th>
        </tr>
        <tr>

            <td><u><b>Judul Foto</b></u></td>
            <td><u><b>Deskripsi Foto</b></u></td>
            <td><u><b>Foto</b></u><code>Maksimal 2MB</code> | <code>minimum file dimension 980 x 600 pixel</code></td>
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
                        <img class="thumbnail" src="<?php echo base_url()?>asset_admin/assets/uploads/cover/small/<?php echo $photo->filename?>" width="100" /><br />
                    <?php endif; ?>
                </td>
                <td>
                    <?php echo anchor('/backend/acladmin/edit_article_gallery_foto/' . $article->id . '/' . $photo->id, "<span class='icon-edit'></span> Edit",array('class'=>'btn','onclick'=>"return confirm('yakin mau edit photo ini?')"));?>
                    <?php echo anchor('/backend/acladmin/delete_article_gallery_foto/' . $article->id . '/' . $photo->id, "<span class='icon-remove-sign'></span> Delete",array('class'=>'btn','onclick'=>"return confirm('yakin mau delete photo ini?')"));?>
                </td>
            </tr>
            <input type="hidden" name="id_photo" value="<?php echo $photo->id ?>" />
        <?php endforeach; ?>

    </table> -->

    <table class="table table-striped">
        <tr>
            <td><input type="submit" class="btn btn-large btn-primary" name="submit" value="Update" /></td>
        </tr>
    </table>
</form>
<script type="text/javascript" src="<?php echo base_url();?>asset_admin/assets/js/ckeditor/ckeditor.js"></script>
<script type="text/javascript">CKEDITOR.replace ('body', {toolbar : 'Basic'})</script>