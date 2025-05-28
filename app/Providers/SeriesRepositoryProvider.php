<?php

namespace App\Providers;

use App\Repositories\EloquentSerieRepository;
use App\Repositories\SeriesRepository;
use Illuminate\Support\ServiceProvider;

class SeriesRepositoryProvider extends ServiceProvider
{
    public array $bindings = [
        SeriesRepository::class => EloquentSerieRepository::class,
    ];
}
