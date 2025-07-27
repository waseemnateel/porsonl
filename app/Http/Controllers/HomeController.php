<?php

namespace App\Http\Controllers;
use App\Models\Setting;
use App\Models\Contact;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Project;
use App\Models\Service;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    // عرض الصفحة الرئيسية وجلب المشاريع والخدمات
  public function index()
{
     $socials = Setting::whereIn('key', ['instagram', 'linkedin', 'dribbble', 'behance'])->pluck('value', 'key')->toArray();


     $branding = Project::where('category', 'branding')->get();
    $app = Project::where('category', 'app')->get();
    $website = Project::where('category', 'website')->get();

    $projects = Project::all();
    $services = Service::all();
    $messages = Message::all();
    $settings = Setting::pluck('value', 'key')->toArray();

    return view('home', compact( 'branding', 'app', 'website' , 'projects', 'services', 'messages', 'settings' , 'socials'));
}


    // استقبال نموذج التواصل وتخزينه في قاعدة البيانات
    public function submitContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string',
            'service' => 'nullable|string',
            'timeline' => 'nullable|string',
            'details' => 'nullable|string',
        ]);

    Contact::create([
        'name' => $request->name,
        'email' => $request->email,
        'service' => $request->service,
        'timeline' => $request->timeline,
        'details' => $request->details,
    ]);

        Message::create($request->all());

        return redirect('/#contact')->with('success', 'Your message has been sent!');
    }


}
