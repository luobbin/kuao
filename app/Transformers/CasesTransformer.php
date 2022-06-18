<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Cases;

/**
 * Class CasesTransformer.
 *
 * @package namespace App\Transformers;
 */
class CasesTransformer extends TransformerAbstract
{
    /**
     * Transform the Cases entity.
     *
     * @param \App\Entities\Cases $model
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
