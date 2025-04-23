<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EditNoteTestrev extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser): void {
            // Login terlebih dahulu sebelum membuat note
            $browser->visit('/login')  
                ->type('email', 'aziiz@gmail.com')  // Mengisi email yang sudah terdaftar
                ->type('password', 'aziiz123')  // Mengisi password yang sesuai
                ->press('LOG IN')  // Menekan tombol login
                ->assertPathIs('/dashboard')  // Memastikan diarahkan ke halaman dashboard

            // Pergi ke halaman Notes
                ->clickLink('Notes')  // Klik link untuk pergi ke halaman notes
                ->assertSee('My New Note')  // Memastikan note yang telah dibuat ada di halaman
                ->clickLink('edit-1')  // Klik link untuk mengedit note
                ->assertPathIs('/edit-note-page/1')  // Memastikan diarahkan ke halaman edit note sesuai dengan ID
                ->assertSee('Title')  // Memastikan ada field Title di halaman edit
                ->assertSee('Description')  // Memastikan ada field Description di halaman edit

            // Mengubah Title dan Description pada form edit
                ->type('title', 'My Edited Note')  // Mengubah title
                ->type('description', 'This is the updated content of my note.')  // Mengubah description
                ->press('UPDATE');  // Menekan tombol UPDATE untuk menyimpan perubahan

        });
    }
}
