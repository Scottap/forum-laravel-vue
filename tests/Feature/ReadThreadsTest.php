<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

class ReadThreadsTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();

        $this->thread = factory('App\Thread')->create();
    }

    /** @test */
    public function aUserCanViewAllThreads()
    {
        $response = $this->get('/threads')
            ->see($this->thread->title);
    }

    /** @test */
    public function aUserCanReadASingleThread()
    {
        $this->get('/threads/' . $this->thread->id)
            ->see($this->thread->title);
    }

    /** @test */
    public function aUserCanReadRepliesThatAreAssociatedWithAThread()
    {

        $reply = factory('App\Reply')
            ->create(['thread_id' => $this->thread->id]);

        $this->get('/threads/' . $this->thread->id)
            ->see($reply->body);

    }
}
