<?php defined('_JEXEC') or die;
/**
* @package		Template Framework for Joomla! 1.6
* @author		Joomla Engineering http://joomlaengineering.com
* @copyright	Copyright (C) 2010 Matt Thomas | Joomla Engineering. All rights reserved.
* @license		GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
*/	

// To enable use of site configuration
$app 					= JFactory::getApplication();
// Get the base URL of the website
$baseUrl 				= JURI::base();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
<head>
<meta http-equiv="Content-Type" content="<?php echo $contenttype; ?>; charset=utf-8" />
<link rel="stylesheet" href="<?php echo $baseUrl.'templates/'.$this->template; ?>/mobile/mobile.css" type="text/css" media="screen" />
</head>

<body>
	<div id="header">	
		<h1><a href="<?php echo $baseUrl; ?>" title="<?php echo $app->getCfg('sitename'); ?>"><?php echo $app->getCfg('sitename'); ?></a></h1>
	</div>

	<?php if ($this->countModules('nav')) : ?>
		<div id="nav">
			<jdoc:include type="modules" name="nav" style="raw" />
		</div><!-- end nav-->
	<?php endif; ?>
	
	<div id="content-container">	  
		<?php if ($this->getBuffer('message')) : ?>
			<div class="error">
				<h2> Message </h2>
				<jdoc:include type="message" />
			</div>
		<?php endif; ?>
		<jdoc:include type="component" />
	</div>
								
	<div id="footer">
		<?php if ($this->countModules('footer')) : ?>
			<jdoc:include type="modules" name="footer" style="xhtml" />
		<?php endif; ?>
	</div>
	  
</body>
</html>
