<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Message extends Model
{
    use HasFactory;

    public function allMessages()
    {
        return DB::table('messages')
        ->orderBy('id','desc')
        ->where('del_flag', 0)
        ->paginate(10);
    }

    public function addMessage(Request $request)
    {
        DB::table('messages')->insert([
            'message' => $request->message,
            'sender_id' => $request->sender_id,
            'receiver_id' => $request->receiver_id,
            'is_vip' => $request->integer('is_vip'),
            'time' => $request->time,
        ]);
    }

    public function editMessage(Request $request, $id)
    {
        DB::table('messages')->where('id', $id)->update([
            'message' => $request->message,
            'sender_id' => $request->sender_id,
            'receiver_id' => $request->receiver_id,
            'is_vip' => $request->integer('is_vip'),
            'time' => $request->time,
            'updated_at' => now(),
        ]);
    }

    public function getMessage($id)
    {
        return DB::table('messages')->where('id', $id)->first();
    }

    public function deleteMessage($id)
    {
        DB::table('messages')->where('id', $id)->update([
            'del_flag' => 1,
            'updated_at' => now(),
        ]);
    }

    public function getNumberOfMessages()
    {
        return DB::table('messages')->where('del_flag', 0)->count();
    }

    public function getNumberOfVipMessages()
    {
        return DB::table('messages')->where('del_flag', 0)->where('is_vip', 1)->count();
    }

    public function getNumberOfNormalMessages()
    {
        return DB::table('messages')->where('del_flag', 0)->where('is_vip', 0)->count();
    }

    public function getNumberOfRecentMessages()
    {
        return DB::table('messages')->where('del_flag', 0)->where('created_at', '>=', now()->subDays(7))->count();
    }   
}
