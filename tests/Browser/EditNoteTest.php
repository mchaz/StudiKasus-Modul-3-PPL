<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class EditNoteTest extends DuskTestCase
{
    // use DatabaseMigrations;

    /**
     * Test Create Note functionality.
     */
    public function EditNoteTest(): void
    {
        $this->browse(function (Browser $browser): void {
            // Login terlebih dahulu sebelum membuat note
            $browser->visit('/login')  
                ->type('email', 'aziiz@gmail.com')  // Mengisi email yang sudah terdaftar
                ->type('password', 'aziiz123')  // Mengisi password yang sesuai
                ->press('LOG IN')  // Menekan tombol login
                ->assertPathIs('/dashboard')  // Memastikan diarahkan ke halaman dashboard

            // Pergi ke halaman Notes
                ->assertSee('Notes')
                ->clickLink('Notes')
                ->assertSee('Create Note')  // Memastikan tombol "Create Note" ada
                ->clickLink('Create Note')  // Klik tombol untuk menuju halaman pembuatan note

            // Pergi ke halaman Create Note
                ->assertPathIs('/create-note')  // Memastikan kita berada di halaman create note
                ->assertSee('Title')  // Memastikan ada field Title
                ->assertSee('Description')  // Memastikan ada field Description
                ->type('title', 'My New Note2')  // Mengisi field Title
                ->type('description', 'This is the content of my new note2.')  // Mengisi field Description
                ->press('CREATE')  // Menekan tombol CREATE

            // Pergi ke halaman Edit Notes
                ->assertPathIs('/Notes')  // Memastikan ada link Notes
                ->click('@edit-button')  // Mengklik tombol Edit (gunakan selector yang tepat, misal ID atau class)
            
                ->assertSee('Title')  // Memastikan ada field Title
                ->assertSee('Description')  // Memastikan ada field Description
                ->type('title', 'My revisi note')  // Mengisi field Title
                ->type('description', 'This is the content of my new note22')  // Mengisi field Description
                ->press('UPDATE');  // Menekan tombol CREATE
        });
    }
}
