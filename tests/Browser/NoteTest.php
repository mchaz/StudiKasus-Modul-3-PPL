<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class NoteTest extends DuskTestCase
{
    // use DatabaseMigrations;

    /**
     * Test Create Note functionality.
     */
    public function testCreateNote(): void
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
                ->type('title', 'My New Note')  // Mengisi field Title
                ->type('description', 'This is the content of my new note.')  // Mengisi field Description
                ->press('CREATE');  // Menekan tombol CREATE
        });
    }
}
