<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Auth;
use function back;
use function compact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function view;

class NotificationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $notifications = Auth::user()->notifications()->paginate(20);
        Auth::user()->markAsRead();
        return view('notifications.index', compact('notifications'));
    }

    public function destroy()
    {

        DB::table('notifications')->where('notifiable_id',Auth::id())->delete();
        return back();
    }
}
