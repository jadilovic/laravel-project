<?php

namespace App\Http\Controllers;
use App\Models\Job;
use App\Models\JobCategory;
use Illuminate\Http\Request;

class JobController extends Controller
{
    //
    public function index() {
        $jobs = Job::all();
        return view('jobs', ['jobs' => $jobs]);
    }

     public function dashboardIndex() {
        try {
            $jobs = Job::all();
            return view('dashboard.jobs', ['jobs' => $jobs]);
        } catch (\Throwable $th) {
            $jobs = [];
            return view('dashboard.jobs', ['jobs' => $jobs]);
        }
    }

    public function create() {
        $kategorije = JobCategory::all();
        return view('dashboard.jobsAddForm', compact('kategorije'));
    }

    public function store(Request $request) {
        try {
            $request->validate([
                'naziv' => 'required',
                'opis' => 'required',
                'slika' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                'kategorija' => 'required|exists:job_categories,id'
            ]);

            $category_id = null;
            if ($request->kategorija != '') {
                $category_id = $request->kategorija;
            }

            if ($request->hasFile('slika')) {
                $slika = $request->file('slika');
                $imeSlike = time() . '_' . $slika->getClientOriginalName();
                $slika->storeAs('public/slike', $imeSlike);

                Job::create([
                    'naziv' => $request->naziv,
                    'opis' => $request->opis,
                    'slika' => $imeSlike,
                    'category_id' => $category_id
                ]);
            } else {
                Job::create([
                    'naziv' => $request->naziv,
                    'opis' => $request->opis,
                    'category_id' => $category_id
                ]);
            }

            return redirect()->route('dashboard.jobs')->with('success', 'Job je uspjesno kreiran');
        } catch (\Throwable $th) {
            return redirect()->route('dashboard.jobs')->with('error', 'Job nije uspjesno kreiran');
        }
    }

    public function edit($id) {
        $job = Job::findOrFail($id);
        $kategorije = JobCategory::all();
        return view('dashboard.jobsEditForm', compact('job', 'kategorije'));
    }

    public function update(Request $request, $id) {
        
        $job = Job::findOrFail($id);
        $job->naziv = $request->naziv;
        $job->opis = $request->opis;

        $category_id = null;
        if ($request->kategorija != '') {
            $category_id = $request->kategorija;
        }
        $job->category_id = $category_id;

        if ($request->hasFile('slika')) {
            $slika = $request->file('slika');
            $imeSlike = time() . '_' . $slika->getClientOriginalName();
            $slika->storeAs('public/slike', $imeSlike);
            $job->slika = $imeSlike;
        }
        $job->save();

        return redirect()->route('jobs.edit', $id)->with('success', 'Uspjesno ste uredili job!');

    }

    public function filter($categoryId) {
        $jobs = Job::where('category_id', $categoryId)->get();
        $categories = JobCategory::all();
        return view('jobsFilter', compact('jobs', 'categories'));
    }

    public function destroy($id) {
        $job = Job::findOrFail($id);
        $job->delete();

        return redirect()->route('dashboard.jobs')->with('success', 'Uspjesno ste obrisali job!');
    }
}
