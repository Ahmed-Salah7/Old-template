<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use Yajra\DataTables\DataTables;

class ActivityLogController extends Controller
{
    /**
     * constructor init allowed permissions
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:activity-log');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {

            $Activities = Activity::all();

            return DataTables::of($Activities)
                ->addColumn('action', function ($activity) {
                    return $activity->description;
                })->addColumn('model_id', function ($activity) {
                    return $activity->subject_id;
                })->addColumn('model_type', function ($activity) {
                    return substr($activity->subject_type, strrpos($activity->subject_type, '/') + 11);
                })->addColumn('causer_type', function ($activity) {
                    return isset($activity->causer_type) ? substr($activity->causer_type, strrpos($activity->causer_type, '/') + 11) : '-';
                })->addColumn('causer_name', function ($activity) {
                    return isset($activity->causer) ? $activity->causer->name : '-';
                })
                ->addColumn('option', function ($activity) {
                    return '  <a href=' . route("admin.activity.show", $activity->id) . '><button class="btn btn-warning">' . __("dashboard.Show") . '</button></a>';
                })
                ->rawColumns(['option'])
                ->make(true);
        }
        return view('administration.pages.activity_log.index');
    }

    public function show($id)
    {
        $activity = Activity::findOrFail($id);
        return view('administration.pages.activity_log.show')->with([
            'activity' => $activity,
        ]);
    }
}
