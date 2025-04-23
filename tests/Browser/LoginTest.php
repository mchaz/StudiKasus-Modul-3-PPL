<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;  // Ensure this line is present

class LoginTest extends DuskTestCase
{
    // use DatabaseMigrations;  // This allows you to run migrations during testing

    /**
     * Test Login functionality.
     */
    public function testLogin(): void
    {
        $this->browse(function (Browser $browser): void {
            // Mengunjungi halaman login
            $browser->visit('/login')  
                ->assertSee('Email')  // Memastikan ada field Email
                ->assertSee('Password')  // Memastikan ada field Password
                ->type('email', 'aziiz@gmail.com')  // Mengisi email yang telah didaftarkan
                ->type('password', 'aziiz123')  // Mengisi password yang sesuai
                ->check('remember')  // Menandai checkbox "Remember me"
                ->press('LOG IN');  // Menekan tombol LOG IN
        });
    }
}
