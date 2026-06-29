<?php

use App\Http\Controllers\AchievmentController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\ImportExportController;
use App\Http\Controllers\ParentCallController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\CounselingNoteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViolationController;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::middleware('role:admin')->group(function () {
        Route::resource('/user', UserController::class);
        Route::resource('/classroom', ClassroomController::class);
        Route::resource('/student', StudentController::class);
        Route::get('/student/{student}/riwayat', [StudentController::class, 'timeline'])->name('student.timeline');
        Route::resource('/violation', ViolationController::class);
        Route::resource('/counseling', CounselingNoteController::class);
        Route::resource('/appointment', AppointmentController::class);
        Route::resource('/parent-call', ParentCallController::class);
        Route::get('/parent-call/{parent_call}/confirm', [ParentCallController::class, 'confirm'])->name('parent-call.confirm');
        Route::put('/parent-call/{parent_call}/attendance', [ParentCallController::class, 'markAttendance'])->name('parent-call.attendance');
        Route::get('/report/semester', [ReportController::class, 'semester'])->name('report.semester');
        Route::get('/report/semester/{student}', [ReportController::class, 'semesterStudent'])->name('report.semester-student');

        Route::get('/import-export', [ImportExportController::class, 'index'])->name('import-export.index');
        Route::get('/import-export/export', [ImportExportController::class, 'export'])->name('import-export.export');
        Route::post('/import-export/import', [ImportExportController::class, 'import'])->name('import-export.import');

        Route::get('/achievment/all', [AchievmentController::class, 'all'])->name('achievment.all');
        Route::resource('/achievment', AchievmentController::class);
    });
});
