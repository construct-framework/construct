<?php defined('_JEXEC') or die;
/**
* @package		Template Framework for Joomla! 1.5
* @author		Joomla Engineering http://joomlaengineering.com
* @copyright	Copyright (C) 2010 Matt Thomas. All rights reserved.
* @license		GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
*/

/**
 * This is a file to add template specific chrome to module rendering.  To use it you would
 * set the style attribute for the given module(s) include in your template to use the style
 * for each given modChrome function.
 *
 * eg.  To render a module mod_test in the sliders style, you would use the following include:
 * <jdoc:include type="module" name="test" style="slider" />
 *
 * This gives template designers ultimate control over how modules are rendered.
 *
 * NOTICE: All chrome wrapping methods should be named: modChrome_{STYLE} and take the same
 * three arguments.
 */


/**
 * Inspired by beez custom module chrom. Renders the module in an xhtml style module, within a <div>
 * and the header in <h{x}> with a designated CSS class. The level of the header can be configured 
 * through a 'headerLevel' attribute of the <jdoc:include /> tag. For	example: 
 * <jdoc:include type="modules" name="left" style="jexhtml" level="2" header-class="high-contrast" module-class="grey"/>
 * Defaults to <h3 class="je-header"> if none is designated.
 */
?>
<?php	function modChrome_jexhtml( $module, &$params, &$attribs )  
	{
	$headerLevel = isset($attribs['level']) ? (int) $attribs['level'] : 3;
	$headerClass = isset($attribs['header-class']) ? $attribs['header-class'] : 'je-header';
	$moduleClass = isset($attribs['module-class']) ? $attribs['module-class'] : '';
	$outlineStyle = isset($attribs['outline-style']) ? $attribs['outline-style'] : '';
	if (!empty($module->content))
		{ ?>
		<div class="moduletable<?php echo $params->get('moduleclass_sfx'); ?><?php if(!empty($moduleClass)){echo ' '.$moduleClass;} ?><?php if(!empty($outlineStyle)){echo ' outline-'.$outlineStyle;} ?> clearfix">		
			<?php if ($module->showtitle) : ?>
				<h<?php echo $headerLevel; ?> class="<?php echo $headerClass; ?>"><?php echo $module->title; ?><?php echo '</h'.$headerLevel; ?>>
			<?php endif; ?>
			<?php echo $module->content; ?>	
		</div>						

<?php	}
	}	
?>

<?php	function modChrome_jerounded( $module, &$params, &$attribs )  
	{
	$headerLevel = isset($attribs['level']) ? (int) $attribs['level'] : 3;
	$headerClass = isset($attribs['header-class']) ? $attribs['header-class'] : 'je-header';
	$moduleClass = isset($attribs['module-class']) ? $attribs['module-class'] : '';
	$roundedStyle = isset($attribs['rounded-style']) ? $attribs['rounded-style'] : '';	
	if (!empty($module->content))
		{ ?>
		<div class="moduletable<?php echo $params->get('moduleclass_sfx'); ?><?php if(!empty($moduleClass)){echo ' '.$moduleClass;} ?><?php if(!empty($roundedStyle)){echo ' rounded-'.$roundedStyle;} ?>">
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