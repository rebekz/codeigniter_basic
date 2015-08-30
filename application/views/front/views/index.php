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
<body class="<?php echo isset($bodyClass) ? $bodyClass : 'page-md page-header-fixed page-sidebar-closed-hide-logo page-sidebar-closed-hide-logo' ?>">


<?php echo isset($template['partials']['menu'])?$template['partials']['menu']:''; ?>
<?php echo isset($template['partials']['breadcrumb'])?$template['partials']['breadcrumb']:''; ?>

 <?php echo $template['body']; ?> 
 
 
<?php echo isset($template['partials']['footer'])?$template['partials']['footer']:''; ?>
 
</body>
</html>
