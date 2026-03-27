<?php

namespace App\Controllers;


use App\Models\PridaniVyrobce;

class Vyrobce extends BaseController
{

    public function index()
    {
        $pridani= new PridaniVyrobce();
        
        $dataPridani = $pridani->paginate(20);
        
        $data = [
            'vyrobce' => $dataPridani,
            'pager'   => $pridani->pager,
        ];

        return view('main_page', $data);
    }

    public function ulozit()
    {
        $pridani = new PridaniVyrobce();

        $novyvyrobce = $this->request->getPost('vyrobce');

        $data = [
            'vyrobce' => $novyvyrobce,
            'url'     => url_title($novyvyrobce, '-', true)
        ];

        $pridani->insert($data);

        return redirect()->to(base_url('/'));
    }
}