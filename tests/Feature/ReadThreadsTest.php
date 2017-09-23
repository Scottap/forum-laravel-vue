<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

class ReadThreadsTest extends TestCase
{
    use DatabaseMigrations;

    protected $thread;

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
        $this->get($this->thread->path())
            ->see($this->thread->title);
    }

    /** @test */
    public function aUserCanReadRepliesThatAreAssociatedWithAThread()
    {

        $reply = factory('App\Reply')
            ->create(['thread_id' => $this->thread->id]);

        $this->get($this->thread->path())
            ->see($reply->body);

    }
}
