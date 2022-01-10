<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Exports\ReportesExport;
use Maatwebsite\Excel\Facades\Excel;

class ReporteController extends Controller
{
    
    public function reporte_hoy(Request $request){

        date_default_timezone_set("America/La_Paz");
        $tabla="productos";
        if ($tabla==null){
            $datos = DB::table('productos')->where('created_at',Carbon::today())->get();
            //$datos = DB::connection('tenant')->table('productos')->where('created_at',Carbon::today())->get();
        }else{
            $datos=DB::table($tabla)->where('created_at',Carbon::today())->get();
            //$datos=DB::connection('tenant')->table($tabla)->where('created_at',Carbon::today())->get();
        }

        $total = $datos->count();
        $fecha=Carbon::now();
        $fechaini=$fecha->format('Y-m-d');
        $fechafin=$fecha->format('Y-m-d');
        return view('reporte.index',compact('datos','total','fechaini','fechafin','tabla'));
    }
    public function reporte_fecha(Request $request){
        
        date_default_timezone_set("America/La_Paz");
        $fi=$request->fecha_ini.' 00:00:00';
        $ff=$request->fecha_fin.' 23:59:59';

        $tabla=$request->tabla;
        if ($tabla==null){
            $datos = DB::table('productos')->whereBetween('created_at',[$fi,$ff])->get();
            //$datos = DB::connection('tenant')->table('productos')->whereBetween('created_at',[$fi,$ff])->get();
        }else{
            $datos = DB::table($tabla)->whereBetween('created_at',[$fi,$ff])->get();
            //$datos=DB::connection('tenant')->table($tabla)->whereBetween('created_at',[$fi,$ff])->get();
        }      
        //$personas=Persona::whereBetween('created_at',[$fi,$ff])->get();
        $total = $datos->count();
        $fechaini=$request->fecha_ini;
        $fechafin=$request->fecha_fin;
        return view('reporte.index',compact('datos','total','fechaini','fechafin','tabla'));
    }

    public function convert_pdf($tabla){
        return Excel::download(new ReportesExport($tabla), 'reportes.xlsx');
    }
}
