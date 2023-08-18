<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class TableController extends Controller
{
    public function index(){
        $tables = Table::select('id','num_of_chairs','available','position')->get();
        return response()->json(['tables' => $tables], 200);
    }
    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'num_of_chairs' => 'required|integer',
            'position' => 'required|boolean',
            'available' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $table = Table::create($request->all());

        return response()->json([
            'message'=>'table created successfully',
            'table' => $table], 201);
    }
    public function toggleAvailability(Request $request, Table $table)
    {
        $selected_table = Table::find($table->id);
        $selected_table->update(['available'=>!$selected_table->available]);
        return response()->json([
            'message'=>'availability toggled successfully',
        ],200);
    }
    public function delete(Table $table)
    {
        $table->delete();
        return response()->json(['message'=>'table deleted successfully'], 200);
    }
    public function getReservations(Table $table){
        return response()->json([
            'message' => 'retrived',
            'Reservations' => Table::where('id',$table->id)->first()
            ->appointments()->get()->map(function ($appointment){
                 return [
                        'ended'=>$appointment->ended,
                        'date'=>$appointment->date,
                        'start_time'=>$appointment->start_time,
                        'end_time'=>$appointment->end_time
                        ];
            })
            ->filter(function($appointment){
                return Carbon::parse($appointment['date'])->startOfDay()->equalTo(Carbon::now()->startOfDay()) && $appointment['ended'] === 0;
            })
        ]);
    }
}
