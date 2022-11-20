<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveSalesRecordRequest;
use App\Models\ProductionRecord;
use App\Models\SalesRecord;
use Illuminate\Http\Request;

class SalesRecordController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sales_records.create');
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\SaveSalesRecordRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveSalesRecordRequest $request)
    {
        $record = SalesRecord::create($request->validated());

        if (empty($record->id)) {
            return redirect(route('sales_records.create'))
                ->withInput()
                ->with('status_error', 'Record not saved. Please, try again!');
        }

        return redirect(route('sales_records.show', ['id' => $record->id]))
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
        $record = SalesRecord::with(['creator'])->findOrFail((int) $id);
        return view('sales_records.show', compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $record = SalesRecord::findOrFail((int) $id);
        return view('sales_records.edit', compact('record'));
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
        $record = SalesRecord::findOrFail((int) $id);
        $validated = $request->validate(SalesRecord::validationRules());
        $record->fill($validated);

        if ($record->save()) {
            return redirect(route('sales_records.show', ['id' => $record->id]))
                ->with('status_success', 'Record saved successfully!');
        }
        
        return redirect(route('sales_records.edit', $id))
            ->withInput()
            ->with('status_error', 'Record not saved. Please, try again!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = SalesRecord::findOrFail((int) $id);

        if ($record->delete()) {
            return redirect(route('home'))
                ->with('status_success', 'Sales record deleted successfully!');
        }

        return redirect()->back()
                ->with('status_error', 'Sales record was not deleted. Please, try again!');
    }
}
