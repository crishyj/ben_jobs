<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Proposal;

class AdminController extends Controller
{
    public function index(){
        $jobs = Job::all();
        return view('admin.index', compact('jobs'));
    }

    public function job(){
        $jobs = Job::all()->sortByDesc('created_at');
        return view('admin.job', compact('jobs'));
    }

    public function createJob(){
        return view('admin.jobcreate');
    }

    public function storeJob(Request $request){
        $request->validate([
            'title' => ['required', 'string', 'max:255'],   
            'subtitle' => ['required', 'string'],
            'price' => ['required','numeric'],
            'timeline' => ['required'],    
            'description' => ['required']       
        ]); 

        $options = new Job([
            'title' => $request['title'],
            'subtitle' => $request['subtitle'],
            'price' => $request['price'],
            'timeline' => $request['timeline'],
            'description' => $request['description']            
        ]);

        $options->save();
        return redirect()->route('jobs');
    }

    public function updateJob(Request $request){
        $options = Job::find($request->get('id'));

        $request->validate([
            'title' => ['required', 'string', 'max:255'],   
            'subtitle' => ['required', 'string'],
            'price' => ['required','numeric'],
            'timeline' => ['required'],    
            'description' => ['required']               
        ]); 
        
        $options->title = $request->get('title');
        $options->subtitle = $request->get('subtitle');
        $options->price = $request->get('price');
        $options->timeline = $request->get('timeline');
        $options->description = $request->get('description');
        $options->save();
        return response()->json('success');
    }


    public function jobDelete($id){
        $options = Job::find($id);
        if (!$options) {
            return back()->withErrors(['delete' => 'Something went wrong.']);
        }
        $options->delete();        
        return back()->with('success', 'Deleted Successfully');
    }

    public function proposal(){
        $proposals = Proposal::where('id', '>=', '1')->orderBy('created_at', 'desc')->paginate(10);
        $jobs = Job::all();
        return view('admin.proposal', compact('proposals', 'jobs'));
    }

    public function adminjobDetail($id){
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
        return view('admin.jobDetail')->with($data);
    }
}
