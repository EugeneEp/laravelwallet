<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public $timestamps = false;

    public static function parse(&$result){
    	foreach ($result as &$value) {
    		$value->time = date('Y-m-d H:i:s', $value->time);
    		$value->movement_type = Transaction::parseType($value->movement_type);
    	}
    }

    public static function parseCSV(&$result){
        foreach ($result as &$value) {
            $value->time = date('Y-m-d H:i:s', $value->time);
            $value->movement_type = Transaction::parseType($value->movement_type);

            unset($value->id);
            unset($value->wallet_sender_id);
            unset($value->commission);
            unset($value->secret_t);
            unset($value->card);
            unset($value->email);
            unset($value->link);
        }
    }

    public static function parseType($type){
    	$types = [
    		'charge'=>'Пополнение',
    		'withdraw'=>'Вывод',
    		'payment'=>'Перевод',
    	];

    	return $types[$type];
    }

    public static function ArrToCSV($fileName, $head, $body){

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $callback = function() use($head, $body) {

            $file = fopen('php://output', 'w');
            fputs($file, $bom =(chr(0xEF) . chr(0xBB) . chr(0xBF)));
            fputcsv($file, $head, ';');

            foreach($body as $row)
                fputcsv($file, $row, ';');

            fclose($file);
        };
        return response()->stream($callback, 200, $headers);
    }

}
