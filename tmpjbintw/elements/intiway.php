<?php
/*-----------------------------------------------------------------------------------*/
/* Intiway feed reader
/*-----------------------------------------------------------------------------------*/

vc_map(array(
	'name' => esc_html__('Intiway feed reader', 'np'),
	'category' => esc_html__('Content', 'np'),
	'description' => esc_html__('Intiway ADS loop', 'np'),
	'base' => 'np_intiway',
	'icon' => '',
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Intiway feed URL', 'np'),
			'param_name' => 'intiway_url',
			'description'=> esc_html__('Enter the Intiway feed URL to retrieve your ads.', 'np'),
			'value' => esc_html__('', 'np'),
			'std'=>'https://yourname.intiway.it/yourname/yourname/jsp/webservice/getUltimiAnnunciLavoro.jsp'
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__('Ads number', 'np'),
			'param_name'=> 'intiway_max',
			'description'=> esc_html__('Select number of ads to display.', 'np'),
			'value' => array(
				'All'=>'-1',
				'4'=> 4,
				'6'=> 6,
				'8'=> 8,
				'12'=> 12,
			),
			'std'=> 4
		),
	)
));
?>