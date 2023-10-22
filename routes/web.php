<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\employeesController;
use App\Http\Controllers\studentsController;
use App\Http\Controllers\staffsController;
use App\Http\Controllers\dashboardsController;
use App\Http\Controllers\membersController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\DB;
use App\Models\Article;
use App\Models\Gender;
use App\Models\Item;
use App\Models\Role;
use App\Models\Tag;
use App\Models\User;
use App\Models\Phone;
use App\Models\Photo;
use Carbon\Carbon;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',function(){
    return "Save Myanmar";
});

Route::get("/sayar",function(){
    return "Hay,Sayar Nay Kaung Lar ??";
});

Route::get("sayhi",function(){
    return "Hi Min Ga Lar Par";
});

// Route::get('about',function(){
//     return view("aboutme");
// });

// (or)

Route::view("about","aboutme");

// Route::get("about/company",function(){
//     return view('aboutcompany');
// });

// (or)

Route::view('about/company','aboutcompany');


// Route::get('contact',function(){
//     return redirect('about');
// });

Route::redirect('contact','about/company');

Route::get('about/company/{staff}',function($staff){
    return view('aboutcompanystaff',['sf'=>$staff]);
});


Route::get('about/company/{staff}/{city}',function($staff,$city){
	return view('aboutcompanystaffbycity',['sf'=>$staff,'ct'=>$city]);
});


Route::get('profile',function(){
    return view('profileme');
})->name('profiles');



// Route::get('/students',[\App\Http\Controllers\studentsController::class,'index'])->name('students.index');
// Route::get('/students/show',[\App\Http\Controllers\studentsController::class,'show'])->name('students.show');
// Route::get('/students/edit',[\App\Http\Controllers\studentsController::class,'edit'])->name('students.edit');

// Route::group(['prefix'=>'students'],function(){
//     Route::get('/',[\App\Http\Controllers\studentsController::class,'index'])->name('students.index');
//     Route::get('/show',[\App\Http\Controllers\studentsController::class,'show'])->name('students.show');
//     Route::get('/edit',[\App\Http\Controllers\studentsController::class,'edit'])->name('students.edit');
// });

Route::name('students.')->group(function(){
    Route::get('/students',[studentsController::class,'index'])->name('index');
    Route::get('/students/show',[studentsController::class,'show'])->name('show');
    Route::get('/students/edit',[studentsController::class,'edit'])->name('edit');
});


// 27GP

Route::get('/staffs',[staffsController::class,'home'])->name('staffs.home');
Route::get('/staffsparty',[staffsController::class,'party'])->name('staffs.party');
Route::get('/staffsparty/{total}',[staffsController::class,'partytotal'])->name('staffs.total');
Route::get('staffsparty/{total}/{status}',[staffsController::class,'partytotalconfirm'])->name('staffs.status');


Route::get('employees',[employeesController::class,'index'])->name('employee.index');
Route::get('employees/show',[employeesController::class,'show'])->name('employees.show');
Route::get('/employees/passingdataone',[employeesController::class,'passingdataone'])->name('employees.passingdataone');
Route::get('/employees/passingdatatwo',[employeesController::class,'passingdatatwo'])->name('employees.passingdatatwo');
Route::get('/employees/passingdatathree',[employeesController::class,'passingdatathree'])->name('employees.passingdatathree');
Route::get('/employees/passingdatafour',[employeesController::class,'passingdatafour'])->name('employees.passingdatafour');
Route::get('employees/edit',[employeesController::class,'edit'])->name('employees.show');
Route::get('employees/update',[employeesController::class,'update'])->name('employees.update');



Route::get('/dashboards',[dashboardsController::class,'index'])->name('dashboards.index');
Route::get('/members',[membersController::class,'index'])->name('members.index');



// =>Data Insert From Route
// use Illuminate\Support\Facades\DB;
Route::get('types/insert',function(){
    DB::insert("INSERT INTO types(name) value(?)",["pdf"]);
    return "Successfully Inserted";
});

// Route::get('types/read',function(){
//     $results = DB::select("SELECT * FROM types");
    
//     return $results;
// });

// Route::get('types/read',function(){
//     $results = DB::select("SELECT * FROM types");
    
//     return var_dump($results);
// });


// Route::get('types/read',function(){
//     $results = DB::select("SELECT * FROM types");
    
//     foreach($results as $type){
//         echo $type->name . "<br/>";
//     } 
// });


// Route::get('types/read',function(){
//     $result = DB::select("SELECT * FROM types WHERE id=?",[3]);
    
//     return $result;
// });

Route::get('students/insert', function() {
    DB::insert('INSERT INTO students(name, phone, city) value(?,?,?)', ['aung aung', '1111', 'yangon']);
    return "Data Inserted";
});

