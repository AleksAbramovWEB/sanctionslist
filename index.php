<?php

require_once "core/Db.php";
require_once "core/RepositorySDN.php";

$repository = new RepositorySDN();
$data = $repository->getData();
$from_sdn = $repository->getFromSdn();
$until_sdn = $repository->getUntilSdn();
$count = $repository->getCount();

if ($_SERVER['REQUEST_METHOD'] === 'POST')
    require_once "html/includes/listSND.php";
else
    require_once "html/template.php";