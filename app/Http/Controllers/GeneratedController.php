<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\generated_ids;
// use PDF;

class GeneratedController extends Controller
{
    public function qr(){
        // for ($i=0; $i < 10; $i++) {
        //     $generated_id = uniqid();
        //     $generated_ids = new generated_ids();
        //     $generated_ids->generated_id = $generated_id;
        //     $generated_ids->save();
        // }
       $generated_idss = generated_ids::select("generated_id")->get();
       $urls = [];
        foreach ($generated_idss as $generated_id) {
            $generated_id = $generated_id->generated_id;
            // send request to google api to generate qr code and save it in public folder
            $url = "https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=$generated_id&choe=UTF-8";
            array_push($urls, $url);
        }
        $view = view('dashboard.admin.qr', compact('urls'))->render();
        $ppdf = \App::make('dompdf.wrapper');
        $ppdf->loadHTML($view);
        $ppdf->setPaper('legal', 'portrait')->setWarnings(false);
        // $ppdf->render();
        // $ppdf->stream("dsdf"."-"."1551"."-"."adasfa".".pdf");
        // save pdf to public folder
        $random = rand(1, 100000);
        // $output = $ppdf->output();
        // file_put_contents(public_path()."/qr-codes/q1".$random."1r.pdf", $output);
        // return $ppdf->download('qr.pdf');


        // dd($view);
        // $ppdf = Pdf::loadView($view);
        // $ppdf->setPaper('a4', 'portrait')->setWarnings(false);
        // return $ppdf->download('ds.pdf');
        // dd($urls);
        return view('dashboard.admin.qr', compact('urls'));
    }
}
