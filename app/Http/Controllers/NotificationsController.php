<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function notifications()
    {
        $notifications = auth()->user()->notifications()->paginate(10);

        return view('notifications', compact('notifications'));
    }

    public function read(Notification $notification)
    {
        $notification->checked = !$notification->checked;
        $notification->save();

        return redirect('/notifications');
    }

    public function allRead()
    {
        $user = auth()->user();
        $notifications = $user->notifications;

        foreach ($notifications as $notification) {
            $notification->checked = true;
            $notification->save();
        }

        return redirect('/notifications');
    }
}
