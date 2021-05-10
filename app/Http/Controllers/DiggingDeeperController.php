<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class DiggingDeeperController extends Controller
{
    /**
     *
     */
    public function collections ()
    {
        $result = [];

        /**
         * @var Collection $eloquentCollection
         */
        $eloquentCollection = BlogPost::withTrashed()->get();

        dd(__METHOD__, $eloquentCollection, $eloquentCollection->toArray());
    }
}
