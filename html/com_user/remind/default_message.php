<?php // @version $Id: default_message.php$
defined('_JEXEC') or die;
?>

<div class="componentheading">
	<?php echo htmlspecialchars($this->message->title); ?>
</div>

<div class="message">
	<?php echo htmlspecialchars($this->message->text); ?>
</div>
