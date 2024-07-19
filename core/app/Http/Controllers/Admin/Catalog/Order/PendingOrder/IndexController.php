<?php

namespace App\Http\Controllers\Admin\Catalog\Order\PendingOrder;

use App\Http\Controllers\Admin\Catalog\BaseController;
use Domain\Order\ViewModels\Admin\OrderViewModel;

class IndexController extends BaseController
{
    public function __invoke(){

        $addViewVariables = [
            'pageTitle' => 'Paid Orders',
        ];

        return (new OrderViewModel())->view('admin.catalog.order.pending.index', $this->mergeViewVariables($addViewVariables));
    }
}
