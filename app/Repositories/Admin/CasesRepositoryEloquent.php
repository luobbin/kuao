<?php

namespace App\Repositories\Admin;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Admin\CasesRepository;
use App\Entities\Admin\Cases;
use App\Validators\Admin\CasesValidator;

/**
 * Class CasesRepositoryEloquent.
 *
 * @package namespace App\Repositories\Admin;
 */
class CasesRepositoryEloquent extends BaseRepository implements CasesRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Cases::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return CasesValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
