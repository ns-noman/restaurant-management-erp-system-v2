<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class QRScanController extends Controller
{
    public function qrScan($company_code, $table_code)
    {
        $company_info = DB::connection('oracle')
                            ->table('COMPANY_INFO')
                            ->select('*')
                            ->where('COMPANY_CODE', $company_code)
                            ->first();

        $company_id = $company_info ? $company_info->company_id : null;

        $tableExists = DB::connection('oracle')
                            ->table('TABLE_MS_INFO')
                            ->select('*')
                            ->where('COMPANY_CODE', $company_code)
                            ->where('TABLE_CODE', $table_code)
                            ->exists();

        if (! $company_info || ! $tableExists) {
            abort(404, 'Branch or Table not found.');
        }

        session([
            'company_code' => $company_code,
            'table_code' => $table_code,
        ]);

        $slug = ['1'=> 'woodenspoon', '9'=>'deshibites'];

        return redirect()->route('menu', ['company' => $slug[$company_info->company_id] ?? 'woodenspoon'])->with('success', 'Table identified successfully!');
    }
}
