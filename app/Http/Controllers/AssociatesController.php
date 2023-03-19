<?php

namespace App\Http\Controllers;

use App\Models\Annuity;
use Illuminate\Http\Request;
use App\Http\Controllers\PaymentController;
use App\Models\Associate;

class AssociatesController extends Controller
{
    public function index()
    {
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
        $membership_date = $request->input('date');

        $associate->name = $name;
        $associate->email = $email;
        $associate->cpf = $cpf;
        $associate->membership_date = $membership_date;

        $annuity_year_exists_in_database = !Annuity::where('year', date("Y", strtotime($membership_date)))->get()->isEmpty();

        if ($annuity_year_exists_in_database == true) {

            $is_user_not_already_registered = Associate::where('cpf', $cpf)->get()->isEmpty();
            if ($is_user_not_already_registered) {
                $associate->save();
                $payments->storePayment($associate->id, $this->getAssociateAnnuitiesData($associate->id, "year"), $this->getAssociateAnnuitiesData($associate->id, "price"));
            } else {
                return redirect()->route('registerAssociate')
                    ->with('error', 'Este associado já está cadastrado no sistema.');
            }
        } else {
            return redirect()->route('registerAssociate')
                ->with('error', 'Você precisa criar as anuidades de ' . date("Y", strtotime($membership_date)) . ' até o ano atual para registrar este associado.');
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

        for ($i = 0; $i < count($this->getAssociatesData()); $i++) {
            array_push($array, $payments->getTotalDebt($this->getAssociatesData()[$i]->id));
        }

        return $array;
    }
}