Route::get('types/update', function() {
    // DB::update("UPDATE types SET name='ebook' WHERE id=?", [3]);
    // DB::update("UPDATE types SET name='pdf' WHERE id=?", [3]);

    return "Data Updated";
});

Route::get('shoppers/update', function(){
    DB::update("UPDATE shoppers SET fullname=?, phonenumber=?, city=? WHERE id=?", ['kyaw kyaw','22222', 'bago', 2]);

    return 'Data Updated';
});


Route::get('shoppers/delete', function() {
    DB::delete('DELETE FROM shoppers WHERE id=?',[2]);

    return 'Data Deleted';
});

Route::get('shoppers/read', function() {

    // $results = DB::select('SELECT * from shoppers');`
    // return $results;

    // $results = DB::select('SELECT * from shoppers WHERE id=?',[6]);
    // return $results;

    // $results = DB::table('shoppers')->get();
    // return $results;



    // =>select(columns)
    // =>selectRaw(expression)
    // =>DB::raw(value)

    // $results = DB::table('shoppers')->select('*')->get();
    // $results = DB::table('shoppers')->selectRaw('*')->get();

    // $results = DB::table('shoppers')->select(DB::raw('*'))->get();
    // $results = DB::table('shoppers')->selectRaw(DB::raw('*'))->get();

    // $results = DB::table('shoppers')->select('*')->where('id',5)->get();
    // $results = DB::table('shoppers')->select('fullname')->where('id',5)->get();
    // $results = DB::table('shoppers')->select('fullname','phonenumber')->where('id',5)->get();
    // $results = DB::table('shoppers')->select('fullname','phonenumber','city')->where('id',5)->get();
    // $results = DB::table('shoppers')->select('fullname','phonenumber')->where('id','<>',5)->get();


    // $results = DB::table('shoppers')->select(DB::raw('*'))->where('id',5)->get();
    // $results = DB::table('shoppers')->select('fullname')->where('id',5)->get();
    // $results = DB::table('shoppers')->select(DB::raw('fullname, phonenumber'))->where('id',5)->get();
    // $results = DB::table('shoppers')->select(DB::raw('fullname, phonenumber,city'))->where('id',5)->get();

    // $results = DB::table('shoppers')->selectRaw('*')->where('id',5)->get();
    // $results = DB::table('shoppers')->selectRaw('fullname')->where('id',5)->get();
    // $results = DB::table('shoppers')->selectRaw('fullname, phonenumber')->where('id',5)->get();
    // $results = DB::table('shoppers')->selectRaw('fullname, phonenumber,city')->where('id',5)->get();
    // $results = DB::table('shoppers')->selectRaw('fullname, phonenumber,city')->where('id','<>',5)->get();




    // $results = DB::table('shoppers')->selectRaw(DB::raw('*'))->where('id',5)->get();
    // $results = DB::table('shoppers')->selectRaw(DB::raw('fullname'))->where('id',5)->get();
    // $results = DB::table('shoppers')->selectRaw(DB::raw('fullname, phonenumber'))->where('id',5)->get();
    // $results = DB::table('shoppers')->selectRaw(DB::raw('fullname, phonenumber,city'))->where('id',5)->get();
    // $results = DB::table('shoppers')->selectRaw(DB::raw('fullname, phonenumber,city'))->where('id','<>',5)->get();

    // *error
    // $results = DB::table('shoppers')->select('count(*) AS totalshopper, city')->where('id', '<>',5)->groupBy('city')->get();

    // oki
    // $results = DB::table('shoppers')->select(DB::raw('count(*) AS totalshopper, city'))->where('id', '<>',5)->groupBy('city')->get();

    // $results = DB::table('shoppers')->selectRaw('count(*) AS totalshopper, city')->where('id', '<>',5)->groupBy('city')->get();
    // $results = DB::table('shoppers')->selectRaw(DB::raw('count(*) AS totalshopper, city'))->where('id', '<>',5)->groupBy('city')->get();
    // return $results;

    // $results = DB::table('shoppers')->first();
    // return $results;

    // =>pluck(column,key)

    // $results = DB::table('shoppers')->pluck('fullname'); //array 
    $results = DB::table('shoppers')->pluck('fullname','id'); //object 
    return $results;

});

// => Database Eloquent ORM
// sro 
// use App\Models\Article;
Route::get('articles/read',function() {
    
    // $articles = Article::all();
    // return $articles;

    // $articles = Article::all();
    // return "$articles";

    $articles = Article::all();
    // var_dump($articles);

    foreach($articles as $article){
        echo "$article->title <br/>  $article->description <hr/>";
    }

});

Route::get('articles/find',function(){
    // $articles =  Article::find(5);
    // return $articles;

    // =Not Found Exception 
    // $articles =  Article::findOrFail(20);
    // return $articles; //404 NOT FOUND 

    // $articles =  Article::findOrFail(20);
    // echo "$article->title <br/> $article->description <hr/>";

    // findOr('id',callback)
    $article = Article::findOr('50', function(){
        return "Hello sir there is no result for Primary ID 50";
    });
    return $article;
});


