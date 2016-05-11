<h3 class="alert alert-info"><?php echo $title; ?></h3>
<a href="<?php echo base_url()?>backend/acladmin/add_user" class="btn"><span class="icon-plus-sign"></span> Tambah User Baru</a>
<hr />
<table class="table table-hover table-condensed">
    <tr class="alert alert-info">
        <th>ID</th>
        <th>Nama User</th>
        <th>Email</th>
        <th>Hak Akses</th>
        <th>Created date</th>
        <th>Modified date</th>
        <th>Action</th>
    </tr>
    <?php if (is_array($list)) : ?>
        <?php foreach ($list as $user): ?>
            <tr>
                <td><?php echo $user->id; ?></td>
                <td><?php echo $user->name; ?></td>
                <td><?php echo $user->email; ?></td>
                <td><?= ($user->role == 1) ? 'Superadmin' : 'Admin' ?></td>
                <td>
                    <small>
                        <?php
                        if ($user->created_date > date('Y')) {
                            echo date('l, d M Y', $user->created_date);
                        } else {
                            echo '-';
                        }
                        ?>
                    </small>
                </td>
                <td>
                    <small>
                        <?php
                        if ($user->modified_date > $user->created_date ) {
                            echo date('l, d M Y', $user->modified_date);
                        } else {
                            echo '-';
                        }
                        ?>
                    </small>
                </td>
                <td>
                    <div class="btn-group">
                        <button class="btn btn-mini dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url()?>backend/acladmin/edit_user/<?php echo $user->id; ?>"><span class="icon-edit"></span> Edit</a></li>
                            <li><a href="<?php echo base_url()?>backend/acladmin/delete_user/<?php echo $user->id; ?>" onclick="return confirm('Yakin data ini ingin dihapus?')"><span class="icon-remove-sign"></span> Delete</a></li>
                        </ul>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</table>
<?php echo $links; ?>
