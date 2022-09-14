<?php

namespace Tests\Feature\Http\Controllers\Auth;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;
use Tests\Traits\ViewAssertions;
//use NunoMaduro\LaravelMojito\InteractsWithViews;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class LoginControllerTest extends TestCase
{
    use RefreshDatabase;
    use ViewAssertions;
   // use InteractsWithViews;



    /**
     * A basic feature test example.
     *
     * @return void
     */

    /** @test */
    public function test_User_can_login()
    {
        $user = User::factory()->create([
            'password' => bcrypt($password = 'laravel'),
        ]);
        $this->withSession(['_token'=>'token']);

        $response = $this->post(route('login'), [
            '_token' => 'token',
            'email' => $user->email,
            'password' => $password,
        ]);
        //dump($response);
        $response->assertRedirect('/');
        $this->assertAuthenticatedAs($user);


    }

    /*

    public function test_login_displays_the_login_form()
    {
        $this->expectViewFiles('paginas.inicio');
        $response = $this->get(('/'));

        $response->assertStatus(200);
        $this->expectViewFiles('paginas.pagina_web.login');
        $this->assertView('paginas.inicio');
        $this->assertView('paginas.inicio')->in('body')->has('#email');

    }


    public function test_User_can_login()
    {
        $user = factory(User::class)->create([
            'password' => bcrypt($password = 'laravel'),
        ]);
        $this->withSession(['_token'=>'token']);

        $response = $this->post(route('login'), [
            '_token' => 'token',
            'email' => $user->email,
            'password' => $password,
        ]);
//        dump($response);
        $response->assertRedirect('/');
        $this->assertAuthenticatedAs($user);
//        $this->expectViewFiles('paginas.inicio','paginas.pagina_web.login');
        $this->assertView('paginas.inicio')->hasLink("http://localhost/pagina_web/inicio") ;


    }

    public function test_user_can_logout(){

        $user = factory(User::class)->create([
            'password' => bcrypt($password = 'laravel'),
        ]);
        $this->withSession(['_token'=>'token']);

        $response = $this->post(route('login'), [
            '_token' => 'token',
            'email' => $user->email,
            'password' => $password,
        ]);

        $response->assertRedirect('/');
        $this->assertAuthenticatedAs($user);
        $this->assertAuthenticated($guard = null);

        $this->assertView('paginas.inicio')->hasLink("http://localhost/pagina_web/inicio");
        $this->withSession(['_token'=>'token']);
        $response = $this->actingAs($user)->post(route('logout'),['_token' => 'token',]);
//        dump($response);
        $response->assertRedirect('/');
        dump(env('APP_ENV'));
        dump(env('DB_DATABASE'));
        $this->assertGuest($guard = null);
//        $this->assertView('paginas.inicio')->in('body')->has('#email');
//        $this->assertGuest();

    }

    public function test_User_Admin_displays_the_Home()
    {

        $this->expectViewFiles('paginas.inicio');
        $response = $this->get(('/'));

        $response->assertStatus(200);
        $this->expectViewFiles('paginas.pagina_web.login');
        $this->assertView('paginas.inicio');
        $this->assertView('paginas.inicio')->in('body')->has('#email');

    }*/


}
