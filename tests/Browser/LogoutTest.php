<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LogoutTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login') //Mengunjungi halaman login
                ->type('email', 'aziiz@gmail.com') //Mengisi kolom email dengan 'aziiz@gmail.com'
                ->type('password', 'aziiz123') //Mengisi kolom password dengan 'aziiz123'
                ->press('LOG IN') //Menekan tombol 'LOG IN' untuk login
                ->assertPathIs('/dashboard') //Memastikan setelah login, URL berubah menjadi '/dashboard'
                ->assertSee('Dashboard') //Memastikan teks 'Dashboard' muncul di halaman

            // Logout
                ->press('baziiz') //Klik tombol 'baziiz' untuk membuka menu pengguna
                ->clickLink('Log Out') //Klik tautan 'Log Out' untuk keluar
                ->assertPathIs('/') //Memastikan URL kembali ke halaman utama setelah logout
                ->assertSee('Log in'); //Memastikan teks 'Log in' muncul di halaman login

        });
    }
}
