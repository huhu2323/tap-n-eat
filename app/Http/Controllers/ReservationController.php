<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Reservation;

class ReservationController extends Controller
{
	
	public function __construct()
    {
        $this->middleware('auth');
    }
	
    public function index()
    {
      $reservations = Reservation::all();
      Session::flash('module', 'reservation');
      return view('page.reservation.index',compact('reservations'));
    }

}
