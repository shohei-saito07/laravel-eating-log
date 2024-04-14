<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user();

        // 予約に紐づく店舗を取得
        $reservations = Reservation::where('user_id', $user->id)->get();

        return view('reservation.index', compact('reservations'));
    }

    /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
      public function create()
      {
          //
      }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // TODOバリデーションチェックを入れる
        $userId = Auth::id();

        $reservation = new Reservation();
        $reservation->user_id = $userId;
        $reservation->store_name = $request->input('name');
        $reservation->number = $request->input('number');
        $reservation->date = $request->input('reservation_date');
        $reservation->store_id = $request->input('id');
        $reservation->save();
    
        return redirect()->route('reservation.index');
    }

    public function destroy($reservation_id)
    {
        Reservation::destroy($reservation_id);
        return redirect()->route('reservation.index');
    }
}
