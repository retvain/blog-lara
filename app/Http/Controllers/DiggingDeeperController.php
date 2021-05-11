<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Carbon\Carbon;
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
    public function collections()
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
            ->where('category_id', '>', 1)
            ->values()
            ->keyBy('id');

//        $result['where']['count'] = $result['where']['data']->count();
//        $result['where']['isEmpty'] = $result['where']['data']->isEmpty();
//        $result['where']['isNotEmpty'] = $result['where']['data']->isNotEmpty();

//        $result['map']['all'] = $collection->map(function ($item){
//            $newItem = new \StdClass();
//            $newItem->item_id = $item['id'];
//            $newItem->item_name = $item['title'];
//            $newItem->exists = is_null($item['deleted_at']);
//
//            return $newItem;
//        });

//        $result['map']['not_exist'] = $result['map']['all']
//            ->where('exists', '=', false)
//            ->values()
//            ->keyBy('item_id');
//        dd(__METHOD__, $result);


        $collection->transform(function ($item) {
            $newItem = new \StdClass();
            $newItem->item_id = $item['id'];
            $newItem->item_name = $item['title'];
            $newItem->exists = is_null($item['deleted_at']);
            $newItem->created_at = Carbon::parse($item['created_at']);

            return $newItem;
        });

//        dd(__METHOD__, $eloquentCollection, $collection);

//        $newItem = new \stdClass();
//        $newItem->id = 9999;
//
//        $newItem2 = new \stdClass();
//        $newItem2->id = 8888;

        //set element to begin of the collection

//        $newItemFirst = $collection->prepend($newItem)->first();
//        $newItemLast = $collection->push($newItem2)->last();
//        $pulledItem = $collection->pull(1);


//        dd(__METHOD__, compact('collection', 'newItemFirst', 'newItemLast', 'pulledItem'));

        //Flitration.
        $filtered = $collection->filter(function ($item){
           $byDay = $item->created_at->isFriday();
           $byDate = $item->created_at->day == 11;

           $result = $byDate && $byDay;

           return $result;
        });

        dd(compact('filtered'));

    }
}
