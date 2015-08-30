	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN PAGE HEAD -->
			<div class="page-head">
				<!-- BEGIN PAGE TITLE -->
				<div class="page-title">
					<h1><?php echo $pagetitle ?></h1>
				</div>
				<!-- END PAGE TITLE -->
			</div>
			<!-- END PAGE HEAD -->
			<!-- BEGIN PAGE BREADCRUMB -->
			<?php if(isset($breadcrumb)) { ?>
			<ul class="page-breadcrumb breadcrumb">
				<li>
					<a href="<?php echo $base_uri ?>">
						Dashboard
					</a>
					 <i class="fa fa-circle"></i>
				</li>
				<?php 
					end($breadcrumb);
					$lastkey = key($breadcrumb);
					foreach ($breadcrumb as $title => $link) {
				?>
			    	<li class="<?php echo ($lastkey == $title ? 'active' : '') ?>">
			    		<?php if($link != '') { ?>
			    		<a href="<?php echo $link ?>">
			    			<?php echo $title ?>
			    		</a>
			    		<?php } else { ?>
			    			<?php echo $title ?>
			    		<?php } ?>
						<?php echo ($lastkey != $title ? '<i class="fa fa-circle"></i>' : '') ?>
 			    	</li>
				<?php 		
					}
				?>
			</ul>
			<?php } ?>
			<!-- END PAGE BREADCRUMB -->