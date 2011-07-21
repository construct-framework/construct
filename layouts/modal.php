<?php defined('_JEXEC') or die;
/**
* @package		Template Framework for Joomla! 1.6+
* @author		Joomla Engineering http://joomlaengineering.com
* @copyright	Copyright (C) 2010, 2011 Matt Thomas | Joomla Engineering. All rights reserved.
* @license		GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
*/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
<head>
<jdoc:include type="head" />
<?php
$doc->addStyleSheet($template.'/css/modal.css','text/css','screen'); 
?>
</head>

<body class="modal <?php if($articleId) echo 'article-'.$articleId; ?>">
	<jdoc:include type="component" />     
</body>
</html>