Route::get('articles/where',function(){

    // $article =  Article::where('user_id',2)->get();
    // return $article;

    // =>asc/desc
    // $article =  Article::where('user_id',1)->orderBy('id','desc')->get();
    // $article =  Article::where('user_id',1)->orderByDesc('id')->get();
    // return $article;


    // $article =  Article::where('user_id',2)->orderBy('id','desc')->take(3)->get();
    // return $article;

    // $article =  Article::where('user_id',2)->orderBy('id','asc')->limit(3)->get();
    // return $article;

    // $article =  Article::where('user_id',2)->first();
    // return $article;

    // $article =  Article::where('id',">",3)->get();
    // return $article;

    // $article =  Article::where('id',2)->select('user_id','title','description')->first();
    // return $article;


    // $article =  Article::where('id',2)->pluck('description'); //array
    // $article =  Article::where('id',2)->pluck('description','id'); //object
    // return $article;

    // $article = Article::firstWhere('user_id',2); //object 
    // return $article;

    // =Not Found Exception 

    // $articles = Article::where('id','>',5)->get();
    // return $articles;


    // $article = Article::where('id','>',50)->firstOrFail();
    // return $article; //404NOT FOUND 

    // firstOr(callback)
   $article = Article::where('user_id',3)->firstOr(function(){
    return "Hello sir there is no result for User ID 3";
   });
   return $article;

});

// =>Retreving Aggregates

Route::get('articles/aggregates',function(){
    $data = [
        ['price'=>100],
        ['price'=>200],
        ['price'=>300],
        ['price'=>400]
    ];

    // var_dump($data);
    // echo "<br/>";
    // var_dump(collect($data));

    // dd(
    //     $data,
    //     collect($data)
    // );

    // return collect($data)->count(); //4 
    // return collect($data)->max(); // {"price":400} 
    // return collect($data)->max(function($num){
    //     return $num['price'];
    // }); //400


    // return collect($data)->min(); //{"price":100}

    // return collect($data)->min(function($num){
    //     return $num['price'];
    // }); // 100

    // return collect($data)->average(function($num){
    //     return $num['price'];
    // }); //250

    //  return collect($data)->avg(function($num){
    //     return $num['price'];
    // }); //250


    // return collect($data)->sum(function($num){
    //     return $num['price'];
    // }); //1000

    // $articles = Article::all()->count();
    // return $articles; //10

    // $articles = Article::where('user_id',1)->count();
    // return $articles; //5

    // $articles = Article::where('user_id',1)->max('rating');
    // return $articles; //5

    // $articles = Article::where('user_id',1)->min('rating');
    // return $articles; //2

    // $articles = Article::where('user_id',1)->average('rating');
    // $articles = Article::where('user_id',1)->avg('rating');
    // return $articles; //3.6000 

    $articles = Article::where('user_id',1)->sum('rating');
    return $articles; // 18


});

// --------------------------------

// =>Retrieving or Create Data to Model 

Route::get('articles/create', function(){

    // $article = Article::firstOrCreate([
    //     'title'=>'this is new article 1'
    // ]);
    // return "Retrieve Data or Insert $article";


    // $article = Article::firstOrCreate([
    //     'title'=>'this is new article 15',
    //     'description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
    //     'user_id'=>3,
    //     'rating'=>2
    // ]);
    // return "Retrieve Data or Insert $article";


    $article = Article::firstOrCreate(
        [ 'title'=>'this is new article 17'],
        [
        'description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        'user_id'=>1,
        'rating'=>5
    ]);
    return "Retrieve Data or Insert $article";

});

Route::get('articles/filter',function(){

    // $articles = Article::get()->filter(function($article){
    //     return $article->id > 5;
    // });

    // $articles = Article::all()->filter(function($article){
    //     return $article->id > 5;
    // });

    $articles = Article::cursor()->filter(function($article){
        return $article->id > 3;
    });

    foreach($articles as $article){
        echo "$article->id <br/> $article->title <br/> $article->description <hr/>";
    }

});

