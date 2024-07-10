<?php 

// Biến môi trường, dùng chung toàn hệ thống
// Khai báo dưới dạng HẰNG SỐ để không phải dùng $GLOBALS
// Client 
define('BASE_URL'       , 'http://localhost/duan1_nhom8/');

// Admin 
define('ADMIN_BASE_URL'       , 'http://localhost/duan1_nhom8/admin/');


define('DB_HOST'    , 'localhost');
define('DB_PORT'    , 3306);
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME'    , 'duan1_nhom8');  // Tên database

define('PATH_ROOT'    , __DIR__ . '/../');
