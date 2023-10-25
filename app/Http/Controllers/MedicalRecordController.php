<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicalRecord;
use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class MedicalRecordController extends Controller
{
    public function index()
    {
        $records = MedicalRecord::all();
        return view('medicalrecords.index', ['records' => $records]);
    }

    public function create()
    {
        $patients = Patient::all();
        $doctors = Doctor::all();
        return view('medicalrecords.create', ['patients' => $patients, 'doctors' => $doctors]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_name' => ['required'],
            'doctor_name' => ['required'],
            'condition' => ['required'],
            'temperature' => ['required'],
            'image' => ['required|file|mimes:jpg,png,jpeg,pdf|max:2048'],
        ]);
        $record = MedicalRecord::create([
            'patient_name' => $request->patient_name,
            'doctor_name' => $request->doctor_name,
            'condition' => $request->condition,
            'temperature' => floatval($request->temperature),
        ]);

        $path = Storage::put('public/images', $request->image);
        $record->image_url = url(Storage::url($path));
        $record->save();

        return redirect('/medicalrecord')->with(['results' => $record, 'success' => 'Record created successfully']);
    }

    // public function edit(MedicalRecord $record)
    // {
    //     return view('medicalrecords.edit', compact('medicalrecord'));
    // }

    // public function update(MedicalRecord $record){
    //     $post->upda
    // }

    // public function destroy(MedicalRecord $record)
    // {
    //     $record->delete();
    //     return Redirect::back()->with('success', 'Record deleted');
    // }
}
