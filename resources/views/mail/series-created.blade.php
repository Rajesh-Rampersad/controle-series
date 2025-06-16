@component('mail::message')

# Uma nova Série: {{ $nomeSerie }} foi criada com sucesso.

Á série {{ $nomeSerie }} com {{ $qtdTemporadas }} temporadas e {{ $qtdEpisodios }} episódios foi criada com sucesso.
Você pode acessar a série clicando no botão abaixo:
@component('mail::button', ['url' => route('seasons.index', $idSerie)])
Acessar Série
Ver Série
@endcomponent
@endcomponent