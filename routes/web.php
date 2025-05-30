<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\ProductsController;
use App\Http\Controllers\Web\UsersController;
use function App\Helpers\emailFromLoginCertificate;
use App\Models\User;

Route::get('register', [UsersController::class, 'register'])->name('register');
Route::post('register', [UsersController::class, 'doRegister'])->name('do_register');
Route::get('login', [UsersController::class, 'login'])->name('login');
Route::post('login', [UsersController::class, 'doLogin'])->name('do_login');
Route::get('logout', [UsersController::class, 'doLogout'])->name('do_logout');
Route::get('users', [UsersController::class, 'list'])->name('users');
Route::get('profile/{user?}', [UsersController::class, 'profile'])->name('profile');
Route::get('users/edit/{user?}', [UsersController::class, 'edit'])->name('users_edit');
Route::post('users/save/{user}', [UsersController::class, 'save'])->name('users_save');
Route::get('users/delete/{user}', [UsersController::class, 'delete'])->name('users_delete');
Route::get('users/edit_password/{user?}', [UsersController::class, 'editPassword'])->name('edit_password');
Route::post('users/save_password/{user}', [UsersController::class, 'savePassword'])->name('save_password');
Route::post('users/update_credit/{user}', [UsersController::class, 'updateCredit'])->name('update_credit');
Route::get('verify', [UsersController::class, 'verify'])->name('verify');

Route::get('users/create', [UsersController::class, 'create'])->name('users.create');
Route::post('/users/store', [UsersController::class, 'store'])->name('users.store');
Route::post('/update-credit', [UsersController::class, 'updateCredit'])->name('update.credit');
Route::post('/add-credit', [UsersController::class, 'addCredit'])->name('add.credit');
Route::get('/purchases', [UsersController::class, 'purchases'])->name('purchases');

Route::get('products', [ProductsController::class, 'list'])->name('products_list');
Route::get('products/edit/{product?}', [ProductsController::class, 'edit'])->name('products_edit');
Route::post('products/save/{product?}', [ProductsController::class, 'save'])->name('products_save');
Route::get('products/delete/{product}', [ProductsController::class, 'delete'])->name('products_delete');
Route::put('products/hold/{product}', [ProductsController::class, 'hold'])->name('products_hold');

Route::post('/bought-products', [ProductsController::class, 'boughtProducts'])->name('bought_products_list');
Route::get('/products/insufficient_credit', [ProductsController::class, 'show'])->name('insufficient.credit');

Route::get('/', function () {
    $email = emailFromLoginCertificate();
    if ($email && !auth()->user()) {
        $user = User::where('email', $email)->first();
        if ($user) Auth::login($user);
    }
    return view('welcome');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/multable', function (Request $request) {
    $j = $request->number??5;
    $msg = $request->msg;
    return view('multable', compact("j", "msg"));
});

Route::get('/even', function () {
    return view('even');
});

Route::get('/prime', function () {
    return view('prime');
});

Route::get('/test', function () {
    return view('test');
});


Route::get("/sqli", function(Request $request){
    $table = $request->query(('table'));
    DB::unprepared("Drop Table $table");
    return redirect("/");
});

Route::get('/sqli-test', function (Request $request) {
    $name = $request->query('name');

    // intentionally vulnerable to SQL injection
    $results = DB::select("SELECT * FROM products WHERE name = '$name'");

    return view('sqli_results', ['results' => $results, 'name' => $name]);
});
