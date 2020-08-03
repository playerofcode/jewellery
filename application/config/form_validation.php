<?php 	
$config=[
	'products'=>[
			[
			  'field'=>'cat_id',
			  'label'=>'Category Name',
			  'rules'=>'required'
			],
			[
			  'field'=>'p_name',
			  'label'=>'Product Name',
			  'rules'=>'required'
			],
			[
			  'field'=>'p_qty',
			  'label'=>'Quantity',
			  'rules'=>'required'
			],
			[
			  'field'=>'p_unit',
			  'label'=>'Product Unit',
			  'rules'=>'required'
			],
			[
			  'field'=>'m_price',
			  'label'=>'Oringinal Price',
			  'rules'=>'required'
			],
			[
			  'field'=>'d_price',
			  'label'=>'Discount Price',
			  'rules'=>'required'
			],
			[
			  'field'=>'availability',
			  'label'=>'Product Availability',
			  'rules'=>'required'
			],
			[
			  'field'=>'status',
			  'label'=>'Status',
			  'rules'=>'required'
			],
			[
			  'field'=>'p_description',
			  'label'=>'Product Description',
			  'rules'=>'required'
			]
	],
	'customer_register'=>[
			[
			  'field'=>'name',
			  'label'=>'Name',
			  'rules'=>'required'
			],
			[
			  'field'=>'mobno',
			  'label'=>'Mobile Number',
			  'rules'=>'required|min_length[10]'
			],
			[
			  'field'=>'email',
			  'label'=>'Email',
			  'rules'=>'required|valid_email|is_unique[customers.email]'
			],
			[
			  'field'=>'distributor',
			  'label'=>'Store Name',
			  'rules'=>'required'
			],
			[
			  'field'=>'password',
			  'label'=>'Password',
			  'rules'=>'required|min_length[5]'
			],
			[
			  'field'=>'cpassword',
			  'label'=>'Confirm Password',
			  'rules'=>'required|matches[password]'
			]

	],
	'retailer_register'=>[
			[
			  'field'=>'state',
			  'label'=>'State',
			  'rules'=>'required'
			],
			[
			  'field'=>'district',
			  'label'=>'District',
			  'rules'=>'required'
			],
			[
			  'field'=>'tehsil',
			  'label'=>'Tehsil',
			  'rules'=>'required'
			],
			[
			  'field'=>'distributor',
			  'label'=>'Distributor',
			  'rules'=>'required'
			],
			[
			  'field'=>'name',
			  'label'=>'name',
			  'rules'=>'required|min_length[3]|alpha_numeric_spaces'
			],
			[
			  'field'=>'mobno',
			  'label'=>'Mobile No',
			  'rules'=>'required|min_length[10]'
			],
			[
			  'field'=>'email',
			  'label'=>'Email',
			  'rules'=>'required|valid_email|is_unique[distributor.email]|is_unique[retailer.email]'
			],
			[
			  'field'=>'password',
			  'label'=>'New Password',
			  'rules'=>'required|min_length[5]'
			],
			[
			  'field'=>'cpassword',
			  'label'=>'Confirm password',
			  'rules'=>'required|matches[password]'
			]

	],
	'login'=>[
			[
			  'field'=>'email',
			  'label'=>'Email',
			  'rules'=>'required|valid_email'
			],
			[
			  'field'=>'password',
			  'label'=>'Password',
			  'rules'=>'required'
			]
		],
	'contact'=>[
			[
			  'field'=>'name',
			  'label'=>'Name',
			  'rules'=>'required|min_length[5]|alpha_numeric_spaces'
			],
			[
			  'field'=>'email',
			  'label'=>'Email',
			  'rules'=>'required|valid_email'
			],
			[
			  'field'=>'mobno',
			  'label'=>'Mobile No',
			  'rules'=>'required|min_length[10]'
			],
			[
			  'field'=>'subject',
			  'label'=>'Subject',
			  'rules'=>'required'
			],
			[
			  'field'=>'message',
			  'label'=>'Message',
			  'rules'=>'required'
			]
		],
		'applyform'=>[
			[
			  'field'=>'application_type',
			  'label'=>'Application Type',
			  'rules'=>'required'
			],
			[
			  'field'=>'area',
			  'label'=>'Area',
			  'rules'=>'required'
			],
			[
			  'field'=>'name',
			  'label'=>'Name',
			  'rules'=>'required'
			],
			[
			  'field'=>'guardian_type',
			  'label'=>'Guardian Type',
			  'rules'=>'required'
			],
			[
			  'field'=>'guardian_name',
			  'label'=>'Guardian Name',
			  'rules'=>'required'
			],
			[
			  'field'=>'mother_name',
			  'label'=>'Mother Name',
			  'rules'=>'required'
			],
			[
			  'field'=>'district',
			  'label'=>'District',
			  'rules'=>'required'
			],
			[
			  'field'=>'tehsil',
			  'label'=>'Tehsil',
			  'rules'=>'required'
			],
			[
			  'field'=>'village',
			  'label'=>'Village',
			  'rules'=>'required'
			],
			[
			  'field'=>'mobno',
			  'label'=>'Mobile Number',
			  'rules'=>'required'
			],
			[
			  'field'=>'p_address',
			  'label'=>'Permanant Address',
			  'rules'=>'required'
			],
			[
			  'field'=>'occupation',
			  'label'=>'Occupation',
			  'rules'=>'required'
			],
			[
				'field'=>'reason',
				'label'=>'Reason',
				'rules'=>'required'
			]
		],
		'pan_card'=>[
			[
			  'field'=>'name',
			  'label'=>'Name',
			  'rules'=>'required|min_length[3]'
			],
			[
			  'field'=>'f_name',
			  'label'=>'Father Name',
			  'rules'=>'required'
			],
			[
			  'field'=>'gender',
			  'label'=>'Gender',
			  'rules'=>'required'
			],
			[
			  'field'=>'dob',
			  'label'=>'Date of Birth',
			  'rules'=>'required'
			],
			[
			  'field'=>'email',
			  'label'=>'Email',
			  'rules'=>'required|valid_email'
			],
			[
			  'field'=>'mobno',
			  'label'=>'Mobile No',
			  'rules'=>'required|min_length[10]'
			],
			[
			  'field'=>'address',
			  'label'=>'address',
			  'rules'=>'required'
			],
			[
			  'field'=>'adharno',
			  'label'=>'Adhar Number',
			  'rules'=>'required|exact_length[12]|numeric'
			]
		],
		'distributor_register'=>[
			[
			  'field'=>'store_name',
			  'label'=>'Store Name',
			  'rules'=>'required'
			],
			[
			  'field'=>'name',
			  'label'=>'Name',
			  'rules'=>'required'
			],
			[
			  'field'=>'mobno',
			  'label'=>'Mobile Number',
			  'rules'=>'required|numeric|min_length[10]'
			],
			[
			  'field'=>'email',
			  'label'=>'Email',
			  'rules'=>'required|valid_email|is_unique[distributor.email]'
			],
			[
			  'field'=>'pincode',
			  'label'=>'Pin Code',
			  'rules'=>'required'
			],
			[
			  'field'=>'address',
			  'label'=>'address',
			  'rules'=>'required'
			],
			[
			  'field'=>'password',
			  'label'=>'Password',
			  'rules'=>'required|min_length[5]'
			],
			[
			  'field'=>'cpassword',
			  'label'=>'Confirm Password',
			  'rules'=>'required|matches[password]'
			]
		],
		'delivery_register'=>[
			[
			  'field'=>'distributor',
			  'label'=>'Store Name',
			  'rules'=>'required'
			],
			[
			  'field'=>'name',
			  'label'=>'Name',
			  'rules'=>'required'
			],
			[
			  'field'=>'mobno',
			  'label'=>'Mobile Number',
			  'rules'=>'required|numeric|min_length[10]'
			],
			[
			  'field'=>'email',
			  'label'=>'Email',
			  'rules'=>'required|valid_email|is_unique[delivery.email]'
			],
			[
			  'field'=>'pincode',
			  'label'=>'Pin Code',
			  'rules'=>'required'
			],
			[
			  'field'=>'address',
			  'label'=>'address',
			  'rules'=>'required'
			],
			[
			  'field'=>'password',
			  'label'=>'Password',
			  'rules'=>'required|min_length[5]'
			],
			[
			  'field'=>'cpassword',
			  'label'=>'Confirm Password',
			  'rules'=>'required|matches[password]'
			]
		],
		'contact_form'=>[
			[
			  'field'=>'name',
			  'label'=>'Name',
			  'rules'=>'required'
			],
			[
			  'field'=>'mobno',
			  'label'=>'Mobile Number',
			  'rules'=>'required'
			],
			[
			  'field'=>'email',
			  'label'=>'Email',
			  'rules'=>'required|valid_email'
			],
			[
			  'field'=>'message',
			  'label'=>'Message',
			  'rules'=>'required'
			]
		]

	];

?>