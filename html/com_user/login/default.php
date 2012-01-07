<?php // @version $Id: default.php 12352 2009-06-24 13:52:57Z ian $
defined('_JEXEC') or die;
 ?>
<?php if($this->params->get('show_page_title',1)) : ?>
<h2 class="componentheading<?php echo htmlspecialchars($this->params->get('pageclass_sfx')) ?>">
	<?php echo $this->params->get('page_title') ?>
</h2>
<?php endif; ?>

<?php echo $this->loadTemplate( $this->type ); ?>
