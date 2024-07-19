<?php

namespace App\Http\Controllers\Catalog;

use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderFormRequest;
use App\Models\GatewayCurrency;
use Domain\Order\Actions\NewOrderAction;
use Domain\Order\Models\PaymentMethod;
use Domain\Order\Processes\AssignCustomer;
use Domain\Order\Processes\AssignProducts;
use Domain\Order\Processes\ChangeStateToPending;
use Domain\Order\Processes\CheckProductQuantities;
use Domain\Order\Processes\ClearCart;
use Domain\Order\Processes\DecreaseProductsQuantities;
use Domain\Order\Processes\OrderProcess;
use DomainException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Throwable;

class OrderController extends Controller
{
    public function index()
    {
        $pageTitle   = "Make Order";
        $items = cart()->items();

        if ($items->isEmpty()) {
//            throw new DomainException('Корзина пуста');
            $notify[] = ['error', 'Empty Cart'];
            return  redirect()->route('catalog')->withNotify($notify);
        }

        $gatewayCurrency = GatewayCurrency::whereHas('method', function ($gate) {
            $gate->where('status', Status::ENABLE);
        })->with('method')->orderby('method_code')->get();


        return view('Template::catalog.order.index', [
            'pageTitle' => $pageTitle,
            'gatewayCurrency' => $gatewayCurrency,
            'items' => $items,
        ]);
    }

    /**
     * @throws Throwable
     */
    public function handle(OrderFormRequest $request, NewOrderAction $action): RedirectResponse
    {

        $order = $action($request);

        (new OrderProcess($order))->processes([
       //     new CheckProductQuantities(),
       //     new AssignCustomer(request('customer')),
            new AssignProducts(),
            new ChangeStateToPending(),
       //     new DecreaseProductsQuantities(),
            new ClearCart()
        ])->run();

        return redirect()
            ->route('catalog');
    }
}
