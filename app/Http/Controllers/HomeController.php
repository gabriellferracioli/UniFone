<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientesligacoes = DB::select('select lig.id_cliente adm, 
                                        cli.nome_cliente cnome, count(lig.id_cliente)
                                        from ligacoes lig, clientes cli
                                        where lig.id_cliente = cli.id_cliente
                                        group by lig.id_cliente
                                        order by count(lig.id_cliente) desc
                                        limit 5;');
        
        $ultimasligacoes = DB::select('select lig.id_cliente adm, cli.nome_cliente cnome, count(lig.id_cliente)
        from ligacoes lig, clientes cli
        where lig.id_cliente = cli.id_cliente
        group by lig.id_cliente
        order by count(lig.id_cliente) desc
        limit 5;');

        return view('home', compact('clientesligacoes','ultimasligacoes'));
    }
}
