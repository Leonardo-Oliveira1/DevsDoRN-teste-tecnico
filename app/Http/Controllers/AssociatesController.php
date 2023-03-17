<?php

namespace App\Http\Controllers;

use App\Models\Annuity;
use Illuminate\Http\Request;
use App\Http\Controllers\AnnuitiesController;
use App\Http\Controllers\PaymentController;
use App\Models\Associate;
use App\Models\Payment;

class AssociatesController extends Controller
{
    public function index()
    {
        return view('associates', ['associates' => $this->getAssociatesData()]);
    }

    public function registerIndex()
    {
        return view('registerAssociate');
    }

    public function AssociateIndex($id)
    {
        $payments = new PaymentController;

        return view('associatePaymentStatus', [
            'associate' => $this->getAssociateData($id),
            'year' => $this->getAssociateAnnuitiesYear($id),
            'prices' => $this->getAssociateAnnuitiesPrice($id),
            'total_price' => "a",
        ]);
    }


    public function getAssociatesData()
    {
        $data = Associate::orderBy('name', 'ASC')->get();

        return $data;
    }

    public function getAssociateData($id)
    {
        $data = Associate::where('id', "=", $id)->first();

        return $data;
    }

    public function store(Request $request)
    {
        $associate = new Associate;
        $payments = new PaymentController;

        $name = $request->input('name');
        $email = $request->input('email');
        $cpf = $request->input('cpf');
        $date = $request->input('date');

        $associate->name = $name;
        $associate->email = $email;
        $associate->cpf = $cpf;
        $associate->membership_date = $date;



        if (Associate::where('cpf', $cpf)->get()->isEmpty()) {
            $associate->save();
            $payments->storePayment($associate->id, $this->getAssociateAnnuitiesYear($associate->id), $this->getAssociateAnnuitiesPrice($associate->id));
        } else {
            return redirect()->route('associates')
                ->with('error', 'Este associado já está cadastrado no sistema.');
        }

        return redirect()->route('associates');
    }


    public function getAssociateAnnuitiesYear($id)
    {
        $data = Associate::where('id', "=", $id)->first();
        $membership_date = date('Y', strtotime($data->membership_date));
        $associate_annuities = Annuity::orderBy('year', 'ASC')->select()->whereRaw("year >= '$membership_date' and year <= CURDATE()")->get();

        $year = array();

        foreach ($associate_annuities as $annuity) {
            array_push($year, $annuity->year);
        }

        return $year;
    }

    public function getAssociateAnnuitiesPrice($id)
    {
        $data = Associate::where('id', "=", $id)->first();
        $membership_date = date('Y', strtotime($data->membership_date));
        $associate_annuities = Annuity::orderBy('year', 'ASC')->select()->whereRaw("year >= '$membership_date' and year <= CURDATE()")->get();

        $price = array();

        foreach ($associate_annuities as $annuity) {
            array_push($price, $annuity->price);
        }

        return $price;
    }

}
