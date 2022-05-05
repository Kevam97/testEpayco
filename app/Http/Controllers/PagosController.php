<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pago;
use Illuminate\Support\Str;

class PagosController extends Controller{

    public function pagar($documento){

        try {
            $pago = new Pago;

            $token = Str::random(6);
            $pago->cliente_fk = $documento;
            $pago->token_enviado= $token;
            $pago->confirmado = false;

            $pago->save();

            return response()->json(["succes"=>"True", "Code"=>"00"]);
        } catch (\Throwable $th) {
            return response()->json($th);
        }
        
    }

    public function confirmapago(Request $request){

        try {
            $query = Pago:: where('id',$request->id)
                        ->where('token_enviado',$request->token)
                        ->update(['confirmado'=>true]);
            return response()->json(["succes"=>"True", "Code"=>"00"]);
        } catch (\Throwable $th) {
            return response()->json($th);
        }
        
    }

}