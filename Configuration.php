<?php

/**
 * Debug mode set false for production
 */
define("DEBUG_MODE", true);

/**
 * Application Data
 */
define("APP_TITLE", "Wicom");
define("CMS_TITLE", "CMS Wicom");

/**
 * File Application Prefix
 */
define("FILE_PREFIX", "");

/**
 * Database Configuration Parameters
 */
define("DATABASE_SERVER", "localhost");
define("DATABASE_PORT", "3306");
define("DATABASE_NAME", "wicomcom_web");
define("DATABASE_USERNAME", "wicomcom_web");
define("DATABASE_PASSWORD", "web.wicom.123.");
define("DATABASE_PREFIX", "");

/*define("DATABASE_SERVER", "localhost");
define("DATABASE_PORT", "3306");
define("DATABASE_NAME", "wicom");
define("DATABASE_USERNAME", "root");
define("DATABASE_PASSWORD", "");
define("DATABASE_PREFIX", "");*/

/**
 * Email Settings
 */
define("EMAIL_HOST", "mail.wicom.com.bo");
define("EMAIL_PORT", "25");
define("EMAIL_FROM", "no-reply");
define("EMAIL_USERNAME", "info@wicom.com.bo");
define("EMAIL_PASSWORD", "qwerty.123.");
define("EMAIL_AUTH", true);
define("EMAIL_TYPE", "smtp");

/**
 * Registries State Type
 */
define("ACTION_NONE", "None");
define("ACTION_INSERT", "Insert");
define("ACTION_UPDATE", "Update");
define("ACTION_DELETE", "Delete");

/**
 * Time Zone Configuration
 */
date_default_timezone_set('America/La_Paz');

/**
 * Messages Types
 */
define('MESSAGE_EXCLAMATION', 'Exclamation');
define('MESSAGE_WARNING', 'Warning');
define('MESSAGE_INFORMATION', 'Information');
