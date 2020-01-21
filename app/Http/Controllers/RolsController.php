<?php

namespace App\Http\Controllers;
use App\rols;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
class RolsController extends Controller
{
    public function showPage()
    {
        return view('menus.rols');
    }

    public function listAll()
    {
        return Datatables::of(rols::select('id','nombre')->get())->make(true);
    }

    
    public function setSession(Request $request)
    {
         $request->session()->put('idRols',$request->id);
         return response()->json(["Sesion"=>"Asignado"]);
    }


    public function save(Request $request)
    {
        if ($request->ajax()) {
            if ($request->Accion == "Registrar") {
				$rol           = new rols;
				$rol->nombre    = $request->Nombre;
				
                if($rol->save())
                    return response()->json(["Estado"=>"Registrado"]);
                else
                    return response()->json(["Estado"=>"Error"]);    
            }else if($request->Accion == "Editar"){
                $rol         = rols::find($request->session()->get('idRols'));
               	$rol->nombre    = $request->Nombre;
                if($rol->save())
                    return response()->json(["Estado"=>"Editado"]);
                else
                    return response()->json(["Estado"=>"Error"]);    
            } 
            $request->session()->forget('idRols');
        }else
            return response()->json(["Estado"=>"Error"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\rols  $rol
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $rol = rols::find($request->id);
        if (!is_null($rol)) {
            $rol->delete();
            return response()->json(["Estado"=>"Eliminado"]);
        }
            return response()->json(["Estado"=>"Error"]);
    }

    
}
