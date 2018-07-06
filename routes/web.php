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

/*Route::get("tasklist",function(){
    return "hello world";
});

Route::get("tasklist2",function(){
    return "this is tasklist page!";
});

Route::get("/",function(){
    return view("tasklist");
});

for($num=1;$num<=30;$num++){
    if($num<=9){

    }
}
Route::get("/tasklist",function(){
    return view("tasklist", [
        "message" => "hello world",
        "tasks" => [
            "本を買いに行く",
            "部屋の掃除をする",
        ],
    ]);
});

Route::post("/task",function(){
    $taskName = request()->get("task_name");
    // ここでDBなりに保存する。
    return redirect("/tasklist");
});
Route::get("/params_test",function(){
    $title = request()->get("title");
    return $title;
});
*/

Route::get("/tasklist",function(){
    $tasks = DB::select("select * from tasks order by id desc");
        return view("tasklist", [
            "tasks"=> $tasks
            ]
        );
});

Route::post("/task",function(){
    $task_name = request()->get("task_name");
    $price = request()->get("price");
    $date = date("Y-m-d");
    $imageurl = request()->get("imageurl");
    $url = request()->get("url");
    $meri = request()->get("meritto");
    $demeri = request()->get("demeritto");
    $hosii = request()->get("hosii");
    $hitsuyou = request()->get("hitsuyou");

    DB::insert("insert into tasks (task_name,price,date,imageurl,url,meritto,demeritto,hosii,hitsuyou)
        values (?,?,?,?,?,?,?,?,?)",[$task_name,$price,$date,$imageurl,$url,$meri,$demeri,$hosii,$hitsuyou]);

    return redirect("/tasklist");
});

Route::post("/task/delete",function(){
    $taskId = request()->get("id");
    DB::delete("delete from tasks where id = ?", [$taskId]);
    return redirect("/tasklist");
});

Route::get("/sort/date/desc",function(){

    $tasks=DB::select("select * from tasks order by 4 desc");

    return view("tasklist", [
            "tasks"=> $tasks
        ]
    );
});
Route::get("/sort/date/asc",function(){

    $tasks=DB::select("select * from tasks order by 4");

    return view("tasklist", [
            "tasks"=> $tasks
        ]
    );
});
Route::get("/sort/hosiido/desc",function(){

    $tasks=DB::select("select * from tasks order by hosii desc");

    return view("tasklist", [
            "tasks"=> $tasks
        ]
    );
});
Route::get("/sort/hosiido/asc",function(){

    $tasks=DB::select("select * from tasks order by hosii");

    return view("tasklist", [
            "tasks"=> $tasks
        ]
    );
});
Route::get("/sort/hitsuyou/desc",function(){

    $tasks=DB::select("select * from tasks order by hitsuyou desc");

    return view("tasklist", [
            "tasks"=> $tasks
        ]
    );
});
Route::get("/sort/hitsuyou/asc",function(){

    $tasks=DB::select("select * from tasks order by hitsuyou");

    return view("tasklist", [
            "tasks"=> $tasks
        ]
    );
});

Route::get("/reset",function(){
    $tasks = DB::select("select * from tasks");
    return view("tasklist", [
            "tasks"=> $tasks
        ]
    );
});

Route::post("/task/update",function(){
    $taskId = request()->get("id");
    $task_name = request()->get("task_name");
    $price = request()->get("price");
    $imageurl = request()->get("imageurl");
    $url = request()->get("url");
    $meri = request()->get("meritto");
    $demeri = request()->get("demeritto");
    $hosii = request()->get("hosii");
    $hitsuyou = request()->get("hitsuyou");

    DB::update("update tasks set task_name=?,price=?,imageurl=?,url=?,meritto=?,demeritto=?,hosii=?,hitsuyou=? 
         where id=?",[$task_name,$price,$imageurl,$url,$meri,$demeri,$hosii,$hitsuyou,$taskId]);
    return redirect("/tasklist");
});

Route::post("/serch",function(){
    $searchKey = request()->get("srchword");
    
        $tasks = DB::select("select * from tasks where task_name like ?",["%$searchKey%"]);    
    
    return view("tasklist", [
            "tasks"=> $tasks
        ]
    );
});
