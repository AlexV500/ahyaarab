<?php

namespace App\Http\Controllers\Admin\Catalog\Order\NewOrder;

use App\Http\Controllers\Admin\Catalog\BaseController;

class IndexController extends BaseController
{
    public function __invoke(){

        $addViewVariables = [
            'pageTitle' => 'New Orders',
        ];

        return (new OrderViewModel())->view('admin.catalog.order.index', $this->mergeViewVariables($addViewVariables));
    }

}
