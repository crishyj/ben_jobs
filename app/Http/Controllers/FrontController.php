<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Proposal;


class FrontController extends Controller
{
    public function index(){
        $jobs = Job::where('id', '>=', '1')->orderBy('created_at', 'desc')->paginate(5);
        return view('front.index', compact('jobs'));
    }

    public function jobDetail($id){
        $job = Job::find($id);  
        if($job != null){
            $data = array(
                'id' => $job->id,
                'title'=> $job->title,
                'subtitle' => $job->subtitle,
                'price' => $job->price,
                'timeline' => $job->timeline,
                'description' => $job->description
                );  
        }
        return view('front.jobDetail')->with($data);
    }

    public function jobApply($id){
        $data = array(
            'id' => $id
        );
        return view('front.jobApply')->with($data);
    }


    public function storeProposal(Request $request){
        $request->validate([
            'job_id' => ['required'],    
            'fname' => ['required', 'string', 'max:255'],   
            'lname' => ['required', 'string', 'max:255'],   
            'house' => ['required', 'string', 'max:255'],   
            'street' => ['required',],   
            'city' => ['required', ],   
            'postcode' => ['required', ],   
            'email' => ['required', 'email', 'max:255' ],   
            'phone' => ['required', ],   
            'birth' => ['required', ],   
            'ninumber' => ['required', ],  
            'file1' =>  'required|mimes:jpeg,png,jpg,pdf|max:2048',
            'file2' =>  'required|mimes:jpeg,png,jpg,pdf|max:2048'
        ]); 


        $fileName1 =$request->file1->getClientOriginalName().time().'.'.$request->file1->getClientOriginalExtension();  
        $request->file1->move(public_path('file/'), $fileName1);
        $upload_file1 = 'file/'.$fileName1;

        $fileName2 =$request->file2->getClientOriginalName().time().'.'.$request->file2->getClientOriginalExtension();  
        $request->file2->move(public_path('file/'), $fileName2);
        $upload_file2 = 'file/'.$fileName2;

        $options = new Proposal([
            'job_id' => $request['job_id'],
            'fname' => $request['fname'],
            'lname' => $request['lname'],
            'house' => $request['house'],
            'street' => $request['street'],
            'city' => $request['city'],
            'postcode' => $request['postcode'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'birth' => $request['birth'],
            'ninumber' => $request['ninumber'],
            'file1' => $upload_file1,
            'file2' => $upload_file2,
        ]);
        $options->save();          
        return redirect()->route('index');

    }
}
