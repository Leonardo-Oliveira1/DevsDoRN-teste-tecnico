<?php

namespace App\Http\Controllers;

use App\Models\Annuity;
use Illuminate\Http\Request;

class AnnuitiesController extends Controller
{
    public function index(){
        return view('annuities', ['annuities' => $this->getAllAnnuityData()]);

    }

    public function registerIndex(){
        return view('registerAnnuity');

    }

    public function removeCurrencyStyle($text){
        $remove_comma = str_replace(",", ".", $text);
        $final = str_replace("R$ ", "", $remove_comma);

        return $final;
    }

    public function getAllAnnuityData()
    {
        $data = Annuity::orderBy('year', 'ASC')->get();

        return $data;
    }

    public function store(Request $request)
    {
        $annuity = new Annuity;

        $year = $request->input('year');
        $price = $this->removeCurrencyStyle($request->input('price'));

        $annuity->year = $year;
        $annuity->price = $price;

        if (Annuity::where('year', $year)->get()->isEmpty()) {
            $annuity->save();
        }else{
            return redirect()->route('annuities')
            ->with('error','Este ano já tem uma anuidade cadastrada.');
        }

        return redirect()->route('annuities');
    }
}
