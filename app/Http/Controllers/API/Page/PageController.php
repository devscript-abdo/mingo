<?php

namespace App\Http\Controllers\API\Page;

use App\Http\Controllers\Controller;
use App\Http\Resources\Page\PageResource;
use App\Models\Page;

class PageController extends Controller
{
    public function index()
    {
        $pages = $this->Page()->all();

        if ($pages) {
            return response()->json(
                [
                    'payload' => PageResource::collection($pages),
                    '_response' => ['msg' => 'successfully pages'],
                ],
                200
            );
        }

        return response()->json(
            [
                'payload' => [],
                '_response' => ['msg' => 'Error get pages'],
            ],
            200
        );
    }

    public function getPage($page)
    {

        $page = Page::whereId($page)->first();
        if ($page) {
            return response()->json(
                [
                    'payload' => new PageResource($page),
                    '_response' => ['msg' => "successfully {$page->slug}"],
                ],
                200
            );
        }

        return response()->json(
            [
                'payload' => [],
                '_response' => ['msg' => 'Error 404 page not found'],
            ],
            200
        );
    }
}
