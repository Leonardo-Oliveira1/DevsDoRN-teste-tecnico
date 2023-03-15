<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Associate;


class AssociatesController extends Controller
{
    public function index(){
        return view('associates', ['associates' => $this->getAllAssociateData()]);

    }

    public function registerIndex(){
        return view('registerAssociate');

    }


    public function getAllAssociateData()
    {
        $data = Associate::orderBy('name', 'ASC')->get();

        return $data;
    }

    public function store(Request $request)
    {
        $associate = new Associate;

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
        }else{
            return redirect()->route('associates')
            ->with('error','Este associado já está cadastrado no sistema.');
        }

        return redirect('associates');
    }
}