Route::get('articles/reject', function(){
   $data = [
    100,
    200,
    300,
    '0',
    1,
    '1',
    'aung aung',
    '',
    ' ',
    null,
    true, 
    false, 
    [],
    ['red','green','blue'],
    ['price'=>100],
   ];

    //    dd(
    //     $data,
    //     collect($data)
    //    );

    $collections = collect($data);

    // return $collections->reject(); // {"3":"0","7":"","9":null,"11":false,"12":[]}


    return $collections->reject(function($value){
        // return empty($value); // {"0":100,"1":200,"2":300,"4":1,"5":"1","6":"aung aung","8":" ","10":true,"13":["red","green","blue"],"14":{"price":100}}
    });

    return $collections->filter(function($value){
        // return $value; //{"0":100,"1":200,"2":300,"4":1,"5":"1","6":"aung aung","8":" ","10":true,"13":["red","green","blue"],"14":{"price":100}}
        // return empty($value); // {"3":"0","7":"","9":null,"11":false,"12":[]}
        // return is_numeric($value); // [100,200,300,"0",1,"1"]
        // return is_string($value); //{"3":"0","5":"1","6":"aung aung","7":"","8":" "}
        // return is_bool($value); //{"10":true,"11":false}
        // return is_array($value); //{"12":[],"13":["red","green","blue"],"14":{"price":100}}
        return is_null($value); //{"9":null}
    });

});

// =>whereColumn('column1','column2'); // compare and result same value 
// =>whereColumn('column1','co','column2'); //compare and result save value 
// =>whereColumn([[],[]]); //multi compare and result same value 
Route::get('articles/wherecolumn', function(){
    // $articles = Article::whereColumn('id','user_id')->get();

    // $articles = Article::whereColumn('created_date','updated_date')->get();
    // return $articles;

    // $articles = Article::whereColumn('updated_date','>','created_date')->orderByDesc('id')->get();
    // return $articles;

    // $articles = Article::whereColumn([
    //     ['id','user_id']
    // ])->get();
    // return $articles;

    $articles = Article::whereColumn([
        ['id','user_id'],
        ['created_date','updated_date']
    ])->get();
    return $articles;

});


Route::get('articles/insert', function(){

    // Method 1
    // $article = new Article();
    // $article->title = "this is new article 1";
    // $article->description = "Lorem Ipsum is simply dummy text of the printing a...";
    // $article->user_id = 1;
    // $article->rating = 3;
    // $article->save();

    // return "Data Inserted $article";

    // Method 2
    // $article = Article::create([
    //     'title' => 'this is new article 22',
    //     'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry.",
    //     'user_id' => 2,
    //     'rating' => 5
    // ]);

    // return "Data Inserted $article";


    // echo now();
    // echo "<br/>";
    // var_dump(now());

    // $article = DB::table('articles')->insert([
    //     'title' => 'this is new article 25',
    //     'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry.",
    //     'user_id' => 2,
    //     'rating' => 5,
    //     'created_date' => now(),
    //     'updated_date' => now()
    // ]);

    // return "Data Inserted $article";



    // echo now();
    // echo "<br/>";
    // var_dump(now());

    // echo now()->toDateTimeString();
    // echo "<br/>";
    // var_dump(now()->toDateTimeString());

    // echo now()->toDateTimeString();
    // echo "<br/>";
    // echo now("Asia/Yangon")->toDateTimeString();
    // echo "<br/>";
    // echo now("Asia/Bangkok")->toDateTimeString();

    // echo date("Y-m-d H:i:s");

    date_default_timezone_set('Asia/Bangkok');

    $getdate = now("Asia/Yangon")->toDateTimeString();
    $today = date("Y-m-d H:i:s");

    // dd($getdate,$today);

    // use Carbon\Carbon;
    $curdatetime = Carbon::now();
    // echo $curdatetime;
    // var_dump($curdatetime); //object

    $article = DB::table('articles')->insert([
        'title' => 'this is new article 22',
        'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry.",
        'user_id' => 2,
        'rating' => 5,
        'created_date' => $getdate,
        'updated_date' => $curdatetime
    ]);

    return "Data Inserted $article";

});

Route::get('articles/update', function() {

    // $article = Article::find(1);
    // $article->title = "this is new article 01";
    // $article->save();

    // $article = Article::findOrFail(10);
    // $article->title = "this is new article 010";
    // $article->user_id = 4;
    // $article->save();
    // return "Data Updated $article";


    // = Mass Updates 

    // $article = Article::where('rating',1)->update(['rating'=>2]);

    // $article = Article::where('user_id',2)
    // ->where('rating',5)
    // ->update(['rating'=>3]);

    // return "Data Updated Successfully = $article";

    $article = Article::updateOrCreate(
        ['title'=>'this is new article 01','description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry..'],
        ['user_id'=>1,'rating'=>5]
    );

    return "Data Updated Successfully = $article";

});

Route::get('articles/delete', function(){

    // $article = Article::find(1);

    // $article = Article::findOrFail(2);
    // $article->delete(); 
    // return "Data Delete Successfully = $article";

    // $article = Article::where('rating',3)->delete();
    // return "Data Delete Successfully = $article";

    // = Bulk Delete ( Note :: must be primary key )
    // $article = Article::destroy(12);

    // $article = Article::destroy(10,11);

    // $article = Article::destroy([1,2,3,4]);
    // $article = Article::destroy(collect([7,8,9]));

    // return "Data Delete Successfully = $article";


    // = truncate( Be Careful & ID will start from 1 again )
    
    // Article::truncate();
    // return "Data Truncate Successfully";

    // $article = Article::findOrFail(5);
    // $article->delete();

    // $article = Article::destroy(13,14,15);

    // $article = Article::destroy([19,20]);

    // $article = Article::destroy(collect([21,22]));
    $article = Article::destroy(collect([18,19,20,21,22]));

    return "Data Delete Successfully = $article";


});


