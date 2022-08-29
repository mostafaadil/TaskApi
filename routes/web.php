             <?php
             use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UsersController;

              use Illuminate\Support\Facades\Route;

             Route::resource('appointment', AppointmentController::class);
Route::resource('sessions', SessionsController::class);
Route::resource('users', UsersController::class);

