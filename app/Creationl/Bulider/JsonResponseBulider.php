<?php

namespace App\Creationl\Bulider;

class JsonResponseBulider
{
    private $response = [];

    public function setJsonResponse($data, $message, $flag)
    {
        $this->response['message'] = $message;
        $this->response['data'] = $data;
        $this->response['flag'] = $flag;
    }



    public function setJsonOffsetResponse($status, $data, $total)
    {
        $this->response['status'] = $status;
        $this->response['data'] = $data;
        $this->response['total'] = $total;
    }


    
    public function setJsonStoreResponse($status, $data,$code)
    {
        $this->response['status'] = $status;
        $this->response['data'] = $data;
        $this->response['code'] = $code;
    }

    public function getJsonResponse()
    {
        return $this->response;
    }


    public function getJsonOffsetResponse()
    {
        return $this->response;
    }


    public function getJsonStoreResponse()
    {
        return $this->response;
    }
}
