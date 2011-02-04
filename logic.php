<?php defined('_JEXEC') or die;
/**
* @package		Template Framework for Joomla! 1.5
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
// Define relative shortcut for current template directory
$template 				= 'templates/'.$this->template;
// Get the current URL
$url 					= clone(JURI::getInstance());
// To access the current user object
$user 					= JFactory::getUser();
// Get the current view
$view     				= JRequest::getCmd('view');

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
$googleWebFont 			= $this->params->get('googleWebFont');
$googleWebFontTargets	= $this->params->get('googleWebFontTargets');
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
$stickyFooterHeight		= $this->params->get('stickyFooterHeight');
$useCustomStyleSheet 	= $this->params->get('useCustomStyleSheet');
$useStickyFooter 		= $this->params->get('useStickyFooter');
$useSubBodyClasses		= $this->params->get('useSubBodyClasses');

// Define absolute paths to files
$mdetectFile 			= JPATH_THEMES.'/'.$this->template.'/mobile/mdetect.php';
$mtemplateFile			= JPATH_THEMES.'/'.$this->template.'/mobile/'.$mtemplate;

// Change generator tag
$this->setGenerator($setGeneratorTag);

// Enable Mootols
if ($loadMoo)
	JHTML::_('behavior.mootools');

// Enable modal pop-ups - see html/mod_footer/default.php to customize
if ( $loadMoo && $loadModal ) {	
	JHTML::_('behavior.modal');
}

// Remove MooTools if set to no.
if (!$loadMoo) {	
	$head = $this->getHeadData();	
	reset($head['scripts']);
	$moo = key($head['scripts']);	
	unset($head['scripts'][$moo]);		
	$this->setHeadData($head);	
}

// Fix Google Web Font name for CSS
$googleWebFontFamily 	= str_replace("+"," ",$googleWebFont);

// Get the name of the extended template override group
if ($useCustomStyleSheet)
$overrideGroup 			= str_replace(".css","",$customStyleSheet);

#----------------------------- Moldule Counts -----------------------------#
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

if ($view == 'article')
$articleId = JRequest::getInt('id');

#------------------------------- Section ID -------------------------------#

function getSection($iId) {
	  $database = &JFactory::getDBO();
	  if(JRequest::getCmd('view', 0) == "section") {
			return JRequest::getInt('id');
		}
	  elseif(JRequest::getCmd('view', 0) == "category") {
			$sql = "SELECT section FROM #__categories WHERE id = $iId ";
			$database->setQuery( $sql );
			$row = $database->loadResult();
			return $row;
		}
	  elseif(JRequest::getCmd('view', 0) == "article") {
			$temp = explode(":",JRequest::getInt('id'));
			$sql = "SELECT sectionid FROM #__content WHERE id = ".$temp[0];
			$database->setQuery( $sql );
			$row = $database->loadResult();
			return $row;
		}		
	}
	
$sectionId = getSection(JRequest::getInt('id'));

#------------------------------ Category ID -------------------------------#

function getCategory($iId) {
	$database = &JFactory::getDBO();
	  if(JRequest::getCmd('view', 0) == "section") {
			return null;
		}
	  elseif(JRequest::getCmd('view', 0) == "category") {
			return JRequest::getInt('id');
		}		
	  elseif(JRequest::getCmd('view', 0) == "article") {
			$temp = explode(":",JRequest::getInt('id'));
			$sql = "SELECT catid FROM #__content WHERE id = ".$temp[0];
			$database->setQuery( $sql );
			$row = $database->loadResult();
			return $row;
		}		
	}
	
$catId = getCategory(JRequest::getInt('id'));

#--------------------------------- Alias ----------------------------------#

$currentAlias = JSite::getMenu()->getActive()->alias;

#----------------------------- Component Name -----------------------------#

$currentComponent = JRequest::getCmd('option');

#--------------------------------------------------------------------------#

$templateGroupIndex		= JPATH_THEMES.'/'.$this->template.'/layouts/'.$overrideGroup.'-index.php';
$componentGroupIndex 	= JPATH_THEMES.'/'.$this->template.'/layouts/component/'.$overrideGroup.'-'.$currentComponent.'.php';
$sectionGroupIndex 		= JPATH_THEMES.'/'.$this->template.'/layouts/section/'.$overrideGroup.'-section-'.$sectionId.'.php';
$categoryGroupIndex 	= JPATH_THEMES.'/'.$this->template.'/layouts/category/'.$overrideGroup.'-category-'.$catId.'.php';
$itemGroupIndex 		= JPATH_THEMES.'/'.$this->template.'/layouts/item/'.$overrideGroup.'-item-'.$itemId.'.php';
$articleGroupIndex 		= JPATH_THEMES.'/'.$this->template.'/layouts/article/'.$overrideGroup.'-article-'.$articleId.'.php';
$componentGroupCss 		= JPATH_THEMES.'/'.$this->template.'/css/component/'.$overrideGroup.'-'.$currentComponent.'.css';
$sectionGroupCss 		= JPATH_THEMES.'/'.$this->template.'/css/section/'.$overrideGroup.'-section-'.$sectionId.'.css';
$categoryGroupCss 		= JPATH_THEMES.'/'.$this->template.'/css/category/'.$overrideGroup.'-category-'.$catId.'.css';
$itemGroupCss 			= JPATH_THEMES.'/'.$this->template.'/css/item/'.$overrideGroup.'-item-'.$itemId.'.css';
$articleGroupCss 		= JPATH_THEMES.'/'.$this->template.'/css/article/'.$overrideGroup.'-article-'.$articleId.'.css';

$templateIndex			= JPATH_THEMES.'/'.$this->template.'/layouts/index.php';
$componentIndex 		= JPATH_THEMES.'/'.$this->template.'/layouts/component/'.$currentComponent.'.php';
$sectionIndex 			= JPATH_THEMES.'/'.$this->template.'/layouts/section/section-'.$sectionId.'.php';
$categoryIndex 			= JPATH_THEMES.'/'.$this->template.'/layouts/category/category-'.$catId.'.php';
$itemIndex 				= JPATH_THEMES.'/'.$this->template.'/layouts/item/item-'.$itemId.'.php';
$articleIndex 			= JPATH_THEMES.'/'.$this->template.'/layouts/article/article-'.$articleId.'.php';
$componentCss 			= JPATH_THEMES.'/'.$this->template.'/css/component/'.$currentComponent.'.css';
$sectionCss 			= JPATH_THEMES.'/'.$this->template.'/css/section/section-'.$sectionId.'.css';
$categoryCss 			= JPATH_THEMES.'/'.$this->template.'/css/category/category-'.$catId.'.css';
$itemCss 				= JPATH_THEMES.'/'.$this->template.'/css/item/item-'.$itemId.'.css';
$articleCss 			= JPATH_THEMES.'/'.$this->template.'/css/article/article-'.$articleId.'.css';

#--------------------------------------------------------------------------#

if(file_exists($articleGroupCss)){
		$cssFile = $template.'/css/article/'.$overrideGroup.'-article-'.$articleId.'.css';}
elseif(file_exists($articleCss)){
		$cssFile = $template.'/css/article/article-'.$articleId.'.css';}
elseif(file_exists($itemGroupCss)){
		$cssFile = $template.'/css/item/'.$overrideGroup.'-item-'.$itemId.'.css';}		
elseif(file_exists($itemCss)){
		$cssFile = $template.'/css/item/item-'.$itemId.'.css';}
elseif(file_exists($categoryGroupCss)){
		$cssFile = $template.'/css/category/'.$overrideGroup.'-category-'.$catId.'.css';}
elseif(file_exists($categoryCss)){
		$cssFile = $template.'/css/category/category-'.$catId.'.css';}
elseif(file_exists($sectionGroupCss)){
		$cssFile = $template.'/css/section/'.$overrideGroup.'-section-'.$catId.'.css';}	
elseif(file_exists($sectionCss)){
		$cssFile = $template.'/css/section/section-'.$catId.'.css';}
elseif(file_exists($componentGroupCss)){
		$cssFile = $template.'/css/component/'.$overrideGroup.'-'.$currentComponent.'.css';}		
elseif(file_exists($componentCss)){
		$cssFile = $template.'/css/component/'.$currentComponent.'.css';}		
else unset($cssFile);

#--------------------------------------------------------------------------#	

if(file_exists($articleGroupIndex)){
		$alternateIndexFile = $articleGroupIndex;}
elseif(file_exists($articleIndex)){
		$alternateIndexFile = $articleIndex;}		
elseif(file_exists($itemGroupIndex)){
		$alternateIndexFile = $itemGroupIndex;}
elseif(file_exists($itemIndex)){
		$alternateIndexFile = $itemIndex;}		
elseif(file_exists($categoryGroupIndex)){
		$alternateIndexFile = $categoryGroupIndex;}
elseif(file_exists($categoryIndex)){
		$alternateIndexFile = $categoryIndex;}
elseif(file_exists($sectionGroupIndex)){
		$alternateIndexFile = $sectionGroupIndex;}
elseif(file_exists($sectionIndex)){
		$alternateIndexFile = $sectionIndex;}		
elseif(file_exists($componentGroupIndex)){
		$alternateIndexFile = $componentGroupIndex;}
elseif(file_exists($componentIndex)){
		$alternateIndexFile = $componentIndex;}	
elseif(file_exists($templateGroupIndex)){
		$alternateIndexFile = $templateGroupIndex;}
elseif(file_exists($templateIndex)){
		$alternateIndexFile = $templateIndex;}		
else unset($alternateIndexFile);

#---------------------------- Head Elements --------------------------------#

// Custom tags
$doc->addCustomTag('<meta name="copyright" content="'.$app->getCfg('sitename').'" />');

// Transparent favicon
$doc->addFavicon($template.'/favicon.png','image/png','icon');

// Style sheets
$doc->addStyleSheet($template.'/css/screen.css','text/css','screen');
$doc->addStyleSheet($template.'/css/overrides.css','text/css','screen');
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
	$doc->addCustomTag('<link rel="alternate stylesheet" href="'.$template.'/css/wireframe.css" type="text/css" media="screen" title="wireframe" />');
	$doc->addScript($template.'/js/styleswitch.js');
} 	

// Typography
if ($googleWebFont != "") {
	$doc->addStyleSheet('http://fonts.googleapis.com/css?family='.$googleWebFont.'');
	$doc->addStyleDeclaration('  '.$googleWebFontTargets.'{font-family:'.$googleWebFontFamily.', serif !important}');
}

// JavaScript
$doc->addCustomTag("\n".'  <script type="text/javascript">window.addEvent(\'domready\',function(){new SmoothScroll({duration:1200},window);});</script>');
if ($loadjQuery)
	$doc->addScript('http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js');

// Layout Declarations
if ($siteWidth)
	$doc->addStyleDeclaration("\n".'  #body-container, #supra {'.$siteWidthType.':'.$siteWidth.$siteWidthUnit.' !important}');
if (($siteWidthType == 'max-width') && $fluidMedia )
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
	$doc->addStyleDeclaration("\n".'  .sticky-footer #body-container{padding-bottom:'.$stickyFooterHeight.'px;}
  .sticky-footer #footer{margin-top:-'.$stickyFooterHeight.'px;height:'.$stickyFooterHeight.'px;}');
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