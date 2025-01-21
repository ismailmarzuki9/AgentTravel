<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\model_tb_mobil;
use App\Models\model_tb_kuliner;


class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function viewdasboard(){

        $datamobil =  model_tb_mobil::all();
        $datakuliner=  model_tb_kuliner::all();

        $dataAll = [
            'mobil' => $datamobil,
            'kuliner' => $datakuliner,
        ];

        return view('dasbord', compact('dataAll'));
    }
}
