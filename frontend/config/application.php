<?php
$host = $_SERVER['HTTP_HOST'];
$protocol = $_SERVER['PROTOCOL'] = isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) ? 'https' : 'http';

$full_root_path = '/var/www/frontend';

if (getenv('WP_SSL')) {
    $_SERVER['HTTPS'] = 1;
    $protocol = 'https';
}

$url = "$protocol://$host";
define('WP_HOME', $url);
define('WP_SITEURL', "$url/wp");

define('WP_CONTENT_DIR', "$full_root_path/wp-content");
define('WP_CONTENT_URL', "$url/wp-content");

define('WP_ENVIRONMENT_TYPE', getenv('WP_ENVIRONMENT_TYPE'));

# MySQL config
define('DB_NAME', getenv('DB_NAME'));
define('DB_USER', getenv('DB_USER'));
define('DB_PASSWORD', getenv('DB_PASSWORD'));
define('DB_HOST', getenv('DB_HOST'));
define('DB_CHARSET', getenv('DB_CHARSET'));
define('DB_COLLATE', '');

$table_prefix = 'wp_';
if (getenv('WP_TABLE_PREFIX')) {
    $table_prefix = getenv('WP_TABLE_PREFIX');
}

# Auto generate salt form: https://roots.io/salts.html
define('AUTH_KEY',         getenv('AUTH_KEY'));
define('SECURE_AUTH_KEY',  getenv('SECURE_AUTH_KEY'));
define('LOGGED_IN_KEY',    getenv('LOGGED_IN_KEY'));
define('NONCE_KEY',        getenv('NONCE_KEY'));
define('AUTH_SALT',        getenv('AUTH_SALT'));
define('SECURE_AUTH_SALT', getenv('SECURE_AUTH_SALT'));
define('LOGGED_IN_SALT',   getenv('LOGGED_IN_SALT'));
define('NONCE_SALT',       getenv('NONCE_SALT'));

# Redis config
define('WP_REDIS_HOST', getenv('WP_REDIS_HOST'));
define('WP_REDIS_PORT', getenv('WP_REDIS_PORT'));
define('WP_REDIS_MAXTTL', getenv('WP_REDIS_MAXTTL'));
define('WP_REDIS_PREFIX', md5($host));
define('WP_REDIS_KEY_SALT', getenv('WP_REDIS_KEY_SALT'));

# AS3CF settings
define('AS3CF_SETTINGS', serialize(array(
    'provider' => getenv('AS3CF_PROVIDER'),
    'access-key-id' => getenv('AS3CF_KEY'),
    'secret-access-key' => getenv('AS3CF_SECRET'),
)));
