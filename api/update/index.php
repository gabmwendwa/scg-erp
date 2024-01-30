<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/erp-php/core/init.php';

if (isset($_GET['uemployee']) && empty($_GET['uemployee'])) {

    include $_SERVER['DOCUMENT_ROOT'] . '/erp-php/api/update/employee.php';
}
