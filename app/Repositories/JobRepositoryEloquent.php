<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Entities\Job;

/**
 * Class JobRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class JobRepositoryEloquent extends BaseRepository implements JobRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Job::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
