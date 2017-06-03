<?php

//Get the links as an array
$links = paginate_links(array('type' => 'array'));

//And display each of them, if there are some only
if (is_array($links)) {

	//Open the bloc
	echo '<div style="text-align: center;" class="col-lg-10 col-lg-push-1 col-ls-pull-1"><ul class="pagination">';

	//Display each link
	foreach ($links as $link) {
		//If it's the current page (a s for span)
		$class = ($link[1] == 's') ? ' class="active" ' : '';

		//Display the link
		echo '<li' . $class . '>' . $link . '</li>';
	}

	//Close the bloc
	echo '</ul></div>';
}
