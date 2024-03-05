<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use Barryvdh\DomPDF\PDF;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $reservations = Reservation::with(['Events' => function ($query) {
            $query->where('users_id', Auth::id());
        }])
        ->where('accepted', false)
        ->get();
        return view('Reservations.index',compact('reservations'));
    }

    public function get_reservations()
    {
        $Reservatin_cl=Reservation::where('user_id',Auth::id())->get();
       
        return view('Reservations.index',compact('Reservatin_cl'));
    }
    public function get_tiket_byEmail(Reservation $item){
        
        $user=User::where('id',Auth::id())->first();
        $this->send_tiket_byEmail($user, $item);
        return redirect()->route('get_reservations')->with('success','Reservation deleted successfuly !!');

    }
    private function send_tiket_byEmail($user, $item)
    {
        $data = ['user' => $user, 'item' => $item];
    
        Mail::send('emails.ticket', $data, function ($message) use ($user) {
            $message->to($user->email, $user->name)
                ->subject('Your ticket has been sent');
        });
    }
    public function generate_pdf(Reservation $item){
       
        $pdf = app('dompdf.wrapper')->loadView('pdf.ticket', compact('item'));

    return $pdf->download('ticket.pdf');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Event_id'=>'required',
        ]);
       $Event=Event::find($request->input('Event_id'));
       if($Event->status =='auto'){
        $validate = true;
       }else{
        $validate = false;
       }
       Reservation::create([
         'Event_id'=>$request->Event_id,
         'user_id'=>Auth::id(),
         'accepted'=>$validate,
       ]);
       return redirect()->route('/');

       
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $Reservation)
    {
        $Reservation->accepted=true;
        $Reservation->update();
        return redirect()->route('Reservation.index')->with('success','Reservation accepted successfuly !!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $Reservation)
    {
        $user=User::where('id',Auth::id())->first();
        $Reservation->delete();
        if($user->hasRole('organosator')){
            return redirect()->route('Reservation.index')->with('success','Reservation deleted successfuly !!');

        }else{
            return redirect()->route('get_reservations')->with('success','Reservation deleted successfuly !!');

        }

    }
}
