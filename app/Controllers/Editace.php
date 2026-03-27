<?php

namespace App\Controllers;

use App\Models\PridaniVyrobce;

class Editace extends BaseController
{
    public function index($id)
    {
        $pridani= new PridaniVyrobce();
        
        $dataPridani = $pridani->find($id);
        
        $data = [
            'vyrobce' => $dataPridani,
        ];

        return view('edit', $data);
    }


    public function aktualizovat($id)
    {
        $pridani = new PridaniVyrobce();

        
        
        $novy_nazev = $this->request->getPost('vyrobce');

        $updateData = [
            'vyrobce' => $novy_nazev,
            'url'     => url_title($novy_nazev, '-', true)
        ];

        $pridani->update($id, $updateData);

        
        return redirect()->to(base_url('/'));
    }
}