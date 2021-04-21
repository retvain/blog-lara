<?php


namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;

class BlogPostRepository extends CoreRepository
{

    /**
     * @inheritDoc
     */
    protected function getModelClass()
    {
        return Model::class;
    }
}
