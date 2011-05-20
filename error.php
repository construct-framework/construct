<?php defined('_JEXEC') or die;
/**
* @package		Template Framework for Joomla! 1.6
* @author		Joomla Engineering http://joomlaengineering.com
* @copyright	Copyright (C) 2010, 2011 Matt Thomas | Joomla Engineering. All rights reserved.
* @license		GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
*/

// To enable use of site configuration
$app 					= JFactory::getApplication();
// Get the base URL of the website
$baseUrl 				= JURI::base();
// Returns a reference to the global document object
$doc 					= JFactory::getDocument();
// Get the offline status of the webiste
$offLine 				= $app->getCfg('offline');
// Send the user to the home page if the website is offline
if ($offLine) {
	$app->redirect($baseUrl);
}
// Manually set and define template parameters
$columnLayout			= 'left-1-main-right-1';
$customStyleSheet 		= 'example.css';
$enableSwitcher 		= '0';
$bodyFontFamily			= 'lucida-grande';
$fullWidth				= '1';
$IECSS3					= '1';
$IECSS3Targets			= '.drop-shadow, .outline, .rounded, ul.menu li, ul.menu ul, #nav,#content-left .moduletable, #content-left .moduletable_menu, #content-right .moduletable, #content-right .moduletable_menu, #content-top .moduletable, #content-top .moduletable_menu, #sub-nav .moduletable, #sub-nav .moduletable_menu';
$IE6TransFix			= '1';
$IE6TransFixTargets		= 'h1 a, .readon, .parent a, #breadcrumbs';
$googleWebFont 			= '';
$googleWebFontTargets	= 'h1,h2,h3,h4,h5,h6';
$loadMoo 				= '1';
$loadModal				= '1';
$loadjQuery 			= '0';
$mdetect 				= '1';
$setGeneratorTag		= 'Joomla Engineering | http://JoomlaEngineering.com';
$showDate 				= '1';
$showPageLinks			= '1';
$showDiagnostics 		= '0';
$siteWidth				= '80.5';
$siteWidthType			= 'max-width';
$siteWidthUnit			= 'em';
$stickyFooterHeight		= '175';
$useCustomStyleSheet 	= '1';
$useStickyFooter 		= '1';

// Define module counts
$supraModuleClass 		= 'count-1';
$subHeadClass 			= 'count-6';
$subNavClass 			= 'count-4';
$contentTopClass 		= 'count-4';
$contentBottomClass 	= '';
$contentLeftClass 		= 'count-1';
$contentRightClass 		= '';
$subContentClass 		= 'count-4';

// Based on http://forum.joomla.org/index.php/viewtopic.php?p=1077558#p1077558
$renderer   			= $doc->loadRenderer( 'modules' );
$raw 					= array( 'style' => 'raw' );
$xhtml 					= array( 'style' => 'xhtml' );
$jexhtml 				= array( 'style' => 'jexhtml' );

#--------------------------------------------------------------------------#

// Email notification feature from http://forum.joomla.org/viewtopic.php?p=1760233#p1760233
	 
// change this to whatever email address you want the notifications to be sent to
$emailaddress = "you@yourdomain.com";

// only change this number if you plan on making other error pages.. eg. 403, 500, etc..
$errorNum = "404";

// message area - you can stop the emailing of error notices by commented out each of the lines below
$errortime = (date("M d Y h:m:s"));
$message = $errorNum." Error Report\r\n\r\nA ".$errorNum." error was encountered by ".$_SERVER['REMOTE_ADDR'];
$message .= " on $errortime.\r\n\r\n";
$message .= "The URL which generated the 404 error is: \nhttp://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."\r\n\r\n";
$message .= "The referring page, if any, was:\n".$_SERVER['HTTP_REFERER']."\r\n\r\n";
$message .= "The used client was:\n".$_SERVER['HTTP_USER_AGENT']."\r\n\r\n";
$mastheads = "From: ".$emailaddress."\nDate: ".$errortime." +0100\n";
$subject = "Error: ".$errorNum." from ".$_SERVER['HTTP_REFERER'];
//mail($emailaddress, $subject, $message, $mastheads);
							
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
<head>
<jdoc:include type="head" />
  <meta name="copyright" content="<?php echo $app->getCfg('sitename');?>" />	
  <link rel="shortcut icon" href="<?php echo 'templates/'.$this->template; ?>/favicon.ico" type="image/x-icon" />
  <link rel="icon" href="<?php echo 'templates/'.$this->template; ?>/favicon.png" type="image/png" />	
  <link rel="stylesheet" href="<?php echo 'templates/'.$this->template; ?>/css/screen.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="<?php echo 'templates/'.$this->template; ?>/css/print.css" type="text/css" media="print" />
