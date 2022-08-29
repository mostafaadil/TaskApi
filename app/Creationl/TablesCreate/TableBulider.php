<?php

namespace App\Creationl\TablesCreate;

class TableBulider implements TableInterfce
{

    private $header;
    private $routes;
    private $tableObjet;
    private $tableTag;
    private $body = [];

    public function iniTable($data)
    {
        $this->tableObjet = $data;
    }
    public function setHeader($data)
    {
        $this->header .= '<tr class="userDatatable-header">
        ';

        foreach ($data as $key => $value) {
            $this->header .= '<th><span class="projectDatatable-title">' . $key . '</span></th>';
        }

        $this->header .= '</tr>';

    }


    public function setTableBody($body)
    {
    }

    public function getHeader()
    {

        return $this->header;
    }

    public function setTableRoutes($routes)
    {
        $this->routes['update'] = 'update-' . $routes;
        $this->routes['delete'] = 'delete-' . $routes;
        $this->routes['disable'] = 'disable-' . $routes;
    }


    public function getableTag()
    {
        return $this->tableTag .= '' . $this->tableObjet . $this->header . $this->body . '</table>';
    }
    public function getTableRoutes()
    {
        return $this->routes;
    }


    public function getFullTable()
    {
        return $this->getableTag();
    }
}
