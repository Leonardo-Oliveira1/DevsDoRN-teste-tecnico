<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Associate;


class AssociatesController extends Controller
{
    public function index(){
        return view('associates');

    }

    public function registerIndex(){
        return view('registerAssociate');

    }


    public function totalStock($name)
    {
        //$total = ItemStock::select()->whereRaw("name = '$name'")->sum("quantity");

        //return $total;
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

        $associate->save();

        return redirect('/');
    }
}