Route::get('articles/restore',function(){


    // Article::withTrashed()->restore();
    // return "Restore From Trash Successfully.";

    Article::withTrashed()
    ->where('rating',5)
    ->restore();
    return "Restore From Trash Successfully.";


});


Route::get('articles/forcedelete', function(){

    // $article = Article::findOrFail(5);
    // $article->delete();

    // $article = Article::findOrFail(6);
    // $article->forceDelete();

    // *Result = 404 not found cuz 21 is already in soft delete 
    // $article = Article::findOrFail(21);
    // $article->delete();

    // *Result = 404 not found cuz 21 is already in soft delete 
    $article = Article::findOrFail(21);
    $article->forceDelete();

    return "Data Force Delete Successfully";

});

Route::get('articles/gettrash', function(){

    // $articles = Article::all();
    // return $articles; // not inc from trash

    // $articles = Article::withTrashed()->get();
    // return $articles; // all inc from trash & non trash

    // $articles = Article::withTrashed()
    // ->where('rating',3)
    // ->get();
    // return $articles; // all inc from trash & non trash by rating 3


    // $articles = Article::onlyTrashed()->get();
    // return $articles; // all from trash only 

    // $articles = Article::onlyTrashed()
    // ->where('rating',3)
    // ->get();
    // return $articles; // all from trash only  by rating 3 

    $articles = Article::onlyTrashed()->findOrFail(21);
    return $articles;

});

Route::get('articles/restoresingle', function(){

    // $article = Article::findOrFail(5);
    // return $article; // 404 Not Found

    $article = Article::onlyTrashed()
            ->findOrFail(5)
            ->restore();
    return $article;

});

// ---------------------------

// =>Eloquent Relationships 

// =One to One 

Route::get('users/{id}/article', function($id){
    $article = User::findOrFail($id)->article->title;
    // $article = User::findOrFail($id)->article->description;
    // $article = User::findOrFail($id)->article->rating;

    return $article;
});

Route::get('articles/{id}/user', function($id){
    $article = Article::findOrFail($id)->user->name;

    return $article;

});


// =One to Many 

Route::get('articles/{id}/byuser', function($id){

    $user = User::findOrFail($id);
    // return $user->articles;

    foreach($user->articles as $article){
        echo $article."<br/>";
    }

});

// = Many to Many 


Route::get('user/{id}/role', function($id){
    // $user = User::findOrFail($id);
    // return $user->roles;

    // $user = User::findOrFail($id);

    // foreach($user->roles as $role){
    //     echo $role->name."<br/>";
    // }

    $user = User::findOrFail($id)->roles()->orderBy('id','asc')->get();
    return $user;

});


Route::get('user/{id}/rolecreatedate',function($id){
    $user = User::findOrFail($id);

    foreach($user->rolecreatedate as $role){
        echo $role->pivot->created_at."<br/>";
    }
});


// = Has Many Through 

Route::get('genders/{id}/article', function($id){

    $gender = Gender::findOrFail($id);

    foreach($gender->articles as $article){
        echo $article->title."<br/>";
    }

});


// = Polymorphic Relationship 

Route::get('users/{id}/photo', function($id){

    $user = User::findOrFail($id);
    
    foreach($user->photos as $photo){
        echo $photo->path. "<br/>";
    }
    
});

Route::get('articles/{id}/photo', function($id){

    $article = Article::findOrFail($id);
    
    foreach($article->photos as $photo){
        echo $photo->path. "<br/>";
    }
    
});


// ---
// = Reverse Thinking 


Route::get('photos/{id}/result', function($id){

    // $photo = Photo::findOrFail($id);
    // return $photo->imageable;
    // return $photo->imageable->title;


    $photo = Photo::findOrFail($id);
    return $photo->photoable; 


});


// ----

Route::get('articles/{id}/comment', function($id){
    $article = Article::findOrFail($id);

    foreach($article->comments as $comment){
        echo $comment->message."<br/>";
    }

});


Route::get('users/{id}/comment', function($id){
    $user = User::findOrFail($id);

    foreach($user->comments as $comment){
        echo $comment->message."<br/>";
    }

});

// ---------------------------


// => Polymorphic Relationship Many to Many 

Route::get('items/{id}/tag', function($id){
    
    $item = Item::findOrFail($id);

    foreach($item->tags as $tag){
        echo $tag->name."<br/>";
    }
});

