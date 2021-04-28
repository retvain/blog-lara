<?php


namespace App\Repositories;

use App\Models\BlogPost as Model;
use Illuminate\Database\Eloquent\Collection;

class BlogPostRepository extends CoreRepository
{

    /**
     * @inheritDoc
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * @return Illuminate\Pagination\LengthAwarePaginator
     */
    public function getAllWithPaginate()
    {
        $columns = [
            'id',
            'title',
            'slug',
            'is_published',
            'published_at',
            'user_id',
            'category_id'
        ];

        $result = $this->startConditions()
            ->select($columns)
            ->orderBy('id', 'DESC')
//            ->with(['category', 'id'])
            ->with([
                'category' => function ($query) {
                $query->select(['id', 'title']);
                },
                'user:id,name',
            ])
            ->paginate(15);

        return $result;
    }


    /**
     * @param $id
     * @return Model
     */
    public function getEdit ($id)
    {
        return $this->startConditions()->find($id);
    }
}
