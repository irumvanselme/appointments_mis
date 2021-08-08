<?php

namespace App\Http\Controllers;

use App\Models\AppointmentType;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\ValidationException;

class AppointmentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view("/appointments");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view("/appointments/new");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|Redirector|RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            "name" => "required|string|min:3",
            "days" => "required|integer|min:1"
        ]);

        AppointmentType::query()->create($data);

        return redirect("/appointments");
    }

    /**
     * Display the specified resource.
     *
     * @param AppointmentType $appointmentType
     * @return Application|Factory|View
     */
    public function show(AppointmentType  $appointmentType)
    {
        return view("appointment/details", compact("appointmentType"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param AppointmentType $appointmentType
     * @return Application|Factory|View
     */
    public function edit(AppointmentType  $appointmentType)
    {
        return view("appointments.edit", compact("appointmentType"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param AppointmentType $appointmentType
     * @return Application|Redirector|RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, AppointmentType $appointmentType)
    {
        $data = $this->validate($request, [
            "name" => "required|string|min:3",
            "days" => "required|integer|min:1"
        ]);

        $appointmentType->update($data);

        return redirect("appointments.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param AppointmentType $appointmentType
     * @return Application|RedirectResponse|Redirector
     */
    public function destroy(AppointmentType  $appointmentType)
    {
        $appointmentType->delete();
        return redirect("/");
    }
}
