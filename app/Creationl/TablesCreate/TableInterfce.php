<?php

namespace App\Creationl\TablesCreate;


interface TableInterfce
{
    public function iniTable($data);
    public function setHeader($data);
    public function setTableBody($body);
    public function getHeader();
    public function setTableRoutes($routes);
    public function getTableRoutes();
}
