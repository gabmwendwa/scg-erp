<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/erp-php/core/init.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/erp-php/api/headers.php';

if (isset($_GET['departments']) && empty($_GET['departments'])) {

    include $_SERVER['DOCUMENT_ROOT'] . '/erp-php/api/read/departments.php';
} else if (isset($_GET['dpositions']) && empty($_GET['dpositions'])) {

    include $_SERVER['DOCUMENT_ROOT'] . '/erp-php/api/read/department_positions.php';
} else if (isset($_GET['dashboard']) && empty($_GET['dashboard'])) {

    include $_SERVER['DOCUMENT_ROOT'] . '/erp-php/api/read/dashboard.php';
}
