<?php
// Temporary helper to inspect site URL settings. Delete after use.
define('SHORTINIT', false);
require_once __DIR__ . '/wp-load.php';

header('Content-Type: text/plain; charset=utf-8');

echo "Defined constants:\n";
echo "WP_HOME: " . (defined('WP_HOME') ? WP_HOME : '(not defined)') . "\n";
echo "WP_SITEURL: " . (defined('WP_SITEURL') ? WP_SITEURL : '(not defined)') . "\n\n";

echo "Options from database:\n";
echo "get_option('siteurl'): " . get_option('siteurl') . "\n";
echo "get_option('home'):    " . get_option('home') . "\n\n";

echo "Server/request info:\n";
echo "REQUEST_URI: " . ($_SERVER['REQUEST_URI'] ?? '') . "\n";
echo "HTTP_HOST: " . ($_SERVER['HTTP_HOST'] ?? '') . "\n";

echo "\nInstructions:\n";
echo "- Nếu giá trị siteurl/home là 'http://localhost/1office_web', cần sửa thành 'http://localhost/1office_next' (qua phpMyAdmin hoặc SQL).\n";
echo "- Sau khi sửa xong, xóa file này.\n";

?>