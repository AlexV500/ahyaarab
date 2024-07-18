<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use Domain\Catalog\Models\Category;
use Domain\Catalog\ViewModels\CatalogViewModel;

class IndexController extends Controller
{
    public function __invoke(): CatalogViewModel
    {
        $pageTitle   = "Catalog";

        return (new CatalogViewModel())->view('Template::catalog.index', compact('pageTitle'));
    }
}
