<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Nurse extends Model
{
    use HasFactory;

    public function number_of_nurses()
    {
        return DB::table('nurses')->where('del_flag', 0)->count();
    }

    public function getAllNurses()
    {
        return DB::table('nurses')
            ->orderBy('id', 'desc')
            ->where('del_flag', 0)
            ->paginate(12);
    }

    public function addNurse(Request $request)
    {
        $nurse = new Nurse();
        $nurse->name = $request->name;
        $nurse->speciality = $request->speciality;
        $nurse->phone = $request->phone;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/nurses'), $imageName);
            $nurse->image = 'images/nurses/' . $imageName;
        }
        $nurse->save();
    }

    public function updateNurse(Request $request, string $id)
    {

        // Fetch the existing doctor record from the database
        $nurse = DB::table('nurses')->where('id', $id)->first();

        if (!$nurse) {
            return response()->json(['error' => 'Doctor not found'], 404);
        }

        $imageName = $nurse->image;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/nurses'), $imageName);

            $imageName = 'images/nurses/' . $imageName;
        }
        // Update the doctor record in the database
        DB::table('nurses')->where('id', $id)->update([
            'name' => $request->name,
            'speciality' => $request->speciality,
            'phone' => $request->phone,
            'image' => $imageName,
            'updated_at' => now(),
        ]);
    }

    public function getNurseById(string $id)
    {
        return DB::table('nurses')->where('id', $id)->first();
    }

    public function deleteNurse(string $id)
    {
        return DB::table('nurses')->where('id', $id)->update(['del_flag' => 1, 'updated_at' => now()]);
    }

    public function number_of_specialities()
    {
        return DB::table('nurses')
            ->where('del_flag', 0)
            ->distinct()
            ->count('speciality');
    }
}
