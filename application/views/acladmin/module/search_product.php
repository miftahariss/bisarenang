<h3 class="alert alert-info"><?php echo $title; ?></h3>
<table class="table table-hover table-condensed">
    <tbody class="alert alert-info">
    	<tr>
	        <a href="<?php echo base_url()?>backend/acladmin/add_media/" class="btn"><span class="icon-plus-sign"></span> Tambah Artikel</a>
	        <?php $attributes = array('class'=>'navbar-form pull-left'); ?>
	        <?php echo form_open('backend/acladmin/search_media', $attributes); ?>
	            <span class="pull-right"><input type="submit" class="btn btn-primary" name="submit" value="Search" /></span>
	            <span class="pull-right"><input type="text" class="input-xlarge" name="search" placeholder="Search by title" /></span>
	        <?php echo form_close(); ?>
    	</tr>
        <th>ID</th>
        <th>Title</th>
        <th>Photo</th>
        <th>Created Date</th>
        <th>Modified Date</th>
        <th>Action</th>
    </tbody>
    <?php if (is_array($media)) : ?>
        <?php foreach ($media as $r) : ?>
        <tr>
            <td><?php echo $r['id']; ?></td>
            <td><?php echo $r['title']; ?></td>
            <td>
            	<?php if ($r['filename'] == 0): ?>
            		<span class="label label-important">Foto tidak ditemukan!</span>
            	<?php else: ?>
            		<img class="thumbnail" src="<?php echo base_url()?>asset_admin/assets/uploads/cover/small/<?php echo $r['filename']?>" width="70" />
            	<?php endif; ?>
            </td>
            <td><small>
            <?php 
                if ($r['created_date'] > date('Y')) {
                    echo date('l, d M Y', $r['created_date']); 
                } else {
                    echo '-';
                }
            ?></small>
            </td>
            <td><small>
            <?php 
                if ($r['modified_date'] > $r['created_date']) {
                    echo date('l, d M Y', $r['modified_date']); 
                } else {
                    echo '-';
                }
            ?></small>
            </td>
            <td>
                <div class="btn-group">
                    <button class="btn dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
                    <ul class="dropdown-menu">
<!--                        <li><a href="#<?php //echo base_url()?>" target="_blank"><span class="icon-list-alt"></span> Detail</a></li>-->
                        <li><a href="<?php echo base_url()?>backend/acladmin/edit_media/<?php echo $r['id'] ?>"><span class="icon-edit"></span> Edit</a></li>
                        <li><a href="<?php echo base_url()?>backend/acladmin/delete_media/<?php echo $r['id'] ?>" onclick="return confirm('Yakin data ini ingin dihapus?')"><span class="icon-remove-sign"></span> Delete</a></li>
                    </ul>
                </div>
            </td>
        </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</table>
<?php //echo $links; ?>