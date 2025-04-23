<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ShowTest extends DuskTestCase
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
            ->press('LOG IN') //Menekan tombol 'LOG IN' untuk masuk
            ->assertPathIs('/dashboard') //Memastikan setelah login, URL berubah ke '/dashboard'
            ->assertSee('Dashboard') //Memastikan teks 'Dashboard' terlihat di halaman

        // Halaman Notes
            ->clickLink('Notes') //Klik tautan 'Notes' untuk membuka halaman daftar catatan
            ->assertPathIs('/notes') //Memastikan URL berubah menjadi '/notes'
            ->assertSee('Test Note Update') //Memastikan catatan dengan judul 'Test Note Update' muncul
            ->clickLink('Test Note Update') //Klik catatan 'Test Note Update' untuk melihat detailnya
            ->assertPathIs('/note/1') //Memastikan URL berubah ke halaman detail catatan
            ->assertSee('Test Note Update'); //Memastikan teks 'Test Note Update' terlihat di halaman detail

        });
    }
}
