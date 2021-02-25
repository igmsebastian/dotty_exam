<?php

namespace App\Policies;

use App\Enums\OrderStatus;
use App\Http\Services\UserService;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Order  $order
     * @return mixed
     */
    public function view(?User $user, Order $order)
    {
        $user = (new UserService)->getInstance();

        return $user->email === $order->email;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Order  $order
     * @return mixed
     */
    public function download(?User $user, Order $order, Product $product)
    {
        // $isUserOwnedOrder = (new UserService)->getOrders()->contains($order->id);
        // $isOrderCompleted = $order->status === OrderStatus::COMPLETED;

        // return $isUserOwnedOrder && $isOrderCompleted;
        return (new UserService)->getOrders()->contains($order->id);
    }

}
