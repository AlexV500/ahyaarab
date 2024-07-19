<?php

namespace Domain\Order\Actions;

use Domain\Auth\Contracts\RegisterNewUserContract;
use Domain\Auth\DTOs\NewUserDTO;
use Domain\Order\Models\Order;

class NewOrderAction
{
    public function __invoke($request): Order
    {
     //   $reqisterAction = app(RegisterNewUserContract::class);

    //    $customer = $request->get('customer');

//        if ($request->boolean('create_account')) {
//            $reqisterAction(NewUserDTO::make(
//                $customer['first_name'] . ' ' . $customer['last_name'],
//                $customer['email'],
//                $request->get('password')
//            ));
//        }

        return Order::query()->create([
        //    'user_id' => auth()->id(),
            'user_id' => 1,
            'payment_method_id' => 2,
            'amount' => cart()->amount(),
        ]);
    }
}
