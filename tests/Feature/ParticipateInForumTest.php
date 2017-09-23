<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

class ParticipateInForum extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function unauthenticatedMayNotAddReplies()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $this->post('threads/1/replies', []);
    }

    /** @test */
    public function anAuthenticatedUserMayParticipateInForumThread()
    {
        //Set the currently logged in user for the application.
        $this->be($user = factory('App\User')->create());
        $thread = factory('App\Thread')->create();
        $reply  = factory('App\Reply')->make();

        $this->post($thread->path().'/replies', $reply->toArray());
        $this->get($thread->path())
            ->see($reply->body);
    }
}
