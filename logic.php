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

// Remove MooTools if set to no.
if (!$loadMoo) {	
	$head = $this->getHeadData();	
	reset($head['scripts']);
	$moo = key($head['scripts']);	
	unset($head['scripts'][$moo]);		
	$this->setHeadData($head);	
}

// Enable modal pop-ups - see html/mod_footer/default.php to customize
if ( loadMoo && $loadModal ) {	
	JHTML::_('behavior.modal');
}

#---------------------------- Head Elements --------------------------------#

// Custom tags
$doc->addCustomTag('<meta name="copyright" content="'.$app->getCfg('sitename').'" />');
$doc->addCustomTag('<meta http-equiv="Content-Type" content="text/html;charset='.$this->_charset.'" />');

// Transparent favicon
$doc->addFavicon($template.'/favicon.png', 'image/png','icon');

// Style sheets
$doc->addStyleSheet($template.'/css/screen.css','text/css','screen');
$doc->addStyleSheet($template.'/css/overrides.css','text/css','screen');
$doc->addStyleSheet($template.'/css/print.css','text/css','print');
if (($useCustomStyleSheet) && ($customStyleSheet !='-1'))
	$doc->addStyleSheet($template.'/css/'.$customStyleSheet,'text/css','screen');
if ($this->direction == 'rtl')
	$doc->addStyleSheet($template.'/css/rtl.css','screen');
if (isset($cssFile))
	$doc->addStyleSheet($cssFile,'screen');

