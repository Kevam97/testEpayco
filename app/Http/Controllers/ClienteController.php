<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller{

    public function guardar(Request $request){

        try {
            $cliente = new Cliente;
            $cliente->documento = $request->documento;
            $cliente->nombre = $request->nombre;
            $cliente->email = $request->email;
            $cliente->celular = $request->celular;
    
            $flag = $cliente->save();
            return response()->json(["succes"=>"True", "Code"=>"00"]);
        } catch (\Throwable $th) {
            return response()->json($th);
        }
       
        
        
    }

}