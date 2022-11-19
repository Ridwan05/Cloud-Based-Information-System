<?php

namespace App\Http\Controllers;

use App\Models\ProductionRecord;
use App\Models\SalesRecord;
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
        $rqDateFrom = formatDateValue(request()->query('date_from', ''));
        $rqDateTo = formatDateValue(request()->query('date_to', ''));

        $productionRecordsRequested = $rqRecord == 'production';
        $targetModel = $productionRecordsRequested
            ? ProductionRecord::query()
            : SalesRecord::query();

        if (!empty($rqDateFrom)) {
            $targetModel->where('date_recorded', '>=', $rqDateFrom);
        }
        if (!empty($rqDateTo)) {
            $targetModel->where('date_recorded', '<=', $rqDateTo);
        }

        $records = $targetModel
            ->orderByDesc('date_recorded')
            ->paginate(10)
            ->withQueryString();

        return view("records.index", compact(
            'records', 'rqRecord', 'rqDateFrom', 'rqDateTo', 'productionRecordsRequested'
        ));
    }
}
