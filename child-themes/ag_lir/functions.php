//register donated amount custom field
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_10-for-10',
		'title' => '10 for 10',
		'fields' => array (
			array (
				'key' => 'field_533bd3c927ffe',
				'label' => 'Amount Donated',
				'name' => 'amount_donated',
				'type' => 'number',
				'instructions' => 'Enter in the total amount donated',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '$',
				'append' => '',
				'min' => '',
				'max' => '',
				'step' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page',
					'operator' => '==',
					'value' => '1352',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'featured_image',
				1 => 'categories',
				2 => 'tags',
				3 => 'send-trackbacks',
			),
		),
		'menu_order' => -1,
	));
}