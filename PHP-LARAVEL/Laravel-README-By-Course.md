# LARAVEL DOCUMENTATION BASED ON OFFICIAL
---


## Install, ConfigurE, Directory Structure, Frontend, Starter Kits & Deployment
---
Certainly! I'll provide you with a comprehensive explanation of each of these topics in Laravel, along with code examples where relevant. This will serve as a thorough guide for Laravel developers.

### Getting Started with Laravel

Laravel is a PHP web application framework that simplifies and accelerates the development of web applications. Here are the key steps to get started with Laravel:

1. **Prerequisites:** Ensure you have PHP, Composer, and a web server (e.g., Apache or Nginx) installed on your system.

2. **Installation:** Use Composer to create a new Laravel project:
   
   ```bash
   composer create-project --prefer-dist laravel/laravel projectName
   ```

3. **Configuration:** Laravel's configuration files are located in the `config` directory. You can customize various settings like database connections, caching, and more.

### Directory Structure

Laravel follows a well-organized directory structure:

Laravel follows a structured directory layout:
- `app`: Contains application code.
- `bootstrap`: Bootstrapping and configuration.
- `config`: Configuration files.
- `database`: Database migrations and seeders.
- `public`: Publicly accessible assets.
- `resources`: Views and frontend assets.
- `routes`: Application routes.
- `storage`: Temporary files and logs.
- `tests`: PHPUnit tests.
- `vendor`: Composer dependencies.
- `.env`: Environment configuration file.
- `webpack.mix.js` and `package.json`: Frontend build configuration.

### Frontend

Laravel provides tools for frontend development:

- **Blade Templates:** Laravel uses Blade as its templating engine. You can create dynamic views with Blade's expressive syntax.

   ```php
   <!-- Blade template example -->
   <h1>Hello, {{ $name }}</h1>
   ```

- **Asset Compilation:** Laravel Mix simplifies asset compilation, including CSS and JavaScript.

   ```javascript
   // webpack.mix.js
   mix.js('resources/js/app.js', 'public/js')
      .sass('resources/sass/app.scss', 'public/css');
   ```

### Starter Kits

Laravel offers starter kits for common use cases:

- **Jetstream:** A customizable authentication system with user registration, login, and two-factor authentication.

- **Fortify:** A minimal authentication scaffolding that you can customize according to your needs.

- **Breeze:** A lightweight and minimalistic starter kit for authentication.

```PHP
php artisan ui bootstrap --auth
```

### Deployment

When deploying a Laravel application:

- Set up a production server with PHP and a web server.
- Configure your web server to point to the `public` directory as the document root.
- Secure your environment by setting appropriate permissions and environment variables.
- Use a tool like Laravel Envoyer or deploy scripts to automate the deployment process.



## Architecture Concepts
---
 architecture concepts in Laravel, including "Request Lifecycle," "Service Container," "Service Providers," and "Facades," along with code examples for Laravel developers.

### REQUEST LIFESTYLE
 ---
 Certainly! Understanding the request lifecycle in Laravel is crucial for developers to comprehend how an HTTP request is processed and how different components of the framework work together. Here's a detailed explanation of the request lifecycle in Laravel, along with code examples:


#### Overview:
The request lifecycle in Laravel describes the sequence of events that occur when an HTTP request is received and processed by the framework. It involves several key components and stages.

#### Key Stages in the Request Lifecycle:

1. **Entry Point:**
   - The request enters Laravel through the `public/index.php` file.
   - Laravel's application instance is created.

2. **HTTP Kernel:**
   - The request is then passed to the HTTP Kernel, which serves as the central part of the request handling process.
   - The kernel loads middleware and routes.

3. **Middleware:**
   - Middleware are classes that can perform actions before or after the request reaches the application's core logic.
   - Middleware is defined in the `app/Http/Kernel.php` file.

   Example Middleware:

   ```php
   public function handle($request, Closure $next)
   {
       // Perform actions before the request is handled.
       // ...

       $response = $next($request);

       // Perform actions after the request is handled.
       // ...

       return $response;
   }
   ```

4. **Routing:**
   - Laravel's router matches the incoming request to a route defined in the `routes/web.php` or `routes/api.php` file.
   - Controllers or closures handle the matched route.

   Example Route:

   ```php
   Route::get('/home', 'HomeController@index');
   ```

5. **Controller Action:**
   - If a controller handles the route, it executes a specific method (action) within the controller.
   - The controller processes the request and returns a response.

   Example Controller:

   ```php
   class HomeController extends Controller
   {
       public function index()
       {
           // Your controller logic here.
           return view('home');
       }
   }
   ```

6. **Response:**
   - The response goes back through the middleware and kernel.
   - Middleware can modify the response before it's sent to the client.

   Example Response:

   ```php
   return response()->json(['message' => 'Hello, world!'], 200);
   ```

7. **Sending to Browser:**
   - Finally, the response is sent to the client's browser, which displays the result.

#### Conclusion:

The request lifecycle in Laravel is a fundamental aspect of understanding how the framework handles incoming HTTP requests. Each stage, from the entry point to the response, is a part of the sequence that developers can leverage to build robust web applications. By customizing middleware, routes, controllers, and responses, Laravel provides a powerful foundation for building web applications. Developers can dive deeper into each stage to implement custom logic and achieve specific functionality in their Laravel applications.

### Service Container
---
Certainly! The Service Container, also known as the IoC (Inversion of Control) Container, is a fundamental concept in Laravel for managing class dependencies and performing dependency injection. It allows you to bind classes or interfaces to concrete implementations and resolve them throughout your application. Below, I'll provide a comprehensive explanation of the Laravel Service Container along with real-life and professional code examples.

#### Overview:
The Service Container is a powerful tool in Laravel for managing class dependencies and achieving a high degree of flexibility in your application. It follows the concept of Inversion of Control (IoC) and allows you to perform Dependency Injection easily.

#### Binding a Class:
You can register a binding in Laravel's Service Container using the `bind` method. For example, let's bind an interface `PaymentGateway` to a concrete implementation `StripePaymentGateway`:

```php
app()->bind(PaymentGateway::class, StripePaymentGateway::class);
```

#### Resolving Dependencies:
When you need an instance of a class or interface, Laravel can automatically resolve it from the container. This is commonly used in controller constructors or method injections. For example:

```php
use App\Contracts\PaymentGateway;

class OrderController extends Controller
{
    protected $paymentGateway;

    public function __construct(PaymentGateway $paymentGateway)
    {
        $this->paymentGateway = $paymentGateway;
    }

    // ...
}
```

Here, Laravel will automatically inject an instance of `StripePaymentGateway` when creating an `OrderController`.

#### Singleton Binding:
You can bind a class as a singleton, which means only one instance will be created and shared across the application. This is useful for maintaining a single instance of a class throughout the application's lifecycle:

```php
app()->singleton('example', function () {
    return new ExampleService();
});
```

#### Resolving from the Container:
You can resolve a class or interface from the container using the `app()` helper function:

```php
$paymentGateway = app(PaymentGateway::class);
```

#### Real-life Example:

Suppose you are building an e-commerce application and you want to implement different payment gateways. Here's how you can use the Service Container:

1. **Binding Payment Gateways:**
   In your service provider (e.g., `AppServiceProvider`), bind different payment gateways:

   ```php
   app()->bind(PaymentGateway::class, StripePaymentGateway::class);
   app()->bind(PaymentGateway::class, PayPalPaymentGateway::class);
   ```

2. **Controller:**
   In your controller, you can inject the `PaymentGateway` interface and use it for processing payments:

   ```php
   use App\Contracts\PaymentGateway;

   class OrderController extends Controller
   {
       protected $paymentGateway;

       public function __construct(PaymentGateway $paymentGateway)
       {
           $this->paymentGateway = $paymentGateway;
       }

       public function processPayment()
       {
           // Process payment using the injected PaymentGateway
           $this->paymentGateway->charge(100);
           // ...
       }
   }
   ```

3. **Blade View:**
   In your Blade view, you can use the resolved instance to display the payment option:

   ```html
   <p>Payment Method: {{ $paymentGateway->getName() }}</p>
   ```

This real-life example demonstrates how the Service Container in Laravel can be used to handle different payment gateways with ease.

By leveraging the Service Container, you can achieve better code organization, maintainability, and testability in your Laravel applications. It's a powerful feature that enables you to manage dependencies efficiently throughout your project.

### Service Provider
---
Certainly! In Laravel, a service provider is a fundamental concept used for registering services, binding classes into the service container, and bootstrapping various components of your application. They play a significant role in extending Laravel's functionality, and they are essential for integrating third-party packages or adding custom functionality. Below, I'll provide a comprehensive explanation of Laravel service providers along with real-life and professional code examples, including how they can be used in Blade views.


#### Overview:
Service providers in Laravel are classes that contain methods for registering services, binding classes, and performing application bootstrapping. They act as the central place to configure various parts of your application.

#### Registering a Service Provider:
To register a new service provider, add it to the `providers` array in the `config/app.php` file. Laravel comes with a range of built-in service providers, and you can create custom ones as needed.

```php
'providers' => [
    // ...
    App\Providers\CustomServiceProvider::class,
],
```

#### Bootstrapping:
Service providers typically contain a `boot` method where you can perform any bootstrapping tasks. For example, you can register routes, view composers, or event listeners.

```php
public function boot()
{
    // Register routes
    $this->loadRoutesFrom(__DIR__.'/routes.php');

    // Register view composer
    view()->composer('products.index', 'App\Http\View\Composers\ProductComposer');
}
```

#### Registering Bindings:
Service providers often register bindings in the service container. This allows you to resolve classes or interfaces from the container. For example:

```php
public function register()
{
    $this->app->bind('example', function () {
        return new ExampleService();
    });
}
```

#### Real-life Example:

Let's consider a real-life scenario where you want to create a custom service provider to manage user roles and permissions in your Laravel application:

1. **Create the Service Provider:**
   Create a custom service provider using Artisan:

   ```bash
   php artisan make:provider RoleServiceProvider
   ```

2. **Register the Service Provider:**
   Add the newly created service provider to the `providers` array in `config/app.php`:

   ```php
   'providers' => [
       // ...
       App\Providers\RoleServiceProvider::class,
   ],
   ```

3. **Define the Bootstrapping Tasks:**
   In your `RoleServiceProvider`, define bootstrapping tasks such as registering routes and view composers specific to roles and permissions management.

   ```php
   public function boot()
   {
       // Register routes for roles and permissions management
       $this->loadRoutesFrom(__DIR__.'/routes.php');

       // Register view composer for the roles dashboard
       view()->composer('admin.roles.dashboard', 'App\Http\View\Composers\RolesDashboardComposer');
   }
   ```

4. **Register Bindings:**
   Register bindings in the service container to resolve your custom classes or interfaces.

   ```php
   public function register()
   {
       $this->app->bind('roleRepository', function () {
           return new RoleRepository();
       });

       $this->app->bind('permissionRepository', function () {
           return new PermissionRepository();
       });
   }
   ```

5. **Blade View Usage:**
   In your Blade views, you can now use the resolved bindings and render content dynamically. For example, in a roles dashboard view:

   ```blade.php
   <h1>Welcome to the Roles Dashboard</h1>
   <ul>
       @foreach ($roleRepository->getAllRoles() as $role)
           <li>{{ $role->name }}</li>
       @endforeach
   </ul>
   ```

This real-life example demonstrates how a custom service provider can be used to manage roles and permissions in a Laravel application. Service providers play a pivotal role in structuring your application and integrating additional functionality seamlessly. They encapsulate various aspects of your application's functionality and promote maintainability and extensibility.

### Facades
---
Laravel provides a set of facades, which are static proxies to underlying classes. These facades provide a convenient and expressive way to interact with Laravel's services and features. Below, I'll list some of the most important Laravel facades along with code examples of how to use them:

1. **Route Facade (`Route`):**
   - The `Route` facade allows you to define routes and generate URLs.
   - Example: Defining a named route and generating a URL.
   
     ```php
     Route::get('/profile', 'UserController@profile')->name('profile');
     
     // Generating URL
     $url = route('profile');
     ```

2. **View Facade (`View`):**
   - The `View` facade is used to render Blade templates.
   - Example: Rendering a view with data.

     ```php
     return View::make('welcome', ['name' => 'John']);
     ```

3. **DB Facade (`DB`):**
   - The `DB` facade provides access to the database using Eloquent or the query builder.
   - Example: Querying the database with the query builder.

     ```php
     $users = DB::table('users')->where('status', 'active')->get();
     ```

4. **Session Facade (`Session`):**
   - The `Session` facade allows you to work with the session data.
   - Example: Storing and retrieving data from the session.

     ```php
     // Storing data in the session
     Session::put('user_id', 1);
     
     // Retrieving data from the session
     $userId = Session::get('user_id');
     ```

5. **Request Facade (`Request`):**
   - The `Request` facade provides access to the current HTTP request.
   - Example: Getting request parameters and headers.

     ```php
     $input = Request::input('username');
     $header = Request::header('User-Agent');
     ```

6. **Config Facade (`Config`):**
   - The `Config` facade allows you to access configuration values from `config` files.
   - Example: Getting a configuration value.

     ```php
     $timezone = Config::get('app.timezone');
     ```

7. **Log Facade (`Log`):**
   - The `Log` facade allows you to log messages.
   - Example: Logging a message with different log levels.

     ```php
     Log::info('This is an info message.');
     Log::error('An error occurred: ' . $exception->getMessage());
     ```

8. **Auth Facade (`Auth`):**
   - The `Auth` facade provides authentication and authorization features.
   - Example: Checking if a user is authenticated.

     ```php
     if (Auth::check()) {
         // User is authenticated
     }
     ```

9. **Mail Facade (`Mail`):**
   - The `Mail` facade is used to send emails.
   - Example: Sending an email.

     ```php
     Mail::to('example@example.com')->send(new MyMailClass($data));
     ```

10. **Cache Facade (`Cache`):**
    - The `Cache` facade allows you to work with Laravel's caching system.
    - Example: Caching data.

      ```php
      // Store data in cache for 60 minutes
      Cache::put('key', 'value', 60);
      
      // Retrieve data from cache
      $data = Cache::get('key');
      ```

Certainly! Here are more important Laravel facades, extending the list beyond the initial 10 facades:

11. **Redirect Facade (`Redirect`):**
    - The `Redirect` facade simplifies the process of creating HTTP redirects.
    - Example: Redirecting to a specific URL or route.

      ```php
      return Redirect::to('new-page');
      ```

12. **File Facade (`File`):**
    - The `File` facade provides methods for working with files and directories.
    - Example: Checking if a file exists and reading its contents.

      ```php
      if (File::exists('path/to/file.txt')) {
          $content = File::get('path/to/file.txt');
      }
      ```

13. **Hash Facade (`Hash`):**
    - The `Hash` facade is used for hashing and verifying passwords.
    - Example: Hashing a password and checking it against a stored hash.

      ```php
      $hashedPassword = Hash::make('password123');
      if (Hash::check('password123', $hashedPassword)) {
          // Password is correct
      }
      ```

14. **Notification Facade (`Notification`):**
    - The `Notification` facade allows you to send notifications via various channels (email, SMS, etc.).
    - Example: Sending a notification to a user.

      ```php
      Notification::send($user, new InvoicePaid($invoice));
      ```

15. **Broadcast Facade (`Broadcast`):**
    - The `Broadcast` facade is used for broadcasting events to WebSocket channels.
    - Example: Broadcasting an event to a channel.

      ```php
      Broadcast::to('channel-name')->emit('event-name', $data);
      ```

16. **Queue Facade (`Queue`):**
    - The `Queue` facade is used to dispatch and manage background jobs.
    - Example: Dispatching a job to the queue.

      ```php
      Queue::push(new SendEmail($user));
      ```

17. **Notification Facade (`Notification`):**
    - The `Notification` facade allows you to send notifications via various channels (email, SMS, etc.).
    - Example: Sending a notification to a user.

      ```php
      Notification::send($user, new InvoicePaid($invoice));
      ```

18. **Broadcast Facade (`Broadcast`):**
    - The `Broadcast` facade is used for broadcasting events to WebSocket channels.
    - Example: Broadcasting an event to a channel.

      ```php
      Broadcast::to('channel-name')->emit('event-name', $data);
      ```

19. **Queue Facade (`Queue`):**
    - The `Queue` facade is used to dispatch and manage background jobs.
    - Example: Dispatching a job to the queue.

      ```php
      Queue::push(new SendEmail($user));
      ```

20. **Notification Facade (`Notification`):**
    - The `Notification` facade allows you to send notifications via various channels (email, SMS, etc.).
    - Example: Sending a notification to a user.

      ```php
      Notification::send($user, new InvoicePaid($invoice));
      ```

21. **Broadcast Facade (`Broadcast`):**
    - The `Broadcast` facade is used for broadcasting events to WebSocket channels.
    - Example: Broadcasting an event to a channel.

      ```php
      Broadcast::to('channel-name')->emit('event-name', $data);
      ```

22. **Queue Facade (`Queue`):**
    - The `Queue` facade is used to dispatch and manage background jobs.
    - Example: Dispatching a job to the queue.

      ```php
      Queue::push(new SendEmail($user));
      ```


23. **Cookie Facade (`Cookie`):**
   - The `Cookie` facade allows you to work with HTTP cookies.
   - Example: Setting and getting cookies.

     ```php
     Cookie::queue('name', 'John', 60); // Set a cookie
     $value = Cookie::get('name'); // Get a cookie
     ```

24. **Artisan Facade (`Artisan`):**
   - The `Artisan` facade provides access to the Artisan command-line tool from within your application.
   - Example: Running an Artisan command programmatically.

     ```php
     Artisan::call('migrate');
     ```

25. **Broadcast Facade (`Broadcast`):**
   - The `Broadcast` facade is used for broadcasting events to WebSocket channels.
   - Example: Broadcasting an event to a channel.

     ```php
     Broadcast::to('channel-name')->emit('event-name', $data);
     ```

26. **Queue Facade (`Queue`):**
   - The `Queue` facade is used to dispatch and manage background jobs.
   - Example: Dispatching a job to the queue.

     ```php
     Queue::push(new SendEmail($user));
     ```

27. **Schema Facade (`Schema`):**
   - The `Schema` facade provides methods for working with database schemas and tables.
   - Example: Creating a new table using migrations.

     ```php
     Schema::create('users', function ($table) {
         $table->id();
         $table->string('name');
         $table->timestamps();
     });
     ```

28. **URL Facade (`URL`):**
   - The `URL` facade helps generate URLs for various parts of your application.
   - Example: Generating URLs for routes.

     ```php
     $url = URL::to('profile');
     ```

29. **Validator Facade (`Validator`):**
   - The `Validator` facade allows you to validate data easily.
   - Example: Validating form data.

     ```php
     $validator = Validator::make($request->all(), [
         'email' => 'required|email',
         'password' => 'required|min:6',
     ]);
     ```

30. **Str Facade (`Str`):**
   - The `Str` facade provides string manipulation methods.
   - Example: Truncating a string.

     ```php
     $shortened = Str::limit('This is a long string', 10);
     ```
## Custom Facade
---
Creating a real-life custom facade in Laravel involves several steps, including defining the facade class, creating a service provider, binding the facade to the underlying class, and using it in a controller and Blade file. We can create **CustomLoggingFacade**,**PaymentGatewayFacade**,**ImageProcessingFacade**

**Step 1: Create the Facade Class**

First, create a custom facade class that will act as a static proxy to an underlying service or functionality. For this example, let's create a simple facade for generating QR codes.

Create the facade class in the `app/Facades` directory. If the directory doesn't exist, you can create it:

```bash
mkdir app/Facades
touch app/Facades/QrCodeFacade.php
```

Now, define the `QrCodeFacade.php` class:

```php
// app/Facades/QrCodeFacade.php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class QrCodeFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'qr-code'; // This should match the binding name in the service provider
    }
}
```

**Step 2: Create the Service Provider**

Next, create a service provider to bind the underlying functionality (in this case, a QR code generator) to the Laravel service container.

Generate a service provider using Artisan:

```bash
php artisan make:provider QrCodeServiceProvider
```

Edit the `QrCodeServiceProvider.php` file to bind the QR code generator:

```php
// app/Providers/QrCodeServiceProvider.php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('qr-code', function () {
            return QrCode::size(200);
        });
    }

    // ...
}
```

In this example, we're using the `SimpleSoftwareIO/QrCode` package for generating QR codes. Make sure to install the package using Composer:

```bash
composer require simplesoftwareio/simple-qrcode
```

**Step 3: Register the Service Provider**

Add the `QrCodeServiceProvider` to the `providers` array in your `config/app.php` configuration file:

```php
// config/app.php

'providers' => [
    // ...
    App\Providers\QrCodeServiceProvider::class,
],
```

**Step 4: Use the Facade in a Controller**

Now, you can use your custom facade in a controller. For example, create a new controller using Artisan:

```bash
php artisan make:controller QRCodeController
```

Edit the `QRCodeController.php` file and use the facade to generate a QR code:

