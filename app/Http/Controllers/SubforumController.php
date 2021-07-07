<?php

namespace App\Http\Controllers;

use App\Models\Subforum;
use Illuminate\Http\Request;

class SubforumController extends Controller
{

    public function index()
    {
        $url = url()->current();
        preg_match_all('!\d+!', $url, $int);
        $firstarray = array_values(array_slice($int, -1))[0];
        $finalarray = array_values(array_slice($firstarray, -1))[0];
        $subforums = subforum::select('subforums.id', 'subforums.subforumname', 'forums.forumname')
            ->join('forums', 'subforums.forumid', '=', 'forums.id')
            ->where('forums.id', '=', $finalarray )
            ->get();

        return view ('subforum', compact('subforums'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Subforum $subforum)
    {
        //
    }

    public function edit(Subforum $subforum)
    {
        //
    }

    public function update(Request $request, Subforum $subforum)
    {
        //
    }

    public function destroy(Subforum $subforum)
    {
        //
    }
}
