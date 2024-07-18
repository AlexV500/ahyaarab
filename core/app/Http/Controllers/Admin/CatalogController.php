<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\View\ViewModels\CatalogViewModel;
use Domain\Catalog\Models;
use Domain\Catalog\Models\Category;

class CatalogController extends Controller
{
    public function index(?Category $category) {
        $pageTitle = 'Manage Catalog';
        return (new CatalogViewModel($category))->view('admin.catalog.index', compact('pageTitle'));
    }
}
