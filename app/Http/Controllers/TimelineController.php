<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Timeline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Type\Time;

class TimelineController extends Controller
{
    public function index()
    {
        $users=User::all();
        return view('Timeline/index',compact('users'));
    }

    public function getallTimeline()
    {
        $timeline=Timeline::all();

        return response()->json($timeline);
    }

    public function getallusers(){
        $users=User::all();
        return response()->json($users);
    }

    public function getimelinedetails(Request $request){
        $Timeline_data=Timeline::find($request->timeline_id);
        $user_data=User::find($Timeline_data->userId);
        return response()->json(['Timeline_data' => $Timeline_data,'user_data' => $user_data]);
    }

    public function updateimelinedetails(Request $request){

        $timeline_id = $request->Tid;
        $Timeline = Timeline::find($timeline_id);
        $Timeline->userId = $request->user;
        $Timeline->date = $request->date;
        $Timeline->time = $request->time;
        $Timeline->duration = $request->duratoinminutes;
        $Timeline->detail=$request->detail;
        $Timeline->intern=$request->intern;
        $Timeline->note=$request->note;
        $Timeline->price=$request->price;
        $Timeline->currency=$request->currency;

        $admin=User::find($request->user);
        $admin->name=$request->Pname;
        $admin->email=$request->email;
        $admin->address=$request->address;
        $admin->street=$request->street;
        $admin->city=$request->city;
        $admin->mobile=$request->number;
        $admin->CName=$request->Cname;
        $admin->zipcode=$request->zipcode;
        $admin->country=$request->country;
        $admin->phone=$request->phone;
        $admin->website=$request->website;
        $query2=$admin->save();
            $query = $Timeline->save();

            if($query && $query2){
                return response()->json(['code'=>1, 'msg'=>'Timeline Details have Been updated']);
            }else{
                return response()->json(['code'=>0, 'msg'=>'Something went wrong']);
            }

    }

    public function deleteTimeline(Request $request){

        $timeline_id = $request->timeline_id;
        $query = Timeline::find($timeline_id)->delete();

        if($query){
            return response()->json(['code'=>1, 'msg'=>'Timeline has been deleted from database']);
        }else{
            return response()->json(['code'=>0, 'msg'=>'Something went wrong']);
        }
    }

    public function create()
    {

        return view('user/register');
    }

    public function addtimeline(Request $req){

        $timeline=new Timeline();
        $timeline->userId=$req->user;
        $timeline->date=$req->date;
        $timeline->time=$req->time;
        $timeline->duration=$req->duration;
        $timeline->detail=$req->detail;
        $timeline->intern=$req->intern;
        $timeline->note=$req->note;
        $timeline->price=$req->price;
        $timeline->currency=$req->currency;
        $timeline->save();

        $admin=User::find($req->user);
        $admin->name=$req->name;
        $admin->email=$req->email;
        $admin->address=$req->address;
        $admin->street=$req->street;
        $admin->city=$req->city;
        $admin->mobile=$req->mobile;
        $admin->CName=$req->CName;
        $admin->zipcode=$req->zipcode;
        $admin->country=$req->country;
        $admin->phone=$req->phone;
        $admin->website=$req->website;
        $query2=$admin->save();

        if(!$timeline || !$query2){
            return response()->json(['code'=>0,'msg'=>'Something went wrong']);
        }else{
            return response()->json(['code'=>1,'msg'=>'New Timeline has been successfully Added']);
        }
    }


    public function singleuserTimeline($id){
        $singleuserTimeline=Timeline::where('userId',$id)->get();
        return response()->json($singleuserTimeline);
    }


    public function getsingleuserdata($id){
        $user=User::find($id);
        return response()->json($user);
    }

}
