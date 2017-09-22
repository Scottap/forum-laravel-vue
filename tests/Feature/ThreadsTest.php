<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

class ThreadsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function anUserCanViewAllThreads()
    {
        $thread   =  factory('App\Thread')->create();

        $response = $this->get('/threads');
        $response->assertViewMissing($thread->title);

        $response = $this->get('/threads');
        $response->assertViewMissing($thread->title);
    }

    /** @test */
    public function anUserCanReadASingleThread()
    {
        $thread   =  factory('App\Thread')->create();

        $response = $this->get('/threads/' . $thread->id);
        $response->assertViewMissing($thread->title);
    }
}
