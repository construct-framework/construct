<?php // @version $Id: default_message.php 11917 2009-05-29 19:37:05Z ian $
defined('_JEXEC') or die;
?>

<h3>
	<?php echo htmlspecialchars($this->message->title); ?>
</h3>

<p class="message">
	<?php echo htmlspecialchars($this->message->text); ?>
</p>
