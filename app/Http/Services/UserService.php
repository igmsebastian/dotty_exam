<?php

namespace App\Http\Services;

use App\Models\User;
use App\Enums\CacheKey;
use App\Models\Order;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class UserService
{
    /**
     * Fetch the current user.
     *
     * @return \Illuminate\Support\Facades\Auth
     */
    private static function guard()
    {
        return Auth::guard('user');
    }


    /**
     * Generate a new account for guest user.
     * User can be a guest or a registered user.
     *
     * @return \App\Models\User
     */
    public static function getInstance()
    {
        $user = self::guard()->user();

        if(!isset($user)){
            $user = Cache::has(CacheKey::GUEST_ACCOUNT)
                ? Cache::get(CacheKey::GUEST_ACCOUNT)
                : self::registerGuestAccount();
        };

        return $user;
    }

    /**
     * Generate a new account for guest user.
     *
     * @return \App\Models\User
     */
    public static function registerGuestAccount()
    {
        $id = Str::random(18);
        $user = new User();
        $user->fill([
            'id' => $id,
            'name' => "guest-{$id}",
            'email' => "guest-{$id}@ecommerce.com",
            'password' => bcrypt($id),
        ]);

        // Store Generated User to Cache.
        Cache::forever(CacheKey::GUEST_ACCOUNT, $user);

        return $user;
    }

    /**
     * Fetch the current orders of the user.
     *
     * @return \Illuminate\Support\Collection
     */
    public static function getOrders()
    {
        return Order::where('email', self::getInstance()->email)->get();
    }

    /**
     * Fetch the current order items of the user.
     *
     * @return \Illuminate\Support\Collection
     */
    public static function getOwnedItems()
    {
        return self::getOrders()->pluck('items')->map(function($items){
            return $items->pluck('product_id');
        })->flatten();
    }
}
