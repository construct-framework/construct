<?php defined('_JEXEC') or die;
/**
* @package		Template Framework for Joomla! 1.6
* @author		Matt Thomas http://construct-framework.com
* @copyright	Copyright (C) 2009 - 2012 Matt Thomas. All rights reserved.
* @license		GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
*/	

// To enable use of site configuration
$app 					= JFactory::getApplication();
// Get the base URL of the website
$baseUrl 				= JURI::base();
?>

<!DOCTYPE html> 
<html class="no-js">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="<?php echo $baseUrl.'templates/'.$this->template; ?>/css/mobile.css" type="text/css" media="screen" />
		<?php //Load Mobile Extended Template Style Overrides
		if (isset($mobileCssFile)) : ?>
			<link rel="stylesheet" href="<?php echo $baseUrl.$mobileCssFile; ?>" type="text/css" media="screen" />			
		<?php endif; ?>	
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.0/jquery.mobile-1.0.min.css" />
		<script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
		<script>(function($) {$(document).bind("mobileinit", function() {$.mobile.ajaxEnabled = false;});})(jQuery);</script>
		<script src="http://code.jquery.com/mobile/1.0/jquery.mobile-1.0.min.js"></script>
		<script>(function($) {$(document).ready(function() {$('html').removeClass("no-js").addClass("js");});})(jQuery);</script>
	</head>

<body>
	<div data-role="page" data-theme="<?php echo $mPageDataTheme; ?>">
		<div id="header" data-role="header" data-theme="<?php echo $mHeaderDataTheme; ?>">
			<h1><a href="<?php echo $baseUrl; ?>/" title="<?php echo htmlspecialchars($app->getCfg('sitename')); ?>"><?php echo htmlspecialchars($app->getCfg('sitename')); ?></a></h1>
			<?php if ($showDiagnostics) : ?>
				<ul id="diagnostics">
				    <li>layout override</li>
					<li>component <?php echo $currentComponent; ?></li>	
					<?php if($view)			echo '<li>'.$view.' view</li>'; ?>						
					<?php if($articleId)	echo '<li>article '.$articleId.'</li>'; ?>
					<?php if($itemId)		echo '<li>item '.$itemId.'</li>'; ?>
				    <?php if($sectionId) 	echo '<li>section '.$sectionId.'</li>'; ?>
				    <?php if($catId)   		echo '<li>category '.$catId.'</li>'; ?>
				</ul>
			<?php endif; ?>	
		</div>	
	
		<?php if ( $mNavPosition && ($this->countModules('nav'))) : ?>
			<div id="nav">
				<jdoc:include type="modules" name="nav" style="raw" />
			</div><!-- end nav-->
		<?php endif; ?>
		
		<div id="content-container" data-role="content" data-theme="<?php echo $mContentDataTheme; ?>">	  
			<?php if ($this->getBuffer('message')) : ?>
					<jdoc:include type="message" />
			<?php endif; ?>
			<jdoc:include type="component" />
		</div>
		
		<?php if ( !$mNavPosition && ($this->countModules('nav'))) : ?>
			<div id="nav">
				<jdoc:include type="modules" name="nav" style="raw" />
			</div><!-- end nav-->
		<?php endif; ?>		
									
		<div id="footer" data-role="footer" data-theme="<?php echo $mFooterDataTheme; ?>">
			<?php if ($this->countModules('footer')) : ?>
				<jdoc:include type="modules" name="footer" style="xhtml" />
			<?php endif; ?>
		</div>
	</div>
	  
</body>
</html>
