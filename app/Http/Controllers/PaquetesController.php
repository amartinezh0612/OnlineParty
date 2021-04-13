<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Paquetes;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\PaquetesFormrequest;
use App\Http\Requests\PaquetesUpdateFormrequest;

use DB;

class PaquetesController extends Controller
{
        //definicion de funciones
        public function __construct()
        {
    
        }

        public function index(Request $request)
    {
       /*  $usuarios=Usuarios::orderBy('id_usuario','DESC')->paginate();
        return view('usuarios.list',compact('usuarios')); */

       if($request){
            $query=trim($request->get('searchText'));
            $paquetes=DB::table('paquetes')
            ->where('nombre','LIKE','%'.$query.'%')
            ->where('descripcion_p','LIKE','%'.$query.'%')
            ->where('costo_paquete','LIKE','%'.$query.'%')
            ->orderBy('paquetes.id_paquete','desc')
            ->paginate(10);
            return view('paquetes.list',["paquetes"=>$paquetes,"searchText"=>$query]);
        } 
    }

    public function create()
    {
         return view("paquetes.create");
    }

    public function store(PaquetesFormrequest $request){

        $paquetes=new Paquetes;
        $paquetes->nombre=$request->get('nombre');
        $paquetes->descripcion_p=$request->get('descripcion_p');
        $paquetes->costo_paquete=$request->get('costo_paquete');
        $paquetes->save();
        return Redirect::to('paquetes');
    }

    public function show($id)
    {
        return view ("paquetes.show",["paquetes"=>Paquetes::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view ("paquetes.edit",["paquetes"=>Paquetes::findOrFail($id)]);

    }

    public function update(PaquetesUpdateFormRequest $request,$id){

        $paquetes=Paquetes::findOrFail($id);
        $paquetes->nombre=$request->get('nombre');
        $paquetes->descripcion_p=$request->get('descripcion_p');
        $paquetes->costo_paquete=$request->get('costo_paquete');
        $paquetes->save();

        return Redirect::to('paquetes');
    }

    public function destroy($id){

        $paquetes =  Paquetes::findOrFail($id);
        $paquetes->condicion='0';
        $paquetes->delete();
        return Redirect::to('paquetes');
    }

}
