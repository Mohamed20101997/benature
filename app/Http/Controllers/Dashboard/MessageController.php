<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:read_messages'])->only('index');
        $this->middleware(['permission:delete_messages'])->only('destroy');
    }


    public function index()
    {
        $messages = Message::orderBy('id','DESC')->paginate(PAGINATION_COUNT);
        return view('dashboard.messages.index',compact('messages'));
    }

    public function destroy($id)
    {
        try {

            $messages = Message::find($id);

            if (!$messages)
                return redirect()->route('messages.index')->with(['error' => 'هذا الماركة غير موجود ']);

            $messages->delete();

            return redirect()->route('messages.index')->with(['success' => 'تم  الحذف بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('messages.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
}
