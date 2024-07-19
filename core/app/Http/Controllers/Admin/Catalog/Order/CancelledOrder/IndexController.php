<?php

namespace App\Http\Controllers\Admin\Catalog\Order\CancelledOrder;

use App\Http\Controllers\Admin\Catalog\BaseController;
use Domain\Order\ViewModels\Admin\OrderViewModel;

class IndexController extends BaseController
{
    public function __invoke(){

        $addViewVariables = [
            'pageTitle' => 'Cancelled Orders',
        ];

        return (new OrderViewModel())->view('admin.catalog.order.index', $this->mergeViewVariables($addViewVariables));
    }
}
