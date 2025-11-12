<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Informe;
use App\Models\Caja;
use Carbon\Carbon;

class AtenderTicketsLlamados extends Command
{
    protected $signature = 'tickets:atender-llamados';
    protected $description = 'Marca como atendido los tickets llamados hace más de 30 segundos';

    public function handle()
    {
        $limite = Carbon::now()->subSeconds(30);
        // Informes
        Informe::where('atencion', 'llamado')
            ->where('updated_at', '<', $limite)
            ->update(['atencion' => 'atendido']);
        // Caja
        Caja::where('atencion', 'llamado')
            ->where('updated_at', '<', $limite)
            ->update(['atencion' => 'atendido']);
        $this->info('Tickets llamados actualizados a atendido.');
    }
}
