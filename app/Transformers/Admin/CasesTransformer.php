<?php

namespace App\Transformers\Admin;

use League\Fractal\TransformerAbstract;
use App\Entities\Admin\Cases;

/**
 * Class CasesTransformer.
 *
 * @package namespace App\Transformers\Admin;
 */
class CasesTransformer extends TransformerAbstract
{
    /**
     * Transform the Cases entity.
     *
     * @param \App\Entities\Admin\Cases $model
     *
     * @return array
     */
    public function transform(Cases $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
