<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use App\Quote;

class ContentController extends Controller
{
    public function index()
    {
        $contents = Content::with("writer")->orderBy("id", "DESC")->paginate(5);
        $quotes = Quote::with("writer")->orderBy("id", "DESC")->paginate(4);

        $mix = [];

        foreach($contents as $content){
            array_push($mix, [
                "type" => "content",
                "content" => $content,
                "quote" => null,
                "created_at" => strtok($content->created_at, "T"),
                "updated_at" => strtok($content->updated_at, "T"),
            ]);
        } 

        foreach($quotes as $quote){
            array_push($mix, [
                "type" => "quote",
                "content" => "null",
                "quote" => $quote,
                "created_at" => strtok($quote->created_at, "T"),
                "updated_at" => strtok($quote->updated_at, "T"),
            ]);
        } 

        usort($mix, $this->buildSorter("created_at"));

        $data = [
            "mix" => $mix
        ];

        return view("content.index", $data);
    }

    private function buildSorter($key, $dir='DESC') {
        return function ($a, $b) use ($key, $dir) {
            $t1 = strtotime(is_array($a) ? $a[$key] : $a->$key);
            $t2 = strtotime(is_array($b) ? $b[$key] : $b->$key);
            if ($t1 == $t2) return 0;
            return (strtoupper($dir) == 'ASC' ? ($t1 < $t2) : ($t1 > $t2)) ? -1 : 1;
        };
    }

    public function detail($name)
    {
        return view("content.detail");
    }
}
