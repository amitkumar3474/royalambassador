@extends('admin.layouts.master')
@section('title', 'Booking Comparison')
@section('style')
    <style>
        table {
            border-spacing: 0;
            empty-cells: show;
            width: auto;
        }
        table.bound th {
            background: #C5B469;
            padding-top: 6px;
            padding-bottom: 6px;
            padding-left: 3px;
            padding-right: 3px;
            color: #fff;
        }
        table.bound td {
            border: 1px solid #999;
            padding: 6px;
        }
    </style>
@endsection
@section('content')
<h1>Booking Comparison</h1>
<div class="line_break"></div>
<span id="compare_yearly" class="xmlb_form">
    <form method="post" id="frm_compare_yearly" action="" >
        <h2>Date Range Comparison (Whole Year)</h2>
        <div class="line_break"></div>
        <fieldset class="form_filters">
            <legend>Search</legend>
            <div class="filter_controls"><label>Sales Persons:</label>
                <select name="compare_yearly_lnk_sales_person" id="compare_yearly_LNK_SALES_PERSON" onchange="javascript:compare_yearly_applyFilters();">
                    <option value="" selected="yes">-- All --</option>
                    <option value="71">Aliyana Bland</option>
                    <option value="77">Ania Howlett</option>
                    <option value="78">Anil india</option>
                    <option value="29">Diana Bonilla</option>
                    <option value="2">John Giancola</option>
                    <option value="47">Nicolas Giancola</option>
                    <option value="76">Patrick Narvaez</option>
                    <option value="4">Stella Stalteri</option>
                    <option value="72">Vishi Sandhu</option>
                    <option value="1">Web Sales</option>
                </select>
                <label>Event Type:</label>
                <select name="compare_yearly_lnk_event_type" id="compare_yearly_LNK_EVENT_TYPE" multiple="multiple">
                    <option value="4">Anniversary</option>
                    <option value="28">Baby Shower</option>
                    <option value="39">Bachelor Party</option>
                    <option value="1">Baptism</option>
                    <option value="14">Birthday Party</option>
                    <option value="15">Bridal Shower</option>
                    <option value="26">Catering</option>
                    <option value="18">Christmas Party</option>
                    <option value="5">Club Function</option>
                    <option value="6">Communion</option>
                    <option value="19">Confirmation</option>
                    <option value="12">Convention</option>
                    <option value="36">Corporate</option>
                    <option value="38">Customer Appreciation</option>
                    <option value="8">Dinner</option>
                    <option value="16">Engagement</option>
                    <option value="20">Fashion Show</option>
                    <option value="7">Fundraiser</option>
                    <option value="34">Funeral</option>
                    <option value="37">Gala</option>
                    <option value="23">Golf Tournament</option>
                    <option value="35">Graduation</option>
                    <option value="30">Graduation Ceremony</option>
                    <option value="32">Jack &amp; Jill</option>
                    <option value="11">Luncheon</option>
                    <option value="10">Meeting</option>
                    <option value="13">Memorial</option>
                    <option value="29">Photos/Grounds</option>
                    <option value="40">Proposal</option>
                    <option value="25">Rehearsal</option>
                    <option value="17">Rehearsal Dinner</option>
                    <option value="31">Retirement Party</option>
                    <option value="9">School Prom</option>
                    <option value="24">Semi Formal</option>
                    <option value="33">Special Event</option>
                    <option value="21">Trade Show</option>
                    <option value="27">Wedding Cer./Reception</option>
                    <option value="2">Wedding Ceremony</option>
                    <option value="3">Wedding Reception</option>
                </select>
                <label>Booked between</label> 
                <input name="bd_more" id="bd_more" size="12" maxlength="10" title="Date when this when this event is booked" type="date" class="hasDatepicker">
                <label>and</label> 
                <input name="bd_less" id="bd_less" size="12" maxlength="10" title="Date when this when this event is booked" type="date" class="hasDatepicker">
                <label>Show:</label> 
                <select id="month_select">
                    <option value="">--All--</option>
                    <option value="01" days_in_month="31">January</option>
                    <option value="02" days_in_month="29">February</option>
                    <option value="03" days_in_month="31">March</option>
                    <option value="04" days_in_month="30">April</option>
                    <option value="05" days_in_month="31">May</option>
                    <option value="06" days_in_month="30">June</option>
                    <option value="07" days_in_month="31">July</option>
                    <option value="08" days_in_month="31">August</option>
                    <option value="09" days_in_month="30">September</option>
                    <option value="10" days_in_month="31">October</option>
                    <option value="11" days_in_month="30">November</option>
                    <option value="12" days_in_month="31">December</option>
                </select>
            </div>
            <div class="filter_buttons">
                <button type="submit" id="compare_yearly_apply_filter" class="button font-bold radius-0" >Search</button>
                <button type="button" id="compare_yearly_clear_filter" class="button font-bold radius-0" >Show All</button>
            </div>
        </fieldset>
    </form>
    <div class="line_break"></div>
    <table class="bound">
        <thead>
            <tr>
                <th></th>
                <th>For 2023</th>
                <th>For 2024</th>
                <th>For 2025</th>
                <th>For 2026</th>
                <th>For 2027</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Booked in 2024</td>
                <td class="year_diff_-1 cross_tab_cell">

                </td>
                <td class="year_diff_0 cross_tab_cell">
                    $1,452,794.27 <a href="#" onclick="loadAjaxObject('obj=page&amp;page_id=booking_comparioson_events?order_year=2024&amp;for_year=2024') ; return false;">i</a>
                </td>
                <td class="year_diff_1 cross_tab_cell">
                    $1,371,000.23 <a href="#" onclick="loadAjaxObject('obj=page&amp;page_id=booking_comparioson_events?order_year=2024&amp;for_year=2025') ; return false;">i</a>
                </td>
                <td class="year_diff_2 cross_tab_cell">
                    $110,466.00 <a href="#" onclick="loadAjaxObject('obj=page&amp;page_id=booking_comparioson_events?order_year=2024&amp;for_year=2026') ; return false;">i</a>
                </td>
                <td class="year_diff_3 cross_tab_cell">
                    $25,306.00 <a href="#" onclick="loadAjaxObject('obj=page&amp;page_id=booking_comparioson_events?order_year=2024&amp;for_year=2027') ; return false;">i</a>
                </td>
                <td class="cross_tab_cell">$2,959,566.50</td>
            </tr>
        </tbody>
    </table>
