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
        $payments = new PaymentController;

        return view('associates', [
            'associates' => array_map(null, json_decode($this->getAssociatesData(), false), $this->getAssociateTotalDebts())
        ]);
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
            'payments' => $payments->getAssociatePaymentInfo($id),
            'total_price' => $payments->getTotalDebt($id),
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
            $payments->storePayment($associate->id, $this->getAssociateAnnuitiesData($associate->id, "year"), $this->getAssociateAnnuitiesData($associate->id, "price"));
        } else {
            return redirect()->route('associates')
                ->with('error', 'Este associado já está cadastrado no sistema.');
        }

        return redirect()->route('associates');
    }


    public function getAssociateAnnuitiesData($id, $type)
    {
        $data = Associate::where('id', "=", $id)->first();
        $membership_date = date('Y', strtotime($data->membership_date));
        $associate_annuities = Annuity::orderBy('year', 'ASC')->select()->whereRaw("year >= '$membership_date' and year <= CURDATE()")->get();

        $array = array();

        foreach ($associate_annuities as $annuity) {
            array_push($array, $annuity->$type);
        }

        return $array;
    }

    public function getAssociateTotalDebts()
    {
        $payments = new PaymentController;


        $array = array();

        for ($i=0; $i < count($this->getAssociatesData()); $i++) {
            array_push($array, $payments->getTotalDebt($this->getAssociatesData()[$i]->id));
        }

        return $array;
    }
}
