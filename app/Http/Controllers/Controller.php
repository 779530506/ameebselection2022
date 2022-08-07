<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\vote;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index()
    {
        $data['votes'] = vote::orderBy('id','desc')->paginate(50);
        $data['countAmadou'] = vote::where('president', 'amadou')->count();
        $data['countAlsane'] = vote::where('president', 'alsane')->count();
        $data['null'] = vote::where('president', 'null')->count();
        $data['total'] = $data['countAmadou']+$data['countAlsane']+$data['null'];


        return view('layout', $data);
    }
}
