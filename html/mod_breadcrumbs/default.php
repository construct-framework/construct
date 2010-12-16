<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<ul class="breadcrumbs pathway">
	<li>You are here:</li>	
<?php for ($i = 0; $i < $count; $i ++) :	

	// If not the last item in the breadcrumbs add the separator
	if ($i < $count -1) {
		if(!empty($list[$i]->link)) {
			echo '<li><a href="'.$list[$i]->link.'" class="pathway">'.$list[$i]->name.'</a>';
		} else {
			echo '<li>'.$list[$i]->name;
		}
		echo ' '.$separator.' </li>';
	}  else if ($params->get('showLast', 1)) { // when $i == $count -1 and 'showLast' is true
		echo '<li>'.$list[$i]->name.'</li>';
	}
	
endfor; ?>	
</ul>
