<?php

namespace App\Service;


class WilayahService
{

    public function get_provinsi()
    {
        $provinsi = file_get_contents("https://dev.farizdotid.com/api/daerahindonesia/provinsi");
        $provinsi = json_decode($provinsi)->provinsi;
        return $provinsi;
    }
    
    public function get_provinsi_by_id($id)
    {
        $provinsi = file_get_contents("https://dev.farizdotid.com/api/daerahindonesia/provinsi/"+$id);
        $provinsi = json_decode($provinsi);
        return $provinsi;
    }




    
}
