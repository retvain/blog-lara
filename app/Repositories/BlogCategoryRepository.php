<?php


namespace App\Repositories;

use App\Models\BlogCategory as Model;
use Illuminate\Database\Eloquent\Collection;


/**
 * Class BlogCategoryRepository
 * @package App\Repositories
 */
class BlogCategoryRepository extends CoreRepository
{

    /**
     * @inheritDoc
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * Get Model for edit in /admin
     * @param int $id
     * @return mixed
     */
    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }

    /**
     * Get list category for view in ComboBox
     * @return array|\Illuminate\Contracts\Foundation\Application[]|Collection|\Illuminate\Database\Eloquent\Model[]
     */
    public function getForComboBox()
    {
        return $this->startConditions()->all();
    }


}
