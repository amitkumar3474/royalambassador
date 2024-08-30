@extends('admin.layouts.master')
@section('title', 'My Home')
@section('content')
    <div class="nav-bottom">
        <div class="date-details">
            <span class="today">20</span>
            <span class="detail-date">Wednesday, Dec 20, 2023</span>
            <h3 class="shedule-link">
                <a href="#">Update my Monthly Schedule</a>
            </h3>
        </div>
        <div id="calendar"></div>
    </div>
    <div class="card">
        <div>
            <div class="calendars_wrap">
                <div class="toggle_users">
                    <div class="toggle_user_calendar selected">Anil india</div>
                    <div class="toggle_user_calendar">Diana Bonilla</div>
                    <div class="toggle_user_calendar">Isabella Giovannozzi</div>
                    <div class="toggle_user_calendar">Jimmy Singh</div>
                    <div class="toggle_user_calendar">Nicolas Giancola</div>
                    <div class="toggle_user_calendar">Rishi Shah</div>
                    <div class="toggle_user_calendar">Stella Stalteri</div>
                    <div class="toggle_user_calendar">Vishi Sandhu</div>
                </div>
                <div class="actual_calendar">
                    <div class="user_cal_wrap">
                        <fieldset>
                            <legend><svg class="svg-inline--fa fa-calendar-week" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="calendar-week" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm80 64c-8.8 0-16 7.2-16 16v64c0 8.8 7.2 16 16 16H368c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80z"></path></svg> 
                                Wednesday, Dec 20 2023</legend>
                        </fieldset>
                        <fieldset>
                            <legend><svg class="svg-inline--fa fa-calendar-week" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="calendar-week" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm80 64c-8.8 0-16 7.2-16 16v64c0 8.8 7.2 16 16 16H368c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80z"></path></svg>  
                                Thursday, Dec 21 2023</legend>
                        </fieldset>
                        <fieldset>
                            <legend><svg class="svg-inline--fa fa-calendar-week" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="calendar-week" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm80 64c-8.8 0-16 7.2-16 16v64c0 8.8 7.2 16 16 16H368c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80z"></path></svg>  
                                Friday, Dec 22 2023</legend>
                        </fieldset>
                        <fieldset>
                            <legend><svg class="svg-inline--fa fa-calendar-week" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="calendar-week" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm80 64c-8.8 0-16 7.2-16 16v64c0 8.8 7.2 16 16 16H368c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80z"></path></svg>  
                                Saturday, Dec 23 2023</legend>
                        </fieldset>
                        <fieldset>
                            <legend><svg class="svg-inline--fa fa-calendar-week" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="calendar-week" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm80 64c-8.8 0-16 7.2-16 16v64c0 8.8 7.2 16 16 16H368c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80z"></path></svg>  
                                Sunday, Dec 24 2023</legend>
                        </fieldset>
                        <fieldset>
                            <legend><svg class="svg-inline--fa fa-calendar-week" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="calendar-week" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm80 64c-8.8 0-16 7.2-16 16v64c0 8.8 7.2 16 16 16H368c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80z"></path></svg>  
                                Monday, Dec 25 2023</legend>
                        </fieldset>
                        <fieldset>
                            <legend><svg class="svg-inline--fa fa-calendar-week" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="calendar-week" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm80 64c-8.8 0-16 7.2-16 16v64c0 8.8 7.2 16 16 16H368c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80z"></path></svg>  
                                Tuesday, Dec 26 2023</legend>
                        </fieldset>
                        <fieldset>
                            <legend><svg class="svg-inline--fa fa-calendar-week" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="calendar-week" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm80 64c-8.8 0-16 7.2-16 16v64c0 8.8 7.2 16 16 16H368c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80z"></path></svg>  
                                Wednesday, Dec 27 2023</legend>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $(".toggle_users div").click(function() {
                $(".toggle_users div").removeClass("selected");
                $(this).addClass("selected");
            });
        });
    </script>
@endsection