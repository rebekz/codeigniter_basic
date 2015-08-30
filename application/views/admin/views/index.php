<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" class="no-js">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport">
<head>
	<title><?php echo WEB_TITLE ?> | <?php echo $template['title']; ?></title>
    
    <?php echo $template['metadata']; ?>
    
<?php echo isset($template['partials']['header'])?$template['partials']['header']:''; ?>

</head>
<body>

	<div id="wrapper">

		<?php echo isset($template['partials']['menu'])?$template['partials']['menu']:''; ?>

	    <div id="page-wrapper">
	        <div class="container-fluid">
	            <div class="row">
	                <div class="col-lg-12">
	                    <h1 class="page-header"><?php echo $pagetitle ?></h1>
	                </div>
	    			<?php echo $template['body']; ?>             
	            </div>
	        </div>
	    </div>
		 
		<?php echo isset($template['partials']['footer'])?$template['partials']['footer']:''; ?>
	 
	</div>

</body>
</html>
