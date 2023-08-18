<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Models\Visitor;
use App\Models\Table;

class VisitorController extends Controller
{
    function makeVisit(Request $request){
        $validatedData = $request->validate([
            'table_id' => 'required|exists:tables,id',
            'end_time' => [
                'required',
                'date_format:H:i',
                Rule::notIn([now()->format('H:i')]),
            ],
        ]);

        $date = today()->format('Y-m-d');
        $overlappingAppointments = DB::select(
            'SELECT COUNT(*)
             FROM Appointments
             WHERE table_id = ?
             AND date = ?
             AND (? < End_time AND ? > start_time)
             And accepted = 1
             And ended = 0
             And user_id <>?
             ',
            [
                $validatedData['table_id'],
                $date,
                now()->format('H:i'),
                $validatedData['end_time'],
                auth()->user()->id
            ]
        )[0]->{'COUNT(*)'};

        if ($overlappingAppointments > 0) {
            return response()->json(['message' => 'Sorry This table is not available during the chosen duration.'], 422);
        }
        else{
            $visitor = Visitor::query()->create([
                'user_id'=>auth()->user()->id,
                'table_id'=>$validatedData['table_id'],
                'start_time'=> now()->format('H:i'),
                'end_time'=>$validatedData['end_time'],
                'date'=>$date
            ]);
            Table::find($validatedData['table_id'])->update([
                'available' => 0,
            ]);
            return response()->json([
                'message'=>'Welcome',
                'visitor'=>$visitor
            ]);
        }

    }
}
