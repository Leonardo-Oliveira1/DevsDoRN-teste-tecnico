<?php

namespace App\Http\Controllers;

use App\Models\Annuity;
use Illuminate\Http\Request;

class AnnuitiesController extends Controller
{
    public function index()
    {
        return view('annuities', ['annuities' => $this->getAnnuitiesData()]);
    }

    public function registerIndex()
    {
        return view('registerAnnuity');
    }

    public function editIndex($id)
    {
        return view('editAnnuity', ['annuity' => $this->getAnnuityData($id)]);
    }

    public function removeCurrencyStyle($text)
    {
        $remove_comma = str_replace(",", ".", $text);
        $final = str_replace("R$ ", "", $remove_comma);

        return $final;
    }

    public function getAnnuitiesData()
    {
        $data = Annuity::orderBy('year', 'ASC')->get();

        return $data;
    }

    public function getAnnuityData($id)
    {
        $data = Annuity::where('id', "=", $id)->first();

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
        } else {
            return redirect()->route('registerAnnuity')
                ->with('error', 'Este ano já tem uma anuidade cadastrada.');
        }

        return redirect()->route('annuities');
    }

    public function edit(Request $request, $id)
    {
        $annuity = Annuity::find($id);

        $price = $this->removeCurrencyStyle($request->input('price'));

        $annuity->price = $price;

        $annuity->save();

        return redirect('/anuidades')
            ->with('success', 'Valor da anuidade alterada com sucesso!');
    }
}
