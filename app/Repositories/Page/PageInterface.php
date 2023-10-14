<?php

namespace App\Repositories\Page;

interface PageInterface
{
    public function all();

    public function query();

    public function getPage($slug);

    public function getFooters();

    // more
}
