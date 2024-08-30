@extends('admin.layouts.master')
@section('title', 'Purchasing Short List')
@section('style')
<style>
    .btn {
        font-size: 1em;
        margin-left: .2em;
        cursor: pointer;
        background: none;
        color: #F7941E;
        min-width: auto;
    }

    .svg-inline--fa {
        display: var(--fa-display, inline-block);
        height: 1em;
        overflow: visible;
        vertical-align: -.125em;
    }

    .bottom_bar {
        position: fixed;
        bottom: 0px;
        background: rgba(209, 214, 210, 0.6);
        width: 98%;
        border: 1px solid #575C63;
        border-bottom: 0;
        text-align: center;
        border-top-right-radius: 6px;
        border-top-left-radius: 6px;
    }

    input[type="submit"],
    button,
    .special_action {
        color: #fff;
        padding: 3px;
        border: 0;
        margin: 3px;
        min-width: 60px;
        font-weight: bold;
        background: #35414a;
    }

    input[type="submit"]:hover,
    button:hover,
    .special_action:hover {
        text-decoration: none;
        background: #57627b;
    }
    #weekly_item_requirements label {
        float: none;
        width: auto;
        vertical-align: middle;
    }

    #weekly_item_requirements .bar_req_line {
        display: grid;
        grid-gap: .1em;
        margin: 0;
    }

    #weekly_item_requirements .bar_req_line span {
        border: 1px solid #CCC;
    }

    #weekly_item_requirements .req_qty,
    #weekly_item_requirements .req_qty_total {
        text-decoration: underline;
        color: #0782C1;
        cursor: pointer;
    }
</style>
@endsetion
@section('content')
<div class="title_bar card">
    <h1>Required Purchasing</h1>
</div>

<span id="weekly_item_requirements" class="xmlb_form">
    <div class="card">
        <div>
            <h2>Bar Requirement of this Week </h2>
            <label>From</label> <input type="text" class="date req_from_date hasDatepicker" value="2024-05-13"
                id="dp1715766667066" fdprocessedid="sk1ef"><img class="ui-datepicker-trigger"
                src="/plugin/jquery_ui/images/calendar.gif" alt="..." title="...">
            <label>To</label> <input type="text" class="date req_to_date hasDatepicker" value="2024-05-19"
                id="dp1715766667067" fdprocessedid="1wmy6f"><img class="ui-datepicker-trigger"
                src="/plugin/jquery_ui/images/calendar.gif" alt="..." title="...">

            <span class="btn_prev_week small_button">&lt; Prev Week</span>
            <span class="btn_this_week small_button">This Week</span>
            <span class="btn_next_week small_button">Next Week &gt;</span>

            <br>
            <div class="bar_req_wrap" style="display: block;">
                <p class="bar_req_line header calign"
                    style="grid-template-columns: 4fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr;"><span>Item</span><span
                        class="calign">2024-05-13</span><span class="calign">2024-05-14</span><span
                        class="calign">2024-05-15</span><span class="calign">2024-05-16</span><span
                        class="calign">2024-05-17</span><span class="calign">2024-05-18</span><span
                        class="calign">2024-05-19</span><span class="calign">Total</span></p>
                <p class="bar_req_line actual_body" gn_prod_id="158"
                    style="grid-template-columns: 4fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr;"><span>Cash Bar</span><span
                        class="ralign req_qty" given_day="2024-05-13"></span><span class="ralign req_qty"
                        given_day="2024-05-14"></span><span class="ralign req_qty" given_day="2024-05-15">22</span><span
                        class="ralign req_qty" given_day="2024-05-16"></span><span class="ralign req_qty"
                        given_day="2024-05-17"></span><span class="ralign req_qty" given_day="2024-05-18"></span><span
                        class="ralign req_qty" given_day="2024-05-19"></span><span
                        class="ralign req_qty_total">22</span></p>
                <p class="bar_req_line actual_body" gn_prod_id="159"
                    style="grid-template-columns: 4fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr;"><span>Champagne
                        Toast</span><span class="ralign req_qty" given_day="2024-05-13"></span><span
                        class="ralign req_qty" given_day="2024-05-14"></span><span class="ralign req_qty"
                        given_day="2024-05-15"></span><span class="ralign req_qty" given_day="2024-05-16"></span><span
                        class="ralign req_qty" given_day="2024-05-17">174</span><span class="ralign req_qty"
                        given_day="2024-05-18">110</span><span class="ralign req_qty"
                        given_day="2024-05-19">326</span><span class="ralign req_qty_total">610</span></p>
                <p class="bar_req_line actual_body" gn_prod_id="3"
                    style="grid-template-columns: 4fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr;"><span>Cocktails</span><span
                        class="ralign req_qty" given_day="2024-05-13"></span><span class="ralign req_qty"
                        given_day="2024-05-14"></span><span class="ralign req_qty" given_day="2024-05-15"></span><span
                        class="ralign req_qty" given_day="2024-05-16"></span><span class="ralign req_qty"
                        given_day="2024-05-17">174</span><span class="ralign req_qty"
                        given_day="2024-05-18">130</span><span class="ralign req_qty"
                        given_day="2024-05-19">472</span><span class="ralign req_qty_total">776</span></p>
                <p class="bar_req_line actual_body" gn_prod_id="31"
                    style="grid-template-columns: 4fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr;"><span>Martini Bar with Ice
                        Luge</span><span class="ralign req_qty" given_day="2024-05-13"></span><span
                        class="ralign req_qty" given_day="2024-05-14"></span><span class="ralign req_qty"
                        given_day="2024-05-15"></span><span class="ralign req_qty" given_day="2024-05-16"></span><span
                        class="ralign req_qty" given_day="2024-05-17"></span><span class="ralign req_qty"
                        given_day="2024-05-18"></span><span class="ralign req_qty"
                        given_day="2024-05-19">284</span><span class="ralign req_qty_total">284</span></p>
                <p class="bar_req_line actual_body" gn_prod_id="13"
                    style="grid-template-columns: 4fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr;"><span>Premium Bar</span><span
                        class="ralign req_qty" given_day="2024-05-13"></span><span class="ralign req_qty"
                        given_day="2024-05-14"></span><span class="ralign req_qty" given_day="2024-05-15"></span><span
                        class="ralign req_qty" given_day="2024-05-16"></span><span class="ralign req_qty"
                        given_day="2024-05-17"></span><span class="ralign req_qty"
                        given_day="2024-05-18">240</span><span class="ralign req_qty"
                        given_day="2024-05-19">326</span><span class="ralign req_qty_total">566</span></p>
                <p class="bar_req_line actual_body" gn_prod_id="2101"
                    style="grid-template-columns: 4fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr;"><span>Singature
                        Drink</span><span class="ralign req_qty" given_day="2024-05-13"></span><span
                        class="ralign req_qty" given_day="2024-05-14"></span><span class="ralign req_qty"
                        given_day="2024-05-15"></span><span class="ralign req_qty" given_day="2024-05-16"></span><span
                        class="ralign req_qty" given_day="2024-05-17"></span><span class="ralign req_qty"
                        given_day="2024-05-18">110</span><span class="ralign req_qty"
                        given_day="2024-05-19"></span><span class="ralign req_qty_total">110</span></p>
                <p class="bar_req_line actual_body" gn_prod_id="30"
                    style="grid-template-columns: 4fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr;"><span>Standard Bar</span><span
                        class="ralign req_qty" given_day="2024-05-13"></span><span class="ralign req_qty"
                        given_day="2024-05-14"></span><span class="ralign req_qty" given_day="2024-05-15"></span><span
                        class="ralign req_qty" given_day="2024-05-16"></span><span class="ralign req_qty"
                        given_day="2024-05-17">174</span><span class="ralign req_qty"
                        given_day="2024-05-18"></span><span class="ralign req_qty" given_day="2024-05-19"></span><span
                        class="ralign req_qty_total">174</span></p>
                <p><strong>Total Guests: 908</strong></p>
            </div>

        </div>
    </div>
</span>

