<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Teams;

use App\Models\Teams;

class TeamController
{
    public function index()
    {
        $teams = Teams::query()->get();

        return response(['data' => $teams]);
    }
}
