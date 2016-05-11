<h3 class="alert alert-info"><?php echo $title; ?></h3>


<table class="table table-hover table-condensed">
    <tbody class="alert alert-info">
        <th>ID</th>
        <th>Created Date</th>
        <th>Modified Date</th>
        <th>Action</th>
    </tbody>
    <?php if (is_array($banner)) : ?>
        <?php foreach ($banner as $r) : ?>
        <tr>
            <td><?php echo $r->id; ?></td>
            <td><small>
            <?php 
                if ($r->created_date > date('Y')) {
                    echo date('l, d M Y', $r->created_date); 
                } else {
                    echo '-';
                }
            ?></small>
            </td>
            <td><small>
            <?php 
                if ($r->modified_date > $r->created_date ) {
                    echo date('l, d M Y', $r->modified_date); 
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
                        <li><a href="<?php echo base_url()?>backend/acladmin/edit_about/<?php echo $r->id ?>"><span class="icon-edit"></span> Edit</a></li>
                        <!-- <li><a href="<?php echo base_url()?>backend/acladmin/delete_slider/<?php echo $r->id ?>" onclick="return confirm('Yakin data ini ingin dihapus?')"><span class="icon-remove-sign"></span> Delete</a></li> -->
                    </ul>
                </div>
            </td>
        </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</table>
<?php //echo $links; ?>