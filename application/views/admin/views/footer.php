

<div class="page-footer">

		 2015 &copy; <?php echo WEB_CORP ?>. All Rights Reserved. Page rendered in {elapsed_time} seconds and using {memory_usage}

</div>

<script src="<?php echo $base_uri ?>assets/plugins/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo $base_uri ?>assets/plugins/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script>

<?php 
if(isset($scripts)) {
	echo $scripts; 
}
?>

<script src="<?php echo $base_uri ?>assets/js/sb-admin-2.js" type="text/javascript"></script>

<?php echo get_scripts(); ?>

<?php 
echo "<script>";
echo "jQuery(document).ready(function() { ";

if(isset($v_script)){
    echo $v_script;
}

echo "}) </script>";
?>
	

<?php 
if(isset($v_script_file))
{
    $v_script_file =  $base_uri.'assets/js/'.$v_script_file;
    echo file_get_contents($v_script_file);
} 
?>  