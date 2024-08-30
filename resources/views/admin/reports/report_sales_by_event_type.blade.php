@extends('admin.layouts.master')
@section('title', 'Total Sales by Event Type')
@section('style')
<style type="text/css">
    #sales_chart {
        height: 720px;
        width: 84%;
    }

    #year_nav {
        text-align: center;
        font-size: 14px;
        font-weight: bold;
    }

    #year_nav a {
        margin: 6px 12px;
    }

    .data_label,
    .data_label span {
        color: #fff;
    }

    .data_label span {
        margin-left: 3px;
    }

    .legendLabel {
        width: 350px;
    }

    .legendLabel span.percent_val {
        float: right;
        width: 90px;
        margin-left: 12px;
    }

    .legendLabel span.dollar_val {
        float: right;
        width: 90px;
        text-align: right;
    }
</style>
@endsection
@section('content')
@php
    if(request('show_year') == null) {
        $currentYear = date('Y');
    }else{
        $currentYear = request('show_year');
    }
    
    $previousYear = $currentYear - 1;
    $nextYear = $currentYear + 1;
@endphp
<h1>Total Sales by Event Type for {{ $currentYear }}</h1>
<div class="line_break"></div>
<div id="year_nav">&lt;&lt;&lt; 
    <span><a href="{{ route('admin.reports.report-sales-by-event-type', ['show_year' => $previousYear]) }}">{{ $previousYear }}</a></span>{{ $currentYear }}
    <span><a href="{{ route('admin.reports.report-sales-by-event-type', ['show_year' => $nextYear]) }}">{{ $nextYear }}</a></span>&gt;&gt;&gt;
</div>
<div class="line_break"></div>
<div class="line_break"></div>
<div class="line_break"></div>
<!-- ********************* Sales Diagram Part ****************** -->
<div id="sales_chart" style="padding: 0px; position: relative;">
<canvas class="base" width="924" height="720"></canvas>
<canvas class="overlay" width="924" height="720" style="position: absolute; left: 0px; top: 0px;"></canvas>
    <div class="legend">
        <div style="position: absolute; width: 377px; height: 39px; top: 0px; right: -150px; background-color: rgb(255, 255, 255); opacity: 0.8;">
        </div>
        <table style="position:absolute;top:0px;right:-150px;;font-size:smaller;color:#545454">
            <tbody>
                <tr>
                    <td class="legendColorBox">
                        <div style="border:1px solid #ccc;padding:1px">
                            <div
                                style="width: 10px; height: 0px; border: 8px solid rgb(237, 194, 64); overflow: hidden;">
                            </div>
                        </div>
                    </td>
                    <td class="legendLabel">Wedding Reception<span class="percent_val">96.21%</span><span
                            class="dollar_val">$319,794</span></td>
                </tr>
                <tr>
                    <td class="legendColorBox">
                        <div style="border:1px solid #ccc;padding:1px">
                            <div
                                style="width: 10px; height: 0px; border: 8px solid rgb(175, 216, 248); overflow: hidden;">
                            </div>
                        </div>
                    </td>
                    <td class="legendLabel">Bridal Shower<span class="percent_val">2.53%</span><span
                            class="dollar_val">$8,407</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="line_break"></div>
<br>


@endsection
@section('scripts')
    <script>

    $(document).ready(function(){
        var chart_data = [{
            label: 'Wedding Reception<span class="percent_val">96.21%</span><span class="dollar_val">$319,794</span>',
            data: 319793.93
        },
        {
            label: 'Bridal Shower<span class="percent_val">2.53%</span><span class="dollar_val">$8,407</span>',
            data: 8407.00
        }
    ];

    $(function() {
        var options = {
            series: {
                pie: {
                    show: true,
                    radius: .8,
                    tilt: 0.40,
                    label: {
                        show: false,
                        radius: 2 / 3,
                        threshold: 0.015,
                        formatter: function(label, series) {
                            return '<div class="data_label">' + label + '</div>';
                        }
                    },
                    background: {
                        opacity: 0.8
                    }
                }
            },
            legend: {
                show: true,
                margin: [-150, 0],
                backgroundOpacity: .8
            }
        };
        $.plot($("#sales_chart"), chart_data, options);

        $("td.legendColorBox div > div").css("width", "10px");
        $("td.legendColorBox div > div").css("border-width", "8px");

        // Try to select the related color when user clicks on a label on the legend
        $(".legendColorBox").click(function() {
            var bg_color = $(this).children(":first").css("border-top-color");
            // alert("xx: ") ; // debug alert
            // alert("bg_color: " + bg_color) ; // debug alert
        });
    }); // document.ready  
    });
</script> 
<!-- <script type="text/javascript">
    var chart_data = [{
            label: 'Wedding Reception<span class="percent_val">96.21%</span><span class="dollar_val">$319,794</span>',
            data: 319793.93
        },
        {
            label: 'Bridal Shower<span class="percent_val">2.53%</span><span class="dollar_val">$8,407</span>',
            data: 8407.00
        }
    ];

    $(function() {
        var options = {
            series: {
                pie: {
                    show: true,
                    radius: .8,
                    tilt: 0.40,
                    label: {
                        show: false,
                        radius: 2 / 3,
                        threshold: 0.015,
                        formatter: function(label, series) {
                            return '<div class="data_label">' + label + '</div>';
                        }
                    },
                    background: {
                        opacity: 0.8
                    }
                }
            },
            legend: {
                show: true,
                margin: [-150, 0],
                backgroundOpacity: .8
            }
        };
        $.plot($("#sales_chart"), chart_data, options);

        $("td.legendColorBox div > div").css("width", "10px");
        $("td.legendColorBox div > div").css("border-width", "8px");

        // Try to select the related color when user clicks on a label on the legend
        $(".legendColorBox").click(function() {
            var bg_color = $(this).children(":first").css("border-top-color");
            // alert("xx: ") ; // debug alert
            // alert("bg_color: " + bg_color) ; // debug alert
        });
    }); // document.ready       
</script> -->
@endsection