<?php defined('_JEXEC') or die;
/**
* @package		Template Framework for Joomla! 1.5
* @author		Joomla Engineering http://joomlaengineering.com
* @copyright	Copyright (C) 2010, 2011 Matt Thomas | Joomla Engineering. All rights reserved.
* @license		GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
*/

// To enable use of site configuration
$app = JFactory::getApplication();
?>
<p id="siteinfo-legal">All rights reserved. &copy; <?php echo $cur_year ?> <a href="<?php echo $this->baseurl ?>/" title="<?php echo $app->getCfg('sitename');?>"><?php echo $app->getCfg('sitename');?></a>.<br/>
Developed using the <a href="http://joomlaengineering.com">Construct</a> Template Development Framework.<br/>Joomla! is a registered trademark of Open Source Matters, Inc. - <a class="modal" href="index.php?option=com_content&view=article&id=1&tmpl=modal" rel="{handler: 'iframe', size: {x: 640, y: 480}}">Disclaimer</a></p>
