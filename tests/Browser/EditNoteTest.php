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
            ->type('email', 'aziiz@gmail.com')//mengisi input yang memiliki atribut name email.
            ->type('password', 'aziiz123')//mengisi input yang memiliki atribut name password.
            ->press('LOG IN')//menekan tombol ‘LOG IN’
            ->assertPathIs('/dashboard')//memastikan url setelah menekan tombol sebelumnya
            ->assertSee('Dashboard')//melihat teks ‘Dashboard’

            //Pergi ke halaman Notes
            ->clickLink('Notes')//menekan tautan ‘Notes’
            ->assertPathIs('/notes')//memastikan url setelah menekan tautan sebelumnya
            ->assertSee('Test Note')//melihat teks ‘Notes’

            //Edit Note
            ->press('@edit-1')//memastikan url setelah menekan tautan sebelumnya
            ->assertSee('Edit Note')//melihat teks ‘Edit Note’
            ->type('title', 'Test Note Update')//mengisi input yang memiliki atribut name title.
            ->type('description', 'Ini updatean baru note')//mengisi input yang memiliki atribut name description.
            ->press('UPDATE')//menekan tombol ‘Update’
            ->assertPathIs('/notes');//memastikan url setelah menekan tombol sebelumnya
        });
    }
}
