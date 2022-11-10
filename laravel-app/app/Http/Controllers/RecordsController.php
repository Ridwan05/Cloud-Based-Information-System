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
    public function __invoke(Request $request)
    {
        $rqRecord = $request->query('record', 'production');
        $productionRecordsRequested = $rqRecord == 'production';
        $targetModel = $productionRecordsRequested
            ? ProductionRecord::query()
            : null;

        $view = $productionRecordsRequested ? 'production' : 'sales';

        $records = $targetModel->paginate(10);

        return view("records.{$view}", compact(
            'records', 'rqRecord',
        ));
    }
}
