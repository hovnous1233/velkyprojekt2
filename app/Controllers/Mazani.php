<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Mazani extends BaseController
{
    public function smazat($id = null)
    {
        $db = \Config\Database::connect();
        $db->transStart();
        $db->table('parametry')->where('komponenty_id', $id)->delete();
        $db->table('komponenty')->where('id', $id)->delete();
        $db->transComplete();
        return redirect()->to('/')->with('success', 'Komponent byl úspěšně smazán.');
    }
}