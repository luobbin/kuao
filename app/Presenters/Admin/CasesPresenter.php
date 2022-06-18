<?php

namespace App\Presenters\Admin;

use App\Transformers\Admin\CasesTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CasesPresenter.
 *
 * @package namespace App\Presenters\Admin;
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
