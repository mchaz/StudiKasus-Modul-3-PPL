<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RegisterTest extends DuskTestCase
{


    /**
     * Test Register functionality.
     */
    public function testRegister(): void
    {
        $this->browse(function (Browser $browser): void {
            $browser->visit('/register')  // Mengunjungi halaman registrasi
                ->assertSee('Name')  // Memastikan ada field Name
                ->assertSee('Email')  // Memastikan ada field Email
                ->assertSee('Password')  // Memastikan ada field Password
                ->assertSee('Confirm Password')  // Memastikan ada field Confirm Password
                ->type('name', 'baziiz')  // Mengisi nama
                ->type('email', 'aziiz@gmail.com')  // Mengisi email
                ->type('password', 'aziiz123')  // Mengisi password
                ->type('password_confirmation', 'aziiz123')  // Mengisi konfirmasi password
                ->press('REGISTER')  // Menekan tombol REGISTER
                ->assertPathIs('/dashboard');  // Memastikan setelah registrasi, diarahkan ke halaman dashboard
        });
    }
}
