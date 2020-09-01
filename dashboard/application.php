<div class="wrap" style="position: relative;">
	<div class="box-parent">
		<div class="box credit-box">
		<h3>Prescriptions</h3>
		<?php 

			global $wpdb;
			$table = $wpdb->prefix . 'prescription_contact';
			$sql = "SELECT * FROM $table";
                $results = $wpdb->get_results($sql);
                if (count($results) > 0) {
                	echo "<span>".count($results)."</span>";
                }else{
                	echo '<span>No data!</span>';
                }
		 ?>
		 <a href="<?php echo admin_url('admin.php?page=health360_prescription') ?>" class="button button-secondary">View Details</a>
	</div>
	</div>
</div>