<?php defined('_JEXEC') or die;
/**
* @package		Template Framework for Joomla! 1.6
* @author		Joomla Engineering http://joomlaengineering.com
* @copyright	Copyright (C) 2010 Matt Thomas | Joomla Engineering. All rights reserved.
* @license		GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
*/
?>
<?php function modChrome_jexhtml( $module, &$params, &$attribs ) {
	
	$headerLevel = isset($attribs['level']) ? (int) $attribs['level'] : 3;
	$headerClass = isset($attribs['header-class']) ? $attribs['header-class'] : 'je-header';
	$moduleClass = isset($attribs['module-class']) ? $attribs['module-class'] : null;
	if (!empty($module->content)){ ?>
		<div class="moduletable<?php echo $params->get('moduleclass_sfx'); ?> <?php if($moduleClass) echo $moduleClass; ?>">		
			<?php if ($module->showtitle) : ?>
				<h<?php echo $headerLevel; ?> class="<?php echo $headerClass; ?>"><?php echo $module->title; ?><?php echo '</h'.$headerLevel; ?>>
			<?php endif; ?>
			<?php echo $module->content; ?>	
		</div>						

<?php	}
	}
?>	
	
<?php function modChrome_jerounded( $module, &$params, &$attribs ) {
	$headerLevel = isset($attribs['level']) ? (int) $attribs['level'] : 3;
	$headerClass = isset($attribs['header-class']) ? $attribs['header-class'] : 'je-header';
	$moduleClass = isset($attribs['module-class']) ? $attribs['module-class'] : null;
	if (!empty($module->content))
		{ ?>
		<div class="moduletable<?php echo $params->get('moduleclass_sfx'); ?> <?php if($moduleClass) echo $moduleClass; ?>">
			<div>
				<div>
					<div>		 
					<?php if ($module->showtitle) : ?>
						<h<?php echo $headerLevel; ?> class="<?php echo $headerClass; ?>"><?php echo $module->title; ?><?php echo '</h'.$headerLevel; ?>>
					<?php endif; ?>
					<?php echo $module->content; ?>
					</div>
				</div>
			</div>
		</div>						

<?php	}
	}			
?>