<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EditNoteTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            // Login ke aplikasi
            $browser->visit('/login') 
            ->type('email', 'aziiz@gmail.com') //Mengisi kolom email dengan 'aziiz@gmail.com'
            ->type('password', 'aziiz123') //Mengisi kolom password dengan 'aziiz123'
            ->press('LOG IN') //Mengklik tombol 'LOG IN'
            ->assertPathIs('/dashboard') //Memastikan URL setelah klik tombol adalah '/dashboard'
            ->assertSee('Dashboard') //Memeriksa apakah teks 'Dashboard' muncul

            // Arahkan ke halaman Notes
            ->clickLink('Notes') //Klik tautan 'Notes'
            ->assertPathIs('/notes') //Memastikan URL setelah klik tautan adalah '/notes'
            ->assertSee('My New Note') //Memeriksa apakah teks 'My New Note' muncul

            // Melakukan Pengeditan pada Note
            ->press('@edit-1') //Klik tombol edit untuk note dengan ID '@edit-1'
            ->type('title', 'Test Note Update') //Mengubah kolom 'title' dengan 'Test Note Update'
            ->type('description', 'Ini updatean baru note') //Mengubah kolom 'description' dengan 'Ini updatean baru note'
            ->press('UPDATE'); //Klik tombol 'UPDATE' untuk menyimpan perubahan

        });
    }
}
