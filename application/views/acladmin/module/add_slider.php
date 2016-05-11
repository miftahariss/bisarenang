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
            <td>Link</td>
            <td>
                <input type="text" name="link" value="<?php echo set_value('link')?>" class="input input-block-level" required="required" placeholder="http://" />
                <span class="alert-error"><?php echo form_error('link')?></span>
            </td>
        </tr>
        <tr>
            <td>Foto Utama<code>Maksimal 2MB</code></td>
            <td>
                <input type="file" name="userfile" /><code>minimum file dimension 1250x500 pixel</code>
                <span class="alert-error"><?php echo form_error('userfile'); ?></span>
            </td>
        </tr>
    </table>
    <table class="table table-striped">
        <tr>
            <td><input type="submit" class="btn btn-large btn-primary" name="submit" value="Save" onclick="javascript:checkInput()"/></td>
        </tr>
        <input type="hidden" name="id_account" />
    </table>
</form>
<script type="text/javascript" src="<?php echo base_url();?>asset_admin/assets/js/ckeditor/ckeditor.js"></script>
<script type="text/javascript">CKEDITOR.replace ('body', {toolbar : 'Basic'})</script>