```php
// app/Http/Controllers/QRCodeController.php

namespace App\Http\Controllers;

use App\Facades\QrCodeFacade;
use Illuminate\Http\Request;

class QRCodeController extends Controller
{
    public function generateQRCode(Request $request)
    {
        $qrCode = QrCodeFacade::generate($request->input('data'));

        return view('qrcode', compact('qrCode'));
    }
}
```

**Step 5: Use the Facade in a Blade View**

Create a Blade view file to display the generated QR code. For example, create a `qrcode.blade.php` file in the `resources/views` directory:

```blade
<!-- resources/views/qrcode.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>QR Code Generator</title>
</head>
<body>
    <img src="data:image/png;base64,{{ base64_encode($qrCode) }}" alt="QR Code">
</body>
</html>
```

In this Blade view, we're using the `$qrCode` variable passed from the controller to display the generated QR code image.

**Step 6: Create a Route**

Define a route in your `routes/web.php` file to access the QR code generation feature:

```php
// routes/web.php

use App\Http\Controllers\QRCodeController;

Route::get('/generate-qrcode', [QRCodeController::class, 'generateQRCode']);
```

**Step 7: Access the QR Code Generator**

Now, you can access the QR code generator by visiting the `/generate-qrcode` route in your application. It will use the custom facade to generate a QR code and display it on the `qrcode.blade.php` view.

### More Custom Facades
---

1. **CustomLoggingFacade:** Create a custom facade for enhanced logging, allowing you to log specific types of messages or perform additional actions when logging.

2. **NotificationFacade:** Implement a custom facade to handle notifications, making it easier to send messages, alerts, and emails to users.

3. **GeolocationFacade:** Create a facade for geolocation services, enabling you to retrieve and manage location-related data easily.

4. **PaymentGatewayFacade:** Develop a custom facade for payment gateway integration, simplifying payment processing in your application.

5. **ImageProcessingFacade:** Implement a facade to handle image processing tasks, such as resizing, cropping, or watermarking images.

6. **SecurityFacade:** Create a security facade to encapsulate various security-related tasks, like authentication, authorization, and encryption.

7. **CacheManagementFacade:** Build a custom facade to manage caching, allowing you to cache and retrieve data efficiently.

8. **JobQueueFacade:** Develop a facade to manage background jobs and task queues, making it easy to dispatch and handle asynchronous tasks.

9. **FileStorageFacade:** Implement a facade for interacting with file storage services, such as cloud storage or local file systems.

10. **NotificationDispatcherFacade:** Create a facade to manage and dispatch notifications across multiple channels, such as email, SMS, and push notifications.

11. **SocialMediaIntegrationFacade:** Develop a facade for integrating with social media platforms, simplifying actions like posting to social media or fetching user data.

12. **SearchEngineIntegrationFacade:** Implement a facade for integrating with search engines like Elasticsearch or Algolia, enabling efficient search functionality in your application.

13. **EmailServiceFacade:** Build a custom email service facade for sending and managing emails with various providers or services.

14. **AnalyticsFacade:** Create a facade to handle analytics and tracking, allowing you to collect and analyze user data.

15. **DatabaseFacade:** Develop a custom database facade for interacting with databases efficiently, including custom query builders or data migration utilities.

16. **LocalizationFacade:** Implement a localization facade to manage translations and language-related tasks in multilingual applications.

17. **APIIntegrationFacade:** Build a facade for integrating with external APIs, making it easier to send requests, handle responses, and manage API keys.

18. **PDFGenerationFacade:** Create a facade for generating PDF documents from HTML templates or data, simplifying PDF generation tasks.

19. **WorkflowAutomationFacade:** Implement a facade for workflow automation, allowing you to define and manage complex business processes.

20. **CustomValidationFacade:** Develop a custom validation facade for handling specific validation rules or complex validation scenarios.



# BASIC CONCEPTS OF LARAVEL 
## Route
--->
Route:- the HTTP Request by which any page is displayed or loaded based on appropriate controller is called routes.
Naming Route:- The way is to provide a nickname to the route. Named route is linked by chaining method with the route like ->name('student.all'); 

### Route Parameter
Two ways of Route Parameter>
1. Required Parameter
2. Optional Parameter

1. Required Parameter must needs parameter value by URI's Request.
2. Parameter value is optional for Optional Parameter
```bash
Required Paremeter 
Route::get ('emp/{id}', function ($id) {
    echo 'Emp '.$id;
});
Optional Parameter
Route::get ('emp/{id?}', function ($id = 123) {
    echo 'Emp '.$id;
});
```
Route Parameter With Constrained
Regular expression is declared with where() that parameter checked with the constrained

```bash
Route::get('/example/{id}/{name}',function($id,$name){
return 'id is ' . $id . 'and name is ' . $name;
})->where(array('id'=>'[0-5]+','name'=>'[a-h]+'));
```
### Route controller, Prefix, name Prefix and Middleware
---
To assign controller, Prefix, name Prefix and Middleware to all routes within a group.We can assigned the methods by chaning operator(->) after the first static method(added with ::). you may use the middleware method before defining the group. Middleware are executed in the order they are listed in the array.['auth','admin'].

```bash
/* Poly Morphic Relation Route */ // If middleware is found
Route::middleware('auth')->prefix('polymorphic/')->name('polymorphic.')->controller(PolyMorphicController::class)->group(function(){
    Route::get('one-to-one','OneToOnePolyMorphic')->name('OneToOne'); 
     // This url is polymorphic/one-to-one and  name route is polymorphic.OneToOne
});
```

 Custom Error with Code
 ---
```bash
Route::get('/show-view', function(){
abort_if(!isset($address),404);
return view('student.data',['my_data'=>$address]);
});
```
#### Route Caching
When deploying your application to production, you should take advantage of Laravel's route cache. Using the route cache will drastically decrease the amount of time it takes to register all of your application's routes. To generate a route cache, execute the route:cache Artisan command:

```bash
php artisan route:cache
```
After running this command, your cached routes file will be loaded on every request. Remember, if you add any new routes you will need to generate a fresh route cache. Because of this, you should only run the route:cache command during your project's deployment.

You may use the route:clear command to clear the route cache:

```bash
php artisan route:clear
```
## Middleware
---
Middleware acts as a bridge between a request and a response. It is a type of filtering mechanism.

Laravel includes a middleware that verifies whether the user of the application is authenticated or not. If the user is authenticated, it redirects to the home page otherwise, if not, it redirects to the login page.

#### Middleware & Responses
---
Of course, a middleware can perform tasks before or after passing the request deeper into the application. For example, the following middleware would perform some task before the request is handled by the application:
```bash
<?php
 
namespace App\Http\Middleware;
 
use Closure;
 
class BeforeMiddleware
{
    public function handle($request, Closure $next)
    {
        // Perform action
 
        return $next($request);
    }
}
```
### Creating Middleware
---
Middleware can be created by executing the following command −

php artisan make:middleware <middleware-name>

Replace the <middleware-name> with the name of your middleware. The middleware that you create can be seen at app/Http/Middleware directory.

Example

Observe the following example to understand the middleware mechanism −

Step 1 − Let us now create AgeMiddleware. To create that, we need to execute the following command −

```bash
php artisan make:middleware AgeMiddleware
```
Step 2 − AgeMiddleware will be created at app/Http/Middleware. The newly created file will have the following code already created for you.

```bash
namespace App\Http\Middleware;
use Closure;

class AgeMiddleware {
   public function handle($request, Closure $next) {
      return $next($request);
   }
}
```
### Registering Middleware
---
We need to register each and every middleware before using it. There are two types of Middleware in Laravel.

We need to register each and every middleware before using it. There are two types of Middleware in Laravel.

Global Middleware
Route Middleware

    The Global Middleware will run on every HTTP request of the application, whereas the Route Middleware will be assigned to a specific route. The middleware can be registered at app/Http/Kernel.php. This file contains two properties $middleware and $routeMiddleware. $middleware property is used to register Global Middleware and $routeMiddleware property is used to register route specific middleware.

To register the global middleware, list the class at the end of $middleware property.
```bash
protected $middleware = [
   \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
   \App\Http\Middleware\EncryptCookies::class,
   \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
   \Illuminate\Session\Middleware\StartSession::class,
   \Illuminate\View\Middleware\ShareErrorsFromSession::class,
   \App\Http\Middleware\VerifyCsrfToken::class,
];
```
To register the route specific middleware, add the key and value to $routeMiddleware property.

```bash
protected $routeMiddleware = [
   'auth' => \App\Http\Middleware\Authenticate::class,
   'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
   'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
];
```

Example
We have created AgeMiddleware in the previous example. We can now register it in route specific middleware property. The code for that registration is shown below.

The following is the code for app/Http/Kernel.php −
```bash
   protected $routeMiddleware = [
      'auth' => \App\Http\Middleware\Authenticate::class,
      'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
      'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
      'Age' => \App\Http\Middleware\AgeMiddleware::class,
      'role'=> \App\Http\Middleware\EnsureUserHasRole::class,
   ];
}
```
Notes : The Middleware will be used in Route as Following

```bash
Route::get('/post/{id}', function ($id) {
    //
})->middleware('Age');
```

### Middleware Parameters

Middleware can also receive additional parameters. For example, if your application needs to verify that the authenticated user has a given "role" before performing a given action, you could create an EnsureUserHasRole middleware that receives a role name as an additional argument.

Additional middleware parameters will be passed to the middleware after the $next argument:

```bash
namespace App\Http\Middleware;
 
use Closure;
 
class EnsureUserHasRole
{
  
    public function handle($request, Closure $next, $role)
    {
        if (! $request->user()->hasRole($role)) {
            // Redirect...
            return redirect()->route('home');
        }
 
        return $next($request);
    }
 
}

```

Middleware parameters may be specified when defining the route by separating the middleware name and parameters with a :. Multiple parameters should be delimited by commas:
```bash
Route::put('/post/{id}', function ($id) {
    //
})->middleware('role:editor'); # assigning role Editore in role Middleware
```

## Request and Response
---
Request(Dependency Injection) :
Laravel's Illuminate\Http\Request class provides an object-oriented way to interact with the current HTTP request being handled by your application as well as retrieve the input, cookies, and files that were submitted with the request.

Dependency Injection
---
In software engineering, dependency injection is a design pattern in which an object or function receives other objects or functions that it depends on.

```bash
Request is Dependency Injection
$request is a on object that recieves all data from inputs,cookies or files.

store(Request $request){
    $request->all();
}

```

**Response** :
Response can be string, array or Object.
All routes and controllers should return a response to be sent back to the user's browser. Laravel provides several different ways to return responses. The most basic response is returning a string from a route or controller. The framework will automatically convert the string into a full HTTP response:

```bash
Route::get('/', function () {
    return 'Hello World'; // string
    return [12,34,55,65]; // array

         return response('Hello World', 200)
                  ->header('Content-Type', 'text/plain'); // object
                  or
                  $model = Product::all();
                return response(Json($model)); // this response for ajax call request

            # Redirect Route with carrying Data

                return redirect()->route('profile', [$user]);

                # Redirecting With Flashed Session Data
                 return redirect('dashboard')->with('status', 'Profile updated!');

                 # redirect with downlaod
                 return response()->download($pathToFile);
});

```
## Blade, Template and View
Blade-syntext: blade syntext {{ $name }} with Variable
Blade-Directives: this directives starts with @ like @if @endif
Blade and Javascript: Blade syntext with @{{ name }} in javascript frameworks

### VIEW

**Sharing Data Views**

In Laravel, there are several ways to share data with views to pass information from the backend to the frontend. Here are some common methods:

1. **Using the `view` function:**
   The simplest way is to use the `view` function to create a view and pass data to it as an associative array.
   
   ```php
   $data = ['key' => 'value'];
   return view('viewName', $data);
   ```

2. **Using the `with` method:**
   You can use the `with` method to pass individual variables to the view.
   
   ```php
   return view('viewName')->with('variableName', $variableValue);
   ```

3. **Using the `compact` function:**
   The `compact` function allows you to pass variables to the view by specifying their names as arguments.
   
   ```php
   $variable = 'some value';
   return view('viewName', compact('variable'));
   ```

4. **Using the `@php` Blade directive:**
   In your Blade templates, you can use the `@php` directive to write PHP code and set variables.
   
   ```php
   @php
       $variable = 'some value';
   @endphp
   ```

5. **Using view composers:**
   View composers allow you to bind data to specific views or view templates using service providers. This is helpful when you want to share data with multiple views.
   
   ```php
   View::composer('viewName', function ($view) {
       $view->with('variableName', $variableValue);
   });
   ```

6. **Using view creators:**
   Similar to view composers, view creators let you share data with views, but they allow for more fine-grained control as they are tied to specific view classes.
   
   ```php
   View::creator('App\SomeViewClass', function ($view) {
       $view->with('variableName', $variableValue);
   });
   ```

7. **Using the `@inject` Blade directive:**
   The `@inject` directive allows you to inject a service or value into your view directly from a service container.
   
   ```php
   @inject('serviceName', 'Namespace\ServiceClass')
   ```

8. **Using shared views:**
   You can create a shared view that includes data you want to share across multiple views. This can be included in other views using the `@include` directive.

Remember that the choice of method depends on the complexity of your application and your specific use case. Using Blade directives like `@php`, `@inject`, and `@include` can help you achieve more dynamic data sharing when needed.


 ### Blade Inheritance and Layout
 ---

Blade-Inheritance: Inheritance called by @extends() directive
Section: @section() blade directive is used in simply like @section('title','Home');
or section('custom-content') @endsection() is used to add block content;

View Rendering: Simple View Rendering like

```bash

 Route::view('/app/data','app.data');
 
 ```
 view Rendering with controller or Function

 ```bash
 Route::get('/app/data',function(){
    return veiw('app.data');
 })

 ```
 ### Route Model Binding
 ---
Route model binding in Laravel provides a mechanism to inject a model instance into your routes.
 Route Model Binding uses Dependency Injection to automatically find the video we are looking for.

 ```bash
  class VideoController extends Controller
{
    public function videoShow(Video $video)
    {
    #  dd($video);
    return $video->name;
    }

    public function videoShowById($id)
    {
       $name = Video::where('id',$id)->first();
       return $name->name;
    }
}

 ```
 Binding In Route Here

 ```bash
 Route::prefix('vidoes/')->name('videos.')->controller(VideoController::class)->group(function(){

# Data Retrieving by Route Model Binding 
    Route::get('show/{video:name}','videoShow')->name('show');
    
    # Data Retrieving by Url Id
    Route::get('showById/{id}','videoShowById');
});

 ```

## Controller
---
In the MVC framework, the letter ‘C’ stands for Controller. It acts as a directing traffic between Views and Models. In this chapter, you will learn about Controllers in Larave

Controller can be many types:


### Basic Controllers
---
```bash
class UserController extends Controller
{
    public function show($id)
    {
        return view('user.profile', [
            'user' => User::findOrFail($id)
        ]);
    }

    fublic function create(Request $request){
        $model = User::all();
        return view('user.create',compact($model));
    }

}
```

### Single Action Controller
---
If you need to structure a specific module that has one action, then the single-action controller comes into play.

Firstly, define a single __invoke method in your controller:

```bash
class ControllerName extends Controller
{
    
    public function __invoke()
    {
        // ... your logic goes here
    }
}

Route ->  Route::post('/server', ControllerName::class);

artisan command : php artisan make:controller ControllerName --invokable
```

### Restful Resource Controller

Restful Controller/Resource Controller
---
Often while making an application we need to perform CRUD (Create, Read, Update, Delete) operations. Laravel makes this job easy for us. Just create a controller and Laravel will automatically provide all the methods for the CRUD operations

```bash
Route::resource('photos', PhotoController::class);

or multiple controller

Route::resources([
    'photos' => PhotoController::class,
    'posts' => PostController::class,
]);

or
 naming resource controller

Route::resource('photos', PhotoController::class)->names([
    'create' => 'photos.build'
]);

```

