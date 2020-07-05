<div class='box'>
                <div class='box-header'>
        <table class="table table-bordered">
	    <tr><td>Name</td><td><?php echo $name; ?></td></tr>
	    <tr><td>Tipe</td><td><?php echo $tipe; ?></td></tr>
	    <tr><td>Description</td><td><?php echo $description; ?></td></tr>
	    <tr><td>Created At</td><td><?php echo $created_at; ?></td></tr>
	    <tr><td>Updated At</td><td><?php echo $updated_at; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('auth_item') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </div><!-- /.box-body -->
</div><!-- /.box -->