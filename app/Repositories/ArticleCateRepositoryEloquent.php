<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ArticleCateRepository;
use App\Entities\ArticleCate;
use App\Validators\ArticleCateValidator;

/**
 * Class ArticleCateRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ArticleCateRepositoryEloquent extends BaseRepository implements ArticleCateRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ArticleCate::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
