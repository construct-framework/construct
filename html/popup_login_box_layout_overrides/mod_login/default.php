<?php // no direct access
defined('_JEXEC') or die; ?>
<?php if ($type == 'logout') : ?>
<form action="index.php" method="post" name="login" id="form-login">
<?php if ($params->get('greeting')) : ?>
	<div>
	<?php if ($params->get('name')) : {
		echo JText::sprintf( 'HINAME', $user->get('name') );
	} else : {
		echo JText::sprintf( 'HINAME', $user->get('username') );
	} endif; ?>
	</div>
<?php endif; ?>
	<div align="center">
		<input type="submit" name="Submit" class="button" value="<?php echo JText::_( 'BUTTON_LOGOUT'); ?>" />
	</div>

	<input type="hidden" name="option" value="com_user" />
	<input type="hidden" name="task" value="logout" />
	<input type="hidden" name="return" value="<?php echo $return; ?>" />
</form>
<?php else :
	JHtml::_('behavior.modal', 'a.login');
?>
<script type="text/javascript">
window.addEvent('domready', function() {
	// Decorate the login windows to use a modal.
	$ES('a.login').each(function(a){
		a.setProperty('rel', '{size: {x: 175, y: 225}, ajaxOptions: {method: "get"}}');
		if (a.getProperty('href').contains('?')) {
			a.setProperty('href', a.getProperty('href')+'&tmpl=component');
		} else {
			a.setProperty('href', a.getProperty('href')+'?tmpl=component');
		}
	});
});
</script>
	<p>
		<a href="<?php echo JRoute::_('index.php?option=com_user&view=login'); ?>" class="login" title="<?php echo JText::_('LOGIN') ?>">
			<?php echo JText::_('LOGIN') ?></a>
		&bull;
		<a href="<?php echo JRoute::_( 'index.php?option=com_user&task=register' ); ?>">
				<?php echo JText::_('REGISTER'); ?></a>.
	</p>
<?php endif; ?>