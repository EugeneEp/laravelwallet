<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WalletController extends Controller
{
	public function charge(Request $req){
		return response()->json([
			'errors'=>['unready'=>'Метод еще не готов']
		], 403);
	}

	public function donate(Request $req){
		return response()->json([
			'errors'=>['unready'=>'Метод еще не готов']
		], 403);
	}

	public function moneybank(Request $req){
		return response()->json([
			'errors'=>['unready'=>'Метод еще не готов']
		], 403);
	}

	public function transfer(Request $req){
		return response()->json([
			'errors'=>['unready'=>'Метод еще не готов']
		], 403);
	}
}
