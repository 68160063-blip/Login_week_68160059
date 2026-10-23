<?php
// Credentials come from config/db.local.php (git-ignored) or environment variables.
$cfg = ['host' => 'localhost', 'user' => 'root', 'pass' => '', 'name' => 'resume_lab'];
if (is_file(__DIR__ . '/db.local.php')) $cfg = array_merge($cfg, require __DIR__ . '/db.local.php');
$host = getenv('DB_HOST') ?: $cfg['host'];
$user = getenv('DB_USER') ?: $cfg['user'];
$pass = getenv('DB_PASS') !== false ? getenv('DB_PASS') : $cfg['pass'];
$dbname = getenv('DB_NAME') ?: $cfg['name'];
$conn = mysqli_connect($host, $user, $pass, $dbname);
if (!$conn) { error_log(mysqli_connect_error()); http_response_code(500); exit('Database unavailable'); }
mysqli_set_charset($conn, 'utf8mb4');
