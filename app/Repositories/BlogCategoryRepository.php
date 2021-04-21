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

        $columns = implode(', ', [
         'id',
         'CONCAT (id, ". ", title) AS id_title' ,
        ]);

//        $result[] = $this->startConditions()->all();
//        $result[] = $this
//            ->startConditions()
//            ->select('blog_categories.*',
//            \DB::raw('CONCAT (id, ". ", title) AS id_title'))
//            ->toBase()
//            ->get();

        $result = $this
            ->startConditions()
            ->selectRaw($columns)
            ->toBase()
            ->get();

        return $result;
    }

    /**
     * @param int|null $perPage
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllWithPaginate($perPage = null)
    {
        $fields = ['id', 'title', 'parent_id'];

        $result = $this
            ->startConditions()
            ->select($fields)
            ->paginate($perPage);

        return $result;
    }


}