![Alt text](https://i.ibb.co/3pWzcnB/29304922-Laravel-Resource-Controller-2x.png "Resource Controller")


Actions Handled By Resource Controller
---
![alt text](https://i.ibb.co/ZhTmDTw/resourse-contrller-http.png "Resource-controller-http-methods")

### Controller Middleware
---

```bash
class UserController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('log')->only('index');
        $this->middleware('subscribed')->except('store');
    }

// auth middlewire can access all methods if he is authenticated

     public function index(){
        // log middlewire can only access index method
    }

    public function store(){
        // subscribed middlewire can access everything but not store methods
    }

}

Route::get('profile', [UserController::class, 'show'])->middleware('auth');
```

## DATABASE
---
Laravel has made processing with database very easy. Laravel currently supports following 4 databases −

MySQL
Postgres
SQLite
SQL Server

Database
---
Almost every modern web application interacts with a database. Laravel makes interacting with databases extremely simple across a variety of supported databases using raw SQL, a fluent query builder, and the Eloquent ORM. Currently, Laravel provides first-party support for five databases:

MariaDB 10.3+ (Version Policy)
MySQL 5.7+ (Version Policy)
PostgreSQL 10.0+ (Version Policy)
SQLite 3.8.8+
SQL Server 2017+ (Version Policy)

### RAW SQL QUERY
---
The DB facade provides methods for each type of query: select, update, insert, delete, and statement.

```bash
use Illuminate\Support\Facades\DB;
SELECT
$users = DB::select('select * from users where active = ?', [1]); // [1] is active value

INSERT
DB::insert('insert into users (id, name) values (?, ?)', [1, 'Marc']);

UPDATE
DB::update(
    'update users set votes = 100 where name = ?',
    ['Anita']
);

DELETE
DB::delete('delete from users where id = ?',[2]);
```
Database Transactions
---
You may use the transaction method provided by the DB facade to run a set of operations within a database transaction. If an exception is thrown within the transaction closure, the transaction will automatically be rolled back and the exception is re-thrown. If the closure executes successfully, the transaction will automatically be committed. You don\'t need to worry about manually rolling back or committing while using the transaction method:
```bash
DB::transaction(function () {
    DB::update('update users set votes = 1');
 
    DB::delete('delete from posts');
});
```

## Database: Query Builder
---
You may use the table method provided by the DB facade to begin a query. The table method returns a fluent query builder instance for the given table, allowing you to chain more constraints onto the query and then finally retrieve the results of the query using the get method:

```bash
DB::table('users')->get();

DB::table('users')
->where('id', $user->id)
->update(['active' => true]);
```

### Aggregate Function
---
The query builder also provides a variety of methods for retrieving aggregate values like count, max, min, avg, and sum.

```bash
DB::table('orders')
    ->where('finalized', 1)
     ->avg('price');
 DB::table('users')->count() or ->max('price');
```
### Select Statements Of Query Builder
---
Select Statement is used to retrive specific column values From database table;
```bash
DB::table('users')
            ->select('name', 'email as user_email')
            ->get();
```
### Raw Expression Of Query Builder
---
* Raw Methods
```bash
$orders = DB::table('orders')
                ->select('department', DB::raw('SUM(price) as total_sales'))
                ->groupBy('department')
                ->havingRaw('SUM(price) > ?', [2500])
                ->get();
```

### Joins Of Query Builder
---
Inner Join will be used only join that method add with -> (chaining);

```bash
$users = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('users.*', 'contacts.phone', 'orders.price')
            ->get();
```

### Left Join / Right Join Clause
---
```bash
$users = DB::table('users')
            ->leftJoin('posts', 'users.id', '=', 'posts.user_id')
            ->get();
 
$users = DB::table('users')
            ->rightJoin('posts', 'users.id', '=', 'posts.user_id')
            ->get();
```
### Where Clauses of Query Builder
---
Multiple Condition is used in query builder by where();
```bash
$users = DB::table('users')->where('votes', 100)->get();
```

With Operator
>= , <>, 'like','T%'
```bash
DB::table('users')
        ->where('name', 'like', 'T%')
        ->get();
```
or 
* Multiple Condition may also with array

```bash
$users = DB::table('users')->where([
    ['status', '=', '1'],
    ['subscribed', '<>', '1'],
])->get();
```
* orWhere Clauses for or condition in query
---
```bash
$users = DB::table('users')
                    ->where('votes', '>', 100)
                    ->orWhere('name', 'John')
                    ->get();

// another query 
                $users = DB::table('users')
            ->where('votes', '>', 100)
            ->orWhere(function($query) {
                $query->where('name', 'Abigail')
                      ->where('votes', '>', 50);
            })
            ->get();

            same as raw query follow as

select * from users where votes > 100 or (name = 'Abigail' and votes > 50)

// another query

$users = DB::table('users')
           ->where('name', '=', 'John')
           ->where(function ($query) {
               $query->where('votes', '>', 100)
                     ->orWhere('title', '=', 'Admin');
           })
           ->get();

           same as
select * from users where name = 'John' and (votes > 100 or title = 'Admin')

```

### Where not Clause
---
The whereNot and orWhereNot methods may be used to negate a given group of query constraints.
```bash
$products = DB::table('products')
                ->whereNot(function ($query) {
                    $query->where('clearance', true)
                          ->orWhere('price', '<', 10);
                })
                ->get();
```
### Additional Where Clauses
---
```bash
->whereBetween('votes', [1, 100]) for between query
->whereNotBetween('votes', [1, 100]) for not between query
->whereIn('id', [1, 2, 3]) for keyword In query
->whereNotIn('id', [1, 2, 3]) for keyword Not In query
 ->whereNull('updated_at') for null constraints value
 ->whereNotNull('updated_at') for not null constraints value
 ->whereDate('created_at', '2016-12-31') for the specific date
```

### Ordering, Grouping, Limit & Offset
---
orderBy : The orderBy method allows you to sort the results of the query by a given column.
It may also multiple Ordering ->orderBy();
```bash
$users = DB::table('users')
                ->orderBy('name', 'desc')->get();
```

* The latest & oldest Methods

latest() or oldest() is for ordering by date.
```bash
$user = DB::table('users')->latest()->first();
```
* The groupBy & having Methods
```bash
$users = DB::table('users')
                ->groupBy('account_id')
                ->having('account_id', '>', 100)->get();
```

* Limit & Offset
The limit() and offset() methods are used to define perspectively skip() and take() methods in laravel.

```bash
$users = DB::table('users')->skip(10)->take(5)->get();

or it may also used follow as

$users = DB::table('users')->offset(10)->limit(5)->get();
```

### Insert Statements in Query Builder
---
The query builder also provides an insert method that may be used to insert records into the database table. The insert method accepts an array of column names and values:

```bash
DB::table('users')->insert([
    'email' => 'kayla@example.com',
    'votes' => 0
]);

or multiple records by passing as arrrays of arrays

DB::table('users')->insert([
    ['email' => 'picard@example.com', 'votes' => 0],
    ['email' => 'janeway@example.com', 'votes' => 0],
]);
```
### Update Statements in Query Builder
---
 the query builder can also update existing records using the update method. The update method.
 ```bash
 $affected = DB::table('users')
              ->where('id', 1)
              ->update(['votes' => 1]);
 ```
 Update Or Insert
 Sometimes you may want to update an existing record in the database or create it if no matching record exists.
 ```bash
 DB::table('users')
    ->updateOrInsert(
        ['email' => 'john@example.com', 'name' => 'John'],
        ['votes' => '2']
    );
 ```
 ### Delete Statements in Query Builder
 ---
 The query builder's delete method may be used to delete records from the table. The delete method returns the number of affected rows.
 ```bash
 $deleted = DB::table('users')->delete();
$deleted = DB::table('users')->where('votes', '>', 100)->delete();

to remove entire table with stracture and all records
DB::table('users')->truncate();
 ```
 ## Eloquent ORM
 ---
Eloquent ORM (Object Relation Mapper) is easy to use for users who know how to use objects in PHP. The ORM is an important feature of the Laravel framework, considered a powerful and expensive feature of Laravel. The ORM works with database objects and is used to make relationships with database tables. Each table of the database is mapped with a particular eloquent model. The model object contains various methods to retrieve and update data from the database table. Eloquent ORM can be used with multiple databases by implementing ActiveMethod. This feature makes database-related tasks, such as defining relationships, simpler by defining the database tables.

#### Is "DB Model" worked with Qeury Builder / Raw Sql Query ?
---
We won't have to use Model if we're using Query Builder / Raw Sql Query.

```bashP
Using Model in ORM
$users = Users::get(['first_name']);

Using Query Builder
$users = DB::table('users')->get(['first_name']);
```

#### Eloquent Model Conventions
---

It is known that ELOQEUNT ORM is used for MODEL.

```bash
class Flight extends Model
{
}
```
#### Table Names
---
If your model's corresponding database table does not fit this convention, you may manually specify the model's table name by defining a table property on the model:

```bash
class Flight extends Model
{ 
   # corresponding table name 'flights';
   # for not corresponding, use following.
    protected $table = 'my_flights';
}
or
 # corresponding table Model User;
class UserModel extends Model
{ 
   # for not corresponding Model, use following.
     protected $table = 'users';
}
```

#### Primary Keys
---
The eloquent model considers that each table has a primary key named 'id'. We can override this convention by providing a different name to the $primarykey attribute.

```bash
class Flight extends Model
{ 
   protected $primaryKey = 'flight_id';
   
}
```

#### Retrieving Models for Select  in ORM
---
It may be used in Blade/controller file by calling Model Namespace.
The model's all method will retrieve all of the records from the model's associated database table.
```bash
use App\Models\Flight;
# $flights = Flight::all();
foreach (Flight::all() as $flight) {
    echo $flight->name;
}
```
#### Building Queries
---
We can add additional constraints to queries and then invoke the get method to retrieve the results.The First Method or Constraints must be joined with model by scope resulotion operator(::).the next constraints or methods will use chainging operator (->).
```bash
$flights = Flight::where('active', 1)->orderBy('name')->take(10)->get();

or 

Flight::orderBy('name')->get();

```
#### Chunking Results - chunk()
---
Your application may run out of memory if you attempt to load tens of thousands of Eloquent records via the all or get methods. Instead of using these methods, the chunk method may be used to process large numbers of models more efficiently.

```bash
Flight::orderBy('id')->chunk(200, function ($flights) {
    foreach ($flights as $flight) {
    }
});

or it may be used in following system
 $users = User::all();
      $chunkedUsers = $users->chunk(10);
      foreach ($chunkedUsers as $records) {
         foreach($records as $user) {
            echo $user->id."=>".$user->name."";
         }
      }

```
Chunk may be used in query builder
```bash
DB::table('users')->orderBy('id')->chunk(100, function ($users) {
    foreach ($users as $user) {
        echo $user->id."=>".$user->name." ";
         }
      });
```
#### Retrieving Single Models / Aggregates
---
In addition to retrieving all of the records matching a given query, you may also retrieve single records using the "find", "first", or "firstWhere" methods.

```bash
 Retrieve a model by its primary key...
Flight::find(1);

# Retrieve the first model matching the query constraints.

Flight::where('active', 1)->first();
same as
Flight::firstWhere('active', 1);
```
#### Not Found Exception in find() or fist()
---
The findOrFail and firstOrFail methods will retrieve the first result of the query; however, if no result is found, an Illuminate\Database\Eloquent\ModelNotFoundException will be thrown:

```bash
 Flight::findOrFail(1);
 Flight::where('legs', '>', 3)->firstOrFail();
```

In Retrieving with Aggregates Function

```bash
$count = Flight::where('active', 1)->count();
$max = Flight::where('active', 1)->max('price');
```

### Select specifice data of some column with their specific condition with ORM


```php
  
                 $data = Page::where('about_status', '0')
                         ->orWhere('faq_status', '0')
                         ->orWhere('contact_status', '0')
                        ->select('about_details', 'faq_details', 'contact_details')
                          ->get();

        
```

### Inserting Models/Insert Method with ORM
---
To insert a new record into the database, you should instantiate a new model instance and set attributes on the model. Then, call the save method on the model instance.
It's not mandatory to save $fillable or $guard Properties for object instantiate of Model class.

```bash
  public function store(Request $request)
    {
        # Validate the request...
 
        $flight = new Flight; # or new Flight()
        $flight->name = $request->name;
        $flight->email = $request->email;
        $flight->save();
    }
```
Note : The model's "created_at" and "updated_at" timestamps will automatically be set when the save method is called, so there is no need to set them manually.

### UPDATE IN ELOQUENT ORM
---
We should call the model's save method in Update. Again, the "updated_at" timestamp will automatically be updated.
```BASH
$flight = Flight::find(1);
$flight->name = 'Paris to London';
$flight->email = 'm.karimcu@gmail.com';
$flight->save();
```
#### Mass Updates
---
 all flights that are active and have a destination of San Diego will be marked as delayed.

```bash
Flight::where('active', 1)
      ->where('destination', 'San Diego')
      ->update(['delayed' => 1]);
```
Note : The update method expects an array of column and value pairs representing the columns that should be updated. The update method returns the number of affected rows.

### Mass Assignment in Eloquent ORM
---
You may use the create method to "save" a new model using a single PHP statement.
```bash
$flight = Flight::create([
    'name' => 'London to Paris',
    'email' => 'm.karimcu@gmail.com',
]);
```
* Note : However, before using the create method, you will need to specify either a "fillable" or "guarded" property on your model class

### fillable vs $guard methods
---
The guarded attribute is the opposite of fillable attributes. In Laravel, fillable attributes are used to specify those fields which are to be mass assigned. Guarded attributes are used to specify those fields which are not mass assignable.
```bash
protected $guard = [] // all fields will be  mass assigned
protected $fillable = ['name','email'] // Only email & name will be  mass assigned but not others.
```
### Upserts In Eloquent ORM
---
Occasionally, you may need to update an existing model or create a new model if no matching model exists. Like the firstOrCreate method, the updateOrCreate.

```bash
$flight = Flight::updateOrCreate(
    ['departure' => 'Oakland', 'destination' => 'San Diego'],
    ['price' => 99, 'discounted' => 1]
);
```
Note : if a flight exists with a departure location of Oakland and a destination location of San Diego, its price and discounted columns will be updated.

### Deleting Models In Eloquent ORM
---
To delete a model, you may call the delete method on the model instance.
```bash
$flight = Flight::find(1);
$flight->delete();
or
Flight::find(1)->delete();

 or 
 Truncate to remove all records with stractures
 Flight::truncate();
```

#### Deleting An Existing Model By Its Primary Key
---
In addition to accepting the single primary key, the destroy method will accept multiple primary keys, an array of primary keys, or a collection of primary keys:
```bash
Flight::destroy(1);
Flight::destroy(1, 2, 3);
Flight::destroy([1, 2, 3]);
Flight::destroy(collect([1, 2, 3]));
```

#### Deleting Models Using Queries
---
In this example, we will delete all flights that are marked as inactive. Like mass updates, mass deletes will not dispatch model events for the models that are deleted.

```bash
$deleted = Flight::where('active', 0)->delete();
```

### Eloquent: Table Relationships
---
Database hase 3 types of Table Relationships.

#### One To One RelationShip
---
A one-to-one relationship in a database occurs when each row in table 1 has only one related row in table 2.

![Alt Text](https://i.ibb.co/pdTYYBt/one-to-one-relationship.webp "One to One Relationship")

#### One To Many RelationShip
---
A one-to-many relationship occurs when one record in table 1 is related to one or more records in table 2.

![Alt Text](https://i.ibb.co/6WB4gf3/one-to-many-relationship.webp "One To Many RelationShip")

#### Many To Many RelationShip
---
This type of relationship exists when each of the records of the first table can be associated with one or more records of the second table, as well as a single record of the second table may be related to one or more records of the first table. A Many-to-Many relationship is formed by two one-to-many relationships that are connected by an ‘associate table’ or ‘linking table.’ By having fields that are the primary keys of the other two tables, the bridging table connects two tables. The following example will help us comprehend this.

![Alt Text](https://i.ibb.co/RzmCBBS/word-image185.png "Many To Many RelationShip")

or 

two table and associated table/junction table/bridging table.
![Alt Text](https://i.ibb.co/sJwbtPP/many-to-many-relationship-o1.webp "Many To Many RelationShip")


Junction table/bridging Table of Many To Many RelationShip

![Alt Text](https://i.ibb.co/ctHVM6j/many-to-many-relationship-junction-table-o2.webp "Junction table of Many To Many RelationShip")

 * hasOne() for one to one relation table to access data
a User model might be associated with one Phone model. To define this relationship, we will place a phone method on the User model. The phone method should call the hasOne method and return its result.

```bash
class User extends Model
{
    public function phone()
    {
        // Get the phone associated with the user.
        return $this->hasOne(Phone::class);
        or better return $this->hasOne(Phone::class,'foreign_key','local_key'); 
        // foreign_key defines phone table and local key defines user table.
        // foreign_key = user_id , local_key = id of user table.
    }
}
```
Note : The first argument passed to the hasOne method (phone()) is the name of the related model class. Once the relationship is defined, we may retrieve the related record using Eloquent's dynamic properties.

```bash
// to retrieve data from phones table by user id.
$phone = User::find(1)->phone;
```

#### Defining The Inverse Of The Relationship
---
So, we can access the Phone model from our User model. Next, let's define a relationship on the Phone model that will let us access the user that owns the phone. We can define the inverse of a hasOne relationship using the belongsTo method:
```bash
class Phone extends Model
{
     * Get the user that owns the phone.
    public function user()
    {
        return $this->belongsTo(User::class);
        or
         return $this->belongsTo(User::class, 'foreign_key'); // foreign_key = user_id
    }
}
```
Note : If the parent model does not use id as its primary key, or you wish to find the associated model using a different column, you may pass a third argument to the belongsTo method specifying the parent table's custom key:
```bash
return $this->belongsTo(User::class, 'foreign_key', 'owner_key');
```
### One To Many Relationship
---

```bash
class Post extends Model
{
     * Get the comments for the blog post.
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
```
Important Note : Eloquent will automatically determine the proper foreign key column for the Comment model. By convention, Eloquent will take the "snake case" name of the parent model and suffix it with _id. So, in this example, Eloquent will assume the foreign key column on the Comment model is post_id.

 * To Retreive Data from above Relation
 ---
 ```bash
 $comments = Post::find(1)->comments; // ->comments is method name from above
 ```

 Since all relationships also serve as query builders, you may add further constraints to the relationship query by calling the comments method and continuing to chain conditions onto the query:

 ```bash
 $comment = Post::find(1)->comments()
                    ->where('title', 'foo')
                    ->first();
 ```

 Like the hasOne method, you may also override the foreign and local keys by passing additional arguments to the hasMany method:
 ```bash

return $this->hasMany(Comment::class, 'foreign_key');
return $this->hasMany(Comment::class, 'foreign_key', 'local_key');
 ```
 ### One To Many (Inverse) / Belongs To
 Now that we can access all of a post's comments, let's define a relationship to allow a comment to access its parent post. To define the inverse of a hasMany relationship, define a relationship method on the child model which calls the belongsTo method.

 ```bash
 
class Comment extends Model
{
     * Get the post that owns the comment.
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
 ```
 Once the relationship has been defined, we can retrieve a comment's parent post by accessing the post "dynamic relationship property":
 ```bash
$comment = Comment::find(1);
return $comment->post->title;
 ```
 Note : In the example above, Eloquent will attempt to find a Post model that has an id which matches the post_id column on the Comment model.
 Or 

 ```bash
 return $this->belongsTo(Post::class, 'foreign_key');
 ```

 Note : If your parent model does not use "id" as its primary key, or you wish to find the associated model using a different column, you may pass a third argument to the belongsTo method specifying your parent table's custom key:

 ```bash
 * Get the post that owns the comment.
public function post()
{
    return $this->belongsTo(Post::class, 'foreign_key', 'owner_key');
}
 ```

 #### Querying Belongs To Relationships
 ---
 When querying for the children of a "belongs to" relationship, you may manually build the where clause to retrieve the corresponding Eloquent models:
 ```bash
 $posts = Post::where('user_id', $user->id)->get();
 $posts = Post::whereBelongsTo($user)->get();
 ```
 ### Has One Of Many Of Eloquent Relationship
 ---
```bash

 * Get the user\'s most recent order.
public function latestOrder()
{
    return $this->hasOne(Order::class)->latestOfMany();
}

 * Get the user\'s oldest order.

public function oldestOrder()
{
    return $this->hasOne(Order::class)->oldestOfMany();
}
```

## Many To Many Relationships
---
Many-to-many relations are slightly more complicated than hasOne and hasMany relationships. An example of a many-to-many relationship is a user that has many roles and those roles are also shared by other users in the application. For example, a user may be assigned the role of "Author" and "Editor"; however, those roles may also be assigned to other users as well. So, a user has many roles and a role has many users.

Remember, since a role can belong to many users, we cannot simply place a user_id column on the roles table. This would mean that a role could only belong to a single user. In order to provide support for roles being assigned to multiple users, the role_user table is needed. We can summarize the relationship's table structure like so.

```bash
users
    id - integer
    name - string
 
roles
    id - integer
    name - string
 
role_user // junction/linking/associated table
    user_id - integer
    role_id - integer
```

Many-to-many relationships are defined by writing a method that returns the result of the belongsToMany method.
```bash

class User extends Model
{
     * The roles that belong to the user.
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
```
Once the relationship is defined, you may access the user's roles using the roles dynamic relationship property:
```bash
$user = User::find(1); // for single/primary key data
 
foreach ($user->roles as $role) {
    //
}
to retrieve data ,use
$roles = User::find(1)->roles()->orderBy('name')->get();
```
To determine the table name of the relationship's intermediate table, Eloquent will join the two related model names in alphabetical order. However, you are free to override this convention. You may do so by passing a second argument to the belongsToMany method:
```bash
return $this->belongsToMany(Role::class, 'role_user');
```
In addition to customizing the name of the intermediate table, you may also customize the column names of the keys on the table by passing additional arguments to the belongsToMany method.
```bash
return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
```
#### Defining The Inverse Of The Relationship
---
To define the "inverse" of a many-to-many relationship, you should define a method on the related model which also returns the result of the belongsToMany method.
```bash
class Role extends Model
{
     * The users that belong to the role.
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
```

### Retrieving Intermediate Table Columns
let's assume our User model has many Role models that it is related to. After accessing this relationship, we may access the intermediate table using the pivot attribute on the models:

```bash
$user = User::find(1);
foreach ($user->roles as $role) {
    echo $role->pivot->created_at;
}
```
Notice that each Role model we retrieve is automatically assigned a pivot attribute. This attribute contains a model representing the intermediate table.

By default, only the model keys will be present on the pivot model. If your intermediate table contains extra attributes, you must specify them when defining the relationship:
```bash
return $this->belongsToMany(Role::class)->withPivot('active', 'created_by');
```
If the user has to retrieve the standard timestamps in the fields updated_at, created_at in the attribute of the pivot table which is used along with timestamps.
```bash
Return
$this -> belongs ToMany (Role::class)
->with Timestamps ()
->with Pivot( ‘updated_by’, ‘created_by’);
```
#### Filtering Queries Via Intermediate Table Columns
---
You can also filter the results returned by belongsToMany relationship queries using the wherePivot, wherePivotIn, wherePivotNotIn, wherePivotBetween, wherePivotNotBetween, wherePivotNull, and wherePivotNotNull methods when defining the relationship:
```bash
return $this->belongsToMany(Role::class)
                ->wherePivot('approved', 1);
```
Ordering Queries Via Intermediate Table Columns
```bash
return $this->belongsToMany(Badge::class)
                ->where('rank', 'gold')
                ->orderByPivot('created_at', 'desc');
```
Defining Custom Intermediate Table Models

[to know more about pivot](https://laravel.com/docs/9.x/eloquent-relationships#filtering-queries-via-intermediate-table-columns)

* See The Diagram How Pivote works with the two tables.
Role Table data
![alt text](https://i.ibb.co/zng7Yyr/role-pivote.png "Role Table Data")

* and with The User table
![alt text](https://i.ibb.co/2SjhZPV/user-pivote.png "User Table Data")

* See The intermediate Table on role and user tables
![alt text](https://i.ibb.co/KzRvLtR/user-role-pivote.png "User Table Data")

<!-- This Section will be discussed later -->

<!-- Polymorphic Relation can be added here -->

### Querying Relationship Existence
---
When retrieving model records, you may wish to limit your results based on the existence of a relationship. For example, imagine you want to retrieve all blog posts that have at least one comment. To do so, you may pass the name of the relationship to the has and orHas methods:

```bash
// Retrieve all posts that have at least one comment...
$posts = Post::has('comments')->get();
```
You may also specify an operator and count value to further customize the query:

```bash
// Retrieve all posts that have three or more comments...
$posts = Post::has('comments', '>=', 3)->get();
```
Nested has statements may be constructed using "dot" notation. For example, you may retrieve all posts that have at least one comment that has at least one image:
```bash
// Retrieve posts that have at least one comment with images...
$posts = Post::has('comments.images')->get();
```

If you need even more power, you may use the whereHas and orWhereHas methods to define additional query constraints on your has queries, such as inspecting the content of a comment:
```bash
use Illuminate\Database\Eloquent\Builder;
 
// Retrieve posts with at least one comment containing words like code%...
$posts = Post::whereHas('comments', function (Builder $query) {
    $query->where('content', 'like', 'code%');
})->get();
 
// Retrieve posts with at least ten comments containing words like code%...
$posts = Post::whereHas('comments', function (Builder $query) {
    $query->where('content', 'like', 'code%');
}, '>=', 10)->get();
```
### Querying Relationship Absence
---
When retrieving model records, you may wish to limit your results based on the absence of a relationship. For example, imagine you want to retrieve all blog posts that don't have any comments. To do so, you may pass the name of the relationship to the doesntHave and orDoesntHave methods:
```bash
$posts = Post::doesntHave('comments')->get();
```
If you need even more power, you may use the whereDoesntHave and orWhereDoesntHave methods to add additional query constraints to your doesntHave queries, such as inspecting the content of a comment:
```bash
$posts = Post::whereDoesntHave('comments', function (Builder $query) {
    $query->where('content', 'like', 'code%');
})->get();
```

## PolyMorphic Relation in Eloquent ORM
---
A polymorphic relationship allows the child model to belong to more than one type of model using a single association. For example, imagine you are building an application that allows users to share blog posts and videos. In such an application, a Comment model might belong to both the Post and Video models.

#### The diagram of Polymorphic Relationship
---
* One To One Polymorphic Relationship
![alt text](https://i.ibb.co/1X0hsx6/one-one-polymorphic.png "One To One Polymorphic Relationship")

* One To Many Polymorphic Relationship
![alt Text](https://i.ibb.co/xLwxw08/one-many-polymorphic.png "One To Many Polymorphic Relationship")

![alt Text](https://i.ibb.co/C58f222/many-to-many-rpoly.png "Many To Many Polymorphic Relationship")

![alt Text](https://i.ibb.co/CKN2Vq6/Laravel-Many-to-Many-Polymorphic-Relationship-Example.webp "Many To Many Polymorphic Relationship")




### Many To Many PolyMorphic Relation
----
A large number of Polymorphic relationships are also a little difficult to grasp. For example, if you have posts, videos, and tag tables, you’ll need to connect them all to meet your needs, such as having many tags on each post and the same for videos. In addition, several tags are associated with multiple posts or videos. However, we can easily accomplish this with just one table, “taggables.
[To Know Details ,Click Here](https://www.codesolutionstuff.com/laravel-many-to-many-polymorphic-relationship/)

#### Model Structure
---


### Eager Loading
---
When accessing Eloquent relationships as properties, the related models are "lazy loaded". This means the relationship data is not actually loaded until you first access the property. However, Eloquent can "eager load" relationships at the time you query the parent model.


```bash
<?php

class Book extends Model
{
    /**
     * Get the author that wrote the book.
     */
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
```

```bash
$books = Book::all();
foreach ($books as $book) {
    echo $book->author->name;
}
```
 if we have 25 books, the code above would run 26 queries: one for the original book, and 25 additional queries to retrieve the author of each book.

Thankfully, we can use eager loading to reduce this operation to just two queries. When building a query, you may specify which relationships should be eager loaded using the with method:
```bash
$books = Book::with('author')->get();
foreach ($books as $book) {
    echo $book->author->name;
}

To eager Load several pass an array of relationships to the with method:

$books = Book::with(['author', 'publisher'])->get();
```
#### Nested Eager Load
---
To eager load a relationship's relationships, you may use "dot" syntax. For example, let's eager load all of the book's authors and all of the author's personal contacts:
```bash
$books = Book::with('author.contacts')->get();

To do nested eager Load several pass an array of relationships to the with method:
$books = Book::with([
    'author' => [
        'contacts',
        'publisher',
    ],
])->get();
```
#### Nested Eager Loading morphTo Relationships
----
[to know about this ,Click Here](https://laravel.com/docs/9.x/eloquent-relationships#eager-loading)

#### Eager Loading Specific Columns
---
Eloquent allows you to specify which columns of the relationship you would like to retrieve:
```bash
$books = Book::with('author:id,name,book_id')->get();
```
Note : When using this feature, you should always include the "id" column and any relevant foreign key columns in the list of columns you wish to retrieve.

#### Eager Loading By Default
---
```bash
   // The relationships that should always be loaded.

     protected $with = ['author'];
 
    // Get the author that wrote the book.

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
 ```
If you would like to remove an item from the `$with` property for a single query, you may use the without method:
```bash
$books = Book::without('author')->get();
$books = Book::withOnly('genre')->get(); // withonly is to override with 
```
#### Constraining Eager Loads
---
Sometimes you may wish to eager load a relationship but also specify additional query conditions for the eager loading query. You can accomplish this by passing an array of relationships to the with method where the array key is a relationship name and the array value is a closure that adds additional constraints to the eager loading query:
```bash
$users = User::with(['posts' => function ($query) {
    $query->where('title', 'like', '%code%');
    or it may use
     $query->orderBy('created_at', 'desc');
     or it may use
     $query->where('is_active',1);
}])->get();
```

## Inserting & Updating Related Models for PolyMorphic
---
#### The save Method 
---
Next, let's examine the model definitions needed to build this relationship:

```bash
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 # Comment Model Class
class Comment extends Model
{
    
    # Get the parent commentable model (post or video).
    
    public function commentable()
    {
        return $this->morphTo();
    }
}

# Post MOdel Class
 
class Post extends Model
{
   
     # Get all of the post's comments.
     
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}

 # Video Model Class
class Video extends Model
{
   
     # Get all of the video's comments.
  
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
```

```bash
use App\Models\Comment;
use App\Models\Post;
 
$comment = new Comment(['message' => 'A new comment.']);
 
$post = Post::find(1);
 
$post->comments()->save($comment);
same as 
$comment = $post->comments()->create([
    'message' => 'A new comment.',
]);

or Multiple data saving
$post->comments()->saveMany([
    new Comment(['message' => 'A new comment.']),
    new Comment(['message' => 'Another new comment.']),
]);
same as
$post->comments()->createMany([
    ['message' => 'A new comment.'],
    ['message' => 'Another new comment.'],
]);
```
### Database: Pagination
---
There are several ways to paginate items. The simplest is by using the paginate method on the query builder or an Eloquent query. 

#### Paginating Query Builder Results
---
The paginate method automatically takes care of setting the query's "limit" and "offset" based on the current page being viewed by the user. By default, the current page is detected by the value of the page query string argument on the HTTP request.

```bash
<?php

class UserController extends Controller
{
     * Show all application users.
    public function index()
    {
        return view('user.index', [
            'users' => DB::table('users')->paginate(15)
        ]);
        or
        $users = DB::table('users')->paginate(15);
        return view('user.index',compact('users'));
    }
}
```
#### Simple Pagination for both query builder and Eloquent
----
The paginate method counts the total number of records matched by the query before retrieving the records from the database. This is done so that the paginator knows how many pages of records there are in total. However, if you do not plan to show the total number of pages in your application's UI then the record count query is unnecessary.

Therefore, if you only need to display simple "Next" and "Previous" links in your application's UI, you may use the simplePaginate method to perform a single, efficient query:
```bash
$users = DB::table('users')->simplePaginate(15);
```
### Paginating Eloquent Results
---
You may also paginate Eloquent queries.In that we plan to display 15 records per page. As you can see, the syntax is nearly identical to paginating query builder results:
```bash
$users = User::paginate(15);
```
Of course, you may call the paginate method after setting other constraints on the query, such as where clauses:
```bash
$users = User::where('votes', '>', 100)->paginate(15);
or
$users = User::where('votes', '>', 100)->simplePaginate(15);
or
  $employees = Employee::paginate(8);
      return view('home', compact('employees'));
```
#### Cursor vs. Offset Pagination
---
To illustrate the differences between offset pagination and cursor pagination, let's examine some example SQL queries. Both of the following queries will both display the "second page" of results for a users table ordered by id:
```bash
# Offset Pagination...
select * from users order by id asc limit 15 offset 15;
 
# Cursor Pagination...
select * from users where id > 15 order by id asc limit 15;
```
The cursor pagination query offers the following advantages over offset pagination:

For large data-sets, cursor pagination will offer better performance if the "order by" columns are indexed. This is because the "offset" clause scans through all previously matched data.
For data-sets with frequent writes, offset pagination may skip records or show duplicates if results have been recently added to or deleted from the page a user is currently viewing.


### Displaying Pagination Results
---
once you have retrieved the results, you may display the results and render the page links using Blade:
```bash
<div class="container">
    @foreach ($users as $user)
        {{ $user->name }}
    @endforeach
</div>
 
{{ $users->links() }}

or 
Using the onEachSide method, you may control how many additional links are displayed on each side of the current page within the middle, sliding window of links generated by the paginator:
 </tbody>
        </table>
        {{-- Pagination --}}
        <div class="d-flex justify-content-center">
           {{ $users->onEachSide(5)->links() }}
        </div>
    </div>
</body>
</html>
```
Note : You will notice that the links may not be aesthetically pleasing because Laravel uses Tailwind by default, while this example application uses Bootstrap.

The links method will render the links to the rest of the pages in the result set. Each of these links will already contain the proper page query string variable. Remember, the HTML generated by the links method is compatible with the Tailwind CSS framework.

Now, in your AppServiceProvider boot method, tell Paginator to use Bootstrap, as shown below.
```bash
public function boot()
{
    Paginator::useBootstrap(); 
    or
    Paginator::useBootstrapFive();
    Paginator::useBootstrapFour();
}
```
[To Know More about Pagination from documentation Page](https://laravel.com/docs/9.x/pagination#displaying-pagination-results);
[To Watch The Works from youtube ,CLick Here](https://www.youtube.com/watch?v=LCOaWiGGptQ)











## Mail Sending laravel 8 and 9 version
---
Step on how to send email or mail from localhost using laravel 9 apps:

Step 1 – Install Laravel 9 App.

Step 2 – Configuration SMTP in .env

Step 3 – Create Mailable Class

Step 4 – Add Email Send Route

Step 5 – Create Directory And Blade View

Step 6 – Create Email Controller

Step 7 – Run Development Server

Step 2 :
In first step, you have to add send mail configuration with mail driver, mail host, mail port, mail username, mail password so laravel 8/9 will use those sender configuration for sending email. So you can simply add as like following.
```bash
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=465
MAIL_USERNAME=mygoogle@gmail.com
MAIL_PASSWORD=rrnnucvnqlbsl
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=mygoogle@gmail.com
MAIL_FROM_NAME="${APP_NAME}"
```
Step 3 : 
```bash
php artisan make:mail Mail/NotifyMail
```
Open the file and update the code below.
```bash
<?php

namespace App\Mail\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;

class Websitemail extends Mailable
{
    use Queueable, SerializesModels;
    public $subject,$body,$pdf;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mail_subject,$mail_body,$mail_pdf)
    {
       $this->subject = $mail_subject;
       $this->body = $mail_body;
       $this->pdf = $mail_pdf;
    }


    /**
     * Get the attachments for the message.
     *
     * @return array
     */
  
    public function build()
    {
       return $this->view('mail.mail')->with([
        'subject'=>$this->subject // this is for dynamic subject in  calling the class
       ]);

       or 
       return $this->subject('Test Email')->view('email.email'); // no dynamic Subject

       or 
        return $this->view('mail.invoiceEmail')->attachData($this->pdf, 'customer-invoice.pdf', [
            'mime' => 'application/pdf',
        ]);
    }
}
```
Note : By whatever name you will create an email template. That you want to send. Do not forget to add an email template name in build class of the above created notifymail class.

Step 4:
In next step, we will create email template named mail.blade.php inside resources/views/emails directory. That’s why we have added view name email

Step 4 – Add Send Email Route
```bash
Route::get('send-email', [SendEmailController::class, 'index']);
```
Step 5 – Create Directory And Blade View
```bash
<!DOCTYPE html>
<html>
<head>
 <title>Laravel 9 Send Email Example</title>
</head>
<body>
 
 <h1>This is test mail from Tutsmake.com</h1>
 <p>Laravel 9 send email example</p>
 
</body>
</html> 
```
Step 6
Use The mail in Controller.for example like following. Or With PDF , use the following.
```bash
use Barryvdh\DomPDF\Facade\Pdf;
$pdf = Pdf::loadView('pdf.invoice', compact('billingName', 'date', 'orderId', 'selectedProducts', 'totalPrice'));

//*MAIL SEND
 Mail::to(auth()->user()->email)->send(new Websitemail($subject,$message, $pdf->output())); // if the pdf needs to send.

 // this error handling for if failed while mailing

  if (Mail::failures()) {
           return response()->Fail('Sorry! Please try again latter');
      }else{
           return response()->success('Great! Successfully send in your mail');
         }
```
## Database : Migrations
---
The Laravel Schema facade provides database agnostic support for creating and manipulating tables across all of Laravel's supported database systems. Typically, migrations will use this facade to create and modify database tables and columns.

You may use the make:migration Artisan command to generate a database migration. The new migration will be placed in your database/migrations directory. Each migration filename contains a timestamp that allows Laravel to determine the order of the migrations:
```bash
php artisan make:migration create_flights_table
```
#### Migration Structure
---
A migration class contains two methods: up and down. The up method is used to add new tables, columns, or indexes to your database, while the down method should reverse the operations performed by the up method.
```bash
<?php

return new class extends Migration
{
     * Run the migrations.
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }
     * Reverse the migrations.

    public function down()
    {
        Schema::drop('flights');
    }
};
```
#### Setting The Migration Connection
----
If your migration will be interacting with a database connection other than your application's default database connection, you should set the $connection property of your migration:
```bash

 # The database connection that should be used by the migration.

protected $connection = 'my_db'; // used to connect another database in this table
 # Run the migrations.
public function up()
{
    //
}
```
### Running Migrations
---
To run all of your outstanding migrations, execute the migrate Artisan command:
then migrate the file by 
```bash
php artisan migrate

# or migrating a specific table 
php artisan migrate --path=/database/migrations/fileName.php

# or for refreshing after updating the file
php artisan migrate:refresh --path=/database/migrations/fileName.php
```
If you would like to see which migrations have run thus far, you may use the migrate:status Artisan command:
```bash
php artisan migrate:status
```
Note : this command describes how many files are already migrated and pending to be migrated.

If you would like to see the SQL statements that will be executed by the migrations without actually running them, you may provide the --pretend flag to the migrate command:

```bash
#first : write the commad.
php artisan make:migration create_test_table

#second : write the command to see the sql.
php artisan migrate --pretend

result of the command below
 # create table `test` (`id` bigint unsigned not null auto_increment primary key, `created_at` timestamp null, `updated_at` timestamp null) default character set utf8mb4 collate 'utf8mb4_unicode_ci'
```
Note : this will show the SQL command of table after the making migration file, but not after the migrate.

#### Forcing Migrations To Run In Production
--- 
Some migration operations are destructive, which means they may cause you to lose data. In order to protect you from running these commands against your production database, you will be prompted for confirmation before the commands are executed. To force the commands to run without a prompt, use the --force flag:
```bash
php artisan migrate --force
```
#### Rolling Back Migrations
---
To roll back the latest migration operation, you may use the rollback Artisan command. This command rolls back the last "batch" of migrations, which may include multiple migration files:
```bash
php artisan migrate:rollback
```

You may roll back a limited number of migrations by providing the step option to the rollback command. For example, the following command will roll back the last five migrations:
```bash
php artisan migrate:rollback --step=5
```
The migrate:reset command will roll back all of your application's migrations:
```bash
php artisan migrate:reset
```
##### Roll Back & Migrate Using A Single Command
---
The migrate:refresh command will roll back all of your migrations and then execute the migrate command. This command effectively re-creates your entire database:
```bash
php artisan migrate:refresh
 
# Refresh the database and run all database seeds...
php artisan migrate:refresh --seed
# the following command will roll back and re-migrate the last five migrations:
php artisan migrate:refresh --step=5

# The migrate:fresh command will drop all tables from the database and then execute the migrate command:
php artisan migrate:fresh
 
php artisan migrate:fresh --seed
```
### Database : Tables
---
To create a new database table, use the create method on the Schema facade. The create method accepts two arguments: the first is the name of the table, while the second is a closure which receives a "Blueprint" object that may be used to define the new table:

Dependency Object : In software engineering, dependency injection (Blueprint) is a design pattern in which an object (Blueprint) or function receives other objects ($table) or functions that it (Blueprint) depends on.
```bash
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
 
Schema::create('users', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('email');
    $table->timestamps();
});
```
Note : When creating the table, you may use any of the schema builder's column methods to define the table's columns.

#### Checking For Table / Column Existence
----
You may check for the existence of a table or column using the hasTable and hasColumn methods:
```bash
if (Schema::hasTable('users')) {
    // The "users" table exists...
    Schema::create('users', function (Blueprint $table) {
    $table->id();
    $table->timestamps();
});
}
 
if (Schema::hasColumn('users', 'email')) {
    // The "users" table exists and has an "email" column...
}
```
#### Database Connection & Table Options
---
If you want to perform a schema operation on a database connection that is not your application's default connection, use the connection method.
```bash
Schema::connection('sqlite')->create('users', function (Blueprint $table) {
    $table->id();
});
```
#### Updating Tables
---
To rename an existing database table, use the rename method:
```bash
use Illuminate\Support\Facades\Schema;
 
Schema::rename($from, $to);
# To drop an existing table, you may use the drop or dropIfExists methods:
Schema::drop('users');
 
Schema::dropIfExists('users');
```
### Columns 
---
The schema builder blueprint offers a variety of methods that correspond to the different types of columns you can add to your database tables. Each of the available methods are listed in the table below:
#### bigIncrements() ,id() and increments()
---
The bigIncrements , increments and id method create an auto-incrementing UNSIGNED BIGINT (primary key) equivalent column. increments and id() and method is also same as bigIncrements() with just simple difference in the following.
```bash
# bigIncrements() takes BIGINT(20)
$table->bigIncrements('id'); 
# id() methods takes INT(10)
$table->id();  # not user defined column name.
# same as 
$table->increments('my_id'); # user defined int(10) column name
```
#### bigInteger()
---
The bigInteger method creates a "BIGINT" equivalent column(without primary key , auth-increments and UNSIGNED):
```bash
$table->bigInteger('votes');
```
#### boolean()
---
The boolean method creates a BOOLEAN equivalent column:
```bash
# tinyint(1) for true false checking.
$table->boolean('confirmed');
```
#### dateTime()
---
The dateTime method creates a DATETIME equivalent column with an optional precision (total digits):
```bash
$table->dateTime('created_at', $precision = 0);
```
#### date()
---
The date method creates a DATE equivalent column:
```bash
$table->date('created_at');
```
#### Difference Date, Datetime and timestamp

---
DATE : The DATE type is used for values with a date part but no time part. MySQL retrieves and displays DATE values in 'YYYY-MM-DD' format. The supported range is '1000-01-01' to '9999-12-31'.

DATETIME : The DATETIME type is used for values that contain both date and time parts. MySQL retrieves and displays DATETIME values in 'YYYY-MM-DD hh:mm:ss' format. The supported range is '1000-01-01 00:00:00' to '9999-12-31 23:59:59'.

TIMESTAMP : The TIMESTAMP data type is used for values that contain both date and time parts. TIMESTAMP has a range of '1970-01-01 00:00:01' UTC to '2038-01-19 03:14:07' UTC.

#### decimal()
---
The decimal method creates a DECIMAL equivalent column with the given precision (total digits) and scale (decimal digits):
```BASH
$table->decimal('amount', $precision = 8, $scale = 2); 
# Output decimal(8,2) means amount is 232452.50
```

NOTE : 
```bash
[Full Documentation of Database all data types](https://zetcode.com/mysql/datatypes/)

or follow the link below.

https://www.w3resource.com/mysql/mysql-data-types.php
```
Float has 32 bit (4 bytes) with 8 places accuracy.
Double has 64 bit (8 bytes) with 16 places accuracy.

#### enum()
---
The enum method creates a ENUM equivalent column with the given valid values:
```bash
$table->enum('difficulty', ['easy', 'hard']);
```

#### float()
---
The float method creates a FLOAT equivalent column with the given precision (total digits) and scale (decimal digits):
```bash
$table->float('amount', 8, 2);
```

#### foreignId()
---
The foreignId method creates an UNSIGNED BIGINT equivalent column:
```bash
$table->foreignId('user_id');
```

#### foreignIdFor()
---
The foreignIdFor method adds a {column}_id UNSIGNED BIGINT equivalent column for a given model class:
```bash
$table->foreignIdFor(User::class);

```

#### constrained()
---
Create a foreign key constraint on this column referencing the "id" column of the conventionally related table.It will show the record list in the column of the related table.
```bash
$table->foreignIdFor(User::class)->constrained();
```
#### json()
---
The json method creates a JSON equivalent column:
```bash
$table->json('options'); # longtext data type
```

#### longText()
---
The longText method creates a LONGTEXT equivalent column:

```bash
$table->longText('description');
```

#### mediumInteger()
The mediumInteger method creates a MEDIUMINT equivalent column:
```bash
$table->mediumInteger('votes');
```

#### mediumText()
---
The mediumText method creates a MEDIUMTEXT equivalent column:
```bash
$table->mediumText('description');
```

#### morphs()
---
The morphs method is a convenience method that adds a {column}_id UNSIGNED BIGINT equivalent column and a {column}_type VARCHAR equivalent column.


This method is intended to be used when defining the columns necessary for a polymorphic Eloquent relationship. In the following example, taggable_id and taggable_type columns would be created:
```bash
$table->morphs('taggable');
```

#### rememberToken()
---
The rememberToken method creates a nullable, VARCHAR(100) equivalent column that is intended to store the current "remember me" authentication token:
```bash
$table->rememberToken();
```

#### set()
---
The set method creates a SET equivalent column with the given list of valid values:
```bash
$table->set('flavors', ['strawberry', 'vanilla']);
```

#### smallIncrements()
---
The smallIncrements method creates an auto-incrementing UNSIGNED SMALLINT equivalent column as a primary key:
```bash
$table->smallIncrements('id');
```

#### smallInteger()
---
The smallInteger method creates a SMALLINT equivalent column:
```bash
$table->smallInteger('votes');
```

#### softDeletes()
---
The softDeletes method adds a nullable deleted_at TIMESTAMP equivalent column with an optional precision (total digits). This column is intended to store the deleted_at timestamp needed for Eloquent's "soft delete" functionality:
```bash
$table->softDeletes($column = 'deleted_at', $precision = 0);
```

#### string()
---
The string method creates a VARCHAR equivalent column of the given length:
```bash
$table->string('name', 100);
```

#### text()
---
The text method creates a TEXT equivalent column:
```bash
$table->text('description');
```

#### time()
---
The time method creates a TIME equivalent column with an optional precision (total digits):
```bash
$table->time('sunrise', $precision = 0);
```

#### timestamp()
---
The timestamp method creates a TIMESTAMP equivalent column with an optional precision (total digits):
```bash
$table->timestamp('added_at', $precision = 0);
```

#### timestamps()
---
The timestamps method creates created_at and updated_at TIMESTAMP equivalent columns with an optional precision (total digits):
```bash
$table->timestamps($precision = 0);
```

#### tinyIncrements()
---
The tinyIncrements method creates an auto-incrementing UNSIGNED TINYINT equivalent column as a primary key:
```bash
$table->tinyIncrements('id');
```

#### tinyInteger()
---
The tinyInteger method creates a TINYINT equivalent column:
```bash
$table->tinyInteger('votes');
```

#### tinyText()
---
The tinyText method creates a TINYTEXT equivalent column:
```bash
$table->tinyText('notes');
```

#### unsignedBigInteger()
---
The unsignedBigInteger method creates an UNSIGNED BIGINT equivalent column:
```bash
$table->unsignedBigInteger('votes');
```

#### unsignedDecimal()
---
The unsignedDecimal method creates an UNSIGNED DECIMAL equivalent column with an optional precision (total digits) and scale (decimal digits):
```bash
$table->unsignedDecimal('amount', $precision = 8, $scale = 2);
```

#### unsignedInteger()
---
The unsignedInteger method creates an UNSIGNED INTEGER equivalent column:
```bash
$table->unsignedInteger('votes');
```

#### unsignedMediumInteger()
---
The unsignedMediumInteger method creates an UNSIGNED MEDIUMINT equivalent column:
```bash
$table->unsignedMediumInteger('votes');
```

#### unsignedSmallInteger()
---
The unsignedSmallInteger method creates an UNSIGNED SMALLINT equivalent column:
```bash
$table->unsignedSmallInteger('votes');
```

#### unsignedTinyInteger()
---
The unsignedTinyInteger method creates an UNSIGNED TINYINT equivalent column:
```bash
$table->unsignedTinyInteger('votes');
```
### Indexes
---
The Laravel schema builder supports several types of indexes. The following example creates a new email column and specifies that its values should be unique. To create the index, we can chain the unique method onto the column definition:

```bash
  $table->string('email')->unique();
```
You may even pass an array of columns to an index method to create a compound (or composite) index:
```bash
$table->index(['account_id', 'created_at']);
```
you may pass a second argument to the method to specify the index name yourself:
```bash
$table->unique('email', 'unique_email'); # Custom Index Name
```
to drop index
```bash
 $table->dropIndex(['state']);
```
### Foreign Key Constraints
---
Laravel also provides support for creating foreign key constraints, which are used to force referential integrity at the database level. For example, let's define a user_id column on the posts table that references the id column on a users table:
```bash
 $table->unsignedBigInteger('user_id');
 $table->string('name');
 $table->foreign('user_id')->references('id')->on('users');
```
But in XML System

```bash
Post XML data using JavaScript
$.ajax({
  type: "POST",
  url: "https://reqbin.com/echo/post/xml",
  data: "", 
  contentType: "text/xml",
  dataType: "text",
  success: function (result) {
    console.log(result);
  },
  error: function (result, status) {
    console.log(result);
  }
});
```
When using the foreignId method to create your column, the example above can be rewritten like so:

```bash
$table->foreignId('user_id')->constrained();
```
If your table name does not match Laravel's conventions, you may specify the table name by passing it as an argument to the constrained method:
```bash
    $table->foreignId('user_id')->constrained('users');
```
You may also specify the desired action for the "on delete" and "on update" properties of the constraint:
```bash
$table->foreignId('user_id')
      ->constrained()
      ->onUpdate('cascade')
      ->onDelete('cascade');
```
#### Dropping Foreign Keys
---
Foreign key constraints use the same naming convention as indexes. In other words, the foreign key constraint name is based on the name of the table and the columns in the constraint, followed by a "_foreign" suffix:

```bash
$table->dropForeign('posts_user_id_foreign');
```
Alternatively, you may pass an array containing the column name that holds the foreign key to the dropForeign method. The array will be converted to a foreign key constraint name using Laravel's constraint naming conventions:
```bash
$table->dropForeign(['user_id']);
```
### Database: Seeding
---
It generates fake or dummy data for you and incorporate the data in the database table. With it, you can simultaneously create a single seeder or multiple seeders. You can test your laravel app with the data, which seems real to some extent.

Laravel includes the ability to seed your database with data using seed classes. All seed classes are stored in the database/seeders directory. By default, a DatabaseSeeder class is defined for you. From this class, you may use the call method to run other seed classes, allowing you to control the seeding order.

#### Writing Seeder
---
To generate a seeder, execute the make:seeder Artisan command.
```bash
php artisan make:seeder UserSeeder
```
As an example, let's modify the default DatabaseSeeder class and add a database insert statement to the run method:
```bash
class DatabaseSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
```

#### Using Model Factories
---
you can use model factories to conveniently generate large amounts of database records.
For example, let's create 50 users that each has one related post:
```bash
public function run()
{
    User::factory()
            ->count(50)
            ->hasPosts(1)
            ->create();
}
```
#### Calling Additional Seeders
---
Within the DatabaseSeeder class, you may use the call method to execute additional seed classes.
The call method accepts an array of seeder classes that should be executed:
```bash
public function run()
{
    $this->call([
        UserSeeder::class,
        PostSeeder::class,
        CommentSeeder::class,
    ]);
}
```
#### Running Seeders
---
You may execute the db:seed Artisan command to seed your database. By default, the db:seed command runs the Database\Seeders\DatabaseSeeder class, which may in turn invoke other seed classes. However, you may use the --class option to specify a specific seeder class to run individually:
```bash
php artisan db:seed # all seeder files running 
php artisan db:seed --class=UserSeeder # Specific single seeder file running
```
You may also seed your database using the migrate:fresh command in combination with the --seed option, which will drop all tables and re-run all of your migrations. This command is useful for completely re-building your database. The --seeder option may be used to specify a specific seeder to run:
```bash
php artisan migrate:fresh seed # all seeder files running 
php artisan  migrate:fresh --seed --seeder=UserSeeder # Specific single seeder file running
```
To force the seeders to run without a prompt, use the --force flag:
```bash
php artisan db:seed --force
```
### Database : Redis
---
* What is Redis : 
Redis is a NoSQL database which follows the principle of key-value store. The key-value store provides ability to store some data called a value, inside a key. You can recieve this data later only if you know the exact key used to store it.


Redis is a flexible, open-source (BSD licensed), in-memory data structure store, used as database, cache, and message broker. Redis is a NoSQL database so it facilitates users to store huge amount of data without the limit of a Relational database.

Redis supports various types of data structures like strings, hashes, lists, sets, sorted sets, bitmaps, hyperloglogs and geospatial indexes with radius queries.

* Redis Architecture : 
There are two main processes in Redis architecture.
1. Redis Client.
2. Redis Server.

 These client and server can be on same computer or two different computers.

Redis Diagram.

![alt text](https://static.javatpoint.com/redis/images/what-is-redis.png "Redis client and server connection").

Diagram of How Redis works from cache.
![alt text](https://static.javatpoint.com/redis/images/what-is-redis1.png "Redis client and server connection")

Redis server is used to store data in memory . It controls all type of management and forms the main part of the architecture. You can create a Redis client or Redis console client when you install Redis application or you can use.

#### Features of Redis :
---
Following is the list of main features of Redis:

Speed: Redis stores the whole dataset in primary memory that's why it is extremely fast. It loads up to 110,000 SETs/second and 81,000 GETs/second can be retrieved in an entry level Linux box. Redis supports Pipelining of commands and facilitates you to use multiple values in a single command to speed up communication with the client libraries.

Persistence: While all the data lives in memory, changes are asynchronously saved on disk using flexible policies based on elapsed time and/or number of updates since last save. Redis supports an append-only file persistence mode. Check more on Persistence, or read the AppendOnlyFileHowto for more information.


Data Structures: Redis supports various types of data structures such as strings, hashes, sets, lists, sorted sets with range queries, bitmaps, hyperloglogs and geospatial indexes with radius queries.

Atomic Operations: Redis operations working on the different Data Types are atomic, so it is safe to set or increase a key, add and remove elements from a set, increase a counter etc.

Supported Languages: Redis supports a lot of languages such as ActionScript, C, C++, C#, Clojure, Common Lisp, D, Dart, Erlang, Go, Haskell, Haxe, Io, Java, JavaScript (Node.js), Julia, Lua, Objective-C, Perl, PHP, Pure Data, Python, R, Racket, Ruby, Rust, Scala, Smalltalk and Tcl.

Master/Slave Replication: Redis follows a very simple and fast Master/Slave replication. It takes only one line in the configuration file to set it up, and 21 seconds for a Slave to complete the initial sync of 10 MM key set on an Amazon EC2 instance.

Sharding: Redis supports sharding. It is very easy to distribute the dataset across multiple Redis instances, like other key-value store.


Portable: Redis is written in ANSI C and works in most POSIX systems like Linux, BSD, Mac OS X, Solaris, and so on. Redis is reported to compile and work under WIN32 if compiled with Cygwin, but there is no official support for Windows currently.

#### Redis Get and Set Methods
---
Get: This gets a key example blogs from the local cache and return its value. The Get method only stores strings and will return an error—the key stores hashes or others.

Set: This method sets a key example blogs to hold string values. If a key already exists, then it will override the value(s) of that key, regardless of its type, unless instructed otherwise.

we need to install the predis package in our application using composer prior to using Redis on our application. Predis is a Redis client written entirely in PHP and does not require any additional extensions. Run the following command on your terminal to install Predis:

Installing Redis : 
```bash
composer require predis/predis
```
When the installation is complete, we can find our Redis configuration settings in config/database.php. In the file, you will see a redis array containing the Redis server. By default, the client is set to phpredis, and since predis is being used in this tutorial, the client will be changed to predis:
```bash
'redis' => [

  'client' => env('REDIS_CLIENT', 'predis'),

  'options' => [
      'cluster' => env('REDIS_CLUSTER', 'redis'),
      'prefix' => env('REDIS_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_').'_database_'),
  ],

  'default' => [
      'url' => env('REDIS_URL'),
      'host' => env('REDIS_HOST', '127.0.0.1'),
      'password' => env('REDIS_PASSWORD', null),
      'port' => env('REDIS_PORT', '6379'),
      'database' => env('REDIS_DB', '0'),
  ],

],
```
You can modify the default settings to your own custom settings depending on your URL and add a password, but for this tutorial, we won’t be doing that.

After that is done, go ahead to register your REDIS_CLIENT in the .env file:

REDIS_CLIENT=predis
Seeding
I’ve gone ahead and created a database connection in my .env file and seeded a couple of blogs in the database.

Note: This is not a compulsory step but rather a maneuver to avoid going the long route to make a create request.

Use the command below to create a seeder. Then, add a couple of blogs, which we run with the artisan command to seed the data:

php artisan make:seeder BlogSeeder
This will create a new BlogSeeder in your database folder. Next, we will add a couple of blogs:
```bash
DB::table('blogs')->insert([
          'title' => 'First blog',
          'sub_header' => 'This is the first sub header',
          'content' => 'BLOG_CONTENT'
      ]);
      ```
...
Then, we run the artisan command to seed the data to the database under the blogs table:
```bash
php artisan db:seed --class=BlogSeeder
```
Fetching : 
To fetch a blog from the database, we create a blog controller and add a function to fetch a blog using id from the database. On the first request, the blog will be fetched from the database and cached in Redis. However, on subsequent requests, the blog will be retrieved directly from Redis and formatted in JSON.

First, we will create a new controller using the following command:
```bash
php artisan make:controller BlogController
```
Then, we add our function to get all blogs:

```bash
use App\Models\Blog;
use Illuminate\Support\Facades\Redis;

public function index($id) {

  $cachedBlog = Redis::get('blog_' . $id);


  if(isset($cachedBlog)) {
      $blog = json_decode($cachedBlog, FALSE);

      return response()->json([
          'status_code' => 201,
          'message' => 'Fetched from redis',
          'data' => $blog,
      ]);
  }else {
      $blog = Blog::find($id);
      Redis::set('blog_' . $id, $blog);

      return response()->json([
          'status_code' => 201,
          'message' => 'Fetched from database',
          'data' => $blog,
      ]);
  }
}
```
In the above code, we are first checking Redis for the key with blog_ + id and returning it in JSON format if it exists. If the key has not been set, then we go to the database, get the key, and set it in Redis using blog_ + id.

Next, we create a route in routes/web.php that our API can interact with when used in Postman. This route will point to our BlogController and, specifically, our function that is fetching the blog:
```bash
Route::get('/blogs/{id}', 'BlogController@index');
```

* Updating : 
In this process, we will get a single blog and update it in the database. When this is done, we will look up the key in Redis and delete it, and then create a new key with the id of the updated blog.

Before we proceed, I commented out \App\Http\Middleware\VerifyCsrfToken::class, in the app/http/kernel.php file to disable CSRF verification. You shouldn’t do this in an application ready for production, as this is necessary for the protection of the application routes. You can read more about CSRF verification and its usefulness here.

First, we create our update function in the BlogController:
```bash
public function update(Request $request, $id) {

  $update = Blog::findOrFail($id)->update($request->all());

  if($update) {

      // Delete blog_$id from Redis
      Redis::del('blog_' . $id);

      $blog = Blog::find($id);
      // Set a new key with the blog id
      Redis::set('blog_' . $id, $blog);

      return response()->json([
          'status_code' => 201,
          'message' => 'User updated',
          'data' => $blog,
      ]);
  }
}
```

In the above code, we got the id of the blog, updated it in the database, and then deleted the key with blog_ + id. After the key is deleted, we then fetch the blog from the database using the id and create a new key in Redis.

After this is done, we can create our route:
```bash
Route::post('/blogs/update/{id}', 'BlogController@update');
```
* Delete : 
For the last part, we will delete a blog from the database and then delete the key from Redis. First, add the delete function:
```bash
public function delete($id) {

  Blog::findOrFail($id)->delete();
  Redis::del('blog_' . $id);

  return response()->json([
      'status_code' => 201,
      'message' => 'Blog deleted'
  ]);
}
```
This will get the id and delete the blog from the database. Then, it will delete the key from Redis. After adding our function, we can then create a route.
```bash
Route::delete('/blogs/delete/{id}', 'BlogController@delete');
```
Notes : The redis crud source collected from this [LINK](https://www.honeybadger.io/blog/laravel-caching-redis/)

### To Learn Redis with Practical Example
### [Follow This steps to See the How Redis works in Laravel](https://youtu.be/3mAX8pjAtyU)

### Eloquent: Collections
---
Defining Laravel collections:

Laravel collections can be regarded as modified versions of PHP arrays. They are located in the Illuminate\Support\Collection class directory and provide a wrapper to work with data arrays.

```bash
use App\Models\User;
 
$users = User::where('active', 1)->get();
 
foreach ($users as $user) {
    echo $user->name;
}
```
However, as previously mentioned, collections are much more powerful than arrays and expose a variety of map / reduce operations that may be chained using an intuitive interface. For example, we may remove all inactive models and then gather the first name for each remaining user:
```bash
$names = User::all()->reject(function ($user) {
    return $user->active === false;
})->map(function ($user) {
    return $user->name;
});
```
The Illuminate\Support\Collection class provides a fluent, convenient wrapper for working with arrays of data. For example, check out the following code. We'll use the collect helper to create a new collection instance from the array, run the strtoupper function on each element, and then remove all empty elements:
```bash
$collection = collect(['taylor', 'abigail', null])->map(function ($name) {
    return strtoupper($name);
})->reject(function ($name) {
    return empty($name);
});
```
#### Creating Collections
---
As mentioned above, the collect helper returns a new Illuminate\Support\Collection instance for the given array. So, creating a collection is as simple as:
```bash
$collection = collect([1, 2, 3]); # collect() is just for example function to check collection methods
by model 
User::all()->toJson();
```
#### Available Methods
---
For the majority of the remaining collection documentation, we'll discuss each method available on the Collection class. Remember, all of these methods may be chained to fluently manipulate the underlying array. Furthermore, almost every method returns a new Collection instance, allowing you to preserve the original copy of the collection when necessary:
```bash
all
average
avg
chunk
chunkWhile
collapse
collect
combine
concat
contains
containsOneItem
containsStrict
count
countBy
crossJoin
dd
diff
diffAssoc
diffKeys
doesntContain
dump
duplicates
duplicatesStrict
each
eachSpread
every
except
filter
first
firstOrFail
firstWhere
flatMap
flatten
flip
forget
forPage
get
groupBy
has
hasAny
implode
intersect
intersectByKeys
isEmpty
isNotEmpty
join
keyBy
keys
last
lazy
macro
make
map
mapInto
mapSpread
mapToGroups
mapWithKeys
max
median
merge
mergeRecursive
min
mode
nth
only
pad
partition
pipe
pipeInto
pipeThrough
pluck
pop
prepend
pull
push
put
random
range
reduce
reduceSpread
reject
replace
replaceRecursive
reverse
search
shift
shuffle
skip
skipUntil
skipWhile
slice
sliding
sole
some
sort
sortBy
sortByDesc
sortDesc
sortKeys
sortKeysDesc
sortKeysUsing
splice
split
splitIn
sum
take
takeUntil
takeWhile
tap
times
toArray
toJson
transform
undot
union
unique
uniqueStrict
unless
unlessEmpty
unlessNotEmpty
unwrap
value
values
when
whenEmpty
whenNotEmpty
where
whereStrict
whereBetween
whereIn
whereInStrict
whereInstanceOf
whereNotBetween
whereNotIn
whereNotInStrict
whereNotNull
whereNull
wrap
zip
```
```bash
   $sidebar = new sidebarAdvertisement();
     dd($sidebar->all());
      $sidebar->dd();   # returns "select * from `sidebar_advertisements`"
$sidebar_ad->except([4,5]);
  $sidebar_ad->count();

```
#### [Click Here To Know More About Collection](https://laravel.com/docs/9.x/collections)

### Eloquent: Mutators, Accessors & Casting
---

laravel mutator and accessor also called setter and getter method. These two concepts are used when we get db value by model and save values throw modal."Accessors create a custom attribute on the object which you can access as if it were a database column."
"Mutator is a way to change data when it is going set into database table.".

Attribute:
Each methods of model or Column of Model Table is an attribute.

Mutators:
Mutators are used to modify the value of an attribute before it is stored in the database. To define a mutator, you need to create a method with the naming convention "set{AttributeName}Attribute". For example, if you have an attribute named "email", you can define a mutator for it like this:

```bash
public function setEmailAttribute($value) :  Attribute //
{
    $this->attributes['email'] = strtolower($value);
}

This mutator converts the email value to lowercase before storing it in the database.
# or

 protected function dateOfBirth(): Attribute  # date_of_birth , updated_at updatedAt , subCategory = sub_category
    {
        return new Attribute(
            get: fn ($value) =>  Carbon::parse($value)->format('m/d/Y'), # 12/05/2023
            set: fn ($value) =>  Carbon::parse($value)->format('Y-m-d'), # 2023-12-05
        );
    }

    # In Controller 
     public function create()
    {
        $input = [
            'name' => 'Hardik',
            'email' => 'hardik2@gmail.com',
            'password' => bcrypt('123456'),
            'date_of_birth' => '07/21/1994'
        ];
        $user = User::create($input);
        dd($user);
    }

 # or 

 class Product extends Model
{
    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = $value * 100;
    }
}

$product = new Product;
$product->price = 10; # 10 * 100
$product->save();
```

Accessors:
Accessors are used to retrieve the value of an attribute after it has been retrieved from the database. To define an accessor, you need to create a method with the naming convention "get{AttributeName}Attribute". For example, if you have an attribute named "full_name", you can define an accessor for it like this:

```bash
public function getFullNameAttribute()
{
    return "{$this->first_name} {$this->last_name}";
}

This accessor concatenates the first_name and last_name attributes to create a full name.
 Retrieve Data.
 $user = new User();
 $user->full_name;  # full_name from getFullNameAttribute (full_name) method
```
Attribute Casting:
Attribute casting allows you to define how a model attribute should be cast to and from a certain data type. This is useful when you want to ensure that the attribute is always of a certain data type, such as an integer or boolean. To define attribute casting, you need to define a protected $casts property on your model class. For example
```bash
protected $casts = [
    'is_admin' => 'boolean',
    'age' => 'integer',
   'created_at' => 'datetime:Y-m-d',
    'updated_at' => 'datetime',
];
```
Notes : This defines the is_admin attribute as a boolean and the age attribute as an integer. This ensures that any value stored in these attributes will be cast to the appropriate data type when retrieved from the database.


Full Example of Mutator, Accessors and Attribute Casting.
```bash
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $casts = [
        'is_admin' => 'boolean',
        'age' => 'integer',
        'address' => 'array',
        'phone_number' => 'string',
    ];

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }


    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower($value);
    }

    public function setAgeAttribute($value)
    {
        $this->attributes['age'] = $value < 0 ? 0 : $value;
    }
}

Notes : getter Method/get attribute for retrieving data from db table is called mutator.setter Method/set attribute for storing data is called accessor.
cast is data type by which system data is stored in column/attribute.
```

### Eloquent: API Resources
---
* What does API Resources mean?

**API Resources** acts as a transformation layer that sits between our Eloquent models and the JSON responses that are actually returned by our API.

**API resources** present a way to easily transform our models into JSON responses.

The Steps to use API Resource

1. create a resource class
```bash
php artisan make:resource UserResource
```
2. 
create a resource collection using either
```bash
php artisan make:resource Users --collection
php artisan make:resource UserCollection
```
3. Creating the book resource

Before we move on to create theBooksController, let’s create a book resource class. We’ll make use of the artisan command make:resource to generate a new book resource class. By default, resources will be placed in the app/Http/Resources directory of our application.

```bash
$ php artisan make:resource BookResource
```

Once that is created, let’s open it and update the toArray() method as below:

```bash
app/Http/Resources/BookResource.php
 public function toArray($request)
    {
      return [
        'id' => $this->id,
        'title' => $this->title,
        'description' => $this->description,
        'created_at' => (string) $this->created_at,
        'updated_at' => (string) $this->updated_at,
        'user' => $this->user,
        'ratings' => $this->ratings,
      ];
    }
```
As the name suggests, this will transform the resource into an array.

We can access the model properties directly from the $this variable.

Now we can make use of the BookResource class in our controller.

4. Creating the book controller

Let’s create the BookController. For this, we’ll make use of the API controller generation feature

```bash
$ php artisan make:controller BookController --api
```

Next, open it up and paste the following code into it:

```bash
app/Http/Controllers/BookController.php
    use App\Book;
    use App\Http\Resources\BookResource;

// ...

    public function index()
    {
      return BookResource::collection(Book::with('ratings')->paginate(25));
    }

    public function store(Request $request)
    {
      $book = Book::create([
        'user_id' => $request->user()->id,
        'title' => $request->title,
        'description' => $request->description,
        'comments' => CommentResource::collection($this->comments), # included a relationship
      ]);

      return new BookResource($book);
    }

    public function show(Book $book) # Book::findOrFail(primary_key); primary_key = id Route::get('show-book/{book}')

    {
      return new BookResource($book);
    }

    public function update(Request $request, Book $book)
    {
      // check if currently authenticated user is the owner of the book
      if ($request->user()->id !== $book->user_id) {
        return response()->json(['error' => 'You can only edit your own books.'], 403);
      }

      $book->update($request->only(['title', 'description']));

      return new BookResource($book);
    }

    public function destroy(Book $book)
    {
      $book->delete();

      return response()->json(null, 204);
    }
```


**Difference between Normal Controller and API Resource:**

A normal controller typically directly fetches data from the database and returns it as a JSON or HTML response. It might not follow a consistent structure and might expose internal data structures to the outside world.

On the other hand, using an API resource helps in:

1. **Data Transformation:** You can define exactly how the data should be presented, making it consistent and structured.
2. **Customization:** You can control which fields to include or exclude in the API response.
3. **Relationships:** You can easily include related data along with the main resource data.
4. **Reusability:** Resources can be reused across multiple endpoints, ensuring a consistent data format.
5. **Versioning:** It makes versioning of your API responses easier by encapsulating the data transformation logic.

In summary, API resources offer a more structured and controlled way to expose your data, especially in an API context, compared to a traditional controller approach.

**Functionalities :**

The *index()* method fetches and returns a list of the books that have been added.

The *store()* method creates a new book with the ID of the currently authenticated user along with the details of the book, and persists it to the database. Then we return a book resource based on the newly created book.

The *show()* method accepts a Book model (we are using route model binding here) and simply returns a book resource based on the specified book.

The *update()* method first checks to make sure the user trying to update a book is the owner of the book . If the user is not the owner of the book, we return an appropriate error message and set the HTTP status code to 403. Otherwise we update the book with the new details and return a book resource with the updated details.

Lastly, the *destroy()* method deletes a specified book from the database. Since the specified book has been deleted and no longer available, we set the HTTP status code of the response returned to 204.





### ELOQUENT : Serialization

In Laravel, Eloquent is the built-in ORM (Object-Relational Mapping) that simplifies database interactions by allowing you to work with database records as if they were regular PHP objects. Eloquent provides a powerful and intuitive way to perform database operations, including retrieving, storing, updating, and deleting records.

Eloquent serialization is a feature that allows you to easily convert Eloquent model instances into different data formats, such as JSON or arrays, so that you can send them as responses in your API or use them in other parts of your application.

Let's explain Eloquent serialization step by step for beginner-level developers:

1. **Understanding Eloquent Models**:
   - In Laravel, each database table is typically associated with an Eloquent model. These models represent the structure and behavior of your data.

2. **Serializing Data**:
   - Serialization is the process of converting a complex data structure, like an Eloquent model, into a format that can be easily represented or transmitted. This format is often a JSON or array representation of the data.

3. **Eloquent Serialization Methods**:
   - Eloquent provides two primary methods for serializing data: `toArray()` and `toJson()`.
     - `toArray()`: This method converts the Eloquent model instance and its related data into an array.
     - `toJson()`: This method converts the Eloquent model instance and its related data into a JSON string.

4. **Basic Usage**:
   - Let's say you have an Eloquent model representing a "User" and you want to serialize a user's data:
   
   ```php
   // Fetch a user record
   $user = User::find(1);

   // Convert the user model to an array
   $userArray = $user->toArray();

   // Convert the user model to JSON
   $userJson = $user->toJson();
   ```

   Now, `$userArray` will contain the user's data as an associative array, and `$userJson` will contain the user's data as a JSON string.

5. **Customizing Serialization**:

   - You can customize how your models are serialized by defining a `toArray()` method in your Eloquent model. This method allows you to specify which attributes should be included and how they should be formatted. For example:

   ```php
   class User extends Model
   {
       public function toArray()
       {
           return [
               'id' => $this->id,
               'name' => $this->name,
               'email' => $this->email,
               // Add more attributes as needed
           ];
       }
   }
   ```

6. **Related Models and Eager Loading**:
   - When you have relationships between models (e.g., a User has many Posts), Eloquent allows you to easily include related data in the serialized output using eager loading. This helps avoid the N+1 query problem. For example:

   ```php
   $userWithPosts = User::with('posts')->find(1);

   // Serialize the user with their posts
   $userArrayWithPosts = $userWithPosts->toArray();
   ```

   In this example, the `posts` relationship is eager loaded, so the serialized user data will also include an array of their posts.

7. **Response Formatting**:
   - You can use the serialized data to send responses in your API controllers, making it easy to return data in a consistent format.

   ```php
   public function getUserData($userId)
   {
       $user = User::find($userId);
       return response()->json($user->toArray());
   }
   ```

   This code fetches a user by ID and returns their data as a JSON response.

## Eloquent: Factories
---
In Laravel, factories are used to generate fake data for your application's database records during development and testing. They are especially useful when you need to populate your database with sample data for testing purposes or when you want to quickly create records for use in your application.

**[Faker all Methods and attributes Link](https://github.com/fzaninotto/Faker)**

1. First, make sure you have a `Product` model created. If you don't have one, you can create it using the following command:

```bash
php artisan make:model Product
php artisan make:migration create_table_products

public function up()
{
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->text('description');
        $table->decimal('price', 10, 2);
        $table->integer('quantity');
        $table->string('brand');
        $table->string('manufacturer');
        $table->string('category');
        $table->string('color');
        $table->string('size');
        $table->string('weight');
        $table->string('material');
        $table->string('condition');
        $table->boolean('is_available')->default(true);
        $table->string('image_path')->nullable();
        $table->timestamps();
    });
}

```

2. Next, create a factory for the `Product` model. You can generate a factory using the following command:

```bash
php artisan make:factory ProductFactory
```

3. Open the generated `ProductFactory.php` file located in the `database/factories` directory and define your factory. Here's an example factory file for the `Product` model:

```php
// database/factories/ProductFactory.php

use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\User; // Assuming you have a User model for the seller

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(3),
        'email' => $faker->unique()->safeEmail, // Generates a unique email address
        'password' => bcrypt('password'), // Sets a static password (useful for testing)
        'description' => $faker->paragraph(4),
        'price' => $faker->randomFloat(2, 10, 1000), // Example: 256.75 // random floating-point number between $10 and $1000.random floating-point number between $10 and $1000.
        'quantity' => $faker->numberBetween(1, 100),
        'seller_id' => User::inRandomOrder()->first()->id, // Assign a random seller from the User model
        'category' => $faker->randomElement(['Electronics', 'Clothing', 'Home & Kitchen', 'Books', 'Toys']), // Category::inRandoOrder()->first()->id 
        'brand' => $faker->word,
        'rating' => $faker->randomFloat(1, 1, 5),
        'seller' => $faker->company,
        'image' => $faker->imageUrl(400, 400, 'product', true),
        'color' => $faker->colorName,
        'size' => $faker->randomElement(['S', 'M', 'L', 'XL']),
        'weight' => $faker->randomFloat(2, 0.1, 100),
        'material' => $faker->word,
        'condition' => $faker->randomElement(['New', 'Used', 'Featured']),
        'is_available' => $faker->boolean(90), // 90% chance of being available
        'address' => $faker->address, // Example: "123 Main St, Suite 456, New York, NY 10001"
        'email' => $faker->email, // Example: "user@example.com"
        'username' => $faker->unique()->userName, // Generates a unique username
        'created_at' => $faker->dateTime, // Example: "2023-09-15 14:30:00"
        'is_active' => $faker->boolean, // Example: true or false
        'bio' => $faker->text, // $faker->text(200) // Generates random text
        'website' => $faker->url, // Generates a random URL
        'phone_number' => $faker->phoneNumber, // Generates a random phone number
        'address' => $faker->address, // Generates a random address
        'city' => $faker->city, // Generates a random city
        'state' => $faker->state, // Generates a random state
        'zip_code' => $faker->postcode, // Generates a random postal code
        'country' => $faker->country, // Generates a random country name
        'latitude' => $faker->latitude, // Generates a random latitude value
        'longitude' => $faker->longitude, // Generates a random longitude value
        'remember_token' => str_random(10), // Generates a random 10-character string
        'created_at' => now(),
        'created_at' => $faker->dateTimeBetween('-2 years', 'now'), // Generates a random creation date.
        'updated_at' => $faker->dateTimeThisDecade,
    ];
});

```

4. To use this factory, you can use Laravel's Seeder to populate your database with sample product records. Create a seeder using the following command:

```bash
php artisan make:seeder ProductSeeder
```

5. Open the generated `ProductSeeder.php` file in the `database/seeders` directory and use the factory to create product records. For example:

```php
// database/seeders/ProductSeeder.php

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Create 50 product records using the ProductFactory  => Product::factory()
        Product::factory()->count(50)->create();
    }
}
```

6. Finally, run the seeder to populate your database with sample products:

```bash
php artisan db:seed --class=ProductSeeder
```

Now, your database will be populated with 50 sample products, each with randomly generated data, making it easier to test and develop your application. You can adjust the number of products created by changing the `count()` method in the seeder file.
 
**Note :** The Information above is enough for basic/beginner level developer. The following about factory is of advanced level studetns.

### Factory Relationship
---
In Laravel, you can use factories to define relationships between models. Let's go through examples of three types of relationships: `hasMany`, `belongsToMany`, and `morphToMany`.

1. **hasMany Relationship**:

In a `hasMany` relationship, one model can have multiple related records in another model. For example, a `User` can have multiple `Post` records.

```php
// User Factory
use App\Models\User;

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});

// Post Factory
use App\Models\Post;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'content' => $faker->paragraph,
        'user_id' => factory(User::class)->create()->id,
    ];
});
```

In the `Post` factory, we associate each post with a user by creating a new user using the `factory(User::class)->create()` method and assigning its `id` to the `user_id` attribute of the post.

2. **belongsToMany Relationship**:

In a `belongsToMany` relationship, two models are related through an intermediate table. For example, `User` and `Role` models may have a many-to-many relationship.

```php
// Role Factory
use App\Models\Role;

$factory->define(Role::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});

// User Factory (with belongsToMany relationship)
use App\Models\User;

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});

$factory->afterCreating(User::class, function ($user, $faker) {
    $user->roles()->attach(factory(Role::class, 2)->create()->pluck('id'));
});
```

In the `User` factory, we define a `belongsToMany` relationship with the `Role` model. After creating a user, we attach two random roles to the user.

3. **morphToMany Relationship**:

In a `morphToMany` relationship, a model can belong to multiple other models on a single association. For example, a `Comment` can belong to both `Post` and `Video` models.

```php
// Comment Factory
use App\Models\Comment;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'content' => $faker->paragraph,
    ];
});

// Post and Video Factories (with morphToMany relationship)
use App\Models\Post;
use App\Models\Video;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
    ];
});

$factory->define(Video::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
    ];

});

$factory->afterCreating(Post::class, function ($post, $faker) {
    $post->comments()->attach(factory(Comment::class, 3)->create()->pluck('id'), ['commentable_type' => Post::class]);
});

$factory->afterCreating(Video::class, function ($video, $faker) {
    $video->comments()->attach(factory(Comment::class, 3)->create()->pluck('id'), ['commentable_type' => Video::class]);
});

```

In the above code, we define a `morphToMany` relationship between `Comment`, `Post`, and `Video`. After creating a `Post` or `Video`, we attach three random comments to them, specifying the `commentable_type` to indicate whether it's associated with a `Post` or a `Video`.

### Factory Polymorphice RelationShip
---
Certainly! Polymorphic relationships in Laravel allow you to associate a model with multiple other models on a single association. They are typically used when you have multiple models that can belong to or associate with another model. I'll provide examples of each type of polymorphic relationship with factories.

**1. Polymorphic One-to-One Relationship:**

In this example, we'll have a `Comment` model that can be associated with various types of content (e.g., `Post` and `Video`).

```php
// CommentFactory.php
$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'body' => $faker->sentence,
        'commentable_id' => factory(App\Post::class)->create()->id,
        'commentable_type' => 'App\Post',
    ];
});
```

**2. Polymorphic One-to-Many Relationship:**

Let's assume a `Tag` model that can be associated with various types of content.

```php
// TagFactory.php
$factory->define(App\Tag::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});

// PostFactory.php
$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'body' => $faker->paragraph,
    ];
});

// VideoFactory.php
$factory->define(App\Video::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'url' => $faker->url,
    ];
});
```

**3. Polymorphic Many-to-Many Relationship:**

In this example, we'll create a `Tag` model that can be associated with both `Post` and `Video` models.

```php
// TagFactory.php
$factory->define(App\Tag::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});

// PostFactory.php
$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'body' => $faker->paragraph,
    ];
});

// VideoFactory.php
$factory->define(App\Video::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'url' => $faker->url,
    ];
});

// TaggableFactory.php
$factory->define(App\Taggable::class, function (Faker $faker) {
    return [
        'tag_id' => function () {
            return factory(App\Tag::class)->create()->id;
        },
        'taggable_id' => function () {
            $taggableType = $faker->randomElement(['App\Post', 'App\Video']);
            return factory($taggableType)->create()->id;
        },
        'taggable_type' => $taggableType,
    ];
});
```

**4. Polymorphic Has Many Relationship:**

In this example, we'll create a `Comment` model that can have multiple comments on various types of content.

```php
// CommentFactory.php
$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'body' => $faker->sentence,
    ];
});

// PostFactory.php
$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'body' => $faker->paragraph,
    ];
});

// VideoFactory.php
$factory->define(App\Video::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'url' => $faker->url,
    ];
});
```
These examples demonstrate various types of polymorphic relationships using factories in Laravel. You can use these factories to generate test data for your polymorphic relationships easily.


## Architecture Concepts : Request Lifecycle, Service Container, Service Providers, Facades
---


  ### Foreign id set with table in laravel
---
The code must be write with unsignedBigInteger('user_id')->unsigned() . like the following
```bash
            $table->id();
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->unsignedBigInteger('news_id')->unsigned();
            $table->text('comment');
           
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('news_id')->references('id')->on('news_posts')->onDelete('cascade');
            $table->enum('status',[1,0])->default(0);
            $table->timestamps();
```

### manage a crud of a comment with database in laravel using ajax
---

Managing a CRUD (Create, Read, Update, Delete) system for comments in Laravel using Ajax involves setting up routes, controllers, models, and JavaScript code to handle the interactions. Below, I'll provide you with a step-by-step guide and example code snippets to achieve this. Please note that this is a high-level overview, and you might need to adjust the code according to your project's specific needs.

**Step 1: Set up the database**

Create a migration for the comments table:

```bash
php artisan make:migration create_comments_table
```

Edit the migration file to define the structure of the comments table:

```php
// database/migrations/xxxx_xx_xx_create_comments_table.php

public function up()
{
    Schema::create('comments', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id');
        $table->unsignedBigInteger('post_id');
        $table->text('body');
        $table->timestamps();
    });
}
```

Run the migration to create the comments table:

```bash
php artisan migrate
```

**Step 2: Create the Comment model**

Generate a Comment model:

```bash
php artisan make:model Comment
```

Define the relationships in the Comment model:

```php
// app/Models/Comment.php

class Comment extends Model
{
    protected $fillable = ['user_id', 'post_id', 'body'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
```

**Step 3: Set up routes**

Define routes for CRUD operations in the `routes/web.php` file:

```php
Route::resource('comments', CommentController::class)->middleware('auth');
```

**Step 4: Create the CommentController**

Generate a CommentController:

```bash
php artisan make:controller CommentController
```

Implement the CRUD operations in the controller:

```php
// app/Http/Controllers/CommentController.php

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        // Validation

        $comment = Comment::create([
            'user_id' => auth()->id(),
            'post_id' => $request->post_id,
            'body' => $request->body,
        ]);

        return response()->json($comment);
    }

    public function update(Request $request, Comment $comment)
    {
        // Validation

        $comment->update(['body' => $request->body]);

        return response()->json($comment);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return response()->json(['message' => 'Comment deleted']);
    }
}
```

**Step 5: Create the Blade view**

Create a Blade view to display comments and handle Ajax interactions:

```html
<!-- resources/views/posts/show.blade.php -->

<div id="comments">
    <!-- Display existing comments here -->
</div>

<form id="comment-form">
    @csrf
    <input type="hidden" name="post_id" value="{{ $post->id }}">
    <textarea name="body" placeholder="Add a comment"></textarea>
    <button type="submit">Submit</button>
</form>

<script>
    // Use JavaScript to handle AJAX requests and update the UI
</script>
```

**Step 6: Implement JavaScript for AJAX**

In your JavaScript code, you can use libraries like Axios or jQuery to send AJAX requests to the server for creating, updating, and deleting comments. Update the `script` tag in the Blade view to include your AJAX logic.

Here's a simplified example using Axios:

```html
<!-- resources/views/posts/show.blade.php -->

<!-- ... existing HTML ... -->

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    const commentForm = document.getElementById('comment-form');
    const commentsContainer = document.getElementById('comments');

    commentForm.addEventListener('submit', async (event) => {
        event.preventDefault();

        const formData = new FormData(commentForm);
        const response = await axios.post('/comments', formData);

        // Update the UI with the new comment
        const newComment = response.data;
        const commentElement = document.createElement('div');
        commentElement.innerHTML = `<p>${newComment.body}</p>`;
        commentsContainer.appendChild(commentElement);

        commentForm.reset();
    });

    // Implement similar logic for updating and deleting comments using AJAX
</script>
```
### CRUD system for comments in Laravel using
---

Managing a CRUD (Create, Read, Update, Delete) system for comments in Laravel using AJAX involves several components, including routes, controllers, models, views, and JavaScript. Below, I'll provide you with a step-by-step guide along with code examples for each component.

Assuming you have a model named `Comment` to represent the comments and a table named `comments` in your database.

1. **Routes (routes/web.php):**

```php
Route::get('/comments', 'CommentController@index'); // To fetch all comments
Route::post('/comments', 'CommentController@store'); // To create a new comment
Route::put('/comments/{id}', 'CommentController@update'); // To update a comment
Route::delete('/comments/{id}', 'CommentController@destroy'); // To delete a comment
```

2. **Controller (app/Http/Controllers/CommentController.php):**

```php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        return response()->json($comments);
    }

    public function store(Request $request)
    {
        $comment = new Comment();
        $comment->content = $request->input('content');
        $comment->save();
        
        return response()->json($comment);
    }

    public function update(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->content = $request->input('content');
        $comment->save();

        return response()->json($comment);
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return response()->json(['message' => 'Comment deleted']);
    }
}
```

3. **Blade View (resources/views/comments.blade.php):**

```html
<!DOCTYPE html>
<html>
<head>
    <title>Comments</title>
</head>
<body>
    <div>
        <h1>Comments</h1>
        <form id="addCommentForm">
            <input type="text" id="commentContent" placeholder="Add a comment">
            <button type="submit">Add Comment</button>
        </form>
    </div>
    <ul id="commentList">
        <!-- Comments will be displayed here dynamically -->
    </ul>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Fetch and display comments
            function fetchComments() {
                $.ajax({
                    url: '/comments',
                    type: 'GET',
                    success: function (data) {
                        var commentsHtml = '';
                        data.forEach(function (comment) {
                            commentsHtml += '<li>' + comment.content +
                                            ' <button class="deleteBtn" data-id="' + comment.id + '">Delete</button></li>';
                        });
                        $('#commentList').html(commentsHtml);
                    }
                });
            }

            fetchComments(); // Initial fetch

            // Add a new comment
            $('#addCommentForm').submit(function (e) {
                e.preventDefault();
                var content = $('#commentContent').val();

                $.ajax({
                    url: '/comments',
                    type: 'POST',
                    data: { content: content },
                    success: function () {
                        $('#commentContent').val('');
                        fetchComments(); // Fetch and update the list
                    }
                });
            });

            // Delete a comment
            $(document).on('click', '.deleteBtn', function () {
                var id = $(this).data('id');
                
                $.ajax({
                    url: '/comments/' + id,
                    type: 'DELETE',
                    success: function () {
                        fetchComments(); // Fetch and update the list
                    }
                });
            });
        });
    </script>
</body>
</html>
```

This example provides you with a basic implementation of a comment CRUD system in Laravel using AJAX. The provided code assumes that you have already set up the necessary database migrations, models, and have included jQuery for AJAX functionality. Remember that this is a simplified example, and in a real-world scenario, you might want to implement additional validation, error handling, and security measures.


### Laravel Set Notification with Read Unread Methods

Setting up user review notifications and implementing read and unread notifications functionality in the admin dashboard of a Laravel application involves several steps. I'll guide you through the process and provide code examples along the way.

**Step 1: Create Notification**

First, let's create a notification for user reviews. Run the following command to generate a new notification:

```bash
php artisan make:notification UserReviewNotification
```

This will create a new notification class at `app/Notifications/UserReviewNotification.php`.

In this notification class, you can customize the content of the notification message. For example:

```php
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class UserReviewNotification extends Notification
{
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('A new review has been posted.')
            ->action('View Review', url('/reviews/' . $this->reviewId))
            ->line('Thank you for using our service!');
    }
}
```

**Step 2: Trigger Notification**

When a new review is posted, you'll need to trigger the notification. This might be done in your review controller or wherever reviews are stored. For instance:

```php
use App\Notifications\UserReviewNotification;

// After saving a new review
$user->notify(new UserReviewNotification($reviewId));
```

**Step 3: Admin Dashboard**

Now, let's set up the admin dashboard to display both read and unread notifications.

Assuming you have a route and a controller method for your admin dashboard, you can fetch the notifications like this:

```php
use Illuminate\Support\Facades\Auth;

public function adminDashboard()
{
    $user = Auth::user(); // Assuming the admin is logged in
    $unreadNotifications = $user->unreadNotifications;
    $readNotifications = $user->readNotifications;

    return view('admin.dashboard', compact('unreadNotifications', 'readNotifications'));
}
```

**Step 4: Display Notifications in the View**

In your admin dashboard view, you can iterate through the notifications to display them:

```html
<!-- Unread notifications -->
@foreach ($unreadNotifications as $notification)
    <div class="notification unread">
        {!! $notification->data['message'] !!}
        <a href="{{ route('mark.notification.read', ['id' => $notification->id]) }}">Mark as Read</a>
    </div>
@endforeach

<!-- Read notifications -->
@foreach ($readNotifications as $notification)
    <div class="notification read">
        {!! $notification->data['message'] !!}
    </div>
@endforeach
```

**Step 5: Mark Notification as Read**

Create a route and controller method to mark a notification as read:

```php
public function markNotificationAsRead($id)
{
    $notification = auth()->user()->notifications()->where('id', $id)->first();
    
    if ($notification) {
        $notification->markAsRead();
    }

    return redirect()->back();
}
```

**Step 6: Styling and AJAX (Optional)**

You can enhance the user experience by using AJAX to mark notifications as read without refreshing the page and by styling the notifications to fit your application's design.

Remember that this is a high-level guide, and you might need to adapt the code to fit your specific application structure and requirements.

### Mail and Databse Notification sent togather
---

```bash
<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AppraisalGoalPublish extends Notification implements ShouldQueue
{
    use Queueable;

    private $sender;
    private $reviewPeriod;
    private $name;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($sender, $reviewPeriod)
    {
        $this->sender = $sender;
        $this->reviewPeriod = $reviewPeriod;
        $this->name = $this->sender->first_name.' '.$this->sender->last_name;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)->view(
            'your.view.path', ['name' => $this->name, 'reviewPeriod' => $this->reviewPeriod]
        );
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'sender' => $this->sender->id,
            'receiver' => $notifiable->id,
            'message' => 'The employee with the code $userCode and name ' . $this->name . ' has published his/her goals for the review Period '. $this->reviewPeriod .' for your approval. Thanks'
        ];
    }
}
```

* in controller file your can handle by following
```bash
$details = [

    'full_name' => $FirstName. ' ' . $LastName
];

$user->notify(new \App\Notifications\AppraisalGoalPublish($details));

# OR
 $user = User::where('role','admin')->get(); // to send to admin dashboard only.

Notification::send($user,new NewCommentNotification($details));

// Here , Custom Notification objects wil be enclosed of how many arguments is declared in the constructor   __construct($sender, $reviewPeriod);

```

* Send The data in Blade file via the following method
```bash
    public function toArray($notifiable)  //  this mehod can be **toDatabase($notifiable)**
    {
        return [
            'message'=>"New Comment added on the News",
            // 'reviewText'=>$this->ReviewInfo,
        ];
    }
```

* Use in Blade file 
```bash
# unReadNotifcation

     @php
$reviewcount = Auth::user()->unreadNotifications()->count()
     @endphp

# all UnReadNotification will  be looped here untill click or Read them.

but if want to delete from notice box after read of click the notification , must use the loop like this 

   @forelse ($user->unreadNotifications as $item)
        @php
            $item->markAsRead();
        @endphp 

@php
$user = Auth::user();
@endphp
         
         # all notification will  be looped here.

    @forelse($user->notifications as $notifiaction)
        <!-- item-->
        <a href="{{ route('pending.review') }}" class="dropdown-item notify-item">
            <div class="notify-icon bg-secondary">
                <i class="mdi mdi-heart"></i>
            </div>
            <p class="notify-details">{{ $notifiaction->data['message'] }}
                <b>Admin</b>
                <small class="text-muted"> {{ Carbon\Carbon::parse($notifiaction->created_at)->diffForHumans() }} </small>
            </p>
        </a>
     @empty

    @endforelse

    </div>
  
 **Note** :  {{ $notifiaction->data['message'] }} 

  above, data is column name of notification table and message of json text of data column field that means the message key of this return mentioned avobe in custom totification class method.
    return [
            'message'=>"New Comment added on the News",
            // 'reviewText'=>$this->ReviewInfo,
        ];
```

### all blade directives in laravel using with example

Blade is the templating engine used in Laravel, a popular PHP framework. Blade provides an elegant syntax for creating views and templates in Laravel applications. Here are some commonly used Blade directives with examples:

1. **{{ }}**: The double curly braces are used to escape and output content as HTML entities. This prevents cross-site scripting (XSS) attacks.

   Example:
   ```blade
   <p>Hello, {{ $name }}</p>
   ```

2. **{!! !!}**: The double curly braces with an exclamation mark allow you to output content as raw HTML. Use this directive with caution, as it doesn't automatically escape the content and may expose your application to XSS attacks.

   Example:
   ```blade
   <p>{!! $rawHtml !!}</p>
   ```

3. **@if, @else, @elseif, @endif**: These directives are used for conditional statements in Blade templates.

   Example:
   ```blade
   @if($isAdmin)
       <p>Welcome, Admin!</p>
   @else
       <p>Welcome, Guest!</p>
   @endif
   ```

4. **@unless**: This directive is used to perform the opposite of an `@if` condition. It executes the enclosed code block unless the condition is true.

   Example:
   ```blade
   @unless($loggedIn)
       <p>Please log in to continue.</p>
   @endunless
   ```

5. **@for, @foreach, @while**: These directives are used for looping through data.

   Example using `@foreach`:
   ```blade
   <ul>
       @foreach($items as $item)
           <li>{{ $item }}</li>
       @endforeach
   </ul>
   ```

6. **@forelse, @empty**: The `@forelse` directive works like `@foreach`, but it has a special `@empty` directive block that is executed if the loop is empty.

   Example:
   ```blade
   <ul>
       @forelse($items as $item)
           <li>{{ $item }}</li>
       @empty
           <li>No items available.</li>
       @endforelse
   </ul>
   ```

7. **@include**: This directive is used to include subviews or partials within your main views.

   Example:
   ```blade
   @include('partials.header')
   ```

8. **@yield, @section, @show, @extends**: These directives are used for creating and extending layouts.

   Example using `@yield` and `@section`:
   ```blade
   <!-- layout.blade.php -->
   <html>
       <head>
           <title>@yield('title')</title>
       </head>
       <body>
           @yield('content')
       </body>
   </html>

   <!-- page.blade.php -->
   @extends('layouts.layout')

   @section('title', 'Page Title')

   @section('content')
       <p>This is the page content.</p>
   @endsection
   ```

9. **@push, @stack**: These directives are used to push content onto a stack within a layout, allowing you to insert scripts or stylesheets at specific points.

   Example using `@push` and `@stack`:
   ```blade
   <!-- layout.blade.php -->
   <html>
       <head>
           @stack('styles')
       </head>
       <body>
           @yield('content')
           @stack('scripts')
       </body>
   </html>

   <!-- page.blade.php -->
   @extends('layouts.layout')

   @push('styles')
       <link rel="stylesheet" href="styles.css">
   @endpush

   @push('scripts')
       <script src="script.js"></script>
   @endpush
   ```

10. **@guest and @auth** Blade contains authentication directives that could be used to determine if the current user is authenticated or not.

```bash
@guest
    // The user is not authenticated...
@endguest
@auth
    // The user is authenticated...
@endauth
```

These are some of the most commonly used Blade directives in Laravel. They allow you to build dynamic and interactive views for your application.

11. **@forelse**The forelse directive is a special kind of loop. It is a foreach directive combined with the empty directive. Take a look at the following example:

```bash
@if ($blogs->count())
  @foreach ($blogs as $blog)
    <li>{{ $blog->title }}</li>
  @endforeach
@else
  <p>There are no blogs.</p>
@endif
```
12.**@inject**, The @inject directive is one of my faviourite directive and used on most places in my applications. The @inject directive used to retrieve a service from the Laravel’s Service Container and inject into your view.

The first argument passed to this directive is a variable name the service will be placed into, while the second argument is the class or interface of the service you want to inject.

```bash
@inject('menu', 'App\Services\MenuService')

// then in your view

{!! $menu->render() !!}

```

### Custom Blade Directive with Making Service Provider

Sure, I can provide you with an example of how to create a custom service provider to register custom Blade directives and then use those directives in a Blade template.

Step 1: Create the Custom Service Provider
Let's create a custom service provider called `CustomBladeDirectivesServiceProvider` where we'll define our custom Blade directives.

1. Create the service provider:
Run the following command to create a new service provider:
```sh
php artisan make:provider CustomBladeDirectivesServiceProvider
```

2. Open the generated `CustomBladeDirectivesServiceProvider.php` file located in the `app/Providers` directory. Inside the `boot` method, you can define your custom Blade directives:
```php
namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class CustomBladeDirectivesServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Blade::directive('datetime', function ($expression) {
            return "<?php echo \Carbon\Carbon::parse($expression)->format('Y-m-d H:i:s'); ?>";
        });

    
        Blade::directive('uppercase', function ($expression) {
            return "<?php echo strtoupper($expression); ?>";
        });


# @ifenv: Conditional check based on the environment.
        Blade::directive('ifenv', function ($expression) {
    return "<?php if(app()->environment($expression)): ?>";
});

Blade::directive('endifenv', function () {
    return "<?php endif; ?>";
});

# @ifenv: Conditional check based on the environment. End


# @repeat: Repeats the content within the directive a certain number of times.
Blade::directive('repeat', function ($expression) {
    list($count, $content) = explode(',', $expression, 2);
    return "<?php echo str_repeat($content, $count); ?>";
});

# @datetime is alternative of carbon datetitme 
 Blade::directive('datetime', function ($expression) {
        return "<?php echo with($expression)->format('Y-m-d H:i:s'); ?>";
    });

# @isadmin directive Start
    Blade::directive('isadmin', function () {
        return "<?php if(auth()->user() && auth()->user()->isAdmin()): ?>";
    });

    Blade::directive('endisadmin', function () {
        return "<?php endif; ?>";
    });

    # @isadmin directive Start

    }

    public function register()
    {
        //
    }
}
```

Step 2: Register the Service Provider
Add your custom service provider to the `providers` array in the `config/app.php` configuration file:
```php
'providers' => [
    // ...
    App\Providers\CustomBladeDirectivesServiceProvider::class,
],
```

Step 3: Using the Custom Blade Directives in a View
Now you can use the custom Blade directives in your Blade templates.

Create a new Blade view file, for example, `custom.blade.php`, and add the following content:
```blade

@extends('layouts.app')

@section('content')
    <p>Current date and time: @datetime(now())</p>
    <p>Uppercase text: @uppercase('hello world')</p>
@endsection

# @ifenv: Conditional check based on the environment.
@ifenv('local')
    <p>This is a local environment.</p>
@endifenv


# @repeat: Repeats the content within the directive a certain number of times.
@repeat(3, '<p>Repeated content</p>')


<p>Current date and time: @datetime(now())</p>

@isadmin
    <p>You are an admin user.</p>
@endisadmin

```

In this example, the `@datetime` directive formats the current date and time, and the `@uppercase` directive converts the provided text to uppercase.

Remember to adjust the layout and include the `@yield('content')` directive in your layout file (`layouts/app.blade.php` in this example).

After creating the view and layout, you can visit the route associated with the view to see the custom Blade directives in action.

That's it! You've created a custom service provider to register custom Blade directives and used those directives in a Blade template within the Laravel framework.

### Page title setup dynamically

```bash

@yield('title');  # in home Page

@section('title', $news->news_title) # in different Pages

```

### Validation In Laravel

Create Public Method for both of crating and updating data.
in the following the concenated id ($requestForm->id)

```bash
 public function PermissionValidation($requestForm)
    {
      return   $requestForm->validate([
            'name'=>'required|unique:permissions,name,' . $requestForm->id, 
            'group_name'=>'required',
        ],[
            'name.required'=> 'permission name must be filled up',
            'name.unique'=>'The permission Name already Exist, Try with another name'
        ],
    );
    }

    # Or separate ID parameter

     public function PermissionValidation($requestForm, $id == null)
    {
      return   $requestForm->validate([
            'name'=>'required|unique:permissions,name,' . $id, 
            'group_name'=>'required',
        ],[
            'name.required'=> 'permission name must be filled up',
            'name.unique'=>'The permission Name already Exist, Try with another name'
        ],
    );
    }

    #or alternative system. We Know that one column validation rules can be declared in array ['required','email',Rule::unique('users', 'email')->ignore($id),]. like the following.

    $requestForm->validate(
        ['email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($id),
            ],
            ]
            );
```
In Blade File to show the error

```bash
<div class="form-group col-md-6 mb-3">
                <label for="inputEmail4" class="form-label">Roles Name </label>
                <input type="text" value={{ old('name') }} name="name" class="form-control" id="inputEmail4" placeholder="Add Roles">
                @error('name')
                <div class="alert alert-danger w-100 text-center bg-white m-1">{{ $message }}</div>
            @enderror
            </div>
```

### how to checked related checkbox  by clicking a single checkbox and not checked all by one in foreach loop in laravel.

It seems like you want to achieve a "check all" functionality for the related checkboxes within a specific group, rather than checking all checkboxes across all groups. To implement this, you need to make sure that each group checkbox is responsible for toggling only the checkboxes within its own group. Here's how you can achieve this in Laravel using jQuery:

Assuming you have a foreach loop in your Laravel Blade view that generates group checkboxes and associated permission checkboxes:

```html
@foreach($groups as $group)
    <input type="checkbox" class="group_name" data-group-id="{{ $group->id }}">
    <label>{{ $group->name }}</label>

    @foreach($group->permissions as $permission)
        <input type="checkbox" class="permission_checkbox group_{{ $group->id }}" name="permission[]" value="{{ $permission->id }}">
        <label>{{ $permission->name }}</label>
    @endforeach
@endforeach
```

In the above code, we've added the `data-group-id` attribute to the group checkbox and used a `group_{{ $group->id }}` class for the permission checkboxes associated with each group.

Now, you can update your jQuery script to handle the "check all" functionality within each group:

```javascript
$('.group_name').on('click', function() {
    var groupId = $(this).data('group-id');
    var permissionCheckboxes = $('.permission_checkbox.group_' + groupId);

    permissionCheckboxes.prop('checked', $(this).is(':checked'));
});

# To select all combobox by one click , another example in the following

  $('#customckeck15').click(function(){
            if ($(this).is(':checked')) {
                $('input[type = checkbox]').prop('checked',true);
            }else{
                 $('input[type = checkbox]').prop('checked',false);
            }
         });
```

This script listens for the click event on each `.group_name` checkbox. When a group checkbox is clicked, it extracts the `data-group-id` attribute to determine the associated group's ID. Then, it selects all permission checkboxes with the class `.permission_checkbox` and the specific group class (e.g., `.group_1`, `.group_2`, etc.) and sets their checked status to match the checked status of the group checkbox.

With this setup, when you click a group checkbox, it will toggle the related permission checkboxes within that specific group, without affecting other groups' checkboxes.

### Laravel Database data access from a table and related data based on parent  data.

```bash

Suppose Permissions\'s Group Name and Permission name by Group Name.

      @php
          $idkey = 0;
          $forkey=0;
      @endphp

      @foreach ($role_has_permissions_group as $groupkey =>  $permissions_group_name)
          
      
         <div class="row">
            <div class="col-3">
                <div class="form-check mb-2 form-check-primary">
                    <input class="form-check-input group_name" data-group-id="{{ $groupkey }}" type="checkbox" value="" id="customckeck{{ $idkey++ }}">
                    <label class="form-check-label" for="customckeck{{ $forkey++ }}">
                        {{ $permissions_group_name->group_name }}
                    </label>
                </div>
            </div>

            @php
                $group_wise_permission_name = App\Models\User::GroupByPermissionName($permissions_group_name->group_name);
            @endphp

            <div class="col-9">
                @foreach ($group_wise_permission_name as $key => $permission_name)
                    
               
                <div class="form-check mb-2 form-check-primary">
                    <input class="form-check-input permission_checkbox group_{{ $groupkey }}" name="permission[]" type="checkbox" value="{{ $permission_name->id }}" id="customckeck{{ $permission_name->id }}">
                    <label class="form-check-label" for="customckeck{{ $permission_name->id }}">

                        {{ $permission_name->name }}

                    </label>
                </div>

                @endforeach
                
                <br>

            </div>
            
        </div>

        @endforeach
```
### how to Redirect to role wise dashboard after a different login page and back to their own login page after the session close in the Laravel.

To achieve role-based redirection in Laravel after login and returning to the respective login page after session closure, you can follow these steps:

1. **Set Up Multiple Login Routes and Redirects:**
    In your `routes/web.php` file, define different login routes for each user role. Also, specify the routes to redirect users to after successful login.

```php
Route::group(['middleware' => 'guest'], function () {
    // Admin login route
    Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm');
    Route::post('/admin/login', 'Auth\AdminLoginController@login');
    
    // User login route
    Route::get('/user/login', 'Auth\UserLoginController@showLoginForm');
    Route::post('/user/login', 'Auth\UserLoginController@login');
});
```

2. **Create Custom Login Controllers:**
    Create separate controller classes for each user role. Make sure these controllers extend Laravel's built-in `App\Http\Controllers\Auth\LoginController` and override the `$redirectTo` property.

```php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AdminLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/admin/dashboard'; // Redirect after login

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}

class UserLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/user/dashboard'; // Redirect after login

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
```

3. **Implement Custom Logout Functionality:**
    Customize the logout functionality to redirect users back to their respective login pages after session closure. You can do this by overriding the `logout` method in your `LoginController`.

```php
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Existing code
    
    public function logout(Request $request)
    {
        $redirectTo = '/'; // Default redirect
        
        if (Auth::guard('admin')->check()) {
            $redirectTo = '/admin/login'; // Admin logout
        } elseif (Auth::guard('web')->check()) {
            $redirectTo = '/user/login'; // User logout
        }
        
        $this->guard()->logout();
        $request->session()->invalidate();
        
        return redirect($redirectTo);
    }
}
```

4. **Update Middleware for Dashboard Access:**
    Use middleware to ensure that only authenticated users with the appropriate roles can access their respective dashboards.

```php
Route::middleware(['auth:admin', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', 'AdminController@dashboard');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user/dashboard', 'UserController@dashboard');
});
```

5. **Implement Role Middleware:**
    Create a custom middleware to check the user's role and grant or deny access accordingly. You can create a middleware using the `php artisan make:middleware RoleMiddleware` command.

```php
public function handle($request, Closure $next, $role)
{
    if ($role === 'admin' && Auth::guard('admin')->check()) {
        return $next($request);
    } elseif ($role === 'user' && Auth::guard('web')->check()) {
        return $next($request);
    }

    abort(403, 'Unauthorized');
}
```

Remember to adjust namespaces and class names according to your application's structure. This example assumes you have separate guards for admin and user (you might need to define these guards in your `config/auth.php` file). Also, don't forget to implement the actual dashboard controller actions.

Always make sure to test thoroughly to ensure everything works as intended.

### how to Redirect to role wise dashboard after a different login page and back to their own login page after the session close in the Laravel breeze package.

To achieve role-based redirection after a different login page and returning to their own login page after the session closes using the Laravel Breeze package, you can follow these steps:

1. **Set Up Role-based Redirection:**

   In Laravel Breeze, you can customize the redirection logic in the `Authenticate.php` middleware. This middleware handles the redirection after successful login. To redirect users based on their roles, you can modify the `handle` method in `app/Http/Middleware/Authenticate.php`:

   ```php
   public function handle($request, Closure $next, ...$guards)
   {
       $guards = empty($guards) ? [null] : $guards;

       foreach ($guards as $guard) {
           if (Auth::guard($guard)->check()) {
               $user = Auth::guard($guard)->user();
               if ($user->hasRole('admin')) {
                   return redirect('/admin/dashboard'); // Redirect to admin dashboard
               } elseif ($user->hasRole('user')) {
                   return redirect('/user/dashboard'); // Redirect to user dashboard
               }
           }
       }

       return $next($request);
   }
   ```

   This code snippet assumes that you have a `hasRole` method in your User model to check the user's role.

2. **Return to Specific Login Page:**

   To redirect users back to their respective login pages after the session closes, you can customize the login path in the `LoginController.php` of Laravel Breeze:

   ```php
   protected function loggedOut(Request $request)
   {
       return redirect()->route('login'); // Redirect to the general login page
   }
   ```

   In this example, it redirects users to the general login page. You can modify this method to redirect users to different login pages based on their roles.

Remember to adjust the route names, URLs, and role-checking logic to match your application's structure and requirements.

3. **Session Timeout Handling:**

   To handle the session timeout, you might need to customize the behavior in Laravel's built-in authentication system. Specifically, you can modify the `App\Http\Middleware\AuthenticateSession.php` middleware to achieve this.

   ```php
   protected function redirectTo($request)
   {
       if (! $request->expectsJson()) {
           if (Auth::check()) {
               $user = Auth::user();
               if ($user->hasRole('admin')) {
                   return route('admin.login'); // Redirect admin to admin login
               } elseif ($user->hasRole('user')) {
                   return route('user.login'); // Redirect user to user login
               }
           }
       }
   }
   ```

   This code will redirect users to their respective login pages when their session times out.

Please make sure to adjust the code according to your specific routes, roles, and folder structures. It's also important to ensure that your authentication system and role management are properly set up before implementing these changes.

### how to controll admin panel base on role and permission in laravel?

Controlling the admin panel based on roles and permissions in Laravel involves a multi-step process. You can utilize packages like Spatie Laravel Permissions and create middleware to handle role and permission checks. Here's a step-by-step guide:

1. **Install and Configure Spatie Laravel Permissions:**
   Install the package using Composer:
   
   ```bash
   composer require spatie/laravel-permission
   ```

   After installation, run the migration to create the necessary tables:

   ```bash
   php artisan migrate
   ```

   In your `config/auth.php` file, set the user provider to use the `eloquent` provider.

   ```php
   'providers' => [
       'users' => [
           'driver' => 'eloquent',
           'model' => App\Models\User::class,
       ],
   ],
   ```

2. **Define Roles and Permissions:**
   In your `User` model, use the `HasRoles` and `HasPermissions` traits provided by the package:

   ```php
   use Spatie\Permission\Traits\HasRoles;
   use Spatie\Permission\Traits\HasPermissions;

   class User extends Authenticatable
   {
       use HasRoles, HasPermissions;
       
       // ...
   }
   ```

   Define roles and permissions in your application. You can do this in a seeder or directly in a migration:

   ```php
   use Spatie\Permission\Models\Role;
   use Spatie\Permission\Models\Permission;

   // Create roles
   $adminRole = Role::create(['name' => 'admin']);
   $userRole = Role::create(['name' => 'user']);

   // Create permissions
   $manageUsers = Permission::create(['name' => 'manage users']);
   $managePosts = Permission::create(['name' => 'manage posts']);

   // Assign permissions to roles
   $adminRole->givePermissionTo([$manageUsers, $managePosts]);
   ```

3. **Create Middleware for Role and Permission Checks:**
   Create a middleware to check for roles and permissions. This middleware can be used to protect routes and actions that require specific roles or permissions.

   ```bash
   php artisan make:middleware CheckRolePermission
   ```

   In the `handle` method of the middleware, perform the role and permission checks:

   ```php
   public function handle($request, Closure $next, ...$rolesAndPermissions)
   {
       $user = Auth::user();

       if (! $user->hasAnyRole($rolesAndPermissions) && ! $user->hasAnyPermission($rolesAndPermissions)) {
           abort(403, 'Unauthorized action.');
       }

       return $next($request);
   }
   ```

4. **Apply Middleware to Routes:**
   Apply the custom middleware to routes that require specific roles or permissions.

   ```php
   Route::middleware(['auth', 'role-permission:admin,manage users'])->group(function () {
       // Your admin panel routes here
   });
   ```

5. **Use Middleware in Controllers:**
   In your controller methods, use the middleware to protect specific actions:

   ```php
   public function manageUsers()
   {
       // This action is only accessible to users with the "admin" role or the "manage users" permission
   }
   ```

By following these steps, you can control access to your admin panel based on roles and permissions using the Spatie Laravel Permissions package. Remember to adjust the role and permission names, middleware, and routes according to your application's requirements.


### Error Handling In Laravel
---

As of my last knowledge update in September 2021, Laravel 8 was the latest version available. However, I can still provide you with information about error handling and custom error pages in Laravel, although the specifics might change if Laravel 10 is released after my last update.

In Laravel, you can handle various types of errors and create custom error pages to provide a better user experience. Common HTTP errors like 404 (Not Found) and 500 (Internal Server Error) can be customized to display user-friendly messages or views.

Here's how you can handle and customize these errors in Laravel:

1. **Customizing Error Views:**
   Laravel allows you to create custom error views for different HTTP error codes. These views are located in the `resources/views/errors` directory. You can create blade view files for specific error codes, such as `404.blade.php` for the 404 error and `500.blade.php` for the 500 error. Customize these views according to your design and messaging preferences.

2. **Exception Handling:**
   Laravel's `App\Exceptions\Handler` class is responsible for handling exceptions and converting them into HTTP responses. You can customize how exceptions are handled in the `render` method of this class. To handle specific exceptions, you can check the type of exception and return a custom response. For example:

   ```php
   public function render($request, Throwable $exception)
   {
       if ($exception instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException) {
           return response()->view('errors.404', [], 404);
       }

       // Handle other exceptions...

       return parent::render($request, $exception);
   }
   ```

3. **Registering Custom Error Pages:**
   You can also register custom error pages in your `app/Providers/AppServiceProvider.php` file's `boot` method using the `View::share` method:

   ```php
   public function boot()
   {
       $this->registerErrorViews();

       // Other boot logic...
   }

   protected function registerErrorViews()
   {
       view()->share('errorCode', ''); // Set a default value

       view()->composer('errors.404', function ($view) {
           $view->with('errorCode', 404);
       });

       // Add similar composers for other error views...
   }
   ```


Remember to customize the handling of each exception based on your application's requirements.

4. **Maintenance Mode:**

You can put your application into maintenance mode by running the `php artisan down` command. This will display a maintenance mode view when users access your application.

```bash
php artisan down --message="We're doing some maintenance. Please check back later."
```

5. **Customizing Maintenance Mode Page:**

You can customize the maintenance mode page by modifying the `resources/views/errors/503.blade.php` view.


As of my last knowledge update in September 2021, Laravel 10 had not been released yet. The latest version available at that time was Laravel 8. However, I can provide you with information on how error handling and custom error pages are typically implemented in Laravel. Keep in mind that some details might have changed in newer versions, so it's always a good idea to consult the official Laravel documentation for the most up-to-date information.

In Laravel, you can handle various types of errors and customize error pages using the following steps:

1. **Handling Exceptions:**

Laravel provides a powerful exception handling mechanism through the `App\Exceptions\Handler` class. You can customize this class to handle different types of exceptions. Here's how you can define custom exception handling:

First, create a new exception class if needed:

```bash
php artisan make:exception CustomException
```

Then, open the `app\Exceptions\Handler.php` file and update the `report` and `render` methods to handle your custom exceptions and other built-in exceptions:

```php
use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    // ...

    public function render($request, Exception $exception)
    {
        if ($exception instanceof CustomException) {
            return response()->view('errors.custom', [], 500);
        }

        return parent::render($request, $exception);
    }

    // ...


 # OR alternative 


    public function render($request, Exception $exception)
{
    if ($this->isHttpException($exception)) {
        if ($exception->getStatusCode() == 404) {
            return response()->view('errors.' . '404', [], 404);
        }
        if ($exception->getStatusCode() == 500) {
            return response()->view('errors.' . '500', [], 500);
        }
    }
    return parent::render($request, $exception);
}


    # OR alternative 

    public function register(): void
{

   $this->renderable(function (NotFoundHttpException $e, Request $request) {



        if ($request->is('api/*')) {
            return response()->json([
                'message' => 'Record not found.'
            ], 404);
        }


    });


}
}
# OR ALTERNATIVE 

public function render($request, Throwable $exception)
{
    if ($exception instanceof NotFoundHttpException) {
        return response()->view('errors.404', [], 404);
    }

    if ($exception instanceof \PDOException) {
        return response()->view('errors.500', [], 500);
    }

    return parent::render($request, $exception);
}


```


Inside the `errors` directory, create Blade view files for different error codes. For example:

- `resources/views/errors/404.blade.php` for the 404 error page.
- `resources/views/errors/500.blade.php` for the 500 error page.

Customize these views as needed, adding your own HTML, CSS, and design elements.

3. **Error Logging:**

Laravel also supports error logging out of the box. You can configure error logging in the `.env` file using the `LOG_CHANNEL` and related settings.

For example, to log errors to the `daily` log channel, add or update the following in your `.env` file:

```env
LOG_CHANNEL=daily
```

4. **Using Route Closures for Error Pages (Optional):**

In some cases, you might want to return custom error pages directly from your routes. You can do this using route closures:

```php
Route::get('/404', function () {
    return view('errors.404');
});

Route::get('/500', function () {
    return view('errors.500');
});

```

5. **HTTP Exceptions (404, 500, etc.):**

Laravel provides the abort() function to throw HTTP exceptions. You can use this function to return a specific HTTP response with a status code and a message.

```BASH

// For a 404 Not Found error
if (!$user) {
    abort(404, 'User not found');
}

// For a 500 Internal Server Error
if ($errorCondition) {
    abort(500, 'Something went wrong');
}

```

### how to get a database html data in laravel with various Format

In this example, strip_tags($post->content) removes all HTML tags from the post's content, and then Str::limit is applied to the stripped content. The use of {!! !!} around the Str::limit output ensures that the HTML is not escaped, allowing it to be rendered as HTML.
```bash
@foreach($posts as $post)
    <div class="post">
        <h2>{{ $post->title }}</h2>
        <p>{!! Str::limit(strip_tags($post->content), 150,'...') !!}</p> // '...' is optional parameter . it can be used like ''
         or
          <p>{!! Str::words(strip_tags($post->content), 150,'') !!}</p>
    </div>
@endforeach

```

### polymorphic relationship  tags in news , video  and photo gallery table in laravel
---

Setting up a polymorphic relationship in Laravel for a news portal project where tags can be associated with news articles, videos, and photo galleries involves a few steps. Polymorphic relationships allow a single relationship to be used for multiple types of models. Here's how you can achieve this:

Let's assume you have three tables/models: `News`, `Video`, and `PhotoGallery`, and you want to associate tags with each of these models.

1. **Database Setup:**

You'll need a table to store tags and a pivot table to manage the relationships. Create the necessary migration files:

```bash
php artisan make:migration create_tags_table
php artisan make:migration create_taggables_table
```

In the `create_tags_table` migration:

```php
public function up()
{
    Schema::create('tags', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->timestamps();
    });
}
```

In the `create_taggables_table` migration:

```php
public function up()
{
    Schema::create('taggables', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('tag_id');
        $table->unsignedBigInteger('taggable_id');
        $table->string('taggable_type');
        $table->timestamps();
        
        $table->unique(['tag_id', 'taggable_id', 'taggable_type']);
        
        $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
    });

}

 # OR alternative

    public function up()
{
    Schema::create('taggables', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('tag_id');
        $table->unsignedBigInteger('taggable_id');
        $table->string('taggable_type');
        $table->timestamps();
    });
}
```

Run the migrations:

```bash
php artisan migrate
```

2. **Models Setup:**

In each of your models (`News`, `Video`, `PhotoGallery`), you'll define the polymorphic relationship with the `Tag` model.

```php
use Illuminate\Database\Eloquent\Model;

# In your Tag model, define the morphedByMany relationship:

class Tag extends Model
{
    // ...

   public function taggable()
{
    return $this->morphTo();
}

# or alternative 

public function news()
{
    return $this->morphedByMany('App\News', 'taggable');
}

public function videos()
{
    return $this->morphedByMany('App\Video', 'taggable');
}

public function photoGalleries()
{
    return $this->morphedByMany('App\PhotoGallery', 'taggable');
}



}


class News extends Model
{
    // ...

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}

class Video extends Model
{
    // ...

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}

class PhotoGallery extends Model
{
    // ...

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
```

3. **Creating and Retrieving Tags:**

You can now use these relationships to attach and retrieve tags for each model.

```php
$news = News::find(1);
$news->tags()->attach([1, 2, 3]); // Attach tags to the news article

$tags = $news->tags; // Retrieve tags associated with the news article

// Similarly, for Video and PhotoGallery
$video = Video::find(1);
$video->tags()->attach([2, 3, 4]);

$photoGallery = PhotoGallery::find(1);
$photoGallery->tags()->attach([1, 4, 5]);

# or alternative 
// Attaching tags to a model
$news = News::find(1);
$news->tags()->attach($tagIds);

// Retrieving tags for a model
$news = News::find(1);
$tags = $news->tags;

```

4. **Retrieving Models by Tag:**

You can also retrieve models associated with a specific tag.

```php
$tag = Tag::find(1);

$newsWithTag = $tag->news; // Retrieve news articles with this tag
$videosWithTag = $tag->videos; // Retrieve videos with this tag
$photoGalleriesWithTag = $tag->photoGalleries; // Retrieve photo galleries with this tag
```

That's the basic setup for a polymorphic relationship involving tags and multiple types of models in a Laravel news portal project. You can customize and expand upon this foundation to suit your specific project requirements.

### public function tags() **: MorphToMany** why used that type of class with : colon in laravel ?

The : MorphToMany after the method declaration indicates the return type of the method, which is a hint for developers and IDEs to understand the expected return type.

```bash
public function tags() : MorphToMany
{
    return $this->morphToMany(Tag::class,'taggable');
};
```
Regarding the : MorphToMany in the method declaration, it's optional and not strictly necessary for the code to work correctly. It's a type hint that helps you and your IDE understand the expected return type of the method. Laravel will still establish the relationship correctly even if you omit the : MorphToMany type hint. However, including it can improve code readability and help catch potential type-related errors during development.

In Wrap up : The : MorphToMany type hint is optional but can be helpful for code clarity and type safety.

### Using Polymorphic In Blade File (CRUD)

If you want to display the previously associated tags as a comma-separated list in a single input field for editing news, you can follow these steps:

1. Store or Create File.
```php
 public function AllPhotoGallery(){

        $photo = PhotoGallery::latest()->get();
        return view('backend.photo.all_photo',compact('photo'));

    } // End Method 

    # In above blade file set the code like the following
                       <td>
                        @php
                            $allTags = $item->tags->pluck('name')->toArray();
                        @endphp
                        @foreach ($allTags as $tag)
                            <span class="badge fill-round bg-primary">{{ $tag }}</span>
                        @endforeach
                    </td>


public function store(Request $request)
{
 $gallery = PhotoGallery::create([
                    'photo_gallery'=>$save_url,
                    'post_date'=>Carbon::now()->format('D F Y'),
                ]);

    // Attach tags
     // data set in input like international,national,business . it is used if the input tag is 
     <input type="text" name="tags"  class="selectize-close-btn" value="{{ old('tags') }}"> tag name will be store as string.

     if stored input value in  array  name="tags[]" ,
     we get the tags ,

     $tags = $request->tags.

     Otherwise

     $tags = explode(',', $request->input('tags'));

    foreach ($tags as $tagName) {
        $tag = Tag::insertGetId(['name' => $tagName]);
        $gallery ->tags()->attach($tag);
    }

    return redirect()->route('news.index')->with('success', 'News created successfully');
}
```

1. Retrieve the existing tags associated with the news item in your controller:

```php
$news = News::findOrFail($id);
$existingTags = $news->tags->pluck('name')->implode(',');
```

2. Pass the `$existingTags` variable to your Blade view:

```php
return view('news.edit', compact('news', 'existingTags'));
```

3. In your Blade view's edit form, populate the input field with the existing tags:

```html
<form method="POST" action="{{ route('news.update', $news->id) }}">
    <!-- ... other fields ... -->
        <input type="text" name="tags" value="{{ $existingTags }}" class="form-control">
    <!-- ... submit button ... -->
</form>
```

4. In your update method of the controller, you can handle updating the tags as follows:

```php
    public function AllVideoGallery(){

        $video = VideoGallery::latest()->get();
        return view('backend.video.all_video',compact('video'));

    } // End Method 


    public function AddVideoGallery(){
        return view('backend.video.add_video');
    } // End Method 


   public function StoreVideoGallery(Request $request){


      $videoGallery =  VideoGallery::create([

            'video_title' => $request->video_title,
            'video_url' => $request->video_url, 
        ]);

        $tags = explode(',',$request->input('tags'));
        $tagIds = [];
        foreach ($tags as  $tag) {
            $storeTag = Tag::firstOrCreate(['name'=>trim($tag)]);
            $tagIds[] = $storeTag->id;
        }
        $videoGallery->tags()->attach($tagIds);

         $notification = array(
            'message' => 'Video Inserted Successfully',
            'alert-type' => 'success'

        );
        return redirect()->route('all.video.gallery')->with($notification);


    }// End Method



    public function EditVideoGallery($id){

        $video = VideoGallery::findOrFail($id);
        $existing_tags = $video->tags->pluck('name')->implode(',');
        // dd($existing_tags);
        return view('backend.video.edit_video',compact('video','existing_tags'));

    }// End Method


    public function UpdateVideoGallery(Request $request){

        $video_id = $request->id;
        $videoImage = VideoGallery::findOrFail($video_id);
        $prev_tags = $videoImage->tags->pluck('id')->toArray();

        VideoGallery::findOrFail($video_id)->update([

            'video_title' => $request->video_title,
            'video_url' => $request->video_url,  
            
        ]);

        return redirect()->route('all.video.gallery')->with($notification);


        //    $videoImage->tags()->detach();
          $tags = explode(',', $request->input('tags'));
          $tagID=[];
          foreach ($tags as $tagName) {
              $tag = Tag::firstOrCreate(['name' => $tagName]);
              $tagID[]=$tag->id;
          };
  
          $videoImage->tags()->sync($tagID);
          // Delete the tag that is associated with video image
          Tag::whereIn('id',$prev_tags)->has('videoGallary','=',0)->delete();

        return redirect()->route('all.video.gallery')->with($notification);

        }

     public function DeleteVideoGallery($id){

        $photo = VideoGallery::findOrFail($id);
        $tagIds = $photo->tags->pluck('id')->toArray();

        $photo->tags()->detach();
        VideoGallery::findOrFail($id)->delete();

        Tag::whereIn('id',$tagIds)->has('videoGallary','=',0)->delete();

        return redirect()->back()->with($notification); 

    }// End Method 

```
Note : Apologies for any confusion. In the context of `Tag::whereIn('id', $tagIds)->has('news', '=', 0)->delete();`, the `0` is not related to an index. It represents the count of related news articles.

The line of code `->has('news', '=', 0)` is checking for tags that have zero related news articles. It's not referring to an index but rather specifying a condition for filtering tags based on the count of related news articles.

In Laravel's Eloquent ORM, the `has` method is used to filter results based on the existence of related records. In this case, it's being used to filter tags that have no related news articles (i.e., their count is zero).

So, the entire line of code is essentially saying "delete tags that are in the given `$tagIds` array and have no related news articles (count equals 0)." It's part of the process of cleaning up unused tags from the `tags` table.
