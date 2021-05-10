<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

/**
 * Class DiggingDeeperController
 * @package App\Http\Controllers
 */
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

        /**
         * @var \Illuminate\Support\Collection $collection
         */
        $collection = collect($eloquentCollection->toArray());

//        $result['first'] = $collection->first();
//        $result['last'] = $collection->last();

        $result['where']['data'] = $collection
            ->where('category_id',10)
            ->values()
            ->keyBy('id')
        ;

//        $result['where']['count'] = $result['where']['data']->count();
//        $result['where']['isEmpty'] = $result['where']['data']->isEmpty();
//        $result['where']['isNotEmpty'] = $result['where']['data']->isNotEmpty();

        $result['map']['all'] = $collection->map(function ($item){
            $newItem = new \StdClass();
            $newItem->item_id = $item['id'];
            $newItem->item_name = $item['title'];
            $newItem->exists = is_null($item['deleted_at']);

            return $newItem;
        });

        dd(__METHOD__, $result);
    }
}
