<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $unanswered_count = ContactMessage::query()->where('is_answered',0)->count();
        $registred_users_count = User::query()->where('is_active',1)->count();
        $total_messages = ContactMessage::query()->count();
        $last_7_days_messages = ContactMessage::query()->where('created_at', '>=', now()->subDays(7))->count();
        $last_7_days_users = User::query()->where('is_active', 1)->where('created_at', '>=', now()->subDays(7))->count();
        $recent_messages = ContactMessage::orderBy('created_at', 'desc')->take(5)->get();

        if($total_messages > 0)
            $percentage = round(($last_7_days_messages / $total_messages) * 100);
        else
            $percentage = 0;

        return view('admin.dashboard.index',
            compact('unanswered_count',
            'registred_users_count',
            'total_messages',
            'percentage',
            'last_7_days_messages',
            'last_7_days_users',
            'recent_messages'
        ));
    }
}
