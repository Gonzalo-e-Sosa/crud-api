<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Steps of Building API

1. Create a new Laravel project with Composer executing `composer create-project laravel/laravel <name>` or use Laravel CLI executing `laravel new <name>`
2. Run the server with `php artisan serve`
3. Stop the server with `CTRL + C`
4. Install API with `php artisan install:api` and select yes to migration 
5. Add API routes in the file `routes/api.php`
6. You can test your routes with 'Thunder Client' an extension of VS Code 
7. Make the migration with `php artisan make:migration create_<name>_table` to create a table for `<name>`
8. Migrate the database with `php artisan migrate` 
9. You can visualize the database `database/database.sqlite` with 'sqLite Viewer' an extension of VS Code
10. To create a model of your table use `php artisan make:model <Name>`with first letter in upper case (naming convention)
11. In `app/Models/<Name>.php` you will see the model previously created 
12. Update the model `<Name>.php` adding the name of your table in the database and the columns
```php
class Name extends Model
{
    use HasFactory;

    protected $table = 'name';

    protected $fillable = [
        "columns..."
    ];
}
```
13. To create a controller use `php artisan make:controller Api/<name>Controller`. This will create a controller in `app/Http/Controllers/Api/<name>Controller.php` to avoid creating `<name>Controller` inside of the `app/Http/Controllers` folder
14. Update the `<name>Controller.php>` to implement methods of public use
```php
class nameController extends Controller
{
    public function index()
    {
        return "Method from controller!";
    }
}
```
15. To use the method from the controller do: 
```php
Route::get('/api/<name>', [nameController::class, 'index']);
```
The array needs the class in the position 0 and the method in the position 1
16. Now run the server again with `php artisan serve` and you will see the method from the controller
17. To use the database in your controller you need to import the model 
```php
use App\Models\<Name>;
```
Now you can use the model in your controller
```php
class nameController extends Controller
{
    public function index()
    {
        $name = Name::all();

        return response()->json($name, 200);
    }
}
```
The `<Name>::all()` returns all the rows of the table and with 
```php 
    return response()->json($name, 200);
``` 
returns all the rows of the table in a json format with the status code 200 that indicates that the request was successful
18. To avoid returning any data you can check if the array is empty
```php
if ($name->isEmpty()) {
    return response()->json(['message' => 'No records found'], 200);
}
```
with this you return a response in json format with a message and the status code 200 that indicates that the request was successful.
You can extract the data in a variable before returning it
```php
if ($name->isEmpty()) {
    $data = [
        "message" => "No records found",
        "status" => 200
    ];
    return response()->json($data);
}
``` 
19. Now you can create a new method for your controller, a method to store
```php
public function store(Request $request)
{
    $name = new Name;
}
```
With store you can store data in the database and return a response in json format with a message and the status code 
20. To validate data use the package 
```php
use Illuminate\Support\Facades\Validator;
```
21. Now you can create an instance of the validator
Validate the data
```php
$validator = Validator::make($request->all(), [
    "name" => "required|max:255",
    "email" => "required|email|max:255",
    "password" => "required|min:6",
]);
```
If fails return a message with the errors
```php
if ($validator->fails()) {
    return response()->json($validator->errors(), 400);
}
``` 
22. Now you can create a new method for your controller, a method to update
```php
public function update(Request $request, $id)
{
    $name = Name::find($id);
}
```
With update you can update data in the database and return a response in json format with a message and the status code 
23. To update only a field you need to create a new method
Find the student
```php
public function updatePartial(Request $request, string $id)
{
    $student = Student::find($id);
}
```
If not exists return a 404 status
```php
        if (!$student) {
            $data = [
                'message' => 'Student not found',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
```

Validate the data and if fails return a 400 status
```php
    // Important: not add required to the fields
    
    $validator = Validator::make($request->all(), [
        'name' => 'max:255',
        'email' => 'email|unique:student',
        'phone' => 'digits:10',
        'language' => 'in:Spanish,English',
    ]);

    if ($validator->fails()) {
        $data = [
            'message' => 'Error in the validation',
            'errors' => $validator->errors(),
            'status' => 400
        ];

        return response()->json($data, 400);
    }
```

Now you can update the data
```php
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->language = $request->language;
```

Other method to do the same
```php
    if ($request->has('name')) {
        $student->name = $request->name;
    }

    if ($request->has('email')) {
        $student->email = $request->email;
    }

    if ($request->has('phone')) {
        $student->phone = $request->phone;
    }

    if ($request->has('language')) {
        $student->language = $request->language;
    }
```

Save the student and return a response
```php

    $student->save();

    $data = [
        'message' => 'Student updated successfully',
        'student' => $student,
        'status' => 200
    ];

    return response()->json($data, 200);
```