<?php

use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Admin\AdminAddAttributesComponent;
use App\Http\Livewire\Admin\AdminAddCategoryComponent;
use App\Http\Livewire\Admin\AdminAddCouponComponent;
use App\Http\Livewire\Admin\AdminAddHomeSliderComponent;
use App\Http\Livewire\Admin\AdminAddInfoHomeComponent;
use App\Http\Livewire\Admin\AdminAddMarqueHomeComponent;
use App\Http\Livewire\Admin\AdminAddProductComponent;
use App\Http\Livewire\Admin\AdminAddTransfertBancaireComponent;
use App\Http\Livewire\Admin\AdminAttributesComponent;
use App\Http\Livewire\Admin\AdminCategoriesComponent;
use App\Http\Livewire\Admin\AdminContactComponent;
use App\Http\Livewire\Admin\AdminCouponsComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminEditAttributesComponent;
use App\Http\Livewire\Admin\AdminEditCategoryComponent;
use App\Http\Livewire\Admin\AdminEditCouponComponent;
use App\Http\Livewire\Admin\AdminEditHomeSliderComponent;
use App\Http\Livewire\Admin\AdminEditInfoHomeComponent;
use App\Http\Livewire\Admin\AdminEditMarqueHomeComponent;
use App\Http\Livewire\Admin\AdminEditProductComponent;
use App\Http\Livewire\Admin\AdminEditTransfertBancaireComponent;
use App\Http\Livewire\Admin\AdminHomeSliderComponent;
use App\Http\Livewire\Admin\AdminInfoHomeComponent;
use App\Http\Livewire\Admin\AdminMarqueHomeComponent;
use App\Http\Livewire\Admin\AdminOrderComponent;
use App\Http\Livewire\Admin\AdminOrderDetailsComponent;
use App\Http\Livewire\Admin\AdminProductComponent;
use App\Http\Livewire\Admin\AdminTransfertBancaireComponent;
use App\Http\Livewire\AproposComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\ContactComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\PrivacyPolicyComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\ThankyouComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\User\UserOrderDetailsComponent;
use App\Http\Livewire\User\UserOrdersComponent;
use App\Http\Livewire\WishlistComponent;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', HomeComponent::class)->name('home.index');
Route::get('/boutique', ShopComponent::class)->name('boutique');
Route::get('/panier', CartComponent::class)->name('boutique.cart');
Route::get('/checkout', CheckoutComponent::class)->name('boutique.paiement');
Route::get('/politique',PrivacyPolicyComponent::class)->name('boutique.politique');
Route::get('/product/{slug}', DetailsComponent::class)->name('product.details');
Route::get('/product-category/{slug}/{sslug?}',CategoryComponent::class)->name('product.category');
Route::get('/search',SearchComponent::class)->name('product.search');
Route::get('/wishlist',WishlistComponent::class)->name('boutique.favorie_liste');
Route::get('/thank-you',ThankyouComponent::class)->name('thankyou');
Route::get('/contact', ContactComponent::class)->name('contact');
Route::get('/a-propos',AproposComponent::class)->name('a-propos');




// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::middleware(['auth'])->group(function () {
    Route::get('/user/dashboard',UserDashboardComponent::class)->name('user.dashboard');
    Route::get('/user/profile/edit', [ProfileController::class, 'edit'])->name('profile');
    Route::patch('/user/profile/partials/update-password-form', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/user/orders',UserOrdersComponent::class)->name('user.commandes');
    Route::get('/user/orders/{order_id}', UserOrderDetailsComponent::class)->name('user.detailscommandes');
  //  Route::delete('/user/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth','authadmin'])->group(function () {
    Route::get('/admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/profile/edit', [ProfileController::class, 'edit'])->name('admin.profile');
    Route::patch('/admin/profile/partials/update-password-form', [ProfileController::class, 'update'])->name('admin.profile.update');
    Route::delete('/admin/profile/partials/delete-user-form', [ProfileController::class, 'destroy'])->name('admin.profile.destroy');
    Route::get('/admin/categories',AdminCategoriesComponent::class)->name('admin.categories');
    Route::get('/admin/category/add',AdminAddCategoryComponent::class)->name('admin.category.add');
    Route::get('/admin/category/edit/{category_id}/{subcategory_id?}',AdminEditCategoryComponent::class)->name('admin.category.edit');
    Route::get('/admin/products',AdminProductComponent::class)->name('admin.products');
    Route::get('/admin/products/add',AdminAddProductComponent::class)->name('admin.products.add');
    Route::get('/admin/products/edit/{product_id}',AdminEditProductComponent::class)->name('admin.product.edit');
    Route::get('/admin/slider',AdminHomeSliderComponent::class)->name('admin.home.slider');
    Route::get('/admin/slider/add',AdminAddHomeSliderComponent::class)->name('admin.home.slide.add');
    Route::get('/admin/slider/edit/{slide_id}',AdminEditHomeSliderComponent::class)->name('admin.home.slide.edit');
    Route::get('/admin/marque',AdminMarqueHomeComponent::class)->name('admin.marque');
    Route::get('/admin/marque/add',AdminAddMarqueHomeComponent::class)->name('admin.marque.add');
    Route::get('/admin/marque/edit/{marque_id}',AdminEditMarqueHomeComponent::class)->name('admin.marque.edit');
    Route::get('/admin/info_home',AdminInfoHomeComponent::class)->name('admin.info_home');
    Route::get('/admin/info_home/edit/{info_id}',AdminEditInfoHomeComponent::class)->name('admin.info_home.edit');
  //  Route::get('/admin/info_home/add',AdminAddInfoHomeComponent::class)->name('admin.info_home.add');
    Route::get('/admin/coupons',AdminCouponsComponent::class)->name('admin.coupons');
    Route::get('/admin/coupon/add',AdminAddCouponComponent::class)->name('admin.addcoupon');
    Route::get('/admin/coupon/edit/{coupon_id}',AdminEditCouponComponent::class)->name('admin.editcoupon');
    Route::get('/admin/orders',AdminOrderComponent::class)->name('admin.commandes');
    Route::get('/admin/orders/{order_id}',AdminOrderDetailsComponent::class)->name('admin.detailscommandes');
    Route::get('/admin/contact',AdminContactComponent::class)->name('admin.contact');
    Route::get('/admin/attributes',AdminAttributesComponent::class)->name('admin.attributes');
    Route::get('/admin/attributes/edit/{attribute_id}',AdminEditAttributesComponent::class)->name('admin.edit_attributes');
    Route::get('/admin/attributes/add',AdminAddAttributesComponent::class)->name('admin.add_attributes');
    Route::get('/admin/transfert_bank',AdminTransfertBancaireComponent::class)->name('admin.transfert_bank');
    Route::get('/admin/transfert_bank/add',AdminAddTransfertBancaireComponent::class)->name('admin.add_transfert_bank');
    Route::get('/admin/transfert_bank/edit/{transfert_id}',AdminEditTransfertBancaireComponent::class)->name('admin.edit_transfert_bank');
});



require __DIR__.'/auth.php';
