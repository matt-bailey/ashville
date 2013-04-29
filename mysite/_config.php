<?php

global $project;
$project = 'ashville';

global $databaseConfig;
$databaseConfig = array(
    "type" => 'MySQLDatabase',
    "server" => 'localhost',
    "username" => 'root',
    "password" => 'root',
    "database" => 'ashville',
    "path" => '',
);

MySQLDatabase::set_connection_charset('utf8');

// Set dev environment
Director::set_environment_type("dev");
Security::setDefaultAdmin('admin','password');

// Set the default theme
SSViewer::set_theme('ashville');

// Set the site locale
i18n::set_locale('en_GB');

// Enable nested URLs for this site (e.g. page/sub-page/)
if (class_exists('SiteTree')) SiteTree::enable_nested_urls();

// Enable full text search
//FulltextSearchable::enable();

// Better image quality
GD::set_default_quality(95);

Config::inst()->update('BlogCategory', 'limit_to_holder', true);

// Add custom site config
Object::add_extension('SiteConfig', 'CustomSiteConfig');
CMSMenu::remove_menu_item('CMSSettingsController');
CMSMenu::add_menu_item('CustomCMSSettingsController', 'Settings', 'admin/settings/');

// Decorate the Blog page types
DataObject::add_extension('BlogHolder', 'BlogHolderDecorator');
DataObject::add_extension('BlogEntry', 'BlogEntryDecorator');

// Add additional admin css
LeftAndMain::require_css('mysite/fancybox/jquery.fancybox.css');
LeftAndMain::require_css('mysite/imgareaselect/css/imgareaselect-animated.css');
LeftAndMain::require_css('mysite/css/admin.css');

// Add additional admin js
LeftAndMain::require_javascript('mysite/fancybox/lib/jquery.mousewheel-3.0.6.pack.js');
LeftAndMain::require_javascript('mysite/fancybox/jquery.fancybox.pack.js');
LeftAndMain::require_javascript('mysite/imgareaselect/scripts/jquery.imgareaselect.pack.js');
LeftAndMain::require_javascript('mysite/js/admin.min.js');
