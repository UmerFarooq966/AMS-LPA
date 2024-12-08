<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LetterController;
use App\Http\Controllers\StudentController;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;

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


Route::get('/', function () {
    return redirect()->route('login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/student/index', [StudentController::class, 'index'])->name('student.index');
    Route::get('/student/create', [StudentController::class, 'create'])->name('student.create');
    Route::post('/student/create', [StudentController::class, 'store'])->name('student.store');
    Route::get('/student/{id}/edit', [StudentController::class, 'edit'])->name('student.edit');
    Route::put('/student/{id}', [StudentController::class, 'update'])->name('student.update');
    Route::delete('/student/{id}', [StudentController::class, 'destroy'])->name('student.destroy');
    Route::get('/student/deleted', [StudentController::class, 'showDeleted'])->name('student.deleted');
    Route::put('/student/{id}/restore', [StudentController::class, 'restore'])->name('student.restore');
});


Route::get('/letters/generate-offer-letter/{student}', [LetterController::class, 'generateOfferLetter'])
    ->name('letters.offer')
    ->whereNumber('student');
Route::get('/letters/generate-bank-details/{student}', [LetterController::class, 'generateBankDetailsLetter'])
    ->name('letters.bank')
    ->whereNumber('student');
Route::get('/letters/generate-acceptance-letter/{student}', [LetterController::class, 'generateAcceptanceLetter'])
    ->name('letters.acceptance')
    ->whereNumber('student');

Route::post('/emails/admission/{student}', [LetterController::class, 'sendAdmissionEmail'])
    ->name('letters.sendAdmissionEmail');


Route::get('/student/qr', [StudentController::class, 'viewQrStudent'])->name('student.qr.view');
Route::post('/student/qr/verify', [StudentController::class, 'verifyPassword'])->name('student.verifyPassword');


Route::middleware('auth')->group(function () {

    // Routes
    Route::get('courses', [CourseController::class, 'index'])->name('courses.index');
    Route::get('courses/create', [CourseController::class, 'create'])->name('courses.create');
    Route::post('courses', [CourseController::class, 'store'])->name('courses.store');
    Route::get('courses/{id}/edit', [CourseController::class, 'edit'])->name('courses.edit');
    Route::put('courses/{id}', [CourseController::class, 'update'])->name('courses.update');
    Route::delete('courses/{id}', [CourseController::class, 'destroy'])->name('courses.destroy');




    Route::get('agents', [AgentController::class, 'index'])->name('agents.index');
    Route::get('agents/create', [AgentController::class, 'create'])->name('agents.create');
    Route::post('agents', [AgentController::class, 'store'])->name('agents.store');
    Route::get('agents/{agent}', [AgentController::class, 'show'])->name('agents.show');
    Route::get('agents/{agent}/edit', [AgentController::class, 'edit'])->name('agents.edit');
    Route::put('agents/{agent}', [AgentController::class, 'update'])->name('agents.update');
    Route::delete('agents/{agent}', [AgentController::class, 'destroy'])->name('agents.destroy');
});

// Route::get('/emails/testMail', function () {
//     $details = [
//         'title' => 'Test Email from Laravel',
//         'body' => 'This is a test email to verify if the mail settings are correct.'
//     ];

//     Mail::to('digitel966@gmail.com')->send(new TestMail($details));

//     return 'Email has been sent!';
// });
