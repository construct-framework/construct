<?php // from http://forum.joomla.org/viewtopic.php?p=2102441#p2102441
defined('_JEXEC') or die;

if ( ! defined('CmodMainMenuXMLCallbackDefined') )
{
function CmodMainMenuXMLCallback(&$node, $args)
{
	$user	= &JFactory::getUser();
	$menu	= &JSite::getMenu();
	$active	= $menu->getActive();
	$path	= isset($active) ? array_reverse($active->tree) : null;

	if (($args['end']) && ($node->attributes('level') >= $args['end']))
	{
		$children = $node->children();
		foreach ($node->children() as $child)
		{
			if ($child->name() == 'ul') {
				$node->removeChild($child);
			}
		}
	}

	
// first and last class
	if ($node->name() == 'ul') {
		foreach ($node->children() as $child) {
			/* keep reference to the parent */
			$child->my_parent =& $node; // ??
			
			if ($child->attributes('access') > $user->get('aid', 0)) {
				$node->removeChild($child);
			}
		}
	
// count items in the menu array
		$children_count = count($node->children());
		$children_index = 0;
		foreach ($node->children() as $child) {
// first item check(0)
			if ($children_index == 0) {
// add first class attribute to the li tag 
				$child->addAttribute('class', 'first');
			}
// last item check (-1)
			if ($children_index == $children_count - 1) {
// add last class attribute to the li tag
				$child->addAttribute('class', 'last');
			}
			$children_index++;
		}
	}


	if (($node->name() == 'li') && isset($node->ul)) {
		if ($node->attributes('class')) {
			$node->addAttribute('class', $node->attributes('class').' parent'); // print_r($node);
		} else {
			$node->addAttribute('class', 'parent'); // print_r($node);
		}
	}

	if (isset($path) && (in_array($node->attributes('id'), $path) || in_array($node->attributes('rel'), $path)))
	{
		if ($node->attributes('class')) {
			$node->addAttribute('class', $node->attributes('class').' active');
		} else {
			$node->addAttribute('class', 'active');
		}
	}
	else
	{
		if (isset($args['children']) && !$args['children'])
		{
			$children = $node->children();
			foreach ($node->children() as $child)
			{
				if ($child->name() == 'ul') {
					$node->removeChild($child);
				}
			}
		}
	}

	if (($node->name() == 'li') && ($id = $node->attributes('id'))) {
		if ($node->attributes('class')) {
			$node->addAttribute('class', $node->attributes('class').' item'.$id);
		} else {
			$node->addAttribute('class', 'item'.$id);
		}
	}
	
	if (isset($path) && $node->attributes('id') == $path[0]) {
		$node->addAttribute('id', 'current');
	} else {
		$node->removeAttribute('id');
	}
	$node->removeAttribute('rel');
	$node->removeAttribute('level');
	$node->removeAttribute('access');
}
	define('CmodMainMenuXMLCallbackDefined', true);
}

modMainMenuHelper::render($params, 'CmodMainMenuXMLCallback');
