<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Type\Time;

class Drug extends Model
{
    use HasFactory;

    public function allDrugs()
    {
        return DB::table('drugs')
        ->orderBy('id','desc')
        ->where('del_flag',0)
        ->paginate(10);
    }

    public function addNewDrug(Request $request){
        return DB::table('drugs')
        ->insert([
            'name' => $request->drug_name,
            'dosage' => $request->dosage,
            'quantity' => $request->quantity,
            'price' => $request->price,
        ]);
    }

    public function getDrugById($id)
    {
        return DB::table('drugs')
            ->where('id', $id)
            ->first();
    }

    public function updateDrug(Request $request, $id)
    {
        return DB::table('drugs')
            ->where('id', $id)
            ->update([
                'name' => $request->drug_name,
                'dosage' => $request->dosage,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'updated_at' => now(),
            ]);
    }

    public function deleteDrug($id)
    {
        return DB::table('drugs')
            ->where('id', $id)
            ->update(['del_flag' => 1, 
            'updated_at' => now()]);
    }

    public function checkDuplicateDrug($request)
    {
        return DB::table('drugs')
            ->where('name', $request->drug_name )
            ->where('dosage', $request->dosage)
            ->where('del_flag', 0)
            ->exists();
    }

    public function getTotalDrugs()
    {
        return DB::table('drugs')
            ->where('del_flag', 0)
            ->count();
    }

    public function getTotalCategories()
    {
        return DB::table('drugs')
            ->where('del_flag', 0)
            ->distinct()
            ->count('name');
    }

    public function getTotalOutOfStock()
    {
        return DB::table('drugs')
            ->where('del_flag', 0)
            ->where('quantity', 0)
            ->count();
    }

    public function getTotalLowStock()
    {
        return DB::table('drugs')
            ->where('del_flag', 0)
            ->where('quantity', '>', 0)
            ->where('quantity', '<', 10)
            ->count();
    }

    
}
