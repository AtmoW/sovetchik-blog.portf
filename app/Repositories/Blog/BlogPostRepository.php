<?php


namespace App\Repositories\Blog;

use App\Models\Blog\BlogPost as Model;
use App\Repositories\CoreRepository;


class BlogPostRepository extends CoreRepository
{
    /**
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getModelClass()
    {
        return Model::class;
    }

    public function getPopularWithPaginate()
    {
        $columns = [
            'title',
            'excerpt',
            'watches',
        ];

        $result = $this->startConditions()
            ->select($columns)
            ->orderBy('watches', 'DESC')
            ->paginate(9);

        return $result;
    }

}
