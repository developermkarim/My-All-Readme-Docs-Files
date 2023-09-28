# LARAVEL
---
### Create Laravel Project
* The Commands to development The project structures of Lravel
```bash
To list out all the Artisan commands-> php artisan list

This command will list all the registered routes-> php artisan route: list

create-> composer create-project laravel/laravel:^8 project-name here

to create controller-> php artisan make: controller UserController

to update versions of all packages -> composer update

run-> php artisan serve
```
Notes: laravel:^8 is for defining version 8.

### Database create with migratios and model folder

to migrate database table ,must write like this command--following posts table

and to create model class the command--following 
Notes: migration table name must be plural and class the singluar with Capitalize as it is Class Name.

```bash 
model-> php artisan make:model Post

to migrate to database after creating the culumn in table by Model file.
php artisan migrate

to migrate after updating the db table-> php artisan migrate:refresh
N/B: be careful it will refresh all tables from database.

migrations-> php artisan make:migration create_posts_table
```
* To create Model and Migration together write this command
Moreover, To create With controller use -mc instead of -m.
if controller is created before, So, -m is suggested to use.
```bash
model & migrations-> php artisan make:model Post -m
and to create with controller-> php artisan make:model Post -mc
```
After Updating the migration file ,and to save the format in databse table run following command.If get updated 2 tables , --step=2 must be used to migrate.
php artisan migrate:rollback --step=2
Best way of alternative php artisan migrate:refresh --step=2
Here are the steps that I use for creating a new Laravel 8 project:

``bash
Install LARAVEL: laravel new [yourprojectname]
Install LARAVEL UI Package: composer require laravel/ui
Generate UI Bootstrap: php artisan ui bootstrap 
Generate Auth Scaffolding: php artisan ui bootstrap --auth
Install NPM Dependencies: npm install && npm run dev
Running LARAVEL: php artisan serve
```

Here laravel Develop with tailwind css
```bash
Add Tailwind UI with Authentication Scaffolding
composer require laravel-frontend-presets/tailwindcss --dev
php artisan ui tailwindcss --auth
npm install && npm run dev
```
## Module Not found while npm run watch
follow the steps to run successfully

```bash
npm install --save-dev laravel-mix@latest
```

then go to Package.json and update npm srcripts in  with the following

```bash
"scripts": {
    "dev": "npm run development",
    "development": "mix",
    "watch": "mix watch",
    "watch-poll": "mix watch -- --watch-options-poll=1000",
    "hot": "mix watch --hot",
    "prod": "npm run production",
    "production": "mix --production"
},