</span>
<br>
<span id="compare_quarterly" class="xmlb_form">
    <form method="post" id="frm_compare_quarterly" action="" >
        <h2>Quarterly Comparison (always whole quarter)</h2>

        <div class="line_break"></div>

        <fieldset class="form_filters">
            <legend>Search</legend>
            <div class="filter_controls">
                <label>Sales Persons:</label> 
                <select name="compare_quarterly_lnk_sales_person" id="compare_quarterly_LNK_SALES_PERSON" >
                    <option value="" selected="yes">-- All --</option>
                    <option value="71">Aliyana Bland</option>
                    <option value="77">Ania Howlett</option>
                    <option value="78">Anil india</option>
                    <option value="29">Diana Bonilla</option>
                    <option value="2">John Giancola</option>
                    <option value="47">Nicolas Giancola</option>
                    <option value="76">Patrick Narvaez</option>
                    <option value="4">Stella Stalteri</option>
                    <option value="72">Vishi Sandhu</option>
                    <option value="1">Web Sales</option>
                </select>
                <label>Event Type:</label> 
                <select name="compare_quarterly_lnk_event_type" id="compare_quarterly_LNK_EVENT_TYPE" multiple="multiple" >
                    <option value="4">Anniversary</option>
                    <option value="28">Baby Shower</option>
                    <option value="39">Bachelor Party</option>
                    <option value="1">Baptism</option>
                    <option value="14">Birthday Party</option>
                    <option value="15">Bridal Shower</option>
                    <option value="26">Catering</option>
                    <option value="18">Christmas Party</option>
                    <option value="5">Club Function</option>
                    <option value="6">Communion</option>
                    <option value="19">Confirmation</option>
                    <option value="12">Convention</option>
                    <option value="36">Corporate</option>
                    <option value="38">Customer Appreciation</option>
                    <option value="8">Dinner</option>
                    <option value="16">Engagement</option>
                    <option value="20">Fashion Show</option>
                    <option value="7">Fundraiser</option>
                    <option value="34">Funeral</option>
                    <option value="37">Gala</option>
                    <option value="23">Golf Tournament</option>
                    <option value="35">Graduation</option>
                    <option value="30">Graduation Ceremony</option>
                    <option value="32">Jack &amp; Jill</option>
                    <option value="11">Luncheon</option>
                    <option value="10">Meeting</option>
                    <option value="13">Memorial</option>
                    <option value="29">Photos/Grounds</option>
                    <option value="40">Proposal</option>
                    <option value="25">Rehearsal</option>
                    <option value="17">Rehearsal Dinner</option>
                    <option value="31">Retirement Party</option>
                    <option value="9">School Prom</option>
                    <option value="24">Semi Formal</option>
                    <option value="33">Special Event</option>
                    <option value="21">Trade Show</option>
                    <option value="27">Wedding Cer./Reception</option>
                    <option value="2">Wedding Ceremony</option>
                    <option value="3">Wedding Reception</option>
                </select>
            </div>
            <div class="filter_buttons">
                <button type="submit" id="compare_quarterly_apply_filter" class="button font-bold radius-0" >Search</button>
                <button type="button" id="compare_quarterly_clear_filter" class="button font-bold radius-0" >Show All</button>
            </div>
          </fieldset>
    </form>
    <div class="line_break"></div>
    <table class="bound">
        <thead>
            <tr>
                <th></th>
                <th>For 2023</th>
                <th>For 2024</th>
                <th>For 2025</th>
                <th>For 2026</th>
                <th>For 2027</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr><td colspan="10" class="group_header">Booked in Q</td></tr>
            <tr>
                <td class="year_header">• </td>
                <td class="year_diff_2023 cross_tab_cell">$22.00</td>
                <td class="year_diff_2024 cross_tab_cell"></td>
                <td class="year_diff_2025 cross_tab_cell"></td>
                <td class="year_diff_2026 cross_tab_cell"></td>
                <td class="year_diff_2027 cross_tab_cell"></td>
                <td class="cross_tab_cell">$22.00</td>
            </tr>
        </tbody>
    </table>
