<?php

namespace App\Http\Controllers\Api\Players;

use App\Models\Players;
use App\Models\Teams;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Client\Request;
use Illuminate\Http\Response;

class PlayerController
{
    public function showAll(): Response|Application|ResponseFactory
    {
        $players = Players::query()->get();
        $players->each(static function (Players $player) {
            $player->setAttribute('fullName', $player->getFullNameAttribute());
            $player->setAttribute('slug', $player->getSlugAttribute());
        });

        return response(['data' => $players]);
    }

    public function showSingle(int $id): Response|Application|ResponseFactory
    {
        /** @var Players $player */
        $player = Players::query()->find($id);
        $player->setAttribute('fullName', $player->getFullNameAttribute());

        return response(['data' => $player]);
    }
}