```

## Link between Model and Controller
---
It is known that Model name and table name must be same just different
```bash
 like Student and students
 if table name changed like tbl_students whereas model name is Student 
 define protected $table= "tbl_students";
 ```
1. First of all Creating a Model like Post. The Database Table columns will stored in array as name protected $fillable=['title','description','author'].
2. Then Controller must connect to the Related Model by use key word because it is defined by namespace group. Making Object of the model,
The tabel columns will be store value from controller Method by Request Dependency Injection.
3. So it is clear that Table Columns are stored in Mdoel file and The form Input/user values will get by Request Object that depends on another Object that are from user.
3. The Inputs validation will be assigned in Controller Method  by calling the the Object parameter
Full example here
```bash
 public function blogStore(Request $requestData)
    {
        $requestData->validate(array(
            'title'=>'required|unique:posts|max:50|min:5',
        ),
    array(
        'title.required'=>'Your Title is Empty',
        'title.max'=>'You have execeeded more than 50 characters',
    )
    );
     $blog = new Post();{This class come from Model}
    $blog->title = $requestData->title;
    $blog->detail = $requestData->details;
```
## Mass Assignment vs Fillable
---

Mass assignment is used to assign data in Model by array but fillable is to assign by object instantiate; 
$guarded is for mass assignment but $fillable is for fillable data.
the main difference $gaurded and $fillable.$guarded [] is used to ignore field to assign value for table,but $fillable [] is used to specify the columns to where data we want to assign
```bash
protected $guarded ['address'] means that address data can't be passed by mass assignment
protected $fillable ['address'] indicated, must data assigning the specific columns
```
Notes: So, to assign all columns , must define blank [] to get all column for passing values.

## The Steps To follow to develop a Project In Laravel
1. First Create Migration and Model with above command
2. Go to created Migation file , and write table columnn Here with database data type like string (App/Database/Migrations)
3. Then  Go to related Model file related migration file, Write the database table column in protected $fillable=[] which column field data sent from user
4. then cli command hit php artisan migrate and check in database whether the table is generated there.
5.Then Create Controller by this cli php artisan make:controller StudentController.
6.check it in App\Http\Controllers.
7.Go To Web.app in Routes to set Route with Controller Class Method(App\route\web.php)
8. do return a view file from Controller file by method.
9. Go to view and create a view blade file in (App\resources\views)
10.The view file must be with 2 extensions .blade and .php like home.blade.php

### All Make artisan list
  ⇂ make:cast  
  ⇂ make:channel
  ⇂ make:command
  ⇂ make:component
  ⇂ make:controller
  ⇂ make:event
  ⇂ make:exception
  ⇂ make:factory
  ⇂ make:job
  ⇂ make:listener
  ⇂ make:mail
  ⇂ make:middleware
  ⇂ make:migration
  ⇂ make:model
  ⇂ make:notification
  ⇂ make:observer
  ⇂ make:policy
  ⇂ make:provider
  ⇂ make:request
  ⇂ make:resource
  ⇂ make:rule
  ⇂ make:scope
  ⇂ make:seeder
  ⇂ make:test
Suppose php artisan make:seeder ProductSeeder
  ## SELECT, INSERT, UPDATE, DELETE
  . To Insert Data , use
  $post->title = $request->title //THis request is to collect form input name
  Then Save() with Model of Table.

  . To Select Specific Data from Table, Use 

  ```bash
   Post::all('id','title')->get()
   but for All, Post::all();
```

. To select Specific data by conditon-wise, Use
```bash
SubCategory::where('category_id',$id)->select('id','title')->get();
```
To Select Specific data based on relationship table . subCategory and product data will be stored if subCategory record and product record must found with Category Table relation.has() indicates just to select data from the the relation method and with() indicates just relation with the method , following
 
```bash
 $categories = Category::has('subCategory')->has('product')->with('subCategory','product')->get();
```

to Select specific limit product or record , use take() but paginate() is standard because it displayes pagiation links . Orderby() for asc ,desc. latest() or oldest() is alternative of orderBy() asc or desc.

```bash
 Product::take(3)->get() or
 better Product::orderBy('id','desc')->paginate(4)->get();
```

To select Data in descending Order
```bash
Customer::latest()->get();
or
Customer::orderBy('id','desc')->get()
```
To select Data in various condition with relationship tables
```bash
Purchase::has('product')->with('category')->orderBy('date','desc')->orderBy('id','desc')->get();
and
Purchase::orderBy('date','desc')->orderBy('id','desc')->where('status','0')->get();
and to get only one recored of one column that matched
Product::where('id', $product_id)->first()->quantity;
```

To update data, if used PUT with route like Route::PUT(),
we must use custom method @method('PUT') and Model with update() function
```bash
Route::PUT(),
@mthod('PUT'),
$model->update(),
```
To Update by id, another system is with inster System
```bash
// Update system 1
User::findOrFail($id)->update([
    'name'=>$request->name,
    'email'=> $request->email,
])

// UPDATE system 2
$flight = Flight::find(1);
$flight->name = 'Paris to London';
$flight->save();

// Update system 3
Flight::where('active', 1)
      ->where('destination', 'San Diego')
      ->update(['delayed' => 1]);

// Insert
User::insert([
    'name'=>$request->name,
    'email'=> $request->email,
])
```
   N/B :One or More data sent by compact() using  '', qoutation with comma.It is bounded with view function;view('index',compact('...','...'))

   ## Image Storage to Public folder
   Run The cli to link up the storage/app/public folder to Root Public Folder
   
```bash
php artisan storage:link
```
then , automatically storage folder link must be connected to public folder
This is the Best way to upload image both in public and database.
```bash
if($request->hasFile('subCategoryImage')){
$extension = $requestImage->categoryImage->extension();
$imageName = 'category-' . $requestImage->slug . '.'. $extension;
$imagePath = $requestImage->categoryImage->storeAs('category/',$imageName,'public');
$image_uri = env('APP_URL') . '/storage/' . $imagePath;
return ['image'=>$image,'imageUrl'=>$image_uri];
}
```
### calculate Percantage and Number Show with percentage or decimal
```bash
number_format(round(($discountPrice/$sellingPrice)*100),0) 
or 2 digit after decimal
number_format(round(($descountPrice/$sellingPrice)*100),2)
```

### Date In laravel
string to time conversion
parse() function will be used when not working any timestamp or datetime of variable.it convert to time. Condition between start date and end date, following
```bash
Carbon\Carbon::today()
Carbon\Carbon::parse($product_start_date)

 (Carbon\Carbon::today() >= $singleProduct->start_date && Carbon\Carbon::today() <= $singleProduct->end_date)
 To See local Date like November 18, 2022, 11:50 am
 use this date object new by php tag in blade file
  @php
        $date = new DateTime('now', new DateTimeZone('Asia/Dhaka')); 
        @endphp         
        <i>Printing Time : {{ $date->format('F j, Y, g:i a') }}</i> 
        Carbon\Carbon::parse('2022-12-10')->format('D, d F Y') //output Wed, 23 November 2022
        Carbon::parse('2022-11-10 13:58:10')->format('Y-d-m'); //"2022-10-11" 

        Carbon\Carbon::parse($notification->created_at)->diffForHumans() // differentiate time between created_at and now time.IT is normally use in post, comment to show the time when the post is published.
```

### App Service Provider
to Show dynamic any content like category, navbar, or other, the data must be called from App service provider afet making custom App service provider
.The Boot Function contains the all data.
The Command to create ServiceProvider
```bash
php  
artisan make:provider MenuServiceProvider
```
### Show Notice, Success or Error Message
. To Show Error Message in list ,must use @foreach loop by if(@count($errors))
. To Show Flash Message, use Session::get('message or message name'); and alse stored in variable , Suppose {{ $message = Session::get('....') }} flash message generally called by session()->flash('message','...');
. To Return redirect with route() and message , define 
```bash
return redirect()->route('supplier.all')->with($notification);
or
 return redirect('/allSupliers')->with($notice);
```
### Various Methods to use in crud
find($id) takes an id and returns a single model. If no matching model exist, it returns null.

findOrFail($id) takes an id and returns a single model. If no matching model exist, it throws an error1.

first() returns the first record found in the database. If no matching model exist, it returns null.

firstOrFail() returns the first record found in the database. If no matching model exist, it throws an error1.

get() returns a collection of models matching the query.

pluck($column) returns a collection of just the values in the given column. In previous versions of Laravel this method was called lists.

toArray() converts the model/collection into a simple PHP array.

## Middleware with Role Management
MIddleware works between user HTTP request and Application that the user/admin is authenticated or not.So, It is called middlware.
Role means assinging access to shurfing and managing website based on their Role.Some ROles names: user,admin,moderator,writer,publisher and so on.

The Steps to Follow above system
Middleware and role can be applied in 2 systems.one is manually and the other is by using packages.
The most popular package is [SPATIE](https://spatie.be/docs)
THe Steps are
```bash
1. Install The package in the app by the command (composer require spatie/laravel-permission)
2.Add 'providers' => [
    // ...
    Spatie\Permission\PermissionServiceProvider::class,
]; if not the service provider is not automatically registered.
3. the run the command php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider" to migration of the provider files.
4. then  php artisan optimize:clear
 # or
 php artisan config:clear
5. then php artisan migrate
```
Role management steps to follow
---
```bash
1. go to this doc article [laravel permission](https://spatie.be/docs/laravel-permission/v5/introduction)
2. and go to role link [Role and Permission linl](https://spatie.be/docs/laravel-permission/v5/basic-usage/basic-usage)

3. add (use HasRoles) in middleware Authenticate file and must be imorted the traits in above.
4. create roles and permission by making customer seeder file and skip the permission system if not required

 $roles = ['admin','product-manager','user','writer'];
       foreach ($roles as $value) {
        Role::create(['name'=>$value]);
       } 
5. then call the seed file and must keep Role class in top
 $this->call([
            RoleSeeder::class,
            UserSeeder::class,
        ]);

6.   we can assingRole() while creating user seeder or controller.but must call assignRole('rolename')//
To declare another role, must be duplicate the all data with assignRole set.
$user = new User();
        $user->name = "mkarim";
        $user->email = 'm.karimcu@gmail.com';
        $user->password = Hash::make('admin');
        $user->save();
        $user->assignRole('admin');

 7. // get the names of the user\'s roles
$roles = $user->getRoleNames(); // Returns a collection

```

MiddleWare set by following the steps
---
after making ensured the Role managment, then use the middleware to access in the app based on the role Status.
```bash

1. go to this links [SPatie Middelware-link](https://spatie.be/docs/laravel-permission/v5/basic-usage/middleware)

2. inside your app/Http/Kernel.php file, add protected $routeMiddleware = [
    // ...
    'role' => \Spatie\Permission\Middlewares\RoleMiddleware::class,
    'permission' => \Spatie\Permission\Middlewares\PermissionMiddleware::class,
    'role_or_permission' => \Spatie\Permission\Middlewares\RoleOrPermissionMiddleware::class,
];

3. Then you can protect your routes using middleware rules in web.php:

Route::group(['middleware' => ['role:super-admin']], function () {
    // Route
});

Route::group(['middleware' => ['permission:publish articles']], function () {
    //Route
});

Route::group(['middleware' => ['role:super-admin','permission:publish articles']], function () {
    //Route
});

Route::group(['middleware' => ['role_or_permission:super-admin|edit articles']], function () {
    //
});

Route::group(['middleware' => ['role_or_permission:publish articles']], function () {
   // Route
});

4. For Example , we can use in admin Panel by athorization to both admin and product-manager.
 Route::middleware(['auth','role:admin|product-manager'])->group(function(){

    // all Routes of admin dashboard here.

})
This is called Multi Authentication implement
```
access admin panel's blade pages based on role
---
```bash
1. go to [blade directive link](https://spatie.be/docs/laravel-permission/v5/basic-usage/blade-directives)
2. 
```
## Trying To access Array access / Attempt to read property "name" on null
When no data found in table or any record null or 0, then this error occurs while accessing data in view file.
To remove this solution, all record must be filled or ternary condition will be solution
For example 
```bash
Here relationship -- payment with customer (primary id)
{{ $item->payment ? $item->payment->customer->name : 'No Name is customer' }}
 Attempt to read property "name" on null is for trying to access null object
 for this same ternary condition solution or all data must be filled
```


## Bug of Auto Redirect to login from admin dashboard after session expired


## DB Seeder and Factory
Dummy content can be seed into db table by seeding.Even the data can be stored from laravel faker package.User can define seed data or can collect by factory.The Model , Factory and Seed file name must be relationship than means Product , ProductSeeder, ProductFactory, not accept of ProductAllFactory or ProductAllSeeder or PdFactory.

You can simply create Modal with migration & Factory in single command

php artisan make:model Image -mf
some steps to follow seed and factory
```bash
1.php artisan make:seeder ProductSeeder
2. php artisan make:factory ProductFactory // if seed data comes from factory
3. Write The data base on tabel column in Factory in function definition() return [].
4.The Factory data must be called in ProductSeeder run() like
Product::factory()->count(20)->create(); // here 20 records will be generated.

5. Seed file must be called in DatabaseSeeder File.
6. php artisan migrate:refresh --seed for all refresh seed and migration
-->Finally To Seed the the sign file , run with seed class
php artisan db:seed --class=ProductImageSeeder

```
Factory with db Seed Example
```bash 

// database/migrations/<timestamp>_create_users_table.php
public function up()
{
    Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('email')->unique();
        $table->enum('user_type', ['admin', 'user'])->default('user'); // add this
        $table->tinyInteger('age'); // add this
        $table->string('address')->nullable(); // add this
        $table->timestamp('email_verified_at')->nullable();
        $table->string('password');
        $table->rememberToken();
        $table->timestamps();
    });
}

THEN FACTORY

// database/factories/UserFactory.php
public function definition()
{
    return [
        'name' => $this->faker->name,
        'email' => $this->faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),

        // add these
        'user_type' => 'user',
        'age' => $this->faker->numberBetween(18, 60),
        'address' => $this->faker->address,
    ];
}

INclude with DatabaseSeeder.php

// database/seeders/DatabaseSeeder.php
public function run()
{
    \App\Models\User::factory(100)->create();
}

N/B: Not Mandatory of Seed file like ProductSeeder.php
then
 php artisan migrate
php artisan db:seed
```


## ServiceProvider for App
---
-> Generally, Service provider works for whole application.Suppose, Nav bar, Catagory and others can be declared in service provider, ohterwise, they will return undefined if those are provided from controller.
* Any Custom ServiceProvider must be linked up app.php of config.

## Notification setup
Notification can be setup with Jquery Plugin 
CDN :
{{-- Toast Notify js  --}}
       <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css"/>

Code : 
```bash
 <script>
            @if(Session::has('message'))
            var type = "{{ Session::get('alert-type','info') }}"
            switch(type){
               case 'info':
               toastr.info(" {{ Session::get('message') }} ");
               break;
               case 'success':
               toastr.success(" {{ Session::get('message') }} ");
               break;
               case 'warning':
               toastr.warning(" {{ Session::get('message') }} ");
               break;
               case 'error':
               toastr.error(" {{ Session::get('message') }} ");
               break; 
            }
            @endif 
           </script>
```

## Attemp to Read Property id on "null"
This error execute when logged in session is expired.
To solve this problem ,all the routes that needs to keep with auth, must be call Route::middleware('auth')->group(function(){
    // all Routes here that works after logged in .not outside Routes that works without logged in
})
## Invalid Datetime Error
When valid data is not passed in table column then, this error will be executed
Like
```bash
<option value="$category_id">{{ category_name }}</option>
can\'t be read the $category_id from value attribute, to slove error like invalid datetime error , write in proper way
<option value="{{ $category_id }}">{{ category_name }}</option>
```
## Cannot Delete or Update table Error
THis error becomes for connection with relationship in tables.Delete or Update the parent table column is not worked for relationship with another tables
for the relationship tables , it is called in the delete function of parent
```bash
 function(Post $post){
    $post->comments->each->delete(); // delete the relationship tables
    $post->delete();
 }
```
## Failed to download laravel/laravel from dist error

```bash
use this prefer dist command 
composer create-project --prefer-dist laravel/laravel liveware-demo-app
instead of 
composer create-project laravel/laravel liveware-demo-app
```
## Laravel With SSL-ECommerz
To Complete registraion--
---
1. To go Website https://sslcommerz.com/ then Developers navigation and click to try to sandbox
2. Complete the all steps with the valid information
3. Verify Email address sent by SSLCommerz domain.
4. just wait and Then check again Email address for this "Your SSLCommerz sandbox details" sms.
5. Go to This Merchant Panel URL from the sms details list
6. It will redirect to you sandbox dashboad with your Information
7. then Go to My Stores navigation and click the Ipn Setting Link
8. Drop your domain in IPN at HTTP Listener input with /ipn path -- like http://127.0.0.1:8000/ipn
9. then click the save button

To Use SSLCommerz into Your Project
---
1. Go to [SLLCommerz github panel](https://github.com/sslcommerz/SSLCommerz-Laravel)
2. Follow The Steps that are described in Readme.md file documentation. Like following steps
3. For More Details [watch videos from this youtube playlist](https://www.youtube.com/watch?v=6x9As4bR31o&list=PLdXl97NMhlXlmDMCL3qTUPf5dUerZnJVx)
4.Must add STORE_ID & STORE_PASSWORD in .env file
5. The Secred id & Password is already provided to The SSL-Ecomerz Sandbox details sms in Email ID.

## Stripe Payment Method System
Steps
1. Sign up and SIgn in Complete
2. Go to Dashboard of stripe for testing perpose.
3. Copy the Stripe Key and Secred from dashboard page.
4. THen Paste the Copied keys in ENV FILE with convention Variable
5.

## Database  Query Builder VS ORM VS Raw Query
```bash
$query_builder = DB::table('users')->get() // this is query builder system
$ORM_model = User::all() // eloquent /ORM(Object Relational Mapping) System
$query_builder[0]->name  // get data by $query_builder
$ORM_model->name // get data By ORM system

// Created_at , updated_at columns can not be inserted data by row query

DB::insert('insert into students(name,email,phone,created_at,updated_at) values(?,?,?,?,?)','['mkarim','m.karimcu@gmail.com','0178453234','...','...']');

```
Data Insert into Query Builder VS ORM
---
Must Call the column in protected $fillable if data send by object instantiate like new User();

## Delete Table data in Soft_delete
the way helps us to recover the deleted data.and show the time when a record is delete by deleted_at column.Although Soft deleted data/record is visible in table ,but the rocord of deteled_at column will have the time when it was deleted.But in Select qeury , data will not be found the softdeleted record.

```bash

use SoftDeletes in model
import This to top;
to recover data deleted record use

return Studenst::onLytrash->latest()->get()
```

## Migration and Seed Specific table or Seed file
fileName.php = 2022_11_21_095651_create_compares_table.php
```bash
to migrate specific table
 php artisan migrate --path=/database/migrations/fileName.php

to migrate rollback specific table
 php artisan migrate:rollback --path=/database/migrations/fileName.php

to migrate refresh specific table
php artisan migrate:refresh --path=/database/migrations/fileName.php
to Seed all tables with refresh
php artisan migrate:refresh --seed

to Seed into database of specific table 
php artisan db:seed --class=ProductSeeder
```

## Random Number and with Unique

for Random Number
rand(min,max) //
unique()
Str::random(10); // must be call in top
mt_rand(50,1000) // unique random number generate

## Create Laravel Notification In admin Notice Section
To Work with this, Follow the full system from Laravel docs to Search Notification keyword.There are many notifications like sms, database, broadcast and more.Now, Here discussion is about Database Notification
The Steps to Do
```bash
1. php artisan notification:table.
2. check the file in database directory.
3. then, php artisan migrate.
4. decide when to be sent notification to admin.
5. suppose , Notice must be sent after Purchasing, Saling,Or New User creating or To request Role permission
6. like php artisan make:notification PurchaseComplete
7. Check the generated file in notification directoy under app folder.
8. Write Notification::send() in the proper place like at the end of methods that works to complete Purchase.
9. as the notice will sent to admin, SO, Get the admin
10. $user = User::where('role','admin')->get();
11. Tesing purpose we will use $user = User::where('username','admin')->get() not for role management in project
12.in the __construct() Method of PurchaseCOmplete() must be passed parameter of the notifier and argument PurchaseCOmplete(argmument here).
13. call the variable in like Notification::send($user,new PurchaseComplete(argmument here)) // PurchaseComplete class from Nofication directory class file under app
14. return ['database'] in via($notification) of PurchaseComplete Class Method.
15. return ['message'=>'New Purchase added in Shop'] in toArray($notifiable) method the class
16. send() must be assigned 2 parameters.
17. First Parameter is of admin to whom is sent and 2nd parameter PurchaseComplete() is who sender or buyer or user.
18. The name of byuer or sender must be inserted 
 $user = User::where('username','admin')->get();
            Notification::send($user,new PurchaseComplete(auth()->user()->name));
19. use Illuminate\Support\Facades\Notification must be import in the top;
20. Then check your notifications database table.
21. The Notifcations will be loop like
  @php
          $user = Auth::user();

        @endphp
      @foreach ($user->notifications  as $notification)


      Remember that, In Every case, different notification must be called different notification file class. 
      such as PurchaseComplete, VendorNotification,UserNotification, ORderComplete, to return diffirrent message 

```
To Know More ,See the docs file and Multivendor Course 64. No module.
---
## Laravel Livewire|| How Livewire works in Laravel
```bash
1. add livewire by composer require livewire/livewire
2. (Follow this livewire doc article)[https://laravel-livewire.com/docs/2.x/quickstart]
3. test by php artisan route:list
4. check the HttpConnectionHandler file
5. HttpConnectionHandler extends ConnectionHandler // file
6. check the network mood in developer tool
7. Request Method : fingerprint, serverMemo, updates
```

##Livewire File to work with component
1. Run php artisan make:livewire Comments // for making comment component
2. check your blade file
3. Check Livewire component file in HTTP Livewire Folder
4. Include the <Livewire:comments> file in directory path "/" or user defined path.
5. App\Http\Livewire file works like controller
6. then livewire blade file will be return from App\Http\Livewire file

## Eloquent ORM and Query Builder relationship
In Eloquent ORM , one to one,one to many relationship is made by defining method in model file.In ORM, after class, primary key and foreignId is defined when foreign id relation is not found.
but query builder use the join table function with where condition.

For Example
```bash
class Product extends Model
{
  public function category()
    {
        return $this->belongsTo(Category::class,'categoy_id','id');
    }
}

    in use Product::has('category')->latest()->pagination(5)
// End Eloquent ORM
---
// Query Builder Relationship
    DB::table('product')
    ->join('category','product.category_id','category.id')
    ->select('product.*','category.name')
    ->latest()->pagination(5);
```

## Using Single / Multiple image in  Local Public
TO use this , GO to Image Intervation package website

The code to optimize Image
```bash
$product_image = $request->file('product_image');
$name_generate = hexdec(uniqid()) . '.' . $product_image->getClientOriginalExtension();
Image::make($product_image)->resize(300,200)->save('image/product'.$name_generate);
$final_img = 'image/product/' . $name_generate;

for multiple image $product_image is used to be as array variable like 
foreach($product_image as $image){

}

N/B: Image class must be used in the top. $final_img is usefule to store in tabel for being easy to asset in blade file.


```
## Composer Update
Composer 1 to check
run --- composer -v
Composer 1 to update
run --- composer self-update
composer 2 to update
composer-self-update--2
composer -self-update--rollback

## JETSTREAM With Multi-Auth
It provides , register,login,multi-auth,two-factor-auth, browser session of jetsrim app, Delete account with profile setting.
to use it in project is more convenient to other.

Automatically, Many apps is generated in config,views ,app related to JETSTRIM.
However! \vendor\laravel\fortify is the main file folder of jetstream auth.
config/fortify.app in use ----

```bash

these features or you can even remove all/one of these/that if you need to.
 'features' => [
        Features::registration(),
        Features::resetPasswords(),
         Features::emailVerification(),
        Features::updateProfileInformation(),
        Features::updatePasswords(),
        Features::twoFactorAuthentication([
            'confirm' => true,
            'confirmPassword' => true,
            // 'window' => 0,
        ]),
    ],

```

In Auth system with profile page of Jetsrim app is controlled by fortify.php under config directory.If one of features is hidded from fetures elements is will be removed from profile page of jetstrim app.


config/jetstream.php

The Provided Feature for app 
```bash

it\'s easily customizable to enable and disable.
Feature api() let third-party to use your app with giving a secred api token
 'features' => [
         Features::termsAndPrivacyPolicy(), // checkbox with agree terms and policy
         Features::profilePhotos(),
            // Features::api(),
         Features::teams(['invitations' => true]),
        Features::accountDeletion(),
    ],

```
To Customize Login and Registration File
---
Remember That! CONTROLLERS with related files of jetstrem are found in \vendor\laravel\fortify\src\Http\Controllers

first to see the all routes , php artisan route:list
and see where login and register page is created
Full route List will be visible to display

-> Add guard in config\auth.php
```bash
  'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        // this customer guards is for admin
        'admin' => [
            'driver'=>'session',
            'provider'=>'admins',
        ]
    ],

  -> Add provider in config\auth.php  

   'providers' => [

        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        // this provider of guard linked above named 'admins'

        'admins'=> [
            'driver'=>'eloquent',
            'model'=>App\Models\Admin::class,
        ]

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

```
-> The Important Files included with JetStrem auth
```bash

CONTROLLERS with related files of jetstrem are found in \vendor\laravel\fortify\src\Http\Controllers

for  Attempt to authenticate a user using the given credentials.
\vendor\laravel\framework\src\Illuminate\Contracts\Auth\StatefulGuard.php

For Login and Logout 
\vendor\laravel\fortify\src\Http\Controllers\AuthenticatedSessionController.php


```
Copy And Paste
---
Copy full Page of AuthenticateSessionController file TO Custom AdminController file.
Similarly,

Copy LoginResponse.php to cutom loginResponse file by creating folder like app\Http\Responses.

N|B Root files path in \vendor\laravel\fortify\src\Http


## Composer detected issues in your platform: Your Composer dependencies require a PHP version

```bash
add this line in config object of composer.json file

"platform-check": false

before
 "config": {
        "optimize-autoloader": true,
        "preferred-install": "dist",
        "sort-packages": true,
    },

    after
     "config": {
        "optimize-autoloader": true,
        "preferred-install": "dist",
        "sort-packages": true,
        "platform-check": false
    },

run php artisan config:cache
then run composer dump-autoload in terminal
```

### Your requirements could not be resolved to an installable set of packages
to install package with the compatible composer and php version, add :dev-developer
like 
```bash
composer require tymon/jwt-auth:dev-develop 
```

## Form Validation By Request
steps
```bash
run php artisan make:request SliderRequest
return true in authorize() method
return validation rules in rules()
like
   'title'=>[
                'required',
                'string',
            ],
             'image'=>[
            'required',
            'image',
            'mimes:png,jpg,jpeg,webp,'
        ]

and follow like this

 public function store(SliderRequest $request)
    {
        $validateData = $request->validated();

        $slider = new Slider();
        $slider->title = $validatedData['title'];
    }

```
## Move Upload Image in public folder not storage link
```bash
if($request->hasFile('image')){
    $file = $request->file('image');
    $extension = $file->getClientOriginalExtension() // extension() is alternative.
    $fileName = $validatedData['title'] .rand(500,9999) . ".". $extension;

    $file->move('uploads/categroy/',$fileName);

  $slider->image = $fileName;

}
```

## Laravel Livewire
steps
```bash
1. composer require livewire/livewire
2. run to create livwire page
php artisan make:livewire slider\index
3. check the index.php Htpp\livewire
4. and check the view page livewire\index.blade.php

5. <livewire:slider.index/> // livewire folder to slider folder to index.blade.php file

6.The Standerd Way of extend layout with section 

public function render()
{
    $allData = Student::all();
    return view('livewire.show-posts',['allData'=>$allData])
        ->extends('layouts.app')
        ->section('content');
}

```

### Laravel Role And Permission
---
1. Make a MiddleWare
```bash
php artisan make:middleware Role
```
2. add The Role Middleware to kernel Page app/http/Kernel.php .
```bash
protected $routeMiddleware = [
        /* Customer Role */
        'customRole'=>\App\Http\Middleware\Role::class,
]
```
3. Then Go to Role File for default redirect if not role assign.if found role ,then page will redirect to the next request by Closure Dependency $next **return $next($request)**

```bash
 public function handle(Request $request, Closure $next,$role)
    {
        if($request->user()->role !== $role){
            return redirect('dashboard');
        }
        return $next($request);
    }
```

4 . For working custom route wise direction and to avoid the packaged built redirection, comment out or update the property in AuthenticateSessionController file in the breeze package of laravel.

```bash
use App\Providers\RouteServiceProvider;
# return redirect()->intended(RouteServiceProvider::HOME);
```

5 . Then go to AuthenticateSessionController file in the breeze package of laravel.

```bash

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $url = '';
        if($request->user()->role == 'user'){
            $url = '/dashboard';
        }elseif($request->user()->role =='admin'){
            $url = 'admin/dashboard';
        }elseif($request->user()->role == 'author'){
            $url = 'author/dashboard';
        }
       # return redirect()->intended(RouteServiceProvider::HOME);
       # if($url != ''){ 
            $notification = [
                'message'=> $request->user()->role . ' has successfully logged in dashboard',
                'alert-type'=>'success'
            ];
            return redirect()->intended($url)->with($notification);
      #  } 

    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

```

6. then middleware of roles add to route file.
```bash
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','customRole:user'])->name('dashboard');

/* Admin Route WIth admin Role  */
Route::middleware(['auth','customRole:admin'])->group(function(){

    Route::get('/admin/dashboard',[AdminHomeController::class,'index']);
    Route::get('/admin/logout',[AdminHomeController::class,'adminLogout']);


});


/* Admin Route WIth admin Role  */
Route::middleware(['auth','customRole:author'])->group(function(){

    Route::get('/author/dashboard',[AuthorController::class,'index']);
    Route::get('/author/logout',[AuthorController::class,'authorLogout']);
    
});
```
7. There is available a bug. That is to possible to login page after user, admin or author logged in dashboard.To solve the Issue The codes will be like following

```bash
<?php
namespace App\Http\Middleware;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {

                if (Auth::check() && Auth::user()->role == 'user') {
                    return redirect('/dashboard');
                }
                 if (Auth::check() && Auth::user()->role == 'admin') {
                    return redirect('/admin/dashboard');
                }

                 if (Auth::check() && Auth::user()->role == 'author') {
                    return redirect('/author/dashboard');
                }
 
  # In Custom Route Redirection, We will comment out the following Class Direction
     # return redirect(RouteServiceProvider::HOME);
               
            }
        }
 
        return $next($request);
    }
}

