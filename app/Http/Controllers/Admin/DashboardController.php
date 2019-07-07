<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Enums\ECommentType;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::query()
            ->where('status', ECommentType::pending)
            ->orderBy('id', 'DESC')
            ->take(10)
            ->get();

        $cpuUsage = round(exec("grep 'cpu ' /proc/stat | awk '{cpu_usage=($2+$4)*100/($2+$4+$5)} END {print cpu_usage}'"));
        $memoryUsed = round(exec("free | grep Mem | awk '{print $3/$2 * 100.0}'"));
        $hardUsage = exec("df -hT /home | grep 'dev' | awk '{usage=$6} {print usage}'");
        $hardUsage = str_replace('%', '', $hardUsage);

        return view('admin.dashboard', compact('comments', 'cpuUsage', 'memoryUsed', 'hardUsage'));
    }
}
