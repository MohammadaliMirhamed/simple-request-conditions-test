<p align="center"><a href="https://team.blue/" target="_blank"><img src="https://media.cdn.teamtailor.com/images/s3/teamtailor-production/logotype-v3/image_uploads/8749521e-c9ba-4553-b1f6-a1d0ca6db681/original.png" width="250"></a></p>

## About Team.Blue
We make online business success simpler

## Quick Start
- Create a copy from ```.env.example``` and name it as ```.env```
- ```composer install```
- ```./vendor/bin/sail up```
- ```./vendor/bin/sail artisan migrate```
- then the application serve over the ```http://localhost:8000```
- import ```team-blue-test.postman_collection.json``` into postman
- prepar your postman ```ENV``` then try it

### notice :
endpoints of this project is protecting by a auth system,
for fast try you can remove the ```['auth:api']``` middleware from process route

## Code
in this project following concepts has been used :
- Service Pattern
- SOILD Princples
- Dependency Injection

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
