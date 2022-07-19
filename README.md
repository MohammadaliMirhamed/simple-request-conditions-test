<p align="center"><a href="https://team.blue/" target="_blank"><img src="https://media.cdn.teamtailor.com/images/s3/teamtailor-production/logotype-v3/image_uploads/8749521e-c9ba-4553-b1f6-a1d0ca6db681/original.png" width="400"></a></p>

## About Independesk

Independesk helps you to keep track of your company&#039;s New Work process. ✓ Individual hybrid work concept ✓ Coworking ✓ Management of own workplaces

## Quick Start
- Create a copy from ```.env.example``` and name it as ```.env```
- ```composer install```
- ``` npm install ```
- ```./vendor/bin/sail up```
- ```./vendor/bin/sail artisan migrate --seed```
- then the application serve over the ```http://localhost:8000```
### Notice:
Organization structure has been provided as ```Laravel Seed```, no need for ```SQL``` file

## Routes
| Url                          | About                      | Auth |
|------------------------------|----------------------------|------|
| ```/```                      | See Organization Structure | No   |
| ```/management/employee```   | Manage Employees           | Yes  |
| ```/management/division```   | Manage Divisions           | Yes  |
| ```/management/department``` | Manage Departments         | Yes  |
| ```/management/team```       | Manage Teams               | Yes  |
| ```/login```                 | Login User                 | No   |
| ```/register```              | Register User              | No   |

### Notice:
Register as user befor going to ```management``` routes

## Telescope
after registration as user go to ``` independesk/app/Providers/TelescopeServiceProvider.php ```
then add your user's email in ``` gate ``` method:
```
 /**
     * Register the Telescope gate.
     *
     * This gate determines who can access Telescope in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewTelescope', function ($user) {
            return in_array($user->email, [
                'name@example.com',
            ]);
        });
    }
```
after that open the ```/telescope``` route to monitor your application.

## What's Run
- Laravel
- Telescope (Application monitoring)
- Redis
- MariaDB
- Docker
