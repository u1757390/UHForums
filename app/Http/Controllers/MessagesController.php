<?php

namespace App\Http\Controllers;

use App\Models\Messages;
use Illuminate\Http\Request;

class MessagesController extends Controller
{

    public function index()
    {
        $url = url()->current();
        preg_match_all('!\d+!', $url, $int);
        $firstarray = array_values(array_slice($int, -1))[0];
        $finalarray = array_values(array_slice($firstarray, -1))[0];

        $messages = messages::select('subforums.subforumname', 'users.name', 'users.id', 'messages.userid', 'messages.subforumid', 'messages.message')
            ->join('subforums', 'messages.subforumid', '=', 'subforums.id')
            ->join('users', 'messages.userid', '=', 'users.id')
            ->where('subforums.id', '=', $finalarray )
            ->get();

        return view ('messages', compact('messages'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        request () -> validate ([
            'userid' => 'required|min:0|max:32',
            'subforumid' => 'required|min:0|max:32',
            'message' => 'required|min:2|max:128'
        ]);

        $attributes = $request -> all (
            'userid',
            'subforumid',
            'message'
        );

        $messages = messages::create ($attributes);

        return redirect (url()->current());
    }

    public function show(Messages $messages)
    {
        //
    }

    public function edit(Messages $messages)
    {
        //
    }

    public function update(Request $request, Messages $messages)
    {
        //
    }

    public function destroy(Messages $messages)
    {
        //
    }
}
