<?php
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\ContactComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\WishlistComponent;
use App\Http\Livewire\ThankYouComponent;
use App\Http\Livewire\admin\AdminCategoryComponent;
use App\Http\Livewire\admin\AdminAddCategoryComponent;
use App\Http\Livewire\admin\AdminEditeCategory;
use App\Http\Livewire\user\UserDashboardComponent;
use App\Http\Livewire\admin\AdminDashboardComponent;
use App\Http\Livewire\admin\AdminProductComponent;
use App\Http\Livewire\admin\AdminAddProductComponent;
use App\Http\Livewire\admin\AdminEditProductComponent;
use App\Http\Livewire\admin\AdminEditHomeSliderComponent;
use App\Http\Livewire\admin\AdminAddHomeSliderComponent;
use App\Http\Livewire\admin\AdminHomeSliderComponent;
use App\Http\Livewire\admin\AdminHomeCategoryComponent;
use App\Http\Livewire\admin\AdminSaleComponent;
use App\Http\Livewire\admin\AdminCouponsComponent;
use App\Http\Livewire\admin\AdminAddCouponComponent;
use App\Http\Livewire\admin\AdminEditCouponComponent;
use App\Http\Livewire\admin\AdminOrderComponent;
use App\Http\Livewire\admin\AdminOrderDetailsComponent;
use App\Http\Livewire\admin\AdminContactComponent;
use App\Http\Livewire\admin\AdminSettingComponent;
use App\Http\Livewire\admin\AdminReplyComponent;
use App\Http\Livewire\user\UserOrdersComponent;
use App\Http\Livewire\user\UserOrderDetailsComponent;
use App\Http\Livewire\user\UserReviewComponent;
use App\Http\Livewire\user\UserChangePasswordComponent;
use App\Http\Livewire\user\UserInboxComponent;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/',HomeComponent::class);
Route::get('/shop',ShopComponent::class)->name('product.shop');
Route::get('/search',SearchComponent::class)->name('product.search');
Route::get('/product-category/{category_slug}/{scategory_slug?}',CategoryComponent::class)->name('product.category');
Route::get('/product/{slug}',DetailsComponent::class)->name('product.details');

Route::middleware(['auth:sanctum','verified'])->group(function(){
        Route::get('/cart',CartComponent::class)->name('product.cart');
        Route::get('/checkout',CheckoutComponent::class)->name('product.checkout');
        Route::get('/wishlist',WishlistComponent::class)->name('product.wishlist');
        Route::get('/thank-you',ThankYouComponent::class)->name('thankyou');
        Route::get('/contact-us',ContactComponent::class)->name('contact');
});
//for user
Route::middleware(['auth:sanctum','verified'])->group(function(){

        Route::get('/user/dashboard',UserDashboardComponent::class)->name('user.dashboard');
        Route::get('/user/orders',UserOrdersComponent::Class)->name('user.orders');
        Route::get('/user/review/{order_item_id}',UserReviewComponent::Class)->name('user.review');
        Route::get('/user/order/{order_id}',UserOrderDetailsComponent::Class)->name('user.orderdetails');
        Route::get('/user/change_password',UserChangePasswordComponent::Class)->name('user.changepassword');
        Route::get('/user/inbox',UserInboxComponent::Class)->name('user.inbox');

    
});
//for Admin
Route::middleware(['auth:sanctum','verified','authadmin'])->group(function(){

        Route::get('/admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');
        Route::get('/admin/category',AdminCategoryComponent::Class)->name('admin.category');
        Route::get('/admin/category/add',AdminAddCategoryComponent::class)->name('admin.addcategory');
        Route::get('/admin/category/edite/{category_slug}/{scategory_slug?}',AdminEditeCategory::class)->name('admin.editecategory');
        Route::get('/admin/product',AdminProductComponent::Class)->name('admin.product');
        Route::get('/admin/product/add',AdminAddProductComponent::Class)->name('admin.addproduct');
        Route::get('/admin/product/edit/{id}',AdminEditProductComponent::Class)->name('admin.editproduct');
        Route::get('/admin/homeslider',AdminHomeSliderComponent::Class)->name('admin.homeslider');
        Route::get('/admin/homeslider/add',AdminAddHomeSliderComponent::Class)->name('admin.addhomeslider');
        Route::get('/admin/homeslider/edit/{slider_id}',AdminEditHomeSliderComponent::Class)->name('admin.edithomeslider');
        Route::get('/admin/homecategory',AdminHomeCategoryComponent::Class)->name('admin.homecategory');
        Route::get('/admin/sale',AdminSaleComponent::Class)->name('admin.sale');
        Route::get('/admin/coupons',AdminCouponsComponent::Class)->name('admin.coupons');
        Route::get('/admin/coupons/add',AdminAddCouponComponent::Class)->name('admin.addcoupon');
        Route::get('/admin/coupons/edit/{coupon_id}',AdminEditCouponComponent::Class)->name('admin.editcoupon');
        Route::get('/admin/orders',AdminOrderComponent::Class)->name('admin.orders');
        Route::get('/admin/order/{order_id}',AdminOrderDetailsComponent::Class)->name('admin.orderdetails');
        Route::get('/admin/contact-us',AdminContactComponent::class)->name('admin.contact');
        Route::get('/admin/settings',AdminSettingComponent::class)->name('admin.settings');
        Route::get('/admin/reply/{message_id}',AdminReplyComponent::class)->name('admin.replies');
}
);
