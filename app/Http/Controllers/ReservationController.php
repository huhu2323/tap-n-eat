<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Reservation;

class ReservationController extends Controller
{
	
    public function index()
    {
      $reservations = Reservation::latest()->get();
      Session::flash('module', 'reservation');
      return view('page.reservation.index',compact('reservations'));

    }
    public function accept()
    {
      $reservations = Reservation::latest()->get();
      Session::flash('module', 'reservation');
      return redirect()->route('reservation.index');

    }
    public function reject()
    {
      $reservations = Reservation::latest()->get();
      Session::flash('module', 'reservation');
      return redirect()->route('reservation.index');

    }
}
