<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\OnlineBooking;
use App\Models\User;


class OnlineBookingController extends Controller
{
    public function sendTestNotification()
    {
        $data = [
        'body'             => 'You recieved a new text notification.',
        'onlinebookingText'   => 'You are allowed to book',
        'url'              => url('/'),
        'thankyou'       => 'You have 14 days to book',

    ];
    $user = User::first();

    // $user-> User::notify(new OnlineBooking($data));
     Notification::send($user, new OnlineBooking($data));
  }
}
