<?php

namespace App\Http\Controllers;

use App\election;
use Illuminate\Http\Request;
use Mockery\Exception;
use DB;
use function MongoDB\BSON\toJSON;
use Nexmo\Response;

class ElectionController extends Controller
{
    public function CreateElection(Request $request)
    {
        try
        {
            $election = new election();
            $election->Title = $request->Title;
            $election->StartTime = $request->StartTime;
            $election->endtime = $request->EndTime;
            $election->ListOfChoices = $request->ListOfChoices;
            $election->NumberOfvotes = $request->NumberOfVotes;
            $election->save();
            return response()->json([
                "msg" => "Election Created Successfully!"
                ]);
        }catch(Exception $e)
        {
            return 'Error...';
        }
    }

    public function EditElection(Request $request)
    {
        DB::table('elections')
            ->where('ID', $request->ID)
            ->update([
                'Title'=> $request->Title,
                'StartTime' => $request->StartTime,
                'EndTime' => $request->EndTime,
                'ListOfChoices' => $request->ListOfChoices,
                'NumberOfVotes' => $request->NumberOfVotes,
            ]);
        return response()->json([
            "msg" => "Election Edited Successfully!"
        ]);    }

    public function RemoveElection(Request $request)
    {
        election::where('ID',$request->electionId)->delete();
        return response()->json([
            "msg" => "Election Removed Successfully!"
        ]);    }

    public function IncrementNumberOfVotes(Request $request)
    {
        DB::table('elections')
            ->where('ID', $request->electionId)
            ->update([
                'NumberOfVotes' => DB::raw('NumberOfVotes+1'),
            ]);
        $nov= election::where('ID',$request->electionId)->pluck('NumberOfVotes')->toArray();
        return response()->json([
            "NumberOfVotes" => $nov[0],
            "msg" => "Increased Number Of Votes.",
        ]);
    }

    public function getListOfChoices(Request $request)
    {
        $result= election::where('ID',$request->electionId)->get(['ListOfChoices']);
        return response()->json($result);
    }

    public function getAllElections()
    {
        return election::all();
    }

    public function electionExists(Request $request)
    {
       $result= election::where('ID',$request->electionId)->get();
        if(count($result)>0)
            return response()->json([
                "msg" => "This Election ID Exist."
            ]);
            else
                return response()->json([
                    "msg" => "This Election ID Don't Exist."
                ]);     }

    public function getElectionDetails(Request $request)
    {
        $electionId = $request->electionId;
        $result= election::findorfail($electionId);
        return response()->json($result);
    }
}
