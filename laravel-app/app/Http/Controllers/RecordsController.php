<?php

namespace App\Http\Controllers;

use App\Models\ProductionRecord;
use Illuminate\Http\Request;

class RecordsController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $rqRecord = request()->query('record', 'production');
        $productionRecordsRequested = $rqRecord == 'production';
        $targetModel = $productionRecordsRequested
            ? ProductionRecord::query()
            : null;

        $view = $productionRecordsRequested ? 'production' : 'sales';

        $records = $targetModel
            ->orderByDesc('date_recorded')
            ->paginate(10)
            ->withQueryString();

        return view("records.index", compact(
            'records', 'rqRecord',
        ));
    }
}
