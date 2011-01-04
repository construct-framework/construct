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
// Returns a reference to the global document object
$doc 					= JFactory::getDocument();
// Define relative shortcut for current template directory
$template 				= 'templates/'.$this->template;
// Get the current URL
$url 					= clone(JURI::getInstance());
// To access the current user object
$user 					= JFactory::getUser();

// Get and define template parameters
$customStyleSheet 		= $this->params->get('customStyleSheet');
$enableSwitcher 		= $this->params->get('enableSwitcher');
$IECSS3					= $this->params->get('IECSS3');
$IECSS3Targets			= $this->params->get('IECSS3Targets');
$IE6TransFix			= $this->params->get('IE6TransFix');
$IE6TransFixTargets		= $this->params->get('IE6TransFixTargets');
$fluidMedia				= $this->params->get('fluidMedia');
$fontFamily 			= $this->params->get('fontFamily');
$fullWidth				= $this->params->get('fullWidth');
$googleHeaderFont 		= $this->params->get('googleHeaderFont');
$loadMoo 				= $this->params->get('loadMoo');
$loadModal				= $this->params->get('loadModal');
$loadjQuery 			= $this->params->get('loadjQuery');
$mdetect 				= $this->params->get('mdetect');
$mtemplate				= $this->params->get('mtemplate');
$mtemplateoffline		= $this->params->get('mtemplateoffline');
$setGeneratorTag		= $this->params->get('setGeneratorTag');
$showDate 				= $this->params->get('showDate');		
$showDiagnostics 		= $this->params->get('showDiagnostics');
$siteWidth				= $this->params->get('siteWidth');
$siteWidthType			= $this->params->get('siteWidthType');
$siteWidthUnit			= $this->params->get('siteWidthUnit');
$showPageLinks 			= $this->params->get('showPageLinks');
$useCustomStyleSheet 	= $this->params->get('useCustomStyleSheet');
$useStickyFooter 		= $this->params->get('useStickyFooter');
$useSubBodyClasses		= $this->params->get('useSubBodyClasses');

// Define absolute paths to files
$mdetectFile 			= JPATH_THEMES.'/'.$this->template.'/mobile/mdetect.php';
$mtemplateFile			= JPATH_THEMES.'/'.$this->template.'/mobile/'.$mtemplate;

// Change generatot tag
$this->setGenerator($setGeneratorTag);

// Load the MooTools JavaScript Library
if ($loadMoo) {
	JHTML::_('behavior.framework', true);
	if ($loadModal) {
		// Enable modal pop-ups - see html/mod_footer/default.php to customize
		JHTML::_('behavior.modal');
	}
}

#----------------------------- Moldule Counts -----------------------------#
// from http://forum.joomla.org/viewtopic.php?t=220574

$supraModuleCount = $this->countModules('supra1 + supra2 + supra3 + supra4', true);

if ($supraModuleCount) : $supraModuleClass = 'count-'.$supraModuleCount; endif;

#--------------------------------------------------------------------------#

$subHeadCount = $this->countModules('subhead1 + subhead2 + subhead3 + subhead4 + subhead5 + subhead6', true);

if ($subHeadCount) : $subHeadClass = 'count-'.$subHeadCount; endif;

#--------------------------------------------------------------------------#

$subNavCount = $this->countModules('user1 + user2 + user3 + user4', true);

if ($subNavCount) : $subNavClass = 'count-'.$subNavCount; endif;

#--------------------------------------------------------------------------#

$contentTopCount = $this->countModules('top1 + top2 + top3 + top4', true);

if ($contentTopCount) : $contentTopClass = 'count-'.$contentTopCount; endif;

#--------------------------------------------------------------------------#

$contentBottomCount = $this->countModules('user5 + user6 + user7 + user8', true);

if ($contentBottomCount) : $contentBottomClass = 'count-'.$contentBottomCount; endif;

#--------------------------------------------------------------------------#

$contentLeftCount = $this->countModules('left + left2', true);

if ($contentLeftCount) : $contentLeftClass = 'count-'.$contentLeftCount; endif;

#--------------------------------------------------------------------------#

$contentRightCount = $this->countModules('right + right2', true);

