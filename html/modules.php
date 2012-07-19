<?php defined('_JEXEC') or die;
/**
 * @package        Template Framework for Joomla! 1.5
 * @author         Matt Thomas http://construct-framework.com | http://betweenbrain.com
 * @copyright      Copyright (C) 2009 - 2012 Matt Thomas. All rights reserved.
 * @license        GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 */

function modChrome_jexhtml($module, &$params, &$attribs)
{
	$id           = isset($attribs['id']) ? $attribs['id'] : null;
	$headerLevel  = isset($attribs['level']) ? (int)$attribs['level'] : 3;
	$headerClass  = isset($attribs['header-class']) ? $attribs['header-class'] : 'je-header';
	$moduleClass  = isset($attribs['module-class']) ? $attribs['module-class'] : NULL;
	$outlineStyle = isset($attribs['outline-style']) ? $attribs['outline-style'] : NULL;

	if (!empty($module->content)) : ?>
	<div <?php if ($id) echo 'id="' . $id . '"'; ?> class="moduletable<?php echo $params->get('moduleclass_sfx') ?><?php if ($moduleClass) echo ' ' . $moduleClass ?>">
		<?php if ($module->showtitle) {
		echo '<h' . $headerLevel . ' class="' . $headerClass . '">' . $module->title . '</h' . $headerLevel . '>';
		}
		echo $module->content ?>
	</div>
	<?php endif;
}

function modChrome_jerounded($module, &$params, &$attribs)
{
	$id           = isset($attribs['id']) ? $attribs['id'] : null;
	$headerLevel  = isset($attribs['level']) ? (int)$attribs['level'] : 3;
	$headerClass  = isset($attribs['header-class']) ? $attribs['header-class'] : 'je-header';
	$moduleClass  = isset($attribs['module-class']) ? $attribs['module-class'] : NULL;
	$roundedStyle = isset($attribs['rounded-style']) ? $attribs['rounded-style'] : NULL;

	if (!empty($module->content)) : ?>
	<div <?php if ($id) echo 'id="' . $id . '"'; ?> class="moduletable<?php echo $params->get('moduleclass_sfx') ?><?php if ($moduleClass) echo ' ' . $moduleClass ?><?php if ($roundedStyle) echo ' rounded-' . $roundedStyle;?>">
		<div>
			<div>
				<div>
					<?php if ($module->showtitle) {
					echo '<h' . $headerLevel . ' class="' . $headerClass . '">' . $module->title . '</h' . $headerLevel . '>';
					}
					echo $module->content ?>
				</div>
			</div>
		</div>
	</div>'
	<?php endif;
}