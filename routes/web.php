<?php
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\ColaController;

// Rutas para vistas TV y Empleado
Route::get('/tv', [ColaController::class, 'vistaTV'])->name('cola.tv');
Route::get('/empleado', [ColaController::class, 'vistaEmpleado'])->name('cola.empleado');
Route::get('/empleado/informes', [ColaController::class, 'empleadoInformes'])->name('empleado.informes');
Route::get('/empleado/caja', [ColaController::class, 'empleadoCaja'])->name('empleado.caja');

// Acciones para llamar y sacar tickets
Route::post('/ticket/llamar/{tipo}/{id}', [ColaController::class, 'llamarTicket'])->name('ticket.llamar');
Route::post('/ticket/sacar/{tipo}/{id}', [ColaController::class, 'sacarTicket'])->name('ticket.sacar');



Route::get('/', [ColaController::class, 'index'])->name('cola.index');
Route::get('/turno/informe', [ColaController::class, 'turnoInforme'])->name('turno.informe');
Route::get('/turno/caja', [ColaController::class, 'turnoCaja'])->name('turno.caja');
