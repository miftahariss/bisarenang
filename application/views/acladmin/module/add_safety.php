<h3 class="alert alert-info"><?php echo $title; ?></h3>
<form action="" method="post" name="addArticle" enctype="multipart/form-data">
    <table class="table table-striped">
        <tr>
            <td>Judul</td>
            <td>
                <input type="text" name="title" value="<?php echo set_value('title')?>" class="input input-block-level" required="required" />
                <span class="alert-error"><?php echo form_error('title')?></span>
            </td>
        </tr>
        <tr>
            <td>Short Desc</td>
            <td>
                <input type="text" name="short_desc" value="<?php echo set_value('short_desc')?>" class="input input-block-level" required="required" />
                <span class="alert-error"><?php echo form_error('short_desc')?></span>
            </td>
        </tr>
        <tr>
            <td>Foto Utama<code>Maksimal 2MB</code></td>
            <td>
                <input type="file" name="userfile" required="required" />
                <span class="alert-error"><?php echo form_error('userfile'); ?></span>
            </td>
        </tr>
    </table>
    <!-- <table class="table table-striped" id="photo">
        <tr>
            <th colspan="5">Gallery <a class="btn" onclick="addPhoto()"><span class="icon icon-plus-sign"></span> Add Photo</a></th>
        </tr>
        <tr>
            <td></td>
            <td>Judul Foto</td>
            <td>Deskripsi Foto</td>
            <td>Upload Foto <code>Maksimal 2MB</code> | <code>minimum file dimension 980 x 600 pixel</code></td>
            <td>Aksi</td>
        </tr>
    </table> -->
    <table class="table table-striped">
        <tr>
            <td><input type="submit" class="btn btn-large btn-primary" name="submit" value="Save" onclick="javascript:checkInput()"/></td>
        </tr>
        <input type="hidden" name="id_account" />
    </table>
</form>