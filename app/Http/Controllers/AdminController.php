<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use App\Models\Project;
use App\Models\Service;
use App\Models\Message;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
          $contacts = Contact::latest()->get();

    return view('admin.dashboard', compact('contacts'));
    }

    public function projects()
    {
        $projects = Project::latest()->get();
        return view('admin.projects', compact('projects'));
    }

    public function index()
    {


        $contacts = Contact::latest()->get();
        $services = Service::all();
        return view('admin.services', compact('services' , 'contacts'));
    }

    public function messages()
    {

    $messages = Contact::orderBy('created_at', 'desc')->get();
    return view('admin.messages', compact('messages'));
    }

    public function storeProject(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $path = $request->file('image')->store('projects', 'public');

        Project::create([
            'name' => $request->name,
            'category' => $request->category,
            'image' => $path,
        ]);

        return redirect()->route('admin.projects')->with('success', 'Project added successfully!');
    }

    public function editProject($id)
    {
        $project = Project::findOrFail($id);
        return view('admin.edit_project', compact('project'));
    }

    public function updateProject(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'image' => 'nullable|image',
        ]);

        $project->name = $request->name;
        $project->category = $request->category;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('projects', 'public');
            $project->image = $path;
        }

        $project->save();

        return redirect()->route('admin.projects')->with('success', 'Project updated successfully.');
    }

    public function deleteProject($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return back()->with('success', 'Project deleted.');
    }

  public function storeService(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'icon_image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
    ]);

    $service = new Service();
    $service->title = $request->title;
    $service->description = $request->description;

    if ($request->hasFile('icon_image')) {
        $path = $request->file('icon_image')->store('icons', 'public');
        $service->icon_image = $path;
    }

    $service->save();

    return redirect()->route('admin.services')->with('success', 'Service added successfully!');
}

    public function editService($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.edit_service', compact('service'));
    }

  public function updateService(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'icon_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $service = Service::findOrFail($id);

    $service->title = $request->title;
    $service->description = $request->description;

    if ($request->hasFile('icon_image')) {
        $path = $request->file('icon_image')->store('icons', 'public');
        $service->icon_image = $path;
    }

    $service->save();

    return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
}


    public function deleteService($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('admin.services')->with('success', 'Service deleted successfully.');
    }

    public function heroSettings()
    {
        $settings = Setting::all()->pluck('value', 'key')->toArray();
        return view('admin.hero_settings', compact('settings'));
    }

    public function updateHeroSettings(Request $request)
    {
    foreach ($request->except(['_token', 'profile_image', 'cv_file']) as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

         if ($request->hasFile('profile_image')) {
        $path = $request->file('profile_image')->store('asset/img', 'public');
        Setting::updateOrCreate(['key' => 'profile_image'], ['value' => $path]);
    }

        if ($request->hasFile('cv_file')) {
            $path = $request->file('cv_file')->storeAs('cv', 'my-cv.pdf', 'public');
        }

        return back()->with('success', 'Hero settings updated.');
    }

    public function generalSettings()
    {
        $settings = Setting::all()->pluck('value', 'key')->toArray();
        return view('admin.general_settings', compact('settings'));
    }

    public function updateGeneralSettings(Request $request)
    {
        foreach ($request->except('_token') as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        return back()->with('success', 'Settings updated successfully.');
    }

    public function profileSettings()
{
 $settings = \App\Models\Setting::pluck('value', 'key')->toArray();
    return view('admin.profile_settings', compact('settings'));
}

public function updateProfileSettings(Request $request)
{
    $request->validate([
        'hero_name' => 'nullable|string',
        'hero_title' => 'nullable|string',
        'linkedin' => 'nullable|url',
        'cv_file' => 'nullable|file|mimes:pdf',
        'profile_image' => 'nullable|image|mimes:jpg,jpeg,png',
    ]);

    // حفظ النصوص
    foreach (['hero_name', 'hero_title', 'linkedin'] as $key) {
        if ($request->has($key)) {
            Setting::updateOrCreate(['key' => $key], ['value' => $request->$key]);
        }
    }

    // حفظ ملف CV
    if ($request->hasFile('cv_file')) {
        $cvPath = $request->file('cv_file')->store('cv', 'public');
        Setting::updateOrCreate(['key' => 'cv_file'], ['value' => $cvPath]);
    }

    // حفظ صورة البروفايل
    if ($request->hasFile('profile_image')) {
        $imagePath = $request->file('profile_image')->store('asset/img', 'public');
        Setting::updateOrCreate(['key' => 'profile_image'], ['value' => $path]);
    }

    return redirect()->back()->with('success', 'Profile settings updated successfully.');
}
public function aboutSettings()
{
    $settings = \App\Models\Setting::all()->pluck('value', 'key')->toArray();
    return view('admin.about_settings', compact('settings'));
}

public function updateAboutSettings(Request $request)
{
    $request->validate([
        'about_title' => 'nullable|string',
        'about_subtitle' => 'nullable|string',
        'about_description' => 'nullable|string',
        'about_cv' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        'about_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
    ]);

    // حفظ الحقول النصية
    foreach (['about_title', 'about_subtitle', 'about_description'] as $key) {
        if ($request->has($key)) {
            Setting::updateOrCreate(['key' => $key], ['value' => $request->$key]);
        }
    }

    // حفظ ملف CV
    if ($request->hasFile('about_cv')) {
        $cvPath = $request->file('about_cv')->store('cvs', 'public');
        Setting::updateOrCreate(['key' => 'about_cv'], ['value' => $cvPath]);
    }

    // حفظ صورة البروفايل
    if ($request->hasFile('about_image')) {
        $imgPath = $request->file('about_image')->store('images', 'public');
        Setting::updateOrCreate(['key' => 'about_image'], ['value' => $imgPath]);
    }

    return redirect()->back()->with('success', 'About Me settings updated!');
}



}
