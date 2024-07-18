<?php

namespace App\Http\Controllers\Catalog\Category;

use App\Http\Controllers\Controller;
use Domain\Catalog\Models\Category;
use Domain\Catalog\ViewModels\CategoryViewModel;

class IndexController extends Controller
{
    public function __invoke(?Category $category): CategoryViewModel
    {
        $pageTitle   = "Catalog";
        return (new CategoryViewModel($category))->view('Template::catalog.category.index', compact('pageTitle'));
    }
}
