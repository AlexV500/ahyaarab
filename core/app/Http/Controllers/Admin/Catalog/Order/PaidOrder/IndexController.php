<?php

namespace App\Http\Controllers\Admin\Catalog\Order\PaidOrder;

use App\Http\Controllers\Admin\Catalog\BaseController;
use Domain\Order\ViewModels\Admin\OrderViewModel;

class IndexController extends BaseController
{
    public function __invoke(){

        $addViewVariables = [
            'pageTitle' => 'Paid Orders',
        ];

        return (new OrderViewModel())->view('admin.catalog.order.index', $this->mergeViewVariables($addViewVariables));
    }
}
