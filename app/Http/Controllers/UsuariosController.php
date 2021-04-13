<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Usuarios;
use App\Paquetes;
use App\Pdf;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\UsuariosFormrequest;
use App\Http\Requests\UsuariosUpdateFormrequest;

use DB;

class UsuariosController extends Controller
{
    //

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
            $usuarios=DB::table('usuarios')
            ->join('paquetes','paquetes.id_paquete','usuarios.id_paquete')
            ->select('usuarios.*','paquetes.nombre')
            ->where('documento','LIKE','%'.$query.'%')
            ->where('nombre_completo','LIKE','%'.$query.'%')
            ->where('correo_electronico','LIKE','%'.$query.'%')
            ->where('telefono','LIKE','%'.$query.'%')
            ->where('fecha_llamada','LIKE','%'.$query.'%')
            ->where('ciudad','LIKE','%'.$query.'%')
            ->where('motivo_celebracion','LIKE','%'.$query.'%')
            ->where('fecha_evento','LIKE','%'.$query.'%')
            ->where('fecha_fin_evento','LIKE','%'.$query.'%')
            ->where('numero_invitado','LIKE','%'.$query.'%')
            ->where('rango_edad_inv','LIKE','%'.$query.'%')
            ->where('duracion','LIKE','%'.$query.'%')
            ->where('nombre_anfitrion','LIKE','%'.$query.'%')
            ->where('edad_anfitrion','LIKE','%'.$query.'%')
            ->where('comunicado','LIKE','%'.$query.'%')
            ->where('nombre_asesor','LIKE','%'.$query.'%')
            ->where('observacion','LIKE','%'.$query.'%')
            ->orderBy('usuarios.id_usuario','desc')
            ->paginate(10);
            return view('usuarios.list', ['usuarios' => $usuarios, 'searchText' => $query]);
        } 

        
    }

    public function create()
    {
        $paquetes = Paquetes::all();
        return view('usuarios.create', compact('paquetes'));
    }

    public function store(UsuariosFormrequest $request){

        $usuarios=new Usuarios;
        $usuarios->id_paquete=$request->get('nombre');
        $usuarios->costo_paquete= $request->get('costo_paquete');
        $usuarios->documento=$request->get('documento');
        $usuarios->nombre_completo=$request->get('nombre_completo');
        $usuarios->correo_electronico=$request->get('correo_electronico');
        $usuarios->telefono=$request->get('telefono');
        $usuarios->fecha_llamada=now();
        $usuarios->ciudad=$request->get('ciudad');
        $usuarios->motivo_celebracion=$request->get('motivo_celebracion');
        $usuarios->fecha_evento=$request->get('fecha_evento');
        $usuarios->fecha_fin_evento=$request->get('fecha_fin_evento');
        $usuarios->numero_invitado=$request->get('numero_invitado');
        $usuarios->rango_edad_inv=$request->get('rango_edad_inv');
        $usuarios->duracion=$request->get('duracion');
        $usuarios->nombre_anfitrion=$request->get('nombre_anfitrion');
        $usuarios->edad_anfitrion=$request->get('edad_anfitrion');
        $usuarios->comunicado=$request->get('comunicado');
        $usuarios->nombre_asesor=$request->get('nombre_asesor');
        $usuarios->observacion=$request->get('observacion');
        $usuarios->save();
        return Redirect::to('usuarios');
    }

    public function show($id)
    {
        return view ("usuarios.show",["usuarios"=>Usuarios::findOrFail($id)]);
    }

    public function edit($id)
    {
        $paquetes = DB::table('paquetes')->get();
        $usuarios = Usuarios::where('id_usuario', $id)->first();
        return view('usuarios.edit', compact('paquetes', 'usuarios'));

    }

    public function update(UsuariosUpdateFormRequest $request,$id){

        $usuarios=Usuarios::findOrFail($id);
        $usuarios->id_paquete=$request->get('nombre');
        $usuarios->costo_paquete= $request->get('costo_paquete');
        $usuarios->documento=$request->get('documento');
        $usuarios->nombre_completo=$request->get('nombre_completo');
        $usuarios->correo_electronico=$request->get('correo_electronico');
        $usuarios->telefono=$request->get('telefono');
        $usuarios->fecha_llamada=now();
        $usuarios->ciudad=$request->get('ciudad');
        $usuarios->motivo_celebracion=$request->get('motivo_celebracion');
        $usuarios->fecha_evento=$request->get('fecha_evento');
        $usuarios->fecha_fin_evento=$request->get('fecha_fin_evento');
        $usuarios->numero_invitado=$request->get('numero_invitado');
        $usuarios->rango_edad_inv=$request->get('rango_edad_inv');
        $usuarios->duracion=$request->get('duracion');
        $usuarios->nombre_anfitrion=$request->get('nombre_anfitrion');
        $usuarios->edad_anfitrion=$request->get('edad_anfitrion');
        $usuarios->comunicado=$request->get('comunicado');
        $usuarios->nombre_asesor=$request->get('nombre_asesor');
        $usuarios->observacion=$request->get('observacion');
        $usuarios->save();

        return Redirect::to('usuarios');
    }

    public function destroy($id){

        $usuarios =  Usuarios::findOrFail($id);
        $usuarios->condicion='0';
        $usuarios->delete();
        return Redirect::to('usuarios');
    }

    public function pdf(Request $request,$id_usuario){

        $usuarios = Usuarios::join('paquetes','usuarios.id_paquete','=','paquetes.id_paquete')
        ->select('usuarios.id_usuario','usuarios.documento','usuarios.nombre_completo','usuarios.telefono','usuarios.correo_electronico',
        'usuarios.nombre_anfitrion','usuarios.fecha_evento','usuarios.fecha_fin_evento','usuarios.ciudad','usuarios.fecha_llamada','usuarios.ciudad','usuarios.motivo_celebracion','usuarios.numero_invitado',
        'usuarios.edad_anfitrion','usuarios.duracion','usuarios.comunicado','usuarios.nombre_asesor', 'usuarios.observacion',
        'paquetes.nombre as nombre','paquetes.descripcion_p as descripcion_p','paquetes.costo_paquete as costo_paquete')
        ->where('usuarios.id_usuario','=',$id_usuario)
        ->orderBy('usuarios.id_usuario','desc')->get();

        $pdf= \PDF::loadView('pdf.usuarios', ["usuarios"=>$usuarios]);
        return $pdf->download('usuarios.pdf');
    }
}
