<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Jobs\JobsController;
use App\Http\Controllers\Users\UsersController;
use Inertia\Inertia;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Ruta de prueba con Inertia
Route::get('/inertia-test', function () {
    return Inertia::render('Welcome');
});

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\Jobs\JobsController::class, 'about'])->name('about');
Route::get('/contact', [App\Http\Controllers\Jobs\JobsController::class, 'contact'])->name('contact');

Route::group(['prefix' => 'jobs'], function () {
    Route::get('single/{id}', [App\Http\Controllers\Jobs\JobsController::class, 'single'])->name('single.job');
    Route::post('save', [App\Http\Controllers\Jobs\JobsController::class, 'saveJob'])->name('save.job');
    Route::post('apply', [App\Http\Controllers\Jobs\JobsController::class, 'applyJob'])->name('apply.job');
    Route::any('search', [App\Http\Controllers\Jobs\JobsController::class, 'search'])->name('search.job');
});

Route::group(['prefix' => 'users'], function () {
    Route::get('profile', [App\Http\Controllers\Users\UsersController::class, 'profile'])->name('profile');
    Route::get('applications', [App\Http\Controllers\Users\UsersController::class, 'applications'])->name('applications');
    Route::get('savedjobs', [App\Http\Controllers\Users\UsersController::class, 'jobsaved'])->name('job.saved');
    Route::get('edit-details', [App\Http\Controllers\Users\UsersController::class, 'editDetails'])->name('edit.details');
    Route::post('edit-details', [App\Http\Controllers\Users\UsersController::class, 'updateDetails'])->name('update.details');
    Route::get('edit-cv', [App\Http\Controllers\Users\UsersController::class, 'editCv'])->name('edit.cv');
    Route::post('edit-cv', [App\Http\Controllers\Users\UsersController::class, 'updateCv'])->name('update.cv');

});

Route::group(['prefix' => 'categories'], function () {
    Route::get('single/{name}', [App\Http\Controllers\Categories\CategoriesController::class, 'singleCategory'])->name('categories.single');

});

Route::get('admin/login', [App\Http\Controllers\Admins\AdminsController::class, 'viewLogin'])->name('view.login') -> middleware('checkforauth');

Route::post('admin/login', [App\Http\Controllers\Admins\AdminsController::class, 'checkLogin'])->name('check.login');

// Ruta temporal para debuggear admin login
Route::get('debug-admin-login', function() {
    $admin = \App\Models\Admin\Admin::where('email', 'admin@bolsajobjuls.com')->first();
    
    if (!$admin) {
        return response()->json(['error' => 'Admin not found']);
    }
    
    echo "<h3>Admin Debug Information</h3>";
    echo "<p><strong>Email:</strong> {$admin->email}</p>";
    echo "<p><strong>Password in DB:</strong> [{$admin->password}]</p>";
    echo "<p><strong>Password length:</strong> " . strlen($admin->password) . "</p>";
    echo "<p><strong>Password hex:</strong> " . bin2hex($admin->password) . "</p>";
    
    // Test with exact password from DB
    $dbPassword = $admin->password;
    $testPassword = 'password123';
    
    echo "<h3>Password Comparison</h3>";
    echo "<p><strong>DB Password:</strong> '{$dbPassword}' (length: " . strlen($dbPassword) . ")</p>";
    echo "<p><strong>Test Password:</strong> '{$testPassword}' (length: " . strlen($testPassword) . ")</p>";
    echo "<p><strong>Are equal (===):</strong> " . ($dbPassword === $testPassword ? 'TRUE' : 'FALSE') . "</p>";
    echo "<p><strong>Are equal (==):</strong> " . ($dbPassword == $testPassword ? 'TRUE' : 'FALSE') . "</p>";
    
    // Test authentication
    $credentials = ['email' => 'admin@bolsajobjuls.com', 'password' => $dbPassword];
    echo "<h3>Authentication Test</h3>";
    echo "<p><strong>Using exact DB password:</strong> ";
    if (auth()->guard('admin')->attempt($credentials)) {
        echo "<span style='color: green;'>SUCCESS</span>";
        auth()->guard('admin')->logout();
    } else {
        echo "<span style='color: red;'>FAILED</span>";
    }
    echo "</p>";
    
    // Test with manual provider validation
    $provider = auth()->guard('admin')->getProvider();
    $user = $provider->retrieveByCredentials($credentials);
    if ($user) {
        $isValid = $provider->validateCredentials($user, $credentials);
        echo "<p><strong>Manual provider validation:</strong> " . ($isValid ? 'TRUE' : 'FALSE') . "</p>";
        echo "<p><strong>user->getAuthPassword():</strong> [{$user->getAuthPassword()}]</p>";
        echo "<p><strong>credentials password:</strong> [{$credentials['password']}]</p>";
    }
    
    return "";
});

// Test form for admin login
Route::get('test-admin-form', function() {
    return '
    <html>
    <head><title>Test Admin Login</title></head>
    <body>
        <h2>Test Admin Login Form</h2>
        <form method="POST" action="/admin/login">
            <input type="hidden" name="_token" value="' . csrf_token() . '">
            <div>
                <label>Email:</label><br>
                <input type="email" name="email" value="admin@bolsajobjuls.com" required>
            </div>
            <div>
                <label>Password:</label><br>
                <input type="password" name="password" value="password123" required>
            </div>
            <div>
                <input type="checkbox" name="remember_me" id="remember">
                <label for="remember">Remember me</label>
            </div>
            <div>
                <button type="submit">Login</button>
            </div>
        </form>
        
        <h3>Available Credentials:</h3>
        <ul>
            <li>admin@bolsajobjuls.com / password123</li>
            <li>superadmin@bolsajobjuls.com / superadmin123</li>
        </ul>
    </body>
    </html>';
});


Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
    Route::get('/', [App\Http\Controllers\Admins\AdminsController::class, 'index'])->name('admins.dashboard');
    Route::get('/all-admins', [App\Http\Controllers\Admins\AdminsController::class, 'admins'])->name('view.admins');
    Route::get('/create-admins', [App\Http\Controllers\Admins\AdminsController::class, 'createAdmins'])->name('create.admins');
    Route::post('/create-admins', [App\Http\Controllers\Admins\AdminsController::class, 'storeAdmins'])->name('store.admins');

    Route::get('/display-categories', [App\Http\Controllers\Admins\AdminsController::class, 'displayCategories'])->name('display.categories');

    Route::get('/create-categories', [App\Http\Controllers\Admins\AdminsController::class, 'createCategories'])->name('create.categories');
    Route::post('/create-categories', [App\Http\Controllers\Admins\AdminsController::class, 'storeCategories'])->name('store.categories');

    Route::get('/edit-categories/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'editCategories'])->name('edit.categories');
    Route::post('/edit-categories/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'updateCategories'])->name('update.categories');

    Route::get('/delete-categories/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'deleteCategories'])->name('delete.categories');

    Route::get('/display-jobs', [App\Http\Controllers\Admins\AdminsController::class, 'allJobs'])->name('display.jobs');

    Route::get('/create-jobs', [App\Http\Controllers\Admins\AdminsController::class, 'createJobs'])->name('create.jobs');
    Route::post('/create-jobs', [App\Http\Controllers\Admins\AdminsController::class, 'storeJobs'])->name('store.jobs');

    Route::get('/delete-jobs/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'deleteJobs'])->name('delete.jobs');

    Route::get('/display-apps', [App\Http\Controllers\Admins\AdminsController::class, 'displayApps'])->name('display.apps');

    Route::get('/delete-applications/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'deleteApplications'])->name('delete.applications');



});




