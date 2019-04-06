<?php
/*-----------------------------------------------------------------------------------*/
/* Intiway feed reader
/*-----------------------------------------------------------------------------------*/	
function np_intiway_render($atts, $content = NULL) {
	extract(shortcode_atts(array(
		'intiway_url'	=> '',
		'intiway_max' 	=> '4'
	), $atts));
	
	// Define vars
	$output = '';
	$titolo = '';
	$link = '';
	$luogo = '';
	$settore = '';
	$intiway_limit = '';
	if($intiway_max != '-1') {
		$intiway_limit = '?max='.$intiway_max;
	}
	$intiway_url = $intiway_url.'?max='.$intiway_limit;
	
	// Parse link
	$xml=simplexml_load_file($intiway_url) or die("Error: Cannot create object");
	foreach ($xml->ITEM as $el) {
		$titolo = $el->TITOLO_ANNUNCIO;
		$link = $el->URL;
		$luogo = $el->LUOGO_LAVORO;
		$settore = $el->SETTORE;
		$output .= '<article class="single-intiway-ads"><h3><a href="'.$link.'" title="'.$titolo.'" target="_blank">'.$titolo.'</a></h3>';
		$output .= '<i class="fa fa-tag" aria-hidden="true"></i> <strong>'.$settore.'</strong><br />';
		$output .= '<span><i class="fa fa-map-marker" aria-hidden="true"></i> '.$luogo.'</span>';
		$output .= '<a href="'.$link.'" class="intiway-btn" target="_blank">'.__('Read more', 'np').'</a>';
		$output .= '</article>';
	}
	return $output;
}	
add_shortcode('np_intiway', 'np_intiway_render');