<h3 class="alert alert-info"><?php echo $title; ?></h3>
<?php if ($this->session->flashdata('error')) : ?>
<div class="alert alert-error alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
    <?php echo $this->session->flashdata('error'); ?>
</div>
<?php endif ?>
<form action="" method="post">
    <table class="table">
        <tr>
            <th>Nama User</th>
            <td>
                <input type="text" name="name" placeholder="Nama User" class="input-xxlarge"
                       value="<?= isset($edit) ? $edit->name : set_value('name') ?>" required=""/>
                <span class="alert-error"><?php echo form_error('name') ?></span>
            </td>
        </tr>
        <tr>
            <th>Email</th>
            <td>
                <input type="email" name="email" placeholder="Email" class="input-xxlarge"
                       value="<?= isset($edit) ? $edit->email : set_value('email') ?>" required="" />
                <span class="alert-error"><?php echo form_error('email') ?></span>
            </td>
        </tr>
        <tr>
            <th>Hak Akses</th>
            <td>
                <select name="role" required="">
                    <option value>--- Pilih Hak Akses ---</option>
                    <option value="1" <?= isset($edit) ? ($edit->role == 1) ? 'selected' : '' : '' ?>>Superadmin</option>
                    <option value="2" <?= isset($edit) ? ($edit->role == 2) ? 'selected' : '' : '' ?>>Admin</option>
                </select>
                <span class="alert-error"><?php echo form_error('role') ?></span>
            </td>
        </tr>
        <tr>
            <th>Password</th>
            <td>
                <input type="password" name="password" placeholder="Password" class="input-xxlarge"
                       value="<?= isset($edit) ? $edit->password : set_value('password') ?>" required=""/>
                <span class="alert-error"><?php echo form_error('password') ?></span>
            </td>
        </tr>
        <tr>
            <th>Ulangi Password</th>
            <td>
                <input type="password" name="ulangi_password" placeholder="Ulangi Password" class="input-xxlarge"
                       value="<?= isset($edit) ? $edit->password : set_value('ulangi_password') ?>" required=""/>
                <span class="alert-error"><?php echo form_error('ulangi_password') ?></span>
            </td>
        </tr>
        <tr>
            <input type="hidden" name="oldpass" placeholder="Ulangi Password" value="<?= isset($edit) ? $edit->password : '' ?>"/>
            <td colspan="2"><input type="submit" class="btn btn-primary" name="submit" value="Add"/></td>
        </tr>
    </table>
</form>