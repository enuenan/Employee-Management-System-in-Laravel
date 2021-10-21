<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Employee;
use App\Admin\Notice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\Notice as NotificationsNotice;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notices = Notice::all();
        return view('admin.notice.index', compact('notices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.notice.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $validateData = $request->validate([
            'notice_name' => 'required|string',
            'notice_description' => 'required|string',
            'image' => 'image|nullable|max:10000',
            'pdf' => 'mimes:pdf|max:10000|nullable',
        ]);

        $notice = new Notice();
        $notice->name = $request->notice_name;
        $notice->description = $request->notice_description;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/notice');
            $notice->image = $path;
        }
        if ($request->hasFile('pdf')) {
            $path = $request->file('pdf')->store('public/notice');
            $notice->file = $path;
        }
        $notice->save();
        $lastNotice = Notice::latest()->first();
        $employees = Employee::all();
        foreach ($employees as $employee) {
            $user = User::find($employee->user_id);
            $user->notify(new NotificationsNotice($lastNotice));
        }
        return redirect()->route('admin.notice.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notice = Notice::find($id);
        return view('admin.notice.edit', compact('notice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'notice_name' => 'required|string',
            'notice_description' => 'required|string',
            'image' => 'image|nullable|max:10000',
            'pdf' => 'mimes:pdf|max:10000|nullable',
        ]);

        $notice = Notice::find($id);
        $notice->name = $request->notice_name;
        $notice->description = $request->notice_description;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/notice');
            $notice->image = $path;
        }
        if ($request->hasFile('pdf')) {
            $path = $request->file('pdf')->store('public/notice');
            $notice->file = $path;
        }
        $notice->save();
        return redirect()->route('admin.notice.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notice = Notice::find($id);
        $notice->delete();
        return redirect()->route('admin.notice.index');
    }
}