Route::get('tags/{id}/article', function($id){
    
    $tag = Tag::findOrFail($id); 

    foreach($tag->articles as $article){
        echo $article->title."<br/>";
    }
});

Route::get('tags/{id}/item', function($id){
    
    $tag = Tag::findOrFail($id);

    foreach($tag->items as $item){
        echo $item->name."<br/>";
    }
});

// -------------------------------

Route::get('users/{id}/phone/insert', function($id){
    $user = User::findOrFail($id);

    // =Method 1
    // $phone = new Phone;
    // $phone->number = "09444444";
    // $phone->user_id = $user->id;
    // $phone->save();
    // return "Data Inserted";


    // =Method 2
    // $phone = Phone::create([
    //     'number'=>'09555555',
    //     'user_id'=> $id
    // ]);
    // return "Data Inserted";


    // =Method 3
    // $phone = new Phone([
    //     'number'=>'0966666',
    //     'user_id'=>$user->id
    // ]);
    // $user->phone()->save($phone);
    // return "Data Inserted";


    // =Method 4(no need user id)
    // $phone = new Phone([
    //     'number'=>'09888888'
    // ]);
    // $user->phone()->save($phone);
    // return "Data Inserted";

    // =Method 5
    // $user->phone()->save(new Phone([
    //     'number'=>'09111111',
    //     'user_id'=>$user->id
    // ]));
    // return "Data Inserted";

    // =Method 6(no need user id)
    $user->phone()->save(new Phone([
        'number'=>'09222222'
    ]));
    return "Data Inserted";

});

Route::get('users/{id}/phone/update',function($id){

    // $phone = Phone::whereUserId($id)->first(); //Single Update 
    // $phone->number = '09-111-111';
    // $phone->save();
    // return "Data Updated";

    $phones = Phone::whereUserId($id)->get(); //Bulk Update
   foreach($phones as $phone){
    $phone->number = '09-111-112';
    $phone->save();
   }
    return "Data Updated";

});

Route::get('user/{id}/phone/read',function($id){
    $user = User::findOrFail($id);
    $user = $user->phone->number;

    return "Data reading = $user";
});

Route::get('user/{id}/phone/delete',function($id){
    // $user = User::findOrFail($id); // single delete
    // $user = $user->phone->delete();
    // return "Data Deleted";

    $user = User::findOrFail($id);//bulk delete
    $user = $user->phone()->delete();

    return "Data Deleted";
});

// -------------------------------

// =>Eloquent One to Many Relationship / hasMany(class);


Route::get('users/{id}/article/insert', function($id){
    $user = User::findOrFail($id);

    // =Method 1
    // $article = new Article;
    // $article->title = "this is new article 23";
    // $article->description = "Lorem Ipsum is simply dummy text of the printing and typesetting industry.";
    // $article->user_id = $id;
    // $article->rating = 5;
    // $article->save();
    // return "Data Inserted";


    // =Method 2
    // $phone = Article::create([
    //     'title'=>'this is new article 24',
    //     'description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
    //     'user_id'=> $id,
    //     'rating'=>3
    // ]);
    // return "Data Inserted";


    // =Method 3
    // $article = new Article([
    //     'title'=>'this is new article 25',
    //     'description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
    //     'user_id'=> $id,
    //     'rating'=>3
    // ]);
    // $user->articles()->save($article);
    // return "Data Inserted";


    // =Method 4(no need user id)
    // $article = new Article([
    //     'title'=>'this is new article 26',
    //     'description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
    //     'rating'=>3
    // ]);
    // $user->articles()->save($article);
    // return "Data Inserted";

    // =Method 5
    // $user->articles()->save(new Article([
    //     'title'=>'this is new article 27',
    //     'description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
    //     'user_id'=> $id,
    //     'rating'=>5
    // ]));
    // return "Data Inserted";

    // =Method 6(no need user id)
    $user->articles()->save(new Article([
        'title'=>'this is new article 27',
        'description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        'rating'=> 6
    ]));
    return "Data Inserted";

}); 


Route::get('users/{id}/article/update',function($id){

    // $article = Article::whereUserId($id)->first(); //Single Update 
    // $article->title = 'this is new article 29';
    // $article->description = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.';
    // $article->rating = 1;
    // $article->save();
    // return "Data Updated";

    //     $articles = Article::whereUserId($id)->get(); //Bulk Update
    //    foreach($articles as $article){
    //     $article->title = 'this is new article 001';
    //     $article->description = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.';
    //     $article->rating = 1;
    //     $article->save();
    //    }
    //     return "Data Updated";


    // $user = User::findOrFail($id);//single update
    // $user->articles()->where('id','=',15)->update([
    //    'title' => 'this is new article 1000',
    //    'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
    //    'rating' => 1
    // ]);
    // return "Data Updated";


    $user = User::findOrFail($id);//Bulk update
    $user->articles()->where('rating','=',5)->update([
       'title' => 'this is new article 1000',
       'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
       'rating' => 3
    ]);
    return "Data Updated";
});


