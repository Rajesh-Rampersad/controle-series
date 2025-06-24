<?php

namespace App\Listeners;

use App\Events\SeriesCreated as EventsSeriesCreated;
use App\Mail\SeriesCreated;
use App\Models\Serie;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class EmailUserAboutSeriesCreated implements ShouldQueue
{

    use InteractsWithQueue;

    /**
     * El número de segundos que la tarea puede ejecutarse antes de agotar el tiempo de espera.
     * Puedes ajustarlo si el envío es lento.
     * @var int
     */
    public $timeout = 60; // 1 minutos

    /**
     * El número de intentos que la tarea debe tener.
     * @var int
     */
    public $tries = 2;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(EventsSeriesCreated $event)
    {
        Log::info('Enviando email para os usuários sobre a série criada: ' . $event->nomeSerie);
        $userList = User::take(1)->get(); // Para depurar, si en producción quieres todos, usa User::all();
        if ($userList->isEmpty()) {
            Log::warning('Nenhum usuário encontrado para enviar o email.');
            return;
        }

        $email = new SeriesCreated( // Instancia el Mailable una vez fuera del bucle
            $event->nomeSerie,
            $event->qtdTemporadas,
            $event->qtdEpisodios,
            $event->idSerie
        );

        foreach ($userList as $user) {
            try {
                // ⭐⭐ CAMBIO A ->queue() AQUÍ ⭐⭐
                Mail::to($user)->queue($email); // Pone el email individual en la cola para envío
                Log::info('Email para ' . $user->email . ' puesto en cola para la serie: ' . $event->nomeSerie);
            } catch (\Throwable $e) {
                Log::error('Erro ao colocar email em fila para ' . $user->email . ': ' . $e->getMessage());
            }
        }
        Log::info('Todos os emails para a série ' . $event->nomeSerie . ' foram colocados na fila.');
    }
}
