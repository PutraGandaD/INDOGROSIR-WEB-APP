<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Shift;
use Illuminate\Http\Request;

class ShiftController extends BaseController
{
    public function index(){
        //mengambil data dari tabel shift dan menyimpan pada $shift
        $shift = Shift::all();
        $success['data'] = $shift;
        return $this->sendResponse($success,'Data Shift.');
    }
}
