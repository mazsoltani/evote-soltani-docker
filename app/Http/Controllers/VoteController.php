<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\vote;
use App\choice;
use Carbon\Carbon;
use DB;
class VoteController extends Controller
{
    public function CreateElection(Request $request)
    {
        $vote= new vote();
        $vote->title = $request->title;
        $vote->StartTime = $request->starttime;
        $vote->EndTime = $request->endtime;
        $vote->created_at = Carbon::now();
        $vote->updated_at = Carbon::now();
        $vote->save();
        $vid=$vote->id;
        for($i=1; $i<=10;$i++)
        {
            $loc= 'loc'.$i;
            if($request->$loc <> null)
            {
                $choice = new choice();
                $choice->vid = $vid;
                $choice->ListOfChoices = $request->$loc;
                $choice->NumberOfVotes = 0;
                $choice->save();
            }
        }

        $vote = vote::all();
        return view('title.create')->with('alert', 'Successful...');
    }
    public function IncrementNumberOfVotes(Request $request)
    {
        DB::table('choices')
            ->where('vid', $request->vid)
            ->where('id', $request->loc)
            ->update([
                'NumberOfVotes' => DB::raw('NumberOfVotes+1'),
                'updated_at' => Carbon::now(),
            ]);

        $votes=\App\vote::pluck("title","vid");
        return view('title.vote',compact('votes'))->with('alert', 'Successful...');
    }

    public function getElectionDetails(Request $request)
    {
       $choices= choice::where('vid',$request->vid)->get();
       return view('title.details' , compact('choices'));
    }

    public function getElectionDetails1(int $electionid)
    {
        $choices= choice::where('vid',$electionid)->get();
        return view('title.details' , compact('choices'));
    }


    public function findchoices($vid)
    {
        $choices = choice::where('vid', $vid)->pluck("ListOfchoices", "id");
        return response()->json($choices);
    }

}
