<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveProductionRecordRequest;
use App\Models\ProductionRecord;
use Illuminate\Http\Request;

class ProductionRecordController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('production_records.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\SaveProductionRecordRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveProductionRecordRequest $request)
    {
        $record = ProductionRecord::create($request->validated());

        if (empty($record->id)) {
            return redirect(route('production_records.create'))
                ->withInput()
                ->with('status_error', 'Record not saved. Please, try again!');
        }

        return redirect(route('production_records.show', ['id' => $record->id]))
            ->with('status_success', 'Record saved successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $record = ProductionRecord::findOrFail((int) $id);
        return view('production_records.show', compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
