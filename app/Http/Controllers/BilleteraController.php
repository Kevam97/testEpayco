<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Billetera;

class BilleteraController extends Controller{
    public function recargar(Request $request){

        try {
            $billetera = new Billetera;
        
            $billetera->cliente_fk = $request->documento;
            $billetera->numero = $request->celular;
            $billetera->valor = $request->valor;

            $billetera->save();
            return response()->json(["succes"=>"True", "Code"=>"00"]);
        } catch (\Throwable $th) {
            return response()->json($th);
        }
        
       
    }

    public function consultar($documento, $celular){
       try {
            $query = Billetera::where('cliente_fk',$documento)
                                ->where('numero',$celular)
                                ->get();

            return response()->json(["succes"=>"True", "Code"=>"00"]);
       } catch (\Throwable $th) {
            return response()->json($th);
       }
       


    }
}