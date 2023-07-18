<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\EduinfoController;
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


Route::get('/', [App\Http\Controllers\WelcomeController::class, 'showWelcome']); 
Route::get('/checkout/{id}', [App\Http\Controllers\CheckoutController::class, 'index'])->name('checkout'); 
Route::get('/payments', [App\Http\Controllers\PaymentDetailsController::class, 'index'])->name('payments'); 
Route::get('/instructor/{id}', [App\Http\Controllers\InstructorViewController::class, 'index'])->name('instructor'); 
Route::get('/watch/view_id/{parameter}', [App\Http\Controllers\ViewCourseController::class, 'index'])->name('watch.show'); 
Route::get('/dashboard', [App\Http\Controllers\StudentDashboardController::class, 'index'])->name('dashboard'); 
Route::post('/validate', [App\Http\Controllers\ValidateController::class, 'validatePay'])->name('validate');
Route::post('/pay', [App\Http\Controllers\PaymentController::class, 'redirectToGateway'])->name('pay');
Route::get('/payment/callback', [App\Http\Controllers\PaymentController::class, 'handleGatewayCallback']);
Route::get('/preview/unique_id/{parameter}', [App\Http\Controllers\PreviewCoursesController::class, 'index'])->name('preview.show'); 
Route::get('/register/{id}', [App\Http\Controllers\RedirectRegisterController::class, 'registrationRedirect'])->name('redirect'); 
Route::get('/register', [App\Http\Controllers\CustomAuthController::class, 'registrationUser'])->name('register'); 
Route::post('/delete', [App\Http\Controllers\DeletePostController::class, 'deletePost'])->name('delete'); 
Route::get('/tutor_pass', [App\Http\Controllers\ResetAdminPassController::class, 'showPage'])->name('tutor_pass'); 
Route::post('/reset_admin', [App\Http\Controllers\ResetAdminPassController::class, 'index'])->name('reset_admin'); 
Route::post('/register.user', [App\Http\Controllers\RegisterUserController::class, 'customRegistration'])->name('register.user'); 
Route::post('/custom-login', [App\Http\Controllers\AdminLoginController::class, 'customLogin'])->name('login.custom'); 
Route::get('/admin_login', [App\Http\Controllers\CustomAuthController::class, 'index'])->name('admin_login');
Route::get('/admin_logout', [App\Http\Controllers\LogoutAdminController::class, 'index'])->name('admin_logout');
Route::post('/edu-info', [App\Http\Controllers\EduinfoController::class, 'index'])->name('edu.info');
Route::post('/upload_pic', [App\Http\Controllers\EduinfoController::class, 'createProfilePic'])->name('upload.pic');
Route::post('/create-course', [App\Http\Controllers\MainDashboardController::class, 'createCourse'])->name('course.create'); 
Route::get('/admin_register', [App\Http\Controllers\AdminRegisterController::class, 'index'])->name('admin_registration');
Route::get('/main_dashboard', [App\Http\Controllers\MainDashboardController::class, 'index'])->name('main_dashboard');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin_dashboard', [App\Http\Controllers\AdminDashboardController::class, 'index'])->name('admin_dashboard'); 
Route::post('/custom-registration', [App\Http\Controllers\AdminRegisterController::class, 'customRegistration'])->name('register.custom'); 
Route::post('/set_question', [App\Http\Controllers\AdminDashboardController::class, 'setQuestion'])->name('set_question'); 
Route::post('/submit_exam', [App\Http\Controllers\UserExamController::class, 'markExam'])->name('submit_exam'); 
Route::post('/find_course', [App\Http\Controllers\SearchCoursesController::class, 'index'])->name('find_course'); 
Route::post('/add_trivia', [App\Http\Controllers\MainDashboardController::class, 'AddTriviaQuestions'])->name('add_trivia');
Route::post('/answer_trivia', [App\Http\Controllers\ViewCourseController::class, 'answerTrivia'])->name('answer_trivia');
Route::get('signout', [App\Http\Controllers\CustomAuthController::class, 'signOut'])->name('signout');
Route::get('explore', [App\Http\Controllers\AllCoursesController::class, 'exploreCourse'])->name('explore');
Route::get('/showcourse/cat/{id}', [App\Http\Controllers\AllCoursesController::class, 'showCourse'])->name('showcourse');
Auth::routes();
Route::get('/exam', [App\Http\Controllers\AdminDashboardController::class, 'examine'])->name('exam');
Route::get('/take_exam/{parameter}', [App\Http\Controllers\UserExamController::class, 'index'])->name('exam.show');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/prospective_tutor', [App\Http\Controllers\InstructorRequestController::class, 'index'])->name('prospective_tutor');
Route::get('/advert', [App\Http\Controllers\WebinarEventController::class, 'index'])->name('advert');
Route::get('/enable', [App\Http\Controllers\ValidateController::class, 'gotoValidate'])->name('enable');
Route::get('/about', [App\Http\Controllers\AboutUsController::class, 'index'])->name('about');
Route::get('/tutor_payment', [App\Http\Controllers\InstructorPaymentController::class, 'index'])->name('tutor_payment');
Route::get('/help', [App\Http\Controllers\InstructorSettingsController::class, 'index'])->name('help');
