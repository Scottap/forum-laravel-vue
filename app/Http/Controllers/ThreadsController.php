<?php

namespace App\Http\Controllers;

use App\Thread;

class ThreadsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $threads = Thread::all();

        return view('threads.index', compact('threads'));
    }

    /**
     * @param Thread $thread
     * @return Thread
     */
    public function show(Thread $thread)
    {
        return view('threads.show', compact('thread'));
    }

}
