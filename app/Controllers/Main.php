<?php

namespace App\Controllers;

use App\Models\Komponenty;
use App\Models\Parametr;
use App\Models\Vyrobci;
use Config\MyConfig;
use App\Libraries\FileService;

class Main extends BaseController
{
    public function index()
    {
        $vyrobce = new Vyrobci();
        $dataVyrobce = $vyrobce->paginate(20);

        $data = [
            "vyrobce" => $dataVyrobce,
            "pager" => $vyrobce->pager
        ];
        echo view("main_page", $data);
    }
    public function komponenty($url)
    {
        $config = new MyConfig();
        $perPage = $config->perPage;
       
        $dataVyr = new Vyrobci();
        $dataUrl = $dataVyr->where('url', $url)->first();//vytahuje jen první řádek a da ho jako objekt, ale find hleda jen primary key
        $dataVyrobci = $dataVyr->join("komponent", "komponent.vyrobce_id = vyrobce.idVyrobce", "inner")->join("typkomponent", "typkomponent.idKomponent = komponent.typKomponent_id", "inner")->where("komponent.vyrobce_id", $dataUrl->idVyrobce)->orderBy("komponent.nazev", "asc")->paginate($perPage);
    
        $data = [
            "vyrobci" => $dataVyrobci,
            "pager"   => $dataVyr->pager
        ];
        
        echo view("komponenty", $data);
    }


    public function typkomponentu($id)
    {
       


        $dataKomp = new Komponenty();
        $komponenty = $dataKomp->join("vyrobce","vyrobce.idVyrobce=komponent.vyrobce_id","inner")->join("typkomponent","typkomponent.idKomponent=komponent.typKomponent_id","inner")->find($id);


        $dataPar = new Parametr();
        $dataParametr =  $dataPar->join("nazevparametr","nazevparametr.id=parametr.nazevParametr_id", "inner")->where("komponent_id",$id)->findAll();
      
    
    
        $data = [
                "komponenty"=>$komponenty,
               "parametr"=>$dataParametr,
            
               
               
        ];
        echo view("typkomponentu", $data);
    }

                      
}