// Style sheet switcher
if ($enableSwitcher) {
	$attribs = array('title' => 'diagnostic', 'rel' => 'alternate stylesheet'); 
	$doc->addStyleSheet($template.'/css/diagnostic.css','text/css','screen',$attribs);
	$attribs = array('title' => 'normal', 'rel' => 'alternate stylesheet');
	$doc->addStyleSheet($template.'/css/normal.css','text/css','screen',$attribs);
	$attribs = array('title' => 'wireframe', 'rel' => 'alternate stylesheet'); 	
	$doc->addStyleSheet($template.'/css/wireframe.css','text/css','screen',$attribs);
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
	$doc->addCustomTag("\n".'  <!--[if !IE 7]>
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

#--------------------------------------------------------------------------#
// from http://groups.google.com/group/joomla-dev-general/browse_thread/thread/b54f3f131dd173d

$supraCount1 = (int) ($this->countModules('supra1') > 0);
$supraCount2 = (int) ($this->countModules('supra2') > 0);
$supraCount3 = (int) ($this->countModules('supra3') > 0);
$supraCount4 = (int) ($this->countModules('supra4') > 0);

$supraModuleCount = $supraCount1 + $supraCount2 + $supraCount3 + $supraCount4;

if ($supraModuleCount) : $supraModuleClass = 'count-'.$supraModuleCount; endif;

#--------------------------------------------------------------------------#

$subHeadCount1 = (int) ($this->countModules('subhead1') > 0);
$subHeadCount2 = (int) ($this->countModules('subhead2') > 0);
$subHeadCount3 = (int) ($this->countModules('subhead3') > 0);
$subHeadCount4 = (int) ($this->countModules('subhead4') > 0);
$subHeadCount5 = (int) ($this->countModules('subhead5') > 0);
$subHeadCount6 = (int) ($this->countModules('subhead6') > 0);

$subHeadCount = $subHeadCount1 + $subHeadCount2 + $subHeadCount3 + $subHeadCount4 + $subHeadCount5 + $subHeadCount6;

if ($subHeadCount) : $subHeadClass = 'count-'.$subHeadCount; endif;

#--------------------------------------------------------------------------#

$subNavCount1 = (int) ($this->countModules('user1') > 0);
$subNavCount2 = (int) ($this->countModules('user2') > 0);
$subNavCount3 = (int) ($this->countModules('user3') > 0);
$subNavCount4 = (int) ($this->countModules('user4') > 0);

$subNavCount = $subNavCount1 + $subNavCount2 + $subNavCount3 + $subNavCount4;

if ($subNavCount) : $subNavClass = 'count-'.$subNavCount; endif;

#--------------------------------------------------------------------------#

$contentTopCount1 = (int) ($this->countModules('top') > 0);
$contentTopCount2 = (int) ($this->countModules('top2') > 0);
$contentTopCount3 = (int) ($this->countModules('top3') > 0);
$contentTopCount4 = (int) ($this->countModules('top4') > 0);

$contentTopCount = $contentTopCount1 + $contentTopCount2 + $contentTopCount3 + $contentTopCount4;

if ($contentTopCount) : $contentTopClass = 'count-'.$contentTopCount; endif;

#--------------------------------------------------------------------------#

$contentBottomCount1 = (int) ($this->countModules('user5') > 0);
$contentBottomCount2 = (int) ($this->countModules('user6') > 0);
$contentBottomCount3 = (int) ($this->countModules('user7') > 0);
$contentBottomCount4 = (int) ($this->countModules('user8') > 0);

$contentBottomCount = $contentBottomCount1 + $contentBottomCount2 + $contentBottomCount3 + $contentBottomCount4;

if ($contentBottomCount) : $contentBottomClass = 'count-'.$contentBottomCount; endif;

#--------------------------------------------------------------------------#

$contentLeftCount1 = (int) ($this->countModules('left') > 0);
$contentLeftCount2 = (int) ($this->countModules('left2') > 0);

$contentLeftCount = $contentLeftCount1 + $contentLeftCount2;

if ($contentLeftCount) : $contentLeftClass = 'count-'.$contentLeftCount; endif;

#--------------------------------------------------------------------------#

$contentRightCount1 = (int) ($this->countModules('right') > 0);
$contentRightCount2 = (int) ($this->countModules('right2') > 0);

$contentRightCount = $contentRightCount1 + $contentRightCount2;

if ($contentRightCount) : $contentRightClass = 'count-'.$contentRightCount; endif;

#--------------------------------------------------------------------------#

$subContentCount1 = (int) ($this->countModules('sub1') > 0);
$subContentCount2 = (int) ($this->countModules('sub2') > 0);
$subContentCount3 = (int) ($this->countModules('sub3') > 0);
$subContentCount4 = (int) ($this->countModules('sub4') > 0);
$subContentCount5 = (int) ($this->countModules('sub5') > 0);
$subContentCount6 = (int) ($this->countModules('sub6') > 0);

$subContentCount = $subContentCount1 + $subContentCount2 + $subContentCount3 + $subContentCount4 + $subContentCount5 + $subContentCount6;

if ($subContentCount) : $subContentClass = 'count-'.$subContentCount; endif;

#--------------------------------------------------------------------------#

$columnLayout= 'main-only';
	
if (($contentLeftCount > 0 ) && ($contentRightCount == 0)) :
	$columnLayout = 'left-'.$contentLeftCount.'-main';
elseif (($contentLeftCount > 0) && ($contentRightCount > 0)) :
	$columnLayout = 'left-'.$contentLeftCount.'-main-right-'.$contentRightCount;
elseif (($contentLeftCount == 0) && ($contentRightCount > 0)) :
	$columnLayout = 'main-right-'.$contentRightCount;
endif;
	
#--------------------------------------------------------------------------#

$itemId = JRequest::getInt('Itemid', 0);

#--------------------------------------------------------------------------#
// from http://forum.joomla.org/viewtopic.php?p=2046136#p2046136

$articleId = JRequest::getInt('id');

#--------------------------------------------------------------------------#

// from http://forum.joomla.org/viewtopic.php?p=1837233#p1837233

$catId = JRequest::getInt('catid');

#--------------------------------------------------------------------------#
// based on http://forum.joomla.org/viewtopic.php?f=127&t=281999

$currentAlias = JSite::getMenu()->getActive()->alias;

#--------------------------------------------------------------------------#

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
		$cssFile = '<link rel="stylesheet" href="templates/'.$this->template.'/css/article/article-'.$articleId.'.css" type="text/css" media="screen" />';}
elseif(file_exists($itemCss)){
		$cssFile = '<link rel="stylesheet" href="templates/'.$this->template.'/css/item/item-'.$itemId.'.css" type="text/css" media="screen" />';}
elseif(file_exists($categoryCss)){
		$cssFile = '<link rel="stylesheet" href="templates/'.$this->template.'/css/category/category-'.$catId.'.css" type="text/css" media="screen" />';}
elseif(file_exists($componentCss)){
		$cssFile = '<link  rel="stylesheet" href="templates/'.$this->template.'/css/component/'.$currentComponent.'.css" type="text/css" media="screen" />';}		
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