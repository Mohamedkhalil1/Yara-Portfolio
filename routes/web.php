<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\BrandComponent;
use App\Http\Livewire\CampaignComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\ClientComponent;
use App\Http\Livewire\Command;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\HomePage;
use App\Http\Livewire\InformationComponent;
use App\Http\Livewire\Profile;
use App\Http\Livewire\Profile\Show;
use App\Http\Livewire\ServiceComponent;
use App\Http\Livewire\SocialComponent;
use App\Http\Livewire\Transaction\AdvancedIndex;
use App\Http\Livewire\Transaction\Index;
use App\Http\Livewire\User\Create;
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

Route::group([
    'middleware' => 'guest',
], function () {
    Route::get('/login', Login::class)->name('login');
//    Route::get('/register', Register::class)->name('register');
});

Route::group([
    'middleware' => 'auth',
    'prefix'     => 'yara',
], function () {

    Route::get('/', Dashboard::class)->name('dashboard');
    Route::get('/profile', Show::class)->name('profile.show');
    Route::get('her-profile', Profile::class)->name('profile');
    Route::get('her-information', InformationComponent::class)->name('information');
    Route::get('her-services', ServiceComponent::class)->name('services');
    Route::get('her-clients', ClientComponent::class)->name('clients');
    Route::get('her-brands', BrandComponent::class)->name('brands');
    Route::get('her-categories', CategoryComponent::class)->name('categories');
    Route::get('her-campaigns', CampaignComponent::class)->name('campaigns');
    Route::get('her-social-media', SocialComponent::class)->name('socialMedia');
    Route::get('commands', Command::class)->name('commands');
});

Route::post('logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/', HomePage::class);