if ($contentRightCount) : $contentRightClass = 'count-'.$contentRightCount; endif;

#--------------------------------------------------------------------------#

$subContentCount = $this->countModules('sub1 + sub2 + sub3 + sub4 + sub5 + sub6', true);

if ($subContentCount) : $subContentClass = 'count-'.$subContentCount; endif;

#------------------------------ Column Layout -----------------------------#

$columnLayout= 'main-only';
	
if (($contentLeftCount > 0 ) && ($contentRightCount == 0)) :
	$columnLayout = 'left-'.$contentLeftCount.'-main';
elseif (($contentLeftCount > 0) && ($contentRightCount > 0)) :
	$columnLayout = 'left-'.$contentLeftCount.'-main-right-'.$contentRightCount;
elseif (($contentLeftCount == 0) && ($contentRightCount > 0)) :
	$columnLayout = 'main-right-'.$contentRightCount;
endif;
	
#-------------------------------- Item ID ---------------------------------#

$itemId = JRequest::getInt('Itemid', 0);

#------------------------------- Article ID -------------------------------#
// from http://forum.joomla.org/viewtopic.php?p=2046136#p2046136

$articleId = JRequest::getInt('id');

#------------------------------ Category ID -------------------------------#
// from http://forum.joomla.org/viewtopic.php?p=1837233#p1837233

$catId = JRequest::getInt('catid');

#--------------------------------- Alias ----------------------------------#
// based on http://forum.joomla.org/viewtopic.php?f=127&t=281999

$currentAlias = JSite::getMenu()->getActive()->alias;

#----------------------------- Component Name -----------------------------#

$currentComponent = JRequest::getCmd('option');

#--------------------------------------------------------------------------#
// inspired by suchitis at http://forum.joomla.org/viewtopic.php?p=1861458#p1861458

$templateIndex	= JPATH_THEMES.'/'.$this->template.'/layouts/index.php';
$componentIndex = JPATH_THEMES.'/'.$this->template.'/layouts/component/'.$currentComponent.'.php';
$categoryIndex 	= JPATH_THEMES.'/'.$this->template.'/layouts/category/category-'.$catId.'.php';
$itemIndex 		= JPATH_THEMES.'/'.$this->template.'/layouts/item/item-'.$itemId.'.php';
$articleIndex 	= JPATH_THEMES.'/'.$this->template.'/layouts/article/article-'.$articleId.'.php';
$componentCss 	= JPATH_THEMES.'/'.$this->template.'/css/component/'.$currentComponent.'.css';
$categoryCss 	= JPATH_THEMES.'/'.$this->template.'/css/category/category-'.$catId.'.css';
$itemCss 		= JPATH_THEMES.'/'.$this->template.'/css/item/item-'.$itemId.'.css';
$articleCss 	= JPATH_THEMES.'/'.$this->template.'/css/article/article-'.$articleId.'.css';

#--------------------------------------------------------------------------#
// dynamically adds specific style sheet if it exists

if(file_exists($articleCss)){
		$cssFile = $template.'/css/article/article-'.$articleId.'.css';}
elseif(file_exists($itemCss)){
		$cssFile = $template.'/css/item/item-'.$itemId.'.css';}
elseif(file_exists($categoryCss)){
		$cssFile = $template.'/css/category/category-'.$catId.'.css';}
elseif(file_exists($componentCss)){
		$cssFile = $template.'/css/component/'.$currentComponent.'.css';}		
else unset($cssFile);

#--------------------------------------------------------------------------#	

if(file_exists($articleIndex)){
		$alternateIndexFile = $articleIndex;}
elseif(file_exists($itemIndex)){
		$alternateIndexFile = $itemIndex;}
elseif(file_exists($categoryIndex)){
		$alternateIndexFile = $categoryIndex;}
elseif(file_exists($componentIndex)){
		$alternateIndexFile = $componentIndex;}	
elseif(file_exists($templateIndex)){
		$alternateIndexFile = $templateIndex;}		
else unset($alternateIndexFile);

#---------------------------- Head Elements --------------------------------#

// Custom tags
$doc->addCustomTag('<meta name="copyright" content="'.$app->getCfg('sitename').'" />');

