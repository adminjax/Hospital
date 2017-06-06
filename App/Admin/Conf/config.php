<?php
return array(
	//后台menu
	'ADMIN_MENU' => array(
		'1' => array(
			'acl' => '1',
			'label' => '控制面板',
			'name' => '',
			'sort' => 1,
			'active' => 1,
			'path' => 'Dashboard/index'
		),
		'2' => array(
			'acl' => '2',
			'label' => '系统设置',
			'name' => 'SystemSet',
			'sort' => 55,
			'active' => 1,
			'low' => array(
				'2_1' => array(
					'acl' => '2_1',
					'label' => '账户设置',
					'name' => 'Account',
					'sort' => 1,
					'path' => 'Account/Set',
					'active' => 1,
				),
			),
		),
		'3' => array(
			'acl' => '3',
			'label' => '医生信息',
			'name' => 'employee',
			'sort' => 2,
			'active' => 1,
			'low' => array(
				'3_1' => array(
					'acl' => '3_1',
					'label' => '医生列表',
					'name' => 'EmployeeList',
					'sort' => 1,
					'path' => 'Employee/list',
					'active' => 1,
				),
				'3_2' => array(
					'acl' => '3_2',
					'label' => '排班',
					'name' => 'EmployeeSchedul',
					'sort' => 2,
					'path' => 'Employee/Schedul',
					'active' => 1,
				),
			),
		),
		'4' => array(
			'acl' => '4',
			'label' => '预约信息',
			'name' => 'order',
			'sort' => 2,
			'active' => 1,
			'low' => array(
				'4_1' => array(
					'acl' => '4_1',
					'label' => '预约列表',
					'name' => 'order',
					'sort' => 1,
					'path' => 'Order/List',
					'active' => 1,
				),
			),
		),
		'5' => array(
			'acl' => '5',
			'label' => '患者病历',
			'name' => 'medical',
			'sort' => 2,
			'active' => 1,
			'low' => array(
				'5_1' => array(
					'acl' => '5_1',
					'label' => '病历列表',
					'name' => 'medical',
					'sort' => 1,
					'path' => 'Medical/List',
					'active' => 1,
				),
			),
		),			
	),
);