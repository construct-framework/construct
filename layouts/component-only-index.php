<?php defined('_JEXEC') or die;
/**
* @package		Template Framework for Joomla! 1.5
* @author		Joomla Engineering http://joomlaengineering.com
* @copyright	Copyright (C) 2010 Matt Thomas | Joomla Engineering. All rights reserved.
* @license		GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
*/
// Get and define template parameters
$customStyleSheet 		= $this->params->get('customStyleSheet');
$useCustomStyleSheet 	= $this->params->get('useCustomStyleSheet');
?>

<?php echo '<?'; ?>xml version="1.0" encoding="<?php echo $this->_charset ?>"
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
<head>
<jdoc:include type="head" />
<meta name="componentonlyindex" />
	<link rel="stylesheet" type="text/css" href="<?php echo 'templates/'.$this->template; ?>/css/screen.css" media="screen" />
<?php	
	if (($useCustomStyleSheet) && ($customStyleSheet !='-1'))
		echo "\n".'  <link rel="stylesheet" href="templates/'.$this->template.'/css/'.$customStyleSheet.'"  type="text/css" media="screen" />';
	if ($this->direction == 'rtl')
		echo "\n".'  <link rel="stylesheet" href="templates/'.$this->template.'/css/rtl.css"  type="text/css" media="screen" />';
?>
</head>

<body>
	<jdoc:include type="component" />
</body>
</html>