Route::get('user/{id}/articles/read',function($id){

    $user = User::findOrFail($id);

    foreach($user->articles as $article){
        echo $article->title."<br/>";
    }

});



Route::get('user/{id}/article/delete',function($id){

    // Note::error , cuz this one to many Relationship 
    // $user = User::findOrFail($id); // single delete
    // $user->articles->delete();
    // return "Data Deleted";

    // $user = User::findOrFail($id); // single delete
    // $user->articles()->whereId(28)->delete();
    // return "Data Deleted";

    $user = User::findOrFail($id);//bulk delete
    $user->articles()->delete();

    return "Data Deleted";

});



// -------------------------------------


// =>Eloquent Many to Many Relationship / belongsToMany(class)

Route::get('users/{id}/roles/insert', function($id){

    // Note:: action to (Role/Userrole)
    $user = User::findOrFail($id);

    $user->roles()->save(new Role([
        'name' => 'adviser'
    ]));

    return "Data Inserted";
});


Route::get('users/{id}/role/update', function($id){

    $user = User::findOrFail($id);

    if($user->has('roles')){
        foreach($user->roles as $role){
            if($role->name == 'adviser'){
                $role->name = 'co-worker';
                $role->save();
            }
        }
    }

    return "Data Updated";
});


Route::get('users/{id}/role/read', function($id){

    $user = User::findOrFail($id);

    if($user->has('roles')){
        foreach($user->roles as $role){
            echo $role->name."<br/>";
        }
    }
});

Route::get('users/{id}/role/delete', function($id){
    
   
    // $user = User::findOrFail($id); // Single Delete 
    // foreach($user->roles as $role){
    //     $role->whereId(5)->delete();
    // }

    // return "Data Deleted";

    $user = User::findOrFail($id); // Bulk Delete 
    $user->roles()->delete();
    return "Data Deleted";

});

Route::get('users/{id}/role/attach',function($id){
    // Note :: check Role table & UserRole table (no-action/action);
    // Noted :: added role permission to user id 
    $user = User::findOrFail($id);
    $user->roles()->attah(5);
    return "Data Attached";
});

Route::get('users/{id}/role/detach',function($id){
    // Note :: check Role table & UserRole table (no-action/action);
    $user = User::findOrFail($id);

    // Noted :: removed role permission for refer user id 
    // $user->roles()->detach();
    // Noted :: removed role id 1 for refer user id 
    $user->roles()->detach(1);
    return "Data Detached";
});

Route::get('users/{id}/role/sync', function($id){

    $user = User::findOrFail($id);

    // Note :: Check Role table & UserRole table (no-action/action)
    // Meaning :: want to keep only role id 2 for refer user id 

    // $user->roles()->sync(1);

    // Meaning :: want to keep only role id 2,4 for refer user id
    // $user->roles()->sync([2,4]);

    // Meaning :: want to keep existing role id 2,4 an dadd more role id 1,5 for refer user id 

    $user->roles()->sync([1,2,4,5]);

    return "Data Synced";
});

// ---------------------------------

// => Eloquent Polymorphic Relationship 

Route::get('users/{id}/photo/insert', function($id){

    $user = User::findOrFail($id);

    $user->photos()->save(new Photo([
        'path'=>'public\assets\photo\profile1.jpg'
    ]));

    return "Data Inserted";

});


Route::get('articles/{id}/photo/insert', function($id){

    $article = Article::findOrFail($id);

    $article->photos()->create([
        'path'=>'public\assets\photo\articlepic1.jpg'
    ]);

    return "Data Inserted";

});



Route::get('users/{id}/photo/read', function($id){
    $user = User::findOrFail($id);

    if($user->has('photos')){
        foreach($user->photos as $photo){
            echo $photo->path . "<br/>";
        }
    }
});

Route::get('users/{id}/photo/update', function($id){
    $user = User::findOrFail($id);

    $photo = $user->photos()->whereId(8)->first();

    $photo->path = "public\assets\photo\userprofile1.jpg";
    $photo->save();

    return "Data Updated";

});

Route::get('users/{id}/photo/updateimgtype', function($id){
    $user = User::findOrFail($id);
    $photo = Photo::findOrFail(16);

    $user->photos()->save($photo);

    return "Data Updated";
});

Route::get('users/{id}/photo/delete', function($id){

    // $user = User::findOrFail($id); // Single Delete
    // $user->photos()->whereId(7)->delete();
    // return "Data Deleted";

    $user = User::findOrFail($id); // Bulk Delete
    $user->photos()->delete();
    return "Data Deleted";

});

// ----------------------------------

// => Eloquent Polymorphic Many to Many Relationship 

