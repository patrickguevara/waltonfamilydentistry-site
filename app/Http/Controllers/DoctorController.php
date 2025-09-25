<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\View\View;

class DoctorController extends Controller
{
    public function index(): View
    {
        $doctors = Doctor::ordered()->get();

        return view('pages.doctors.index', compact('doctors'));
    }

    public function show(Doctor $doctor): View
    {
        return view('pages.doctors.show', compact('doctor'));
    }
}
