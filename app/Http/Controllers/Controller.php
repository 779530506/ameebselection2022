<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\vote;
use Carbon\Carbon;

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

        $startDate = Carbon::createFromFormat('d/m/Y H:i:s', '18/09/2022 12:00:00');
        $endDate = Carbon::createFromFormat('d/m/Y H:i:s', '18/09/2022 13:00:00');
        $check = Carbon::now()->between($startDate, $endDate);
        $data['isTime']= !$check;

        return view('layout', $data);
    }
}
