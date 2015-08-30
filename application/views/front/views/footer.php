</div>
<!-- BEGIN FOOTER -->
<div class="page-footer">

		 2015 &copy; Badan Penelitian dan Pengembangan Penelitian Kementerian Pertanian. All Rights Reserved. Page rendered in {elapsed_time} seconds and using {memory_usage}

</div>
<div class="scroll-to-top">
	<i class="icon-arrow-up"></i>
</div>
<!-- END FOOTER -->

<!--[if lt IE 9]>
<script src="<?php echo $base_uri ?>assets/plugins/respond.min.js"></script>
<script src="<?php echo $base_uri ?>assets/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="<?php echo $base_uri ?>assets/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="<?php echo $base_uri ?>assets/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo $base_uri ?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo $base_uri ?>assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?php echo $base_uri ?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo $base_uri ?>assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo $base_uri ?>assets/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?php echo $base_uri ?>assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?php echo $base_uri ?>assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<?php 
if(isset($scripts)) {
	echo $scripts; 
}
?>

<script src="<?php echo $base_uri ?>assets/js/metronic.js" type="text/javascript"></script>
<script src="<?php echo $base_uri ?>assets/js/layout.js" type="text/javascript"></script>
<?php echo get_scripts(); ?>

<?php 
echo "<script>";
echo "jQuery(document).ready(function() { ";
echo "Metronic.init();Layout.init();";
if(isset($v_script)){
    echo $v_script;
}
echo "});";
echo "</script>";
?>
	

<?php 
if(isset($v_script_file))
{
    $v_script_file =  $base_uri.'assets/js/'.$v_script_file;
    echo file_get_contents($v_script_file);
} 
?>  