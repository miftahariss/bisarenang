<script type="text/javascript">
    var current = 1;

    function addPhoto() {
        //current keeps track of how many people we have.
        current++;
        var strToAddPhoto = "<tr><td></td><td><input type=\"text\" name=\"title_photo[]\" class=\"input-xlarge\" /></td><td><input type=\"text\" name=\"desc_photo[]\" class=\"input-xlarge\" /></td><td><input type=\"file\" name=\"galleryfile[]\" required=\"required\"/></td><td><a onclick=\"$(this).closest('tr').remove();\" class=\"btn\"><span class='icon-remove-sign'></span> Delete</a></td></tr>";

        $('#photo').append(strToAddPhoto)
    }

</script>
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
            <td>Headline</td>
            <td><input type="checkbox" name="headline" value="1"></td>
        </tr>
        <tr>
            <td>Foto Utama<code>Maksimal 2MB</code></td>
            <td>
                <input type="file" name="userfile" required="required" />
                <span class="alert-error"><?php echo form_error('userfile'); ?></span>
            </td>
        </tr>
        <tr>
            <td><h4>BEGINNER</h4></td><td></td>
        </tr>
        <tr>
            <td>Judul</td>
            <td>
                <input type="text" name="title_beginner" value="<?php echo set_value('title_beginner')?>" class="input input-block-level" required="required" />
                <span class="alert-error"><?php echo form_error('title_beginner')?></span>
            </td>
        </tr>
        <tr>
            <td>Short Desc</td>
            <td>
                <input type="text" name="short_desc_beginner" value="<?php echo set_value('short_desc_beginner')?>" class="input input-block-level" required="required" />
                <span class="alert-error"><?php echo form_error('short_desc_beginner')?></span>
            </td>
        </tr>
        <tr>
            <td>Isi<font style="color: red;"> *</font></td>
            <td>
                <textarea type="text" name="body_beginner" required="required"><?php echo set_value('body_beginner')?></textarea>
                <span class="alert-error"><?php echo form_error('body_beginner')?></span>
            </td>
        </tr>
        <tr>
            <td>Foto Utama<code>Maksimal 2MB</code></td>
            <td>
                <input type="file" name="userfile_beginner" required="required" />
                <span class="alert-error"><?php echo form_error('userfile'); ?></span>
            </td>
        </tr>
        <tr>
            <td><h4>INTERMEDIATE</h4></td><td></td>
        </tr>
        <tr>
            <td>Judul</td>
            <td>
                <input type="text" name="title_intermediate" value="<?php echo set_value('title_intermediate')?>" class="input input-block-level" required="required" />
                <span class="alert-error"><?php echo form_error('title_intermediate')?></span>
            </td>
        </tr>
        <tr>
            <td>Short Desc</td>
            <td>
                <input type="text" name="short_desc_intermediate" value="<?php echo set_value('short_desc_intermediate')?>" class="input input-block-level" required="required" />
                <span class="alert-error"><?php echo form_error('short_desc_intermediate')?></span>
            </td>
        </tr>
        <tr>
            <td>Isi<font style="color: red;"> *</font></td>
            <td>
                <textarea type="text" name="body_intermediate" required="required"><?php echo set_value('body_intermediate')?></textarea>
                <span class="alert-error"><?php echo form_error('body_intermediate')?></span>
            </td>
        </tr>
        <tr>
            <td>Foto Utama<code>Maksimal 2MB</code></td>
            <td>
                <input type="file" name="userfile_intermediate" required="required" />
                <span class="alert-error"><?php echo form_error('userfile_intermediate'); ?></span>
            </td>
        </tr>
        <tr>
            <td><h4>ADVANCED</h4></td><td></td>
        </tr>
        <tr>
            <td>Judul</td>
            <td>
                <input type="text" name="title_advanced" value="<?php echo set_value('title_advanced')?>" class="input input-block-level" required="required" />
                <span class="alert-error"><?php echo form_error('title_advanced')?></span>
            </td>
        </tr>
        <tr>
            <td>Short Desc</td>
            <td>
                <input type="text" name="short_desc_advanced" value="<?php echo set_value('short_desc_advanced')?>" class="input input-block-level" required="required" />
                <span class="alert-error"><?php echo form_error('short_desc_advanced')?></span>
            </td>
        </tr>
        <tr>
            <td>Isi<font style="color: red;"> *</font></td>
            <td>
                <textarea type="text" name="body_advanced" required="required"><?php echo set_value('body_advanced')?></textarea>
                <span class="alert-error"><?php echo form_error('body_advanced')?></span>
            </td>
        </tr>
        <tr>
            <td>Foto Utama<code>Maksimal 2MB</code></td>
            <td>
                <input type="file" name="userfile_advanced" required="required" />
                <span class="alert-error"><?php echo form_error('userfile_advanced'); ?></span>
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
<script type="text/javascript" src="<?php echo base_url();?>asset_admin/assets/js/ckeditor/ckeditor.js"></script>
<script type="text/javascript">CKEDITOR.replace ('body_beginner', {toolbar : 'Basic'})</script>
<script type="text/javascript">CKEDITOR.replace ('body_intermediate', {toolbar : 'Basic'})</script>
<script type="text/javascript">CKEDITOR.replace ('body_advanced', {toolbar : 'Basic'})</script>