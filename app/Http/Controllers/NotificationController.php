<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;

class NotificationController extends Controller
{
    public function markNotiAsRead($notification, $type)
    {
        $user = User::find(auth()->user()->id);
        $user->unreadNotifications->markAsRead();
        if ($type == 'notice') {
            return redirect()->route('employee.notice');
        } elseif ($type == 'EmployeeLeaveStatusNotification') {
            return redirect()->route('employee.leaves.index');
        } elseif ($type == 'AdminLeavesNoti') {
            return redirect()->route('admin.leaves.index');
        }
    }
}
