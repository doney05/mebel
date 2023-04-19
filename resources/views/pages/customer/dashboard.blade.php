@extends('layouts.customer.app')
@section('title')
    Dashboard - Customer
@endsection
@section('content')
<div class="row">
    <!-- start head content         -->
    <div class="col-lg-4">
      <!-- avtive -->
      <div class="activeMode">
        <div class="card">
          <h1>Deactivate Mode</h1>
          <a href="" class="btn btn-info">Activate now</a>
        </div>
      </div>
      <!-- end active -->
      <!-- Regster Users -->
      <div class="regsterUsers">
        <div class="card">
          <div class="card-top">
            <h1>500</h1>
            <i class="fa fa-users"></i>
          </div>
          <div class="card-bottom">
            <p>New Registered Users This Month</p>
          </div>
        </div>
      </div>
      <!-- end  Regster Users-->
    </div>

    <!-- start chatts -->
    <div class="col-lg-4">
      <div class="card">
        <div id="IndexChartOne" style="height: 320px;" ></div>
      </div>
    </div>
    <!-- end charts -->

    <!-- start chatts -->
    <div class="col-lg-4">
      <div class="card">
        <div id="IndexChartTwo" style="height: 320px;" ></div>
      </div>
    </div>
    <!-- end charts -->

  </div>
@endsection
