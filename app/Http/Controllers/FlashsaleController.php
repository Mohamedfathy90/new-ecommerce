<?php

namespace App\Http\Controllers;

use App\Models\Flashsale;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;

class FlashsaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.flashsale.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'end_date' => ['required','date']
        ]);
        Flashsale::updateOrCreate(
            ['id'=> 1],
            ['end_date'=>$request->end_date]
        );
        Toastr()->success('Flash Sale added successfully');
        return redirect('/admin/flashsale');
    }

    /**
     * Display the specified resource.
     */
    public function show(Flashsale $flashsale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Flashsale $flashsale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Flashsale $flashsale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Flashsale $flashsale)
    {
        //
    }
}
