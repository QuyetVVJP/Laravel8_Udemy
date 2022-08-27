<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\Model' => 'App\Policies\ModelPolicy',
        'App\Model\BlogPost' => 'App\Polices\BlogPostPolicy'
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('home.secret', function($user){
            return $user->is_admin;
        });

        // Gate::define('update-post', function($user, $post){
        //     return $user->id == $post->user_id;
        // });

        // Gate::define('delete-post', function($user, $post){
        //     return $user->id == $post->user_id;
        // });

        // Gate::define('posts.update', 'App\Policies\BlogPostPolicy@update');
        // Gate::define('posts.delete', 'App\Policies\BlogPostPolicy@delete');

        // Gate là một bộ lọc khác mà laravel cung cấp để thực hiện việc xác thực
        //  user có được phép hay không thực hiện một hành động cụ thể
        // Gate::resource('posts', 'App\Policies\BlogPostPolicy');

        Gate::before(function($user, $ability){
            // Kiem tra user co phai admin ko?
            // Cho phep admin update, ko cho Delete
            if($user->is_admin && in_array($ability, ['update'])){
                return true;
            }
        });

        // Gate::after(function($user, $ability, $result){

        //     if($user->is_admin){
        //         return true;
        //     }
        // });
    }
}
