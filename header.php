<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>www/css/<?= implode(',', $this->config->item('css')) ?>" media="screen"/>
	<?php
	if( $this->config->item('javascript_header') )
	{ ?>
	
	<script type="text/javascript" src="<?=base_url()?>www/js/<?=implode(',', $this->config->item('javascript_header'))?>"></script>
	
	<?php
	} ?> 
</head>
<body>
	
</body>
</html>

	
	
