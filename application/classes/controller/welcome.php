<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller {


	private $_fieldname_matches = array(
		'cut_flower' => array('cut flower','cut'),
		'ground_cover' => array('ground cover'),
		'deer_resistant' => array('deer resistant','deer'),
		'pot_indoor' => array('pot indoor','indoor'),
		'fragrant' => array(),
		'heirloom' => array(),
		'butterfly_hummingbird' => array('butterfly hummingbird','butterfly','hummingbird'),
		'certified_organic' => array('certified organic','organic'),
		'green_alternative' => array('green alternative','green'),
		'best_seller' => array('best seller','best'),
		'on_sale' => array('on sale','sale'),
		'our_faves' => array('our faves','faves','favourites','favorites','favourite','favorite'),
		'is_new' => array('new')		
	);
	
	public function action_index()
	{
		$attribute_values = array();
		$attributes = array('certified organic', 'pot_indoor', 'favourites', 'deer_resistant', 'deer');
		foreach ($this->_fieldname_matches as $field_name => $spellings) 
		{
			// Check for exact match first
			
			if (in_array($field_name, $attributes))
			{
				$attribute_values[$field_name] = 1;
				continue; // Lok at the next field
			}
			
			foreach($spellings as $spelling) 
			{
				if (in_array($spelling, $attributes))
				{
					$attribute_values[$field_name] = 1;
					break;
				}
			}
		
		}
		
		$this->request->response = '<pre>'.print_r($attribute_values, 1) .'</pre>';
	}
	
	

} // End Welcome