// Transparent favicon
$doc->addFavicon($template.'/favicon.png', 'image/png','icon');

// Style sheets
$doc->addStyleSheet($template.'/css/screen.css','text/css','screen');
$doc->addStyleSheet($template.'/css/print.css','text/css','print');
if (($useCustomStyleSheet) && ($customStyleSheet !='-1'))
	$doc->addStyleSheet($template.'/css/'.$customStyleSheet,'text/css','screen');
if ($this->direction == 'rtl')
	$doc->addStyleSheet($template.'/css/rtl.css','text/css','screen');
if (isset($cssFile))
	$doc->addStyleSheet($cssFile,'text/css','screen');

// Style sheet switcher
if ($enableSwitcher) {
	$doc->addCustomTag('<link rel="alternate stylesheet" href="'.$template.'/css/diagnostic.css" type="text/css" media="screen" title="diagnostic" />');
	$doc->addCustomTag('<link rel="alternate stylesheet" href="'.$template.'/css/normal.css" type="text/css" media="screen" title="normal" />');
	$doc->addCustomTag('<link rel="alternate stylesheet" href="'.$template.'/css/wireframe.css" type="text/css" media="screen" title="wireframe" />');
	$doc->addScript($template.'/js/styleswitch.js');
}

// Typography
if ($googleHeaderFont != "") {
	$doc->addStyleSheet('http://fonts.googleapis.com/css?family='.$googleHeaderFont.'');
	$doc->addStyleDeclaration('  h1,h2,h3,h4,h5,h6{font-family:'.$googleHeaderFont.', serif !important}');
}

// JavaScript
$doc->addCustomTag("\n".'  <script type="text/javascript">window.addEvent(\'domready\',function(){new SmoothScroll({duration:1200},window);});</script>');
if ($loadjQuery)
	$doc->addScript('http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js');

// Layout Declarations
if ($siteWidth)
	$doc->addStyleDeclaration("\n".'  #body-container, #supra {'.$siteWidthType.':'.$siteWidth.$siteWidthUnit.' !important}');
if ($siteWidthType == 'max-width')
	$doc->addStyleDeclaration("\n".'  img, object {max-width:100%}');		
if (!$fullWidth)
	$doc->addStyleDeclaration("\n".'  #header, #footer {'.$siteWidthType.':'.$siteWidth.$siteWidthUnit.'; margin:0 auto}');
	
// Internet Explorer Fixes	
if ($IECSS3) {
  $doc->addCustomTag("\n".'  <!--[if !IE 9]>
  <style type="text/css">'.$IECSS3Targets.' {behavior:url("'.$baseUrl.'templates/'.$this->template.'/js/PIE.htc")}</style>
  <![endif]-->');
}
if ($useStickyFooter) {
	$doc->addCustomTag("\n".'  <!--[if lt IE 7]>
  <style type="text/css">body.sticky-footer #footer-push {display:table;height:100%}</style>
  <![endif]-->');
}
$doc->addCustomTag('<!--[if lt IE 7]>
  <link rel="stylesheet" href="'.$template.'/css/ie6.css" type="text/css" media="screen" />
  <style type="text/css">
  body {text-align:center}
  #body-container {text-align:left}');  
  if (!$fullWidth) {
  $doc->addCustomTag('#body-container, #supra, #header, #footer {width: expression( document.body.clientWidth >'.($siteWidth -1).' ? "'.$siteWidth.$siteWidthUnit.'" : "auto" );margin:0 auto}');
  }
  else {
  $doc->addCustomTag('#body-container, #supra {width: expression( document.body.clientWidth >'.($siteWidth -1).' ? "'.$siteWidth.$siteWidthUnit.'" : "auto" );margin:0 auto}');
  }
  $doc->addCustomTag('</style>');
  if ($IE6TransFix) {
  $doc->addCustomTag('  <script type="text/javascript" src="'.$template.'/js/DD_belatedPNG_0.0.8a-min.js"></script>
  <script>DD_belatedPNG.fix('.$IE6TransFixTargets.');</script>');
  }
  $doc->addCustomTag('<![endif]-->');