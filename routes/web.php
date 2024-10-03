<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProjectController;
use App\Models\SocialIcon; 
use App\Models\Project;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\HomeSettingsController;
use App\Http\Controllers\EntryController;
use App\Http\Controllers\AdminDashboardController;
use Illuminate\Http\Request;
use App\Models\Video; 

/*
|--------------------------------------------------------------------------|
| Web Routes                                                              |
|--------------------------------------------------------------------------|
| Here is where you can register web routes for your application. These   |
| routes are loaded by the RouteServiceProvider within a group which      |
| contains the "web" middleware group. Now create something great!        |
*/

// Home route for users
Route::get('/', function () {
    $projects = Project::all();
    $socialIcons = SocialIcon::all(); // Fetch social icons
    $videos = Video::all(); // Retrieve all videos here
    return view('user.projects.index', compact('projects', 'socialIcons', 'videos'));
});

// Admin routes
Route::prefix('admin')->group(function () {
    Route::get('/projects', [AdminController::class, 'index'])->name('admin.projects.index'); // List projects
    Route::get('/projects/create', [AdminController::class, 'create'])->name('admin.projects.index'); // Create project form
    Route::post('/projects', [AdminController::class, 'store'])->name('admin.projects.store'); // Store project
    Route::post('/projects/{project}/links', [AdminController::class, 'addLink']); // Add project links
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('admin.projects.index');
    Route::post('/projects', [ProjectController::class, 'store'])->name('admin.projects.store');
});

// Commented out redundant routes
// Route::get('/admin/projects', [AdminController::class, 'index']); // Redundant
// Route::post('/admin/projects', [AdminController::class, 'store']); // Redundant
// Route::get('projects/create', [AdminController::class, 'create'])->name('admin.projects.create'); // Redundant
// Route::post('/admin/projects/{project}/links', [AdminController::class, 'addLink']); // Redundant

// User project routes
Route::get('/projects', function () {
    $projects = Project::all();
    return view('user.projects.index', compact('projects'));
})->name('projects.index'); // List user projects

Route::get('/projects/{project}', function (Project $project) {
    return redirect()->to($project->links->first()->url);
})->name('project.show'); // Redirect to project link

// Admin social icons routes
Route::get('/admin/social-icons', [AdminController::class, 'socialIconsIndex'])->name('admin.social-icons.index'); // List social icons
Route::post('/admin/social-icons', [AdminController::class, 'storeSocialIcon'])->name('admin.social-icons.store'); // Store social icon

// Admin home settings routes
Route::prefix('admin')->group(function () {
    Route::get('home-settings', [HomeSettingsController::class, 'edit'])->name('admin.home-settings.edit'); // Edit home settings
    Route::put('home-settings', [HomeSettingsController::class, 'update'])->name('admin.home-settings.update'); // Update home settings
});

// Uncomment the following if you need the default welcome view
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/entries/create', [EntryController::class, 'create'])->name('entries.create');
Route::post('/entries', [EntryController::class, 'store'])->name('entries.store');
Route::get('/entries', [EntryController::class, 'index'])->name('entries.index');
Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin.index');
Route::get('/admin/projects/create', [ProjectController::class, 'create'])->name('admin.projects.create');
Route::post('/admin/projects', [ProjectController::class, 'store'])->name('admin.projects.store'); // Add this lin
Route::get('/uploadVideo', function () {
    return view('uploadVideo'); // Path to your upload form view
})->name('videos.uploadForm');

Route::post('uploadVideo', [VideoController::class, 'uploadVideo'])->name('videos.uploadVideo');
Route::get('/videos', [VideoController::class, 'index'])->name('videos.index');
// Route::post('/videos/upload', [VideoController::class, 'uploadVideo'])->name('videos.uploadVideo');
Route::post('/videos', [VideoController::class, 'uploadVideo'])->name('videos.uploadVideo');
Route::get('/uploadVideo', function () {
    return view('uploadVideo'); // Path to your upload form view
})->name('videos.uploadForm');
