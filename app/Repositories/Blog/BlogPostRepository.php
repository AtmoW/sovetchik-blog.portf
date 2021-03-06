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

    public function getOne($slug)
    {
        $columns = [
            'user_id',
            'title',
            'text',
            'published_at',
            'watches',
        ];

        $result = $this->startConditions()->where('slug',$slug)->first();

        return $result;
    }

    public function getAllWithPaginate($published = true)
    {
        $columns = [
            'id',
            'title',
            'excerpt',
            'user_id',
            'category_id',
            'created_at',
            'is_published'
        ];

        if($published){
            $result = $this->startConditions()
                ->select($columns)
                ->orderBy('created_at', 'DESC')
                ->paginate(15);
        }
        else{
            $result = $this->startConditions()
                ->select($columns)
                ->where('is_published','=','0')
                ->orderBy('created_at', 'DESC')
                ->paginate(15);
        }

        return $result;
    }


    public function getPopularWithPaginate()
    {
        $columns = [
            'slug',
            'title',
            'excerpt',
            'watches',
            'published_at',
        ];

        $result = $this->startConditions()
            ->select($columns)
            ->orderBy('watches', 'DESC')
            ->paginate(9);

        return $result;
    }

    public function getNewWithPaginate()
    {
        $columns = [
            'slug',
            'title',
            'excerpt',
            'watches',
            'published_at',
        ];

        $result = $this->startConditions()
            ->select($columns)
            ->orderBy('published_at', 'DESC')
            ->paginate(9);

        return $result;
    }

}
