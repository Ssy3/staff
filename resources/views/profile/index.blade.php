@extends('layouts.app')
@section('title', 'My Profile')
@section('content')

<div class="container">
  <div class="card uper">
    <div class="card-header">
      My Profile
    </div>
  {{--<div class="col-lg-4 col-xlg-3 col-md-5">
      <div class="card">
        <div class="card-body">

        </div>
      </div>
      <div class="card">
        <div class="card-body">

        </div>
      </div>
    </div>

    <div class="col-lg-8 col-xlg-9 col-md-7">
      <div class="card">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs profile-tab" role="tablist">
          <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#userAttendance" role="tab">Attendance</a> </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane active" id="userAttendance" role="tabpanel">
            <div class="card-body">

            </div>
          </div>

        </div>
      </div>
    </div>
--}}


    <table class="table table-striped">
      <thead>
          <tr>
            <td>Name</td>
            <td>Email</td>
            <td>Type</td>
            <td>Date/Time</td>
            <td>GPS</td>
          </tr>
      </thead>
      <tbody>

    @foreach($attendancesheets as $attendancesheet)
      <tr>
        <td>{{$attendancesheet->user->name}}</td>
        <td>{{$attendancesheet->user->email}}</td>
        <td>{{$attendancesheet->action}}</td>
        <td>{{$attendancesheet['created_at']}} <b>({{$attendancesheet['created_at']->diffForHumans()}})</b></td>
        <td><a target="_blank" href="https://www.google.com/search?q={{$attendancesheet->coords}}">Map</a></td>
    </tr>
      @endforeach

    </tbody>
    <tfoot>
        <tr>
            <td colspan="6">
                <div class="text-right">
                    <ul> {{ $attendancesheets->links() }} </ul>
                </div>
            </td>
        </tr>
    </tfoot>
    </table>

</div>
</div>
@endsection
