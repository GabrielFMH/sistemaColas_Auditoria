<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Informe;
use App\Models\Caja;

// Controlador principal para la gestión de colas.
// Edita aquí la lógica de generación de turnos y vistas.
// No elimines los métodos ni cambies la lógica de numeración si quieres mantener el funcionamiento básico.
class ColaController extends Controller
{
    // Muestra la pantalla principal con los botones de opciones.
    public function index()
    {
        return view('cola.index');
    }

    // Genera un turno para Informes, incrementando automáticamente el número.
    // Si la tabla está vacía, comienza desde 1.
    public function turnoInforme()
    {
        $ultimo = Informe::orderByDesc('id')->first();
        $num = $ultimo ? $ultimo->num_ticket + 1 : 1;
        $informe = Informe::create(['num_ticket' => $num]);
        // No cambies la vista ni la lógica de numeración para mantener el flujo correcto.
        return view('cola.turno', [
            'tipo' => 'INF',
            'num' => $num
        ]);
    }

    // Genera un turno para Caja, incrementando automáticamente el número.
    // Si la tabla está vacía, comienza desde 1.
    public function turnoCaja()
    {
        $ultimo = Caja::orderByDesc('id')->first();
        $num = $ultimo ? $ultimo->num_ticket + 1 : 1;
        $caja = Caja::create(['num_ticket' => $num]);
        // No cambies la vista ni la lógica de numeración para mantener el flujo correcto.
        return view('cola.turno', [
            'tipo' => 'CA',
            'num' => $num
        ]);
    }

    // Muestra la vista TV con el último llamado en grande y los siguientes 3 en cola
    public function vistaTV()
    {
        $informes = Informe::where('atencion', 'llamado')->orderBy('updated_at', 'desc')->get();
        $cajas = Caja::where('atencion', 'llamado')->orderBy('updated_at', 'desc')->get();
        // Obtener el último llamado de cada tipo
        $ultimoInforme = $informes->first();
        $colaInformes = $informes->slice(1, 3);
        $ultimoCaja = $cajas->first();
        $colaCajas = $cajas->slice(1, 3);
        return view('cola.tv', compact('ultimoInforme', 'colaInformes', 'ultimoCaja', 'colaCajas'));
    }

    // Muestra la vista empleado con opciones para informes y caja
    public function vistaEmpleado()
    {
        return view('cola.empleado');
    }

    // Muestra los códigos no atendidos de informes para el empleado
    public function empleadoInformes()
    {
        $informes = Informe::where('atencion', 'no atendido')->orderBy('num_ticket')->get();
        return view('cola.empleado_informes', compact('informes'));
    }

    // Muestra los códigos no atendidos de caja e informes para el empleado
    public function empleadoCaja()
    {
        $informes = Informe::where('atencion', 'no atendido')->orderBy('num_ticket')->get();
        $cajas = Caja::where('atencion', 'no atendido')->orderBy('num_ticket')->get();
        return view('cola.empleado_caja', compact('informes', 'cajas'));
    }

    // Cambia el estado de atención a 'llamado' para un ticket
    public function llamarTicket($tipo, $id)
    {
        if ($tipo === 'informe') {
            $ticket = Informe::findOrFail($id);
        } else {
            $ticket = Caja::findOrFail($id);
        }
        $ticket->atencion = 'llamado';
        $ticket->save();
        return back();
    }

    // Cambia el estado de atención a 'no esta' para un ticket
    public function sacarTicket($tipo, $id)
    {
        if ($tipo === 'informe') {
            $ticket = Informe::findOrFail($id);
        } else {
            $ticket = Caja::findOrFail($id);
        }
        $ticket->atencion = 'no esta';
        $ticket->save();
        return back();
    }
}
