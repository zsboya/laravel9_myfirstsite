<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

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

/*
Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', function () {
    $username = 'Zsolt';
    return view('welcome', [
    'name' => $username
    ]);
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/arraytest', function () {
    $taskname = 'TODO list';
    $tasks = [
      'Go to the store.',
      'Go to the market.',
      'Go to the work.'
    ];
    //return view('arraytest', [ 'tasks' => $tasks ]);
    //return view('arraytest')->withTasks($tasks);
    return view('arraytest')->with([
        'taskname' => $taskname,
        'tasks' => $tasks
    ]);
});

Route::get('requesttest', function () {
    return view('requesttest', [
      'title' => request('title'),  // példa: http://127.0.0.1:8000/requesttest?title=asdf
      'foo' => '<script>alert("foobar");</script>'  // utvonalnev?kulcs1=ertek1&kulcs2=ertek2
    ]);
});

Route::get('/posts/{post}', function ($post) {
	$posts = [
		'my-first-post' => 'Hello, this is my first blog post!',
		'my-second-post' => 'Now I am getting the hang of this blogging thing.'
	];
	/*
	return view('post', [
		'post' => $posts[$post] ?? 'Nothing here yet.'
	]); */
	if ( ! array_key_exists($post, $posts)) {
		abort(404);
	}
	return view('post', [
		'post' => $posts[$post]
	]);
});

Route::get('/posts/{post}',[PostsController::class, 'show']);
