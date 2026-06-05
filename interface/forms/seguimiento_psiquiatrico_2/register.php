<?php


require_once(__DIR__ . "/../../globals.php");
require_once("$srcdir/api.inc.php");
require_once("$srcdir/patient.inc.php");
require_once("$srcdir/options.inc.php");

$form_name = "Seguimiento Psiquiatrico (2)";
$form_folder = "seguimiento_psiquiatrico_2";
$form_version = 1;

sqlStatement("INSERT INTO forms (name, directory, version) VALUES (?, ?, ?) 
    ON DUPLICATE KEY UPDATE version = VALUES(version)", 
    [$form_name, $form_folder, $form_version]);

echo "Form '{$form_name}' registered successfully.";
