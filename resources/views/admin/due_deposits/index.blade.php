@extends('admin.layouts.master')
@section('title', 'Events Archive')
@section('content')
@section('style')
    <style type="text/css">
        .title_bar h1 span {
            font-size: 14px;
        }  
        .title_bar > div {
            display: inline-block; 
            vertical-align: top;
        }
        .title_bar > div:last-child {
            margin-left: 3em;
        }
        #btn_date_range_go {
            min-width: 0;
        } 

        .deposit_group {
            display: inline-block; 
            margin: 0 0 2em 2em; 
            padding: 1em;
            vertical-align: top; 
            width: 31em; 
            height: 8em;
        }
        .deposit_group a, .title_bar h1 a {
            text-decoration: none;
        }
        .hasDatepicker {
            width: 9.5em;
        }
        #main_content {
            min-height: 400px;
        }
    </style>
@endsection
    <div id="main_content">
            <div class="title_bar card">
                <div>
                    <h1><a href="https://www.royalambassador.ca/db_dashboard/dashboard_past_due_deposits.php">Deposits to Collect</a> 
                        <span>(Select a Report)</span></h1>
                    <p>Please note that the numbers below may overlap depending on the date range.</p><p>Showing only deposits that are less than 
                        <strong>100%</strong> of
                    the event total. More than that is considered last payment and not second payment
                    and not shown here. <br>You can change this variable called 
                    <strong>event_max_deposit_percent</strong> in Global Settings page.</p><p></p>
                </div>
            </div>
            <br>
  
        <span id="report_selector" class="xmlb_form"><!--
        <div class="deposit_group card">
          <h2><a href="https://www.royalambassador.ca/db_dashboard/dashboard_past_due_deposits.php?show_period=past_events" >Past Due-All Past Events</a></h2>
          <hr />
          <p>8 deposits past due.</p>
          <p>$3,263.99 in total past due deposits.</p>
        </div>
        <div class="deposit_group card">
          <h2><a href="https://www.royalambassador.ca/db_dashboard/dashboard_past_due_deposits.php?show_period=last_month_events" >Past Due- Past Month Events</a></h2>
          <hr />
          <p>0 deposits past due.</p>
          <p>$0 in total past due deposits.</p>
        </div>
        <div class="deposit_group card">
          <h2><a href="https://www.royalambassador.ca/db_dashboard/dashboard_past_due_deposits.php?show_period=past_due" >Past Due- Future Events</a></h2>
          <hr />
          <p>3 deposits past due.</p>
          <p>$5,963.97 in total past due deposits.</p>
        </div>
        <div class="deposit_group card">
          <h2><a href="https://www.royalambassador.ca/db_dashboard/dashboard_past_due_deposits.php?show_period=due_in_week" >Due Next Week</a></h2>
          <hr />
          <p>19 deposits past due.</p>
          <p>$114,953.71 in total past due deposits.</p>
        </div>
        <div class="deposit_group card">
          <h2><a href="https://www.royalambassador.ca/db_dashboard/dashboard_past_due_deposits.php?show_period=due_in_month" >Due Next Month</a></h2>
          <hr />
          <p>46 deposits past due.</p>
          <p>$481,437.55 in total past due deposits.</p>
        </div>
        <div class="deposit_group card">
          <h2><a href="https://www.royalambassador.ca/db_dashboard/dashboard_past_due_deposits.php?show_period=due_6_months" >Due Next 6 Months</a></h2>
          <hr />
          <p>274 deposits past due.</p>
          <p>$4,281,322.31 in total past due deposits.</p>
        </div>
      -->
      
            <div class="deposit_group card">
                <h2>Due by Date Range</h2>
                <hr>
                <p>From <input type="date" class="date_range hasDatepicker" id="date_range_from" fdprocessedid="j8h46b">
                To <input type="date" class="date_range hasDatepicker" id="date_range_to" fdprocessedid="8d1it6m">
                <input id="btn_date_range_go" value="Go" type="submit" fdprocessedid="pxewcn">
                </p>
            </div>
            <div class="deposit_group card">
                <h2><a href="https://www.royalambassador.ca/db_dashboard/dashboard_past_due_deposits.php?show_period=by_activity">By Latest Activity</a></h2>
                <hr>        
                <p>Shows all due/past due deposits based on reverse order of activity.</p>
            </div>
      
        </span>
    
    </div>
@endsection


