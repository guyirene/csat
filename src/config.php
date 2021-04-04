<?php

return [
  
	'enabled'  => 1,
	'link'     => 'csat',
	'target'   => '_self',
	'class'    => 'csat',
	'align'    => 'right',
	'top'      => '75%',
	'minutes'  => '0',
	'image'    => 'rlc/csat/img/csat.png',
	'alt'      => 'CSAT',
	'height'   => '50',
	'width'    => '50',
	'bgcolor'  => 'white',
	'question' => 'How was your overall experience while using the application?',
	'message'  => 'Thanks for your rating!',
	'deny'     => 'admin*',
	'allow'    => 'csat/csat_report'
];