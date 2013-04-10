<?php defined('_JEXEC') or die;
/**
 * @package        Template Framework for Joomla! 1.5
 * @author         Matt Thomas http://construct-framework.com | http://betweenbrain.com
 * @copyright      Copyright (C) 2009 - 2012 Matt Thomas. All rights reserved.
 * @license        GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 */

function getTopLevelMenuTitle($module)
{
	$app    = JFactory::getApplication();
	$menu   = $app->getMenu();
	$active = ($menu->getActive()) ? $menu->getActive() : $menu->getDefault();
	$items  = $menu->getItems('id', $active->tree[0]);
	return (count($items) == 1) ? $items[0]->title : $module->title;
}

function dynamicMenuTitle($module, $params)
{
	$isDynamic = strpos($params->get('moduleclass_sfx'), 'dynamic');
	if ($isDynamic) {
		$moduleTitle = getTopLevelMenuTitle($module);
	} else {
		$moduleTitle = $module->title;
	}
	return $moduleTitle;
}

function modChrome_jexhtml($module, &$params, &$attribs)
{
	$id           = isset($attribs['id']) ? $attribs['id'] : NULL;
	$headerLevel  = isset($attribs['level']) ? (int)$attribs['level'] : 3;
	$headerClass  = isset($attribs['header-class']) ? $attribs['header-class'] : 'je-header';
	$moduleClass  = isset($attribs['module-class']) ? $attribs['module-class'] : NULL;
	$moduleTitle  = dynamicMenuTitle($module, $params);
	$outlineStyle = isset($attribs['outline-style']) ? $attribs['outline-style'] : NULL;

	if (!empty($module->content)) : ?>
    <div <?php if ($id) echo 'id="' . $id . '"'; ?> class="moduletable<?php echo $params->get('moduleclass_sfx') ?><?php if ($moduleClass) echo ' ' . $moduleClass ?>">
		<?php if ($module->showtitle) {
		echo '<h' . $headerLevel . ' class="' . $headerClass . '">' . $moduleTitle . '</h' . $headerLevel . '>';
	}
		echo $module->content ?>
    </div>
	<?php endif;
}

function modChrome_jerounded($module, &$params, &$attribs)
{
	$id           = isset($attribs['id']) ? $attribs['id'] : NULL;
	$headerLevel  = isset($attribs['level']) ? (int)$attribs['level'] : 3;
	$headerClass  = isset($attribs['header-class']) ? $attribs['header-class'] : 'je-header';
	$moduleClass  = isset($attribs['module-class']) ? $attribs['module-class'] : NULL;
	$moduleTitle  = dynamicMenuTitle($module, $params);
	$roundedStyle = isset($attribs['rounded-style']) ? $attribs['rounded-style'] : NULL;

	if (!empty($module->content)) : ?>
    <div <?php if ($id) echo 'id="' . $id . '"'; ?> class="moduletable<?php echo $params->get('moduleclass_sfx') ?><?php if ($moduleClass) echo ' ' . $moduleClass ?><?php if ($roundedStyle) echo ' rounded-' . $roundedStyle;?>">
        <div>
            <div>
                <div>
					<?php if ($module->showtitle) {
					echo '<h' . $headerLevel . ' class="' . $headerClass . '">' . $moduleTitle . '</h' . $headerLevel . '>';
				}
					echo $module->content ?>
                </div>
            </div>
        </div>
    </div>'
	<?php endif;
}