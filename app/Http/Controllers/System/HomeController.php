<?php

namespace AgenciaS3\Http\Controllers\System;

use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Repositories\TaskUserRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $taskUserRepository;

    public function __construct(TaskUserRepository $taskUserRepository)
    {
        $this->taskUserRepository = $taskUserRepository;
        $this->middleware('auth');
    }

    public function index()
    {
        $config = $this->header();
        $user_id = \Auth::user()->id;
        $tasks = $this->taskUserRepository->getUserTaks($user_id, 20);

        return view('system.home.index', compact('config', 'tasks'));
    }

    public function header()
    {
        $config['title'] = "Dashboard";
        $config['activeMenu'] = 'dashboard';
        $config['titleMenu'] = '';

        return $config;
    }

}
