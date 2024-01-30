<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/erp-php/core/init.php';

if (isset($_GET['cemployee']) && empty($_GET['cemployee'])) {

    include $_SERVER['DOCUMENT_ROOT'] . '/erp-php/api/create/employee.php';
}
