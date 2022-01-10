<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Producto;
use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Cita;
use App\Models\Pago;
use App\Models\Documento;
use App\Models\Pedido;

class ReportesExport implements FromCollection
{
    public $tabla;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($tabla)
    {
        $this->tabla = $tabla;
    }

    public function collection()
    {
        date_default_timezone_set("America/La_Paz");
        $modelo=$this->tabla;
        if ($modelo=="productos")
        return Producto::whereDate('created_at',Carbon::today())->get();
        if ($modelo=="clientes")
        return Cliente::whereDate('created_at',Carbon::today())->get();
        if ($modelo=="empleados")
        return Empleado::whereDate('created_at',Carbon::today())->get();
        if ($modelo=="documentos")
        return Documento::whereDate('created_at',Carbon::today())->get();
        if ($modelo=="pedidos")
        return Pedido::whereDate('created_at',Carbon::today())->get();
        if ($modelo=="pagos")
        return Pago::whereDate('created_at',Carbon::today())->get();
        //dd(Producto::all());
        return Cita::whereDate('created_at',Carbon::today())->get();
    }
}
