<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function storePayment($associate_id, $years, $prices){
        for ($i=0; $i < count($prices); $i++) {
            DB::unprepared("insert into `payments` (`associate_id`, `year`, `price`, `paid`, `updated_at`, `created_at`) values ($associate_id, $years[$i], $prices[$i], 0, CURDATE(), CURDATE())");
        }

    }

    public function getAssociatePaymentInfo($associate_id){
        $infos = Payment::select()->whereRaw("associate_id = '$associate_id'")->get();

        return $infos;
    }

    public function getTotalDebt($associate_id){
        $total = Payment::select()->whereRaw("associate_id = '$associate_id' and paid != '1'")->sum("price");

        return $total;
    }
}
