<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SmsRequest;
use App\Models\Sms;
use App\Models\User;

class SmsController extends Controller
{
    public function send(SmsRequest $req){

		$phone = preg_replace('/\D/', '', $req->input('phone'));
		$type = $req->input('type');

    	$time = time();

    	$re_sms = Sms::where([
    		['phone', '=', $phone],
    		['action', '=', $type],
    	])->first();

    	if($re_sms === null){

			$new_sms = new Sms;
			$new_sms->phone = $phone;
			$new_sms->action = $type;
			$new_sms->save();

    	}else{

    		$diff = $time - $re_sms->time;
    		if($diff < 60){
    			return response()->json(['errors'=>[
    				'timelimit' => 'Повторное смс будет доступно через '.(60 - $diff).' секунд',
    			]], 400);
    		}elseif($re_sms->action == 'reg' && $re_sms->status == 1){
    			return response()->json(['errors'=>[
    				'exist' => 'Пользователь уже прошел проверку',
    			]], 400);
    		}else{
    			//$re_sms->code = rand(1000, 9999);
    			$re_sms->code = 1111;
    			$re_sms->time = time();
    			$re_sms->status = 0;
    			$re_sms->save();
    		}

    	}

   		return response()->json(['success'=>true], 200);
    }

    public function check(SmsRequest $req){
    	$phone = preg_replace('/\D/', '', $req->input('phone'));
		$type = $req->input('type');
		$code = $req->input('code');
    	$time = time();

    	$re_sms = Sms::where([
    		['status', '=', 0],
    		['phone', '=', $phone],
    		['action', '=', $type],
    		['code', '=', $code],
    	])->first();
    	if($re_sms === null){
			return response()->json(['errors'=>[
    			'code' => 'Код смс введен не верно',
    		]], 400);
    	}else{
    		if(($time - $re_sms->time) > (60 * 60)){
    			return response()->json(['errors'=>[
    				'codelimit' => 'Проверочный код истек, повторите отправку'.($time - $re_sms->time),
    			]], 400);
    		}
    		$re_sms->status = 1;
    		$re_sms->save();
    	}
    	return response()->json(['success'=>true], 200);
    }
}
