<?php

namespace App\Providers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    /* public function boot()
    {
    //
    } */
    public function boot(Dispatcher $events)
    {

        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            /* if (Auth::guest()) {
                //dd(Auth::guest());
                return redirect()->route('user.getLogin');
               
            }else{
                
            } */
            if (Auth::check()){
                if (Auth::user()->roles->first()->name=='cliente'){
                    $rol =Auth::user()->roles->first()->name;
                    $ruta='user';
                }
                if (Auth::user()->roles->first()->name=='admin'){
                    $rol =Auth::user()->roles->first()->name;
                    $ruta='admin';
                }
            }
          
                

            $event->menu->add('MAIN NAVIGATION');
            $event->menu->add(
                [
                    'type' => 'fullscreen-widget',
                    'topnav_right' => true,
                ],
                [
                    'text' => 'blog',
                    'url' => 'admin/blog',
                    'can' => 'manage-blog',

                ],
                [
                    'header' => 'Rol: '.$rol,
                ],
                [
                    'text' => 'Inicio',
                    'icon' => 'far fa-solid fa-house',
                    'url' => $ruta.'/home',
                    'roles' => [
                        'admin',
                        'cliente'
                    ],
                ],
                [
                    'text' => 'Calendario de citas',
                    'url' => 'admin/calendario',
                    'icon' => 'far fa-fw fa-calendar',
                    'roles' => [
                        'admin',
                        ''
                    ],
                ],
                [
                    'text' => 'Lista de  citas',
                    'url' => 'admin/citas',
                    'icon' => 'far fa-fw fa-calendar',
                    'roles' => [
                        'admin',
                        ''
                    ],
                ],
                [
                    'text' => 'Reservar cita',
                    'url' => $ruta.'/reservarCita',
                    'icon' => 'far fa-sharp fa-solid fa-bullseye',
                    'roles' => [
                        'admin',
                        'cliente'
                    ],

                ],
                [
                    'text' => 'Mis citas',
                    'url' => $ruta.'/misCitas',
                    'icon' => 'far fa-sharp fa-solid fa-bullseye',
                    'roles' => [
                        
                        'cliente'
                    ],

                ],
                [
                    'text' => 'Clientes',
                    'url' => 'admin/clientes',
                    'icon' => 'far fa-fw fa-user',
                    //'can'         => 'admin.clientes.index',
                    'roles' => [
                        'admin',
                        
                    ],
                ],
                [
                    'text' => 'pages',
                    'url' => 'admin/pages',
                    'icon' => 'far fa-fw fa-file',
                    'label' => 4,
                    'label_color' => 'success',
                    'roles' => [
                        'admin',
                        
                    ],
                ],
                ['header' => 'account_settings'],
                [
                    'text' => 'profile',
                    'url' => $ruta.'/settings',
                    'icon' => 'fas fa-fw fa-user',
                    'roles' => [
                        'admin',
                        'cliente'
                    ],
                ],
                [
                    'text' => 'change_password',
                    'url' => $ruta.'/settings/password',
                    'icon' => 'fas fa-fw fa-lock',
                    'roles' => [
                        'admin',
                        'cliente'
                    ],
                ],
                [
                    'text' => 'Cerrar sesión',
                    'url' => '/logout',
                    'icon' => 'fas fa-fw fa-sign-out',
                ],
                [
                    'text' => 'Tipo de usuario',
                    'icon' => 'users',
                    'url' => $ruta . '/tipo',
                    'roles' => 'admin'
                ]

            );
        });
    }
}