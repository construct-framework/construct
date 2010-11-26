<?php defined('_JEXEC') or die;
/**
* @package		Template Framework for Joomla! 1.5
* @author		Joomla Engineering http://joomlaengineering.com
* @copyright	Copyright (C) 2010 Matt Thomas | Joomla Engineering. All rights reserved.
* @license		GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
*/

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
// from http://forum.joomla.org/viewtopic.php?p=1425983#p1425983

function getSection($iId) {
	  $database = &JFactory::getDBO();
	  if(Jrequest::getCmd('view', 0) == "section") {
			return JRequest::getInt('id');
	  	}
	  elseif(Jrequest::getCmd('view', 0) == "category") {
			$sql = "SELECT section FROM #__categories WHERE id = $iId ";
			$database->setQuery( $sql );
			$row=$database->loadResult();
			return $row;
	  	}
	  elseif(Jrequest::getCmd('view', 0) == "article") {
			$temp=explode(":",JRequest::getInt('id'));
			$sql = "SELECT sectionid FROM #__content WHERE id = ".$temp[0];
			$database->setQuery( $sql );
			$row=$database->loadResult();
			return $row;
	  	}		
	}
$sectionId=getSection(JRequest::getInt('id'));

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
$sectionIndex 	= JPATH_THEMES.'/'.$this->template.'/layouts/section/section-'.$sectionId.'.php';
$categoryIndex 	= JPATH_THEMES.'/'.$this->template.'/layouts/category/category-'.$catId.'.php';
$itemIndex 		= JPATH_THEMES.'/'.$this->template.'/layouts/item/item-'.$itemId.'.php';
$articleIndex 	= JPATH_THEMES.'/'.$this->template.'/layouts/article/article-'.$articleId.'.php';
$componentCss 	= JPATH_THEMES.'/'.$this->template.'/component/'.$currentComponent.'.css';
$sectionCss 	= JPATH_THEMES.'/'.$this->template.'/section/section-'.$sectionId.'.css';
$categoryCss 	= JPATH_THEMES.'/'.$this->template.'/category/category-'.$catId.'.css';
$itemCss 		= JPATH_THEMES.'/'.$this->template.'/item/item-'.$itemId.'.css';
$articleCss 	= JPATH_THEMES.'/'.$this->template.'/article/article-'.$articleId.'.css';

#--------------------------------------------------------------------------#
// dynamically adds specific style sheet if it exists

if(file_exists($articleCss)){
		$cssFile = '<link rel="stylesheet" href="templates/'.$this->template.'/article/article-'.$articleId.'.css" type="text/css" media="screen" />';}
elseif(file_exists($itemCss)){
		$cssFile = '<link rel="stylesheet" href="templates/'.$this->template.'/item/item-'.$itemId.'.css" type="text/css" media="screen" />';}
elseif(file_exists($categoryCss)){
		$cssFile = '<link rel="stylesheet" href="templates/'.$this->template.'/category/category-'.$catId.'.css" type="text/css" media="screen" />';}
elseif(file_exists($sectionCss)){
		$cssFile = '<link  rel="stylesheet" href="templates/'.$this->template.'/section/section-'.$sectionId.'.css" type="text/css" media="screen" />';}
elseif(file_exists($componentCss)){
		$cssFile = '<link  rel="stylesheet" href="templates/'.$this->template.'/component/'.$currentComponent.'.css" type="text/css" media="screen" />';}		
else unset($cssFile);

#--------------------------------------------------------------------------#	

if(file_exists($articleIndex)){
		$alternateIndexFile = $articleIndex;}
elseif(file_exists($itemIndex)){
		$alternateIndexFile = $itemIndex;}
elseif(file_exists($categoryIndex)){
		$alternateIndexFile = $categoryIndex;}
elseif(file_exists($sectionIndex)){
		$alternateIndexFile = $sectionIndex;}
elseif(file_exists($componentIndex)){
		$alternateIndexFile = $componentIndex;}
elseif(file_exists($templateIndex)){
		$alternateIndexFile = $templateIndex;}
else unset($alternateIndexFile);