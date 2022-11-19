<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveSalesRecordRequest;
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
        $record = SalesRecord::findOrFail((int) $id);
        return view('sales_records.show', compact('record'));
    }
}
