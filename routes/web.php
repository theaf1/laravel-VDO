<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home',function() {
    return "hello world";
});

Route::get('/tasks',function(){
    return "Hello World";
});
Route::get('/index',function(){ 
    $title = "create form";
    $genders[] = ['id' => 0, 'name' => 'หญิง'];
    $genders[] = ['id' => 1, 'name' => 'ชาย'];
    return view ('index')->with(['title' => $title,'genders' => $genders]);
});

route::post('/store',function(Illuminate\Http\Request $request){
    return $request->all();
    return "Login Success";
});
Route::get('tasks/create', function(){
    // $types[] = [ 'id' => 1 , 'name' => 'Support' ];
    // $types[] = [ 'id' => 2 , 'name' => 'Mantain' ];
    // $types[] = [ 'id' => 3 , 'name' => 'Change Requirement' ];

    $types=\App\Type::all();
    $statuses[] = [ 'id' => 0 , 'name' => 'Incomplete' ];
    $statuses[] = [ 'id' => 1 , 'name' => 'Completed' ];
    return view('tasks.create')->with( ['types'=>$types, 'statuses'=>$statuses ] );

});

Route::post('/tasks/store',function(Illuminate\Http\Request $request){
    // $task = new \App\task();
    // $task->type = $request->type;
    // $task->name = $request->name;
    // $task->detail = $request->detail;
    // $task->status = $request->status;
    // $task->save();
    $validation = $request->validate([
        'type' => 'required',
        'name' => 'required|max:255',
        'status' => 'required',
        ]);
    \App\Task::create($request->all());
    return redirect()->back()->with('success','Created Successfully !!');
});
