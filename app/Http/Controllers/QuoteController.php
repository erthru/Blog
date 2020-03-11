<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Writer;
use App\Quote;

class QuoteController extends Controller
{
    public function dashboardQuoteView(Request $request)
    {
        if(!$request->session()->has("id")){
            return redirect("/dashboard/login");
        }

        $writer = Writer::find($request->session()->get("id"));
        $quotes = Quote::with("writer")->orderBy("id", "DESC")->paginate(10);

        if(!empty($request->query("query"))){
            $quotes = Quote::with("writer")
            ->where("quote", "LIKE", "%" . $request->query("query") . "%")
            ->orderBy("id", "DESC")
            ->take(10)
            ->get();
        }

        $data = [
            "writer" => $writer,
            "quotes" => $quotes
        ];

        return view("dashboard.quote", $data);
    }

    public function dashboardQuoteAddView(Request $request)
    {
        if(!$request->session()->has("id")){
            return redirect("/dashboard/login");
        }

        $writer = Writer::find($request->session()->get("id"));

        $data = [
            "writer" => $writer
        ];

        return view("dashboard.quote_add", $data);
    }

    public function dashboardQuoteUpdateView(Request $request, $id)
    {
        if(!$request->session()->has("id")){
            return redirect("/dashboard/login");
        }

        $quote = Quote::with("writer")->find($id);
        
        $data = [
            "writer" => $quote->writer,
            "quote" => $quote
        ];

        return view("dashboard.quote_update", $data);
    }

    public function addAction(Request $request)
    {
        if(!$request->session()->has("id")){
            return redirect("/dashboard/login");
        }

        $this->validate($request, [
            "quote" => "required",
        ],$this->validationErrorMsg());

        $writer = Writer::find($request->session()->get("id"));

        $body = [
            "quote" => $request->input("quote"),
            "writer_id" => $writer->id
        ];

        Quote::create($body);

        return redirect("/dashboard/quote")->with("successMsg", "Quote ditambahkan");
    }

    public function updateAction(Request $request, $id)
    {
        if(!$request->session()->has("id")){
            return redirect("/dashboard/login");
        }

        $this->validate($request, [
            "quote" => "required",
        ],$this->validationErrorMsg());

        $quote = Quote::with("writer")->find($id);

        $body = [
            "quote" => $request->input("quote"),
            "writer_id" => $quote->writer->id
        ];

        $quote->update($body);

        return redirect("/dashboard/quote")->with("successMsg", "Quote diperbarui");
    }

    public function deleteAction(Request $request, $id)
    {
        if(!$request->session()->has("id")){
            return redirect("/dashboard/login");
        }

        $quote = Quote::find($id);
        $quote->delete();

        return redirect("/dashboard/quote")->with("successMsg", "Quote dihapus");
    }
}
