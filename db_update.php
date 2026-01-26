<?php
require_once 'includes/config.php';
require_once 'functions/func_db.php';

$sql = "ALTER TABLE `accommodation` ADD `floor_plan` VARCHAR(255) NULL AFTER `services`";
try {
    DB::runQuery($sql);
    echo "Column 'floor_plan' added successfully.";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
unlink(__FILE__);
?>