<?php // @version $Id: default_error.php 11917 2009-05-29 19:37:05Z ian $
defined('_JEXEC') or die;
?>

<h2 class="error<?php $this->escape($this->params->get( 'pageclass_sfx' )) ?>">
	<?php echo JText::_('Error') ?>
</h2>
<div class="error<?php echo htmlspecialchars($this->params->get( 'pageclass_sfx' )) ?>">
	<p><?php echo htmlspecialchars($this->error); ?></p>
</div>
