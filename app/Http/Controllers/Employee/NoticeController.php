<?php

namespace App\Http\Controllers\Employee;

use App\Admin\Notice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class NoticeController extends Controller
{
    public function employeeEvaluationForm()
    {
        $file = 'notice/Dynamicflow-Employee-Evaluation-Form.pdf';
        return view('employee.notice.pdfNotice', compact('file'));
    }

    public function hrPolicy()
    {
        $file = 'notice/Dynamicflow-HR-Policy.pdf';
        return view('employee.notice.pdfNotice', compact('file'));
    }

    public function notice()
    {
        $notices = Notice::all();
        return view('employee.notice.index', compact('notices'));
    }
}
