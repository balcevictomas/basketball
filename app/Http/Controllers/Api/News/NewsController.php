<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\News;

use App\Models\News;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;

class NewsController
{
    public function showAll(): Response|Application|ResponseFactory
    {
        $news = News::query()->get();

        return response(['data' => $news]);
    }

    public function showSingle(int $id): Response|Application|ResponseFactory
    {
        $singleNews = News::query()->find($id);

        return response(['data' => $singleNews]);
    }

}
