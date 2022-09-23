<?php
define('ROOTDIR', __DIR__ . DIRECTORY_SEPARATOR);
$ROOTURL = '/V_TiemChung/';
require_once ROOTDIR . 'autoload.php';
require_once ROOTDIR . 'classes/helpers.php';
try {
    $PDO = (new \CT275\Labs\PDOFactory())->create([
        'dbhost' => 'localhost',
        'dbname' => 'db_tiem_chung',
        'dbuser' => 'root',
        'dbpass' => ''
    ]);
} catch (Exception $ex) {
    echo 'No connection';
}
