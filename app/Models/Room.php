<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Room extends Model
{
    use HasFactory;

    public function getAllRooms(){
        return DB::table('rooms')
        ->orderBy('id', 'desc')
        ->where('del_flag', 0)
        ->paginate(10);
    }

    public function allRooms(){
        return DB::table('rooms')->get();
    }

    public function addNewRoom(Request $request ){
        return DB::table('rooms')
        ->insert([
            'room_no' => $request->room_number,
            'status' => $request->status,
            'quantity' => $request->quantity,
            'price' => $request->price,
        ]);
    }

    public function getRoomById($id){
        return DB::table('rooms')
        ->where('id', $id)
        ->first();
    }

    public function updateRoom(Request $request, $id){
        return DB::table('rooms')
        ->where('id', $id)
        ->update([
            'room_no' => $request->room_number,
            'status' => $request->status,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'updated_at' => now(),
        ]);
    }

    public function deleteRoom($id){
        return DB::table('rooms')
        ->where('id', $id)
        ->update([
            'del_flag' => 1,
            'updated_at' => now(),
        ]);
    }

    public function checkDuplicateRoom(Request $request){
        return DB::table('rooms')
        ->where('room_no', $request->room_number)
        ->first();

    }

    public function number_of_rooms()
    {
        return DB::table('rooms')->count();
    }

    public function number_of_available_rooms()
    {
        return DB::table('rooms')->where('status', 'available')->count();
    }

    public function total_revenue()
    {
        return DB::table('rooms')->sum('price');
    }

    public function monthly_revenue()
    {
        return DB::table('rooms')->whereMonth('created_at', date('m'))->sum('price');
    }

    public function number_of_active_rooms()
    {
        return DB::table('rooms')->where('status', 'active')->count();
    }

    public function number_of_locked_rooms()
    {
        return DB::table('rooms')->where('status', 'locked')->count();
    }

    public function current_year_revenue()
{
    // Initialize an array with 12 zeros (for each month)
    $monthlyRevenue = array_fill(0, 12, 0);

    // Fetch revenue grouped by month
    $revenues = DB::table('rooms')
        ->where('del_flag', 0) // Only include active rooms
        ->whereYear('created_at', date('Y')) // Filter by current year
        ->select(DB::raw('MONTH(created_at) as month'), DB::raw('SUM(price) as total_price'))
        ->groupBy(DB::raw('MONTH(created_at)')) // Group by month
        ->get();

    // Loop through the results and populate the monthly revenue array
    foreach ($revenues as $revenue) {
        // Fill the array with the revenue in the correct month position (index is month - 1)
        $monthlyRevenue[$revenue->month - 1] = $revenue->total_price;
    }

    return $monthlyRevenue; // This will return an array like [100, 200, 300, ..., 0]
}

}
