<?php

namespace App\Http\Controllers;

use App\AttendanceSheet;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\User;
use Auth;
use CSVReport;
use Carbon\Carbon;

class ExportController extends Controller
{

  public function attendancesheet()
  {

    $filename = 'attendance_sheet_'.Carbon::now()->format('dmy_his');
    $title = 'Staff Attendance Sheet';

    $meta = [
        'Sort By' => 'created_at'
    ];

    $queryBuilder = AttendanceSheet::select('id','action','coords','created_at','updated_at')
    ->orderBy('created_at');

    $columns = [ // Set Column to be displayed
      'ID' => 'id',
      'Action' => 'action',
      'Coords' => 'coords',
      'Created at' => 'created_at',
      'Updated at' => 'updated_at'
    ];

    CSVReport::of($title, $meta, $queryBuilder, $columns)
    ->withoutManipulation()
    ->showNumColumn(false)
    ->download($filename);
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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