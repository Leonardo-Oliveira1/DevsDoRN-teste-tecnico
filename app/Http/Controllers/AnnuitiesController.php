<?php

namespace App\Http\Controllers;

use App\Models\Annuity;
use Illuminate\Http\Request;

class AnnuitiesController extends Controller
{
    public function index(){
        return view('annuities');

    }

    public function registerIndex(){
        return view('registerAnnuity');

    }

    public function removeCurrencyStyle($text){
        $remove_comma = str_replace(",", ".", $text);
        $final = str_replace("R$ ", "", $remove_comma);

        return $final;
    }

    public function store(Request $request)
    {
        $annuity = new Annuity;

        $year = $request->input('year');
        $price = $this->removeCurrencyStyle($request->input('price'));

        $annuity->year = $year;
        $annuity->price = $price;

        $annuity->save();

        return redirect('/');
    }
}