<span id="po_short_list" class="xmlb_form">
    <div class="card">
        <div>

            <label>Search:</label> <input class="txt_search" fdprocessedid="ej8pb">
            <span class="btn_clear_search btn"><svg class="svg-inline--fa fa-trash-can" aria-hidden="true"
                    focusable="false" data-prefix="far" data-icon="trash-can" role="img"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                    <path fill="currentColor"
                        d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z">
                    </path>
                </svg><!-- <i class="far fa-trash-alt"></i> Font Awesome fontawesome.com --></span>

            <label>Sorty By:</label> <span class="btn_sort_wrap azbd_single_choice enabled"><span value="by_name"
                    class="selected"><svg class="svg-inline--fa fa-check" aria-hidden="true" focusable="false"
                        data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 448 512" data-fa-i2svg="">
                        <path fill="currentColor"
                            d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z">
                        </path>
                    </svg><!-- <i class="fas fa-check"></i> Font Awesome fontawesome.com --> By Name</span><span
                    value="by_type">By Type</span><span value="by_bin_num">By Bin #</span></span>

            <label>Add Item:</label> <span role="status" aria-live="polite"
                class="ui-helper-hidden-accessible"></span><input id="add_item" class="ui-autocomplete-input"
                autocomplete="off" fdprocessedid="waclqo">

        </div>
    </div>

    <div class="lq_slist_wrap" style="display: block;">
        <div class="card supplier_warp" supplier_id="46">
            <div>
                <div class="supplier_header"><input type="checkbox" class="chkbx_supplier" value="46"> Beer Store</div>
                <div class="supplier_items_wrap">
                    <div class="po_slist_row header"><span>Name</span><span>On Hand</span><span>Cases to
                            Order</span><span></span></div>
                    <div class="actual_body po_slist_row" po_slist_id="41" gn_prod_id="1484"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1484"
                                target="_blank">Budweiser</a> (P. Price: $42.95)<br><strong>Purcahsed In:</strong> Case
                            of 24 <strong>Type:</strong> Beer<br><strong>Move to:</strong> <select
                                class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>240: 10 / 0 <span class="q_tip"><svg
                                    class="svg-inline--fa fa-circle-info" aria-hidden="true" focusable="false"
                                    data-prefix="fas" data-icon="circle-info" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>240: 10 / 0 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="0">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="61" gn_prod_id="1538"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1538"
                                target="_blank">Caledon Hills Premium Vienna Lager</a> (P. Price:
                            $72.00)<br><strong>Purcahsed In:</strong> Case of 24 <strong>Type:</strong>
                            Beer<br><strong>Move to:</strong> <select class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>0: 0 / 0<br>Use: 0.0000</span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="0">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="42" gn_prod_id="1485"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1485"
                                target="_blank">Coors Light</a> (P. Price: $42.95)<br><strong>Purcahsed In:</strong>
                            Case of 24 <strong>Type:</strong> Beer<br><strong>Move to:</strong> <select
                                class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>192: 8 / 0 <span class="q_tip"><svg
                                    class="svg-inline--fa fa-circle-info" aria-hidden="true" focusable="false"
                                    data-prefix="fas" data-icon="circle-info" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>192: 8 / 0 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="0">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="43" gn_prod_id="1486"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1486"
                                target="_blank">Corona</a> (P. Price: $55.95)<br><strong>Purcahsed In:</strong> Case of
                            24 <strong>Type:</strong> Beer<br><strong>Move to:</strong> <select class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>120: 5 / 0 <span class="q_tip"><svg
                                    class="svg-inline--fa fa-circle-info" aria-hidden="true" focusable="false"
                                    data-prefix="fas" data-icon="circle-info" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>120: 5 / 0 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="6">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="70" gn_prod_id="1678"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1678"
                                target="_blank">GoodLot Farmstead Ale</a> (P. Price: $80.40)<br><strong>Purcahsed
                                In:</strong> Case of 24 <strong>Type:</strong> Beer<br><strong>Move to:</strong> <select
                                class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>0: 0 / 0<br>Use: 0.0000</span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="0">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="44" gn_prod_id="1487"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1487"
                                target="_blank">Heineken Rest D</a> (P. Price: $53.95)<br><strong>Purcahsed In:</strong>
                            Case of 24 <strong>Type:</strong> Beer<br><strong>Move to:</strong> <select
                                class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>138: 5 / 18 <span class="q_tip"><svg
                                    class="svg-inline--fa fa-circle-info" aria-hidden="true" focusable="false"
                                    data-prefix="fas" data-icon="circle-info" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>138: 5 / 18 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="6">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="47" gn_prod_id="1490"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1490"
                                target="_blank">Molson Canadian</a> (P. Price: $42.95)<br><strong>Purcahsed In:</strong>
                            Case of 24 <strong>Type:</strong> Beer<br><strong>Move to:</strong> <select
                                class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>70: 2 / 22 <span class="q_tip"><svg
                                    class="svg-inline--fa fa-circle-info" aria-hidden="true" focusable="false"
                                    data-prefix="fas" data-icon="circle-info" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>70: 2 / 22 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="0">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="104" gn_prod_id="2317"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2317"
                                target="_blank">Sapporo</a> (P. Price: $59.95)<br><strong>Purcahsed In:</strong> Case of
                            24 <strong>Type:</strong> Beer<br><strong>Move to:</strong> <select class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>0: 0 / 0<br>Use: 0.0000</span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="6">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="119" gn_prod_id="2321"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2321"
                                target="_blank">Sapporo Keg</a> (P. Price: $null)<br><strong>Purcahsed In:</strong> Tank
                            <strong>Type:</strong> Beer<br><strong>Move to:</strong> <select class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>0<br>Use: 0.0000</span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="0">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="117" gn_prod_id="1583"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1583"
                                target="_blank">Sleeman Clear</a> (P. Price: $45.95)<br><strong>Purcahsed In:</strong>
                            Case of 24 <strong>Type:</strong> Beer<br><strong>Move to:</strong> <select
                                class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>96: 4 / 0 <span class="q_tip"><svg
                                    class="svg-inline--fa fa-circle-info" aria-hidden="true" focusable="false"
                                    data-prefix="fas" data-icon="circle-info" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>96: 4 / 0 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="0">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="105" gn_prod_id="2316"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2316"
                                target="_blank">Sleeman Original Draught</a> (P. Price: $45.95)<br><strong>Purcahsed
                                In:</strong> Case of 24 <strong>Type:</strong> Beer<br><strong>Move to:</strong> <select
                                class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>72: 3 / 0 <span class="q_tip"><svg
                                    class="svg-inline--fa fa-circle-info" aria-hidden="true" focusable="false"
                                    data-prefix="fas" data-icon="circle-info" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>72: 3 / 0 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="3">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="118" gn_prod_id="2320"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2320"
                                target="_blank">Sleeman Original Draught Keg</a> (P. Price:
                            $211.95)<br><strong>Purcahsed In:</strong> Tank <strong>Type:</strong> Beer<br><strong>Move
                                to:</strong> <select class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>0<br>Use: 0.0000</span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="0">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="49" gn_prod_id="1494"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1494"
                                target="_blank">Stella Artois</a> (P. Price: $53.95)<br><strong>Purcahsed In:</strong>
                            Case of 24 <strong>Type:</strong> Beer<br><strong>Move to:</strong> <select
                                class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>0: 0 / 0<br>Use: 0.0000</span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="0">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card supplier_warp" supplier_id="4">
            <div>
                <div class="supplier_header"><input type="checkbox" class="chkbx_supplier" value="4"> Euro Desserts
                </div>
                <div class="supplier_items_wrap">
                    <div class="po_slist_row header"><span>Name</span><span>On Hand</span><span>Cases to
                            Order</span><span></span></div>
                    <div class="actual_body po_slist_row" po_slist_id="175" gn_prod_id="2667"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2667"
                                target="_blank">hello2 (Bin #: 118)</a> (P. Price: $2.00)<br><strong>Purcahsed
                                In:</strong> Case of 12 <strong>Type:</strong> Wine<br><strong>Move to:</strong> <select
                                class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>13051: 1087 / 7 <span class="q_tip"><svg
                                    class="svg-inline--fa fa-circle-info" aria-hidden="true" focusable="false"
                                    data-prefix="fas" data-icon="circle-info" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>1: 0 / 1 @ 1st. Floor Wine Room</p>
                                <p>25: 2 / 1 @ 2nd. Floor Wine Room </p>
                                <p>8115: 676 / 3 @ Beer Fridge (East)</p>
                                <p>23: 1 / 11 @ Consulate Warehouse</p>
                                <p>4887: 407 / 3 @ Beer Fridge (West)</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999"
                                    step="0.01" value="0">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="176" gn_prod_id="2667"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2667"
                                target="_blank">hello2 (Bin #: 118)</a> (P. Price: $2.00)<br><strong>Purcahsed
                                In:</strong> Case of 12 <strong>Type:</strong> Wine<br><strong>Move to:</strong> <select
                                class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>13051: 1087 / 7 <span class="q_tip"><svg
                                    class="svg-inline--fa fa-circle-info" aria-hidden="true" focusable="false"
                                    data-prefix="fas" data-icon="circle-info" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>1: 0 / 1 @ 1st. Floor Wine Room</p>
                                <p>25: 2 / 1 @ 2nd. Floor Wine Room </p>
                                <p>8115: 676 / 3 @ Beer Fridge (East)</p>
                                <p>23: 1 / 11 @ Consulate Warehouse</p>
                                <p>4887: 407 / 3 @ Beer Fridge (West)</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999"
                                    step="0.01" value="0">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card supplier_warp" supplier_id="43">
            <div>
                <div class="supplier_header"><input type="checkbox" class="chkbx_supplier" value="43"> LCBO</div>
                <div class="supplier_items_wrap">
                    <div class="po_slist_row header"><span>Name</span><span>On Hand</span><span>Cases to
                            Order</span><span></span></div>
                    <div class="actual_body po_slist_row" po_slist_id="80" gn_prod_id="1977"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1977"
                                target="_blank">1800 Reposado Tequila</a> (P. Price: $41.45)<br><strong>Purcahsed
                                In:</strong> Single <strong>Type:</strong> Tequila<br><strong>Move to:</strong> <select
                                class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>5 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>5 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="10">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="170" gn_prod_id="1589"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1589"
                                target="_blank">Amaro Montenegro</a> (P. Price: $29.45)<br><strong>Purcahsed
                                In:</strong> Single <strong>Type:</strong> Amaro<br><strong>Move to:</strong> <select
                                class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>0<br>Use: 0.0000</span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="0">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="64" gn_prod_id="1572"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1572"
                                target="_blank">Aperol</a> (P. Price: $28.65)<br><strong>Purcahsed In:</strong> Single
                            <strong>Type:</strong> Bitters (Apperitifs/Digestives)<br><strong>Move to:</strong> <select
                                class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>3 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>2 @ Banquet Hall Liquor Room</p>
                                <p>1 @ Consulate Warehouse</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="5">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="156" gn_prod_id="2476"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2476"
                                target="_blank">Appleton Estate V/X Signature Blend</a> (P. Price:
                            $46.30)<br><strong>Purcahsed In:</strong> Single <strong>Type:</strong> Rum<br><strong>Move
                                to:</strong> <select class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>0<br>Use: 0.0000</span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999"
                                    step="0.01" value="0">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="83" gn_prod_id="2135"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2135"
                                target="_blank">Astoria Prosecco La Robinia (Bin #: 235)</a> (P. Price:
                            $15.80)<br><strong>Purcahsed In:</strong> Single <strong>Type:</strong> Wine<br><strong>Move
                                to:</strong> <select class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>11 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>11 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="0">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="10" gn_prod_id="1414"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1414"
                                target="_blank">Bacardi Superior White Rum</a> (P. Price: $43.75)<br><strong>Purcahsed
                                In:</strong> Single <strong>Type:</strong> Rum<br><strong>Move to:</strong> <select
                                class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>7 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>7 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="4">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="24" gn_prod_id="1464"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1464"
                                target="_blank">Baileys Irish Cream</a> (P. Price: $42.90)<br><strong>Purcahsed
                                In:</strong> Single <strong>Type:</strong> Liqueurs<br><strong>Move to:</strong> <select
                                class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>4.5 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>4.5 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0019
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="2">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="60" gn_prod_id="1517"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1517"
                                target="_blank">Ballatines's Scotch</a> (P. Price: $43.95)<br><strong>Purcahsed
                                In:</strong> Single <strong>Type:</strong> Scotch Whisky<br><strong>Move to:</strong>
                            <select class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>5 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>5 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="0">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="171" gn_prod_id="1412"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1412"
                                target="_blank">Beefeater Gin</a> (P. Price: $43.25)<br><strong>Purcahsed In:</strong>
                            Single <strong>Type:</strong> Gin<br><strong>Move to:</strong> <select
                                class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>1 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>1 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0074
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="13">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="19" gn_prod_id="1426"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1426"
                                target="_blank">Belvedere Pure Vodka</a> (P. Price: $52.30)<br><strong>Purcahsed
                                In:</strong> Single <strong>Type:</strong> Vodka<br><strong>Move to:</strong> <select
                                class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>10 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>10 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="0">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="66" gn_prod_id="1628"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1628"
                                target="_blank">Brickworks Ciderhouse Batch : 1904</a> (P. Price:
                            $76.80)<br><strong>Purcahsed In:</strong> Single <strong>Type:</strong> Beer<br><strong>Move
                                to:</strong> <select class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>0<br>Use: 0.0000</span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="0">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="1" gn_prod_id="1397"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1397"
                                target="_blank">Campari Aperitivo</a> (P. Price: $30.40)<br><strong>Purcahsed
                                In:</strong> Single <strong>Type:</strong> Bitters
                            (Apperitifs/Digestives)<br><strong>Move to:</strong> <select class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>4 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>4 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="3">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="167" gn_prod_id="1532"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1532"
                                target="_blank">Captain Morgan Dark Rum</a> (P. Price: $43.25)<br><strong>Purcahsed
                                In:</strong> Single <strong>Type:</strong> Rum<br><strong>Move to:</strong> <select
                                class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>3 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>3 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="0">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="13" gn_prod_id="1418"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1418"
                                target="_blank">Captain Morgan Original Spiced Rum</a> (P. Price:
                            $44.75)<br><strong>Purcahsed In:</strong> Single <strong>Type:</strong> Rum<br><strong>Move
                                to:</strong> <select class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>3 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>3 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="2">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="14" gn_prod_id="1419"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1419"
                                target="_blank">Chivas Regal 12 Year Old Scotch Whisky</a> (P. Price:
                            $78.95)<br><strong>Purcahsed In:</strong> Single <strong>Type:</strong> Scotch
                            Whisky<br><strong>Move to:</strong> <select class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>5 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>5 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="0">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="98" gn_prod_id="1545"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1545"
                                target="_blank">Ciroc</a> (P. Price: $50.95)<br><strong>Purcahsed In:</strong> Single
                            <strong>Type:</strong> Vodka<br><strong>Move to:</strong> <select class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>6 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>6 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="2">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="79" gn_prod_id="1976"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1976"
                                target="_blank">Ciroc Pineapple</a> (P. Price: $50.95)<br><strong>Purcahsed In:</strong>
                            Single <strong>Type:</strong> Vodka<br><strong>Move to:</strong> <select
                                class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>8 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>8 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="0">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="97" gn_prod_id="2141"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2141"
                                target="_blank">Cortel Napoleon VSOP Brandy</a> (P. Price: $28.95)<br><strong>Purcahsed
                                In:</strong> Single <strong>Type:</strong> Cognac/Brandy<br><strong>Move to:</strong>
                            <select class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>0<br>Use: 0.0000</span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="0">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="20" gn_prod_id="1436"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1436"
                                target="_blank">Courvoisier VS Cognac</a> (P. Price: $65.95)<br><strong>Purcahsed
                                In:</strong> Single <strong>Type:</strong> Cognac/Brandy<br><strong>Move to:</strong>
                            <select class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>5 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>5 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="5">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="3" gn_prod_id="1400"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1400"
                                target="_blank">Crown Royal Whisky</a> (P. Price: $31.95)<br><strong>Purcahsed
                                In:</strong> Single <strong>Type:</strong> Canadian Whisky (Rye)<br><strong>Move
                                to:</strong> <select class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>1.5 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>1.5 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="7">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="23" gn_prod_id="1462"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1462"
                                target="_blank">Disaronno Originale Amaretto</a> (P. Price: $42.90)<br><strong>Purcahsed
                                In:</strong> Single <strong>Type:</strong> Amaretto<br><strong>Move to:</strong> <select
                                class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>8.5 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>8.5 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="0">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="78" gn_prod_id="1975"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1975"
                                target="_blank">Dr. McGillicuddy's Intense Butterscotch</a> (P. Price:
                            $19.65)<br><strong>Purcahsed In:</strong> Single <strong>Type:</strong>
                            Liqueurs<br><strong>Move to:</strong> <select class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>3 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>3 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="1">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="82" gn_prod_id="1980"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1980"
                                target="_blank">Fireball Cinnamon Whisky</a> (P. Price: $24.95)<br><strong>Purcahsed
                                In:</strong> Single <strong>Type:</strong> Canadian Whisky (Rye)<br><strong>Move
                                to:</strong> <select class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>3 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>3 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="1">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="73" gn_prod_id="1703"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1703"
                                target="_blank">Frangelico</a> (P. Price: $29.95)<br><strong>Purcahsed In:</strong>
                            Single <strong>Type:</strong> Liqueurs<br><strong>Move to:</strong> <select
                                class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>6 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>6 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="0">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="15" gn_prod_id="1421"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1421"
                                target="_blank">Glenfiddich 12 Year Old Single Malt Scotch Whisky</a> (P. Price:
                            $99.95)<br><strong>Purcahsed In:</strong> Single <strong>Type:</strong> Scotch
                            Whisky<br><strong>Move to:</strong> <select class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>8 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>8 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="2">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="27" gn_prod_id="1468"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1468"
                                target="_blank">Grand Marnier Cordon Rouge</a> (P. Price: $70.70)<br><strong>Purcahsed
                                In:</strong> Single <strong>Type:</strong> Liqueurs<br><strong>Move to:</strong> <select
                                class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>5 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>5 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="0">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="84" gn_prod_id="2216"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2216"
                                target="_blank">Grappa Sarpa Di Poli</a> (P. Price: $45.00)<br><strong>Purcahsed
                                In:</strong> Single <strong>Type:</strong> Grappa<br><strong>Move to:</strong> <select
                                class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>6 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>6 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0147
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="0">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="17" gn_prod_id="1424"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1424"
                                target="_blank">Grey Goose Vodka</a> (P. Price: $51.95)<br><strong>Purcahsed
                                In:</strong> Single <strong>Type:</strong> Vodka<br><strong>Move to:</strong> <select
                                class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>1 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>1 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0074
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="9">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="168" gn_prod_id="1598"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1598"
                                target="_blank">Hendrick's Gin</a> (P. Price: $52.95)<br><strong>Purcahsed In:</strong>
                            Single <strong>Type:</strong> Gin<br><strong>Move to:</strong> <select
                                class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>2 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>2 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="0">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="8" gn_prod_id="1410"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1410"
                                target="_blank">Hennessy VSOP Cognac</a> (P. Price: $109.60)<br><strong>Purcahsed
                                In:</strong> Single <strong>Type:</strong> Cognac/Brandy<br><strong>Move to:</strong>
                            <select class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>2 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>2 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0129
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="7">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="28" gn_prod_id="1469"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1469"
                                target="_blank">Jack Daniels</a> (P. Price: $48.95)<br><strong>Purcahsed In:</strong>
                            Single <strong>Type:</strong> American Wisky<br><strong>Move to:</strong> <select
                                class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>4.5 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>4.5 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="2">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="2" gn_prod_id="1398"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1398"
                                target="_blank">Jagermeister</a> (P. Price: $30.00)<br><strong>Purcahsed In:</strong>
                            Single <strong>Type:</strong> Bitters (Apperitifs/Digestives)<br><strong>Move to:</strong>
                            <select class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>3.5 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>3.5 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="1">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="68" gn_prod_id="1654"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1654"
                                target="_blank">Jameson Irish Whisky</a> (P. Price: $36.96)<br><strong>Purcahsed
                                In:</strong> Single <strong>Type:</strong> Irish Wisky<br><strong>Move to:</strong>
                            <select class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>9.5 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>9.5 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="0">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="63" gn_prod_id="1570"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1570"
                                target="_blank">Johnnie Walker Black Label Scotch Whisky</a> (P. Price:
                            $82.95)<br><strong>Purcahsed In:</strong> Single <strong>Type:</strong> Scotch
                            Whisky<br><strong>Move to:</strong> <select class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>11 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>11 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0147
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="0">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="29" gn_prod_id="1470"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1470"
                                target="_blank">Kahlua</a> (P. Price: $39.95)<br><strong>Purcahsed In:</strong> Single
                            <strong>Type:</strong> Liqueurs<br><strong>Move to:</strong> <select class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>3 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>3 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="2">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="11" gn_prod_id="1415"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1415"
                                target="_blank">Lamb's Classic White Rum</a> (P. Price: $43.25)<br><strong>Purcahsed
                                In:</strong> Single <strong>Type:</strong> Rum<br><strong>Move to:</strong> <select
                                class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>0<br>Use: 0.0092</span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="0">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="65" gn_prod_id="1626"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1626"
                                target="_blank">Maker's Mark Kentucky Bourbon</a> (P. Price:
                            $43.45)<br><strong>Purcahsed In:</strong> Single <strong>Type:</strong>
                            Bourbon<br><strong>Move to:</strong> <select class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>6 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>6 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="1">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="12" gn_prod_id="1417"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1417"
                                target="_blank">Malibu Coconut Rum</a> (P. Price: $38.25)<br><strong>Purcahsed
                                In:</strong> Single <strong>Type:</strong> Rum<br><strong>Move to:</strong> <select
                                class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>7 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>7 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="3">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="37" gn_prod_id="1478"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1478"
                                target="_blank">Martini &amp; Rossi Sweet Vermouth Red</a> (P. Price:
                            $15.75)<br><strong>Purcahsed In:</strong> Single <strong>Type:</strong> Vermouth
                            (Sweet)<br><strong>Move to:</strong> <select class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>3 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>3 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="2">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="30" gn_prod_id="1471"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1471"
                                target="_blank">Martini Dry Vermouth White</a> (P. Price: $15.75)<br><strong>Purcahsed
                                In:</strong> Single <strong>Type:</strong> Vermouth (Dry)<br><strong>Move to:</strong>
                            <select class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>5.5 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>5.5 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="0">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="25" gn_prod_id="1465"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1465"
                                target="_blank">Mcguinness Blue Curacao</a> (P. Price: $19.95)<br><strong>Purcahsed
                                In:</strong> Single <strong>Type:</strong> Liqueurs<br><strong>Move to:</strong> <select
                                class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>6 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>6 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="5">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="32" gn_prod_id="1473"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1473"
                                target="_blank">Mcguinness Creme de Banane</a> (P. Price: $19.95)<br><strong>Purcahsed
                                In:</strong> Single <strong>Type:</strong> Liqueurs<br><strong>Move to:</strong> <select
                                class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>4 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>4 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="0">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="26" gn_prod_id="1466"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1466"
                                target="_blank">Mcguinness Creme de Cacao White</a> (P. Price:
                            $22.95)<br><strong>Purcahsed In:</strong> Single <strong>Type:</strong>
                            Liqueurs<br><strong>Move to:</strong> <select class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>7 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>7 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="0">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="39" gn_prod_id="1481"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1481"
                                target="_blank">Mcguinness Creme de Menthe White</a> (P. Price:
                            $24.95)<br><strong>Purcahsed In:</strong> Single <strong>Type:</strong>
                            Liqueurs<br><strong>Move to:</strong> <select class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>7 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>7 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="0">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="40" gn_prod_id="1482"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1482"
                                target="_blank">McGuinness Melon</a> (P. Price: $19.95)<br><strong>Purcahsed
                                In:</strong> Single <strong>Type:</strong> Liqueurs<br><strong>Move to:</strong> <select
                                class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>2 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>2 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="2">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="31" gn_prod_id="1472"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1472"
                                target="_blank">Mcguinness Peach Schnapps</a> (P. Price: $19.95)<br><strong>Purcahsed
                                In:</strong> Single <strong>Type:</strong> Liqueurs<br><strong>Move to:</strong> <select
                                class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>1 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>1 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="8">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="38" gn_prod_id="1479"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1479"
                                target="_blank">McGuinness Triple Sec</a> (P. Price: $21.50)<br><strong>Purcahsed
                                In:</strong> Single <strong>Type:</strong> Liqueurs<br><strong>Move to:</strong> <select
                                class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>11 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>11 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="0">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="67" gn_prod_id="1637"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1637"
                                target="_blank">Nonino Quintessentia Amaro</a> (P. Price: $46.60)<br><strong>Purcahsed
                                In:</strong> Single <strong>Type:</strong> Amaro<br><strong>Move to:</strong> <select
                                class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>6 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>6 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="0">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="16" gn_prod_id="1423"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1423"
                                target="_blank">Olmeca Tequila Gold</a> (P. Price: $49.75)<br><strong>Purcahsed
                                In:</strong> Single <strong>Type:</strong> Tequila<br><strong>Move to:</strong> <select
                                class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>13 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>13 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="10">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="7" gn_prod_id="1406"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1406"
                                target="_blank">Remy Martin VSOP Congac</a> (P. Price: $105.00)<br><strong>Purcahsed
                                In:</strong> Single <strong>Type:</strong> Cognac/Brandy<br><strong>Move to:</strong>
                            <select class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>7.5 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>7.5 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="0">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="74" gn_prod_id="1704"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1704"
                                target="_blank">Rossi D'Asiago Limoncello</a> (P. Price: $23.75)<br><strong>Purcahsed
                                In:</strong> Single <strong>Type:</strong> Liqueurs<br><strong>Move to:</strong> <select
                                class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>7 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>7 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="0">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="33" gn_prod_id="1474"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1474"
                                target="_blank">Sambuca Ramazzotti</a> (P. Price: $34.60)<br><strong>Purcahsed
                                In:</strong> Single <strong>Type:</strong> Liqueurs<br><strong>Move to:</strong> <select
                                class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>3 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>3 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="2">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="22" gn_prod_id="1445"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1445"
                                target="_blank">Soho Lychee Liqueur</a> (P. Price: $30.55)<br><strong>Purcahsed
                                In:</strong> Single <strong>Type:</strong> Liqueurs<br><strong>Move to:</strong> <select
                                class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>3 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>3 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="1">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="34" gn_prod_id="1475"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1475"
                                target="_blank">Sour Puss Apple Liquor</a> (P. Price: $21.45)<br><strong>Purcahsed
                                In:</strong> Single <strong>Type:</strong> Liqueurs<br><strong>Move to:</strong> <select
                                class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>10 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>10 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="0">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="21" gn_prod_id="1444"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1444"
                                target="_blank">Sour Puss Raspberry Liquor</a> (P. Price: $21.45)<br><strong>Purcahsed
                                In:</strong> Single <strong>Type:</strong> Liqueurs<br><strong>Move to:</strong> <select
                                class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>6 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>6 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="3">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="35" gn_prod_id="1476"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1476"
                                target="_blank">Southern Comfort</a> (P. Price: $35.95)<br><strong>Purcahsed
                                In:</strong> Single <strong>Type:</strong> Liqueurs<br><strong>Move to:</strong> <select
                                class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>4.5 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>4.5 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="0">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="36" gn_prod_id="1477"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1477"
                                target="_blank">Sperone Dry Marsala *for kitchen</a> (P. Price:
                            $15.00)<br><strong>Purcahsed In:</strong> Single <strong>Type:</strong>
                            Liqueurs<br><strong>Move to:</strong> <select class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>1 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>1 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="0">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="77" gn_prod_id="1974"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1974"
                                target="_blank">St-Germain Elderflower Liqueur</a> (P. Price:
                            $49.95)<br><strong>Purcahsed In:</strong> Single <strong>Type:</strong>
                            Liqueurs<br><strong>Move to:</strong> <select class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>4 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>4 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="2">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="124" gn_prod_id="2212"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2212"
                                target="_blank">Tedeschi Amarone della Valpolicella</a> (P. Price:
                            $575.40)<br><strong>Purcahsed In:</strong> Single <strong>Type:</strong>
                            Wine<br><strong>Move to:</strong> <select class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>6 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>6 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="0">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="4" gn_prod_id="1401"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1401"
                                target="_blank">Wiser's Special Blend Whisky</a> (P. Price: $37.59)<br><strong>Purcahsed
                                In:</strong> Single <strong>Type:</strong> Canadian Whisky (Rye)<br><strong>Move
                                to:</strong> <select class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>10.5 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>10.5 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="1">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card supplier_warp" supplier_id="44">
            <div>
                <div class="supplier_header"><input type="checkbox" class="chkbx_supplier" value="44"> Profile Wine
                    Group</div>
                <div class="supplier_items_wrap">
                    <div class="po_slist_row header"><span>Name</span><span>On Hand</span><span>Cases to
                            Order</span><span></span></div>
                    <div class="actual_body po_slist_row" po_slist_id="75" gn_prod_id="1962"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1962"
                                target="_blank">Adesso Merlot (House)</a> (P. Price: $101.40)<br><strong>Purcahsed
                                In:</strong> Case of 12 <strong>Type:</strong> Wine<br><strong>Move to:</strong> <select
                                class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>120: 10 / 0 <span class="q_tip"><svg
                                    class="svg-inline--fa fa-circle-info" aria-hidden="true" focusable="false"
                                    data-prefix="fas" data-icon="circle-info" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>120: 10 / 0 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.4660
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="4">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="slist_vintage_wrap">
                        <div class="actual_body po_slist_row" po_slist_id="153" gn_prod_id="2144"><span><a
                                    href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2144"
                                    target="_blank">Barolo, Mauro Sebaste "Tresuri" (Bin #:
                                    305)</a><br><strong>Purcahsed In:</strong> Case of 6 <strong>Type:</strong>
                                Wine<br><strong>Move to:</strong> <select class="supplier_pick">
                                    <option value="----">----</option>
                                    <option value="54">Abcon</option>
                                    <option value="46">Beer Store</option>
                                    <option value="55">Charton-Hobs</option>
                                    <option value="57">Churchill Cellars</option>
                                    <option value="64">Corveste Wines</option>
                                    <option value="65">Grape Brands Fine Wines and Spirits</option>
                                    <option value="43">LCBO</option>
                                    <option value="58">Marram Fine Wines</option>
                                    <option value="74">parmeshwar</option>
                                    <option value="73">pavan</option>
                                    <option value="44">Profile Wine Group</option>
                                    <option value="49">Rogers and Co</option>
                                    <option value="63">Stem Wine Group Inc.</option>
                                    <option value="48">Tawse Winery</option>
                                    <option value="66">Tre Amici</option>
                                    <option value="38">Trevi Fountain</option>
                                    <option value="69">True Theory</option>
                                    <option value="51">TWC</option>
                                    <option value="62">Unknown</option>
                                    <option value="67">Vertical Wine Group</option>
                                    <option value="56">Victorica Wines</option>
                                    <option value="52">Violet Hills Wine Imports</option>
                                    <option value="47">Viva Spumanti</option>
                                </select></span><span></span><span></span><span><span class="btn_delete_slist btn"><svg
                                        class="svg-inline--fa fa-trash-can" aria-hidden="true" focusable="false"
                                        data-prefix="fas" data-icon="trash-can" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                        </path>
                                    </svg>
                                    <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                        </div>
                        <hr>
                        <div class="actual_body po_slist_row vintage_row" po_slist_id="153" gn_prod_id="2144"
                            vntg_prod_id="2145"><span>Vintage: 2017 (P. Price: $null)</span><span>5: 0 / 5 <span
                                    class="q_tip"><svg class="svg-inline--fa fa-circle-info" aria-hidden="true"
                                        focusable="false" data-prefix="fas" data-icon="circle-info" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                        </path>
                                    </svg>
                                    <!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                                <div class="qtip_content">
                                    <p>5: 0 / 5 @ 2nd. Floor Wine Room </p>
                                </div>
                            </span><span>
                                <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999"
                                        step="1" value="0">
                                    <div class="qty_nav">
                                        <div class="qty_button qty_up">+</div>
                                        <div class="qty_button qty_down">-</div>
                                    </div>
                                </div>
                            </span></div>
                    </div>
                    <div class="slist_vintage_wrap">
                        <div class="actual_body po_slist_row" po_slist_id="163" gn_prod_id="2144"><span><a
                                    href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2144"
                                    target="_blank">Barolo, Mauro Sebaste "Tresuri" (Bin #:
                                    305)</a><br><strong>Purcahsed In:</strong> Case of 6 <strong>Type:</strong>
                                Wine<br><strong>Move to:</strong> <select class="supplier_pick">
                                    <option value="----">----</option>
                                    <option value="54">Abcon</option>
                                    <option value="46">Beer Store</option>
                                    <option value="55">Charton-Hobs</option>
                                    <option value="57">Churchill Cellars</option>
                                    <option value="64">Corveste Wines</option>
                                    <option value="65">Grape Brands Fine Wines and Spirits</option>
                                    <option value="43">LCBO</option>
                                    <option value="58">Marram Fine Wines</option>
                                    <option value="74">parmeshwar</option>
                                    <option value="73">pavan</option>
                                    <option value="44">Profile Wine Group</option>
                                    <option value="49">Rogers and Co</option>
                                    <option value="63">Stem Wine Group Inc.</option>
                                    <option value="48">Tawse Winery</option>
                                    <option value="66">Tre Amici</option>
                                    <option value="38">Trevi Fountain</option>
                                    <option value="69">True Theory</option>
                                    <option value="51">TWC</option>
                                    <option value="62">Unknown</option>
                                    <option value="67">Vertical Wine Group</option>
                                    <option value="56">Victorica Wines</option>
                                    <option value="52">Violet Hills Wine Imports</option>
                                    <option value="47">Viva Spumanti</option>
                                </select></span><span></span><span></span><span><span class="btn_delete_slist btn"><svg
                                        class="svg-inline--fa fa-trash-can" aria-hidden="true" focusable="false"
                                        data-prefix="fas" data-icon="trash-can" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                        </path>
                                    </svg>
                                    <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                        </div>
                        <hr>
                        <div class="actual_body po_slist_row vintage_row" po_slist_id="163" gn_prod_id="2144"
                            vntg_prod_id="2145"><span>Vintage: 2017 (P. Price: $null)</span><span>5: 0 / 5 <span
                                    class="q_tip"><svg class="svg-inline--fa fa-circle-info" aria-hidden="true"
                                        focusable="false" data-prefix="fas" data-icon="circle-info" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                        </path>
                                    </svg>
                                    <!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                                <div class="qtip_content">
                                    <p>5: 0 / 5 @ 2nd. Floor Wine Room </p>
                                </div>
                            </span><span>
                                <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999"
                                        step="1" value="0">
                                    <div class="qty_nav">
                                        <div class="qty_button qty_up">+</div>
                                        <div class="qty_button qty_down">-</div>
                                    </div>
                                </div>
                            </span></div>
                    </div>
                    <div class="slist_vintage_wrap">
                        <div class="actual_body po_slist_row" po_slist_id="106" gn_prod_id="1994"><span><a
                                    href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1994"
                                    target="_blank">Cape Bleue Rose (Jean-Luc Colombo) (Bin #:
                                    244)</a><br><strong>Purcahsed In:</strong> Case of 12 <strong>Type:</strong>
                                Wine<br><strong>Move to:</strong> <select class="supplier_pick">
                                    <option value="----">----</option>
                                    <option value="54">Abcon</option>
                                    <option value="46">Beer Store</option>
                                    <option value="55">Charton-Hobs</option>
                                    <option value="57">Churchill Cellars</option>
                                    <option value="64">Corveste Wines</option>
                                    <option value="65">Grape Brands Fine Wines and Spirits</option>
                                    <option value="43">LCBO</option>
                                    <option value="58">Marram Fine Wines</option>
                                    <option value="74">parmeshwar</option>
                                    <option value="73">pavan</option>
                                    <option value="44">Profile Wine Group</option>
                                    <option value="49">Rogers and Co</option>
                                    <option value="63">Stem Wine Group Inc.</option>
                                    <option value="48">Tawse Winery</option>
                                    <option value="66">Tre Amici</option>
                                    <option value="38">Trevi Fountain</option>
                                    <option value="69">True Theory</option>
                                    <option value="51">TWC</option>
                                    <option value="62">Unknown</option>
                                    <option value="67">Vertical Wine Group</option>
                                    <option value="56">Victorica Wines</option>
                                    <option value="52">Violet Hills Wine Imports</option>
                                    <option value="47">Viva Spumanti</option>
                                </select></span><span></span><span></span><span><span class="btn_delete_slist btn"><svg
                                        class="svg-inline--fa fa-trash-can" aria-hidden="true" focusable="false"
                                        data-prefix="fas" data-icon="trash-can" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                        </path>
                                    </svg>
                                    <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                        </div>
                        <hr>
                        <div class="actual_body po_slist_row vintage_row" po_slist_id="106" gn_prod_id="1994"
                            vntg_prod_id="2073"><span>Vintage: 2020 (P. Price: $null)</span><span>0: 0 / 0</span><span>
                                <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999"
                                        step="1" value="0">
                                    <div class="qty_nav">
                                        <div class="qty_button qty_up">+</div>
                                        <div class="qty_button qty_down">-</div>
                                    </div>
                                </div>
                            </span></div>
                        <hr>
                        <div class="actual_body po_slist_row vintage_row" po_slist_id="106" gn_prod_id="1994"
                            vntg_prod_id="2386"><span>Vintage: 2021 (P. Price: $null)</span><span>1: 0 / 1 <span
                                    class="q_tip"><svg class="svg-inline--fa fa-circle-info" aria-hidden="true"
                                        focusable="false" data-prefix="fas" data-icon="circle-info" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                        </path>
                                    </svg>
                                    <!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                                <div class="qtip_content">
                                    <p>1: 0 / 1 @ 1st. Floor Wine Room</p>
                                </div>
                            </span><span>
                                <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999"
                                        step="1" value="0">
                                    <div class="qty_nav">
                                        <div class="qty_button qty_up">+</div>
                                        <div class="qty_button qty_down">-</div>
                                    </div>
                                </div>
                            </span></div>
                    </div>
                    <div class="slist_vintage_wrap">
                        <div class="actual_body po_slist_row" po_slist_id="130" gn_prod_id="1320"><span><a
                                    href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1320"
                                    target="_blank">Castello di Querceto Chianti (Bin #: 151)</a><br><strong>Purcahsed
                                    In:</strong> Case of 12 <strong>Type:</strong> Wine<br><strong>Move to:</strong>
                                <select class="supplier_pick">
                                    <option value="----">----</option>
                                    <option value="54">Abcon</option>
                                    <option value="46">Beer Store</option>
                                    <option value="55">Charton-Hobs</option>
                                    <option value="57">Churchill Cellars</option>
                                    <option value="64">Corveste Wines</option>
                                    <option value="65">Grape Brands Fine Wines and Spirits</option>
                                    <option value="43">LCBO</option>
                                    <option value="58">Marram Fine Wines</option>
                                    <option value="74">parmeshwar</option>
                                    <option value="73">pavan</option>
                                    <option value="44">Profile Wine Group</option>
                                    <option value="49">Rogers and Co</option>
                                    <option value="63">Stem Wine Group Inc.</option>
                                    <option value="48">Tawse Winery</option>
                                    <option value="66">Tre Amici</option>
                                    <option value="38">Trevi Fountain</option>
                                    <option value="69">True Theory</option>
                                    <option value="51">TWC</option>
                                    <option value="62">Unknown</option>
                                    <option value="67">Vertical Wine Group</option>
                                    <option value="56">Victorica Wines</option>
                                    <option value="52">Violet Hills Wine Imports</option>
                                    <option value="47">Viva Spumanti</option>
                                </select></span><span></span><span></span><span><span class="btn_delete_slist btn"><svg
                                        class="svg-inline--fa fa-trash-can" aria-hidden="true" focusable="false"
                                        data-prefix="fas" data-icon="trash-can" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                        </path>
                                    </svg>
                                    <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                        </div>
                        <hr>
                        <div class="actual_body po_slist_row vintage_row" po_slist_id="130" gn_prod_id="1320"
                            vntg_prod_id="2152"><span>Vintage: 2020 (P. Price: $null)</span><span>7.5: 0 / 7.5 <span
                                    class="q_tip"><svg class="svg-inline--fa fa-circle-info" aria-hidden="true"
                                        focusable="false" data-prefix="fas" data-icon="circle-info" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                        </path>
                                    </svg>
                                    <!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                                <div class="qtip_content">
                                    <p>7.5: 0 / 7.5 @ 1st. Floor Wine Room</p>
                                </div>
                            </span><span>
                                <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999"
                                        step="1" value="0">
                                    <div class="qty_nav">
                                        <div class="qty_button qty_up">+</div>
                                        <div class="qty_button qty_down">-</div>
                                    </div>
                                </div>
                            </span></div>
                    </div>
                    <div class="slist_vintage_wrap">
                        <div class="actual_body po_slist_row" po_slist_id="149" gn_prod_id="2390"><span><a
                                    href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2390"
                                    target="_blank">CA’ROME’ Barbaresco Rio Sordo DOCG (Bin #:
                                    169)</a><br><strong>Purcahsed In:</strong> Case of 6 <strong>Type:</strong>
                                Wine<br><strong>Move to:</strong> <select class="supplier_pick">
                                    <option value="----">----</option>
                                    <option value="54">Abcon</option>
                                    <option value="46">Beer Store</option>
                                    <option value="55">Charton-Hobs</option>
                                    <option value="57">Churchill Cellars</option>
                                    <option value="64">Corveste Wines</option>
                                    <option value="65">Grape Brands Fine Wines and Spirits</option>
                                    <option value="43">LCBO</option>
                                    <option value="58">Marram Fine Wines</option>
                                    <option value="74">parmeshwar</option>
                                    <option value="73">pavan</option>
                                    <option value="44">Profile Wine Group</option>
                                    <option value="49">Rogers and Co</option>
                                    <option value="63">Stem Wine Group Inc.</option>
                                    <option value="48">Tawse Winery</option>
                                    <option value="66">Tre Amici</option>
                                    <option value="38">Trevi Fountain</option>
                                    <option value="69">True Theory</option>
                                    <option value="51">TWC</option>
                                    <option value="62">Unknown</option>
                                    <option value="67">Vertical Wine Group</option>
                                    <option value="56">Victorica Wines</option>
                                    <option value="52">Violet Hills Wine Imports</option>
                                    <option value="47">Viva Spumanti</option>
                                </select></span><span></span><span></span><span><span class="btn_delete_slist btn"><svg
                                        class="svg-inline--fa fa-trash-can" aria-hidden="true" focusable="false"
                                        data-prefix="fas" data-icon="trash-can" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                        </path>
                                    </svg>
                                    <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                        </div>
                        <hr>
                        <div class="actual_body po_slist_row vintage_row" po_slist_id="149" gn_prod_id="2390"
                            vntg_prod_id="2391"><span>Vintage: 2018 (P. Price: $null)</span><span>6: 1 / 0 <span
                                    class="q_tip"><svg class="svg-inline--fa fa-circle-info" aria-hidden="true"
                                        focusable="false" data-prefix="fas" data-icon="circle-info" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                        </path>
                                    </svg>
                                    <!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                                <div class="qtip_content">
                                    <p>6: 1 / 0 @ 1st. Floor Wine Room</p>
                                </div>
                            </span><span>
                                <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999"
                                        step="1" value="0">
                                    <div class="qty_nav">
                                        <div class="qty_button qty_up">+</div>
                                        <div class="qty_button qty_down">-</div>
                                    </div>
                                </div>
                            </span></div>
                    </div>
                    <div class="slist_vintage_wrap">
                        <div class="actual_body po_slist_row" po_slist_id="112" gn_prod_id="1336"><span><a
                                    href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1336"
                                    target="_blank">Cesari Ripasso Bosan (Bin #: 176)</a><br><strong>Purcahsed
                                    In:</strong> Case of 12 <strong>Type:</strong> Wine<br><strong>Move to:</strong>
                                <select class="supplier_pick">
                                    <option value="----">----</option>
                                    <option value="54">Abcon</option>
                                    <option value="46">Beer Store</option>
                                    <option value="55">Charton-Hobs</option>
                                    <option value="57">Churchill Cellars</option>
                                    <option value="64">Corveste Wines</option>
                                    <option value="65">Grape Brands Fine Wines and Spirits</option>
                                    <option value="43">LCBO</option>
                                    <option value="58">Marram Fine Wines</option>
                                    <option value="74">parmeshwar</option>
                                    <option value="73">pavan</option>
                                    <option value="44">Profile Wine Group</option>
                                    <option value="49">Rogers and Co</option>
                                    <option value="63">Stem Wine Group Inc.</option>
                                    <option value="48">Tawse Winery</option>
                                    <option value="66">Tre Amici</option>
                                    <option value="38">Trevi Fountain</option>
                                    <option value="69">True Theory</option>
                                    <option value="51">TWC</option>
                                    <option value="62">Unknown</option>
                                    <option value="67">Vertical Wine Group</option>
                                    <option value="56">Victorica Wines</option>
                                    <option value="52">Violet Hills Wine Imports</option>
                                    <option value="47">Viva Spumanti</option>
                                </select></span><span></span><span></span><span><span class="btn_delete_slist btn"><svg
                                        class="svg-inline--fa fa-trash-can" aria-hidden="true" focusable="false"
                                        data-prefix="fas" data-icon="trash-can" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                        </path>
                                    </svg>
                                    <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                        </div>
                        <hr>
                        <div class="actual_body po_slist_row vintage_row" po_slist_id="112" gn_prod_id="1336"
                            vntg_prod_id="2100"><span>Vintage: 2017 (P. Price: $20.00)</span><span>0: 0 / 0</span><span>
                                <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999"
                                        step="1" value="0">
                                    <div class="qty_nav">
                                        <div class="qty_button qty_up">+</div>
                                        <div class="qty_button qty_down">-</div>
                                    </div>
                                </div>
                            </span></div>
                        <hr>
                        <div class="actual_body po_slist_row vintage_row" po_slist_id="112" gn_prod_id="1336"
                            vntg_prod_id="1802"><span>Vintage: 2018 (P. Price: $36.99)</span><span>12: 1 / 0 <span
                                    class="q_tip"><svg class="svg-inline--fa fa-circle-info" aria-hidden="true"
                                        focusable="false" data-prefix="fas" data-icon="circle-info" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                        </path>
                                    </svg>
                                    <!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                                <div class="qtip_content">
                                    <p>12: 1 / 0 @ 1st. Floor Wine Room</p>
                                </div>
                            </span><span>
                                <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999"
                                        step="1" value="0">
                                    <div class="qty_nav">
                                        <div class="qty_button qty_up">+</div>
                                        <div class="qty_button qty_down">-</div>
                                    </div>
                                </div>
                            </span></div>
                    </div>
                    <div class="slist_vintage_wrap">
                        <div class="actual_body po_slist_row" po_slist_id="152" gn_prod_id="1336"><span><a
                                    href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1336"
                                    target="_blank">Cesari Ripasso Bosan (Bin #: 176)</a><br><strong>Purcahsed
                                    In:</strong> Case of 12 <strong>Type:</strong> Wine<br><strong>Move to:</strong>
                                <select class="supplier_pick">
                                    <option value="----">----</option>
                                    <option value="54">Abcon</option>
                                    <option value="46">Beer Store</option>
                                    <option value="55">Charton-Hobs</option>
                                    <option value="57">Churchill Cellars</option>
                                    <option value="64">Corveste Wines</option>
                                    <option value="65">Grape Brands Fine Wines and Spirits</option>
                                    <option value="43">LCBO</option>
                                    <option value="58">Marram Fine Wines</option>
                                    <option value="74">parmeshwar</option>
                                    <option value="73">pavan</option>
                                    <option value="44">Profile Wine Group</option>
                                    <option value="49">Rogers and Co</option>
                                    <option value="63">Stem Wine Group Inc.</option>
                                    <option value="48">Tawse Winery</option>
                                    <option value="66">Tre Amici</option>
                                    <option value="38">Trevi Fountain</option>
                                    <option value="69">True Theory</option>
                                    <option value="51">TWC</option>
                                    <option value="62">Unknown</option>
                                    <option value="67">Vertical Wine Group</option>
                                    <option value="56">Victorica Wines</option>
                                    <option value="52">Violet Hills Wine Imports</option>
                                    <option value="47">Viva Spumanti</option>
                                </select></span><span></span><span></span><span><span class="btn_delete_slist btn"><svg
                                        class="svg-inline--fa fa-trash-can" aria-hidden="true" focusable="false"
                                        data-prefix="fas" data-icon="trash-can" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                        </path>
                                    </svg>
                                    <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                        </div>
                        <hr>
                        <div class="actual_body po_slist_row vintage_row" po_slist_id="152" gn_prod_id="1336"
                            vntg_prod_id="2100"><span>Vintage: 2017 (P. Price: $20.00)</span><span>0: 0 / 0</span><span>
                                <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999"
                                        step="1" value="0">
                                    <div class="qty_nav">
                                        <div class="qty_button qty_up">+</div>
                                        <div class="qty_button qty_down">-</div>
                                    </div>
                                </div>
                            </span></div>
                        <hr>
                        <div class="actual_body po_slist_row vintage_row" po_slist_id="152" gn_prod_id="1336"
                            vntg_prod_id="1802"><span>Vintage: 2018 (P. Price: $36.99)</span><span>12: 1 / 0 <span
                                    class="q_tip"><svg class="svg-inline--fa fa-circle-info" aria-hidden="true"
                                        focusable="false" data-prefix="fas" data-icon="circle-info" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                        </path>
                                    </svg>
                                    <!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                                <div class="qtip_content">
                                    <p>12: 1 / 0 @ 1st. Floor Wine Room</p>
                                </div>
                            </span><span>
                                <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999"
                                        step="1" value="0">
                                    <div class="qty_nav">
                                        <div class="qty_button qty_up">+</div>
                                        <div class="qty_button qty_down">-</div>
                                    </div>
                                </div>
                            </span></div>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="128" gn_prod_id="2336"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2336"
                                target="_blank">Fantini Chardonnay</a> (P. Price: $114.00)<br><strong>Purcahsed
                                In:</strong> Case of 12 <strong>Type:</strong> Wine<br><strong>Move to:</strong> <select
                                class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>0: 0 / 0<br>Use: 0.0000</span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="0">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="76" gn_prod_id="1963"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1963"
                                target="_blank">Fantini Pinot Grigio (House)</a> (P. Price:
                            $120.00)<br><strong>Purcahsed In:</strong> Case of 12 <strong>Type:</strong>
                            Wine<br><strong>Move to:</strong> <select class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>108: 9 / 0 <span class="q_tip"><svg
                                    class="svg-inline--fa fa-circle-info" aria-hidden="true" focusable="false"
                                    data-prefix="fas" data-icon="circle-info" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>108: 9 / 0 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.3033
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="5">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="slist_vintage_wrap">
                        <div class="actual_body po_slist_row" po_slist_id="159" gn_prod_id="2460"><span><a
                                    href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2460"
                                    target="_blank">J. Lohr Cabernet Sauvignon, Seven Oaks</a><br><strong>Purcahsed
                                    In:</strong> Case of 12 <strong>Type:</strong> Wine<br><strong>Move to:</strong>
                                <select class="supplier_pick">
                                    <option value="----">----</option>
                                    <option value="54">Abcon</option>
                                    <option value="46">Beer Store</option>
                                    <option value="55">Charton-Hobs</option>
                                    <option value="57">Churchill Cellars</option>
                                    <option value="64">Corveste Wines</option>
                                    <option value="65">Grape Brands Fine Wines and Spirits</option>
                                    <option value="43">LCBO</option>
                                    <option value="58">Marram Fine Wines</option>
                                    <option value="74">parmeshwar</option>
                                    <option value="73">pavan</option>
                                    <option value="44">Profile Wine Group</option>
                                    <option value="49">Rogers and Co</option>
                                    <option value="63">Stem Wine Group Inc.</option>
                                    <option value="48">Tawse Winery</option>
                                    <option value="66">Tre Amici</option>
                                    <option value="38">Trevi Fountain</option>
                                    <option value="69">True Theory</option>
                                    <option value="51">TWC</option>
                                    <option value="62">Unknown</option>
                                    <option value="67">Vertical Wine Group</option>
                                    <option value="56">Victorica Wines</option>
                                    <option value="52">Violet Hills Wine Imports</option>
                                    <option value="47">Viva Spumanti</option>
                                </select></span><span></span><span></span><span><span class="btn_delete_slist btn"><svg
                                        class="svg-inline--fa fa-trash-can" aria-hidden="true" focusable="false"
                                        data-prefix="fas" data-icon="trash-can" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                        </path>
                                    </svg>
                                    <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                        </div>
                        <hr>
                        <div class="actual_body po_slist_row vintage_row" po_slist_id="159" gn_prod_id="2460"
                            vntg_prod_id="2462"><span>Vintage: 2019 (P. Price: $160.44)</span><span>12: 1 / 0 <span
                                    class="q_tip"><svg class="svg-inline--fa fa-circle-info" aria-hidden="true"
                                        focusable="false" data-prefix="fas" data-icon="circle-info" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                        </path>
                                    </svg>
                                    <!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                                <div class="qtip_content">
                                    <p>12: 1 / 0 @ 1st. Floor Wine Room</p>
                                </div>
                            </span><span>
                                <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999"
                                        step="0.01" value="0">
                                    <div class="qty_nav">
                                        <div class="qty_button qty_up">+</div>
                                        <div class="qty_button qty_down">-</div>
                                    </div>
                                </div>
                            </span></div>
                    </div>
                    <div class="slist_vintage_wrap">
                        <div class="actual_body po_slist_row" po_slist_id="146" gn_prod_id="1378"><span><a
                                    href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1378"
                                    target="_blank">J. Lohr Seven Oaks Cabernet Sauvignon (Bin #:
                                    108)</a><br><strong>Purcahsed In:</strong> Single <strong>Type:</strong>
                                Wine<br><strong>Move to:</strong> <select class="supplier_pick">
                                    <option value="----">----</option>
                                    <option value="54">Abcon</option>
                                    <option value="46">Beer Store</option>
                                    <option value="55">Charton-Hobs</option>
                                    <option value="57">Churchill Cellars</option>
                                    <option value="64">Corveste Wines</option>
                                    <option value="65">Grape Brands Fine Wines and Spirits</option>
                                    <option value="43">LCBO</option>
                                    <option value="58">Marram Fine Wines</option>
                                    <option value="74">parmeshwar</option>
                                    <option value="73">pavan</option>
                                    <option value="44">Profile Wine Group</option>
                                    <option value="49">Rogers and Co</option>
                                    <option value="63">Stem Wine Group Inc.</option>
                                    <option value="48">Tawse Winery</option>
                                    <option value="66">Tre Amici</option>
                                    <option value="38">Trevi Fountain</option>
                                    <option value="69">True Theory</option>
                                    <option value="51">TWC</option>
                                    <option value="62">Unknown</option>
                                    <option value="67">Vertical Wine Group</option>
                                    <option value="56">Victorica Wines</option>
                                    <option value="52">Violet Hills Wine Imports</option>
                                    <option value="47">Viva Spumanti</option>
                                </select></span><span></span><span></span><span><span class="btn_delete_slist btn"><svg
                                        class="svg-inline--fa fa-trash-can" aria-hidden="true" focusable="false"
                                        data-prefix="fas" data-icon="trash-can" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                        </path>
                                    </svg>
                                    <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                        </div>
                        <hr>
                        <div class="actual_body po_slist_row vintage_row" po_slist_id="146" gn_prod_id="1378"
                            vntg_prod_id="1849"><span>Vintage: 2017 (P. Price: $null)</span><span>0</span><span>
                                <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999"
                                        step="1" value="0">
                                    <div class="qty_nav">
                                        <div class="qty_button qty_up">+</div>
                                        <div class="qty_button qty_down">-</div>
                                    </div>
                                </div>
                            </span></div>
                        <hr>
                        <div class="actual_body po_slist_row vintage_row" po_slist_id="146" gn_prod_id="1378"
                            vntg_prod_id="2077"><span>Vintage: 2019 (P. Price: $23.00)</span><span>6 <span
                                    class="q_tip"><svg class="svg-inline--fa fa-circle-info" aria-hidden="true"
                                        focusable="false" data-prefix="fas" data-icon="circle-info" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                        </path>
                                    </svg>
                                    <!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                                <div class="qtip_content">
                                    <p>6 @ 1st. Floor Wine Room</p>
                                </div>
                            </span><span>
                                <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999"
                                        step="1" value="0">
                                    <div class="qty_nav">
                                        <div class="qty_button qty_up">+</div>
                                        <div class="qty_button qty_down">-</div>
                                    </div>
                                </div>
                            </span></div>
                    </div>
                    <div class="slist_vintage_wrap">
                        <div class="actual_body po_slist_row" po_slist_id="160" gn_prod_id="2138"><span><a
                                    href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2138"
                                    target="_blank">J.Lohr Hilltop Cabernet Sauvignon (Bin #:
                                    146)</a><br><strong>Purcahsed In:</strong> Case of 12 <strong>Type:</strong>
                                Wine<br><strong>Move to:</strong> <select class="supplier_pick">
                                    <option value="----">----</option>
                                    <option value="54">Abcon</option>
                                    <option value="46">Beer Store</option>
                                    <option value="55">Charton-Hobs</option>
                                    <option value="57">Churchill Cellars</option>
                                    <option value="64">Corveste Wines</option>
                                    <option value="65">Grape Brands Fine Wines and Spirits</option>
                                    <option value="43">LCBO</option>
                                    <option value="58">Marram Fine Wines</option>
                                    <option value="74">parmeshwar</option>
                                    <option value="73">pavan</option>
                                    <option value="44">Profile Wine Group</option>
                                    <option value="49">Rogers and Co</option>
                                    <option value="63">Stem Wine Group Inc.</option>
                                    <option value="48">Tawse Winery</option>
                                    <option value="66">Tre Amici</option>
                                    <option value="38">Trevi Fountain</option>
                                    <option value="69">True Theory</option>
                                    <option value="51">TWC</option>
                                    <option value="62">Unknown</option>
                                    <option value="67">Vertical Wine Group</option>
                                    <option value="56">Victorica Wines</option>
                                    <option value="52">Violet Hills Wine Imports</option>
                                    <option value="47">Viva Spumanti</option>
                                </select></span><span></span><span></span><span><span class="btn_delete_slist btn"><svg
                                        class="svg-inline--fa fa-trash-can" aria-hidden="true" focusable="false"
                                        data-prefix="fas" data-icon="trash-can" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                        </path>
                                    </svg>
                                    <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                        </div>
                        <hr>
                        <div class="actual_body po_slist_row vintage_row" po_slist_id="160" gn_prod_id="2138"
                            vntg_prod_id="2139"><span>Vintage: 2018 (P. Price: $null)</span><span>10: 0 / 10 <span
                                    class="q_tip"><svg class="svg-inline--fa fa-circle-info" aria-hidden="true"
                                        focusable="false" data-prefix="fas" data-icon="circle-info" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                        </path>
                                    </svg>
                                    <!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                                <div class="qtip_content">
                                    <p>10: 0 / 10 @ 1st. Floor Wine Room</p>
                                </div>
                            </span><span>
                                <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999"
                                        step="1" value="0">
                                    <div class="qty_nav">
                                        <div class="qty_button qty_up">+</div>
                                        <div class="qty_button qty_down">-</div>
                                    </div>
                                </div>
                            </span></div>
                    </div>
                    <div class="slist_vintage_wrap">
                        <div class="actual_body po_slist_row" po_slist_id="107" gn_prod_id="1993"><span><a
                                    href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1993"
                                    target="_blank">Solid Ground Chardonnay (Bin #: 213)</a><br><strong>Purcahsed
                                    In:</strong> Case of 12 <strong>Type:</strong> Wine<br><strong>Move to:</strong>
                                <select class="supplier_pick">
                                    <option value="----">----</option>
                                    <option value="54">Abcon</option>
                                    <option value="46">Beer Store</option>
                                    <option value="55">Charton-Hobs</option>
                                    <option value="57">Churchill Cellars</option>
                                    <option value="64">Corveste Wines</option>
                                    <option value="65">Grape Brands Fine Wines and Spirits</option>
                                    <option value="43">LCBO</option>
                                    <option value="58">Marram Fine Wines</option>
                                    <option value="74">parmeshwar</option>
                                    <option value="73">pavan</option>
                                    <option value="44">Profile Wine Group</option>
                                    <option value="49">Rogers and Co</option>
                                    <option value="63">Stem Wine Group Inc.</option>
                                    <option value="48">Tawse Winery</option>
                                    <option value="66">Tre Amici</option>
                                    <option value="38">Trevi Fountain</option>
                                    <option value="69">True Theory</option>
                                    <option value="51">TWC</option>
                                    <option value="62">Unknown</option>
                                    <option value="67">Vertical Wine Group</option>
                                    <option value="56">Victorica Wines</option>
                                    <option value="52">Violet Hills Wine Imports</option>
                                    <option value="47">Viva Spumanti</option>
                                </select></span><span></span><span></span><span><span class="btn_delete_slist btn"><svg
                                        class="svg-inline--fa fa-trash-can" aria-hidden="true" focusable="false"
                                        data-prefix="fas" data-icon="trash-can" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                        </path>
                                    </svg>
                                    <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                        </div>
                        <hr>
                        <div class="actual_body po_slist_row vintage_row" po_slist_id="107" gn_prod_id="1993"
                            vntg_prod_id="2069"><span>Vintage: 2019 (P. Price: $null)</span><span>0.75: 0 / 0.75 <span
                                    class="q_tip"><svg class="svg-inline--fa fa-circle-info" aria-hidden="true"
                                        focusable="false" data-prefix="fas" data-icon="circle-info" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                        </path>
                                    </svg>
                                    <!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                                <div class="qtip_content">
                                    <p>0.75: 0 / 0.75 @ 1st. Floor Wine Room</p>
                                </div>
                            </span><span>
                                <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999"
                                        step="1" value="0">
                                    <div class="qty_nav">
                                        <div class="qty_button qty_up">+</div>
                                        <div class="qty_button qty_down">-</div>
                                    </div>
                                </div>
                            </span></div>
                    </div>
                    <div class="slist_vintage_wrap">
                        <div class="actual_body po_slist_row" po_slist_id="100" gn_prod_id="1657"><span><a
                                    href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1657"
                                    target="_blank">Solid Ground, Cabernet Sauvignon (Bin #:
                                    101)</a><br><strong>Purcahsed In:</strong> Case of 12 <strong>Type:</strong>
                                Wine<br><strong>Move to:</strong> <select class="supplier_pick">
                                    <option value="----">----</option>
                                    <option value="54">Abcon</option>
                                    <option value="46">Beer Store</option>
                                    <option value="55">Charton-Hobs</option>
                                    <option value="57">Churchill Cellars</option>
                                    <option value="64">Corveste Wines</option>
                                    <option value="65">Grape Brands Fine Wines and Spirits</option>
                                    <option value="43">LCBO</option>
                                    <option value="58">Marram Fine Wines</option>
                                    <option value="74">parmeshwar</option>
                                    <option value="73">pavan</option>
                                    <option value="44">Profile Wine Group</option>
                                    <option value="49">Rogers and Co</option>
                                    <option value="63">Stem Wine Group Inc.</option>
                                    <option value="48">Tawse Winery</option>
                                    <option value="66">Tre Amici</option>
                                    <option value="38">Trevi Fountain</option>
                                    <option value="69">True Theory</option>
                                    <option value="51">TWC</option>
                                    <option value="62">Unknown</option>
                                    <option value="67">Vertical Wine Group</option>
                                    <option value="56">Victorica Wines</option>
                                    <option value="52">Violet Hills Wine Imports</option>
                                    <option value="47">Viva Spumanti</option>
                                </select></span><span></span><span></span><span><span class="btn_delete_slist btn"><svg
                                        class="svg-inline--fa fa-trash-can" aria-hidden="true" focusable="false"
                                        data-prefix="fas" data-icon="trash-can" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                        </path>
                                    </svg>
                                    <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                        </div>
                        <hr>
                        <div class="actual_body po_slist_row vintage_row" po_slist_id="100" gn_prod_id="1657"
                            vntg_prod_id="2137"><span>Vintage: 2019 (P. Price: $216.00)</span><span>24: 2 / 0 <span
                                    class="q_tip"><svg class="svg-inline--fa fa-circle-info" aria-hidden="true"
                                        focusable="false" data-prefix="fas" data-icon="circle-info" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                        </path>
                                    </svg>
                                    <!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                                <div class="qtip_content">
                                    <p>24: 2 / 0 @ 1st. Floor Wine Room</p>
                                </div>
                            </span><span>
                                <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999"
                                        step="1" value="0">
                                    <div class="qty_nav">
                                        <div class="qty_button qty_up">+</div>
                                        <div class="qty_button qty_down">-</div>
                                    </div>
                                </div>
                            </span></div>
                    </div>
                    <div class="slist_vintage_wrap">
                        <div class="actual_body po_slist_row" po_slist_id="89" gn_prod_id="1673"><span><a
                                    href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1673"
                                    target="_blank">Straccali Pinot Grigio (Bin #: 200)</a><br><strong>Purcahsed
                                    In:</strong> Case of 12 <strong>Type:</strong> Wine<br><strong>Move to:</strong>
                                <select class="supplier_pick">
                                    <option value="----">----</option>
                                    <option value="54">Abcon</option>
                                    <option value="46">Beer Store</option>
                                    <option value="55">Charton-Hobs</option>
                                    <option value="57">Churchill Cellars</option>
                                    <option value="64">Corveste Wines</option>
                                    <option value="65">Grape Brands Fine Wines and Spirits</option>
                                    <option value="43">LCBO</option>
                                    <option value="58">Marram Fine Wines</option>
                                    <option value="74">parmeshwar</option>
                                    <option value="73">pavan</option>
                                    <option value="44">Profile Wine Group</option>
                                    <option value="49">Rogers and Co</option>
                                    <option value="63">Stem Wine Group Inc.</option>
                                    <option value="48">Tawse Winery</option>
                                    <option value="66">Tre Amici</option>
                                    <option value="38">Trevi Fountain</option>
                                    <option value="69">True Theory</option>
                                    <option value="51">TWC</option>
                                    <option value="62">Unknown</option>
                                    <option value="67">Vertical Wine Group</option>
                                    <option value="56">Victorica Wines</option>
                                    <option value="52">Violet Hills Wine Imports</option>
                                    <option value="47">Viva Spumanti</option>
                                </select></span><span></span><span></span><span><span class="btn_delete_slist btn"><svg
                                        class="svg-inline--fa fa-trash-can" aria-hidden="true" focusable="false"
                                        data-prefix="fas" data-icon="trash-can" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                        </path>
                                    </svg>
                                    <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                        </div>
                        <hr>
                        <div class="actual_body po_slist_row vintage_row" po_slist_id="89" gn_prod_id="1673"
                            vntg_prod_id="1822"><span>Vintage: 2020 (P. Price: $null)</span><span>0: 0 / 0</span><span>
                                <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999"
                                        step="1" value="0">
                                    <div class="qty_nav">
                                        <div class="qty_button qty_up">+</div>
                                        <div class="qty_button qty_down">-</div>
                                    </div>
                                </div>
                            </span></div>
                        <hr>
                        <div class="actual_body po_slist_row vintage_row" po_slist_id="89" gn_prod_id="1673"
                            vntg_prod_id="2459"><span>Vintage: 2021 (P. Price: $null)</span><span>16: 1 / 4 <span
                                    class="q_tip"><svg class="svg-inline--fa fa-circle-info" aria-hidden="true"
                                        focusable="false" data-prefix="fas" data-icon="circle-info" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                        </path>
                                    </svg>
                                    <!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                                <div class="qtip_content">
                                    <p>16: 1 / 4 @ 1st. Floor Wine Room</p>
                                </div>
                            </span><span>
                                <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999"
                                        step="1" value="0">
                                    <div class="qty_nav">
                                        <div class="qty_button qty_up">+</div>
                                        <div class="qty_button qty_down">-</div>
                                    </div>
                                </div>
                            </span></div>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="127" gn_prod_id="2337"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2337"
                                target="_blank">Swish Gin</a> (P. Price: $null)<br><strong>Purcahsed In:</strong> Single
                            <strong>Type:</strong> Gin<br><strong>Move to:</strong> <select class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>1 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>1 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="5">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card supplier_warp" supplier_id="49">
            <div>
                <div class="supplier_header"><input type="checkbox" class="chkbx_supplier" value="49"> Rogers and Co
                </div>
                <div class="supplier_items_wrap">
                    <div class="po_slist_row header"><span>Name</span><span>On Hand</span><span>Cases to
                            Order</span><span></span></div>
                    <div class="slist_vintage_wrap">
                        <div class="actual_body po_slist_row" po_slist_id="134" gn_prod_id="1361"><span><a
                                    href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1361"
                                    target="_blank">Grayson Estate Cabernet Sauvignon (Bin #:
                                    102)</a><br><strong>Purcahsed In:</strong> Case of 12 <strong>Type:</strong>
                                Wine<br><strong>Move to:</strong> <select class="supplier_pick">
                                    <option value="----">----</option>
                                    <option value="54">Abcon</option>
                                    <option value="46">Beer Store</option>
                                    <option value="55">Charton-Hobs</option>
                                    <option value="57">Churchill Cellars</option>
                                    <option value="64">Corveste Wines</option>
                                    <option value="65">Grape Brands Fine Wines and Spirits</option>
                                    <option value="43">LCBO</option>
                                    <option value="58">Marram Fine Wines</option>
                                    <option value="74">parmeshwar</option>
                                    <option value="73">pavan</option>
                                    <option value="44">Profile Wine Group</option>
                                    <option value="49">Rogers and Co</option>
                                    <option value="63">Stem Wine Group Inc.</option>
                                    <option value="48">Tawse Winery</option>
                                    <option value="66">Tre Amici</option>
                                    <option value="38">Trevi Fountain</option>
                                    <option value="69">True Theory</option>
                                    <option value="51">TWC</option>
                                    <option value="62">Unknown</option>
                                    <option value="67">Vertical Wine Group</option>
                                    <option value="56">Victorica Wines</option>
                                    <option value="52">Violet Hills Wine Imports</option>
                                    <option value="47">Viva Spumanti</option>
                                </select></span><span></span><span></span><span><span class="btn_delete_slist btn"><svg
                                        class="svg-inline--fa fa-trash-can" aria-hidden="true" focusable="false"
                                        data-prefix="fas" data-icon="trash-can" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                        </path>
                                    </svg>
                                    <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                        </div>
                        <hr>
                        <div class="actual_body po_slist_row vintage_row" po_slist_id="134" gn_prod_id="1361"
                            vntg_prod_id="2061"><span>Vintage: 2020 (P. Price: $264.00)</span><span>0: 0 /
                                0</span><span>
                                <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999"
                                        step="1" value="0">
                                    <div class="qty_nav">
                                        <div class="qty_button qty_up">+</div>
                                        <div class="qty_button qty_down">-</div>
                                    </div>
                                </div>
                            </span></div>
                        <hr>
                        <div class="actual_body po_slist_row vintage_row" po_slist_id="134" gn_prod_id="1361"
                            vntg_prod_id="2364"><span>Vintage: 2021 (P. Price: $null)</span><span>14: 1 / 2 <span
                                    class="q_tip"><svg class="svg-inline--fa fa-circle-info" aria-hidden="true"
                                        focusable="false" data-prefix="fas" data-icon="circle-info" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                        </path>
                                    </svg>
                                    <!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                                <div class="qtip_content">
                                    <p>14: 1 / 2 @ 1st. Floor Wine Room</p>
                                </div>
                            </span><span>
                                <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999"
                                        step="1" value="0">
                                    <div class="qty_nav">
                                        <div class="qty_button qty_up">+</div>
                                        <div class="qty_button qty_down">-</div>
                                    </div>
                                </div>
                            </span></div>
                    </div>
                    <div class="slist_vintage_wrap">
                        <div class="actual_body po_slist_row" po_slist_id="132" gn_prod_id="2330"><span><a
                                    href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2330"
                                    target="_blank">Produttori Del Barbaresco Barbaresco DOCG (Bin #:
                                    168)</a><br><strong>Purcahsed In:</strong> Case of 6 <strong>Type:</strong>
                                Wine<br><strong>Move to:</strong> <select class="supplier_pick">
                                    <option value="----">----</option>
                                    <option value="54">Abcon</option>
                                    <option value="46">Beer Store</option>
                                    <option value="55">Charton-Hobs</option>
                                    <option value="57">Churchill Cellars</option>
                                    <option value="64">Corveste Wines</option>
                                    <option value="65">Grape Brands Fine Wines and Spirits</option>
                                    <option value="43">LCBO</option>
                                    <option value="58">Marram Fine Wines</option>
                                    <option value="74">parmeshwar</option>
                                    <option value="73">pavan</option>
                                    <option value="44">Profile Wine Group</option>
                                    <option value="49">Rogers and Co</option>
                                    <option value="63">Stem Wine Group Inc.</option>
                                    <option value="48">Tawse Winery</option>
                                    <option value="66">Tre Amici</option>
                                    <option value="38">Trevi Fountain</option>
                                    <option value="69">True Theory</option>
                                    <option value="51">TWC</option>
                                    <option value="62">Unknown</option>
                                    <option value="67">Vertical Wine Group</option>
                                    <option value="56">Victorica Wines</option>
                                    <option value="52">Violet Hills Wine Imports</option>
                                    <option value="47">Viva Spumanti</option>
                                </select></span><span></span><span></span><span><span class="btn_delete_slist btn"><svg
                                        class="svg-inline--fa fa-trash-can" aria-hidden="true" focusable="false"
                                        data-prefix="fas" data-icon="trash-can" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                        </path>
                                    </svg>
                                    <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                        </div>
                        <hr>
                        <div class="actual_body po_slist_row vintage_row" po_slist_id="132" gn_prod_id="2330"
                            vntg_prod_id="2331"><span>Vintage: 2018 (P. Price: $null)</span><span>24: 4 / 0 <span
                                    class="q_tip"><svg class="svg-inline--fa fa-circle-info" aria-hidden="true"
                                        focusable="false" data-prefix="fas" data-icon="circle-info" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                        </path>
                                    </svg>
                                    <!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                                <div class="qtip_content">
                                    <p>24: 4 / 0 @ 1st. Floor Wine Room</p>
                                </div>
                            </span><span>
                                <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999"
                                        step="1" value="4">
                                    <div class="qty_nav">
                                        <div class="qty_button qty_up">+</div>
                                        <div class="qty_button qty_down">-</div>
                                    </div>
                                </div>
                            </span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card supplier_warp" supplier_id="1">
            <div>
                <div class="supplier_header"><input type="checkbox" class="chkbx_supplier" value="1"> Royal Ambassador
                </div>
                <div class="supplier_items_wrap">
                    <div class="po_slist_row header"><span>Name</span><span>On Hand</span><span>Cases to
                            Order</span><span></span></div>
                    <div class="slist_vintage_wrap">
                        <div class="actual_body po_slist_row" po_slist_id="174" gn_prod_id="2663"><span><a
                                    href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2663"
                                    target="_blank">hello (Bin #: 109)</a><br><strong>Purcahsed In:</strong> Case of 20
                                <strong>Type:</strong> Wine<br><strong>Move to:</strong> <select class="supplier_pick">
                                    <option value="----">----</option>
                                    <option value="54">Abcon</option>
                                    <option value="46">Beer Store</option>
                                    <option value="55">Charton-Hobs</option>
                                    <option value="57">Churchill Cellars</option>
                                    <option value="64">Corveste Wines</option>
                                    <option value="65">Grape Brands Fine Wines and Spirits</option>
                                    <option value="43">LCBO</option>
                                    <option value="58">Marram Fine Wines</option>
                                    <option value="74">parmeshwar</option>
                                    <option value="73">pavan</option>
                                    <option value="44">Profile Wine Group</option>
                                    <option value="49">Rogers and Co</option>
                                    <option value="63">Stem Wine Group Inc.</option>
                                    <option value="48">Tawse Winery</option>
                                    <option value="66">Tre Amici</option>
                                    <option value="38">Trevi Fountain</option>
                                    <option value="69">True Theory</option>
                                    <option value="51">TWC</option>
                                    <option value="62">Unknown</option>
                                    <option value="67">Vertical Wine Group</option>
                                    <option value="56">Victorica Wines</option>
                                    <option value="52">Violet Hills Wine Imports</option>
                                    <option value="47">Viva Spumanti</option>
                                </select></span><span></span><span></span><span><span class="btn_delete_slist btn"><svg
                                        class="svg-inline--fa fa-trash-can" aria-hidden="true" focusable="false"
                                        data-prefix="fas" data-icon="trash-can" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                        </path>
                                    </svg>
                                    <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                        </div>
                        <hr>
                        <div class="actual_body po_slist_row vintage_row" po_slist_id="174" gn_prod_id="2663"
                            vntg_prod_id="2676"><span>Vintage: null (P. Price: $null)</span><span>26: 1 / 6 <span
                                    class="q_tip"><svg class="svg-inline--fa fa-circle-info" aria-hidden="true"
                                        focusable="false" data-prefix="fas" data-icon="circle-info" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                        </path>
                                    </svg>
                                    <!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                                <div class="qtip_content">
                                    <p>6: 0 / 6 @ 1st. Floor Wine Room</p>
                                    <p>8: 0 / 8 @ Greenhouse Beer Fridge</p>
                                    <p>6: 0 / 6 @ Consulate Warehouse</p>
                                    <p>6: 0 / 6 @ 2nd. Floor Wine Room </p>
                                </div>
                            </span><span>
                                <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999"
                                        step="0.01" value="0">
                                    <div class="qty_nav">
                                        <div class="qty_button qty_up">+</div>
                                        <div class="qty_button qty_down">-</div>
                                    </div>
                                </div>
                            </span></div>
                        <hr>
                        <div class="actual_body po_slist_row vintage_row" po_slist_id="174" gn_prod_id="2663"
                            vntg_prod_id="2678"><span>Vintage: null (P. Price: $null)</span><span>0: 0 / 0</span><span>
                                <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999"
                                        step="0.01" value="0">
                                    <div class="qty_nav">
                                        <div class="qty_button qty_up">+</div>
                                        <div class="qty_button qty_down">-</div>
                                    </div>
                                </div>
                            </span></div>
                        <hr>
                        <div class="actual_body po_slist_row vintage_row" po_slist_id="174" gn_prod_id="2663"
                            vntg_prod_id="2677"><span>Vintage: 23 (P. Price: $null)</span><span>0: 0 / 0</span><span>
                                <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999"
                                        step="0.01" value="0">
                                    <div class="qty_nav">
                                        <div class="qty_button qty_up">+</div>
                                        <div class="qty_button qty_down">-</div>
                                    </div>
                                </div>
                            </span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card supplier_warp" supplier_id="63">
            <div>
                <div class="supplier_header"><input type="checkbox" class="chkbx_supplier" value="63"> Stem Wine Group
                    Inc.</div>
                <div class="supplier_items_wrap">
                    <div class="po_slist_row header"><span>Name</span><span>On Hand</span><span>Cases to
                            Order</span><span></span></div>
                    <div class="slist_vintage_wrap">
                        <div class="actual_body po_slist_row" po_slist_id="143" gn_prod_id="2393"><span><a
                                    href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2393"
                                    target="_blank">Precision Napa Valley Cabernet Sauvignon (Bin #:
                                    105)</a><br><strong>Purcahsed In:</strong> Case of 12 <strong>Type:</strong>
                                Wine<br><strong>Move to:</strong> <select class="supplier_pick">
                                    <option value="----">----</option>
                                    <option value="54">Abcon</option>
                                    <option value="46">Beer Store</option>
                                    <option value="55">Charton-Hobs</option>
                                    <option value="57">Churchill Cellars</option>
                                    <option value="64">Corveste Wines</option>
                                    <option value="65">Grape Brands Fine Wines and Spirits</option>
                                    <option value="43">LCBO</option>
                                    <option value="58">Marram Fine Wines</option>
                                    <option value="74">parmeshwar</option>
                                    <option value="73">pavan</option>
                                    <option value="44">Profile Wine Group</option>
                                    <option value="49">Rogers and Co</option>
                                    <option value="63">Stem Wine Group Inc.</option>
                                    <option value="48">Tawse Winery</option>
                                    <option value="66">Tre Amici</option>
                                    <option value="38">Trevi Fountain</option>
                                    <option value="69">True Theory</option>
                                    <option value="51">TWC</option>
                                    <option value="62">Unknown</option>
                                    <option value="67">Vertical Wine Group</option>
                                    <option value="56">Victorica Wines</option>
                                    <option value="52">Violet Hills Wine Imports</option>
                                    <option value="47">Viva Spumanti</option>
                                </select></span><span></span><span></span><span><span class="btn_delete_slist btn"><svg
                                        class="svg-inline--fa fa-trash-can" aria-hidden="true" focusable="false"
                                        data-prefix="fas" data-icon="trash-can" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                        </path>
                                    </svg>
                                    <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                        </div>
                        <hr>
                        <div class="actual_body po_slist_row vintage_row" po_slist_id="143" gn_prod_id="2393"
                            vntg_prod_id="2394"><span>Vintage: 2020 (P. Price: $335.88)</span><span>12: 1 / 0 <span
                                    class="q_tip"><svg class="svg-inline--fa fa-circle-info" aria-hidden="true"
                                        focusable="false" data-prefix="fas" data-icon="circle-info" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                        </path>
                                    </svg>
                                    <!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                                <div class="qtip_content">
                                    <p>12: 1 / 0 @ 1st. Floor Wine Room</p>
                                </div>
                            </span><span>
                                <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999"
                                        step="1" value="0">
                                    <div class="qty_nav">
                                        <div class="qty_button qty_up">+</div>
                                        <div class="qty_button qty_down">-</div>
                                    </div>
                                </div>
                            </span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card supplier_warp" supplier_id="38">
            <div>
                <div class="supplier_header"><input type="checkbox" class="chkbx_supplier" value="38"> Trevi Fountain
                </div>
                <div class="supplier_items_wrap">
                    <div class="po_slist_row header"><span>Name</span><span>On Hand</span><span>Cases to
                            Order</span><span></span></div>
                    <div class="actual_body po_slist_row" po_slist_id="58" gn_prod_id="1515"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1515"
                                target="_blank">Clamato</a> (P. Price: $null)<br><strong>Purcahsed In:</strong> Tank
                            <strong>Type:</strong> Trevi Fountain<br><strong>Move to:</strong> <select
                                class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>2 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>2 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="0">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="59" gn_prod_id="1516"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1516"
                                target="_blank">Co2</a> (P. Price: $null)<br><strong>Purcahsed In:</strong> Tank
                            <strong>Type:</strong> Trevi Fountain<br><strong>Move to:</strong> <select
                                class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>4 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>4 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0074
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="0">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="50" gn_prod_id="1507"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1507"
                                target="_blank">Cola</a> (P. Price: $null)<br><strong>Purcahsed In:</strong> Tank
                            <strong>Type:</strong> Trevi Fountain<br><strong>Move to:</strong> <select
                                class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>3 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>3 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0074
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="0">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="55" gn_prod_id="1512"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1512"
                                target="_blank">Cranberry</a> (P. Price: $null)<br><strong>Purcahsed In:</strong> Tank
                            <strong>Type:</strong> Trevi Fountain<br><strong>Move to:</strong> <select
                                class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>3 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>3 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0055
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="1">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="51" gn_prod_id="1508"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1508"
                                target="_blank">Diet</a> (P. Price: $null)<br><strong>Purcahsed In:</strong> Tank
                            <strong>Type:</strong> Trevi Fountain<br><strong>Move to:</strong> <select
                                class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>1 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>1 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="1">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="53" gn_prod_id="1510"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1510"
                                target="_blank">Gingerale</a> (P. Price: $null)<br><strong>Purcahsed In:</strong> Tank
                            <strong>Type:</strong> Trevi Fountain<br><strong>Move to:</strong> <select
                                class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>3 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>3 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="0">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="56" gn_prod_id="1513"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1513"
                                target="_blank">Ice Tea</a> (P. Price: $null)<br><strong>Purcahsed In:</strong> Tank
                            <strong>Type:</strong> Trevi Fountain<br><strong>Move to:</strong> <select
                                class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>2 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>2 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="0">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="52" gn_prod_id="1509"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1509"
                                target="_blank">Lemon</a> (P. Price: $null)<br><strong>Purcahsed In:</strong> Tank
                            <strong>Type:</strong> Trevi Fountain<br><strong>Move to:</strong> <select
                                class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>3 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>3 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0019
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="0">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="173" gn_prod_id="2671"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2671"
                                target="_blank">Lime Juice</a> (P. Price: $null)<br><strong>Purcahsed In:</strong> Tank
                            <strong>Type:</strong> Special Orders<br><strong>Move to:</strong> <select
                                class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>3 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>3 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999"
                                    step="0.01" value="0">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="57" gn_prod_id="1514"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1514"
                                target="_blank">Orange</a> (P. Price: $null)<br><strong>Purcahsed In:</strong> Tank
                            <strong>Type:</strong> Trevi Fountain<br><strong>Move to:</strong> <select
                                class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>1 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>1 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0055
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="3">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="172" gn_prod_id="2670"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2670"
                                target="_blank">Pineapple Juice</a> (P. Price: $null)<br><strong>Purcahsed In:</strong>
                            Tank <strong>Type:</strong> Special Orders<br><strong>Move to:</strong> <select
                                class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>3 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>3 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999"
                                    step="0.01" value="0">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="54" gn_prod_id="1511"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1511"
                                target="_blank">Tonic</a> (P. Price: $null)<br><strong>Purcahsed In:</strong> Tank
                            <strong>Type:</strong> Trevi Fountain<br><strong>Move to:</strong> <select
                                class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>2 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>2 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0019
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="0">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card supplier_warp" supplier_id="69">
            <div>
                <div class="supplier_header"><input type="checkbox" class="chkbx_supplier" value="69"> True Theory</div>
                <div class="supplier_items_wrap">
                    <div class="po_slist_row header"><span>Name</span><span>On Hand</span><span>Cases to
                            Order</span><span></span></div>
                    <div class="actual_body po_slist_row" po_slist_id="129" gn_prod_id="2338"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2338"
                                target="_blank">True Theory Vodka</a> (P. Price: $null)<br><strong>Purcahsed
                                In:</strong> Single <strong>Type:</strong> Vodka<br><strong>Move to:</strong> <select
                                class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>16 <span class="q_tip"><svg class="svg-inline--fa fa-circle-info"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>16 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="24">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card supplier_warp" supplier_id="51">
            <div>
                <div class="supplier_header"><input type="checkbox" class="chkbx_supplier" value="51"> TWC</div>
                <div class="supplier_items_wrap">
                    <div class="po_slist_row header"><span>Name</span><span>On Hand</span><span>Cases to
                            Order</span><span></span></div>
                    <div class="slist_vintage_wrap">
                        <div class="actual_body po_slist_row" po_slist_id="135" gn_prod_id="1327"><span><a
                                    href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1327"
                                    target="_blank">Rosso di Toscana (Bin #: 160)</a><br><strong>Purcahsed In:</strong>
                                Case of 12 <strong>Type:</strong> Wine<br><strong>Move to:</strong> <select
                                    class="supplier_pick">
                                    <option value="----">----</option>
                                    <option value="54">Abcon</option>
                                    <option value="46">Beer Store</option>
                                    <option value="55">Charton-Hobs</option>
                                    <option value="57">Churchill Cellars</option>
                                    <option value="64">Corveste Wines</option>
                                    <option value="65">Grape Brands Fine Wines and Spirits</option>
                                    <option value="43">LCBO</option>
                                    <option value="58">Marram Fine Wines</option>
                                    <option value="74">parmeshwar</option>
                                    <option value="73">pavan</option>
                                    <option value="44">Profile Wine Group</option>
                                    <option value="49">Rogers and Co</option>
                                    <option value="63">Stem Wine Group Inc.</option>
                                    <option value="48">Tawse Winery</option>
                                    <option value="66">Tre Amici</option>
                                    <option value="38">Trevi Fountain</option>
                                    <option value="69">True Theory</option>
                                    <option value="51">TWC</option>
                                    <option value="62">Unknown</option>
                                    <option value="67">Vertical Wine Group</option>
                                    <option value="56">Victorica Wines</option>
                                    <option value="52">Violet Hills Wine Imports</option>
                                    <option value="47">Viva Spumanti</option>
                                </select></span><span></span><span></span><span><span class="btn_delete_slist btn"><svg
                                        class="svg-inline--fa fa-trash-can" aria-hidden="true" focusable="false"
                                        data-prefix="fas" data-icon="trash-can" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                        </path>
                                    </svg>
                                    <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                        </div>
                        <hr>
                        <div class="actual_body po_slist_row vintage_row" po_slist_id="135" gn_prod_id="1327"
                            vntg_prod_id="1848"><span>Vintage: 2014 (P. Price: $null)</span><span>3: 0 / 3 <span
                                    class="q_tip"><svg class="svg-inline--fa fa-circle-info" aria-hidden="true"
                                        focusable="false" data-prefix="fas" data-icon="circle-info" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                        </path>
                                    </svg>
                                    <!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                                <div class="qtip_content">
                                    <p>3: 0 / 3 @ 1st. Floor Wine Room</p>
                                </div>
                            </span><span>
                                <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999"
                                        step="1" value="0">
                                    <div class="qty_nav">
                                        <div class="qty_button qty_up">+</div>
                                        <div class="qty_button qty_down">-</div>
                                    </div>
                                </div>
                            </span></div>
                        <hr>
                        <div class="actual_body po_slist_row vintage_row" po_slist_id="135" gn_prod_id="1327"
                            vntg_prod_id="2392"><span>Vintage: 2018 (P. Price: $null)</span><span>18: 1 / 6 <span
                                    class="q_tip"><svg class="svg-inline--fa fa-circle-info" aria-hidden="true"
                                        focusable="false" data-prefix="fas" data-icon="circle-info" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                        </path>
                                    </svg>
                                    <!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                                <div class="qtip_content">
                                    <p>18: 1 / 6 @ 1st. Floor Wine Room</p>
                                </div>
                            </span><span>
                                <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999"
                                        step="1" value="0">
                                    <div class="qty_nav">
                                        <div class="qty_button qty_up">+</div>
                                        <div class="qty_button qty_down">-</div>
                                    </div>
                                </div>
                            </span></div>
                    </div>
                    <div class="slist_vintage_wrap">
                        <div class="actual_body po_slist_row" po_slist_id="164" gn_prod_id="1327"><span><a
                                    href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1327"
                                    target="_blank">Rosso di Toscana (Bin #: 160)</a><br><strong>Purcahsed In:</strong>
                                Case of 12 <strong>Type:</strong> Wine<br><strong>Move to:</strong> <select
                                    class="supplier_pick">
                                    <option value="----">----</option>
                                    <option value="54">Abcon</option>
                                    <option value="46">Beer Store</option>
                                    <option value="55">Charton-Hobs</option>
                                    <option value="57">Churchill Cellars</option>
                                    <option value="64">Corveste Wines</option>
                                    <option value="65">Grape Brands Fine Wines and Spirits</option>
                                    <option value="43">LCBO</option>
                                    <option value="58">Marram Fine Wines</option>
                                    <option value="74">parmeshwar</option>
                                    <option value="73">pavan</option>
                                    <option value="44">Profile Wine Group</option>
                                    <option value="49">Rogers and Co</option>
                                    <option value="63">Stem Wine Group Inc.</option>
                                    <option value="48">Tawse Winery</option>
                                    <option value="66">Tre Amici</option>
                                    <option value="38">Trevi Fountain</option>
                                    <option value="69">True Theory</option>
                                    <option value="51">TWC</option>
                                    <option value="62">Unknown</option>
                                    <option value="67">Vertical Wine Group</option>
                                    <option value="56">Victorica Wines</option>
                                    <option value="52">Violet Hills Wine Imports</option>
                                    <option value="47">Viva Spumanti</option>
                                </select></span><span></span><span></span><span><span class="btn_delete_slist btn"><svg
                                        class="svg-inline--fa fa-trash-can" aria-hidden="true" focusable="false"
                                        data-prefix="fas" data-icon="trash-can" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                        </path>
                                    </svg>
                                    <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                        </div>
                        <hr>
                        <div class="actual_body po_slist_row vintage_row" po_slist_id="164" gn_prod_id="1327"
                            vntg_prod_id="1848"><span>Vintage: 2014 (P. Price: $null)</span><span>3: 0 / 3 <span
                                    class="q_tip"><svg class="svg-inline--fa fa-circle-info" aria-hidden="true"
                                        focusable="false" data-prefix="fas" data-icon="circle-info" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                        </path>
                                    </svg>
                                    <!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                                <div class="qtip_content">
                                    <p>3: 0 / 3 @ 1st. Floor Wine Room</p>
                                </div>
                            </span><span>
                                <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999"
                                        step="1" value="0">
                                    <div class="qty_nav">
                                        <div class="qty_button qty_up">+</div>
                                        <div class="qty_button qty_down">-</div>
                                    </div>
                                </div>
                            </span></div>
                        <hr>
                        <div class="actual_body po_slist_row vintage_row" po_slist_id="164" gn_prod_id="1327"
                            vntg_prod_id="2392"><span>Vintage: 2018 (P. Price: $null)</span><span>18: 1 / 6 <span
                                    class="q_tip"><svg class="svg-inline--fa fa-circle-info" aria-hidden="true"
                                        focusable="false" data-prefix="fas" data-icon="circle-info" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                        </path>
                                    </svg>
                                    <!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                                <div class="qtip_content">
                                    <p>18: 1 / 6 @ 1st. Floor Wine Room</p>
                                </div>
                            </span><span>
                                <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999"
                                        step="1" value="0">
                                    <div class="qty_nav">
                                        <div class="qty_button qty_up">+</div>
                                        <div class="qty_button qty_down">-</div>
                                    </div>
                                </div>
                            </span></div>
                    </div>
                    <div class="slist_vintage_wrap">
                        <div class="actual_body po_slist_row" po_slist_id="165" gn_prod_id="2451"><span><a
                                    href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2451"
                                    target="_blank">Sassarello Toscana IGT (Bin #: 167)</a><br><strong>Purcahsed
                                    In:</strong> Case of 12 <strong>Type:</strong> Wine<br><strong>Move to:</strong>
                                <select class="supplier_pick">
                                    <option value="----">----</option>
                                    <option value="54">Abcon</option>
                                    <option value="46">Beer Store</option>
                                    <option value="55">Charton-Hobs</option>
                                    <option value="57">Churchill Cellars</option>
                                    <option value="64">Corveste Wines</option>
                                    <option value="65">Grape Brands Fine Wines and Spirits</option>
                                    <option value="43">LCBO</option>
                                    <option value="58">Marram Fine Wines</option>
                                    <option value="74">parmeshwar</option>
                                    <option value="73">pavan</option>
                                    <option value="44">Profile Wine Group</option>
                                    <option value="49">Rogers and Co</option>
                                    <option value="63">Stem Wine Group Inc.</option>
                                    <option value="48">Tawse Winery</option>
                                    <option value="66">Tre Amici</option>
                                    <option value="38">Trevi Fountain</option>
                                    <option value="69">True Theory</option>
                                    <option value="51">TWC</option>
                                    <option value="62">Unknown</option>
                                    <option value="67">Vertical Wine Group</option>
                                    <option value="56">Victorica Wines</option>
                                    <option value="52">Violet Hills Wine Imports</option>
                                    <option value="47">Viva Spumanti</option>
                                </select></span><span></span><span></span><span><span class="btn_delete_slist btn"><svg
                                        class="svg-inline--fa fa-trash-can" aria-hidden="true" focusable="false"
                                        data-prefix="fas" data-icon="trash-can" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                        </path>
                                    </svg>
                                    <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                        </div>
                        <hr>
                        <div class="actual_body po_slist_row vintage_row" po_slist_id="165" gn_prod_id="2451"
                            vntg_prod_id="2452"><span>Vintage: 2016 (P. Price: $null)</span><span>12: 1 / 0 <span
                                    class="q_tip"><svg class="svg-inline--fa fa-circle-info" aria-hidden="true"
                                        focusable="false" data-prefix="fas" data-icon="circle-info" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                        </path>
                                    </svg>
                                    <!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                                <div class="qtip_content">
                                    <p>12: 1 / 0 @ 1st. Floor Wine Room</p>
                                </div>
                            </span><span>
                                <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999"
                                        step="0.01" value="1">
                                    <div class="qty_nav">
                                        <div class="qty_button qty_up">+</div>
                                        <div class="qty_button qty_down">-</div>
                                    </div>
                                </div>
                            </span></div>
                    </div>
                    <div class="actual_body po_slist_row" po_slist_id="122" gn_prod_id="2082"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2082"
                                target="_blank">Stony Bank Marlborough Sauvignon Blanc</a> (P. Price:
                            $null)<br><strong>Purcahsed In:</strong> Case of 12 <strong>Type:</strong>
                            Wine<br><strong>Move to:</strong> <select class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>0: 0 / 0<br>Use: 0.0000</span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="0">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card supplier_warp" supplier_id="47">
            <div>
                <div class="supplier_header"><input type="checkbox" class="chkbx_supplier" value="47"> Viva Spumanti
                </div>
                <div class="supplier_items_wrap">
                    <div class="po_slist_row header"><span>Name</span><span>On Hand</span><span>Cases to
                            Order</span><span></span></div>
                    <div class="actual_body po_slist_row" po_slist_id="6" gn_prod_id="1403"><span><a
                                href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1403"
                                target="_blank">Viva Spumante Colio</a> (P. Price: $null)<br><strong>Purcahsed
                                In:</strong> Case of 12 <strong>Type:</strong> Champagne<br><strong>Move to:</strong>
                            <select class="supplier_pick">
                                <option value="----">----</option>
                                <option value="54">Abcon</option>
                                <option value="46">Beer Store</option>
                                <option value="55">Charton-Hobs</option>
                                <option value="57">Churchill Cellars</option>
                                <option value="64">Corveste Wines</option>
                                <option value="65">Grape Brands Fine Wines and Spirits</option>
                                <option value="43">LCBO</option>
                                <option value="58">Marram Fine Wines</option>
                                <option value="74">parmeshwar</option>
                                <option value="73">pavan</option>
                                <option value="44">Profile Wine Group</option>
                                <option value="49">Rogers and Co</option>
                                <option value="63">Stem Wine Group Inc.</option>
                                <option value="48">Tawse Winery</option>
                                <option value="66">Tre Amici</option>
                                <option value="38">Trevi Fountain</option>
                                <option value="69">True Theory</option>
                                <option value="51">TWC</option>
                                <option value="62">Unknown</option>
                                <option value="67">Vertical Wine Group</option>
                                <option value="56">Victorica Wines</option>
                                <option value="52">Violet Hills Wine Imports</option>
                                <option value="47">Viva Spumanti</option>
                            </select></span><span>6: 0 / 6 <span class="q_tip"><svg
                                    class="svg-inline--fa fa-circle-info" aria-hidden="true" focusable="false"
                                    data-prefix="fas" data-icon="circle-info" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                    </path>
                                </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                            <div class="qtip_content">
                                <p>6: 0 / 6 @ Banquet Hall Liquor Room</p>
                            </div><br>Use: 0.0000
                        </span><span>
                            <div class="qty_to_order"><input class="qty_count" type="number" min="0" max="999" step="1"
                                    value="10">
                                <div class="qty_nav">
                                    <div class="qty_button qty_up">+</div>
                                    <div class="qty_button qty_down">-</div>
                                </div>
                            </div>
                        </span><span><span class="btn_delete_slist btn"><svg class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bottom_bar"><input type="submit" value="Re-Generate" id="btn_regenerate" name="btn_regenerate"
            class="button" fdprocessedid="j62ik"><input type="submit" value="Create POs" id="btn_create_pos_entire"
            name="btn_create_pos_entire" class="button" fdprocessedid="r4qifp"><input type="submit" value="Save Changes"
            id="btn_save_changes" name="btn_save_changes" class="button" fdprocessedid="9cs4z"></div>


    <script type="text/javascript">
    $(function() {
        // Save the changes
        $("#btn_save_changes").click(function() {
            var slists_to_save = {
                "slists_to_save": getPOSListsForSave()
            };

            poShortListSaveCreatePO(slists_to_save);
        });

        // Save and create POs for selected suppliers
        $("#btn_create_pos_entire").click(function() {
            if (!confirm(
                    "This will create Purchase Orders for the entire list OR for selected suppliers. Continue?"
                    ))
                return false;

            // Get all the selected supplier IDs from checkboxed
            var data = {
                "supplier_ids": ""
            };

            $(".supplier_header").each(function() {
                // Input number value from class .chkbx_supplier
                if ($(this).find(".chkbx_supplier").prop("checked")) {
                    var supplier_id = $(this).find(".chkbx_supplier").val();

                    if (data.supplier_ids != "")
                        data.supplier_ids += ",";
                    data.supplier_ids += supplier_id;
                }

            });
            if (data.supplier_ids == "") {
                xmlbWarn("Please select the suppliers to create POs.");
                return;
            }

            // Also items to be saved in case user did not already save
            data.slists_to_save = getPOSListsForSave();

            poShortListSaveCreatePO(data);
        }); // Create for entire
    }); // document.ready

    function getPOSListsForSave() {
        var save_slits = new Array();
        $(".po_slist_row.actual_body").each(function() {
            // If this item has a vintage and this is not the vintage, then skip
            var main_wrap = $(this).closest(".slist_vintage_wrap");
            if (main_wrap.length != 0 && !$(this).hasAttr("vntg_prod_id"))
                return; // Continue

            var this_slist = {};

            this_slist.gn_prod_id = $(this).attr("gn_prod_id");
            this_slist.po_slist_id = $(this).attr("po_slist_id");
            this_slist.qty = getNumVal($(this).find(".qty_count"), zero_on_null = true);

            if ($(this).hasAttr("vntg_prod_id"))
                this_slist.vntg_prod_id = $(this).attr("vntg_prod_id");

            save_slits.push(this_slist);
        });

        return save_slits;
    } // getPOSListsForSave

    async function poShortListSaveCreatePO(data) {
        var request = '{"request": "po_short_list_save_create_po", "data": ' + JSON.stringify(data) + '}';
        // console.log("request:",request) ; // debug.console

        let response = await fetch('https://www.royalambassador.ca/common/api.php', {
            method: 'POST' // Needed to pass request
                ,
            body: request
        });

        let result = await response.json();
        if (result.outcome == "success") {
            $('#btn_save_changes').css({
                'background': '',
                'color': 'white'
            });

            if (data.supplier_ids) {
                location.href = 'https://www.royalambassador.ca/db_purchasing/active_purchase_orders.php';
            } else
                xmlbWarn("Sheet saved!");
        } else
            xmlbWarn(result.err_msg);
    } // poShortListSaveCreatePO

    // A change in the Inventory count will turn the "Save Values" button to red
    function warnToSave() {
        // Any changes in the inventory count will have the "Save Values" turned red
        $('#btn_save_changes').css({
            'background': 'red',
            'color': 'white'
        });
    } // warnToSave

    $(function() {
        $(document).on("change", ".supplier_pick", function() {
            if ($(this).val() != "----") {
                // Build the program to move this record under the newly selected supplier
                prog = '$do_record = new doRecord("PO_SHORT_LIST") ;' +
                    "\n" + '$new_rec = array() ;' +
                    "\n" + '$new_rec["LNK_SUPPLIER"] = ' + $(this).val() + ' ;' +
                    "\n" + '$do_record -> new_record = $new_rec ;' +
                    "\n" + '$do_record -> id_column_val = ' + $(this).closest(".po_slist_row").attr(
                        "po_slist_id") + ' ;' +
                    "\n" + '$do_record -> update() ;' +
                    "\n" + 'unset($new_rec) ;' +
                    "\n" + 'unset($do_record) ;';

                runBackEndProg(prog, null, 'location.reload() ;');
            }
        });
    }); // document.ready
    </script>


    <script type="text/javascript">
    var liquor_prods_sugg = [{
        "value": 1237,
        "label": "Tawse Winery Meritage",
        "supplier_id": 48
    }, {
        "value": 1240,
        "label": "Poggio al Tesoro Bolgheri Sondraia",
        "supplier_id": 44
    }, {
        "value": 1244,
        "label": "Podere Poggio Scalette Il Carbonaione",
        "supplier_id": 44
    }, {
        "value": 1248,
        "label": "Brunello di Montalcino, Riserva La Lecciaia",
        "supplier_id": 51
    }, {
        "value": 1249,
        "label": "Peter Franus Napa Valley Cabernet Sauvignon",
        "supplier_id": 44
    }, {
        "value": 1250,
        "label": "Starmont Cabernet Sauvignon",
        "supplier_id": 44
    }, {
        "value": 1252,
        "label": "Cesari Amarone della Valpolicella Bosca Riserva",
        "supplier_id": 44
    }, {
        "value": 1253,
        "label": "Cordero di Montezemolo Barolo Monfalletto",
        "supplier_id": 44
    }, {
        "value": 1254,
        "label": "Ornellaia Tenuta DellOrnallaia",
        "supplier_id": 43
    }, {
        "value": 1256,
        "label": "Sassicaia",
        "supplier_id": 43
    }, {
        "value": 1258,
        "label": "Altos de Losada La Bienquerida",
        "supplier_id": 51
    }, {
        "value": 1261,
        "label": "Louis Latour Chateau Corton Grancey Grand Cru",
        "supplier_id": 43
    }, {
        "value": 1262,
        "label": "Quintarelli Alzero",
        "supplier_id": 43
    }, {
        "value": 1263,
        "label": "Château Cap de Mourlin Saint Emilion Grand Cru",
        "supplier_id": 43
    }, {
        "value": 1265,
        "label": "Chateau Ducru Beaucaillou St Julien 2er Cru",
        "supplier_id": 43
    }, {
        "value": 1267,
        "label": "Penfolds Grange",
        "supplier_id": 43
    }, {
        "value": 1270,
        "label": "Shiraz Reserve Geoff Merrill McLaren Vale",
        "supplier_id": 43
    }, {
        "value": 1273,
        "label": "Bond Cabernet Sauvignon",
        "supplier_id": 44
    }, {
        "value": 1274,
        "label": "Whitehall Lane Merlot",
        "supplier_id": 58
    }, {
        "value": 1276,
        "label": "Duckhorn Vineyards Merlot",
        "supplier_id": 49
    }, {
        "value": 1278,
        "label": "Merryvale Cabernet Sauvignon, Napa Valley",
        "supplier_id": 44
    }, {
        "value": 1279,
        "label": "Signorello Padrone",
        "supplier_id": 44
    }, {
        "value": 1281,
        "label": "Signorello Estate Cabernet Sauvignon",
        "supplier_id": 44
    }, {
        "value": 1282,
        "label": "Hilltop Cabernet Sauvignon",
        "supplier_id": 44
    }, {
        "value": 1283,
        "label": "Poggio Stenti Pian di Staffa",
        "supplier_id": 51
    }, {
        "value": 1284,
        "label": "Amarone Della Valpolicella La Rosta",
        "supplier_id": 51
    }, {
        "value": 1294,
        "label": "Pellé Sancerre La Croix au Garde",
        "supplier_id": 49
    }, {
        "value": 1307,
        "label": "Butterfield Station Chardonnay",
        "supplier_id": 54
    }, {
        "value": 1308,
        "label": "Bogle Chenin Blanc",
        "supplier_id": 43
    }, {
        "value": 1309,
        "label": "Château De Maligney Chablis Primier Cru Vau de Vey",
        "supplier_id": 49
    }, {
        "value": 1312,
        "label": "Regnard Petit Chablis",
        "supplier_id": 43
    }, {
        "value": 1318,
        "label": "Mastroberardino Greco di Tufo",
        "supplier_id": 44
    }, {
        "value": 1320,
        "label": "Castello di Querceto Chianti",
        "supplier_id": 44
    }, {
        "value": 1322,
        "label": "Grayson Estate Merlot",
        "supplier_id": 49
    }, {
        "value": 1324,
        "label": "Dolcetto DAlba",
        "supplier_id": 44
    }, {
        "value": 1325,
        "label": "Fondo Antico Syrah",
        "supplier_id": 51
    }, {
        "value": 1327,
        "label": "Rosso di Toscana",
        "supplier_id": 51
    }, {
        "value": 1330,
        "label": "Vigneti del Salento ZOLLA Primitivo",
        "supplier_id": 44
    }, {
        "value": 1332,
        "label": "Degani Ciciio Valpolicella Classico Ripasso",
        "supplier_id": 51
    }, {
        "value": 1336,
        "label": "Cesari Ripasso Bosan",
        "supplier_id": 44
    }, {
        "value": 1338,
        "label": "Logonovo Montalcino",
        "supplier_id": 51
    }, {
        "value": 1339,
        "label": "Farnese Fantini Edizione Cinque Autoctoni",
        "supplier_id": 44
    }, {
        "value": 1342,
        "label": "Finca Losada",
        "supplier_id": 51
    }, {
        "value": 1346,
        "label": "Chateau Teyssier Pezat Bordeaux Superior",
        "supplier_id": 44
    }, {
        "value": 1348,
        "label": "Foppiano Petit Syrah",
        "supplier_id": 49
    }, {
        "value": 1350,
        "label": "Lailey Cabernet Franc",
        "supplier_id": 43
    }, {
        "value": 1352,
        "label": "Cave Spring Cabernet Franc",
        "supplier_id": 43
    }, {
        "value": 1354,
        "label": "Wakefield Pinot Noir",
        "supplier_id": 44
    }, {
        "value": 1361,
        "label": "Grayson Estate Cabernet Sauvignon",
        "supplier_id": 49
    }, {
        "value": 1363,
        "label": "Cordero Di Montezomolo Langhe Nebbiolo",
        "supplier_id": 44
    }, {
        "value": 1366,
        "label": "Peter Franus Napa Valley Merlot",
        "supplier_id": 44
    }, {
        "value": 1367,
        "label": "Brigaldara Amarone della Valpolicella Classico",
        "supplier_id": 49
    }, {
        "value": 1368,
        "label": "Edge Cabernet Sauvignon",
        "supplier_id": 44
    }, {
        "value": 1370,
        "label": "Finca La Florencia",
        "supplier_id": 50
    }, {
        "value": 1371,
        "label": "Ben Marco Plata",
        "supplier_id": 44
    }, {
        "value": 1378,
        "label": "J. Lohr Seven Oaks Cabernet Sauvignon",
        "supplier_id": 44
    }, {
        "value": 1380,
        "label": "Cristom Pinot Noir",
        "supplier_id": 43
    }, {
        "value": 1387,
        "label": "Cava Kripta Brut Nature Gran Reserva",
        "supplier_id": 51
    }, {
        "value": 1390,
        "label": "Augusti Torello Mata Cava Brut  Reserva",
        "supplier_id": 51
    }, {
        "value": 1395,
        "label": "Calatroni Pinot 64 Spumante",
        "supplier_id": 51
    }, {
        "value": 1396,
        "label": "Amaro Ramazotti",
        "supplier_id": 43
    }, {
        "value": 1397,
        "label": "Campari Aperitivo",
        "supplier_id": 43
    }, {
        "value": 1398,
        "label": "Jagermeister",
        "supplier_id": 43
    }, {
        "value": 1399,
        "label": "Amaro Averna",
        "supplier_id": 43
    }, {
        "value": 1400,
        "label": "Crown Royal Whisky",
        "supplier_id": 43
    }, {
        "value": 1401,
        "label": "Wisers Special Blend Whisky",
        "supplier_id": 43
    }, {
        "value": 1402,
        "label": "Astoria Prosecco La Robinia",
        "supplier_id": 43
    }, {
        "value": 1403,
        "label": "Viva Spumante Colio",
        "supplier_id": 47
    }, {
        "value": 1404,
        "label": "LA SCALA SPUMANTE",
        "supplier_id": null
    }, {
        "value": 1406,
        "label": "Remy Martin VSOP Congac",
        "supplier_id": 43
    }, {
        "value": 1407,
        "label": "St Remy Authentic Brandy",
        "supplier_id": null
    }, {
        "value": 1410,
        "label": "Hennessy VSOP Cognac",
        "supplier_id": 43
    }, {
        "value": 1411,
        "label": "Bombay Sapphire London Dry Gin",
        "supplier_id": 43
    }, {
        "value": 1412,
        "label": "Beefeater Gin",
        "supplier_id": 43
    }, {
        "value": 1414,
        "label": "Bacardi Superior White Rum",
        "supplier_id": 43
    }, {
        "value": 1416,
        "label": "Bacardi Black",
        "supplier_id": null
    }, {
        "value": 1417,
        "label": "Malibu Coconut Rum",
        "supplier_id": 43
    }, {
        "value": 1418,
        "label": "Captain Morgan Original Spiced Rum",
        "supplier_id": 43
    }, {
        "value": 1419,
        "label": "Chivas Regal 12 Year Old Scotch Whisky",
        "supplier_id": 43
    }, {
        "value": 1421,
        "label": "Glenfiddich 12 Year Old Single Malt Scotch Whisky",
        "supplier_id": 43
    }, {
        "value": 1422,
        "label": "Tequila Sauza Silver",
        "supplier_id": null
    }, {
        "value": 1423,
        "label": "Olmeca Tequila Gold",
        "supplier_id": 43
    }, {
        "value": 1424,
        "label": "Grey Goose Vodka",
        "supplier_id": 43
    }, {
        "value": 1425,
        "label": "Polar Ice Vodka",
        "supplier_id": 43
    }, {
        "value": 1426,
        "label": "Belvedere Pure Vodka",
        "supplier_id": 43
    }, {
        "value": 1427,
        "label": "Cointreau",
        "supplier_id": 43
    }, {
        "value": 1429,
        "label": "Montalto Pinot Grigio",
        "supplier_id": null
    }, {
        "value": 1431,
        "label": "MONTALTO PINOT GRIGIO IGT SICILY",
        "supplier_id": null
    }, {
        "value": 1432,
        "label": "DRAGANI MONTEPULCIANO DABRUZZO",
        "supplier_id": null
    }, {
        "value": 1433,
        "label": "CONCHA Y TORO FRONTERA CAB MER",
        "supplier_id": null
    }, {
        "value": 1434,
        "label": "FUZION SHIRAZ MALBEC",
        "supplier_id": null
    }, {
        "value": 1435,
        "label": "OGGI BOTTER PRIMITIVO",
        "supplier_id": null
    }, {
        "value": 1436,
        "label": "Courvoisier VS Cognac",
        "supplier_id": 43
    }, {
        "value": 1437,
        "label": "BAREFOOT PINOT GRIGIO",
        "supplier_id": null
    }, {
        "value": 1438,
        "label": "BAREFOOT CABERNET SAUVIGNON",
        "supplier_id": null
    }, {
        "value": 1439,
        "label": "CITRA PINOT GRIGIO OSCO IGT",
        "supplier_id": null
    }, {
        "value": 1440,
        "label": "COLLE SECCO MONTEPULCIANO D ABRUZZO",
        "supplier_id": null
    }, {
        "value": 1441,
        "label": "PASSION OF PORTUGAL RED",
        "supplier_id": null
    }, {
        "value": 1442,
        "label": "SOGRAPE GAZELA VINHO VERDE",
        "supplier_id": null
    }, {
        "value": 1443,
        "label": "Absolute Blueberry",
        "supplier_id": null
    }, {
        "value": 1444,
        "label": "Sour Puss Raspberry Liquor",
        "supplier_id": 43
    }, {
        "value": 1445,
        "label": "Soho Lychee Liqueur",
        "supplier_id": 43
    }, {
        "value": 1446,
        "label": "Captain Morgan Gold Rum",
        "supplier_id": 43
    }, {
        "value": 1448,
        "label": "Chambord",
        "supplier_id": null
    }, {
        "value": 1449,
        "label": "brights 74 Port",
        "supplier_id": 43
    }, {
        "value": 1451,
        "label": "Maraska Stara Sljivovica",
        "supplier_id": null
    }, {
        "value": 1461,
        "label": "Mcguiness Creme de Menthe Green",
        "supplier_id": 43
    }, {
        "value": 1462,
        "label": "Disaronno Originale Amaretto",
        "supplier_id": 43
    }, {
        "value": 1463,
        "label": "Amaretto Dell Amorosa",
        "supplier_id": 43
    }, {
        "value": 1464,
        "label": "Baileys Irish Cream",
        "supplier_id": 43
    }, {
        "value": 1465,
        "label": "Mcguinness Blue Curacao",
        "supplier_id": 43
    }, {
        "value": 1466,
        "label": "Mcguinness Creme de Cacao White",
        "supplier_id": 43
    }, {
        "value": 1467,
        "label": "Dubonnet Rouge",
        "supplier_id": null
    }, {
        "value": 1468,
        "label": "Grand Marnier Cordon Rouge",
        "supplier_id": 43
    }, {
        "value": 1469,
        "label": "Jack Daniels",
        "supplier_id": 43
    }, {
        "value": 1470,
        "label": "Kahlua",
        "supplier_id": 43
    }, {
        "value": 1471,
        "label": "Martini Dry Vermouth White",
        "supplier_id": 43
    }, {
        "value": 1472,
        "label": "Mcguinness Peach Schnapps",
        "supplier_id": 43
    }, {
        "value": 1473,
        "label": "Mcguinness Creme de Banane",
        "supplier_id": 43
    }, {
        "value": 1474,
        "label": "Sambuca Ramazzotti",
        "supplier_id": 43
    }, {
        "value": 1475,
        "label": "Sour Puss Apple Liquor",
        "supplier_id": 43
    }, {
        "value": 1476,
        "label": "Southern Comfort",
        "supplier_id": 43
    }, {
        "value": 1477,
        "label": "Sperone Dry Marsala *for kitchen",
        "supplier_id": 43
    }, {
        "value": 1478,
        "label": "Martini & Rossi Sweet Vermouth Red",
        "supplier_id": 43
    }, {
        "value": 1479,
        "label": "McGuinness Triple Sec",
        "supplier_id": 43
    }, {
        "value": 1480,
        "label": "Carolines Irish Cream",
        "supplier_id": null
    }, {
        "value": 1481,
        "label": "Mcguinness Creme de Menthe White",
        "supplier_id": 43
    }, {
        "value": 1482,
        "label": "McGuinness Melon",
        "supplier_id": 43
    }, {
        "value": 1484,
        "label": "Budweiser",
        "supplier_id": 46
    }, {
        "value": 1485,
        "label": "Coors Light",
        "supplier_id": 46
    }, {
        "value": 1486,
        "label": "Corona",
        "supplier_id": 46
    }, {
        "value": 1487,
        "label": "Heineken Rest D",
        "supplier_id": 46
    }, {
        "value": 1488,
        "label": "Labatt Blue",
        "supplier_id": 46
    }, {
        "value": 1489,
        "label": "Miller Genuine Draft Rest",
        "supplier_id": 46
    }, {
        "value": 1490,
        "label": "Molson Canadian",
        "supplier_id": 46
    }, {
        "value": 1491,
        "label": "Molson Export",
        "supplier_id": null
    }, {
        "value": 1492,
        "label": "Moosehead Rest",
        "supplier_id": 46
    }, {
        "value": 1493,
        "label": "Sleemans Honey Brown",
        "supplier_id": null
    }, {
        "value": 1494,
        "label": "Stella Artois",
        "supplier_id": 46
    }, {
        "value": 1495,
        "label": "Alexander Keiths",
        "supplier_id": null
    }, {
        "value": 1496,
        "label": "Dos Equis",
        "supplier_id": null
    }, {
        "value": 1497,
        "label": "Stella Artois Draught",
        "supplier_id": null
    }, {
        "value": 1498,
        "label": "Bud Light",
        "supplier_id": 46
    }, {
        "value": 1499,
        "label": "Bud light Lime",
        "supplier_id": null
    }, {
        "value": 1500,
        "label": "Zywiec",
        "supplier_id": 46
    }, {
        "value": 1502,
        "label": "Tyskie",
        "supplier_id": null
    }, {
        "value": 1503,
        "label": "Staropramin",
        "supplier_id": null
    }, {
        "value": 1507,
        "label": "Cola",
        "supplier_id": 38
    }, {
        "value": 1508,
        "label": "Diet",
        "supplier_id": 38
    }, {
        "value": 1509,
        "label": "Lemon",
        "supplier_id": 38
    }, {
        "value": 1510,
        "label": "Gingerale",
        "supplier_id": 38
    }, {
        "value": 1511,
        "label": "Tonic",
        "supplier_id": 38
    }, {
        "value": 1512,
        "label": "Cranberry",
        "supplier_id": 38
    }, {
        "value": 1513,
        "label": "Ice Tea",
        "supplier_id": 38
    }, {
        "value": 1514,
        "label": "Orange",
        "supplier_id": 38
    }, {
        "value": 1515,
        "label": "Clamato",
        "supplier_id": 38
    }, {
        "value": 1516,
        "label": "Co2",
        "supplier_id": 38
    }, {
        "value": 1517,
        "label": "Ballatiness Scotch",
        "supplier_id": 43
    }, {
        "value": 1521,
        "label": "Pernod",
        "supplier_id": 43
    }, {
        "value": 1524,
        "label": "Jose Cuervo Reserva De La Familia Extra Añejo",
        "supplier_id": 43
    }, {
        "value": 1526,
        "label": "Fleixenetbrut Champagne",
        "supplier_id": 43
    }, {
        "value": 1531,
        "label": "Pink Moet Champagne",
        "supplier_id": null
    }, {
        "value": 1532,
        "label": "Captain Morgan Dark Rum",
        "supplier_id": 43
    }, {
        "value": 1536,
        "label": "CAN Valle de la Orotava",
        "supplier_id": 51
    }, {
        "value": 1537,
        "label": "Crozes-Hermitage",
        "supplier_id": 44
    }, {
        "value": 1538,
        "label": "Caledon Hills Premium Vienna Lager",
        "supplier_id": 46
    }, {
        "value": 1540,
        "label": "Rosso di Toscana Bevilo",
        "supplier_id": 43
    }, {
        "value": 1543,
        "label": "Floral de Vinya",
        "supplier_id": 51
    }, {
        "value": 1545,
        "label": "Ciroc",
        "supplier_id": 43
    }, {
        "value": 1547,
        "label": "Fondo Antico Nero dAvola",
        "supplier_id": 51
    }, {
        "value": 1548,
        "label": "Poggio Stenti Maremma Toscana Rosso",
        "supplier_id": 43
    }, {
        "value": 1550,
        "label": "Terres de Berne",
        "supplier_id": 51
    }, {
        "value": 1551,
        "label": "Vieilles Vignes Rouge Costières de Nîmes",
        "supplier_id": 51
    }, {
        "value": 1552,
        "label": "Rosehall Run Pinot Noir",
        "supplier_id": 43
    }, {
        "value": 1555,
        "label": "Jean-Luc Colombo Cornas, Les Ruchets",
        "supplier_id": 44
    }, {
        "value": 1562,
        "label": "Terrapura Pinot Noir",
        "supplier_id": 61
    }, {
        "value": 1564,
        "label": "Gautier",
        "supplier_id": null
    }, {
        "value": 1566,
        "label": "SAILOR JERRY SPICED RUM",
        "supplier_id": null
    }, {
        "value": 1567,
        "label": "BACARD OAKHEART SPICED RUM",
        "supplier_id": 43
    }, {
        "value": 1569,
        "label": "Tanqueray Dry Gin",
        "supplier_id": 43
    }, {
        "value": 1570,
        "label": "Johnnie Walker Black Label Scotch Whisky",
        "supplier_id": 43
    }, {
        "value": 1572,
        "label": "Aperol",
        "supplier_id": 43
    }, {
        "value": 1576,
        "label": "The Glenlivet Founders Reserve Scotch Whisky",
        "supplier_id": 43
    }, {
        "value": 1577,
        "label": "Mikes Hard Lemonade",
        "supplier_id": null
    }, {
        "value": 1578,
        "label": "Smirnoff Ice",
        "supplier_id": null
    }, {
        "value": 1580,
        "label": "Gosser",
        "supplier_id": null
    }, {
        "value": 1581,
        "label": "Peroni Nastro Azzurro",
        "supplier_id": 46
    }, {
        "value": 1583,
        "label": "Sleeman Clear",
        "supplier_id": 46
    }, {
        "value": 1584,
        "label": "Molson Canadian 67",
        "supplier_id": 46
    }, {
        "value": 1588,
        "label": "Coronita",
        "supplier_id": 43
    }, {
        "value": 1589,
        "label": "Amaro Montenegro",
        "supplier_id": 43
    }, {
        "value": 1590,
        "label": "Smirnoff",
        "supplier_id": 43
    }, {
        "value": 1592,
        "label": "Mount Gay Eclipse Rum",
        "supplier_id": 46
    }, {
        "value": 1595,
        "label": "Amaro Lucano",
        "supplier_id": 43
    }, {
        "value": 1596,
        "label": "El Dorado 8 Year Old Cask Aged Demerara Rum",
        "supplier_id": 43
    }, {
        "value": 1598,
        "label": "Hendricks Gin",
        "supplier_id": 43
    }, {
        "value": 1604,
        "label": "El Jimador",
        "supplier_id": 43
    }, {
        "value": 1607,
        "label": "St Remy VSOP Brandy",
        "supplier_id": 43
    }, {
        "value": 1608,
        "label": "Bacardi Gold Rum",
        "supplier_id": 43
    }, {
        "value": 1610,
        "label": "Absolut Raspberri Vodka",
        "supplier_id": 43
    }, {
        "value": 1611,
        "label": "Buton Vecchia Romagna Brandy",
        "supplier_id": 43
    }, {
        "value": 1615,
        "label": "Moët & Chandon Grand Vintage Extra Brut Rosé Champagne 2009",
        "supplier_id": 43
    }, {
        "value": 1617,
        "label": "The Kraken Black Spiced Rum",
        "supplier_id": 43
    }, {
        "value": 1618,
        "label": "Birra Moretti",
        "supplier_id": 46
    }, {
        "value": 1619,
        "label": "Amaretto Di Saschira",
        "supplier_id": 43
    }, {
        "value": 1623,
        "label": "Dillons Dry Gin",
        "supplier_id": 43
    }, {
        "value": 1624,
        "label": "El Dorado 12 Year Old Rum",
        "supplier_id": 43
    }, {
        "value": 1626,
        "label": "Makers Mark Kentucky Bourbon",
        "supplier_id": 43
    }, {
        "value": 1627,
        "label": "Patron Reposado Barrel Select Tequila",
        "supplier_id": 43
    }, {
        "value": 1628,
        "label": "Brickworks Ciderhouse Batch : 1904",
        "supplier_id": 43
    }, {
        "value": 1630,
        "label": "Beaus Lug Tread",
        "supplier_id": 43
    }, {
        "value": 1634,
        "label": "Estrella Damm Lager",
        "supplier_id": 43
    }, {
        "value": 1635,
        "label": "Glenrothes Select Reserve Single Malt Scotch Whisky",
        "supplier_id": 43
    }, {
        "value": 1636,
        "label": "Fullers London Pride",
        "supplier_id": 43
    }, {
        "value": 1637,
        "label": "Nonino Quintessentia Amaro",
        "supplier_id": 43
    }, {
        "value": 1638,
        "label": "Tequila Tromba Blanco",
        "supplier_id": 43
    }, {
        "value": 1639,
        "label": "Daura Damm",
        "supplier_id": 43
    }, {
        "value": 1642,
        "label": "Meaghers Triple Sec",
        "supplier_id": 43
    }, {
        "value": 1648,
        "label": "Woodford Reserve Distillers Select Bourbon",
        "supplier_id": 43
    }, {
        "value": 1649,
        "label": "Ketel One Botanical Cucumber and Mint",
        "supplier_id": 43
    }, {
        "value": 1650,
        "label": "Ketel One Botanical Peach and Orange Blossom",
        "supplier_id": 43
    }, {
        "value": 1651,
        "label": "Ketel One Botanical Grapefruit and Rose",
        "supplier_id": 43
    }, {
        "value": 1652,
        "label": "Ketel One Botanical Grapefruit and Rose",
        "supplier_id": 43
    }, {
        "value": 1654,
        "label": "Jameson Irish Whisky",
        "supplier_id": 43
    }, {
        "value": 1655,
        "label": "Gordons Gin",
        "supplier_id": 43
    }, {
        "value": 1657,
        "label": "Solid Ground, Cabernet Sauvignon",
        "supplier_id": 44
    }, {
        "value": 1658,
        "label": "Pina Colada Mix",
        "supplier_id": 43
    }, {
        "value": 1659,
        "label": "Strawberry Daiquiri",
        "supplier_id": 43
    }, {
        "value": 1661,
        "label": "Martell VS Single Distillery",
        "supplier_id": 44
    }, {
        "value": 1664,
        "label": "Cabot Trail Maple Cream",
        "supplier_id": 43
    }, {
        "value": 1671,
        "label": "Fernet-Branca Amer/Bitters",
        "supplier_id": 43
    }, {
        "value": 1673,
        "label": "Rocca Delle Macie Giulio Straccali Pinot Grigio",
        "supplier_id": 44
    }, {
        "value": 1677,
        "label": "Caledon Hills Bohemian Pils",
        "supplier_id": 43
    }, {
        "value": 1678,
        "label": "GoodLot Farmstead Ale",
        "supplier_id": 46
    }, {
        "value": 1679,
        "label": "Guinness Drought",
        "supplier_id": 46
    }, {
        "value": 1680,
        "label": "Mill St Origional Organic",
        "supplier_id": 46
    }, {
        "value": 1681,
        "label": "Hockley Dark",
        "supplier_id": 44
    }, {
        "value": 1682,
        "label": "Hockley Classic",
        "supplier_id": 46
    }, {
        "value": 1683,
        "label": "Hockley Amber",
        "supplier_id": null
    }, {
        "value": 1684,
        "label": "McGuinness Cherry Brandy",
        "supplier_id": 43
    }, {
        "value": 1703,
        "label": "Frangelico",
        "supplier_id": 43
    }, {
        "value": 1704,
        "label": "Rossi DAsiago Limoncello",
        "supplier_id": 43
    }, {
        "value": 1705,
        "label": "Caledon Hills Deadly Dark Lager",
        "supplier_id": 44
    }, {
        "value": 1710,
        "label": "Mount Gay 1703 Master Select",
        "supplier_id": null
    }, {
        "value": 1739,
        "label": "Arak Of Lebanon",
        "supplier_id": 43
    }, {
        "value": 1792,
        "label": "Modelo Especial",
        "supplier_id": null
    }, {
        "value": 1832,
        "label": "Chateau De Maligny Chablis Carre de Cesar",
        "supplier_id": 49
    }, {
        "value": 1838,
        "label": "Brunello Di Montalcino San Polo",
        "supplier_id": 44
    }, {
        "value": 1883,
        "label": "Argyle Pinot Noir",
        "supplier_id": 44
    }, {
        "value": 1885,
        "label": "Meldville Syrah",
        "supplier_id": 54
    }, {
        "value": 1889,
        "label": "Rocca delle Macie Roccato IGT",
        "supplier_id": 44
    }, {
        "value": 1891,
        "label": "Amarone Bosan",
        "supplier_id": 44
    }, {
        "value": 1896,
        "label": "Vini Fantini Calalenta IGP Rosato",
        "supplier_id": 44
    }, {
        "value": 1962,
        "label": "Adesso Merlot (House)",
        "supplier_id": 44
    }, {
        "value": 1963,
        "label": "Fantini Pinot Grigio (House)",
        "supplier_id": 44
    }, {
        "value": 1974,
        "label": "St-Germain Elderflower Liqueur",
        "supplier_id": 43
    }, {
        "value": 1975,
        "label": "Dr. McGillicuddys Intense Butterscotch",
        "supplier_id": 43
    }, {
        "value": 1976,
        "label": "Ciroc Pineapple",
        "supplier_id": 43
    }, {
        "value": 1977,
        "label": "1800 Reposado Tequila",
        "supplier_id": 43
    }, {
        "value": 1980,
        "label": "Fireball Cinnamon Whisky",
        "supplier_id": 43
    }, {
        "value": 1985,
        "label": "Steam Whistle Pale Ale",
        "supplier_id": 46
    }, {
        "value": 1986,
        "label": "Johnnie Walker Red Label Scotch Whisky",
        "supplier_id": 43
    }, {
        "value": 1987,
        "label": "Kronenbourg 1664 Blanc",
        "supplier_id": 46
    }, {
        "value": 1988,
        "label": "Dejado Tequila Blanco 100% Agave",
        "supplier_id": 43
    }, {
        "value": 1989,
        "label": "Lost Craft Revivale",
        "supplier_id": 46
    }, {
        "value": 1990,
        "label": "Lost Craft Summer Session Pils",
        "supplier_id": 46
    }, {
        "value": 1992,
        "label": "Bottega Vino Poeti Brut rose (Rose Champagne)",
        "supplier_id": 43
    }, {
        "value": 1993,
        "label": "Solid Ground Chardonnay",
        "supplier_id": 44
    }, {
        "value": 1994,
        "label": "Cape Bleue Rose (Jean-Luc Colombo)",
        "supplier_id": 44
    }, {
        "value": 2013,
        "label": "Caffo Vecchio Amaro Del Capo",
        "supplier_id": 43
    }, {
        "value": 2014,
        "label": "Moët & Chandon Brut Imperial Champagne",
        "supplier_id": 43
    }, {
        "value": 2015,
        "label": "Glenfiddich 18 Year Old Single Malt Scotch Whisky",
        "supplier_id": 43
    }, {
        "value": 2016,
        "label": "Oban Little Bay Single Malt Scotch Whisky",
        "supplier_id": 43
    }, {
        "value": 2025,
        "label": "Gold Series, Vigne Vecchie, Primitivo Di Manduria",
        "supplier_id": 44
    }, {
        "value": 2037,
        "label": "DEI Rosso di Montepulciano",
        "supplier_id": 44
    }, {
        "value": 2039,
        "label": "Villa Bolgheri Tenuta",
        "supplier_id": 44
    }, {
        "value": 2043,
        "label": "Fattoria le Pupille Saffredi",
        "supplier_id": 44
    }, {
        "value": 2045,
        "label": "Zardini Valpolicella Ripasso",
        "supplier_id": 44
    }, {
        "value": 2049,
        "label": "Fantini Montepulciano Dabruzzo",
        "supplier_id": 44
    }, {
        "value": 2051,
        "label": "Brunello di Montalcino La Gerla",
        "supplier_id": 44
    }, {
        "value": 2055,
        "label": "Patron Silver Tequila",
        "supplier_id": 43
    }, {
        "value": 2056,
        "label": "Titos Handmade Vodka",
        "supplier_id": 43
    }, {
        "value": 2058,
        "label": "Brunello Di Montalcino San Polo",
        "supplier_id": 44
    }, {
        "value": 2063,
        "label": "Rubio Toscana IGT",
        "supplier_id": 44
    }, {
        "value": 2065,
        "label": "Sassi Chiusi Toscana",
        "supplier_id": 44
    }, {
        "value": 2085,
        "label": "Rosso di Montalcino; San Polo",
        "supplier_id": 44
    }, {
        "value": 2087,
        "label": "Bricco Carlina Barbera dAsti Superiore Bionzo",
        "supplier_id": 44
    }, {
        "value": 2091,
        "label": "Pouilly-Fuisse Vileilles Vignes",
        "supplier_id": 44
    }, {
        "value": 2093,
        "label": "Bersano Gavi Di Gavi",
        "supplier_id": 44
    }, {
        "value": 2095,
        "label": "2027 Cellars Riesling",
        "supplier_id": 43
    }, {
        "value": 2097,
        "label": "Santa Barbara Winey; Chardonnay",
        "supplier_id": 43
    }, {
        "value": 2103,
        "label": "Empress 1908 Gin",
        "supplier_id": 43
    }, {
        "value": 2111,
        "label": "Galliano",
        "supplier_id": 43
    }, {
        "value": 2112,
        "label": "Tio Pepe Extra Dry Fino",
        "supplier_id": 43
    }, {
        "value": 2133,
        "label": "Chateau De Maligny Chablis Carre de Cesar",
        "supplier_id": 49
    }, {
        "value": 2138,
        "label": "J.Lohr Hilltop Cabernet Sauvignon",
        "supplier_id": 44
    }, {
        "value": 2140,
        "label": "Taylor Fladgate 10-Year-Old Tawny Port",
        "supplier_id": 43
    }, {
        "value": 2141,
        "label": "Cortel Napoleon VSOP Brandy",
        "supplier_id": 43
    }, {
        "value": 2142,
        "label": "Drambuie",
        "supplier_id": 43
    }, {
        "value": 2144,
        "label": "Barolo, Mauro Sebaste Tresuri",
        "supplier_id": 44
    }, {
        "value": 2146,
        "label": "La Spinetta Pin",
        "supplier_id": 44
    }, {
        "value": 2153,
        "label": "Earthquake",
        "supplier_id": 50
    }, {
        "value": 2155,
        "label": "Shiraz, McPherson",
        "supplier_id": 50
    }, {
        "value": 2157,
        "label": "Villa Sandi Prosecco Il Fresco DOC",
        "supplier_id": 44
    }, {
        "value": 2172,
        "label": "Zubr",
        "supplier_id": 43
    }, {
        "value": 2173,
        "label": "Tatra Beer",
        "supplier_id": 43
    }, {
        "value": 2177,
        "label": "Rubesco Vigna Monticchio Torgiano Rosso Riserva DOCG",
        "supplier_id": null
    }, {
        "value": 2186,
        "label": "Amaro Tosolini",
        "supplier_id": 44
    }, {
        "value": 2212,
        "label": "Tedeschi Amarone della Valpolicella",
        "supplier_id": 43
    }, {
        "value": 2214,
        "label": "Castello Del Poggio Moscato",
        "supplier_id": 43
    }, {
        "value": 2215,
        "label": "Prosecco DOC Treviso",
        "supplier_id": 51
    }, {
        "value": 2216,
        "label": "Grappa Sarpa Di Poli",
        "supplier_id": 43
    }, {
        "value": 2217,
        "label": "Solid Ground Pinot Noir",
        "supplier_id": 44
    }, {
        "value": 2219,
        "label": "Solid Ground Riesling",
        "supplier_id": 44
    }, {
        "value": 2221,
        "label": "Bepi Tosolini Arcano Grappa Friulano",
        "supplier_id": 44
    }, {
        "value": 2222,
        "label": "Grappa Rialto",
        "supplier_id": 43
    }, {
        "value": 2223,
        "label": "Sandro Bottega Club Grappa",
        "supplier_id": 43
    }, {
        "value": 2224,
        "label": "Macallan 12 Year Old Double Cask",
        "supplier_id": 43
    }, {
        "value": 2227,
        "label": "Goldschlager",
        "supplier_id": 43
    }, {
        "value": 2228,
        "label": "Havana Club Original 3 Year Old",
        "supplier_id": 43
    }, {
        "value": 2229,
        "label": "Martini Bianco Vermouth",
        "supplier_id": 43
    }, {
        "value": 2230,
        "label": "Metaxa Five Star Brandy",
        "supplier_id": 43
    }, {
        "value": 2231,
        "label": "Berta Valdavi Grappa di Moscato",
        "supplier_id": 63
    }, {
        "value": 2232,
        "label": "Berta Lingera Amaro dErbe",
        "supplier_id": 63
    }, {
        "value": 2238,
        "label": "Evangelista Punch Abruzzo",
        "supplier_id": 43
    }, {
        "value": 2239,
        "label": "Cannonball Cabernet Sauvignon",
        "supplier_id": 49
    }, {
        "value": 2241,
        "label": "Angeline Pinot Noir",
        "supplier_id": 49
    }, {
        "value": 2243,
        "label": "Lungarotti Rubesco Rosso di Torgiano DOC",
        "supplier_id": 44
    }, {
        "value": 2245,
        "label": "Casa Gheller Prosecco",
        "supplier_id": 44
    }, {
        "value": 2247,
        "label": "Labbe Francois Cassis",
        "supplier_id": 43
    }, {
        "value": 2248,
        "label": "Viticoltori Acquesi Brachetto DAcqui",
        "supplier_id": 43
    }, {
        "value": 2249,
        "label": "Ca Del Doge Chianti",
        "supplier_id": 63
    }, {
        "value": 2253,
        "label": "47 Anno Domini Moscato IGT Veneto",
        "supplier_id": 63
    }, {
        "value": 2256,
        "label": "Rizieri - Barolo DOCG",
        "supplier_id": 64
    }, {
        "value": 2258,
        "label": "Col di Lamo - Brunello di Montalcino",
        "supplier_id": 64
    }, {
        "value": 2260,
        "label": "Rizieri - Nebbiolo dAlba DOC",
        "supplier_id": 64
    }, {
        "value": 2263,
        "label": "Nottola - Rosso di Montepulciano DOC",
        "supplier_id": 64
    }, {
        "value": 2265,
        "label": "Concadoro - Chianti Classico Riserva",
        "supplier_id": 64
    }, {
        "value": 2267,
        "label": "Vogadori - Valpolicella Classico Superiore Ripasso",
        "supplier_id": 64
    }, {
        "value": 2269,
        "label": "Lillet Blanc",
        "supplier_id": 43
    }, {
        "value": 2270,
        "label": "Cardhu 12 Year Old Single Malt Scotch Whisky",
        "supplier_id": 43
    }, {
        "value": 2273,
        "label": "Cazadores Reposado Tequila",
        "supplier_id": 43
    }, {
        "value": 2299,
        "label": "Distilleria Montanaro Camomilla Liquore Grappa",
        "supplier_id": 66
    }, {
        "value": 2300,
        "label": "Clase Azul La Pinta Tequilla Pomegranate Liqueur",
        "supplier_id": 66
    }, {
        "value": 2301,
        "label": "Clase Azul Plata Tequila",
        "supplier_id": 66
    }, {
        "value": 2302,
        "label": "Vecchia Cantina Chianti",
        "supplier_id": 66
    }, {
        "value": 2304,
        "label": "Soave Doc Classico",
        "supplier_id": 67
    }, {
        "value": 2306,
        "label": "Amarone della Valpolicella Classico",
        "supplier_id": 66
    }, {
        "value": 2308,
        "label": "Octopoda Cabernet Sauvignon",
        "supplier_id": 65
    }, {
        "value": 2310,
        "label": "CB Chianti DOCG",
        "supplier_id": 65
    }, {
        "value": 2312,
        "label": "Amaro Marzadro",
        "supplier_id": 65
    }, {
        "value": 2314,
        "label": "The Glenlivet 12 Year Old Single Malt Scotch Whisky",
        "supplier_id": 43
    }, {
        "value": 2315,
        "label": "Martini and Rossi Asti",
        "supplier_id": 43
    }, {
        "value": 2316,
        "label": "Sleeman Original Draught",
        "supplier_id": 46
    }, {
        "value": 2317,
        "label": "Sapporo",
        "supplier_id": 46
    }, {
        "value": 2318,
        "label": "La Vieille Ferme Rose Ventoux AOC",
        "supplier_id": 43
    }, {
        "value": 2320,
        "label": "Sleeman Original Draught Keg",
        "supplier_id": 46
    }, {
        "value": 2321,
        "label": "Sapporo Keg",
        "supplier_id": 46
    }, {
        "value": 2322,
        "label": "Barolo Serralunga",
        "supplier_id": 63
    }, {
        "value": 2326,
        "label": "Beer Gas",
        "supplier_id": 68
    }, {
        "value": 2329,
        "label": "Glenrothers 12 Year Old",
        "supplier_id": 43
    }, {
        "value": 2330,
        "label": "Produttori Del Barbaresco Barbaresco DOCG",
        "supplier_id": 49
    }, {
        "value": 2332,
        "label": "Wray & Nephew White Overproof Rum",
        "supplier_id": 43
    }, {
        "value": 2333,
        "label": "Sassetti Livio Pertimali Brunello di Montalcino",
        "supplier_id": 43
    }, {
        "value": 2336,
        "label": "Fantini Chardonnay",
        "supplier_id": 44
    }, {
        "value": 2337,
        "label": "Swish Gin",
        "supplier_id": 44
    }, {
        "value": 2338,
        "label": "True Theory Vodka",
        "supplier_id": 69
    }, {
        "value": 2358,
        "label": "Yarran Shiraz",
        "supplier_id": 49
    }, {
        "value": 2360,
        "label": "Astrolabe Sauvignon Blanc",
        "supplier_id": 49
    }, {
        "value": 2362,
        "label": "Cannonball Chardonnay",
        "supplier_id": 49
    }, {
        "value": 2365,
        "label": "Laphroaig Select Islay Single Malt Scotch Whisky",
        "supplier_id": 43
    }, {
        "value": 2377,
        "label": "Altesino Brunello di Montalcino",
        "supplier_id": 49
    }, {
        "value": 2381,
        "label": "Mohua Sauvignon Blanc",
        "supplier_id": 49
    }, {
        "value": 2383,
        "label": "Maggio Family Vineyards Cabernet Sauvignon",
        "supplier_id": 44
    }, {
        "value": 2390,
        "label": "CA’ROME’ Barbaresco Rio Sordo DOCG",
        "supplier_id": 44
    }, {
        "value": 2393,
        "label": "Precision Napa Valley Cabernet Sauvignon",
        "supplier_id": 63
    }, {
        "value": 2406,
        "label": "Spring Mill Distillery Vodka",
        "supplier_id": 43
    }, {
        "value": 2407,
        "label": "Spring Mill Distillery Gin",
        "supplier_id": 43
    }, {
        "value": 2428,
        "label": "Dashe Cellars Zinfandel Vineyard Select",
        "supplier_id": 49
    }, {
        "value": 2430,
        "label": "Olmeca Altos Plata",
        "supplier_id": 43
    }, {
        "value": 2431,
        "label": "The Glenlivet Caribbean Reserve Single Malt Scotch",
        "supplier_id": 43
    }, {
        "value": 2432,
        "label": "Tequila Rose Strawberry Cream Liqueur",
        "supplier_id": 43
    }, {
        "value": 2436,
        "label": "Stags Leap Winery Cabernet Sauvignon",
        "supplier_id": 43
    }, {
        "value": 2440,
        "label": "Avignonesi Vino Nobile di Montepulciano",
        "supplier_id": 49
    }, {
        "value": 2442,
        "label": "Duckhorn Decoy Cabernet Sauvignon",
        "supplier_id": 49
    }, {
        "value": 2444,
        "label": "Volpaia Chianti Classico Riserva",
        "supplier_id": null
    }, {
        "value": 2446,
        "label": "Buehler Cabernet Sauvignon Napa Valley",
        "supplier_id": 6
    }, {
        "value": 2448,
        "label": "Casamigos Tequila Blanco",
        "supplier_id": 43
    }, {
        "value": 2449,
        "label": "Valpolicella Classico Superiore Ripasso Cicilio DOC",
        "supplier_id": 51
    }, {
        "value": 2451,
        "label": "Sassarello Toscana IGT",
        "supplier_id": 51
    }, {
        "value": 2453,
        "label": "Bersano Barolo, Nirvasco",
        "supplier_id": 44
    }, {
        "value": 2455,
        "label": "Rocca delle Macie Chianti Classico",
        "supplier_id": 44
    }, {
        "value": 2457,
        "label": "J. Lohr Merlot, Los Osos",
        "supplier_id": 44
    }, {
        "value": 2460,
        "label": "J. Lohr Cabernet Sauvignon, Seven Oaks",
        "supplier_id": 44
    }, {
        "value": 2463,
        "label": "Cesari Ripasso, Bosan",
        "supplier_id": 44
    }, {
        "value": 2465,
        "label": "Hill & Blade Lodi Zinfandel",
        "supplier_id": 63
    }, {
        "value": 2467,
        "label": "Col di Lamo - Brunello di Montalcino",
        "supplier_id": 64
    }, {
        "value": 2476,
        "label": "Appleton Estate V/X Signature Blend",
        "supplier_id": 43
    }, {
        "value": 2478,
        "label": "J. Lohr Hilltop Cabernet Sauvignon",
        "supplier_id": 43
    }, {
        "value": 2480,
        "label": "Castelgreve Riserva Chianti Classico",
        "supplier_id": 43
    }, {
        "value": 2482,
        "label": "Castello di Volpaia Riserva Chianti Classico",
        "supplier_id": 43
    }, {
        "value": 2649,
        "label": "Dalwhinnie 15 Year Old Single Highland Malt Scotch Whisky",
        "supplier_id": 43
    }, {
        "value": 2657,
        "label": "test",
        "supplier_id": 43
    }, {
        "value": 2658,
        "label": "test2",
        "supplier_id": 43
    }, {
        "value": 2660,
        "label": "kjhui",
        "supplier_id": 25
    }, {
        "value": 2663,
        "label": "hello",
        "supplier_id": 1
    }, {
        "value": 2667,
        "label": "hello2",
        "supplier_id": 4
    }, {
        "value": 2670,
        "label": "Pineapple Juice",
        "supplier_id": 38
    }, {
        "value": 2671,
        "label": "Lime Juice",
        "supplier_id": 38
    }, {
        "value": 2672,
        "label": "test1212",
        "supplier_id": 3
    }, {
        "value": 2681,
        "label": "test12",
        "supplier_id": 74
    }, {
        "value": 2682,
        "label": "test13",
        "supplier_id": 74
    }, {
        "value": 2686,
        "label": "test133",
        "supplier_id": 74
    }, {
        "value": 2689,
        "label": "ps111",
        "supplier_id": 73
    }];
    $(function() {
        $("#add_item").autocomplete({
            source: function(req, responseFn) {
                var re = $.ui.autocomplete.escapeRegex(req.term);

                var matcher = new RegExp(re + "+", "i");
                var results = $.grep(liquor_prods_sugg, function(item, index) {
                    return matcher.test(item['label']);
                });

                responseFn(results.slice(0, 10));
            },
            select: function(event, ui) {
                if (ui.item.supplier_id == null) // Open the pop-up to select supplier
                    doAfterPartNumPicked(ui.item.value, ui.item.label);
                else {
                    // Supplier id is set, so no need for pop-up
                    var prog = '$do_record = new doRecord("PO_SHORT_LIST") ;' +
                        "\n" + '$new_rec = array() ;' +
                        "\n" + '$new_rec["LNK_SUPPLIER"] = ' + ui.item.supplier_id + ' ;' +
                        "\n" + '$new_rec["LNK_PRODUCT"] = ' + ui.item.value + ' ;' +
                        "\n" + '$new_rec["ORDER_QTY"] = 0 ;' +
                        "\n" + '$do_record -> new_record = $new_rec ;' +
                        "\n" + '$result = $do_record -> insert() ;' +
                        "\n" + 'unset($new_rec) ;' +
                        "\n" + 'unset($do_record) ;' +
                        "\n" + 'if ($result)' +
                        "\n" + ' $prog_result = "location.reload() ;" ;' +
                        "\n" + 'else' +
                        "\n" + ' $prog_result = "alert(\'" . getGlobalMsg() . "\') ;" ;';

                    // console.log("prog:",prog) ; // debug.console
                    runBackEndProg(prog, null, '');
                }
            } // After item picked         
        });

        $(document).on("click", ".btn_delete_slist", function() {
            if (!confirm("Delete this line?"))
                return;

            var po_slist_id = $(this).closest(".po_slist_row").attr("po_slist_id");
            var prog =
                "\n" + '$do_record = new doRecord("PO_SHORT_LIST") ;' +
                "\n" + '$do_record -> id_column_val = ' + po_slist_id + '; ' +
                "\n" + '$do_record -> delete() ; ' +
                "\n" + 'unset($do_record) ;';

            runBackEndProg(prog);
            $(this).closest(".po_slist_row").remove();
        });
    }); // document.ready

    // After we check if pricing already exists for this part number under this
    // supplier, then this fucntion is called to load the relevant page
    function doAfterPartNumPicked(product_id, product_name) {
        var supp_select =
            '<select class="#supp_select_class#">                        <option value="----">----</option><option value="54">Abcon</option><option value="46">Beer Store</option><option value="55">Charton-Hobs</option><option value="57">Churchill Cellars</option><option value="64">Corveste Wines</option><option value="65">Grape Brands Fine Wines and Spirits</option><option value="43">LCBO</option><option value="58">Marram Fine Wines</option><option value="74">parmeshwar</option><option value="73">pavan</option><option value="44">Profile Wine Group</option><option value="49">Rogers and Co</option><option value="63">Stem Wine Group Inc.</option><option value="48">Tawse Winery</option><option value="66">Tre Amici</option><option value="38">Trevi Fountain</option><option value="69">True Theory</option><option value="51">TWC</option><option value="62">Unknown</option><option value="67">Vertical Wine Group</option><option value="56">Victorica Wines</option><option value="52">Violet Hills Wine Imports</option><option value="47">Viva Spumanti</option></select>';
        supp_select = supp_select.replace('#supp_select_class#', 'add_item_supp_select');

        // Create a pop-up where user can add the item user a supplier
        var box = '<div class="add_prod_under_supplier" product_id="' + product_id + '">' +
            '<br /><h3>Add ' + product_name + ' to the list</h3>' +
            '<br /><br />' +
            '<p><label>Supplier:</label> ' + supp_select + '</p>' +
            '<br />' +
            '<span class="btn_add_item_continue small_button">Continue</span>' +
            ' <span class="btn_add_item_cancel small_button">Cancel</span>' +
            '<br /></div>';

        $(box).dialog({
            modal: true,
            width: 420,
            title: 'Add Item under Supplier'
        });
    } // doAfterPartNumPicked

    $(document).on("click", ".btn_add_item_continue", function() {
        var supplier_id = $(".add_item_supp_select").val();
        if (supplier_id == "----") {
            xmlbWarn("Please select the supplier!");
            return;
        }
        var product_id = $(".add_prod_under_supplier").attr("product_id");

        // Build the program to move this record under the newly selected supplier
        prog = '$do_record = new doRecord("PO_SHORT_LIST") ;' +
            "\n" + '$new_rec = array() ;' +
            "\n" + '$new_rec["LNK_SUPPLIER"] = ' + supplier_id + ' ;' +
            "\n" + '$new_rec["LNK_PRODUCT"] = ' + product_id + ' ;' +
            "\n" + '$new_rec["ORDER_QTY"] = 0 ;' +
            "\n" + '$do_record -> new_record = $new_rec ;' +
            "\n" + '$result = $do_record -> insert() ;' +
            "\n" + 'unset($new_rec) ;' +
            "\n" + 'unset($do_record) ;' +
            "\n" + 'if ($result)' +
            "\n" + ' $prog_result = "location.reload() ;" ;' +
            "\n" + 'else' +
            "\n" + ' $prog_result = "alert(\'" . getGlobalMsg() . "\') ;" ;';

        // console.log("prog:",prog) ; // debug.console


        runBackEndProg(prog, null, '');
    });

    $(document).on("click", ".btn_add_item_cancel", function() {
        $(".add_prod_under_supplier").dialog("destroy");
    });
    </script>


    <script type="text/javascript">
    var current_slist_arr;

    $(function() {
        initShortList();
    }); // document.ready

    async function initShortList() {
        $(".lq_slist_wrap").html('<img src="/images/please_wait2.gif" />');

        var request_str = '{"request": "get_current_lq_short_list"}';
        // console.log("request_str:",request_str) ; // debug.console

        let response = await fetch('https://www.royalambassador.ca/common/api.php', {
            method: 'POST' // Needed to pass request
                ,
            body: request_str
        });

        let result = await response.json();
        if (result.outcome == "success") {
            current_slist_arr = result.data;
            sortShortList("by_name");
            showCurrentLiquorSList();
        } else
            xmlbWarn(result.err_msg);
    } // refreshEventTotals

    // Sorts the array
    function sortShortList(sort_type) {
        current_slist_arr.sort(function(a, b) {
            if (sort_type == "by_name") {
                // Make sure to include supplier name so they stay together
                var prod_name_a = a.supplier_name.toLowerCase() + '-' + a.product_name.toLowerCase();
                var prod_name_b = b.supplier_name.toLowerCase() + '-' + b.product_name.toLowerCase();

                if (prod_name_a < prod_name_b)
                    return -1;
                else
                    return 1;
            } else if (sort_type == "by_type") {
                // Make sure to include supplier name so they stay together
                var prod_name_a = a.supplier_name.toLowerCase() + '-' + a.cat_name.toLowerCase() + '-' + a
                    .product_name.toLowerCase();
                var prod_name_b = b.supplier_name.toLowerCase() + '-' + b.cat_name.toLowerCase() + '-' + b
                    .product_name.toLowerCase();

                if (prod_name_a < prod_name_b)
                    return -1;
                else
                    return 1;
            } else if (sort_type == "by_bin_num") {
                // Make sure to include supplier name so they stay together
                var bin_num_a = a.supplier_name.toLowerCase() + '-' + a.bin_number;
                if (bin_num_a == null)
                    bin_num_a = '';

                var bin_num_b = b.supplier_name.toLowerCase() + '-' + b.bin_number;
                if (bin_num_b == null)
                    bin_num_b = '';

                if (bin_num_a < bin_num_b)
                    return -1;
                else
                    return 1;
            }
        });
    } // sortShortList

    function findCurrentlyOpenSupplierId() {
        // Keep currently open tag to open it again
        var open_supplier_id = null;
        $(".supplier_items_wrap").each(function() {
            if ($(this).css("display") != "none") {
                open_supplier_id = $(this).closest(".supplier_warp").attr("supplier_id");
                return false; // break
            }
        });

        return open_supplier_id;
    } // findCurrentlyOpenSupplierId

    function showCurrentLiquorSList() {
        var supp_select =
            '<select class="#supp_select_class#">                        <option value="----">----</option><option value="54">Abcon</option><option value="46">Beer Store</option><option value="55">Charton-Hobs</option><option value="57">Churchill Cellars</option><option value="64">Corveste Wines</option><option value="65">Grape Brands Fine Wines and Spirits</option><option value="43">LCBO</option><option value="58">Marram Fine Wines</option><option value="74">parmeshwar</option><option value="73">pavan</option><option value="44">Profile Wine Group</option><option value="49">Rogers and Co</option><option value="63">Stem Wine Group Inc.</option><option value="48">Tawse Winery</option><option value="66">Tre Amici</option><option value="38">Trevi Fountain</option><option value="69">True Theory</option><option value="51">TWC</option><option value="62">Unknown</option><option value="67">Vertical Wine Group</option><option value="56">Victorica Wines</option><option value="52">Violet Hills Wine Imports</option><option value="47">Viva Spumanti</option></select>';
        supp_select = supp_select.replace('#supp_select_class#', 'supplier_pick');

        var supplier_close_tags = '</div></div></div>';
        var slist_html = '';
        var cur_supplier_id = null;
        for (var i in current_slist_arr) {
            var slist = current_slist_arr[i];

            // Open supplier container when it changes
            if (slist.supplier_id != cur_supplier_id) {
                if (slist_html != '')
                    slist_html += supplier_close_tags;

                slist_html += '<div class="card supplier_warp" supplier_id="' + slist.supplier_id + '"><div>' +
                    '<div class="supplier_header"><input type="checkbox" class="chkbx_supplier" value="' + slist
                    .supplier_id + '">' +
                    ' ' + slist.supplier_name + '</div>';

                // Wrap aroung items that toggles
                slist_html += '<div class="supplier_items_wrap">';

                // Header row
                slist_html += '<div class="po_slist_row header"><span>Name</span><span>On Hand</span>' +
                    '<span>Cases to Order</span><span></span></div>';


                cur_supplier_id = slist.supplier_id;
            }

            // **********************************************************************
            // *********************** Consider Search ******************************

            var txt_search = $.trim($(".txt_search").val());
            if (txt_search != "") {
                var search_found = false;
                txt_search = txt_search.toLowerCase();

                var prod_name = slist.product_name.toLowerCase();
                if (prod_name.indexOf(txt_search) != -1)
                    search_found = true;

                if (!search_found) {
                    if (slist.bin_number != null && slist.bin_number.indexOf(txt_search) != -1)
                        search_found = true;
                }

                if (!search_found)
                    continue;
            }

            // ************************* End of Search ****************************

            var this_row = '<div class="actual_body po_slist_row" po_slist_id="' + slist.po_slist_id + '"' +
                'gn_prod_id="' + slist.gn_prod_id + '" >';

            // Add name and package type
            var prod_name = slist.product_name;
            if (slist.bin_number != null)
                prod_name += ' (Bin #: ' + slist.bin_number + ')';
            this_row +=
                '<span><a href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=' + slist
                .gn_prod_id + '" target="_blank">' +
                prod_name + '</a>';

            // Add purchase price if no vintage. Otherwise it is per vintage
            if (!slist.vintages)
                this_row += ' (P. Price: $' + slist.purchase_price_case + ')';

            this_row += '<br /><strong>Purcahsed In:</strong> ' + slist.package_name + ' <strong>Type:</strong> ' +
                slist.cat_name;
            this_row += '<br /><strong>Move to:</strong> ' + supp_select;
            this_row += '</span>';

            this_row += '<span>';

            if (!slist.vintages) // No vintage, so allow qty per main
            {
                this_row += convertQtyToPacksSingles(slist.qty_on_hand, slist.package_capacity);
                // Show where it is
                if (slist.in_wh_details)
                    this_row += ' ' + inWhDetailsMarkup(slist.in_wh_details, slist.package_capacity);

                this_row += '<br />Use: ' + slist.avg_consume_person_week;
            } // No vintage
            this_row += '</span>';

            // Qty box
            this_row += '<span>';
            if (!slist.vintages) // No vintage, so allow qty per main
            {
                this_row += '<div class="qty_to_order">' +
                    '<input class="qty_count" type="number" min="0" max="999" step="' +
                    (1 / Math.pow(10, slist.decimal_points)) +
                    '" value="' + roundFloat(slist.order_qty, slist.decimal_points) + '"></div>';
            } // No vintage            
            this_row += '</span>';

            // Actions
            this_row += '<span><span class="btn_delete_slist btn"><i class="fas fa-trash-alt"></i></span></span>';

            this_row += '</div>';

            //**************************** Vintages ********************************
            if (slist.vintages) {
                for (var j in slist.vintages) {
                    var this_vntg = slist.vintages[j];

                    var vntg_row = '<div class="actual_body po_slist_row vintage_row"' +
                        ' po_slist_id="' + slist.po_slist_id + '"' +
                        ' gn_prod_id="' + slist.gn_prod_id + '"' +
                        ' vntg_prod_id="' + this_vntg.gn_prod_id + '">';

                    vntg_row += '<span>Vintage: ' + this_vntg.vintage;
                    vntg_row += ' (P. Price: $' + this_vntg.purchase_price_case + ')';
                    vntg_row += '</span>';

                    // Show in stock
                    var in_wh_details = '';
                    if (this_vntg.in_wh_details)
                        in_wh_details = ' ' + inWhDetailsMarkup(this_vntg.in_wh_details, slist.package_capacity);
                    vntg_row += '<span>' +
                        convertQtyToPacksSingles(this_vntg.qty_on_hand, slist.package_capacity) +
                        in_wh_details +
                        '</span>';

                    vntg_row += '<span><div class="qty_to_order">' +
                        '<input class="qty_count" type="number" min="0" max="999" step="' +
                        (1 / Math.pow(10, slist.decimal_points)) +
                        '" value="' + roundFloat(this_vntg.order_qty, slist.decimal_points) + '">' +
                        '</div></span>';

                    vntg_row += '</div>';

                    this_row += '<hr />' + vntg_row;
                }
            } // There is vintage

            // ************************ End of Vintages ****************************

            if (slist.vintages)
                this_row = '<div class="slist_vintage_wrap">' + this_row + '</div>';


            // Add to final html            
            slist_html += this_row;
        } // Each slist array

        // Close if any supplier box not closed  
        if (slist_html != '')
            slist_html += supplier_close_tags;

        animateShow($(".lq_slist_wrap"), slist_html);
        handleQtyUpDown();
    } // showCurrentLiquorSList

    // Converts qty hand to packages and singles
    function convertQtyToPacksSingles(qty, pkg_capacity) {
        qty = roundFloat(qty);
        pkg_capacity = roundFloat(pkg_capacity);

        var result = qty;
        if (pkg_capacity > 1)
            result = qty + ': ' + Math.floor(qty / pkg_capacity) + ' / ' + qty % pkg_capacity;

        return result;
    } // convertQtyToPacksSingles

    function inWhDetailsMarkup(in_wh_details, package_capacity) {
        var wh_details = '<span class="q_tip"><i class="fas fa-info-circle"></i></span>' +
            '<div class="qtip_content">';
        for (var in_wh in in_wh_details) {
            wh_details += '<p>' + convertQtyToPacksSingles(in_wh_details[in_wh].cur_qty, package_capacity) +
                ' @ ' + in_wh_details[in_wh].level_code + '</p>';
        }
        wh_details += '</div>';

        return wh_details;
    } // inWhDetailsMarkup
    </script>

    <style type="text/css">
    .q_tip {
        font-size: 1em;
        color: #F7941E;
    }
    </style>






    <script type="text/javascript">
    (function($) {
        if (jQuery().azbSingleChoice)
            return; // Do not reload


        $.fn.azbSingleChoice = function(options, set_val) {
            var settings = {
                easing: 300 // Used when sliding up/down
            };

            if (typeof options == "object") {
                settings = $.extend(settings, options);
            }
            var this_obj = this; // Keep the reference

            // ************************* Define Methods ************************

            this_obj.set = function(new_val) {
                // Remove selected from the other options
                this_obj.find("> span.selected").each(function() {
                    $(this).removeClass("selected");
                    $(this).find(".fa-check").remove();
                });

                // Select the one with the new_val if not null
                if (new_val != null) {
                    var to_select = this_obj.find("> span[value='" + new_val + "']");
                    if (to_select.length != 0 && !to_select.hasClass("selected")) {
                        to_select.html('<i class="fas fa-check"></i> ' + to_select.html());
                        to_select.addClass('selected');
                    }
                }
            } // set

            this_obj.get = function() {
                var result = null;

                var selected = this_obj.find("> span.selected");
                if (selected.length != 0)
                    result = selected.attr("value");
                return result
            } // get

            this_obj.getText = function() {
                var result = null;

                var selected = this_obj.find("> span.selected");
                if (selected.length != 0)
                    result = selected.text();
                return result
            } // getText

            // ************************* End of Define Methods ************************

            // If no options passed or option is an object, it means we are just building the plugin
            // After that, options are set one by one as string
            if (!options || typeof options == "object") {
                // *************************** Build & Initialize ***************************

                return this_obj.each(function() {
                    $(this).addClass("azbd_single_choice");
                    $(this).addClass("enabled"); // Assume enabled

                    if (!settings.choices || settings.choices.length == 0)
                        console.error(
                            'Azarbod: choices not set or are empty in call to azbSingleChoice');

                    // Create the mark up
                    var markup = '';
                    for (var i in settings.choices) {
                        var this_choice = settings.choices[i]; // Shorten syntax
                        if (typeof this_choice == "string") {
                            // Use the string as both show string and value
                            var option_val = this_choice;
                            var option_show = this_choice;
                        } else {
                            // There is separate value and text
                            var option_val = this_choice.value;
                            var option_show = xmlbDecodeFromAJAX(this_choice.text);
                        }
                        if (typeof option_val == "string")
                            option_val = option_val.replace(/"/g, ''); // Remove " in case

                        markup += '<span value="' + option_val + '">' + option_show + '</span>';
                    }
                    $(this).html(markup);

                    // **************** Handle User Clicks ***********************
                    $(this).find("> span").bind("click", function(event) {
                        var parent = $(this).parent();
                        if (parent.hasClass("disabled"))
                            return; // Disabled, so do nothing

                        if ($(this).hasClass("selected"))
                            return; // Already selected

                        parent.azbSingleChoice("set", $(this).attr("value"));

                        // Run on change if any
                        if (settings.onChange)
                            settings.onChange($(this).attr("value"), $(this).parent());

                        event.stopPropagation();
                    }); // Click 

                    // Set itintial val
                    if ('init_val' in settings)
                        this_obj.set(settings.init_val);
                }); // Each selector 
            }

            // ************************* Handle Method Calls ******************
            else if (options && options == "get") {
                return this_obj.get()
            } // get
            else if (options && options == "getText") {
                return this_obj.getText()
            } // getText
            else if (options && options == "set") {
                this_obj.set(set_val);

                return;
            } // set
            else if (options && options == "disable") {
                this_obj.removeClass("enabled");
                this_obj.addClass("disabled");

                return;
            } // disable
            else if (options && options == "enable") {
                this_obj.removeClass("disabled");
                this_obj.addClass("enabled");

                return;
            } // enable
            else if (options && options == "clear") {
                this_obj.set(null);

                return;
            } // clear

            // ************************* End of Method Calls ******************
        } // $.fn.azbPaneToggle
    }(jQuery));

    // ******************************** Single-Choice (End) *********************************
    // *************************************************************************************
    </script>

    <style type="text/css">
    .azbd_single_choice>span {
        background: #464040;
        border-radius: .3em;
        text-align: center;
        display: inline-block;
        padding: .3em;
        color: #FFF;
        margin: .06em;
    }

    .azbd_single_choice.enabled>span {
        cursor: pointer;
    }

    .azbd_single_choice.disabled>span {
        cursor: #888;
    }

    .azbd_single_choice span.selected {
        background: #34A853;
    }
    </style>


    <script type="text/javascript">
    $(function() {
        // When user clicks on a category, open or close the items under it
        $(document).off("click", ".supplier_header");
        $(document).on("click", ".supplier_header", function() {
            var items_wrap = $(this).closest(".supplier_warp").find(".supplier_items_wrap");
            if (items_wrap.css("display") == "none") {
                // Close others if any
                $(".supplier_items_wrap").each(function() {
                    if ($(this).css("display") != "none") {
                        $(this).slideUp(200);
                        return false; // break. There can be only one open at a time
                    }
                });
                items_wrap.slideDown(200);
            } else
                items_wrap.slideUp(200);
        });

        // ***************** Re-generate
        $(document).on("click", "#btn_regenerate", function() {
            if (!confirm("Re-generate the short list?"))
                return false;

            runBackEndProg('generateDefPurchaseShortList() ;', null, 'location.reload() ;');
        });

        // ***************** Perform the search
        $(document).on("change", ".txt_search", function() {
            var open_supplier_id = findCurrentlyOpenSupplierId();

            showCurrentLiquorSList();

            if (open_supplier_id != null) {
                $(".supplier_warp[supplier_id=" + open_supplier_id + "]").find(".supplier_items_wrap")
                    .slideDown(200);
            }
        });

        // ***************** Clear the search
        $(document).on("click", ".btn_clear_search", function() {
            var open_supplier_id = findCurrentlyOpenSupplierId();

            $(".txt_search").val("");
            showCurrentLiquorSList();

            // Open the previously open supplier
            if (open_supplier_id != null) {
                $(".supplier_warp[supplier_id=" + open_supplier_id + "]").find(".supplier_items_wrap")
                    .slideDown(200);
            }
        });

        $(".btn_sort_wrap").azbSingleChoice({
            choices: [{
                value: "by_name",
                text: "By Name"
            }, {
                value: "by_type",
                text: "By Type"
            }, {
                value: "by_bin_num",
                text: "By Bin #"
            }],
            init_val: "by_name",
            onChange: function(new_option, obj) {
                var open_supplier_id = findCurrentlyOpenSupplierId();

                sortShortList(new_option);
                showCurrentLiquorSList();

                // Open the previously open supplier
                if (open_supplier_id != null) {
                    $(".supplier_warp[supplier_id=" + open_supplier_id + "]").find(
                        ".supplier_items_wrap").slideDown(200);
                }
            }
        });
    }); // document.ready

    // Tablet and mobile friendly jQuery function with + and - button incorporated to the input number field for each goods
    // that are part of the inventory
    // Max and min values can be set in the HTML input field
    function handleQtyUpDown() {
        jQuery(
                '<div class="qty_nav"><div class="qty_button qty_up">+</div><div class="qty_button qty_down">-</div></div>')
            .insertAfter('.qty_to_order input');
        jQuery('.qty_to_order').each(function() {
            var spinner = jQuery(this),
                input = spinner.find('input[type="number"]'),
                btn_up = spinner.find('.qty_up'),
                btn_down = spinner.find('.qty_down'),
                min = input.attr('min'),
                max = input.attr('max');

            btn_up.click(function() {
                var old_string = input.val();
                var old_value = parseFloat(old_string);
                var str_length = old_string.length;

                // Verify that the input value is not an empty string. 
                // If it is then convert the value to -1 (and +1 added to it in next operation will give 0)
                if (str_length == 0) {
                    old_value = old_value || -1;
                }
                // If the value is not max then add +1 onClick
                if (old_value >= max) {
                    var new_val = old_value;
                } else {
                    var new_val = old_value + 1;
                }
                spinner.find("input").val(new_val);
                spinner.find("input").trigger("change");

                //Function changing the "Save Values" button to red
                warnToSave()

            });

            btn_down.click(function() {
                var old_string = input.val();
                var old_value = parseFloat(old_string);
                var str_length = old_string.length;

                // Verify that the input value is not an empty string. 
                // If it is then convert the value to 1 (and -1 added to it in next operation will give 0)
                if (str_length == 0) {
                    old_value = old_value || 1;
                }

                // If the value is not min then substract 1 onClick
                if (old_value <= min) {
                    var new_val = old_value;
                } else {
                    var new_val = old_value - 1;
                }

                spinner.find("input").val(new_val);
                spinner.find("input").trigger("change");

                //Function changing the "Save Values" button to red
                warnToSave()

            });

            // If any key is pressed to enter/change the input number
            $('.qty_count').bind('keyup', function() {
                //Function changing the "Save Values" button to red
                warnToSave()
            });
        });
    } // handleQtyUpDown 
    </script>


    <style type="text/css">
    .lq_slist_wrap .po_slist_row {
        display: grid;
        grid-template-columns: 6fr 1fr 1fr 1fr;
        margin: .3em 0;
        border: .1em solid #000;
        padding: .5em;
    }

    .slist_vintage_wrap hr {
        border: .1em solid #e32020;
        width: 95%;
    }

    .slist_vintage_wrap .po_slist_row {
        border: 0;
    }

    .slist_vintage_wrap {
        border: .1em solid #000;
        margin: .3em 0;
    }

    .lq_slist_wrap .po_slist_row>span {
        font-size: 1.6em;
        bac kground: #EEE8E8;
    }

    .po_slist_row.header {
        background: green;
        padding-top: 6px;
        padding-bottom: 6px;
        padding-left: 6px;
        padding-right: 6px;
    }

    .po_slist_row.header span {
        color: #FFF;
        font-size: 20px;
    }

    .supplier_items_wrap {
        display: none;
    }

    .supplier_header {
        cursor: pointer;
        margin: .5em 0;
        font-size: 1.8em;
        color: #99001E;
    }

    .order_qty {
        width: 6em;
    }

    #po_short_list label {
        font-size: 20px;
        font-weight: normal;
        float: none;
    }

    .button {
        color: #fff;
        padding: 6px;
        margin: 6px;
        border-radius: 6px;
        font-weight: bold;
        font-size: 20px;
        cursor: pointer;
        background: -webkit-linear-gradient(top, #c5d0d8 0%, #1f2265 100%);
    }

    .btn {
        font-size: 1.5em;
    }

    .empty_po {
        width: 60%;
    }

    input[type="submit"] {
        margin: 6px;
        padding: 6px;
    }

    .supplier_id {
        font-size: 20px;
        font-weight: normal;
    }

    #po_short_lists_apply_filter {
        font-size: 20px;
    }

    #po_short_lists_clear_filter {
        font-size: 20px;
    }

    #new_purchase_order_lnk_supplier {
        font-size: 20px;
    }

    #new_purchase_order_po_date {
        font-size: 20px;
    }

    #new_purchase_order_date_required {
        font-size: 20px;
    }

    #po_short_lists_clear_filter {
        font-size: 20px;
    }

    #po_short_lists_PRODUCT_NAME {
        font-size: 20px;
        font-weight: normal;
    }

    #po_short_lists_LNK_SUPPLIER {
        font-size: 20px;
        font-weight: normal;
    }

    #po_short_lists_PRODUCT_NAME {
        font-size: 20px;
        font-weight: normal;
    }

    .hasDatepicker {
        width: 5.5em;
    }

    .move_to_supplier span {
        cursor: pointer;
    }
    .small_button, .ui-dialog-content .small_button {
        background: #F7941E;
        font-weight: bold;
        cursor: pointer;
        font-size: 12px;
        text-align: center;
        padding: 3px 6px 3px 6px;
        color: #FFF;
        display: inline-block;
        margin: .2em .4em 0 0;
    }
    </style>
</span>
@endsection