<?php if ($enableSwitcher) {
  echo '  <link rel="alternate stylesheet" href="templates/'.$this->template.'/css/diagnostic.css" type="text/css" title="diagnostic"/>
  <link rel="alternate stylesheet" href="templates/'.$this->template.'/css/normal.css" type="text/css" title="normal"/>
  <link rel="alternate stylesheet" href="templates/'.$this->template.'/css/wireframe.css" type="text/css" title="wireframe"/>';
} ?>
<?php	
	if (($useCustomStyleSheet) && ($customStyleSheet !='-1'))
		echo "\n".'  <link rel="stylesheet" href="templates/'.$this->template.'/css/'.$customStyleSheet.'"  type="text/css" media="screen" />';
	if ($this->direction == 'rtl')
		echo "\n".'  <link rel="stylesheet" href="templates/'.$this->template.'/css/rtl.css"  type="text/css" media="screen" />';
	if (isset($cssFile))
		echo "\n".$cssFile;
	if ($googleWebFont != "")
		echo "\n".'  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family='.$googleWebFont.'">
		<style type="text/css">'.$googleWebFontTargets.'{font-family:'.$googleWebFont.', serif !important} </style>';
	if ($loadjQuery)
		$doc->addScript("http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js");
	if ($enableSwitcher)
		echo "\n".'  <script type="text/javascript" src="templates/'.$this->template.'/js/styleswitch.js"></script>';
	if ($siteWidth)
		echo "\n".'  <style type="text/css"> #body-container, #supra {'.$siteWidthType.':'.$siteWidth.$siteWidthUnit.' !important}</style>';
	if (($siteWidthType == 'max-width') && $fluidMedia )
		echo "\n".'  <style type="text/css"> img, object {max-width:100%}</style>';		
	if (!$fullWidth)
		echo "\n".'  <style type="text/css"> #header, #footer {'.$siteWidthType.':'.$siteWidth.$siteWidthUnit.';margin:0 auto}</style>';
?>  
  <script type="text/javascript">window.addEvent('domready',function(){new SmoothScroll({duration:1200},window);});</script>
  <!--[if lt IE 7]>
<?php if ($IE6TransFix) {
  echo '  <script type="text/javascript" src="templates/'.$this->template.'/js/DD_belatedPNG_0.0.8a-min.js"></script>
  <script>DD_belatedPNG.fix('.$IE6TransFixTargets.');</script>'."\n";
} ?>
  <link rel="stylesheet" href="<?php echo 'templates/'.$this->template; ?>/css/ie6.css" type="text/css" media="screen" />
  <style type="text/css">
  body {text-align:center}
  #body-container{text-align:left}
  #body-container, #supra<?php if (!$fullWidth) echo ',#header, #footer'; ?>{width: expression( document.body.clientWidth > <?php echo ($siteWidth -1); ?> ? "<?php echo $siteWidth.$siteWidthUnit; ?>" : "auto" );margin:0 auto}	
  </style>
  <![endif]-->
