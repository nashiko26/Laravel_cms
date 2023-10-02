<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Job;
use App\Models\Company;
use App\Models\User;

use Auth;  //追加
use Validator;  //追加

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user(); 
        // $jobs = Job::orderBy('created_at', 'asc')->get();
        $jobs = $user->company->jobs()->orderBy('created_at', 'asc')->get();
        return view('jobs', [
            'jobs' => $jobs
            // jobs.blade.phpに渡して表示
    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //バリデーション
    $validator = Validator::make($request->all(), [
         'title' => 'required|min:3|max:255',
         'job_infomation' => 'required',
         'status' => 'required',
         'work_location' => 'required',
    ]);

    //バリデーション:エラー 
    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }
    //以下に登録処理を記述（Eloquentモデル）
      $jobs = new Job;
      $jobs->title   = $request->title;
      $jobs->job_infomation = $request->job_infomation;
      $jobs->status = $request->status;
      $user = auth()->user(); 
      if ($user && $user->company) {
          $jobs->company_id = $user->company->id;
      } else {
          return redirect('/')->with('error', '所属企業が見つかりません。');
      }
      $jobs->work_location   = $request->work_location;    
      $jobs->save(); 
      return redirect('/');
  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        //{jobs}id 値を取得 => Job $jobs id 値の1レコード取得
        return view('jobsedit', ['job' => $job]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
    //バリデーション
        $validator = Validator::make($request->all(), [
             'title' => 'required|min:3|max:255',
             'job_infomation' => 'required | min:1 | max:3',
             'status' => 'required',
             'work_location' => 'required',
             'created_at' => 'required',
             'updated_at'   => 'required',
        ]);

    //バリデーション:エラー 
        if ($validator->fails()) {
            return redirect('/jobsedit/'.$request->id)
                ->withInput()
                ->withErrors($validator);
        }

    // データ更新
        $jobs = Job::find($request->id);
        $jobs->title   = $request->title;
        $jobs->job_infomation = $request->job_infomation;
        $jobs->status = $request->status;
        $jobs->work_location   = $request->work_location;
        $jobs->created_at   = $request->created_at;
        $jobs->updated_at   = $request->updated_at;
        $jobs->save(); 
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        $job->delete();       //追加
        return redirect('/');  //追加
    }
}
