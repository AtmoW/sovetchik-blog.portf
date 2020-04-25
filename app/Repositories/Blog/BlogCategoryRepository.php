<?php


namespace App\Repositories\Blog;

use App\Models\Blog\BlogCategories as Model;
use App\Repositories\CoreRepository;


class BlogCategoryRepository extends CoreRepository
{
    /**
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getModelClass()
    {
        return Model::class;
    }

    /**
     * @return mixed
     */
    public function getForComboBox()
    {

        $columns = implode(', ',[
            'id',
            'CONCAT (id,". ", title) AS id_title'
        ]);

        $result = $this
            ->startConditions()
            ->selectRaw($columns)
            ->toBase()
            ->get();

        return $result;
    }

}
