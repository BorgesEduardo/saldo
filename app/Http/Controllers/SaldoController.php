<?php

namespace App\Http\Controllers;

use App\Http\Resources\SaldoCollection;
use App\Saldo;
use Illuminate\Http\Request;

class SaldoController extends Controller
{

    

    public function __construct()
    {
        $this->clientes = [
            ['id' => 1, 'cliente' => 'Eduardo', 'valor' => 100],
            ['id' => 2, 'cliente' => 'Felipe', 'valor' => 200],
            ['id' => 3, 'cliente' => 'Adhemar', 'valor' => 300],
            ['id' => 4, 'cliente' => 'Salsicha', 'valor' => 400],
        ];
    }

    public function store(Request $request)
    {
        /* $saldo = new Saldo([

        ]);

        $saldo->save(); */
        
        array_push($this->clientes, ['id' => '5', 'cliente' => $request->get('cliente'), 'valor' => $request->get('valor')]);

            
        return response()->json($request->all());
    }

    public function index()
    {
        #return new SaldoCollection(Saldo::all());

        return response()->json($this->clientes);
    }

    public function edit($id)
    {
        #$saldo = Saldo::find($id);

        return response()->json($this->clientes[$id-1]);
    }

    public function update($id, Request $request)
    {
        $saldo = Saldo::find($id);

        $saldo->update($request->all());

        return response()->json('Item atualizado');
    }

    public function delete($id)
    {
        $saldo = Saldo::find($id);

        $saldo->delete();

        return response()->json('Item atualizado');
    }
}
