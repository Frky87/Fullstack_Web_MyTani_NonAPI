<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrackingPacketController extends Controller
{
    public function index()
    {
        return view('user.tracking.trackingPacket');
    }
}
