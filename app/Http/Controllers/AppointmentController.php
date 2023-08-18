<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Appointment;
use Carbon\Carbon;

class AppointmentController extends Controller
{
    function takeAppointmet(Request $request){
        $validated = $request->validate([
            'table_id' => 'required|numeric',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time|',
        ]);
        $isUnique = Rule::unique('appointments')
        ->where(function ($query) use ($validated) {
            return $query->where('date', $validated['date'])
                ->where('start_time', $validated['start_time'])
                ->where('end_time', $validated['end_time'])
                ->where('table_id',$validated['table_id']);
        });
         $validated = $request->validate([
             'date' => ['required', 'date', $isUnique],
             'start_time' => ['required', 'date_format:H:i', $isUnique],
             'end_time' => ['required', 'date_format:H:i', 'after:start_time', $isUnique],
             'table_id' => ['required', 'numeric', $isUnique],
         ]);
        $validated['user_id'] = auth()->user()->id;
        $validated['accepted'] = 0;
        $validated['admin_responsed'] = 0;
        $validated['ended'] = 0;
        Appointment::create($validated);
        return response()->json([
            'message' => 'Appointment Created Successfully'
        ]);
    }
    function userAppointments(){
        return response()->json([
            'message' => 'retrived',
            'Appointments' => Appointment::where('user_id',auth()->user()->id)->get()
        ]);
    }
    function cancelAppointment(Appointment $appointment){
        if (Carbon::now()->startOfDay()->isBefore(Carbon::parse($appointment->date)->startOfDay())){
            $appointment->delete();
            return response()->json([
                'message' => 'appointment canceled Successfully',
            ]);
        }
        else{
            return response()->json([
                'message' => 'sorry you cant cancel the appointment in the same day',
            ]);
        }
    }
    function getAppointmentAdmin(){
        return response()->json([
            'message' => 'retrived',
            'Appointments' => Appointment::where('admin_responsed',0)->orWhere('admin_responsed',1)->where('accepted',1)->get()
        ]);
    }
    function AdminResponse(Appointment $appointment,Request $request){
        $appointment->update([
            'accepted' => $param1 = $request->query('accepted'),
            'admin_responsed'=>true
        ]);
        return response()->json([
            'message'=>'response sent'
        ]);
    }
}
