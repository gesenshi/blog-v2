<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subscription;

class SubscribeController extends Controller
{

    public function subscribe(User $user)
    {
        $currentUser = auth()->user();

        $isSubscribed = $currentUser->subscriptions()->where('target_user_id', $user->id)->exists();

        if (!$isSubscribed) {
            $currentUser->subscriptions()->create(['target_user_id' => $user->id]);
        } else {
            $currentUser->subscriptions()->where('target_user_id', $user->id)->delete();
        }

        return back();    
    }
}