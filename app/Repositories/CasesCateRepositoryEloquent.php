<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CasesCateRepository;
use App\Entities\CasesCate;
use App\Validators\CasesCateValidator;

/**
 * Class CasesCateRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class CasesCateRepositoryEloquent extends BaseRepository implements CasesCateRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CasesCate::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
