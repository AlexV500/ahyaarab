<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use Domain\Catalog\Models\Category;
use Domain\Catalog\ViewModels\CategoryViewModel;

class CategoryController extends Controller
{
    public function __invoke(?Category $category): CategoryViewModel
    {
        $pageTitle   = "Catalog";

        return (new CategoryViewModel($category))->view('Template::catalog.index', compact('pageTitle'));
    }
}
