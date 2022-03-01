<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class NewsFormTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_empty_form()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                ->visit('/admin/news/create')
                ->assertSee('ADD AN ARTICLE')
                ->type('title', '')
                ->type('description', '')
                ->type('news_body', '')
                ->press('save')
                ->assertSee('The title field is required.')
                ->assertSee('The description field is required.')
                ->assertSee('The news body field is required.')
                ->assertSee('The publish date field is required.');
        });
    }


    public function test_signs_title()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                ->visit('/admin/news/create')
                ->type('title', 'one')
                ->press('save')
                ->assertSee('The title must be at least 10 characters.')
                ->type('title', 'Lorem Ipsum has been the industry dbs standard dummy text ever since the 1500s,')
                ->press('save')
                ->assertSee('The title must not be greater than 50 characters.')
                ->type('title', 'НОВОСТЬ ОНА И ЕСТЬ НОВОСТЬ')
                ->press('save')
                ->assertSee('The title has already been taken.');
        });
    }

    public function test_signs_description()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                ->visit('/admin/news/create')
                ->type('description', 'one')
                ->press('save')
                ->assertSee('The description must be at least 10 characters.')
                ->type('description', 'Lorem Ipsum has been the industry dbs standard dummy text ever since the 1500s,Lorem Ipsum has been the industry dbs standard dummy text ever since the 1500s,')
                ->press('save')
                ->assertSee('The description must not be greater than 100 characters.');
        });
    }
}
