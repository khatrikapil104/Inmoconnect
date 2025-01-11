<?php
$WEBSITE_URL				=	env("APP_URL");  
return [
	'ROOT'     				=> base_path(),
	'APP_PATH'     			=> app_path(),
    'DS'     				=> '/',
    'WEBSITE_URL'							=> $WEBSITE_URL,

	'REQUEST_STATUS'        => ['PENDING' => 1, 'ACCEPTED' => 2, 'REJECTED' => 3, 'BLOCKED' => 4],

	'USER_IMAGE_PATH'                       => storage_path('app/public/users/'),
	'USER_IMAGE_ROOT_PATH'                       => 'storage/users/',
	'COMPANY_IMAGE_ROOT_PATH'                       => 'storage/company_image/',
	'USER_IMAGE_STORE_PATH'                       => 'public/storage/users/',
	'USER_IMAGE_URL'         => $WEBSITE_URL . '/storage/users/',
	'COMPANY_IMAGE_URL'         => $WEBSITE_URL . '/storage/company_image/',
	
	'USER_CERTIFICATE_PATH'                       => storage_path('app/public/user_certificates/'),
	'USER_CERTIFICATE_ROOT_PATH'                       => 'storage/user_certificates/',
	'USER_CERTIFICATE_URL'         => $WEBSITE_URL . '/storage/user_certificates/',	

	'USER_FILE_PATH'                       => storage_path('app/public/user_files/'),
	'USER_FILE_ROOT_PATH'                       => 'storage/user_files/',
	'USER_FILE_URL'         => $WEBSITE_URL . '/storage/user_files/',	
	
	'EVENT_ATTACHMENT_PATH'                       => storage_path('app/public/event_attachments/'),
	'EVENT_ATTACHMENT_ROOT_PATH'                       => 'storage/event_attachments/',
	'EVENT_ATTACHMENT_URL'         => $WEBSITE_URL . '/storage/event_attachments/',
	
	'PROPERTY_IMAGE_PATH'                       => storage_path('app/public/properties/'),
	'PROPERTY_IMAGE_ROOT_PATH'                       => 'storage/properties/',
	'PROPERTY_IMAGE_URL'                       => $WEBSITE_URL.'/storage/properties/',

	'PROPERTY_DOCUMENT_PATH'                       => storage_path('app/public/properties/documents/'),
	'PROPERTY_DOCUMENT_ROOT_PATH'                       => 'storage/properties/documents/',
	'PROPERTY_DOCUMENT_URL'                       => $WEBSITE_URL.'/storage/properties/documents/',

	'STORAGE_UPLOAD_PATH'                         => storage_path('app/uploads') . '/',
	'STORAGE_UPLOAD_URL'                         => $WEBSITE_URL.'/storage/uploads/',

	'GROUP_IMAGE_PATH'                       => storage_path('app/public/groups/'),
	'GROUP_IMAGE_ROOT_PATH'                       => 'storage/groups/',
	'GROUP_IMAGE_URL'         => $WEBSITE_URL . '/storage/groups/',

	'DEVELOPMENT_IMAGE_PATH'                       => storage_path('app/public/developments/'),
	'DEVELOPMENT_IMAGE_ROOT_PATH'                       => 'storage/developments/',
	'DEVELOPMENT_IMAGE_URL'                       => $WEBSITE_URL.'/storage/developments/',

];