<?php if ($useStickyFooter) {
	echo '  <style type="text/css">.sticky-footer #body-container{padding-bottom:'.$stickyFooterHeight.'px;}
  .sticky-footer #footer{margin-top:-'.$stickyFooterHeight.'px;height:'.$stickyFooterHeight.'px;}
  </style>
  <!--[if !IE 7]>
  <style type="text/css">.sticky-footer #footer-push {display:table;height:100%}</style>
  <![endif]-->';
} ?>
<?php if ($IECSS3) {
  echo '  <!--[if !IE 9]>
  <style type="text/css">'.$IECSS3Targets.'"{behavior:url("'.$baseUrl.'templates/'.$this->template.'/js/PIE.htc)</style>
  <![endif]-->';
}
echo "\n"; ?>
</head>

<body class="<?php echo $columnLayout; if($useStickyFooter) echo ' sticky-footer'; ?> error">
	<div id="footer-push">
		<?php if ($supraModuleClass) : ?>
			<div id="top" class="clearfix">
				<div id="supra1" class="<?php echo $supraModuleClass ?>">
					<?php echo $renderer->render('supra1', $jexhtml, null);  ?>
				</div>	
				<div id="supra2" class="<?php echo $supraModuleClass ?>">
					<?php echo $renderer->render('supra2', $jexhtml, null);  ?>
				</div>	
				<div id="supra3" class="<?php echo $supraModuleClass ?>">
					<?php echo $renderer->render('supra3', $jexhtml, null);  ?>
				</div>	
				<div id="supra4" class="<?php echo $supraModuleClass ?>">
					<?php echo $renderer->render('supra4', $jexhtml, null);  ?>
				</div>		
			</div>
		<?php endif; ?>	
		
		<div id="header" class="clear clearfix">
			<div class="gutter">

				<div class="date-container">
					<span class="date-weekday"><?php	$now = &JFactory::getDate(); echo $now->toFormat('%A').','; ?></span>
					<span class="date-month"><?php 		$now = &JFactory::getDate(); echo $now->toFormat('%B'); ?></span>
					<span class="date-day"><?php 		$now = &JFactory::getDate(); echo $now->toFormat('%d').','; ?></span>
					<span class="date-year"><?php 		$now = &JFactory::getDate(); echo $now->toFormat('%Y'); ?></span>
				</div>


			
				<h1 id="logo"><a href="<?php echo $this->baseurl ?>/" title="<?php echo $this->baseurl ?>/"><?php echo $this->baseurl ?></a></h1>
				
				<?php echo $renderer->render('header', $jexhtml, null);  ?>
				
				<?php if ($showPageLinks) : ?>						
					<ul id="access">
						<li>Jump to:</li>
						<li><a href="<?php echo $baseUrl; ?>index.php#content" class="to-content">Content</a></li>					
						<li><a href="<?php echo $baseUrl; ?>index.php#nav" class="to-nav">Navigation</a></li>
						<li><a href="<?php echo $baseUrl; ?>index.php#additional" class="to-additional">Additional Information</a></li>
					</ul>				
				<?php endif; ?>	
				
				<?php if ($enableSwitcher) : ?>
					<ul id="style-switch">
						<li><a href="#" onclick="setActiveStyleSheet('wireframe'); return false;" title="Wireframe">Wireframe</a></li>
						<li><a href="#" onclick="setActiveStyleSheet('diagnostic'); return false;" title="Diagnostic">Diagnostic Mode</a></li>
						<li><a href="#" onclick="setActiveStyleSheet('normal'); return false;" title="Normal">Normal Mode</a></li>
					</ul>
				<?php endif; ?>
				
			</div><!-- end gutter -->
		</div><!-- end header -->
 
		<div id="body-container">
			<?php if ($subHeadClass) : ?>
				<div id="sub-header" class="clearfix">						
						<div id="subhead1" class="<?php echo $subHeadClass ?>">
							<?php echo $renderer->render('subhead1', $jexhtml, null);  ?>
						</div><!-- end subhead1 -->								
						<div id="subhead2" class="<?php echo $subHeadClass ?>">
							<?php echo $renderer->render('subhead2', $jexhtml, null);  ?>
						</div><!-- end subhead2 -->
						<div id="subhead3" class="<?php echo $subHeadClass ?>">
							<?php echo $renderer->render('subhead3', $jexhtml, null);  ?>
						</div><!-- end subhead3 -->
						<div id="subhead4" class="<?php echo $subHeadClass ?>">
							<?php echo $renderer->render('subhead4', $jexhtml, null);  ?>
						</div><!-- end subhead4 -->
						<div id="subhead5" class="<?php echo $subHeadClass ?>">
							<?php echo $renderer->render('subhead5', $jexhtml, null);  ?>
						</div><!-- end subhead5 -->
						<div id="subhead6" class="<?php echo $subHeadClass ?>">
							<?php echo $renderer->render('subhead6', $jexhtml, null);  ?>
						</div><!-- end subhead6 -->												
				</div><!-- end sub-header -->
			<?php endif; ?>			
				
				<div id="breadcrumbs">
					<p>You are here: <?php echo $renderer->render('breadcrumbs', $raw, null);  ?></p>
				</div><!-- end breadcrumbs -->
				
			<div id="nav" class="clear">    
				<?php echo $renderer->render('nav', $raw, null);  ?>
			</div>
 
			<div id="content-container" class="clear clearfix">  
				<?php if ($subNavClass) : ?>			
					<div id="sub-nav" class="clearfix">						
						<div id="user1" class="<?php echo $subNavClass ?>">
							<?php echo $renderer->render('user1', $jexhtml, null);  ?>
						</div><!-- end user1 -->								
						<div id="user2" class="<?php echo $subNavClass ?>">
							<?php echo $renderer->render('user2', $jexhtml, null);  ?>
						</div><!-- end user2 -->
						<div id="user3" class="<?php echo $subNavClass ?>">
							<?php echo $renderer->render('user3', $jexhtml, null);  ?>
						</div><!-- end user3 -->
						<div id="user4" class="<?php echo $subNavClass ?>">
							<?php echo $renderer->render('user4', $jexhtml, null);  ?>
						</div><!-- end user4 -->					
					</div>
				<?php endif; ?>	
				
				<div id="load-first" class="clearfix">
					<div id="content-main">
						<div class="gutter">
						<?php if ($contentTopClass) : ?>						
								<div id="content-top" class="clearfix">	
									<div id="top" class="<?php echo $contentTopClass ?>">
										<?php echo $renderer->render('top', $jexhtml, null);  ?>
									</div><!-- end top -->						   
									<div id="top2" class="<?php echo $contentTopClass ?>">
										<?php echo $renderer->render('top2', $jexhtml, null);  ?>
									</div><!-- end top2 -->							
									<div id="top3" class="<?php echo $contentTopClass ?>">
										<?php echo $renderer->render('top3', $jexhtml, null);  ?>	
									</div><!-- end top3 -->								
									<div id="top4" class="<?php echo $contentTopClass ?>">
										<?php echo $renderer->render('top4', $jexhtml, null);  ?>
									</div><!-- end top4 -->			
								</div>
							<?php endif; ?>
							
							<div id="error-message">							             
								<?php echo $this->error->getCode(); ?> - <?php echo $this->error->getMessage(); ?>
								<p><strong><?php echo JText::_('You may not be able to visit this page because of:'); ?></strong></p>
									<ol>
										<li><?php echo JText::_('An out-of-date bookmark/favourite'); ?></li>
										<li><?php echo JText::_('A search engine that has an out-of-date listing for this site'); ?></li>
										<li><?php echo JText::_('A mis-typed address'); ?></li>
										<li><?php echo JText::_('You have no access to this page'); ?></li>
										<li><?php echo JText::_('The requested resource was not found'); ?></li>
										<li><?php echo JText::_('An error has occurred while processing your request.'); ?></li>
									</ol>
								<p><strong><?php echo JText::_('Please try one of the following pages:'); ?></strong></p>
								<p>
									<ul>
										<li><a href="<?php echo $this->baseurl; ?>/" title="<?php echo JText::_('Go to the home page'); ?>"><?php echo JText::_('Home Page'); ?></a></li>
									</ul>
								</p>
								<p><?php echo JText::_('If difficulties persist, please contact the system administrator of this site.'); ?></p>
								<p><?php echo $this->error->getMessage(); ?></p>
								<p>
									<?php if($this->debug) :
										echo $this->renderBacktrace();
									endif; ?>
								</p>
							</div>
							<?php if ($contentBottomClass) : ?>							
								<div id="content-bottom" class="clearfix">	
									<div id="user5" class="<?php echo $contentBottomClass ?>">
										<?php echo $renderer->render('user5', $jexhtml, null);  ?>
									</div><!-- end user5 -->						   
									<div id="user6" class="<?php echo $contentBottomClass ?>">
										<?php echo $renderer->render('user6', $jexhtml, null);  ?>
									</div><!-- end user6 -->							
									<div id="user7" class="<?php echo $contentBottomClass ?>">
										<?php echo $renderer->render('user7', $jexhtml, null);  ?>	
									</div><!-- end user7 -->								
									<div id="user8" class="<?php echo $contentBottomClass ?>">
										<?php echo $renderer->render('user8', $jexhtml, null);  ?>
									</div><!-- end user8 -->			
								</div>	
							<?php endif; ?>						
						</div><!-- end gutter -->					
					</div><!-- end content-main --> 
					<?php if ($contentLeftClass) : ?>								
						<div id="content-left">
							<div class="gutter clearfix">
								<div id="left" class="<?php echo $contentLeftClass ?>">
									<?php echo $renderer->render('left', $jexhtml, null);  ?>
								</div><!-- end left -->
								<div id="left2" class="<?php echo $contentLeftClass ?>">
									<?php echo $renderer->render('left2', $jexhtml, null);  ?>
								</div><!-- end left2 -->
							</div><!--end gutter -->
						</div><!-- end content-left -->
					<?php endif; ?>
				</div><!--end load-first-->
				
					<?php if ($contentRightClass) : ?>								
						<div id="content-right">
							<div class="gutter clearfix">
								<div id="right" class="<?php echo $contentRightClass ?>">
									<?php echo $renderer->render('right', $jexhtml, null);  ?>
								</div><!-- end right -->
								<div id="right2" class="<?php echo $contentRightClass ?>">
									<?php echo $renderer->render('right2', $jexhtml, null);  ?>
								</div><!-- end right2 -->
							</div><!--end gutter -->
						</div><!-- end content-right -->
					<?php endif; ?>	
	   
				<?php if ($subContentClass) : ?>
					<div id="sub-content" class="clearfix">						
						<div id="sub1" class="<?php echo $subContentClass ?>">
							<?php echo $renderer->render('sub1', $jexhtml, null);  ?>
						</div><!-- end sub1 -->								
						<div id="sub2" class="<?php echo $subContentClass ?>">
							<?php echo $renderer->render('sub2', $jexhtml, null);  ?>
						</div><!-- end sub2 -->
						<div id="sub3" class="<?php echo $subContentClass ?>">
							<?php echo $renderer->render('sub3', $jexhtml, null);  ?>
						</div><!-- end sub3 -->
						<div id="sub4" class="<?php echo $subContentClass ?>">
							<?php echo $renderer->render('sub4', $jexhtml, null);  ?>
						</div><!-- end sub4 -->
						<div id="sub5" class="<?php echo $subContentClass ?>">
							<?php echo $renderer->render('sub5', $jexhtml, null);  ?>
						</div><!-- end sub5 -->
						<div id="sub6" class="<?php echo $subContentClass ?>">
							<?php echo $renderer->render('sub6', $jexhtml, null);  ?>
						</div><!-- end sub6 -->				
					</div><!-- end sub-content --> 
				<?php endif; ?>	 
			</div><!-- end content-container -->
		</div><!-- end body-container -->
	</div><!-- end footer-push -->
	
	<div id="footer" class="clear clearfix">
		<div class="gutter clearfix">
			<a id="to-page-top" href="<?php echo $baseurl; ?>index.php#page-top">Back to Top</a>
			<?php echo $renderer->render('footer', $jexhtml, null);  ?>
		</div><!--end gutter -->
	</div><!-- end footer -->

</body>
</html>