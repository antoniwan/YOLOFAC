<?php

return array(

	'facebook' => array(
		'app_id'=> '431802706966452',
		'app_secret' => '9705009fa4c17fab80cb972ebd05ed31',
		'scope' => array(
			'email'
		)
	),

	'google' => array(
        'app_id' => '215970194968-n9iukv2prvheqtq3qo205h4aoed3ooae.apps.googleusercontent.com',
        'app_secret' => 'HZS3LvYWv0Xcbj9zwhiPDFS-',
        'scope' => array(
            'userinfo_email',
            'userinfo_profile'
        )
    ),

    'twitter' => array(
        'app_id' => 'ntUI5Gem8aFH5kHNQa8itQ',
        'app_secret' => 'lv6FkyXNKP1AIbRJ6XHA7qYz5ccqI55KlRt8jbX1Ec',
        'scope' => array()
    ),

    'paypal' => array(
        'app_id' => 'AeYVnxAd3jV9UKhRKkkopkkqel7PXD3RmykiYMCP2p4-QQfNLCoO4zuUS16y',
        'app_secret' => 'EO0FBBBixSwvyhLm6npknjmLSBLXrfTCFGF8kHoBLeY3o6mMcT0Re7UobYwI',
        'scope' => array(
        	'profile',
        	'openid'
        )
    ),

	'redirect_uri' => 'http://local.yolofac.com/oauth'

);