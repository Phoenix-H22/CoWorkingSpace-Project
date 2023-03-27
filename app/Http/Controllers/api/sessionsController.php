<?php

namespace App\Http\Controllers\api;

use App\Models\sessions;
use App\Models\settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Carbon\CarbonInterval;
class sessionsController extends Controller
{
    public static function getDifference($created_at, $now) {

        $to = Carbon::createFromFormat('Y-m-d H:i:s', $created_at, 'Africa/Cairo');
        $from = Carbon::createFromFormat('Y-m-d H:i:s', $now , 'Africa/Cairo');
        // set the timezone to Cairo
         $to->setTimezone('Africa/Cairo');
        $from->setTimezone('Africa/Cairo');

        // $diff_in_years = $to->diffInYears($from);
        // $diff_in_months = $to->diffInMonths($from);
        // $diff_in_weeks = $to->diffInWeeks($from);
        $diff_in_days = $to->diffInDays($from);
        $diff_in_hours = $to->diffInHours($from->subDays($diff_in_days));
        $diff_in_minutes = $to->diffInMinutes($from->subHours($diff_in_hours));
        // $diff_in_seconds = $to->diffInSeconds($from->subMinutes($diff_in_minutes));
        $total_time = CarbonInterval::hours($diff_in_hours)->minutes($diff_in_minutes)->forHumans();
        return [
            'total_time' => $total_time,
            'diff_hours' => $diff_in_hours,
            'diff_minutes' => $diff_in_minutes,
        ];
    }
    public static function scan(Request $request){
        // validate the request
        $request->validate([
            'card_id' => 'required|numeric',
        ]);
        date_default_timezone_set('Africa/Cairo');
        $card_id    = $request->card_id;
        // i want to get the current time in Cairo

        $now = Carbon::now('Africa/Cairo')->toDateTimeString();
    // return $request->json(200,["data"=>$now]);
    $session = sessions::where('card_id', $card_id)->first();

    if ($session && $session->end_time == null){
        $total_time = sessionsController::getDifference($session->created_at, $now);
        $price_per_hour = settings::select('price_per_hour')->first();
        $price_per_hour = $price_per_hour->price_per_hour;
        $total_time_in_hours = $total_time['diff_hours'] + ($total_time['diff_minutes'] / 60);
        $total_price = $total_time_in_hours * $price_per_hour;
        $session->update([
            'updated_at' => Carbon::now(),
            'end_time' => $now,
            'total_time' => $total_time_in_hours,
            'total_price' => round($total_price)
        ]);
        return response()->json([
            'status' => 'success',
            'message' => 'Session found',
            'data' => [
                'Total Time' => $total_time,
                'Total Price' => round($total_price),
                'Start Time' => $session->start_time,
                'End Time' => $now,
            ]
        ],200);
    }
    elseif ($session && $session->end_time != null){
        return response()->json([
            'status' => 'error',
            'message' => 'Session already ended',
            'data' => [
                'Total Time' => $session->total_time_in_hours,
                'Total Price' => $session->total_price,
                'Start Time' => $session->start_time,
                'End Time' => $session->end_time,
            ]
        ],200);
    }
    else{
       sessions::create([
           'card_id' => $card_id,
            'start_time' => $now,
       ]);
         $session = sessions::where('card_id', $card_id)->first();
         return response()->json([
              'status' => 'success',
              'message' => 'Session created',
              'data' => [
                'Start Time' => now()->format('H:i A'),
              ]
         ],200);

    }
}
// reset session
public function reset(Request $request){
    $card_id = $request->card_id;
    $session = sessions::where('card_id', $card_id)->first();
    if ($session && $session->end_time != null){
        $session->update([
            'end_time' => null,
            'total_time' => null,
            'total_price' => null,
        ]);
        return response()->json([
            'status' => 'success',
            'message' => 'Session reset successfully',
            'data' => [
                'Start Time' => $session->start_time,
            ]
        ]);
    }
    else{
        return response()->json([
            'status' => 'error',
            'message' => 'Session not found',
            'data' => [
                'Start Time' => $session->start_time,
                'End Time' => $session->end_time,
            ]
        ]);
    }
}
}
