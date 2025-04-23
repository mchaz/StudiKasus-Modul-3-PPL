<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DeleteTest extends DuskTestCase
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

        // Menghapus Catatan
            ->clickLink('Notes') //Klik tautan 'Notes' untuk membuka halaman daftar catatan
            ->assertPathIs('/notes') //Memastikan URL berubah menjadi '/notes'
            ->assertSee('baru2') //Memastikan catatan dengan nama 'baru2' muncul di halaman
            ->press('Delete'); //Klik tombol 'Delete' untuk menghapus catatan

        });
    }
}
