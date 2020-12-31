<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function transactions(Request $req){

    	$user_id = auth()->user()->id;

    	$query = [
    		['user_id', '=', auth()->user()->id],
    	];

    	$from = $req->from ?? 0;
    	$to = $req->to ?? 0;
    	$csv = $req->csv ?? 0;

    	if($from)$query[]=['time', '>', strtotime($from)];
    	if($from)$query[]=['time', '<', strtotime($to)];

    	if($csv){
    		$result = Transaction::where($query)->orderBy('id', 'DESC')->get();
    		Transaction::parseCSV($result);
			$head = array('ОТПРАВИТЕЛЬ', 'ПОЛУЧАТЕЛЬ', 'ТИП ТРАНЗАКЦИИ', 'СУММА', 'ДАТА', 'СТАТУС');
			return Transaction::ArrToCSV('транзакции.csv', $head, $result->toArray());
    	}else{
    		$result = Transaction::where($query)->orderBy('id', 'DESC')->paginate(10);
    		Transaction::parse($result);
	    	return view('wallet.transactions', [
	    		'data' => $result,
	    	]);	
    	}
    	
    }

}
