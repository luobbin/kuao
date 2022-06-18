<?php

namespace App\Presenters;

use App\Transformers\CasesTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CasesPresenter.
 *
 * @package namespace App\Presenters;
 */
class CasesPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CasesTransformer();
    }
}