# then add to the login route

Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->middleware(RedirectIfAuthenticated::class)->name('admin.login');
```

## In Laravel Apps
---
* to Learn Role and Permission Step by Step.

(Learn Full role and Permission Doc in Laravel)[https://codeanddeploy.com/blog/laravel/laravel-8-user-roles-and-permissions-step-by-step-tutorial#eR5OiB6PmN7zWQhe5Etr1GAWV]

Managing user permissions is a crucial aspect of building secure and functional Laravel applications. Laravel provides a powerful package called "Laravel Spatie Permission" that simplifies the process of managing and implementing user permissions. In this guide, I'll walk you through the steps to set up and manage user permissions in your Laravel app using this package.

**Table of Contents:**

1. **Installation**
2. **Configuration**
3. **Creating Roles and Permissions**
4. **Assigning Permissions to Roles**
5. **Assigning Roles to Users**
6. **Checking Permissions**
7. **Protecting Routes and Actions**
8. **Displaying User Permissions in the UI (Optional)**
9. **Revoking and Syncing Permissions**
10. **Best Practices**

Let's get started!

### 1. Installation

To begin, install the `spatie/laravel-permission` package via Composer:

```bash
composer require spatie/laravel-permission
```

### 2. Configuration

After installing the package, publish its configuration file:

```bash
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
```

This will create a `config/permission.php` file where you can configure various options.

### 3. Creating Roles and Permissions

Roles represent sets of permissions, and permissions define specific actions users can perform. Create roles and permissions using the provided Artisan commands:

```bash
php artisan permission:create-role admin
php artisan permission:create-permission create-posts
```

### 4. Assigning Permissions to Roles

Assign permissions to roles using the `assign` command:

```bash
php artisan permission:assign create-posts admin
```

### 5. Assigning Roles to Users

Attach roles to users in your application. For example, in a controller or a service:

```php
$user = User::find(1);
$user->assignRole('admin');
```

### 6. Checking Permissions

You can check if a user has a specific permission using the `hasPermissionTo` method:

```php
if ($user->hasPermissionTo('create-posts')) {
    // User can create posts
}
```

### 7. Protecting Routes and Actions

Use middleware to protect routes and actions based on user roles and permissions:

```php
Route::middleware('role:admin')->group(function () {
    // Routes protected for admin role
});
```

### 8. Displaying User Permissions in the UI (Optional)

You can display user permissions in the UI by fetching them from the user model and rendering them in your views.

### 9. Revoking and Syncing Permissions

To revoke a permission from a user:

```php
$user->revokePermissionTo('create-posts');
```

To sync a user's permissions:

```php
$user->syncPermissions(['create-posts', 'edit-posts']);
```

### 10. Best Practices

- **Use Middleware**: Leverage middleware to protect routes and actions from unauthorized access.
- **Seeding Permissions and Roles**: Consider using seeders to populate initial permissions and roles.
- **UI Integration**: If needed, integrate permissions and roles into your application's UI for easier management.
- **Regular Audits**: Periodically review and update permissions and roles to match changing requirements.

Remember, managing user permissions is an ongoing process. Regularly audit and update your permissions and roles to ensure your application's security and functionality align with the evolving needs of your users and your business.

By following these steps and best practices, you can effectively manage user permissions in your Laravel applications using the Spatie Permission package.