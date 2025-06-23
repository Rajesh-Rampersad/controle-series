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
        // Enviar o email
        $userList = User::take(1)->get(); // Aqui você pode ajustar a quantidade de usuários que deseja enviar o email
        if ($userList->isEmpty()) {
            Log::warning('Nenhum usuário encontrado para enviar o email.');
            return;
        }
        // Enviar o email para todos os usuários
        foreach ($userList as $user) {
            //Mail 
            $email = new SeriesCreated(
                $event->nomeSerie,
                $event->qtdTemporadas,
                $event->qtdEpisodios,
                $event->idSerie
            );
            try {
                Mail::to($user)->queue($email);
                Log::info('Email enviado para: ' . $user->email);
            } catch (\Throwable $e) {
                Log::error('Erro ao enviar email para ' . $user->email . ': ' . $e->getMessage());
            }
        }
    }
}
