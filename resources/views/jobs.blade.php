<!-- resources/views/jobs.blade.php -->
<x-app-layout>

    <!--ヘッダー[START]-->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-500 font-bold">
                    求人管理画面
                </div>
            </div>
        </h2>
    </x-slot>
    <!--ヘッダー[END]-->
            
        <!-- バリデーションエラーの表示に使用-->
       <x-errors id="errors" class="bg-blue-500 rounded-lg">{{$errors}}</x-errors>
        <!-- バリデーションエラーの表示に使用-->
    
    <!--全エリア[START]-->
    <div class="flex" style="background-color: #dacd6b;">
    <!--<div class="flex bg-gray-100">-->

        <!--左エリア[START]--> 
        <div class="w-1/2 text-gray-700 text-left px-4 py-4 m-2">
            
            <!-- 求人情報フォーム -->
            <form action="{{ url('jobs') }}" method="POST" class="w-full max-w-lg">
                @csrf
                  <div class="flex flex-col px-2 py-2">
           <!-- カラム１ -->
                    <div class="w-full md:w-1/1 px-3 mb-2 md:mb-0">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                       求人タイトル
                      </label>
                      <input name="title" class="appearance-none block w-full text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="">
                    </div>
            <!-- カラム２ -->
                    <div class="w-full md:w-1/1 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        求人に盛り込みたいこと（作成時の参考にいたします）
                    </label>
                        <input name="job_infomation" class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="">
                    </div>
            <!-- カラム３ -->
                    <div class="w-full md:w-1/1 px-3 mb-2 md:mb-0">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        審査後掲載ステータス
                      </label>
                        <select name="status" class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            <option value="1">公開</option>
                            <option value="2">一時停止</option>
                        </select>
                    </div>
            <!-- カラム４ -->
                    <div class="w-full md:w-1/1 px-3 mb-6 md:mb-0">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        勤務形態
                      </label>
                        <select name="work_location" class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            <option value="1">フルリモート</option>
                            <option value="2">一部リモート可</option>
                            <option value="3">出社</option>
                            <!-- 必要に応じて他のオプションを追加 -->
                        </select>
                    </div>
            <!-- カラム５ -->
                  <div class="flex flex-col">
                      <div class="text-gray-700 text-center px-4 py-2 m-2">
                             <x-button class="bg-blue-500 rounded-lg">送信</x-button>
                      </div>
                   </div>
            </form>
        </div>
        <!--左エリア[END]--> 
    
    
        <!--右エリア[START]-->
            <div class="w-1/2 flex-1 text-gray-700 text-left bg-gray-100 px-4 py-2 m-2">

                 <!-- 現在の求人 -->
                @if (count($jobs) > 0)
                    @foreach ($jobs as $job)
                        <x-collection id="{{ $job->id }}">{{ $job->title }}</x-collection>
                    @endforeach
                @endif
            </div>
        <!--右エリア[END]-->     

    </div>
     <!--全エリア[END]-->

</x-app-layout>