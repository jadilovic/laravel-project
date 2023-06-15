<?php

namespace App\Http\Controllers;
use App\Models\Job;

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
        return view('dashboard.jobsAddForm');
    }

    public function store(Request $request) {
        try {
            $request->validate([
                'naziv' => 'required',
                'opis' => 'required',
                'slika' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            if ($request->hasFile('slika')) {
                $slika = $request->file('slika');
                $imeSlike = time() . '_' . $slika->getClientOriginalName();
                $slika->storeAs('public/slike', $imeSlike);

                Job::create([
                    'naziv' => $request->naziv,
                    'opis' => $request->opis,
                    'slika' => $imeSlike
                ]);
            } else {
                Job::create([
                    'naziv' => $request->naziv,
                    'opis' => $request->opis
                ]);
            }

            return redirect()->route('dashboard.jobs')->with('success', 'Job je uspjesno kreiran');
        } catch (\Throwable $th) {
            return redirect()->route('dashboard.jobs')->with('error', 'Job nije uspjesno kreiran');
        }
    }

    public function edit($id) {
        $job = Job::findOrFail($id);
        return view('dashboard.jobsEditForm', compact('job'));
    }

    public function update(Request $request, $id) {
        
        $job = Job::findOrFail($id);
        $job->naziv = $request->naziv;
        $job->opis = $request->opis;
        if ($request->hasFile('slika')) {
            $slika = $request->file('slika');
            $imeSlike = time() . '_' . $slika->getClientOriginalName();
            $slika->storeAs('public/slike', $imeSlike);
            $job->slika = $imeSlike;
        }
        $job->save();

        return redirect()->route('jobs.edit', $id)->with('success', 'Uspjesno ste uredili job!');

    }

    public function destroy($id) {
        $job = Job::findOrFail($id);
        $job->delete();

        return redirect()->route('dashboard.jobs')->with('success', 'Uspjesno ste obrisali job!');
    }
}
