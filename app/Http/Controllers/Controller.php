<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function buildSorter($key, $dir='DESC') 
    {
        return function ($a, $b) use ($key, $dir) {
            $t1 = strtotime(is_array($a) ? $a[$key] : $a->$key);
            $t2 = strtotime(is_array($b) ? $b[$key] : $b->$key);
            if ($t1 == $t2) return 0;
            return (strtoupper($dir) == 'ASC' ? ($t1 < $t2) : ($t1 > $t2)) ? -1 : 1;
        };
    }

    public function checkAuth($request)
    {
        if(empty($request->session()->get("id"))){
            return redirect("/dashboard/login");
        }
    }
}
