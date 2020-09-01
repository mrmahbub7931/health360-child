
	<?php 
                global $wpdb;
                $table = $wpdb->prefix.'prescription_contact';
                $sql = "SELECT * FROM $table ORDER BY id DESC";
                $results = $wpdb->get_results($sql);

                if (isset($_REQUEST['view'])) :
                    $formID = sanitize_key( $_GET['id'] );?>
                <div class="wrap" style="position: relative;">
                <?php 
                    $sql = "SELECT * FROM $table WHERE id=$formID";
                    $single_form = $wpdb->get_results($sql) or 'Data not found!';
                    if (count($single_form) > 0) : 
                ?>
                <table class="wp-table widefat fixed striped posts">
                        <tr>
                            <th>
                                <a href="<?php echo admin_url('admin.php?page=health360_prescription');?>" class=""><i class="dashicons dashicons-arrow-left-alt"></i>Go Back</a>
                            </th>
                            <th style="text-align: center;">
                                
                            </th>
                            <th style="text-align: right;">
                                
                            </th>
                        </tr>
                </table>
                <table class="wp-table widefat fixed striped posts">
                		<?php foreach ($single_form as $data) : ?>
                			<tr>
                				<td>Name: </td>
                            	<td><?php echo $data->name ?></td>
                			</tr>
                			<tr>
                				<td>Phone number: </td>
                            	<td><?php echo $data->phone_number ?></td>
                			</tr>
                			<tr>
                				<td>Email: </td>
                            	<td><?php echo $data->email ?></td>
                			</tr>
                			<tr>
                				<td>Address: </td>
                            	<td><?php echo $data->address ?></td>
                			</tr>
                			<tr>
                				<td>File: </td>
                            	<td><?php $files = explode(",", $data->file); $i = 0; foreach ($files as $file) : $i++; ?><a href="<?php echo $file?>" class="button button-secondary" download>File <?php echo $i; ?></a><?php echo " ";endforeach; ?></td>
                			</tr>
                			
                		<?php endforeach; ?>
                </table>
                <?php endif; ?>
            </div>
            <?php else:  ?>

<div class="wrap">
	<table id="prescription_form" class="wp-table widefat fixed striped posts">
		<thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                
                <th>Time</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        	<?php foreach( $results as $key => $data ) : ?>
        	<tr>
        		<td><?php echo $key + 1; ?></td>
        		<td><?php echo $data->name ?></td>
        		<td><?php echo $data->email ?></td>
        		<td><?php echo $data->phone_number ?></td>
        		<td><?php echo date('F d, Y | h:i:s', strtotime($data->time)) ?></td>
        		<td><a href="<?php echo admin_url('admin.php?page=health360_prescription&view=results&id='.$data->id) ?>" class='button button-primary'>Details</a></td>
        	</tr>
        	<?php endforeach; ?>
        </tbody>
	</table>
</div>
<?php endif; ?>
<script type="text/javascript">
	jQuery(document).ready(function () {
		jQuery('#prescription_form').DataTable({
            pageLength: 10,
            ordering: true,
            paging: true,
            responsive: true,
            searching: false,
            lengthChange: false,
            searchPanes:{
                hideCount: true,
            },
            info: false
        });
	});
</script>