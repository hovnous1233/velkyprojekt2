<?php

namespace App\Controllers;


use App\Models\Parametr;


class Mazani extends BaseController
{
    public function smazat()
    {
        $id = $this->request->getPost('id');

        if ($id) {
            $model = new Parametr();

            $model->delete($id);

            return redirect()->back()->with('success', 'Položka byla úspěšně smazána.');
        }
    }
}