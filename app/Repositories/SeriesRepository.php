<?php

namespace App\Repositories;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Serie;

interface SeriesRepository
{
    public function add(SeriesFormRequest $request): Serie;

    // public function getAll(): \Illuminate\Database\Eloquent\Collection;

    // public function findById(int $id): ?Serie;

    // public function update(SeriesFormRequest $request, int $id): bool;

    // public function delete(int $id): bool;
}
