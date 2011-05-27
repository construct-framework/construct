<?php defined('_JEXEC') or die;
/**
* @package		Template Framework for Joomla! 1.6
* @author		Joomla Engineering http://joomlaengineering.com
* @copyright	Copyright (C) 2010, 2011 Matt Thomas | Joomla Engineering. All rights reserved.
* @license		GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
*/

// Load template logic
$logicFile 				= JPATH_THEMES.'/'.$this->template.'/logic.php';
if(file_exists($logicFile)) include $logicFile;

// Mobile device detection
$mTemplate				= JPATH_THEMES.'/'.$this->template.'/mobile-offline.php';
$alternatemTemplate		= JPATH_THEMES.'/'.$this->template.'/layouts/mobile-offline.php';

// Initialize mobile device detection
if(file_exists($mdetectFile)) include_once $mdetectFile;
$uagent_obj 			= new uagent_info();
$isMobile 				= $uagent_obj->DetectMobileLong();
$isTablet				= $uagent_obj->DetectTierTablet();
// Check if mobile device detecion is turned on and test if visitor is a mobile device. If so, load mobile sub-template
if (( $mdetect && $isMobile ) || ( $mdetect && $detectTablets && $isTablet )) {
	if(file_exists($alternatemTemplate)) include_once $alternatemTemplate;
	elseif(file_exists($mTemplate)) include_once $mTemplate;
}
else {
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
<head>
<jdoc:include type="head" />
</head>

<body class="<?php echo $columnLayout; if($useStickyFooter) echo ' sticky-footer'; echo ' '.$currentComponent; if($articleId) echo ' article-'.$articleId; if ($itemId) echo ' item-'.$itemId; if($catId) echo ' category-'.$catId; if($sectionId) echo ' section-'.$sectionId; ?>">

<?php if ($this->countModules('analytics')) : ?>
	<jdoc:include type="modules" name="analytics" />
<?php endif; ?>

	<div id="footer-push">
		<a id="page-top" name="page-top"></a>

		<?php if ($supraModuleCount) : ?>
			<div id="supra" class="clearfix">						
				<?php if ($this->countModules('supra1')) : ?>
					<div id="supra1" class="<?php echo $supraModuleClass ?>">
						
					</div><!-- end supra1 -->								
				<?php endif; ?>		   
				<?php if ($this->countModules('supra2')) : ?>
					<div id="supra2" class="<?php echo $supraModuleClass ?>">
						
					</div><!-- end supra2 -->								
				<?php endif; ?>				
				<?php if ($this->countModules('supra3')) : ?>
					<div id="supra3" class="<?php echo $supraModuleClass ?>">
						
					</div><!-- end supra3 -->								
				<?php endif; ?>				
				<?php if ($this->countModules('supra4')) : ?>
					<div id="supra4" class="<?php echo $supraModuleClass ?>">
						
					</div><!-- end supra4 -->								
				<?php endif; ?>						
			</div><!-- end supra -->
		<?php endif; ?>	
	
		<div id="header" class="clear clearfix">
			<div class="gutter clearfix">

				<div class="date-container">
					<span class="date-weekday"><?php	$now = &JFactory::getDate(); echo $now->toFormat('%A').','; ?></span>
					<span class="date-month"><?php 		$now = &JFactory::getDate(); echo $now->toFormat('%B'); ?></span>
					<span class="date-day"><?php 		$now = &JFactory::getDate(); echo $now->toFormat('%d').','; ?></span>
					<span class="date-year"><?php 		$now = &JFactory::getDate(); echo $now->toFormat('%Y'); ?></span>
				</div>

	
				
				<?php if ($showDiagnostics) : ?>
					<ul id="diagnostics">
						<li><?php echo $currentComponent; ?></li>
						<li><?php if($articleId)	echo 'article-'.$articleId; ?></li>
						<li><?php if($itemId)		echo 'item-'.$itemId; ?></li>
						<li><?php if($catId)		echo 'category-'.$catId; ?></li>
						<li><?php if($sectionId) 	echo 'section-'.$sectionId; ?></li>
						<li><?php if($view)			echo $view.' view'; ?></i>
					</ul>
				<?php endif; ?>	

				<h1 id="logo"><a href="<?php echo $this->baseurl ?>/" title="<?php echo $app->getCfg('sitename');?>"><?php echo $app->getCfg('sitename');?></a></h1>
				
				<?php if ($this->countModules('header')) : ?>
					<jdoc:include type="modules" name="header" style="jexhtml" />	
				<?php endif; ?>		
										
				<ul id="access">
					<li>Jump to:</li>
					<li><a href="<?php $url->setFragment('content'); echo $url->toString();?>" class="to-content">Content</a></li>					
					<?php if ($this->countModules('nav')) : ?>
						<li><a href="<?php $url->setFragment('nav'); echo $url->toString();?>" class="to-nav">Navigation</a></li>
					<?php endif; ?>					
					<?php if ($contentBottomCount) : ?>
						<li><a href="<?php $url->setFragment('additional'); echo $url->toString();?>" class="to-additional">Additional Information</a></li>
					<?php endif; ?>
				</ul>				
				
				<?php if ($enableSwitcher) : ?>
					<ul id="style-switch">
						<li class="narrow"><a href="#" onclick="setActiveStyleSheet('diagnostic'); return false;" title="Diagnostic">Diagnostic Mode</a></li>
						<li class="wide"><a href="#" onclick="setActiveStyleSheet('normal'); return false;" title="Normal">Normal Mode</a></li>
					</ul>
				<?php endif; ?>	

			</div><!--end gutter -->
		</div><!-- end header-->
		   
		<div id="body-container">

			<?php if ($subHeadCount) : ?>
				<div id="sub-header" class="clearfix">						
					<?php if ($this->countModules('subhead1')) : ?>
						<div id="subhead1" class="<?php echo $subHeadClass ?>">
							
						</div><!-- end head -->								
					<?php endif; ?>			   
					<?php if ($this->countModules('subhead2')) : ?>
						<div id="subhead2" class="<?php echo $subHeadClass ?>">
							
						</div><!-- end subhead2 -->
					<?php endif; ?>					
					<?php if ($this->countModules('subhead3')) : ?>
						<div id="subhead3" class="<?php echo $subHeadClass ?>">
							
						</div><!-- end subhead3 -->
					<?php endif; ?>					
					<?php if ($this->countModules('subhead4')) : ?>
						<div id="subhead4" class="<?php echo $subHeadClass ?>">
							
						</div><!-- end subhead4 -->
					<?php endif; ?>					
					<?php if ($this->countModules('subhead5')) : ?>
						<div id="subhead5" class="<?php echo $subHeadClass ?>">
							
						</div><!-- end subhead5 -->
					<?php endif; ?>					
					<?php if ($this->countModules('subhead6')) : ?>
						<div id="subhead6" class="<?php echo $subHeadClass ?>">
							
						</div><!-- end subhead6 -->
					<?php endif; ?>											
				</div><!-- end sub-header -->
			<?php endif; ?>
		
			<?php if ($this->countModules('breadcrumbs')) : ?>		
				<div id="breadcrumbs">
					
				</div>				
			<?php endif; ?>		
			
			<?php if ($this->countModules('nav')) : ?>
				<div id="nav" class="clear clearfix">
					
				</div><!-- end nav-->
			<?php endif; ?>
	  
			<div id="content-container" class="clear clearfix">    

				<?php if ($subNavCount) : ?>
					<div id="sub-nav" class="clearfix">						
						<?php if ($this->countModules('user1')) : ?>
							<div id="user1" class="<?php echo $subNavClass ?>">
								
							</div><!-- end user1 -->								
						<?php endif; ?>
				   
						<?php if ($this->countModules('user2')) : ?>
							<div id="user2" class="<?php echo $subNavClass ?>">
								
							</div><!-- end user2 -->
						<?php endif; ?>
						
						<?php if ($this->countModules('user3')) : ?>
							<div id="user3" class="<?php echo $subNavClass ?>">
								
							</div><!-- end user3 -->
						<?php endif; ?>
						
						<?php if ($this->countModules('user4')) : ?>
							<div id="user4" class="<?php echo $subNavClass ?>">
								
							</div><!-- end user4 -->
						<?php endif; ?>						
					</div><!-- end sub-nav -->
				<?php endif; ?>
			
				<div id="load-first" class="clearfix">
					<a id="content" name="content"></a>     
					<div id="content-main">
						<div class="gutter">
						
							<?php if ($contentTopCount) : ?>
								<div id="content-top" class="clearfix">						
									<?php if ($this->countModules('top')) : ?>
										<div id="top" class="<?php echo $contentTopClass ?>">
											
										</div><!-- end top -->								
									<?php endif; ?>
							
									<?php if ($this->countModules('top2')) : ?>
										<div id="top2" class="<?php echo $contentTopClass ?>">
											
										</div><!-- end top2 -->
									<?php endif; ?>
									
									<?php if ($this->countModules('top3')) : ?>
										<div id="top3" class="<?php echo $contentTopClass ?>">
											
										</div><!-- end top3 -->
									<?php endif; ?>
									
									<?php if ($this->countModules('top4')) : ?>
										<div id="top4" class="<?php echo $contentTopClass ?>">
											
										</div><!-- end top4 -->
									<?php endif; ?>						
								</div><!-- end content-top -->
							<?php endif; ?>
							
							<div id="offline">
								<?php if ($this->countModules('offline')) : ?>								
										<jdoc:include type="modules" name="offline" style="jexhtml" />								
								<?php endif; ?>	
					  
								<?php if ($this->getBuffer('message')) : ?>
									<jdoc:include type="message" />
								<?php endif; ?>	
																
								<h3><?php echo $app->getCfg('offline_message'); ?></h3>
								<?php if(JPluginHelper::isEnabled('authentication', 'openid')) : ?>
								<?php JHTML::_('script', 'openid.js'); ?>
								<?php endif; ?>
									<form action="index.php" method="post" name="login" id="form-login">
										<fieldset class="input">								
											<label id="form-login-username" for="username"><?php echo JText::_('Username') ?>
												<input name="username" id="username" type="text" class="inputbox" alt="<?php echo JText::_('Username') ?>" size="18" />
											</label>
											<label id="form-login-password" for="passwd"><?php echo JText::_('Password') ?>
												<input type="password" name="passwd" class="inputbox" size="18" alt="<?php echo JText::_('Password') ?>" id="passwd" />
											</label>
											<label id="form-login-remember" for="remember"><?php echo JText::_('Remember me') ?>
												<input type="checkbox" name="remember" class="inputbox" value="yes" alt="<?php echo JText::_('Remember me') ?>" id="remember" />
											</label>
											<input type="submit" name="Submit" class="button" value="<?php echo JText::_('LOGIN') ?>" />
										</fieldset>
										<input type="hidden" name="option" value="com_user" />
										<input type="hidden" name="task" value="login" />
										<input type="hidden" name="return" value="<?php echo base64_encode(JURI::base()) ?>" />
										<?php echo JHTML::_( 'form.token' ); ?>
									</form>
								</div><!--end offline-->
								
						<?php if ($contentBottomCount) : ?>
								<div id="content-bottom" class="clearfix">						
									<?php if ($this->countModules('user5')) : ?>
										<div id="user5" class="<?php echo $contentBottomClass ?>">
											
										</div><!-- end user5 -->								
									<?php endif; ?>
						
									<?php if ($this->countModules('user6')) : ?>
										<div id="user6" class="<?php echo $contentBottomClass ?>">
											
										</div><!-- end user6 -->
									<?php endif; ?>
									
									<?php if ($this->countModules('user7')) : ?>
										<div id="user7" class="<?php echo $contentBottomClass ?>">
											
										</div><!-- end user7 -->
									<?php endif; ?>
									
									<?php if ($this->countModules('user8')) : ?>
										<div id="user8" class="<?php echo $contentBottomClass ?>">
											
										</div><!-- end user8 -->
									<?php endif; ?>						
								</div><!-- end content-bottom -->
							<?php endif; ?>
						 
						</div><!--end gutter -->        
					</div><!-- end content-main -->
					
					<?php if ($contentLeftCount) : ?>
						<div id="content-left" class="clearfix">
							<div class="gutter clearfix">						
								<?php if ($this->countModules('left')) : ?>
									<div id="left" class="<?php echo $contentLeftClass ?>">
										
									</div><!-- end left -->								
								<?php endif; ?>			   
								<?php if ($this->countModules('left2')) : ?>
									<div id="left2" class="<?php echo $contentLeftClass ?>">
										
									</div><!-- end left2 -->
								<?php endif; ?>	
							</div><!--end gutter -->
						</div><!-- end left -->
					<?php endif; ?>

				</div><!-- end load-first -->
		
					<?php if ($contentRightCount) : ?>
						<div id="content-right" class="clearfix">
							<div class="gutter clearfix">						
								<?php if ($this->countModules('right')) : ?>
									<div id="content-right-1" class="<?php echo $contentRightClass ?>">
										
									</div><!-- end right -->								
								<?php endif; ?>			   
								<?php if ($this->countModules('right2')) : ?>
									<div id="right2" class="<?php echo $contentRightClass ?>">
										
									</div><!-- end right2 -->
								<?php endif; ?>	
							</div><!--end gutter -->
						</div><!-- end right -->
					<?php endif; ?>
			
				<?php if ($subContentCount) : ?>
					<div id="sub-content" class="clearfix">						
						<?php if ($this->countModules('sub1')) : ?>
							<div id="sub1" class="<?php echo $subContentClass ?>">
								
							</div><!-- end sub1 -->								
						<?php endif; ?>			   
						<?php if ($this->countModules('sub2')) : ?>
							<div id="sub2" class="<?php echo $subContentClass ?>">
								
							</div><!-- end sub2 -->
						<?php endif; ?>					
						<?php if ($this->countModules('sub3')) : ?>
							<div id="sub3" class="<?php echo $subContentClass ?>">
								
							</div><!-- end sub3 -->
						<?php endif; ?>					
						<?php if ($this->countModules('sub4')) : ?>
							<div id="sub4" class="<?php echo $subContentClass ?>">
								
							</div><!-- end sub4 -->
						<?php endif; ?>					
						<?php if ($this->countModules('sub5')) : ?>
							<div id="sub5" class="<?php echo $subContentClass ?>">
								<jdoc:include type="modules" name="sub5" style="jexhtml" module-class="gutter" />
							</div><!-- end sub5 -->
						<?php endif; ?>						
						<?php if ($this->countModules('sub6')) : ?>
							<div id="sub6" class="<?php echo $subContentClass ?>">
								
							</div><!-- end sub6 -->
						<?php endif; ?>											
					</div><!-- end sub-content -->
				<?php endif; ?>

			</div><!-- end content-container -->
		</div><!-- end body-container -->
	</div><!-- end footer-push -->
    
	<div id="footer" class="clear clearfix">
		<div class="gutter clearfix">			
			
			<a id="to-page-top" href="<?php $url->setFragment('page-top'); echo $url->toString();?>" class="to-additional">Back to Top</a>

			<?php if ($this->countModules('syndicate')) : ?>			
			<div id="syndicate">
				
			</div>
			<?php endif; ?>

			<?php if ($this->countModules('footer')) : ?>
				<jdoc:include type="modules" name="footer" style="jexhtml" />
			<?php endif; ?>

		</div><!--end gutter -->
	</div><!-- end footer -->

	<?php if ($this->countModules('debug')) : ?>
		<jdoc:include type="modules" name="debug" style="raw" />
	<?php endif; ?>
	
	<?php if ($this->countModules('analytics')) : ?>
		<jdoc:include type="modules" name="analytics" />
	<?php endif; ?>	  
	
	</body>
</html>
<?php }