Route::get('items/tag/{id}', function($id){

    // Note :: check Item table & Taggable table (action / action)

    $item = Item::create([
        'name' => 'Joey'
    ]);

    $tag = Tag::findOrFail($id);

    $item->tags()->save($tag);

    return "Data Inserted";
});

Route::get('item/{id}/tag/read',function($id){

    $item = Item::findOrFail($id);

    if($item->has('tags')){

        foreach($item->tags as $tag){
            echo $tag->name ."<br/>";
        }

    }

});

Route::get('item/{id}/tag/update', function($id){

    // $item = Item::findOrFail($id);
    
    // if($item->has('tags')){
    //     foreach($item->tags as $tag){
    //         return $tag->whereId(4)->update([
    //             'name' => 'Insect Killer'
    //         ]);
    //     }
    // }

    // $item = Item::findOrFail($id);

    // $tag = Tag::findOrFail(4);

    // $item->tags()->save($tag);

    // return "Data Updated";



    // $item = Item::findOrFail($id);// added

    // $tag = Tag::findOrFail(6);

    // $item->tags()->attach($tag);

    // return "Data Attached";


    $item = Item::findOrFail($id); // remove or added if not data existed

    $item->tags()->sync([1,2]);

    return "Data Synced";

});


Route::get('items/{id}/tag/delete', function($id){


    // $item = Item::findOrFail($id); // Single Delete 

    // if($item->has('tags')){
    //     foreach($item->tags as $tag){
    //         $tag->whereId(1)->dd();
    //     }
       
    // }

    // return "Data Deleted";

    $item = Item::findOrFail($id); // Bulk Delete 
    $item->tags()->delete();
    return "Data Deleted";
});


// ----------------------------------

// => Form CRUD 

Route::resource('/countries',CountriesController::class);

// Route::get('countries/delete/{id}', [CountriesController::class,'destroy'])->name('countries.delete');

// => Date Format 

Route::get('/dates/', function(){
	
    $date = new DateTime();
    echo $date->format('d m Y');//07 10 2023
    
    echo "<br/>";

    echo $date->format('Y m d');//2023 10 07
    echo "<br/>";

    echo $date->format('m d Y');//10 07 2023
    echo "<br/>";

    echo $date->format('d/m/Y');//07/10/2023
    echo "<br/>";

    echo $date->format('d-m-Y');// 07-10-2023
    echo "<br/>";

    echo "<hr/>";

    $date = new DateTime('+5 day');
    echo $date->format('d m Y'); // 12 10 2023
    echo "<br/>";

    $date = new DateTime('+1 week');
    echo $date->format('d m Y'); // 14 10 2023

    echo "<hr/>";

    echo Carbon::now(); //2023-10-07 20:41:39
    echo "<br/>";

    echo Carbon::now()->addDays(10); //2023-10-17 20:42:41
    echo "<br/>";

    echo Carbon::now()->diffForHumans();
    echo "<br/>"; // 1 second ago

    echo Carbon::now()->addDays(1)->diffForHumans(); //23 hours from now
    echo "<br/>"; 

    echo Carbon::now()->addDays(3)->diffForHumans(); //2 days from now
    echo "<br/>";

    echo Carbon::now()->addDays(10)->diffForHumans(); //1 week from now
    echo "<br/>";

    echo Carbon::now()->subDays(1);//2023-10-06 20:49:57
    echo "<br/>";

    echo Carbon::now()->subDays(1)->diffForHumans(); //1 day ago
    echo "<br/>";

    echo Carbon::now()->subDays(3)->diffForHumans(); //3 days ago
    echo "<br/>";


    echo Carbon::now()->subDays(10)->diffForHumans(); // 1 week ago
    echo "<br/>";

    echo "<hr/>";
    
    echo Carbon::now()->addMonths(1);//2023-11-07 20:56:27
    echo "<br/>";

    echo Carbon::now()->addMonths(1)->diffForHumans(); //4 weeks from now
    echo "<br/>";

    echo Carbon::now()->addMonths(3)->diffForHumans();//2 months from now
    echo "<br/>";

    echo Carbon::now()->addMonths(10)->diffForHumans(); //9 months from now
    
    echo "<br/>";

    echo Carbon::now()->subMonths(1);//2023-09-07 20:56:27
    echo "<br/>";

    echo Carbon::now()->subMonths(1)->diffForHumans(); //  1 month ago
    echo "<br/>";

    echo Carbon::now()->subMonths(3)->diffForHumans(); // 3 months ago
    echo "<br/>";

    echo Carbon::now()->subMonths(10)->diffForHumans(); // 10 months ago
    echo "<br/>";

    echo Carbon::now()->yesterday()->diffForHumans(); // 1 day ago
    echo "<br/>";

    echo Carbon::now()->tomorrow()->diffForHumans(); //2 hours from now
    echo "<br/>";

});

Route::resource('products',ProductsController::class);