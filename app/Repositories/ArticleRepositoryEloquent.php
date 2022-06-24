<?php

namespace App\Repositories;

use App\Entities\Article;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class ArticleCateRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ArticleRepositoryEloquent extends BaseRepository implements ArticleRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Article::class;
    }

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title'=>'like',
        'cate_id',
        'id'
    ];

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function previousItm($id)
    {
        return Article::with([])->where("id", ">",$id)->first();
    }

    public function nextItm($id)
    {
        return Article::with([])->where("id", "<",$id)->first();
    }

}
