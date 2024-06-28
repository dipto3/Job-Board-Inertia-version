<?php

namespace App\Services;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartService
{
    public function cartStore($request)
    {
        // dd($request->all());
        $loggedInUser = Auth::user()->id;
        $package_id = $request->id;

        $existCart = Cart::where('user_id', $loggedInUser)->first();
        if ($existCart) {
            // if same package select again,nothing change
            if ($existCart->package_id == $package_id) {
                return;
            }
            // update existing cart with the new package
            $existCart->update(['package_id' => $package_id]);

            return;
        } else {
            //create new if no existCart
            return Cart::create([
                'user_id' => Auth::user()->id,
                'package_id' => $package_id,
            ]);
        }
    }
}
