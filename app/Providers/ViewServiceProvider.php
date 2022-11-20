<?php
 
namespace App\Providers;
 
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;
use App\Models\ChMessage;
use App\Models\Cart;
 
class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
 
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layouts.menu', function ($view) {
            $user = Auth::user();
            $countWishlist = Wishlist::where('user_id', $user->id)->count();
            $countMessage = ChMessage::where('to_id', $user->id)->where('seen', '0')->get()->count();
            $countCart = Cart::where('user_id', $user->id)->where('status_cart', 'cart')->first()->detail()->count();

            $view->with([
                'countWishlist' => $countWishlist,
                'countMessage' => $countMessage,
                'countCart' => $countCart,
            ]);
        });
    }
}
