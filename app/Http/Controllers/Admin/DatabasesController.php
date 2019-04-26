<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Laracasts\Flash\Flash;
use PragmaRX\Tracker\Vendor\Laravel\Models\Log;

class DatabasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.databases');
    }

    public function export()
    {
        $ds = DIRECTORY_SEPARATOR;
        $ts = time();
        $path = database_path() . $ds . 'backups' . $ds . date('Y', $ts) . $ds . date('m', $ts) . $ds . date('d', $ts) . $ds;
        $file = date('Y-m-d', $ts) . '-dump-' . env('DB_DATABASE') . '.sql';

        Artisan::call('database:export');

        $headers = array(
            'Content-Type: application/sql',
        );

        return Response::download($path . $file, 'export.sql', $headers);
    }

    public function import(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'file' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('admin/databases')
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->file && pathinfo($request->file->getClientOriginalName(), PATHINFO_EXTENSION) !== 'sql') {
            return redirect('admin/databases')
                ->withErrors('The file must be a .sql file')
                ->withInput();
        }

        $ts = time();
        $fileName = date('Y', $ts) . '-' . date('m', $ts) . '-' . date('d', $ts) . '-import.sql';
        $request->file('file')->move(
            database_path() . '/backups/import/', $fileName
        );

        Artisan::call('database:import', ['--file' => $fileName]);

        Flash::info(trans('admin.import_is_successfully'));
        return redirect('admin/databases')
            ->withInput();
    }
}
