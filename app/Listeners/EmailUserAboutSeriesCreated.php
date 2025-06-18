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

class EmailUserAboutSeriesCreated
{
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
        $userList = User::all();
        // Enviar o email para todos os usuários
        foreach ($userList as $index => $user) {
            //Mail 
            $email = new SeriesCreated(
                nomeSerie: $event->nomeSerie,
                qtdTemporadas: $event->qtdTemporadas,
                qtdEpisodios: $event->qtdEpisodios,
                idSerie: $event->idSerie
            );
            try {
                Mail::to($user)->send($email);
                Log::info('Email enviado para: ' . $user->email);
            } catch (\Throwable $e) {
                Log::error('Erro ao enviar email para ' . $user->email . ': ' . $e->getMessage());
            }
        }
    }
}
