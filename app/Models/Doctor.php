<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Doctor extends Model
{
    use HasFactory;

    public function number_of_doctors()
    {
        return DB::table('doctors')->where('del_flag', 0)->count();
    }

    public function getAllDoctors()
    {
        return DB::table('doctors')
            ->orderBy('id', 'desc')
            ->where('del_flag', 0)
            ->paginate(12);
    }

    public function allDoctors()
    {
        return DB::table('doctors')->get();
    }

    public function addDoctor(Request $request)
    {
        $doctor = new Doctor();
        $doctor->name = $request->name;
        $doctor->speciality = $request->speciality;
        $doctor->phone = $request->phone;

        //dd($request->file('image'));

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/doctors'), $imageName);
            $doctor->image = 'images/doctors/' . $imageName;
        }
        $doctor->save();
    }

    public function updateDoctor(Request $request, string $id)
    {

        // Fetch the existing doctor record from the database
        $doctor = DB::table('doctors')->where('id', $id)->first();

        if (!$doctor) {
            return response()->json(['error' => 'Doctor not found'], 404);
        }
      
        $imageName = $doctor->image;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/doctors'), $imageName);

            $imageName = 'images/doctors/' . $imageName;
        }
        // Update the doctor record in the database
        DB::table('doctors')->where('id', $id)->update([
            'name' => $request->name,
            'speciality' => $request->speciality,
            'phone' => $request->phone,
            'image' => $imageName,
            'updated_at' => now(),
        ]);
    }

    public function checkDuplicateDoctor(Request $request)
    {
        return DB::table('doctors')->where('phone', $request->phone)->where('del_flag', 0)->exists();
    }


    public function getDoctorById(string $id)
    {
        return DB::table('doctors')->where('id', $id)->first();
    }

    public function deleteDoctor(string $id)
    {
        return DB::table('doctors')->where('id', $id)->update(['del_flag' => 1, 'updated_at' => now()]);
    }

    public function number_of_specialities()
    {
        return DB::table('doctors')
            ->where('del_flag', 0)
            ->distinct()
            ->count('speciality');
    }
}
