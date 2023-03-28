<?php
define('ROOTDIR', __DIR__ . DIRECTORY_SEPARATOR);
$ROOTURL = '/V_TiemChung/';
require_once ROOTDIR . 'autoload.php';
require_once ROOTDIR . 'classes/set.php';
require_once ROOTDIR . 'vendor/autoload.php';
$d = Dotenv\Dotenv::createImmutable(ROOTDIR);
$d->load();
try {
    $PDO = (new TC\OBS\PDOFactory())->create([
        'dbhost' => $_ENV['DB_HOST'],
        'dbname' => $_ENV['DB_NAME'],
        'dbuser' => $_ENV['DB_USER'],
        'dbpass' => $_ENV['DB_PASS']
    ]);
} catch (Exception $ex) {
    echo 'Whoop, something was wrong!';
}