</span>
<br>
<span id="compare_monthly" class="xmlb_form">
    <form method="post" id="frm_compare_monthly" action="" >
        <h2>Monthly Comparison (always whole month)</h2>

        <div class="line_break"></div>

        <fieldset class="form_filters">
            <legend>Search</legend>
            <div class="filter_controls">
                <label>Sales Persons:</label> 
                <select name="compare_monthly_lnk_sales_person" id="compare_monthly_LNK_SALES_PERSON" >
                    <option value="" selected="yes">-- All --</option>
                    <option value="71">Aliyana Bland</option>
                    <option value="77">Ania Howlett</option>
                    <option value="78">Anil india</option>
                    <option value="29">Diana Bonilla</option>
                    <option value="2">John Giancola</option>
                    <option value="47">Nicolas Giancola</option>
                    <option value="76">Patrick Narvaez</option>
                    <option value="4">Stella Stalteri</option>
                    <option value="72">Vishi Sandhu</option>
                    <option value="1">Web Sales</option>
                </select>
                <label>Event Type:</label> 
                <select name="compare_monthly_lnk_event_type" id="compare_monthly_LNK_EVENT_TYPE" multiple="multiple" >
                    <option value="4">Anniversary</option>
                    <option value="28">Baby Shower</option>
                    <option value="39">Bachelor Party</option>
                    <option value="1">Baptism</option>
                    <option value="14">Birthday Party</option>
                    <option value="15">Bridal Shower</option>
                    <option value="26">Catering</option>
                    <option value="18">Christmas Party</option>
                    <option value="5">Club Function</option>
                    <option value="6">Communion</option>
                    <option value="19">Confirmation</option>
                    <option value="12">Convention</option>
                    <option value="36">Corporate</option>
                    <option value="38">Customer Appreciation</option>
                    <option value="8">Dinner</option>
                    <option value="16">Engagement</option>
                    <option value="20">Fashion Show</option>
                    <option value="7">Fundraiser</option>
                    <option value="34">Funeral</option>
                    <option value="37">Gala</option>
                    <option value="23">Golf Tournament</option>
                    <option value="35">Graduation</option>
                    <option value="30">Graduation Ceremony</option>
                    <option value="32">Jack &amp; Jill</option>
                    <option value="11">Luncheon</option>
                    <option value="10">Meeting</option>
                    <option value="13">Memorial</option>
                    <option value="29">Photos/Grounds</option>
                    <option value="40">Proposal</option>
                    <option value="25">Rehearsal</option>
                    <option value="17">Rehearsal Dinner</option>
                    <option value="31">Retirement Party</option>
                    <option value="9">School Prom</option>
                    <option value="24">Semi Formal</option>
                    <option value="33">Special Event</option>
                    <option value="21">Trade Show</option>
                    <option value="27">Wedding Cer./Reception</option>
                    <option value="2">Wedding Ceremony</option>
                    <option value="3">Wedding Reception</option>
                </select>
            </div>
            <div class="filter_buttons">
                <button type="submit" id="compare_monthly_apply_filter" class="button font-bold radius-0" >Search</button>
                <button type="button" id="compare_monthly_clear_filter" class="button font-bold radius-0" >Show All</button>
            </div>
          </fieldset>
    </form>
    <div class="line_break"></div>
    <table class="bound">
        <thead>
            <tr>
                <th></th>
                <th>For 2023</th>
                <th>For 2024</th>
                <th>For 2025</th>
                <th>For 2026</th>
                <th>For 2027</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr><td colspan="10" class="group_header">Booked in April</td></tr>
            <tr>
                <td class="year_header">• </td>
                <td class="year_diff_2023 cross_tab_cell">$22.00</td>
                <td class="year_diff_2024 cross_tab_cell"></td>
                <td class="year_diff_2025 cross_tab_cell"></td>
                <td class="year_diff_2026 cross_tab_cell"></td>
                <td class="year_diff_2027 cross_tab_cell"></td>
                <td class="cross_tab_cell">$22.00</td>
            </tr>
        </tbody>
    </table>
</span>
@endsection
