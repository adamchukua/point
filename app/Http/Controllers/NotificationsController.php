<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function notifications()
    {
        $notifications = auth()->user()->notifications()->latest()->paginate(10);

        return view('notifications.index', compact('notifications'));
    }

    public function read(Notification $notification)
    {
        $this->authorize('update', $notification);

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
