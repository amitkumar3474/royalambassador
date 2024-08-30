@extends('admin.layouts.master')
@section('title', 'Liquor Bars')
@section('style')
<style>
.svg-inline--fa {
    display: var(--fa-display, inline-block);
    height: 1em;
    overflow: visible;
    vertical-align: -.125em;
}

.small_button,
.ui-dialog-content .small_button {
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

.top_right_bar {
    top: 299px;
    right: -325px;
    position: fixed;
    transform: rotate(-90deg);
    background: rgba(209, 214, 210, 0.6);
    border: 1px solid #575C63;
    border-bottom: 0;
    text-align: center;
    padding: .2em 1.5em 0 1.5em;
}

.big_button,
input[type=submit].big_button {
    background: #F7941E;
    font-weight: bold;
    font-size: 15px;
    text-align: center;
    padding: 8px 15px 7px 15px;
    color: #FFF;
    display: inline-block;
    margin: .4em .8em 0 0;
}

.big_button:hover,
.small_button:hover,
input[type=submit].big_button:hover {
    background: #EC5816;
    cursor: pointer;
}
</style>
@endsection
@section('content')
<div id="main_content">

    <script type="text/javascript">
    // Numeric control that contains spinners (+/-), numeric pad and full (battery) gadgets       
    (function($) {
        $.fn.azbNumberPlugin = function(options) {
            var settings = {
                add_plus_minus: true,
                add_full_qty: false,
                add_num_pad: true,
                step: 1,
                validateBefore: function() {
                    return true;
                },
                runAfter: function() {}
            };

            if (typeof options == "object") {
                settings = $.extend(settings, options);
            }

            return this.each(function() {
                var this_input = $(this);

                // First wrap the element so when user clicks on a sign, we can traverse from parent 
                // the input
                this_input.wrap('<span class="azbd_number_wrap"></span>');

                // ******************************** Full Qty *****************************

                // Add full qty if option is not set to false
                if (settings.add_full_qty) {
                    var full_qty = $(
                        '<span class="azbd_full_qty"><i class="fas fa-battery-full"></i></span>');
                    this_input.after(full_qty);

                    // Handle full qty when clicked
                    full_qty.click(function(event) {
                        this_input.val(this_input.attr("full_qty"));
                        settings.runAfter(this_input);
                    });
                }

                // ************************ +/- Spinners ***********************************


                if (settings.add_plus_minus) {
                    var up_spinner = $(
                        '<span class="azbd_spinner" dir="up"><i class="fas fa-plus"></i></span>');
                    var down_spinner = $(
                        '<span class="azbd_spinner" dir="down"><i class="fas fa-minus"></i></span>');
                    this_input.after(up_spinner);
                    this_input.after(down_spinner);

                    // Handle + spinner
                    up_spinner.click(function(event) {
                        // Calculate new value
                        var cur_val = $.trim(this_input.val());
                        if (cur_val == "" || isNaN(cur_val))
                            cur_val = 0;
                        else
                            cur_val = parseFloat(cur_val);
                        var new_val = cur_val + settings.step;

                        // Make sure it does not go beyond max
                        if (this_input.hasAttr("max") && new_val > this_input.attr("max"))
                            new_val = this_input.attr("max");

                        if (!settings.validateBefore(this_input, new_val))
                            return; // Do nothing if not validated

                        this_input.val(new_val);
                        settings.runAfter(this_input);
                    }); // Up spinner

                    // Handle - spinner
                    down_spinner.click(function(event) {
                        // Calculate new value
                        var cur_val = $.trim(this_input.val());
                        if (cur_val == "" || isNaN(cur_val))
                            cur_val = 0;
                        else
                            cur_val = parseFloat(cur_val);
                        var new_val = cur_val - settings.step;

                        // Make sure it does not go below min
                        if (this_input.hasAttr("min") && new_val < this_input.attr("min"))
                            new_val = this_input.attr("min");

                        if (!settings.validateBefore(this_input, new_val))
                            return; // Do nothing if not validated

                        this_input.val(new_val);
                        settings.runAfter(this_input);
                    }); // Down spinner

                } // There are +/- spinner

                // ********************************* Number Pad ****************************

                // Add numeric keypad
                if (settings.add_num_pad == true) {
                    var num_pad_icon = $('<img src="/images/icon_numeric_pad.png" \
                                                              class="btn_open_number_pad" />');
                    this_input.after(num_pad_icon);


                    num_pad_icon.click(function() {
                        this_input.val(0); // Reset the value first
                        settings.runAfter(this_input);

                        // Create number keypad
                        var num_pad =
                            '<span class="key number" value="1">1</span> \
                         <span class="key number" value="2">2</span> \
                         <span class="key number" value="3">3</span> \
                         <span class="key delete" value="delete"><i class="fas fa-trash-alt"></i></span> \
                         <span class="key number" value="4">4</span> \
                         <span class="key number" value="5">5</span> \
                         <span class="key number" value="6">6</span> \
                         <span class="key enter" value="enter"><br /><i class="fas fa-check"></i></span> \
                         <span class="key number" value="7">7</span> \
                         <span class="key number" value="8">8</span> \
                         <span class="key number" value="9">9</span> \
                         <span class="key number" value="0">0</span> \
                         <span class="key number" value=".">.</span> \
                         <span class="num_pad_display">0</span>'; // This one keeps the result so user can easily see

                        // Wrap it and add to the pop-up dialog
                        num_pad = $('<div class="num_pad_wrap"><div class="num_pad_keys">' +
                            num_pad + '</div></div>');
                        num_pad.dialog({
                            title: "Number Pad",
                            dialogClass: 'num_pad_wrap',
                            modal: true
                        });

                        // Bind the key click to each number under it
                        num_pad.find(".key").bind("click", function() {
                            var key_val = $(this).attr("value");

                            // Handle different key
                            if (key_val == "delete") {
                                this_input.val('');
                                num_pad.find('.num_pad_display').text(
                                '0'); // Also clear display
                                settings.runAfter(this_input);
                            } else if (key_val == "enter")
                                num_pad.dialog("destroy")
                            .remove(); // Cancelled or all good, close dialog
                            else {
                                // Either a digit or decimal point clicked
                                if (this_input.val() == 0)
                                    new_value =
                                    key_val; // Make sure it does not show 09
                                else
                                    new_value = this_input.val() + key_val;

                                this_input.val(parseFloat(new_value));
                                num_pad.find('.num_pad_display').text(
                                new_value); // Also show on display
                                settings.runAfter(this_input);
                            }
                        });
                    }); // Numeric pad  
                }

                // ***************************** End of Number Pad **************************

            }); // Each selector 
        } // $.fn.azbNumberPlugin
    }(jQuery)); // End of azbNumberPlugin
    </script>

    <style type="text/css">
    .btn_open_number_pad {
        max-width: 1.4em;
        margin: 0 0 -.22em .8em;
        cursor: pointer;
    }

    .num_pad_keys .key {
        font-size: 1.9em;
        border-radius: .2em;
        vertical-align: middle;
        text-align: center;
        padding: .1em;
        cursor: pointer;
        background: #FFF;
    }

    .num_pad_keys .key[value="0"] {
        grid-column: 1 / span 2;
    }

    .num_pad_keys .key[value="enter"] {
        grid-column: 4;
        grid-row: 2 / span 3;
    }

    .num_pad_keys {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr;
        grid-gap: .4em;
        padding: .3em;
    }

    .num_pad_wrap {
        background: #000;
    }

    .ui-dialog .ui-dialog-content {
        padding: 0;
    }

    .num_pad_display {
        display: block;
        font-size: 1.5em;
        background: #666;
        width: 428%;
        text-align: right;
        padding: .1em;
        color: #DCDCDC;
    }

    .azbd_spinner[dir] {
        color: #F7941E;
        cursor: pointer;
        font-size: 2.9em;
        margin: .2em;
    }
    </style>





    <span id="open_bars" class="xmlb_form">
        <div class="card" style="position: relative;">
            <div>
                <div id="new_bar_wrap"></div>

                <div id="return_empties_wrap" class="card ui-droppable">
                    <div>
                        Empties
                        <br><svg class="svg-inline--fa fa-trash" aria-hidden="true" focusable="false" data-prefix="fas"
                            data-icon="trash" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                            data-fa-i2svg="">
                            <path fill="currentColor"
                                d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z">
                            </path>
                        </svg><!-- <i class="fas fa-trash"></i> Font Awesome fontawesome.com -->
                    </div>
                </div>

                <div id="open_bars_wrap"></div>
            </div>
        </div>


        <script type="text/javascript">
        var bartenders = [{
            id: 37,
            name: "Agency--sp------"
        }, {
            id: 40,
            name: "Bartender--sp------"
        }, {
            id: 58,
            name: "Edgar--sp--Unkown"
        }, {
            id: 66,
            name: "DJ--sp--Antinucci"
        }];

        $(function() {
            // Wait enough for the ajax vars to be initialized
            setTimeout('initOpenBars() ;', 100);
        }); // document.ready

        // Request the initial demand by sales order and show on screen
        function initOpenBars() {
            runStoredProcedure("open_bars", "liquor_bar_console", "json_get_liquor_bars", 'bar_status=O',
                "openBarsFirstTimeShow('#sproc_result#') ;");
        } // initOpenBars
        </script>


        <script type="text/javascript">
        // Keeps the returned records as array of json objects
        var open_bars_arr;

        // Initialize the bars array and show on screens
        function openBarsFirstTimeShow(return_data) {
            open_bars_arr = JSON.parse(return_data);
            refreshOpenBars();
        } // openBarsFirstTimeShow


        // Show open bars on screen 
        function refreshOpenBars() {
            $("#open_bars_wrap").html('');

            for (var i in open_bars_arr.lqbars) {
                var cur_bar = open_bars_arr.lqbars[i]; // Shorten syntax
                showBarOnScreen(cur_bar.lqbar_id, cur_bar.bartender_id, cur_bar.room_name, cur_bar.event_id, cur_bar
                    .customer, cur_bar.event_type, cur_bar.event_date, cur_bar.guests);
            } // Each product 
        } // refreshOpenBars

        function showBarOnScreen(lqbar_id, bartender_id, room_name, event_id, customer, event_type, event_date,
        guests) {
            var bar = '<div class="bar_wrap" lqbar_id="' + lqbar_id + '" event_id="' + event_id + '">';

            // Link event id
            event_link = '<a href="https://www.royalambassador.ca/db_event/event_view.php?event_id=' + event_id +
                '" target="_blank">' +
                event_id + '</a>';

            // Make sure customer name is not too long
            if (customer.length > 38)
                customer = customer.substring(1, 35) + '...';

            bar += '<span class="room_name">' + room_name + '</span>' +
                '<br /><span class="bartender" bartender_id="' + bartender_id + '">' +
                findBartenderName(bartender_id) + '</span>' +
                '<br />' + customer + '<br />' + event_type +
                '<br />' + event_link + ' ' + event_date + '<br />Guests: ' + guests;


            bar += '</div>';

            $("#open_bars_wrap").append(bar);
        } // showBarOnScreen

        // Finds the name of the bartender in the array
        function findBartenderName(bartender_id) {
            var result = null;

            for (var i in bartenders) {
                if (bartenders[i].id == bartender_id) {
                    result = xmlbDecodeFromAJAX(bartenders[i].name);
                    break;
                }
            }

            return result;
        } // findBartenderName
        </script>

        <style type="text/css">
        #open_bars_wrap {
            display: grid;
            grid-template-columns: 19.8% 19.8% 19.8% 19.8% 19.8%;
        }

        .bar_wrap {
            padding: .8em 1.1em;
            box-shadow: 0 0 5px 2px rgba(0, 0, 0, .35);
            height: 9.8em;
            line-height: 150%;
            cursor: pointer;
            font-size: 1.1em;
            overflow: hidden;
            margin: .1em;
        }

        .bar_wrap>span {
            font-size: 1.4em;
            font-weight: bold;
        }

        .bar_wrap.picked,
        .bar_wrap.picked span,
        .bar_wrap.picked a {
            color: #FFF;
            background: #9d8c4d;
        }
        </style>



        <script type="text/javascript">
        $(function() {
            $(document).on("click", ".btn_edit_bar", function() {
                // Find the currently picked bar
                var lqbar_id = $(".bar_wrap.picked").attr("lqbar_id");
                if (!lqbar_id) {
                    xmlbWarn("Please first select the bar to edit!");
                    return;
                }
                openDialogToEditBar(lqbar_id);
            });

            $(document).on("click", ".btn_bar_edit_cancel", function() {
                $(".bar_edit_box").dialog("destroy");
            });

            // Save the editted bar
            $(document).on("click", ".btn_bar_edit_continue", function() {
                var bartender_id = $("#bartender_dd").val();
                if (bartender_id == "----") {
                    xmlbWarn("Please select the bartender!");
                    return;
                }

                lqbar_id = $(this).attr("lqbar_id");

                var prog = "\n" + "\n" + '$new_rec = array() ;' +
                    "\n" + '$new_rec["LNK_BARTENDER"] = ' + bartender_id + ' ;' +
                    "\n" + '$do_record = new doRecord("LIQUOR_BAR") ;' +
                    "\n" + '$do_record -> new_record = $new_rec ;' +
                    "\n" + '$do_record -> id_column_val = ' + lqbar_id + '; ' +
                    "\n" + '$do_record -> update() ;' +
                    "\n" + 'unset($new_rec) ;' +
                    "\n" + 'unset($do_record) ;';
                runBackEndProg(prog);

                // Show the new bartender on screen. We assume it all works out which is the case
                var bar_wrap = $(".bar_wrap[lqbar_id=" + lqbar_id + "]");
                var bartender_wrap = bar_wrap.find('.bartender');
                bartender_wrap.attr("bartender_id", bartender_id);
                bartender_wrap.text(findBartenderName(bartender_id));

                $(".bar_edit_box").dialog("destroy");
            });
        }); // document.ready

        // Opens a dialog so user can edit a bar after it is open
        function openDialogToEditBar(lqbar_id) {
            // Open the popup 
            var bar_edit_box = '<div class="bar_edit_box card" lqbar_id="' + lqbar_id + '"><div>';

            // Show the bar to close name
            var bar_wrap = $(".bar_wrap[lqbar_id=" + lqbar_id + "]");
            var lqbar_name = bar_wrap.find('.room_name').text() +
                ' / ' + bar_wrap.find('.bartender').text();
            bartender_id = bar_wrap.find('.bartender').attr("bartender_id");

            bar_edit_box += '<h2>Edit Bar: ' + lqbar_name + '</h2><hr /><br />';

            // Add bartender dropdown
            var bartender = '<select id="bartender_dd">' +
                '<option value="----">----</option>';
            for (var i in bartenders) {
                bartender += '<option value="' + bartenders[i].id + '"';
                if (bartenders[i].id == bartender_id)
                    bartender += ' selected="selected"';
                bartender += '>' + xmlbDecodeFromAJAX(bartenders[i].name) + '</option>';
            }
            bartender += '</select>';
            bar_edit_box += '<p><label>Bartender:</label>' + bartender + '</p>';


            // Add the buttons
            bar_edit_box += '<p><span class="btn_bar_edit_continue big_button" lqbar_id="' + lqbar_id +
                '">Continue</span>' +
                ' <span class="btn_bar_edit_cancel big_button">Cancel</span></p>';

            bar_edit_box += '</div></div>';

            $(bar_edit_box).dialog({
                modal: true,
                width: 640,
                title: 'Edit Bar'
            });

        } // openDialogToEditBar  
        </script>

        <style type="text/css">
        .edit_bar
        </style>


        <script type="text/javascript">
        var rooms_array = [{
            id: 4,
            name: "CONSERVATORY"
        }, {
            id: 5,
            name: "CONSULATE"
        }, {
            id: 8,
            name: "EMBASSY"
        }, {
            id: 1,
            name: "EMBASSY EAST"
        }, {
            id: 2,
            name: "EMBASSY WEST"
        }, {
            id: 3,
            name: "GREENHOUSE"
        }, {
            id: 9,
            name: "GROUNDS"
        }, {
            id: 11,
            name: "LAKESIDE GAZEBO"
        }, {
            id: 13,
            name: "Lawn Area (South of Greenhouse parking lot)"
        }, {
            id: 6,
            name: "LIBRARY"
        }, {
            id: 7,
            name: "TERRACE GAZEBO"
        }];
        $(function() {
            $(document).on("click", ".btn_open_new_bar", function() {
                // Get this weeks events to show on screen
                runStoredProcedure("open_bars", "liquor_bar_console", "json_get_this_week_events", null,
                    "openNewBarBox('#sproc_result#') ;");
            });

            // Handle pick / unpick this event to create bar
            $(document).on("click", ".btn_pick_this_event, .event_type", function() {
                var parent_row = $(this).closest("p.actual_body");

                // Highlight this row
                $(".new_bar_wrap p.actual_body").removeClass("picked");
                parent_row.addClass("picked");

                // Also populate the rooms drop-down with only from the rooms that are in that
                // event
                var new_rooms = '<option value="----">----</option>';
                var this_room_ids = parent_row.attr("room_ids").split(",");
                for (var i in this_room_ids) {
                    // Find the room name from rooms_array
                    room_name = '** Erroro- Room not Found **'; // This can not happen. Just in case
                    for (var j in rooms_array) {
                        if (rooms_array[j].id == this_room_ids[i]) {
                            room_name = rooms_array[j].name;
                            break;
                        }
                    }

                    new_rooms += '<option value="' + this_room_ids[i] + '">' +
                        room_name + '</option>';
                }

                $("#bar_room_id").html(new_rooms);
            });

            // Handle cancel bar
            $(document).on("click", ".btn_new_bar_cancel", function() {
                closeNewBarScreen();
            });
        }); // document.ready

        function closeNewBarScreen() {
            $(".new_bar_wrap").slideUp(200, function() {
                $(".new_bar_wrap").remove();
            });
        } // closeNewBarScreen

        // Creates and shows the box that allows user to create a new bar
        var this_week_events;

        function openNewBarBox(return_data) {
            this_week_events = JSON.parse(return_data);

            var new_bar = '<div class="new_bar_wrap card"><div>' +
                '<h2>Open New Bar</h2>';

            // Add the header row
            new_bar += '<p class="header actual_body"><span></span><span>Event Id</span>' +
                '<span></span><span>Event Type</span><span></span><span>Date</span><span>Customer</span>' +
                '<span>Guests</span><span>Room</span></p>';

            // Show this week events so user can pick
            var row_num = 1;
            for (var i in this_week_events) {
                var this_event = this_week_events[i]; // Shorten syntax

                var event_show =
                    '<a target="_blank" href="https://www.royalambassador.ca/db_event/event_view.php?event_id=' +
                    this_event.event_id + '">' +
                    this_event.event_id + '</a>';
                new_bar += '<p class="actual_body" event_id="' + this_event.event_id + '"' +
                    ' room_ids="' + this_event.room_ids + '">' +
                    '<span>' + row_num + ')</span><span> ' + event_show + '</span>';

                // Add a checkbox at the end so user can click and pick the event
                new_bar += '<span class="btn_pick_this_event"><i class="fas fa-check-circle"></i></span>';

                // Add events more info
                new_bar += '<span class="event_type">' + this_event.event_type + '</span>';

                // Add an icon so user can check the bar requirement right here
                new_bar += '<span class="bar_to_open_info"><i class="fas fa-info-circle"></i></span>';

                new_bar += '<span class="event_date">' + this_event.event_date + '</span>';
                new_bar += '<span class="customer">' + this_event.customer.replace(/--dq--/g, '"') + '</span>';
                new_bar += '<span class="guests">' + this_event.guests + '</span>';
                new_bar += '<span class="guests">' + this_event.rooms.replace(/--dq--/g, '"') + '</span>';

                // Close the row
                new_bar += '</p>';

                row_num++;
            } // Each event

            // Add other required info so user can pick and create the bar
            new_bar += '<br />' + $(".bar_info_more").html();

            new_bar += '<div><span class="big_button btn_new_bar_continue">Continue</span>' +
                '<span class="big_button btn_new_bar_cancel">Cancel</span></div>';

            new_bar += '</div></div>';

            $('#new_bar_wrap').html(new_bar);
        } // openNewBarBox
        </script>

        <script type="text/javascript">
        // *************************** Create new bar ****************************
        $(function() {
            $(document).on("click", ".btn_new_bar_continue", function() {
                var bartender = $("#bartender_id").val();
                if (bartender == "----") {
                    xmlbWarn("Please select the bartender!");
                    return;
                }

                var room_id = $("#bar_room_id").val();
                if (room_id == "----") {
                    xmlbWarn("Please select the room where bar will happen");
                    return;
                }

                // Also the event that has been selected
                var event_id = $(".new_bar_wrap .actual_body.picked").attr("event_id");
                if (!event_id) {
                    xmlbWarn(
                        'Please select the event by clicking on the <span class="btn_pick_this_event"><i class="fas fa-check-circle"></i></span> !'
                        );
                    return;
                }

                var prog =
                    "\n" + "\n" + '$new_rec = array() ;' +
                    "\n" + '$new_rec["LNK_EVENT"] = ' + event_id + '  ;' +
                    "\n" + '$new_rec["LNK_FACILITY"] = ' + room_id + '  ;' +
                    "\n" + '$new_rec["LNK_BARTENDER"] = ' + bartender + '  ;' +
                    "\n" + '$new_rec["BAR_NOTES"] = xmlbDecodeFromAJAX("' + xmlbEncodeForAJAX($(
                        "#bar_notes").val()) + '") ;' +
                    "\n" + '$do_record = new doRecord("LIQUOR_BAR") ;' +
                    "\n" + '$do_record -> new_record = $new_rec ;' +
                    "\n" + '$result = $do_record -> insert() ;' +
                    "\n" + 'if ($result)' +
                    "\n" + '  $lqbar_id = $do_record -> id_column_val ;' +
                    "\n" + 'unset($new_rec) ;' +
                    "\n" + 'unset($do_record) ;' +
                    "\n" + 'if ($result)' +
                    "\n" + '  $prog_result = "doAfterNewBarOpened(" . $lqbar_id . ",' + event_id +
                    ') ;" ;' +
                    "\n" + 'else' +
                    "\n" + '  $prog_result = "xmlbAlert(\'" . getGlobalMsg() . "\')" ;'
                runBackEndProg(prog);

            });

            // Show bar info when user clicks on the i
            $(document).on("click", ".bar_to_open_info", function() {
                var event_id = $(this).closest("p").attr("event_id");
                var bar_items;
                for (var i in this_week_events) {
                    if (this_week_events[i].event_id == event_id) {
                        bar_items = this_week_events[i].bar_items;
                        break;
                    }
                }

                showEventBarRequirements(bar_items, is_json = true);
            });
        }); // document.ready

        // After a new bar successfully added, it shows the info on screen
        function doAfterNewBarOpened(lqbar_id, event_id) {
            var picked_event = $(".new_bar_wrap").find(".actual_body.picked");

            var bartender_id = $("#bartender_id").val();
            var room_name = $("#bar_room_id option:selected").text();

            showBarOnScreen(lqbar_id, bartender_id, room_name, event_id, picked_event.find(".customer").text(),
                picked_event.find(".event_type").text(), picked_event.find(".event_date").text(), picked_event.find(
                    ".guests").text()

            );
            closeNewBarScreen();
        } // doAfterNewBarOpened
        </script>


        <div class="bar_info_more">
            <p><label>Bartender:</label><span class="element"><select id="bartender_id" name="bartender_id">
                        <option value="----" selected="selected">----</option>
                        <option value="37">Agency</option>
                        <option value="40">Bartender</option>
                        <option value="66">DJ</option>
                        <option value="58">Edgar</option>
                    </select></span><span class="mand_sign">*</span></p>
            <p><label>Room:</label><span class="element"><select id="bar_room_id" name="bar_room_id">
                        <option value="----" selected="selected">----</option>
                        <option value="4">CONSERVATORY</option>
                        <option value="5">CONSULATE</option>
                        <option value="8">EMBASSY</option>
                        <option value="1">EMBASSY EAST</option>
                        <option value="2">EMBASSY WEST</option>
                        <option value="3">GREENHOUSE</option>
                        <option value="9">GROUNDS</option>
                        <option value="11">LAKESIDE GAZEBO</option>
                        <option value="13">Lawn Area (South of Greenhouse parking lot)</option>
                        <option value="6">LIBRARY</option>
                        <option value="7">TERRACE GAZEBO</option>
                    </select></span><span class="mand_sign">*</span></p>
            <p><label>Notes:</label><span class="element"><textarea id="bar_notes" name="bar_notes" cols="40" rows="3"
                        title="User initiated notes if any" maxlength="256"></textarea>
                </span><span class="mand_sign"></span></p>
        </div>

        <style type="text/css">
        .lq_button {
            font-size: 1.4em;
            cursor: pointer;
            color: #F7941E;
        }

        .lq_button:hover {
            color: #EC5816;
        }

        .new_bar_wrap p.actual_body {
            display: grid;
            grid-template-columns: 1.5% 5% 4% 16% 4% 15% 20% 10% auto;
            padding: .4em .2em;
            margin: 0;
            border-bottom: 1px dotted #000;
        }

        .new_bar_wrap p>span:first-child {
            text-align: right;
            padding-right: .3em;
            font-weight: bold;
        }

        .new_bar_wrap select {
            font-size: 1.4em;
        }

        .actual_body:hover {
            background: #eae2c7;
        }

        .picked {
            background: #eae2c7;
        }

        .picked .btn_pick_this_event {
            color: #3b9b20;
        }

        .event_type {
            cursor: pointer;
        }

        .btn_pick_this_event,
        .bar_to_open_info {
            font-size: 1.8em;
        }

        .bar_to_open_info {
            color: #FA6610;
            cursor: pointer;
        }
        </style>



        <script type="text/javascript">
        $(function() {
            $("#return_empties_wrap").droppable({
                drop: openDialogForEmptyReturn,
                over: function(event) {
                    blink($(event.target), 2);
                },
                accept: '.bar_item'
            });

            // Also allow click to do the empty return
            $(document).on("click", "#return_empties_wrap", function() {
                if ($(".bar_item.bi_picked").length == 0) {
                    xmlbWarn("Please first select the bar items!");
                    return;
                }

                openDialogForEmptyReturn();
            });

            // Handle all empty button at the end of each line
            $(document).on("click", ".btn_all_empty", function() {
                var parent_row = $(this).closest("p");
                var total_qty = parent_row.find(".qty").attr("value");
                var pkg_capacity = parent_row.attr("pkg_capacity");

                if (pkg_capacity <= 1) {
                    // Assume everything as single
                    var qty_case = 0;
                    var qty_single = total_qty;
                } else {
                    // Divide between by case and single
                    var qty_single = total_qty % pkg_capacity;
                    var qty_case = (total_qty - qty_single) / pkg_capacity;
                }
                // When returning empties, say if we have 1.5 bottles, means 2 bottles are empty
                qty_single = Math.ceil(qty_single);

                // Put them all as single at least for now
                parent_row.find(".qty_case").val(qty_case);
                parent_row.find(".qty_single").val(qty_single);
            }); // All emtpty button

            // Cancel button
            $(document).on("click", ".btn_return_empties_cancel", cancelReturnEmpties);
        }); // document.ready

        // After bar items are dropped to return empty box, this function is called to open a dialog
        // to do the return
        function openDialogForEmptyReturn() {
            // Open a popup so user can set the qtys and return the empties
            var return_empties = '<div class="return_empties">';

            return_empties += '<h2>Return Empties</h2><hr />';

            // Now add one line for each item that is being moved

            // Add title row
            var items = '<p class="return_empty_row header"><span>Name</span><span>Qty</span> \
                          <span>Cases</span><span>Singles</span></p>';

            var row_num = 1;
            $(".bar_item.bi_picked").each(function() {
                // Show product name
                var prod_name = $(this).find(".prod_name").text();
                var qty = $(this).find(".qty").text();

                // Find qty per package
                var prod_info = getProductBaseInfo($(this).attr("product_id"));
                if (prod_info.pkg_capacity > 1)
                    prod_name += ' / ' + prod_info.pkg_capacity + ' per case';

                // Add each row
                items += '<p class="return_empty_row actual_body"' +
                    ' lqbar_item_id="' + $(this).attr("lqbar_item_id") + '"' +
                    ' product_id="' + $(this).attr("product_id") + '"' +
                    ' pkg_capacity="' + prod_info.pkg_capacity + '">';

                // Liquor name
                items += '<span>' + row_num + ') ' + prod_name + '</span>';

                // Qty
                items += '<span class="qty" value="' + qty + '">' + qty + '</span>';

                // Add two boxes so user can select cases and singles to add to the bar 

                // By case
                items += '<span><input type="number" class="qty_case" step="0" \
                                      min="0" value="0" /></span>';

                // Singles              
                items += '<span><input type="number" class="qty_single" step=".01" \
                                      value="0" min="0" /></span>';

                // Also add a button so user can select and move this item entirely
                items += '<span class="btn_all_empty"><i class="fas fa-battery-full"></i></span>';

                items += '</p>';

                row_num++;
            }); // Each item being dropped 

            return_empties += items;

            // Add the continue button
            return_empties += '<br /><span class="btn_return_empties_continue big_button">Continue</span>' +
                ' <span class="btn_return_empties_cancel big_button">Cancel</span>';

            return_empties += '</div>';

            $(return_empties).dialog({
                modal: true,
                width: 980,
                title: 'Return Empties',
                close: cancelReturnEmpties // Revert it back on close
            });

            // Add the +/- buttons
            $(".return_empties").find(".qty_case, .qty_single").each(function() {
                var prod_info = getProductBaseInfo($(this).closest(".return_empty_row").attr("product_id"));
                $(this).azbNumberPlugin({
                    add_num_pad: false,
                    step: 1,
                    validateBefore: validateEmptyReturnQtys
                });
            });
        } // openDialogForEmptyReturn

        // Cancels moving of the bar items when user cancels or closes the dialog box
        function cancelReturnEmpties() {
            $(".return_empties").dialog("destroy");
            $(".bar_item").removeClass("bi_picked");

            // Also move any dragged item back
            $('.bar_item[org_top]').each(function() {
                $(this).animate({
                    top: $(this).attr("org_top")
                }, 250);
                $(this).animate({
                    left: $(this).attr("org_left")
                }, 250);
            });
        } // cancelReturnEmpties

        // Makes sure total qty to move from one bar to another or to warehouse including cases 
        // and singles does not exceed avbl qty
        function validateEmptyReturnQtys(num_input, new_val) {
            var result = true;

            var parent_row = num_input.closest(".return_empty_row");
            var prod_info = getProductBaseInfo(parent_row.attr("product_id"));

            if (!prod_info) {
                xmlbWarn("Something gone wrong. Product not found!");
                return false;
            }

            var total_new_qty = 0;
            if (num_input.hasClass("qty_case")) {
                // If we are changing the case qty, then multiply by package capcity
                total_new_qty += parseInt(new_val * prod_info.pkg_capacity) +
                    parseFloat(parent_row.find(".qty_single").val());
            } else {
                // If we are chaging single qty, then add it to the totals by case
                total_new_qty += parseFloat(new_val) +
                    parseInt(parent_row.find(".qty_case").val() * prod_info.pkg_capacity);
            }

            if (total_new_qty > Math.ceil(parent_row.find(".qty").attr("value"))) {
                xmlbWarn("Max empties reached!");
                result = false;
            }

            return result;
        } // validateEmptyReturnQtys 
        </script>

        <style type="text/css">
        .return_empty_row {
            display: grid;
            grid-template-columns: 48% 10% 18% 18% auto;
            font-size: 1.5em;
        }

        .return_empty_row input {
            font-size: 1.9em;
            width: 3em;
            -moz-appearance: textfield;
        }

        .return_empty_row .btn_increment,
        .return_empty_row .btn_decrement,
        .return_empties .btn_all_empty {
            font-size: 1.9em;
            margin: 0 .3em;
            color: #F7941E;
            cursor: pointer;
        }
        </style>




        <script type="text/javascript">
        $(function() {
            // Handle final empty return
            $(document).on("click", ".btn_return_empties_continue", function() {
                if (!confirm("Confirmed? Continue?"))
                    return;

                // Create a json array to pass to back-end to move the item from this bar to the other
                var empty_items = '';
                $(".return_empty_row.actual_body").each(function() {
                    var qty_case = $(this).find(".qty_case").val();
                    if (qty_case == '')
                        qty_case = 0;

                    var qty_single = $(this).find(".qty_single").val();
                    if (qty_single == '')
                        qty_single = 0;

                    // If nothing is moved here, then skip
                    if (qty_case == 0 && qty_single == 0)
                        return; // Continue

                    // Add it to result
                    if (empty_items != '')
                        empty_items += ',';
                    empty_items += '{"lqbar_item_id": "' + $(this).attr("lqbar_item_id") + '"' +
                        ', "qty_single": "' + qty_single + '"' +
                        ', "qty_case": "' + qty_case + '"}';
                }); // Each row to move

                if (empty_items == '') {
                    xmlbWarn("Nothing to return!");
                    return false;
                } else
                    empty_items = '{"lqbar_items": [' + empty_items + ']}';

                // Do final return and then update qtys on screen afterwards
                var prog = '$bar_items = returnEmptyBottles(\'' + empty_items + '\') ;' +
                    "\n" + '$prog_result = "doAfterEmptiesReturned(\'" . $bar_items . "\') ;" ;';

                console.log("prog: " + prog); // debug alert
                runBackEndProg(prog);
            });
        }); // document.ready

        // After empties returned, bar items are updated, so refresh the all_bar_items array 
        function doAfterEmptiesReturned(new_bar_items) {
            // Close dialog
            $(".return_empties").dialog("destroy");

            // Refresh the screen
            storeBarItemsInArray(new_bar_items);
            displayCurrentBarItems();
        } // doAfterEmptiesReturned
        </script>


        <script type="text/javascript">
        $(function() {
            $(document).on("click", ".btn_show_bar_info", function() {
                // Find the event id
                var event_id = $(".bar_wrap.picked").attr("event_id");
                if (!event_id) {
                    xmlbWarn("Please select the bar for event info");
                    return;
                }
                closeBarReqInfo(); // Make sure another one is not open

                runStoredProcedure("open_bars", "liquor_bar_console", "json_get_event_bar_requirements",
                    'event_id=' + event_id, "showEventBarRequirements('#sproc_result#',false) ;");
            });

            $(document).on("click", ".small_button", closeBarReqInfo);

        }); // document.ready

        function closeBarReqInfo() {
            $(".bar_req_info").slideUp(300, function() {
                $(this).remove();
            });
        }

        // Show the bar requirement of the event on screen
        function showEventBarRequirements(bar_items, is_json = true) {
            if (!is_json)
                bar_items = JSON.parse(bar_items);

            var bar_req = '';
            for (var i in bar_items) {
                var bar_item = bar_items[i];

                bar_req += '<p class="actual_body"><span>' + formatNum(bar_item.qty) + '</span>' +
                    '<span>' + xmlbDecodeFromAJAX(bar_item.product_name) + '</span>' +
                    '<span>' + xmlbDecodeFromAJAX(bar_item.item_notes) + '</span>' +
                    '</p>';
            }

            var event_id = $(".bar_wrap.picked").attr("event_id");
            bar_req = '<div class="bar_req_info card"><div>' +
                '<h2>Bar Info for Event: ' + event_id + '</h2>' +
                '<p class="header actual_body"><span>Qty</span><span>Name</span><span>Notes</span></p>' +
                bar_req +
                '<br /><p><span class="small_button btn_close_bar_info">Close</span></p>' +
                '</div></div>';

            $("body").append(bar_req);
        } // showEventBarRequirements
        </script>

        <style type="text/css">
        .bar_req_info {
            position: fixed;
            top: 6em;
            right: .4em;
            width: 30%;
            background: #FFF;
            min-height: 10em;
            min-width: 40em;
            z-index: 100;
            box-shadow: 3px 3px 5px 0px rgba(0, 0, 0, 0.89);
            border: 1px solid #000;
        }

        .bar_req_info p.actual_body {
            display: grid;
            grid-template-columns: 7% 40% auto;
            grid-column-gap: .4em;
        }

        .bar_req_info p.actual_body span:first-child {
            font-weight: bold;
        }
        </style>



        <style type="text/css">
        .header,
        .header span {
            color: #99001E;
            font-size: 1.05em;
        }

        .bar_info_more {
            display: none;
        }

        #return_empties_wrap {
            background: #6B7382;
            position: absolute;
            top: 5px;
            right: 5px;
            cursor: pointer;
        }

        #return_empties_wrap>div {
            font-size: 3em;
            color: #FFF;
            text-align: center;
        }
        </style>
    </span>
    <span id="open_bar_items" class="xmlb_form">
        <div class="card">
            <div>
                <div id="cur_bar_items">
                </div>
            </div>
        </div>


        <script type="text/javascript">
        $(function() {
            // Wait enough for the ajax vars to be initialized
            setTimeout('initAllBarItems() ;', 100);
        }); // document.ready

        // Request the initial demand by sales order and show on screen
        function initAllBarItems() {
            runStoredProcedure("open_bar_items", "liquor_bar_console", "json_get_open_bar_items", null,
                "storeBarItemsInArray('#sproc_result#') ;");
        } // initAllBarItems
        </script>


        <script type="text/javascript">
        // Keeps the returned records as array of json objects
        var all_bar_items;

        // Converts the returned data to an array and stores them for later use
        function storeBarItemsInArray(return_data) {
            all_bar_items = JSON.parse(return_data);
            all_bar_items = all_bar_items.bar_items; // Shorten syntax
        } // storeBarItemsInArray
        </script>


        <script type="text/javascript">
        $(function() {
            $(document).on("click", ".bar_wrap", function() {
                if (in_move)
                    return; // Do not switch if we are in the middle of the move

                var lqbar_id = $(this).attr("lqbar_id");

                $(".bar_wrap").removeClass("picked");
                $(this).addClass("picked");
                displayCurrentBarItems();
            });
        }); // document.ready

        function displayCurrentBarItems() {
            // First empty the current bar
            $("#cur_bar_items").html('');

            // Find the id of the current bar
            var lqbar_id = $(".bar_wrap.picked").attr("lqbar_id");
            if (!lqbar_id)
                return;

            var bar_items = '';
            for (var i in all_bar_items) {
                var cur_item = all_bar_items[i]; // Shorten syntax

                // Do not show if this is not part of current bar
                if (cur_item.lqbar_id != lqbar_id)
                    continue;

                var prod_name = cur_item.prod_name.replace(/--dq--/g, '"');
                if (cur_item.sku)
                    prod_name = cur_item.sku + ' &#32;-:-&#32; ' + prod_name;

                // Link product name to detailed view
                prod_name = '<a href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=' +
                    cur_item.product_id + '"' +
                    ' tabindex="-1" target="_blank">' + prod_name + '</a>';

                var type_name = 'N/A';
                if (cur_item.type_name)
                    type_name = cur_item.type_name.replace(/--dq--/g, '"');

                bar_items += '<span class="bar_item" lqbar_id="' + lqbar_id + '"' +
                    ' lqbar_item_id="' + cur_item.lqbar_item_id + '"' +
                    ' product_id="' + cur_item.product_id + '">' +
                    '<span class="prod_name">' + prod_name + ' (' + type_name + ') </span>' +
                    '<br /><strong>Qty:</strong> \
                                    <span class="qty">' + cur_item.qty + '</span></span>';
            } // Each item in the bar

            $("#cur_bar_items").html(bar_items);

            // Create drag and drop-features
            initDragAndDropBarItems();
        } // displayCurrentBarItems
        </script>

        <style type="text/css">
        </style>



        <style type="text/css">
        #cur_bar_items {
            display: grid;
            grid-template-columns: 19.5% 19.5% 19.5% 19.5% 19.5%;
        }

        .bar_item {
            border: 2px solid #000;
            padding: .5em;
            margin: .1em;
            font-size: 1.08em;
            background: #d6d1bf;
        }

        .bar_item>span:first-child {
            display: inline-block;
            height: 2.5em;
            overflow: hidden;
            font-size: 1.08em;
        }
        </style>
    </span>
    <span id="show_inv_items" class="xmlb_form">
        <script type="text/javascript">
        (function($) {
            $.fn.azbdDropDown = function(options, option_val) {
                var settings;

                if (typeof options == "object") {
                    settings = $.extend({}, options);
                }

                // If no options passed or option is an object, it means we are just building the plugin
                // After that, options are set one by one as string
                if (!options || typeof options == "object") {
                    // Initialize
                    return this.each(function() {
                        // Add both classes to make sure it will not conflict with another plugin
                        $(this).addClass("azbd");
                        $(this).addClass("azbd_drop_down");

                        // This tells us if the drop-down is already open or is being opened. Otherwise it will be 
                        // opened and closed after the first click
                        $(this).attr("is_open", "no");

                        // Set the value of the drop-down to the first element
                        if (settings && settings.value)
                            $(this).attr("value", settings.value);
                        else
                            $(this).attr("value", $(this).find("> span:first-child").attr("value"));

                        // ********************** Set Height ***********************
                        // Set the height to the first element so it will be seen

                        var first_child_height = $(this).find("span:first-child").css("height").replace(
                            'px', '');
                        $(this).css("height", first_child_height + 'px');
                        $(this).attr("org_height", first_child_height +
                        'px'); // Also save this so when we open it, we can close it again

                        // Set the width to the biggest child or it will change size each time
                        var new_width = 0;
                        $(this).find("> span").each(function() {
                            var this_width = parseInt($(this).css("width").replace('px', ''));
                            if (this_width > new_width)
                                new_width = this_width;
                        });
                        $(this).css("width", (new_width + 2) + "px");

                        $(this).azbdDropDown("close"); // Show the selected item 

                        // ********************** Bind Click to Open Event ***********************
                        // Count how many items inside and set the height of the parent to the total height
                        $(this).bind("click", function(e) {
                            var child_count = $(this).find("> span").length;
                            var this_height = $(this).css("height").replace('px', '');
                            var first_child_height = $(this).find("span:first-child").css(
                                "height").replace('px', '');

                            if (parseInt(this_height) <= parseInt(
                                first_child_height)) // Make sure it is not already open
                            {
                                $(this).find("> span").css("display", "block");
                                $(this).animate({
                                    height: (this_height * child_count) + 'px'
                                }, 250);
                                $(this).attr("is_open", "yes");
                                e.stopPropagation();
                            }

                            // At the end highlight the current item
                            $(this).find("> span[value=" + $(this).attr("value") + "]")
                                .addClass("picked");
                        }); // Bind click to open event

                        // ********************** Bind Click an Option ***********************
                        $(this).find('> span').bind("click", function(e) {
                            if ($(this).parent().attr("is_open") == "no")
                                return;

                            $(this).parent().attr("value", $(this).attr("value"));
                            $(this).parent().azbdDropDown("close");

                            if (settings && settings.onChange)
                                settings.onChange($(this));
                            e.stopPropagation();
                        });
                    });
                } // Initialize
                else if (options == "close") {
                    if (this.attr("is_open") == "no")
                        return;

                    this.find('> span').each(function() {
                        $(this).css("display", "none");
                        $(this).removeClass("picked");
                    });

                    // Make sure the selected option will show
                    var selected_option = this.find('> span[value=' + $(this).attr("value") + ']');
                    selected_option.css("display", "block");
                    selected_option.addClass("picked");

                    // Now close the drop-down
                    this.animate({
                        height: $(this).attr("org_height")
                    }, 250);
                    this.attr("is_open", "no");
                } // close method
                else if (options == "get") {
                    return this.attr("value");
                } // get method
                else if (options == "getName") {
                    return this.find('> span[value=' + $(this).attr("value") + ']').text();
                } // get method
                else if (options == "set") {
                    this.attr("value", option_val);
                    this.azbdDropDown("close");
                } // set method

            };
        }(jQuery)); // End of warehouse element object

        $(function() {
            // If user clicks anywhere else in the document, then close the drop-down
            $(document).on("click", function() {
                $(".azbd.azbd_drop_down").azbdDropDown("close");
            });
        }); // document.ready
        </script>

        <style type="text/css">
        .azbd.azbd_drop_down {
            display: inline-block;
            overflow: hidden;
            position: absolute;
            margin: .2em .4em 0 0;
            background: #c4a227;
            font-weight: bold;
        }

        .azbd.azbd_drop_down>span {
            display: block;
            font-size: 1.25em;
            color: #FFF;
            text-align: center;
            border-bottom: 1px solid #000;
            padding: .45em;
            box-sizing: border-box;
        }

        .azbd.azbd_drop_down>span:hover {
            background: #9E8C46;
            cursor: pointer;
        }

        .azbd.azbd_drop_down>span.picked {
            background: #9E8C46;
        }
        </style>


        <div class="card checkout_wrap">
            <div>
                <p class="inv_item_search">
                    <strong>Search:</strong> <input type="text" id="txt_search_inv_items">
                    <span class="btn_show_all_items small_button">Show All</span>
                    <span class="btn_show_inv_items_cancel small_button">Cancel</span>
                    <span id="warehouse_locs" class="azbd azbd_drop_down" is_open="no" value="3" org_height="29px"
                        style="height: 29px; width: 236px;"><span value="3">Banquet Hall Liquor Room</span><span
                            value="6">Greenhouse Liquor Room</span><span value="4">Beer Fridge (East)</span><span
                            value="5">Beer Fridge (West)</span><span value="7">Greenhouse Beer Fridge</span><span
                            value="10">Conservatory Beer Fridge</span><span value="2">2nd. Floor Wine Room </span><span
                            value="1">1st. Floor Wine Room</span><span value="11">Consulate Warehouse</span></span>
                    <span id="lq_lists" class="azbd azbd_drop_down" is_open="no" value="----" org_height="29px"
                        style="height: 29px; width: 126px;"><span value="----">----</span><span value="2">Premium
                            Bar</span><span value="1">Standard Bar</span></span>
                </p>
                <div id="inv_items_for_checkout"></div>
            </div>
        </div>


        <script type="text/javascript">
        var inv_items;
        var lq_prods_info = [{
            product_id: 1237,
            name: "Tawse Winery Meritage",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1240,
            name: "Poggio al Tesoro Bolgheri Sondraia",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1244,
            name: "Podere Poggio Scalette Il Carbonaione",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1248,
            name: "Brunello di Montalcino, Riserva --dq--La Lecciaia--dq--",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 1249,
            name: "Peter Franus Napa Valley Cabernet Sauvignon",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1250,
            name: "Starmont Cabernet Sauvignon",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1252,
            name: "Cesari Amarone della Valpolicella Bosca Riserva",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1253,
            name: "Cordero di Montezemolo Barolo Monfalletto",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 1254,
            name: "Ornellaia Tenuta Dell'Ornallaia",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1256,
            name: "Sassicaia",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 1258,
            name: "Altos de Losada La Bienquerida",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1261,
            name: "Louis Latour Chateau Corton Grancey Grand Cru",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1262,
            name: "Quintarelli Alzero",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 1263,
            name: "Château Cap de Mourlin Saint Emilion Grand Cru",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1265,
            name: "Chateau Ducru Beaucaillou St Julien 2er Cru",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 1267,
            name: "Penfolds Grange",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 1270,
            name: "Shiraz Reserve --dq--Geoff Merrill McLaren Vale--dq--",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1273,
            name: "Bond Cabernet Sauvignon",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 1274,
            name: "Whitehall Lane Merlot",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1275,
            name: "Peter Franus Napa Valley Cabernet Sauvignon",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1276,
            name: "Duckhorn Vineyards Merlot",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1278,
            name: "Merryvale Cabernet Sauvignon, Napa Valley",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1279,
            name: "Signorello Padrone",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 1281,
            name: "Signorello Estate Cabernet Sauvignon",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 1282,
            name: "Hilltop Cabernet Sauvignon",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1283,
            name: "Poggio Stenti Pian di Staffa ",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1284,
            name: "Amarone Della Valpolicella La Rosta",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1294,
            name: "Pellé Sancerre 'La Croix au Garde'",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1307,
            name: "Butterfield Station Chardonnay",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1308,
            name: "Bogle Chenin Blanc",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1309,
            name: "Château De Maligney Chablis Primier Cru Vau de Vey",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1312,
            name: "Regnard Petit Chablis",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1318,
            name: "Mastroberardino Greco di Tufo",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1320,
            name: "Castello di Querceto Chianti",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1322,
            name: "Grayson Estate Merlot",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1324,
            name: "Dolcetto D'Alba",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1325,
            name: "Fondo Antico Syrah",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1327,
            name: "Rosso di Toscana",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1330,
            name: "Vigneti del Salento ZOLLA Primitivo",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1332,
            name: "Degani Ciciio Valpolicella Classico Ripasso",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1336,
            name: "Cesari Ripasso Bosan",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1338,
            name: "Logonovo Montalcino",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1339,
            name: "Farnese Fantini Edizione Cinque Autoctoni",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1342,
            name: "Finca Losada",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1346,
            name: "Chateau Teyssier Pezat Bordeaux Superior",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1348,
            name: "Foppiano Petit Syrah",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1350,
            name: "Lailey Cabernet Franc",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1352,
            name: "Cave Spring Cabernet Franc",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1354,
            name: "Wakefield Pinot Noir",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1361,
            name: "Grayson Estate Cabernet Sauvignon",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1363,
            name: "Cordero Di Montezomolo Langhe Nebbiolo",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 1366,
            name: "Peter Franus Napa Valley Merlot",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1367,
            name: "Brigaldara Amarone della Valpolicella Classico",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 1368,
            name: "Edge Cabernet Sauvignon",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1370,
            name: "Finca La Florencia",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1371,
            name: "Ben Marco Plata",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1378,
            name: "J. Lohr Seven Oaks Cabernet Sauvignon",
            lq_type: 73,
            pkg_capacity: 1.00
        }, {
            product_id: 1380,
            name: "Cristom Pinot Noir",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1387,
            name: "Cava Kripta Brut Nature Gran Reserva",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 1390,
            name: "Augusti Torello Mata Cava Brut  Reserva",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1395,
            name: "Calatroni Pinot 64 Spumante",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1396,
            name: "Amaro Ramazotti",
            lq_type: 66,
            pkg_capacity: 1.00
        }, {
            product_id: 1397,
            name: "Campari Aperitivo",
            lq_type: 66,
            pkg_capacity: 1.00
        }, {
            product_id: 1398,
            name: "Jagermeister",
            lq_type: 66,
            pkg_capacity: 1.00
        }, {
            product_id: 1399,
            name: "Amaro Averna ",
            lq_type: 66,
            pkg_capacity: 1.00
        }, {
            product_id: 1400,
            name: "Crown Royal Whisky",
            lq_type: 68,
            pkg_capacity: 1.00
        }, {
            product_id: 1401,
            name: "Wiser's Special Blend Whisky",
            lq_type: 68,
            pkg_capacity: 1.00
        }, {
            product_id: 1402,
            name: "Astoria Prosecco La Robinia",
            lq_type: 73,
            pkg_capacity: 1.00
        }, {
            product_id: 1403,
            name: "Viva Spumante Colio",
            lq_type: 74,
            pkg_capacity: 12.00
        }, {
            product_id: 1404,
            name: "LA SCALA SPUMANTE",
            lq_type: 74,
            pkg_capacity: 12.00
        }, {
            product_id: 1406,
            name: "Remy Martin VSOP Congac",
            lq_type: 61,
            pkg_capacity: 1.00
        }, {
            product_id: 1407,
            name: "St Remy Authentic Brandy",
            lq_type: 61,
            pkg_capacity: 4.00
        }, {
            product_id: 1410,
            name: "Hennessy VSOP Cognac",
            lq_type: 61,
            pkg_capacity: 1.00
        }, {
            product_id: 1411,
            name: "Bombay Sapphire London Dry Gin",
            lq_type: 60,
            pkg_capacity: 4.00
        }, {
            product_id: 1412,
            name: "Beefeater Gin",
            lq_type: 60,
            pkg_capacity: 1.00
        }, {
            product_id: 1414,
            name: "Bacardi Superior White Rum",
            lq_type: 70,
            pkg_capacity: 1.00
        }, {
            product_id: 1416,
            name: "Bacardi Black",
            lq_type: 70,
            pkg_capacity: 1.00
        }, {
            product_id: 1417,
            name: "Malibu Coconut Rum",
            lq_type: 70,
            pkg_capacity: 1.00
        }, {
            product_id: 1418,
            name: "Captain Morgan Original Spiced Rum",
            lq_type: 70,
            pkg_capacity: 1.00
        }, {
            product_id: 1419,
            name: "Chivas Regal 12 Year Old Scotch Whisky",
            lq_type: 69,
            pkg_capacity: 1.00
        }, {
            product_id: 1421,
            name: "Glenfiddich 12 Year Old Single Malt Scotch Whisky",
            lq_type: 69,
            pkg_capacity: 1.00
        }, {
            product_id: 1422,
            name: "Tequila Sauza Silver",
            lq_type: 72,
            pkg_capacity: 1.00
        }, {
            product_id: 1423,
            name: "Olmeca Tequila Gold",
            lq_type: 72,
            pkg_capacity: 1.00
        }, {
            product_id: 1424,
            name: "Grey Goose Vodka",
            lq_type: 59,
            pkg_capacity: 1.00
        }, {
            product_id: 1425,
            name: "Polar Ice Vodka",
            lq_type: 59,
            pkg_capacity: 1.00
        }, {
            product_id: 1426,
            name: "Belvedere Pure Vodka",
            lq_type: 59,
            pkg_capacity: 1.00
        }, {
            product_id: 1427,
            name: "Cointreau",
            lq_type: 67,
            pkg_capacity: 4.00
        }, {
            product_id: 1429,
            name: "Montalto Pinot Grigio",
            lq_type: 75,
            pkg_capacity: 4.00
        }, {
            product_id: 1431,
            name: "MONTALTO PINOT GRIGIO IGT SICILY ",
            lq_type: 75,
            pkg_capacity: 4.00
        }, {
            product_id: 1432,
            name: "DRAGANI MONTEPULCIANO D'ABRUZZO",
            lq_type: 75,
            pkg_capacity: 4.00
        }, {
            product_id: 1433,
            name: "CONCHA Y TORO FRONTERA CAB MER",
            lq_type: 75,
            pkg_capacity: 4.00
        }, {
            product_id: 1434,
            name: "FUZION SHIRAZ MALBEC",
            lq_type: 75,
            pkg_capacity: 4.00
        }, {
            product_id: 1435,
            name: "OGGI BOTTER PRIMITIVO",
            lq_type: 75,
            pkg_capacity: 4.00
        }, {
            product_id: 1436,
            name: "Courvoisier VS Cognac",
            lq_type: 61,
            pkg_capacity: 1.00
        }, {
            product_id: 1437,
            name: "BAREFOOT PINOT GRIGIO",
            lq_type: 75,
            pkg_capacity: 4.00
        }, {
            product_id: 1438,
            name: "BAREFOOT CABERNET SAUVIGNON",
            lq_type: 75,
            pkg_capacity: 4.00
        }, {
            product_id: 1439,
            name: "CITRA PINOT GRIGIO OSCO IGT",
            lq_type: 75,
            pkg_capacity: 4.00
        }, {
            product_id: 1440,
            name: "COLLE SECCO MONTEPULCIANO D ABRUZZO",
            lq_type: 75,
            pkg_capacity: 4.00
        }, {
            product_id: 1441,
            name: "PASSION OF PORTUGAL RED",
            lq_type: 75,
            pkg_capacity: 4.00
        }, {
            product_id: 1442,
            name: "SOGRAPE GAZELA VINHO VERDE",
            lq_type: 75,
            pkg_capacity: 4.00
        }, {
            product_id: 1443,
            name: "Absolute Blueberry",
            lq_type: 59,
            pkg_capacity: 1.00
        }, {
            product_id: 1444,
            name: "Sour Puss Raspberry Liquor",
            lq_type: 67,
            pkg_capacity: 1.00
        }, {
            product_id: 1445,
            name: "Soho Lychee Liqueur",
            lq_type: 67,
            pkg_capacity: 1.00
        }, {
            product_id: 1446,
            name: "Captain Morgan Gold Rum",
            lq_type: 70,
            pkg_capacity: 4.00
        }, {
            product_id: 1448,
            name: "Chambord",
            lq_type: 75,
            pkg_capacity: 4.00
        }, {
            product_id: 1449,
            name: "brights 74 Port",
            lq_type: 75,
            pkg_capacity: 4.00
        }, {
            product_id: 1451,
            name: "Maraska Stara Sljivovica",
            lq_type: 75,
            pkg_capacity: 4.00
        }, {
            product_id: 1461,
            name: "Mcguiness Creme de Menthe Green",
            lq_type: 67,
            pkg_capacity: 1.00
        }, {
            product_id: 1462,
            name: "Disaronno Originale Amaretto",
            lq_type: 63,
            pkg_capacity: 1.00
        }, {
            product_id: 1463,
            name: "Amaretto Dell' Amorosa",
            lq_type: 67,
            pkg_capacity: 1.00
        }, {
            product_id: 1464,
            name: "Baileys Irish Cream",
            lq_type: 67,
            pkg_capacity: 1.00
        }, {
            product_id: 1465,
            name: "Mcguinness Blue Curacao",
            lq_type: 67,
            pkg_capacity: 1.00
        }, {
            product_id: 1466,
            name: "Mcguinness Creme de Cacao White",
            lq_type: 67,
            pkg_capacity: 1.00
        }, {
            product_id: 1467,
            name: "Dubonnet Rouge",
            lq_type: 67,
            pkg_capacity: 1.00
        }, {
            product_id: 1468,
            name: "Grand Marnier Cordon Rouge",
            lq_type: 67,
            pkg_capacity: 1.00
        }, {
            product_id: 1469,
            name: "Jack Daniels",
            lq_type: 4194,
            pkg_capacity: 1.00
        }, {
            product_id: 1470,
            name: "Kahlua",
            lq_type: 67,
            pkg_capacity: 1.00
        }, {
            product_id: 1471,
            name: "Martini Dry Vermouth White",
            lq_type: 65,
            pkg_capacity: 1.00
        }, {
            product_id: 1472,
            name: "Mcguinness Peach Schnapps",
            lq_type: 67,
            pkg_capacity: 1.00
        }, {
            product_id: 1473,
            name: "Mcguinness Creme de Banane",
            lq_type: 67,
            pkg_capacity: 1.00
        }, {
            product_id: 1474,
            name: "Sambuca Ramazzotti",
            lq_type: 67,
            pkg_capacity: 1.00
        }, {
            product_id: 1475,
            name: "Sour Puss Apple Liquor",
            lq_type: 67,
            pkg_capacity: 1.00
        }, {
            product_id: 1476,
            name: "Southern Comfort",
            lq_type: 67,
            pkg_capacity: 1.00
        }, {
            product_id: 1477,
            name: "Sperone Dry Marsala *for kitchen",
            lq_type: 67,
            pkg_capacity: 1.00
        }, {
            product_id: 1478,
            name: "Martini & Rossi Sweet Vermouth Red",
            lq_type: 64,
            pkg_capacity: 1.00
        }, {
            product_id: 1479,
            name: "McGuinness Triple Sec",
            lq_type: 67,
            pkg_capacity: 1.00
        }, {
            product_id: 1480,
            name: "Carolines Irish Cream",
            lq_type: 67,
            pkg_capacity: 1.00
        }, {
            product_id: 1481,
            name: "Mcguinness Creme de Menthe White",
            lq_type: 67,
            pkg_capacity: 1.00
        }, {
            product_id: 1482,
            name: "McGuinness Melon",
            lq_type: 67,
            pkg_capacity: 1.00
        }, {
            product_id: 1484,
            name: "Budweiser",
            lq_type: 36,
            pkg_capacity: 24.00
        }, {
            product_id: 1485,
            name: "Coors Light",
            lq_type: 36,
            pkg_capacity: 24.00
        }, {
            product_id: 1486,
            name: "Corona",
            lq_type: 36,
            pkg_capacity: 24.00
        }, {
            product_id: 1487,
            name: "Heineken Rest D",
            lq_type: 36,
            pkg_capacity: 24.00
        }, {
            product_id: 1488,
            name: "Labatt Blue",
            lq_type: 36,
            pkg_capacity: 24.00
        }, {
            product_id: 1489,
            name: "Miller Genuine Draft Rest",
            lq_type: 36,
            pkg_capacity: 24.00
        }, {
            product_id: 1490,
            name: "Molson Canadian",
            lq_type: 36,
            pkg_capacity: 24.00
        }, {
            product_id: 1491,
            name: "Molson Export",
            lq_type: 36,
            pkg_capacity: 24.00
        }, {
            product_id: 1492,
            name: "Moosehead Rest",
            lq_type: 36,
            pkg_capacity: 24.00
        }, {
            product_id: 1493,
            name: "Sleemans Honey Brown",
            lq_type: 36,
            pkg_capacity: 24.00
        }, {
            product_id: 1494,
            name: "Stella Artois",
            lq_type: 36,
            pkg_capacity: 24.00
        }, {
            product_id: 1495,
            name: "Alexander Keiths",
            lq_type: 36,
            pkg_capacity: 24.00
        }, {
            product_id: 1496,
            name: "Dos Equis",
            lq_type: 36,
            pkg_capacity: 24.00
        }, {
            product_id: 1497,
            name: "Stella Artois Draught",
            lq_type: 36,
            pkg_capacity: 24.00
        }, {
            product_id: 1498,
            name: "Bud Light",
            lq_type: 36,
            pkg_capacity: 24.00
        }, {
            product_id: 1499,
            name: "Bud light Lime",
            lq_type: 36,
            pkg_capacity: 24.00
        }, {
            product_id: 1500,
            name: "Zywiec",
            lq_type: 36,
            pkg_capacity: 20.00
        }, {
            product_id: 1502,
            name: "Tyskie",
            lq_type: 36,
            pkg_capacity: 24.00
        }, {
            product_id: 1503,
            name: "Staropramin",
            lq_type: 36,
            pkg_capacity: 24.00
        }, {
            product_id: 1507,
            name: "Cola",
            lq_type: 76,
            pkg_capacity: 1.00
        }, {
            product_id: 1508,
            name: "Diet",
            lq_type: 76,
            pkg_capacity: 1.00
        }, {
            product_id: 1509,
            name: "Lemon",
            lq_type: 76,
            pkg_capacity: 1.00
        }, {
            product_id: 1510,
            name: "Gingerale",
            lq_type: 76,
            pkg_capacity: 1.00
        }, {
            product_id: 1511,
            name: "Tonic",
            lq_type: 76,
            pkg_capacity: 1.00
        }, {
            product_id: 1512,
            name: "Cranberry",
            lq_type: 76,
            pkg_capacity: 1.00
        }, {
            product_id: 1513,
            name: "Ice Tea",
            lq_type: 76,
            pkg_capacity: 1.00
        }, {
            product_id: 1514,
            name: "Orange",
            lq_type: 76,
            pkg_capacity: 1.00
        }, {
            product_id: 1515,
            name: "Clamato",
            lq_type: 76,
            pkg_capacity: 1.00
        }, {
            product_id: 1516,
            name: "Co2",
            lq_type: 76,
            pkg_capacity: 1.00
        }, {
            product_id: 1517,
            name: "Ballatines's Scotch",
            lq_type: 69,
            pkg_capacity: 1.00
        }, {
            product_id: 1521,
            name: "Pernod",
            lq_type: 67,
            pkg_capacity: 1.00
        }, {
            product_id: 1524,
            name: "Jose Cuervo Reserva De La Familia Extra Añejo",
            lq_type: 72,
            pkg_capacity: 1.00
        }, {
            product_id: 1526,
            name: "Fleixenetbrut Champagne",
            lq_type: 74,
            pkg_capacity: 1.00
        }, {
            product_id: 1531,
            name: "Pink Moet Champagne",
            lq_type: 74,
            pkg_capacity: 1.00
        }, {
            product_id: 1532,
            name: "Captain Morgan Dark Rum",
            lq_type: 70,
            pkg_capacity: 1.00
        }, {
            product_id: 1536,
            name: "CAN Valle de la Orotava",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1537,
            name: "Crozes-Hermitage",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1538,
            name: "Caledon Hills Premium Vienna Lager",
            lq_type: 36,
            pkg_capacity: 24.00
        }, {
            product_id: 1540,
            name: "Rosso di Toscana --dq--Bevilo--dq--",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1543,
            name: "Floral de Vinya",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 1545,
            name: "Ciroc",
            lq_type: 59,
            pkg_capacity: 1.00
        }, {
            product_id: 1547,
            name: "Fondo Antico Nero d'Avola",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1548,
            name: "Poggio Stenti Maremma Toscana Rosso",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1550,
            name: "Terres de Berne",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 1551,
            name: "Vieilles Vignes Rouge Costières de Nîmes",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1552,
            name: "Rosehall Run Pinot Noir",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1555,
            name: "Jean-Luc Colombo Cornas, Les Ruchets",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1562,
            name: "Terrapura Pinot Noir",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1564,
            name: "Gautier",
            lq_type: 61,
            pkg_capacity: 1.00
        }, {
            product_id: 1566,
            name: "SAILOR JERRY SPICED RUM",
            lq_type: 70,
            pkg_capacity: 1.00
        }, {
            product_id: 1567,
            name: "BACARD OAKHEART SPICED RUM",
            lq_type: 70,
            pkg_capacity: 1.00
        }, {
            product_id: 1569,
            name: "Tanqueray Dry Gin",
            lq_type: 60,
            pkg_capacity: 1.00
        }, {
            product_id: 1570,
            name: "Johnnie Walker Black Label Scotch Whisky",
            lq_type: 69,
            pkg_capacity: 1.00
        }, {
            product_id: 1572,
            name: "Aperol",
            lq_type: 66,
            pkg_capacity: 1.00
        }, {
            product_id: 1576,
            name: "The Glenlivet Founder's Reserve Scotch Whisky",
            lq_type: 69,
            pkg_capacity: 1.00
        }, {
            product_id: 1577,
            name: "Mike's Hard Lemonade",
            lq_type: 36,
            pkg_capacity: 4.00
        }, {
            product_id: 1578,
            name: "Smirnoff Ice",
            lq_type: 36,
            pkg_capacity: 24.00
        }, {
            product_id: 1580,
            name: "Gosser",
            lq_type: 36,
            pkg_capacity: 1.00
        }, {
            product_id: 1581,
            name: "Peroni Nastro Azzurro",
            lq_type: 36,
            pkg_capacity: 24.00
        }, {
            product_id: 1583,
            name: "Sleeman Clear",
            lq_type: 36,
            pkg_capacity: 24.00
        }, {
            product_id: 1584,
            name: "Molson Canadian 67",
            lq_type: 36,
            pkg_capacity: 24.00
        }, {
            product_id: 1588,
            name: "Coronita",
            lq_type: 36,
            pkg_capacity: 24.00
        }, {
            product_id: 1589,
            name: "Amaro Montenegro",
            lq_type: 4196,
            pkg_capacity: 1.00
        }, {
            product_id: 1590,
            name: "Smirnoff",
            lq_type: 59,
            pkg_capacity: 12.00
        }, {
            product_id: 1592,
            name: "Mount Gay Eclipse Rum",
            lq_type: 36,
            pkg_capacity: 1.00
        }, {
            product_id: 1595,
            name: "Amaro Lucano",
            lq_type: 66,
            pkg_capacity: 1.00
        }, {
            product_id: 1596,
            name: "El Dorado 8 Year Old Cask Aged Demerara Rum",
            lq_type: 70,
            pkg_capacity: 1.00
        }, {
            product_id: 1598,
            name: "Hendrick's Gin",
            lq_type: 60,
            pkg_capacity: 1.00
        }, {
            product_id: 1604,
            name: "El Jimador",
            lq_type: 72,
            pkg_capacity: 1.00
        }, {
            product_id: 1607,
            name: "St Remy VSOP Brandy",
            lq_type: 61,
            pkg_capacity: 1.00
        }, {
            product_id: 1608,
            name: "Bacardi Gold Rum",
            lq_type: 70,
            pkg_capacity: 1.00
        }, {
            product_id: 1610,
            name: "Absolut Raspberri Vodka",
            lq_type: 59,
            pkg_capacity: 1.00
        }, {
            product_id: 1611,
            name: "Buton Vecchia Romagna Brandy",
            lq_type: 61,
            pkg_capacity: 1.00
        }, {
            product_id: 1615,
            name: "Moët & Chandon Grand Vintage Extra Brut Rosé Champagne 2009",
            lq_type: 74,
            pkg_capacity: 1.00
        }, {
            product_id: 1617,
            name: "The Kraken Black Spiced Rum",
            lq_type: 70,
            pkg_capacity: 1.00
        }, {
            product_id: 1618,
            name: "Birra Moretti",
            lq_type: 36,
            pkg_capacity: 24.00
        }, {
            product_id: 1619,
            name: "Amaretto Di Saschira",
            lq_type: 63,
            pkg_capacity: 1.00
        }, {
            product_id: 1623,
            name: "Dillon's Dry Gin",
            lq_type: 60,
            pkg_capacity: 1.00
        }, {
            product_id: 1624,
            name: "El Dorado 12 Year Old Rum",
            lq_type: 70,
            pkg_capacity: 1.00
        }, {
            product_id: 1626,
            name: "Maker's Mark Kentucky Bourbon",
            lq_type: 4195,
            pkg_capacity: 1.00
        }, {
            product_id: 1627,
            name: "Patron Reposado Barrel Select Tequila",
            lq_type: 72,
            pkg_capacity: 1.00
        }, {
            product_id: 1628,
            name: "Brickworks Ciderhouse Batch : 1904",
            lq_type: 36,
            pkg_capacity: 1.00
        }, {
            product_id: 1630,
            name: "Beau's Lug Tread",
            lq_type: 36,
            pkg_capacity: 1.00
        }, {
            product_id: 1634,
            name: "Estrella Damm Lager",
            lq_type: 36,
            pkg_capacity: 1.00
        }, {
            product_id: 1635,
            name: "Glenrothes Select Reserve Single Malt Scotch Whisky",
            lq_type: 69,
            pkg_capacity: 1.00
        }, {
            product_id: 1636,
            name: "Fuller's London Pride",
            lq_type: 74,
            pkg_capacity: 1.00
        }, {
            product_id: 1637,
            name: "Nonino Quintessentia Amaro",
            lq_type: 4196,
            pkg_capacity: 1.00
        }, {
            product_id: 1638,
            name: "Tequila Tromba Blanco",
            lq_type: 72,
            pkg_capacity: 1.00
        }, {
            product_id: 1639,
            name: "Daura Damm",
            lq_type: 36,
            pkg_capacity: 6.00
        }, {
            product_id: 1642,
            name: "Meaghers Triple Sec",
            lq_type: 67,
            pkg_capacity: 1.00
        }, {
            product_id: 1648,
            name: "Woodford Reserve Distiller's Select Bourbon",
            lq_type: 68,
            pkg_capacity: 1.00
        }, {
            product_id: 1649,
            name: "Ketel One Botanical Cucumber and Mint",
            lq_type: 59,
            pkg_capacity: 1.00
        }, {
            product_id: 1650,
            name: "Ketel One Botanical Peach and Orange Blossom",
            lq_type: 59,
            pkg_capacity: 1.00
        }, {
            product_id: 1651,
            name: "Ketel One Botanical Grapefruit and Rose",
            lq_type: 59,
            pkg_capacity: 1.00
        }, {
            product_id: 1652,
            name: "Ketel One Botanical Grapefruit and Rose",
            lq_type: 59,
            pkg_capacity: 1.00
        }, {
            product_id: 1654,
            name: "Jameson Irish Whisky",
            lq_type: 82,
            pkg_capacity: 1.00
        }, {
            product_id: 1655,
            name: "Gordon's Gin",
            lq_type: 60,
            pkg_capacity: 1.00
        }, {
            product_id: 1657,
            name: "Solid Ground, Cabernet Sauvignon",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1658,
            name: "Pina Colada Mix",
            lq_type: 75,
            pkg_capacity: 6.00
        }, {
            product_id: 1659,
            name: "Strawberry Daiquiri",
            lq_type: 75,
            pkg_capacity: 6.00
        }, {
            product_id: 1661,
            name: "Martell VS Single Distillery",
            lq_type: 61,
            pkg_capacity: 1.00
        }, {
            product_id: 1664,
            name: "Cabot Trail Maple Cream",
            lq_type: 67,
            pkg_capacity: 1.00
        }, {
            product_id: 1671,
            name: "Fernet-Branca Amer/Bitters",
            lq_type: 66,
            pkg_capacity: 1.00
        }, {
            product_id: 1673,
            name: "Rocca Delle Macie Giulio Straccali Pinot Grigio",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1677,
            name: "Caledon Hills Bohemian Pils",
            lq_type: 36,
            pkg_capacity: 24.00
        }, {
            product_id: 1678,
            name: "GoodLot Farmstead Ale",
            lq_type: 36,
            pkg_capacity: 24.00
        }, {
            product_id: 1679,
            name: "Guinness Drought",
            lq_type: 36,
            pkg_capacity: 24.00
        }, {
            product_id: 1680,
            name: "Mill St Origional Organic",
            lq_type: 36,
            pkg_capacity: 24.00
        }, {
            product_id: 1681,
            name: "Hockley Dark",
            lq_type: 36,
            pkg_capacity: 24.00
        }, {
            product_id: 1682,
            name: "Hockley Classic",
            lq_type: 36,
            pkg_capacity: 24.00
        }, {
            product_id: 1683,
            name: "Hockley Amber",
            lq_type: 36,
            pkg_capacity: 24.00
        }, {
            product_id: 1684,
            name: "McGuinness Cherry Brandy",
            lq_type: 67,
            pkg_capacity: 1.00
        }, {
            product_id: 1693,
            name: "Penley Estate Aradia Chardonnay",
            lq_type: 67,
            pkg_capacity: 12.00
        }, {
            product_id: 1696,
            name: "Butterfield Station Chardonnay BTG",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1701,
            name: "Podere Poggio Scalette Il Carbonaione",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1703,
            name: "Frangelico",
            lq_type: 67,
            pkg_capacity: 1.00
        }, {
            product_id: 1704,
            name: "Rossi D'Asiago Limoncello",
            lq_type: 67,
            pkg_capacity: 1.00
        }, {
            product_id: 1705,
            name: "Caledon Hills Deadly Dark Lager",
            lq_type: 36,
            pkg_capacity: 24.00
        }, {
            product_id: 1709,
            name: "Peter Franus Napa Valley Cabernet Sauvignon",
            lq_type: 67,
            pkg_capacity: 12.00
        }, {
            product_id: 1710,
            name: "Mount Gay 1703 Master Select",
            lq_type: 67,
            pkg_capacity: 1.00
        }, {
            product_id: 1711,
            name: "Starmont Cabernet Sauvignon",
            lq_type: 66,
            pkg_capacity: 12.00
        }, {
            product_id: 1713,
            name: "Cordero di Montezemolo Barolo Monfalletto",
            lq_type: 36,
            pkg_capacity: 12.00
        }, {
            product_id: 1714,
            name: "Ornellaia Tenuta Dell'Ornallaia",
            lq_type: 67,
            pkg_capacity: 12.00
        }, {
            product_id: 1716,
            name: "Sassicaia",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 1717,
            name: "Altos de Losada La Bienquerida",
            lq_type: 67,
            pkg_capacity: 12.00
        }, {
            product_id: 1733,
            name: "Foppiano Petit Syrah",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1735,
            name: "Peter Franus Napa Valley Merlot",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1737,
            name: "Whitehall Lane Merlot",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1739,
            name: "Arak Of Lebanon",
            lq_type: 67,
            pkg_capacity: 1.00
        }, {
            product_id: 1747,
            name: "Terres de Berne",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1749,
            name: "Cava Kripta Brut Nature Gran Reserva",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 1752,
            name: "Tawse Winery Meritage",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1753,
            name: "Lungarotti Rubesco DOCG",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1756,
            name: "Floral de Vinya",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1765,
            name: "Degani Amarone Della Valpolicella La Rosta",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1766,
            name: "Cesari Amarone della Valpolicella Bosca Riserva",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1768,
            name: "Quintarelli Alzero",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 1771,
            name: "Louis Latour Château Corton Grancey Grand Cru",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1774,
            name: "Chateau Ducru Beaucaillou St Julien 2er Cru",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 1775,
            name: "Penfolds Grange",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 1780,
            name: "Hilltop Cabernet Sauvignon",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1781,
            name: "Duckhorn Vineyards Merlot",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1783,
            name: "Signorello Estate Cabernet Sauvignon",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 1784,
            name: "Signorello Padrone",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 1785,
            name: "Bond Cabernet Sauvignon",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 1792,
            name: "Modelo Especial",
            lq_type: 36,
            pkg_capacity: 24.00
        }, {
            product_id: 1795,
            name: "Dolcetto D'Alba",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1796,
            name: "Fondo Antico Syrah",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1800,
            name: "Degani Ciciio Valpolicella Classico Ripasso",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1802,
            name: "Cesari Ripasso Bosan",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1803,
            name: "Logonovo Montalcino",
            lq_type: 67,
            pkg_capacity: 12.00
        }, {
            product_id: 1804,
            name: "Farnese Fantini Edizione Cinque Autoctoni",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1805,
            name: "Finca Losada",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1808,
            name: "Chateau Teyssier Pezat Bordeaux Superior",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1811,
            name: "Lailey Cabernet Franc",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1812,
            name: "Vieilles Vignes Rouge Costières de Nîmes",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1813,
            name: "Vieilles Vignes Rouge Costières de Nîmes",
            lq_type: 36,
            pkg_capacity: 12.00
        }, {
            product_id: 1814,
            name: "Rosehall Run Pinot Noir",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1815,
            name: "Cordero Di Montezomolo Langhe Nebbiolo",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1816,
            name: "Cordero Di Montezomolo Langhe Nebbiolo",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1818,
            name: "Brigaldara Amarone della Valpolicella Classico",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1819,
            name: "Edge Cabernet Sauvignon",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1822,
            name: "Rocca Delle Macie Giulio Straccali Pinot Grigio",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1825,
            name: "Pellé Sancerre 'La Croix au Garde'",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1830,
            name: "Château De Maligney Chablis Primier Cru Vau de Vey",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1832,
            name: "Chateau De Maligny Chablis Carre de Cesar",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1834,
            name: "Regnard Petit Chablis",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1838,
            name: "Brunello Di Montalcino --dq--San Polo--dq--",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 1842,
            name: "Mastroberardino Greco di Tufo",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1845,
            name: "Windrush",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1846,
            name: "Jean-Luc Colombo Cornas --dq--les Ruchets--dq-- 2007",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 1848,
            name: "Rosso di Toscana",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1849,
            name: "J. Lohr Seven Oaks Cabernet Sauvignon",
            lq_type: 73,
            pkg_capacity: 1.00
        }, {
            product_id: 1850,
            name: "Penfolds Grange",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 1851,
            name: "Tawse Winery Meritage",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1852,
            name: "Chateau Ducru Beaucaillou St Julien 2er Cru",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 1854,
            name: "Sassicaia",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 1855,
            name: "Crozes-Hermitage",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1856,
            name: "Farnese Fantini Edizione Cinque Autoctoni",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1858,
            name: "Vigneti del Salento ZOLLA Primitivo",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1859,
            name: "Farnese Fantini Edizione Cinque Autoctoni",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1862,
            name: "Chateau Teyssier Pezat Bordeaux Superior",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1864,
            name: "Peter Franus Napa Valley Cabernet Sauvignon",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1866,
            name: "Bond Cabernet Sauvignon",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 1867,
            name: "Cesari Amarone della Valpolicella Bosca Riserva",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1870,
            name: "Jean-Luc Colombo Cornas --dq--les Ruchets--dq-- 2007",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 1871,
            name: "Lungarotti Rubesco DOCG",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1873,
            name: "Signorello Estate Cabernet Sauvignon",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 1883,
            name: "Argyle Pinot Noir",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1885,
            name: "Meldville Syrah",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1887,
            name: "Starmont Cabernet Sauvignon",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1889,
            name: "Rocca delle Macie Roccato IGT",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 1891,
            name: "Amarone Bosan",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 1893,
            name: "Duckhorn Vineyards Merlot",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1896,
            name: "Vini Fantini Calalenta IGP Rosato",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 1962,
            name: "Adesso Merlot (House)",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1963,
            name: "Fantini Pinot Grigio (House)",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1974,
            name: "St-Germain Elderflower Liqueur",
            lq_type: 67,
            pkg_capacity: 1.00
        }, {
            product_id: 1975,
            name: "Dr. McGillicuddy's Intense Butterscotch",
            lq_type: 67,
            pkg_capacity: 1.00
        }, {
            product_id: 1976,
            name: "Ciroc Pineapple",
            lq_type: 59,
            pkg_capacity: 1.00
        }, {
            product_id: 1977,
            name: "1800 Reposado Tequila",
            lq_type: 72,
            pkg_capacity: 1.00
        }, {
            product_id: 1980,
            name: "Fireball Cinnamon Whisky",
            lq_type: 68,
            pkg_capacity: 1.00
        }, {
            product_id: 1985,
            name: "Steam Whistle Pale Ale",
            lq_type: 36,
            pkg_capacity: 24.00
        }, {
            product_id: 1986,
            name: "Johnnie Walker Red Label Scotch Whisky",
            lq_type: 69,
            pkg_capacity: 1.00
        }, {
            product_id: 1987,
            name: "Kronenbourg 1664 Blanc",
            lq_type: 36,
            pkg_capacity: 24.00
        }, {
            product_id: 1988,
            name: "Dejado Tequila Blanco 100% Agave",
            lq_type: 72,
            pkg_capacity: 1.00
        }, {
            product_id: 1989,
            name: "Lost Craft Revivale",
            lq_type: 36,
            pkg_capacity: 24.00
        }, {
            product_id: 1990,
            name: "Lost Craft Summer Session Pils",
            lq_type: 36,
            pkg_capacity: 24.00
        }, {
            product_id: 1992,
            name: "Bottega Vino Poeti Brut rose (Rose Champagne)",
            lq_type: 74,
            pkg_capacity: 1.00
        }, {
            product_id: 1993,
            name: "Solid Ground Chardonnay",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 1994,
            name: "Cape Bleue Rose (Jean-Luc Colombo)",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2002,
            name: "Louis Latour Chateau Corton Grancey Grand Cru",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2003,
            name: "Amarone Bosan",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 2004,
            name: "Jean-Luc Colombo Cornas, Les Ruchets",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2013,
            name: "Caffo Vecchio Amaro Del Capo",
            lq_type: 66,
            pkg_capacity: 1.00
        }, {
            product_id: 2014,
            name: "Moët & Chandon Brut Imperial Champagne",
            lq_type: 74,
            pkg_capacity: 1.00
        }, {
            product_id: 2015,
            name: "Glenfiddich 18 Year Old Single Malt Scotch Whisky",
            lq_type: 69,
            pkg_capacity: 1.00
        }, {
            product_id: 2016,
            name: "Oban Little Bay Single Malt Scotch Whisky",
            lq_type: 69,
            pkg_capacity: 1.00
        }, {
            product_id: 2017,
            name: "Finca Losada",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2018,
            name: "Farnese Fantini Edizione Cinque Autoctoni",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2019,
            name: "Logonovo Montalcino",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2020,
            name: "Logonovo Montalcino",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2021,
            name: "Rocca delle Macie Roccato IGT",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 2024,
            name: "Vigneti del Salento ZOLLA Primitivo",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2025,
            name: "Gold Series, Vigne Vecchie, Primitivo Di Manduria",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2026,
            name: "Gold Series, Vigne Vecchie, Primitivo Di Manduria",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2027,
            name: "Fondo Antico Nero d'Avola",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2028,
            name: "Poggio Stenti Maremma Toscana Rosso",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2032,
            name: "Cordero Di Montezomolo Langhe Nebbiolo",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 2033,
            name: "Meldville Syrah",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2034,
            name: "Argyle Pinot Noir",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2035,
            name: "Jean-Luc Colombo Cornas, Les Ruchets",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2037,
            name: "DEI Rosso di Montepulciano",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2038,
            name: "DEI Rosso di Montepulciano",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2039,
            name: "Villa Bolgheri Tenuta",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 2040,
            name: "Villa Bolgheri Tenuta",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 2041,
            name: "Dolcetto D'Alba",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2043,
            name: "Fattoria le Pupille Saffredi",
            lq_type: 73,
            pkg_capacity: 1.00
        }, {
            product_id: 2044,
            name: "Fattoria le Pupille Saffredi",
            lq_type: 73,
            pkg_capacity: 1.00
        }, {
            product_id: 2045,
            name: "Zardini Valpolicella Ripasso",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2046,
            name: "Zardini Valpolicella Ripasso",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2049,
            name: "Fantini Montepulciano D'abruzzo",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2050,
            name: "Fantini Montepulciano D'abruzzo",
            lq_type: 73,
            pkg_capacity: 1.00
        }, {
            product_id: 2051,
            name: "Brunello di Montalcino --dq--La Gerla--dq--",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 2052,
            name: "Brunello di Montalcino --dq--La Gerla--dq--",
            lq_type: 73,
            pkg_capacity: 1.00
        }, {
            product_id: 2055,
            name: "Patron Silver Tequila ",
            lq_type: 72,
            pkg_capacity: 1.00
        }, {
            product_id: 2056,
            name: "Tito's Handmade Vodka",
            lq_type: 59,
            pkg_capacity: 1.00
        }, {
            product_id: 2057,
            name: "Brunello di Montalcino, Riserva --dq--La Lecciaia--dq--",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2058,
            name: "Brunello Di Montalcino --dq--San Polo--dq--",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 2059,
            name: "Brunello Di Montalcino --dq--San Polo--dq--",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 2060,
            name: "Grayson Estate Merlot",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2061,
            name: "Grayson Estate Cabernet Sauvignon",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2062,
            name: "Brunello di Montalcino, Riserva --dq--La Lecciaia--dq--",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2063,
            name: "Rubio Toscana IGT",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2064,
            name: "Rubio Toscana IGT",
            lq_type: 73,
            pkg_capacity: 1.00
        }, {
            product_id: 2065,
            name: "Sassi Chiusi Toscana",
            lq_type: 73,
            pkg_capacity: 1.00
        }, {
            product_id: 2066,
            name: "Sassi Chiusi Toscana",
            lq_type: 73,
            pkg_capacity: 1.00
        }, {
            product_id: 2069,
            name: "Solid Ground Chardonnay",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2072,
            name: "Chateau De Maligny Chablis Carre de Cesar",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2073,
            name: "Cape Bleue Rose (Jean-Luc Colombo)",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2074,
            name: "Floral de Vinya",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 2075,
            name: "Agusti Torello Mata",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2077,
            name: "J. Lohr Seven Oaks Cabernet Sauvignon",
            lq_type: 73,
            pkg_capacity: 1.00
        }, {
            product_id: 2078,
            name: "Calatroni Pinot 64 Spumante",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2079,
            name: "Bodegas Itsasmendi Txakoli",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2084,
            name: "Vigneti del Salento ZOLLA Primitivo",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2085,
            name: "Rosso di Montalcino; San Polo",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2086,
            name: "Rosso di Montalcino; San Polo",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2087,
            name: "Bricco Carlina Barbera d'Asti Superiore Bionzo",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2088,
            name: "Bricco Carlina Barbera d'Asti Superiore Bionzo",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2091,
            name: "Pouilly-Fuisse Vileilles Vignes ",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2092,
            name: "Pouilly-Fuisse Vileilles Vignes ",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2093,
            name: "Bersano Gavi Di Gavi",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2094,
            name: "Bersano Gavi Di Gavi",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2095,
            name: "2027 Cellars Riesling",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2096,
            name: "2027 Cellars Riesling",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2097,
            name: "Santa Barbara Winey; Chardonnay",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2098,
            name: "Santa Barbara Winey; Chardonnay",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2100,
            name: "Cesari Ripasso Bosan",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2103,
            name: "Empress 1908 Gin",
            lq_type: 60,
            pkg_capacity: 1.00
        }, {
            product_id: 2109,
            name: "Vini Fantini Calalenta IGP Rosato",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 2111,
            name: "Galliano",
            lq_type: 67,
            pkg_capacity: 1.00
        }, {
            product_id: 2112,
            name: "Tio Pepe Extra Dry Fino",
            lq_type: 73,
            pkg_capacity: 1.00
        }, {
            product_id: 2133,
            name: "Chateau De Maligny Chablis Carre de Cesar",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2134,
            name: "Chateau De Maligny Chablis Carre de Cesar",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2135,
            name: "Astoria Prosecco La Robinia",
            lq_type: 73,
            pkg_capacity: 1.00
        }, {
            product_id: 2136,
            name: "Windrush",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2137,
            name: "Solid Ground, Cabernet Sauvignon",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2138,
            name: "J.Lohr Hilltop Cabernet Sauvignon",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2139,
            name: "J.Lohr Hilltop Cabernet Sauvignon",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2140,
            name: "Taylor Fladgate 10-Year-Old Tawny Port",
            lq_type: 73,
            pkg_capacity: 1.00
        }, {
            product_id: 2141,
            name: "Cortel Napoleon VSOP Brandy",
            lq_type: 61,
            pkg_capacity: 1.00
        }, {
            product_id: 2142,
            name: "Drambuie",
            lq_type: 67,
            pkg_capacity: 1.00
        }, {
            product_id: 2143,
            name: "Rosso di Toscana --dq--Bevilo--dq--",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2144,
            name: "Barolo, Mauro Sebaste --dq--Tresuri--dq--",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 2145,
            name: "Barolo, Mauro Sebaste --dq--Tresuri--dq--",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 2146,
            name: "La Spinetta Pin",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 2147,
            name: "La Spinetta Pin",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 2148,
            name: "Shiraz Reserve --dq--Geoff Merrill McLaren Vale--dq--",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2151,
            name: "Finca La Florencia",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2152,
            name: "Castello di Querceto Chianti",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2153,
            name: "Earthquake",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2154,
            name: "Earthquake",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2155,
            name: "Shiraz, McPherson",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2156,
            name: "Shiraz, McPherson",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2157,
            name: "Villa Sandi Prosecco Il Fresco DOC",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2158,
            name: "Villa Sandi Prosecco Il Fresco DOC",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2165,
            name: "Cordero Di Montezomolo Langhe Nebbiolo",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 2172,
            name: "Zubr",
            lq_type: 36,
            pkg_capacity: 1.00
        }, {
            product_id: 2173,
            name: "Tatra Beer",
            lq_type: 36,
            pkg_capacity: 1.00
        }, {
            product_id: 2177,
            name: "Rubesco Vigna Monticchio Torgiano Rosso Riserva DOCG",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2179,
            name: "CAN Valle de la Orotava",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2186,
            name: "Amaro Tosolini",
            lq_type: 67,
            pkg_capacity: 6.00
        }, {
            product_id: 2212,
            name: "Tedeschi Amarone della Valpolicella",
            lq_type: 73,
            pkg_capacity: 1.00
        }, {
            product_id: 2214,
            name: "Castello Del Poggio Moscato",
            lq_type: 73,
            pkg_capacity: 1.00
        }, {
            product_id: 2215,
            name: "Prosecco DOC Treviso ",
            lq_type: 73,
            pkg_capacity: 24.00
        }, {
            product_id: 2216,
            name: "Grappa Sarpa Di Poli",
            lq_type: 71,
            pkg_capacity: 1.00
        }, {
            product_id: 2217,
            name: "Solid Ground Pinot Noir",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2218,
            name: "Solid Ground Pinot Noir",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2219,
            name: "Solid Ground Riesling",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2220,
            name: "Solid Ground Riesling",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2221,
            name: "Bepi Tosolini Arcano Grappa Friulano",
            lq_type: 71,
            pkg_capacity: 1.00
        }, {
            product_id: 2222,
            name: "Grappa Rialto",
            lq_type: 71,
            pkg_capacity: 1.00
        }, {
            product_id: 2223,
            name: "Sandro Bottega Club Grappa",
            lq_type: 71,
            pkg_capacity: 1.00
        }, {
            product_id: 2224,
            name: "Macallan 12 Year Old Double Cask",
            lq_type: 69,
            pkg_capacity: 1.00
        }, {
            product_id: 2227,
            name: "Goldschlager",
            lq_type: 67,
            pkg_capacity: 1.00
        }, {
            product_id: 2228,
            name: "Havana Club Original 3 Year Old",
            lq_type: 70,
            pkg_capacity: 1.00
        }, {
            product_id: 2229,
            name: "Martini Bianco Vermouth",
            lq_type: 64,
            pkg_capacity: 1.00
        }, {
            product_id: 2230,
            name: "Metaxa Five Star Brandy",
            lq_type: 61,
            pkg_capacity: 1.00
        }, {
            product_id: 2231,
            name: "Berta Valdavi Grappa di Moscato",
            lq_type: 71,
            pkg_capacity: 1.00
        }, {
            product_id: 2232,
            name: "Berta Lingera Amaro d'Erbe",
            lq_type: 4196,
            pkg_capacity: 1.00
        }, {
            product_id: 2238,
            name: "Evangelista Punch Abruzzo ",
            lq_type: 66,
            pkg_capacity: 1.00
        }, {
            product_id: 2239,
            name: "Cannonball Cabernet Sauvignon",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2241,
            name: "Angeline Pinot Noir",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2242,
            name: "Angeline Pinot Noir",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2243,
            name: "Lungarotti Rubesco Rosso di Torgiano DOC",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2244,
            name: "Lungarotti Rubesco Rosso di Torgiano DOC",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2245,
            name: "Casa Gheller Prosecco",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 2246,
            name: "Brunello di Montalcino --dq--La Gerla--dq--",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 2247,
            name: "Labbe Francois Cassis",
            lq_type: 67,
            pkg_capacity: 1.00
        }, {
            product_id: 2248,
            name: "Viticoltori Acquesi Brachetto D'Acqui",
            lq_type: 73,
            pkg_capacity: 1.00
        }, {
            product_id: 2249,
            name: "Ca Del Doge Chianti",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2250,
            name: "Ca Del Doge Chianti",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2253,
            name: "47 Anno Domini Moscato IGT Veneto",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2255,
            name: "47 Anno Domini Moscato IGT Veneto",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2256,
            name: "Rizieri - Barolo DOCG",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 2257,
            name: "Rizieri - Barolo DOCG",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 2258,
            name: "Col di Lamo - Brunello di Montalcino",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 2259,
            name: "Col di Lamo - Brunello di Montalcino",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 2260,
            name: "Rizieri - Nebbiolo d'Alba DOC",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 2261,
            name: "Rizieri - Nebbiolo d'Alba DOC",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 2262,
            name: "Rizieri - Nebbiolo d'Alba DOC",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 2263,
            name: "Nottola - Rosso di Montepulciano DOC",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2264,
            name: "Nottola - Rosso di Montepulciano DOC",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2265,
            name: "Concadoro - Chianti Classico Riserva",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2266,
            name: "Concadoro - Chianti Classico Riserva",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2267,
            name: "Vogadori - Valpolicella Classico Superiore Ripasso",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2268,
            name: "Vogadori - Valpolicella Classico Superiore Ripasso",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2269,
            name: "Lillet Blanc",
            lq_type: 66,
            pkg_capacity: 1.00
        }, {
            product_id: 2270,
            name: "Cardhu 12 Year Old Single Malt Scotch Whisky",
            lq_type: 69,
            pkg_capacity: 1.00
        }, {
            product_id: 2273,
            name: "Cazadores Reposado Tequila",
            lq_type: 72,
            pkg_capacity: 12.00
        }, {
            product_id: 2299,
            name: "Distilleria Montanaro Camomilla Liquore Grappa ",
            lq_type: 71,
            pkg_capacity: 1.00
        }, {
            product_id: 2300,
            name: "Clase Azul La Pinta Tequilla Pomegranate Liqueur",
            lq_type: 67,
            pkg_capacity: 1.00
        }, {
            product_id: 2301,
            name: "Clase Azul Plata Tequila",
            lq_type: 72,
            pkg_capacity: 1.00
        }, {
            product_id: 2302,
            name: "Vecchia Cantina Chianti",
            lq_type: 73,
            pkg_capacity: 24.00
        }, {
            product_id: 2303,
            name: "Vecchia Cantina Chianti",
            lq_type: 73,
            pkg_capacity: 24.00
        }, {
            product_id: 2304,
            name: "Soave Doc Classico",
            lq_type: 73,
            pkg_capacity: 24.00
        }, {
            product_id: 2305,
            name: "Soave Doc Classico",
            lq_type: 73,
            pkg_capacity: 24.00
        }, {
            product_id: 2306,
            name: "Amarone della Valpolicella Classico",
            lq_type: 73,
            pkg_capacity: 24.00
        }, {
            product_id: 2307,
            name: "Amarone della Valpolicella Classico",
            lq_type: 73,
            pkg_capacity: 24.00
        }, {
            product_id: 2308,
            name: "Octopoda Cabernet Sauvignon",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 2309,
            name: "Octopoda Cabernet Sauvignon",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 2310,
            name: "CB Chianti DOCG",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2311,
            name: "CB Chianti DOCG",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2312,
            name: "Amaro Marzadro",
            lq_type: 4196,
            pkg_capacity: 1.00
        }, {
            product_id: 2314,
            name: "The Glenlivet 12 Year Old Single Malt Scotch Whisky",
            lq_type: 69,
            pkg_capacity: 1.00
        }, {
            product_id: 2315,
            name: "Martini and Rossi Asti",
            lq_type: 74,
            pkg_capacity: 1.00
        }, {
            product_id: 2316,
            name: "Sleeman Original Draught",
            lq_type: 36,
            pkg_capacity: 24.00
        }, {
            product_id: 2317,
            name: "Sapporo",
            lq_type: 36,
            pkg_capacity: 24.00
        }, {
            product_id: 2318,
            name: "La Vieille Ferme Rose Ventoux AOC",
            lq_type: 73,
            pkg_capacity: 1.00
        }, {
            product_id: 2320,
            name: "Sleeman Original Draught Keg",
            lq_type: 36,
            pkg_capacity: 1.00
        }, {
            product_id: 2321,
            name: "Sapporo Keg",
            lq_type: 36,
            pkg_capacity: 1.00
        }, {
            product_id: 2322,
            name: "Barolo Serralunga",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 2323,
            name: "Barolo Serralunga",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 2326,
            name: "Beer Gas",
            lq_type: 76,
            pkg_capacity: 1.00
        }, {
            product_id: 2329,
            name: "Glenrothers 12 Year Old",
            lq_type: 69,
            pkg_capacity: 1.00
        }, {
            product_id: 2330,
            name: "Produttori Del Barbaresco Barbaresco DOCG",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 2331,
            name: "Produttori Del Barbaresco Barbaresco DOCG",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 2332,
            name: "Wray & Nephew White Overproof Rum",
            lq_type: 70,
            pkg_capacity: 1.00
        }, {
            product_id: 2333,
            name: "Sassetti Livio Pertimali Brunello di Montalcino",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 2334,
            name: "Sassetti Livio Pertimali Brunello di Montalcino",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 2336,
            name: "Fantini Chardonnay",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2337,
            name: "Swish Gin",
            lq_type: 60,
            pkg_capacity: 1.00
        }, {
            product_id: 2338,
            name: "True Theory Vodka",
            lq_type: 59,
            pkg_capacity: 1.00
        }, {
            product_id: 2358,
            name: "Yarran Shiraz",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2359,
            name: "Yarran Shiraz",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2360,
            name: "Astrolabe Sauvignon Blanc",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2361,
            name: "Astrolabe Sauvignon Blanc",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2362,
            name: "Cannonball Chardonnay",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2363,
            name: "Cannonball Chardonnay",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2364,
            name: "Grayson Estate Cabernet Sauvignon",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2365,
            name: "Laphroaig Select Islay Single Malt Scotch Whisky",
            lq_type: 69,
            pkg_capacity: 1.00
        }, {
            product_id: 2377,
            name: "Altesino Brunello di Montalcino",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2378,
            name: "Altesino Brunello di Montalcino",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2381,
            name: "Mohua Sauvignon Blanc",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2382,
            name: "Mohua Sauvignon Blanc",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2383,
            name: "Maggio Family Vineyards Cabernet Sauvignon",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2384,
            name: "Maggio Family Vineyards Cabernet Sauvignon",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2385,
            name: "Amarone Bosan",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 2386,
            name: "Cape Bleue Rose (Jean-Luc Colombo)",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2390,
            name: "CA’ROME’ Barbaresco Rio Sordo DOCG",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 2391,
            name: "CA’ROME’ Barbaresco Rio Sordo DOCG",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 2392,
            name: "Rosso di Toscana",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2393,
            name: "Precision Napa Valley Cabernet Sauvignon",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2394,
            name: "Precision Napa Valley Cabernet Sauvignon",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2406,
            name: "Spring Mill Distillery Vodka",
            lq_type: 59,
            pkg_capacity: 1.00
        }, {
            product_id: 2407,
            name: "Spring Mill Distillery Gin",
            lq_type: 60,
            pkg_capacity: 1.00
        }, {
            product_id: 2428,
            name: "Dashe Cellars Zinfandel Vineyard Select",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2429,
            name: "Dashe Cellars Zinfandel Vineyard Select",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2430,
            name: "Olmeca Altos Plata",
            lq_type: 72,
            pkg_capacity: 1.00
        }, {
            product_id: 2431,
            name: "The Glenlivet Caribbean Reserve Single Malt Scotch",
            lq_type: 69,
            pkg_capacity: 1.00
        }, {
            product_id: 2432,
            name: "Tequila Rose Strawberry Cream Liqueur",
            lq_type: 67,
            pkg_capacity: 1.00
        }, {
            product_id: 2436,
            name: "Stags' Leap Winery Cabernet Sauvignon",
            lq_type: 73,
            pkg_capacity: 1.00
        }, {
            product_id: 2437,
            name: "Stags' Leap Winery Cabernet Sauvignon, V: 2019",
            lq_type: 73,
            pkg_capacity: 1.00
        }, {
            product_id: 2440,
            name: "Avignonesi Vino Nobile di Montepulciano",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2441,
            name: "Avignonesi Vino Nobile di Montepulciano, V: 2017",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2442,
            name: "Duckhorn Decoy Cabernet Sauvignon",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2443,
            name: "Duckhorn Decoy Cabernet Sauvignon, V: 2020",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2444,
            name: "Volpaia Chianti Classico Riserva",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 2445,
            name: "Volpaia Chianti Classico Riserva, V: 2019",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 2446,
            name: "Buehler Cabernet Sauvignon Napa Valley",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2447,
            name: "Buehler Cabernet Sauvignon Napa Valley, V: 2019",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2448,
            name: "Casamigos Tequila Blanco",
            lq_type: 72,
            pkg_capacity: 1.00
        }, {
            product_id: 2449,
            name: "Valpolicella Classico Superiore Ripasso --dq--Cicilio--dq-- DOC",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2450,
            name: "Valpolicella Classico Superiore Ripasso --dq--Cicilio--dq-- DOC, V: 2020",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2451,
            name: "Sassarello Toscana IGT",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2452,
            name: "Sassarello Toscana IGT, V: 2016",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2453,
            name: "Bersano Barolo, Nirvasco",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 2454,
            name: "Bersano Barolo, Nirvasco, V: 2017",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 2455,
            name: "Rocca delle Macie Chianti Classico",
            lq_type: 73,
            pkg_capacity: 24.00
        }, {
            product_id: 2456,
            name: "Rocca delle Macie Chianti Classico, V: 2020",
            lq_type: 73,
            pkg_capacity: 24.00
        }, {
            product_id: 2457,
            name: "J. Lohr Merlot, Los Osos",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2458,
            name: "J. Lohr Merlot, Los Osos, V: 2020",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2459,
            name: "Rocca Delle Macie Giulio Straccali Pinot Grigio",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2460,
            name: "J. Lohr Cabernet Sauvignon, Seven Oaks",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2462,
            name: "J. Lohr Cabernet Sauvignon, Seven Oaks",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2463,
            name: "Cesari Ripasso, Bosan",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2464,
            name: "Cesari Ripasso, Bosan, V: 2018",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2465,
            name: "Hill & Blade Lodi Zinfandel",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2466,
            name: "Hill & Blade Lodi Zinfandel, V: 2018",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2467,
            name: "Col di Lamo - Brunello di Montalcino",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 2468,
            name: "Col di Lamo - Brunello di Montalcino, V: 2013",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 2476,
            name: "Appleton Estate V/X Signature Blend",
            lq_type: 70,
            pkg_capacity: 1.00
        }, {
            product_id: 2477,
            name: "Brunello Di Montalcino --dq--San Polo--dq--",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 2478,
            name: "J. Lohr Hilltop Cabernet Sauvignon",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2479,
            name: "J. Lohr Hilltop Cabernet Sauvignon, V: 2012",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2480,
            name: "Castelgreve Riserva Chianti Classico",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2481,
            name: "Castelgreve Riserva Chianti Classico, V: 2018",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2482,
            name: "Castello di Volpaia Riserva Chianti Classico",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2483,
            name: "Castello di Volpaia Riserva Chianti Classico, V: 2019",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2649,
            name: "Dalwhinnie 15 Year Old Single Highland Malt Scotch Whisky",
            lq_type: 69,
            pkg_capacity: 1.00
        }, {
            product_id: 2657,
            name: "test",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2658,
            name: "test2",
            lq_type: 73,
            pkg_capacity: 4.00
        }, {
            product_id: 2660,
            name: "kjhui",
            lq_type: 67,
            pkg_capacity: 12.00
        }, {
            product_id: 2663,
            name: "hello",
            lq_type: 73,
            pkg_capacity: 20.00
        }, {
            product_id: 2667,
            name: "hello2",
            lq_type: 73,
            pkg_capacity: 12.00
        }, {
            product_id: 2670,
            name: "Pineapple Juice",
            lq_type: 75,
            pkg_capacity: 1.00
        }, {
            product_id: 2671,
            name: "Lime Juice",
            lq_type: 75,
            pkg_capacity: 1.00
        }, {
            product_id: 2672,
            name: "test1212",
            lq_type: 73,
            pkg_capacity: 4.00
        }, {
            product_id: 2676,
            name: "hello",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 2677,
            name: "hello",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 2678,
            name: "hello",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 2681,
            name: "test12",
            lq_type: 73,
            pkg_capacity: 4.00
        }, {
            product_id: 2682,
            name: "test13",
            lq_type: 60,
            pkg_capacity: 12.00
        }, {
            product_id: 2685,
            name: "test12",
            lq_type: 73,
            pkg_capacity: 4.00
        }, {
            product_id: 2686,
            name: "test133",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 2687,
            name: "test133, V: 2024",
            lq_type: 73,
            pkg_capacity: 6.00
        }, {
            product_id: 2689,
            name: "ps111",
            lq_type: 71,
            pkg_capacity: 4.00
        }];
        var inv_levels_arr = [{
            inv_level_id: 3,
            level_name: "Banquet Hall Liquor Room"
        }, {
            inv_level_id: 6,
            level_name: "Greenhouse Liquor Room"
        }, {
            inv_level_id: 4,
            level_name: "Beer Fridge (East)"
        }, {
            inv_level_id: 5,
            level_name: "Beer Fridge (West)"
        }, {
            inv_level_id: 7,
            level_name: "Greenhouse Beer Fridge"
        }, {
            inv_level_id: 10,
            level_name: "Conservatory Beer Fridge"
        }, {
            inv_level_id: 2,
            level_name: "2nd. Floor Wine Room "
        }, {
            inv_level_id: 1,
            level_name: "1st. Floor Wine Room"
        }, {
            inv_level_id: 11,
            level_name: "Consulate Warehouse"
        }];

        $(function() {
            // Fill in the warehouse locations drop-down
            var warehouse_locs = '';
            for (var i in inv_levels_arr) {
                warehouse_locs += '<span value="' + inv_levels_arr[i].inv_level_id + '">' +
                    inv_levels_arr[i].level_name +
                    '</span>';
            }
            $("#warehouse_locs").html(warehouse_locs);

            // ********************** Convert to Drop-down **************************************

            $("#warehouse_locs").azbdDropDown({
                onChange: function() {
                    if (in_move) // If we are moving items, then show the move box
                        openDialogToMoveBarItems("warehouse", $(this));
                    else
                        showLiquorInvForCheckout();
                }
            });

            $(document).on("click", ".btn_show_inv_items_cancel", function() {
                $("#inv_items_for_checkout").slideUp(300, function() {
                    $("#inv_items_for_checkout").html('');
                    $("#inv_items_for_checkout").css('display', 'block');
                    $("#txt_search_inv_items").val('');
                });
            });

            $(document).on("change", "#txt_search_inv_items", function() {
                getLiqourInventory();
            });

            // After keyup wait for sometime before refreshing. Otherwise it does not let user type in
            // more than 1 character
            var refresh_timer;
            $(document).on("keyup", "#txt_search_inv_items", function() {
                refresh_timer = setTimeout(function() {
                    getLiqourInventory();
                }, 600);
            }).on("keydown", "#txt_search_inv_items", function() {
                clearTimeout(refresh_timer);
            });

            $(document).on("click", ".btn_show_all_items", function() {
                $("#txt_search_inv_items").val('');
                getLiqourInventory();
            });
        }); // document.ready

        // Retrieves the list of liqour inventor
        function getLiqourInventory() {
            var params = 'search_str=' + xmlbEncodeForAJAX($("#txt_search_inv_items").val());

            runStoredProcedure("show_inv_items", "liquor_bar_console", "get_all_liqour_inventory", params,
                "showLiquorInvForCheckout('#sproc_result#') ;");
        } // getLiqourInventory

        // Shows the array on screen
        function showLiquorInvForCheckout(return_data) {
            if (return_data) // Do this only if we get data. Otherwise user has only changed the warehouse
            {
                inv_items = JSON.parse(return_data);
                inv_items = inv_items.inv_items;
            }

            var cur_inv_level_id = $("#warehouse_locs").azbdDropDown("get");
            var cur_lq_list_id = $("#lq_lists").azbdDropDown("get");

            var cur_product_id = null; // Keep product id here so when it changes we show product header

            var items_html = '';
            var row_num = 1;
            for (var i in inv_items) {
                var inv_item = inv_items[i]; // Shorten syntax

                // If a liquor list is selected, make sure to show only the ones in that
                // list 
                if (cur_lq_list_id != "----") {
                    var found_in_list = false;
                    for (var j in lq_lists) {
                        if (lq_lists[j].id == cur_lq_list_id) {
                            for (var k in lq_lists[j].items) {
                                if (lq_lists[j].items[k] == inv_item.product_id) {
                                    found_in_list = true;
                                    break;
                                }
                            }
                            break;
                        }
                    }
                    // If we should an specific liquor list and this item is not on it, then
                    // skip
                    if (!found_in_list)
                        continue;
                } // Liquor list selected

                // Show product name and favorite icon if any
                var prod_name = inv_item.product_name.replace(/--dq--/g, '"');
                var fav_sts = '';
                if (inv_item.favorite_status == 2)
                    fav_sts = ' <img src="/images/icon_favorite.png" title="Favorite Item" />';

                if (cur_product_id != inv_item.product_id) {
                    if (items_html != '')
                        items_html += '</div>'; // Close previous one

                    // Open a new product box
                    items_html += '<div class="product_wrap" product_id="' + inv_item.product_id + '"' +
                        ' pkg_capacity="' + inv_item.pkg_capacity + '">';
                    items_html +=
                        '<h2><a href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=' +
                        inv_item.product_id + '"' +
                        ' tabindex="-1" target="_blank">' + prod_name + fav_sts + '</a>' +
                        '<span>' + ' / ' + inv_item.pkg_name +
                        ' (' + inv_item.type + ')' + '</span></h2>';

                    // Add title row
                    items_html += '<p class="inv_item_row header"><span>Location</span><span>Avbl Qty</span> \
                              <span>Cases</span><span>Singles</span></p>';
                }

                // Add each row
                items_html += '<p class="inv_item_row actual_body" inv_item_id="' + inv_item.inv_item_id + '"' +
                    ' lq_type_id="' + inv_item.lq_type_id + '">';

                items_html += '<span>' + inv_item.level_name.replace(/--dq--/g, '"') + '</span>';

                // Show qty in warehouse minus what is being checked out. 
                var qty = inv_item.qty;

                // Say we search for Corona and we have 10 in stock. Then we add 2 to the card so now we have 8
                // Then we search for something else and search for Corona again. Now it shows 10 because
                // we still have 10 in database. That is why we should deduct the qty of database from what 
                // has been added to card 
                var already_checked_out = $(".checkout_lines p[inv_item_id=" + inv_item.inv_item_id + "]");
                if (already_checked_out.length != 0)
                    qty -= parseFloat(already_checked_out.attr("qty"));

                items_html += '<span class="qty" value="' + inv_item.qty + '">' + qty + '</span>';

                // Add two boxes so user can select cases and singles to add to the bar 

                if (cur_inv_level_id == inv_item.inv_level_id) {
                    // Allow user to checkout only if this is the current location where user is

                    // By case
                    items_html += '<span><input type="number" class="qty_case" step="0" \
                                      value="0" min="0" />' +
                        '</span>';

                    // Singles              
                    items_html += '<span><input type="number" class="qty_single" step=".01" \
                                      value="0" min="0" />' +
                        '</span>';

                    // Add checkmark at the end
                    items_html += '<span>' +
                        '<button class="btn_add_to_list"><i class="fas fa-check"></i></button>' +
                        '</span>';
                } else {
                    items_html += '<span></span><span></span><span></span>';
                }

                items_html += '</p>';

                // Ready for next loop
                cur_product_id = inv_item.product_id;
            } // Each product 

            if (items_html != '')
                items_html += '</div>'; // Close the last warehouse level

            // Render on screen
            $(".checkout_wrap").slideDown(100, function() {
                $("#inv_items_for_checkout").html(items_html);
            });

            // Add the +/- buttons
            $("#inv_items_for_checkout").find(".qty_case, .qty_single").each(function() {
                var prod_info = getProductBaseInfo($(this).closest(".product_wrap").attr("product_id"));

                // Make sure to set the step to .25 for non beer products
                var qty_step = 1;
                if ($(this).hasClass("qty_single") && prod_info.lq_type != 23)
                    qty_step = .25;

                $(this).azbNumberPlugin({
                    add_num_pad: false,
                    step: qty_step,
                    validateBefore: validateCheckoutQtys
                });
            });

            // Set focus back to search box
            focus_timer = new azbdTimeout(function() {
                $("#txt_search_inv_items").focus();
            }, 1200, 'focus_timer'); // Give it enought time or focus will not work
        } // showLiquorInvForCheckout

        var focus_timer;

        function azbdTimeout(fn, interval, timer_name) {
            // Becuase we may have different timers at the same time, this will make
            // sure they do not collide in self object
            timer_name = 'azbd_' + timer_name;
            self.timer_name = 'not_cleared'; // Inside of setTimeout we only have access to self

            this.cleared = false; // This is for quick test by onclick function if needed 
            var id = setTimeout(function() {
                if (self.timer_name == "not_cleared")
                    fn();
            }, interval);

            this.clear = function() {
                self.timer_name = 'clear'; // Set in self so we can have access in setTimeout
                this.cleared = true; // This is for quick test by onclick 
                clearTimeout(id); // Does not do much, only clears browser
            };
        }

        $(function() {
            // If user is clickin anywhere else on the document, then cancel the focus
            // otherwise it will take user back to search bar
            $(document).on("click", function() {
                if (focus_timer && !focus_timer.cleared)
                    focus_timer.clear();
            });
        }); // document.ready

        // Makes sure total qty to checkout including cases and singles does not exceed avbl qty
        function validateCheckoutQtys(num_input, new_val) {
            var result = true;

            var pkg_capacity = num_input.closest(".product_wrap").attr("pkg_capacity");
            var parent_row = num_input.closest(".inv_item_row ");

            var total_new_qty = 0;
            if (num_input.hasClass("qty_case")) {
                // If we are changing the case qty, then multiply by package capcity
                total_new_qty += parseInt(new_val * pkg_capacity) +
                    parseFloat(parent_row.find(".qty_single").val());
            } else {
                // If we are chaging single qty, then add it to the totals by case
                total_new_qty += parseFloat(new_val) +
                    parseInt(parent_row.find(".qty_case").val() * pkg_capacity);
            }

            if (total_new_qty > parent_row.find(".qty").attr("value")) {
                xmlbWarn("Max qty reached!");
                result = false;
            }

            return result;
        } // validateCheckoutQtys        
        </script>

        <style type="text/css">
        .inv_item_row {
            display: grid;
            grid-template-columns: 25% 8% 20% 20% auto;
        }

        .inv_item_row span {
            font-size: 1.3em;
            line-height: 160%;
        }

        .product_wrap h2 {
            background: #0e3244;
            padding: .4em;
        }

        .product_wrap h2 img {
            max-width: 1.5em;
            margin: 0 0 -.45em .3em;
        }

        .product_wrap h2 a {
            text-decoration: none;
            color: #FFF;
        }

        .product_wrap h2 span {
            color: #FFF;
            margin-left: 1.5em;
        }

        .inv_item_row input[type=number] {
            width: 1.8em;
            height: 1em;
            font-size: 2.9em;
            -moz-appearance: textfield;
        }

        .inv_item_row .btn_add_to_list {
            color: #34A853;
            cursor: pointer;
            font-size: 2.9em;
            margin: .2em;
            background-color: transparent;
            background: #FFF;
        }
        </style>



        <script type="text/javascript">
        $(function() {
            // When user clicks on the checkmark, then add that item to the summary on the side
            $(document).on("click", ".btn_add_to_list", function() {
                var parent_row = $(this).closest(".inv_item_row");
                if (!addRowToCheckoutSummary(parent_row))
                    xmlbWarn("Nothing picked!");
            });
        }); // document.ready

        function addRowToCheckoutSummary(this_row) {
            var pkg_capacity = this_row.closest(".product_wrap").attr("pkg_capacity");

            // Calculate total qty for this row and add it to summary
            var qty_single = this_row.find(".qty_single").val();
            var qty_case = this_row.find(".qty_case").val();
            var total_qty = parseFloat(qty_single) + parseInt(qty_case * pkg_capacity);

            // Nothing to add so return false to caller so it can show error if needed 
            if (total_qty <= 0)
                return false;

            // Add the line to summary
            var row = '<p inv_item_id="' + this_row.attr("inv_item_id") + '" qty="' + total_qty + '">';

            // Find the name of this item from global inv_items array to show on checkout summary
            var lq_name = '';
            for (var i in inv_items) {
                if (inv_items[i].inv_item_id == this_row.attr("inv_item_id")) {
                    lq_name = inv_items[i].product_name.replace(/--dq--/g, '"');
                    break;
                }
            }
            row += '<span>' + lq_name + '</span>';

            // Add qtys by case and single
            row += '<span class="qty_case">' + qty_case + '</span><span class="qty_single">' + qty_single + '</span>';

            // Add a button so user can cancel this line
            row += '<span class="btn_cancel_line"><i class="fas fa-times-circle"></i></span>';

            // Close row and add to result
            row += '</p>';
            $(".checkout_lines").append(row);

            // Also show checkout if not alreay there
            if ($(".checkout_summary").css("display") == "none")
                $(".checkout_summary").show(300);


            // Now set this line to zero so user does not reclick
            this_row.find(".qty_single").val(0);
            this_row.find(".qty_case").val(0);

            // Also update qty for next round if any
            var new_row_qty = parseFloat(this_row.find(".qty").attr("value")) - total_qty;
            this_row.find(".qty").attr("value", new_row_qty);
            this_row.find(".qty").text(new_row_qty);

            return true;
        } // addRowToCheckoutSummary

        // Finds and returns the entry that contains the base info about a product like package capacity
        // or liquor type
        function getProductBaseInfo(product_id) {
            var result = false;

            for (var i in lq_prods_info) {
                if (lq_prods_info[i].product_id == product_id) {
                    result = lq_prods_info[i];
                    break;
                }
            }

            return result;
        } // getProductBaseInfo
        </script>


        <style type="text/css">
        .checkout_lines p {
            display: grid;
            grid-template-columns: 65% 10% 10% auto;
            line-height: 120%;
        }

        .checkout_lines p span {
            font-size: 1.1em;
        }

        .checkout_lines p .btn_cancel_line {
            cursor: pointer;
            color: #99001E;
        }
        </style>



        <script type="text/javascript">
        var lq_lists = [{
            id: 2,
            name: "Premium--sp--Bar",
            items: [1977, 1399, 1572, 1414, 1464, 1517, 1412, 1426, 1397, 1418, 1419, 1545, 933, 1486, 1436,
                1400, 1462, 1975, 1703, 1421, 1468, 1424, 1487, 1410, 1469, 607, 1654, 1570, 1470, 1415,
                1626, 1417, 1478, 1471, 1465, 1473, 1466, 1481, 1482, 1472, 1479, 1637, 1423, 1425, 2689,
                1453, 1406, 1704, 1704, 1474, 1445, 1475, 1444, 1476, 1974, 1504, 1401
            ]
        }, {
            id: 1,
            name: "Standard--sp--Bar",
            items: [1517, 1412, 1484, 1485, 1488, 1415, 1490, 1425, 1453, 1504, 1401]
        }];
        $(function() {
            // First build the drop-down for liquor list
            var lq_list_dd = '<span value="----">----</span>';
            for (var i in lq_lists) {
                lq_list_dd += '<span value="' + lq_lists[i].id + '">' +
                    xmlbDecodeFromAJAX(lq_lists[i].name) + '</span>';
            }
            $("#lq_lists").html(lq_list_dd);

            // Convert list to drop-down 
            $("#lq_lists").azbdDropDown({
                onChange: function(e) {
                    showLiquorInvForCheckout();
                }
            });
        }); // document.ready
        </script>

        <style type="text/css">
        #lq_lists {
            left: 62em;
        }
        </style>



        <style type="text/css">
        .inv_item_search strong {
            font-size: 1.5em;
        }

        #show_inv_items {
            margin-top: .2em;
            display: block;
        }

        .checkout_wrap {
            border: 2px solid #000;
        }

        #txt_search_inv_items {
            font-size: 1.3em;
        }

        #inv_items_for_checkout {
            margin-bottom: 1.2em;
        }
        </style>
    </span>
    <span id="do_checkout" class="xmlb_form">
        <div class="card checkout_summary">
            <div>
                <h2>Checkout Summary</h2>
                <div class="checkout_lines">
                    <p class="header"><span>Name</span><span>Cases</span><span>Singles</span><span></span></p>
                </div>
                <span class="btn_complete_checkout big_button">Continue</span>
            </div>
        </div>


        <script type="text/javascript">
        $(function() {
            $(document).on("click", ".btn_cancel_line", function() {
                var parent_row = $(this).closest("p");

                // Keep this to adjust the qty in the original line
                var inv_item_id = parent_row.attr("inv_item_id");
                var this_qty = parseFloat(parent_row.attr("qty"));
                parent_row.remove();

                // Now add the qty back to the original row where we checked this from
                var org_row = $(".inv_item_row[inv_item_id=" + inv_item_id + "]");
                if (org_row.length !=
                    0) // User could have searched for something else and that line is no longer there
                {
                    var new_qty = parseFloat(org_row.find(".qty").attr("value")) + this_qty;
                    org_row.find(".qty").text(new_qty);
                    org_row.find(".qty").attr("value", new_qty);
                }

                // If there is no more checkout lines, then hide the checkout bar
                var checkout_lines = $(".checkout_lines").find('p[inv_item_id]');
                if (checkout_lines.length == 0)
                    hideCheckoutSummary();
            })
        }); // document.ready
        </script>


        <script type="text/javascript">
        $(function() {
            $(document).on("click", ".btn_complete_checkout", function() {
                // First check to make sure a bar is selected
                var lqbar_id;
                if ($(".bar_wrap.picked").length == 0) {
                    xmlbWarn("Please select the bar!");
                    return;
                } else
                    lqbar_id = $(".bar_wrap.picked").attr("lqbar_id");

                // Build a json string to add the given items to the current bar
                var bar_items = '';
                $(".checkout_lines p[inv_item_id]").each(function() {
                    if (bar_items != "")
                        bar_items += ",";

                    bar_items += '{"inv_item_id": "' + $(this).attr("inv_item_id") + '"' +
                        ', "qty_case": "' + $(this).find(".qty_case").text() + '"' +
                        ', "qty_single": "' + $(this).find(".qty_single").text() + '"' +
                        '}';
                });
                if (bar_items == '') {
                    xmlbWarn("No items to be added!");
                    return;
                }
                bar_items = '{"bar_items": [' + bar_items + ']}';

                var prog = '$bar_items_info = addItemsToLiquorBar(' + lqbar_id + ',\'' + bar_items +
                    '\') ;' +
                    "\n" + '$prog_result = "doAfterItemsAddedToBar(' + lqbar_id +
                    ',\'" . $bar_items_info . "\') ;" ;';
                console.log("prog: " + prog); // debug alert

                runBackEndProg(prog);
            });
        }); // document.ready

        // Updates screen after items were added to a bar
        function doAfterItemsAddedToBar(new_lqbar_id, bar_items_info) {
            var new_bar_items = JSON.parse(bar_items_info);
            new_bar_items = new_bar_items.bar_items; // Shorten syntax

            // Now add each of the newly added bar items to the global array of bar items and refresh the
            // given bar
            for (var i in new_bar_items) {
                var bar_item = new_bar_items[i]; // Shorten syntax

                // First see if this bar item is already in the list or not. Say we have Corona and then add
                // more Corona. So lq_bar_item_id stays the same and only qty is increased. So we should 
                // first check if this item was already in the array or not
                var item_found = false;
                var item_idx; // The index of the found item in all_bar_items array
                for (var j in all_bar_items) {
                    if (all_bar_items[j].lqbar_id == new_lqbar_id &&
                        all_bar_items[j].lqbar_item_id == bar_item.lqbar_item_id) {
                        item_found = true;
                        item_idx = j;
                        break;
                    }
                }

                // If bar item was found in all_bar_items array, then only increase qty
                if (item_found) {
                    all_bar_items[item_idx].qty = parseFloat(all_bar_items[item_idx].qty) +
                        parseFloat(bar_item.qty);
                } else {
                    // Was not already in the array so add it
                    var new_bar_item = {
                        lqbar_id: new_lqbar_id,
                        lqbar_item_id: bar_item.lqbar_item_id,
                        prod_name: xmlbDecodeFromAJAX(bar_item.prod_name),
                        product_id: bar_item.product_id,
                        qty: bar_item.qty,
                        type_name: xmlbDecodeFromAJAX(bar_item.type_name)
                    };
                    all_bar_items.push(new_bar_item);
                }
            } // Each new bar item

            // Finally display on screen
            displayCurrentBarItems();
            $("#inv_items_for_checkout").html('');
            inv_items = [];

            // At the end close the checkout summary div
            hideCheckoutSummary();
        } // doAfterItemsAddedToBar

        function hideCheckoutSummary() {
            $(".checkout_summary").hide(300, function() {
                $(".checkout_lines").html('');
                $("#txt_search_inv_items").val('');
            });
        }
        </script>



        <style type="text/css">
        .checkout_summary {
            position: fixed;
            top: 6em;
            right: .1em;
            width: 30%;
            opacity: .92;
            background: #FFF;
            display: none;
        }
        </style>
    </span>
    <span id="handle_move_bar_items" class="xmlb_form">
        <script type="text/javascript">
        $(function() {
            // When user clicks on a bar item, highlight it so user can select to move them all at once
            $(document).on("click", ".bar_item", function(e) {
                // Make sure user has not clicked on the href
                if (e.target.tagName == "A")
                    return;

                if (!$(this).hasClass("bi_picked"))
                    $(this).addClass("bi_picked");
                else
                    $(this).removeClass("bi_picked");
            });
        }); // document.ready

        function initDragAndDropBarItems() {
            // *************** Make bar items draggable *****************

            $(".bar_item").draggable({
                start: function(event, ui) {
                    $(event.target).addClass("bi_picked");
                    $(event.target).attr("org_top", $(this).css("top"));
                    $(event.target).attr("org_left", $(this).css("left"));
                },
                stop: function(event, ui) {
                    $(event.target).removeClass("bi_picked");
                },
                revert: 'invalid'
            });

            // Make bar droppable
            makeBarsDroppable()
        } // initDragAndDropBarItems

        function makeBarsDroppable() {
            $(".bar_wrap").droppable({
                drop: doAfterBarItemDroppedForMove,
                accept: '.bar_item'
            });
        } // makeBarsDroppable

        function doAfterBarItemDroppedForMove(event) {
            var bar_wrap = $(event.target);
            openDialogToMoveBarItems("bar", bar_wrap);
        } // doAfterBarItemDroppedForMove

        // After a bar item is dropped to another bar, this fucntion is called to open the pop-up for
        // qty selection and move
        // Also the same function is called when items are moved from bar back to wahrehouse
        function openDialogToMoveBarItems(move_to_type, move_to_object) {
            if (move_to_type == "bar") {
                var move_to_id = move_to_object.attr("lqbar_id");
                var move_to_name = move_to_object.find(".room_name").text() +
                    ' / ' + move_to_object.find(".bartender").text();
            } else {
                var move_to_id = $("#warehouse_locs").azbdDropDown("get");
                var move_to_name = $("#warehouse_locs").azbdDropDown("getName");
            }

            // Open a popup so user can see where he is dropping the items and continue
            var move_box = '<div class="move_box" move_to_type="' + move_to_type + '" \
                                                            move_to_id="' + move_to_id + '">';

            // Show the destination bar info
            move_box += '<h2>Move Items to: ' + move_to_name + '</h2><hr />';

            // Now add one line for each item that is being moved

            // Add title row
            var items_to_move = '<p class="move_item_row header"><span>Name</span><span>Qty</span> \
                                  <span>Cases</span><span>Singles</span></p>';

            var row_num = 1;
            $(".bar_item.bi_picked").each(function() {
                // Show product name and favorite icon if any
                var prod_name = $(this).find(".prod_name").text();
                var qty = $(this).find(".qty").text();

                // Find qty per package
                var prod_info = getProductBaseInfo($(this).attr("product_id"));
                if (prod_info.pkg_capacity > 1)
                    prod_name += ' / ' + prod_info.pkg_capacity + ' per case';

                // Add each row
                items_to_move += '<p class="move_item_row actual_body"' +
                    ' lqbar_item_id="' + $(this).attr("lqbar_item_id") + '"' +
                    ' product_id="' + $(this).attr("product_id") + '"' +
                    ' pkg_capacity="' + prod_info.pkg_capacity + '">';

                // Liquor name
                items_to_move += '<span>' + row_num + ') ' + prod_name + '</span>';

                // Qty
                items_to_move += '<span class="qty" value="' + qty + '">' + qty + '</span>';

                // Add two boxes so user can select cases and singles to add to the bar 

                // By case
                items_to_move += '<span><input type="number" class="qty_case" step="0" \
                                      min="0" value="0" /></span>';

                // Singles              
                items_to_move += '<span><input type="number" class="qty_single" step=".01" \
                                      value="0" min="0" /></span>';

                // Also add a button so user can select and move this item entirely
                items_to_move += '<span class="btn_move_all"><i class="fas fa-battery-full"></i></span>';

                items_to_move += '</p>';

                row_num++;
            }); // Each item being dropped 

            move_box += items_to_move;

            // Add the continue button
            move_box += '<br /><span class="btn_move_items_continue big_button">Continue</span>' +
                ' <span class="btn_move_items_cancel big_button">Cancel</span>';

            move_box += '</div>';

            $(move_box).dialog({
                modal: true,
                width: 980,
                title: 'Move Items',
                close: cancelMoveBarItems // Revert it back on close
            });

            // Add the +/- buttons
            $(".move_box").find(".qty_case, .qty_single").each(function() {
                var prod_info = getProductBaseInfo($(this).closest(".move_item_row").attr("product_id"));

                // Make sure to set the step to .25 for non beer products
                var qty_step = 1;
                if ($(this).hasClass("qty_single") && prod_info.lq_type != 23)
                    qty_step = .25;

                $(this).azbNumberPlugin({
                    add_num_pad: false,
                    step: qty_step,
                    validateBefore: validateMoveBarItemQtys
                });
            });
        } // openDialogToMoveBarItems  

        // Makes sure empty bottles to return does not exceed avbl qty
        function validateMoveBarItemQtys(num_input, new_val) {
            var result = true;

            var parent_row = num_input.closest(".move_item_row");
            var prod_info = getProductBaseInfo(parent_row.attr("product_id"));

            if (!prod_info) {
                xmlbWarn("Something gone wrong. Product not found!");
                return false;
            }

            var total_new_qty = 0;
            if (num_input.hasClass("qty_case")) {
                // If we are changing the case qty, then multiply by package capcity
                total_new_qty += parseInt(new_val * prod_info.pkg_capacity) +
                    parseFloat(parent_row.find(".qty_single").val());
            } else {
                // If we are chaging single qty, then add it to the totals by case
                total_new_qty += parseFloat(new_val) +
                    parseInt(parent_row.find(".qty_case").val() * prod_info.pkg_capacity);
            }

            if (total_new_qty > parent_row.find(".qty").attr("value")) {
                xmlbWarn("Max qty reached!");
                result = false;
            }

            return result;
        } // validateMoveBarItemQtys

        $(function() {
            $(document).on("click", ".btn_move_items_cancel", cancelMoveBarItems);

            // Handle move all button at the end of each line
            $(document).on("click", ".btn_move_all", function() {
                var parent_row = $(this).closest("p");
                var total_qty = parent_row.find(".qty").attr("value");
                var pkg_capacity = parent_row.attr("pkg_capacity");

                if (pkg_capacity <= 1) {
                    // Assume everything as single
                    var qty_case = 0;
                    var qty_single = total_qty;
                } else {
                    // Divide between by case and single
                    var qty_single = total_qty % pkg_capacity;
                    var qty_case = (total_qty - qty_single) / pkg_capacity;
                }

                // Put them all as single at least for now
                parent_row.find(".qty_case").val(qty_case);
                parent_row.find(".qty_single").val(qty_single);
            });

        }); // document.ready

        // Cancels moving of the bar items when user cancels or closes the dialog box
        function cancelMoveBarItems() {
            $(".move_box").dialog("destroy");
            $(".bar_item").removeClass("bi_picked");
            $(".btn_move_items").html("MOVE");
            in_move = false;

            // Also move any dragged item back
            $('.bar_item[org_top]').each(function() {
                $(this).animate({
                    top: $(this).attr("org_top")
                }, 250);
                $(this).animate({
                    left: $(this).attr("org_left")
                }, 250);
            });
        } // cancelMoveBarItems
        </script>

        <style type="text/css">
        .bi_picked {
            background: #E3D497;
        }

        .bar_item {
            cursor: pointer;
        }

        .move_item_row {
            display: grid;
            grid-template-columns: 48% 10% 18% 18% auto;
            font-size: 1.5em;
        }

        .move_item_row input {
            font-size: 1.9em;
            width: 3em;
            -moz-appearance: textfield;
        }

        .move_item_row .btn_increment,
        .move_item_row .btn_decrement,
        .move_item_row .btn_move_all {
            font-size: 1.9em;
            margin: 0 .3em;
            color: #F7941E;
            cursor: pointer;
        }
        </style>


        <script type="text/javascript">
        // Tells us if we have clicked the move button and we are about to move bar items. 
        // The idea is that user select some bar items and then clicks on move button and then selects
        // destination which is either another bar or back to warehouse
        var in_move = false;

        $(function() {
            // When user clicks on the move button show that we are in move action
            $(".btn_move_items").click(function() {
                if (in_move) // Cancel move
                {
                    in_move = false;
                    $(this).html("MOVE");
                    $(".bar_item").removeClass("bi_picked");
                } else {
                    // If there is no item to move, then show warning
                    if ($(".bar_item.bi_picked").length == 0) {
                        xmlbWarn("Please select the items first!");
                        return;
                    }

                    in_move = true;
                    $(this).html('MOVE <i class="fas fa-dolly"></i>');
                }
            });
        }); // document.ready

        $(document).on("click", ".bar_wrap", function() {
            if (in_move)
                openDialogToMoveBarItems("bar", $(this));
        });
        </script>


        <script type="text/javascript">
        $(function() {
            $(document).on("click", ".btn_move_items_continue", function() {
                // Create a json array to pass to back-end to move the item from this bar to the other
                var move_items = '';
                $(".move_item_row.actual_body").each(function() {
                    var qty_case = $(this).find(".qty_case").val();
                    if (qty_case == '')
                        qty_case = 0;

                    var qty_single = $(this).find(".qty_single").val();
                    if (qty_single == '')
                        qty_single = 0;

                    // If nothing is moved here, then skip
                    if (qty_case == 0 && qty_single == 0)
                        return; // Continue

                    // Add it to result
                    if (move_items != '')
                        move_items += ',';
                    move_items += '{"lqbar_item_id": "' + $(this).attr("lqbar_item_id") + '"' +
                        ', "qty_single": "' + qty_single + '"' +
                        ', "qty_case": "' + qty_case + '"}';
                }); // Each row to move

                if (move_items == '') {
                    xmlbWarn("Nothing to move!");
                    return false;
                } else
                    move_items = '{"lqbar_items": [' + move_items + ']}';

                // Find destination id which is either a bar id or inv level id
                var move_to_type = $(".move_box").attr("move_to_type");
                var move_to_id = $(".move_box").attr("move_to_id");


                var prog = '$bar_items = moveBarItems("' + move_to_type + '",' + move_to_id + ',\'' +
                    move_items + '\') ;' +
                    "\n" + '$prog_result = "doAfterBarItemsMoved(\'" . $bar_items . "\') ;" ;';

                console.log("prog: " + prog); // debug alert
                runBackEndProg(prog);

            });
        }); // document.ready

        // After all moved, bar items are updated, so refresh the all_bar_items array 
        function doAfterBarItemsMoved(new_bar_items) {
            // Complete the move
            in_move = false;
            $(".btn_move_items").html("MOVE");
            $(".move_box").dialog("destroy");

            // Empty search
            $("#inv_items_for_checkout").html('');
            inv_items = [];

            // Refresh the screen
            storeBarItemsInArray(new_bar_items);
            displayCurrentBarItems();
        } // doAfterBarItemsMoved
        </script>
    </span>
    <span id="close_reopen_bar" class="xmlb_form">
        <script type="text/javascript">
        $(function() {
            $(document).on("click", ".btn_close_bar", function() {
                // Find the currently picked bar
                var lqbar_id = $(".bar_wrap.picked").attr("lqbar_id");
                if (!lqbar_id) {
                    xmlbWarn("Please select the bar to close");
                    return;
                }
                openDialogToCloseBar(lqbar_id);
            });

            $(document).on("click", ".btn_close_bar_cancel", function() {
                $(".bar_close_box").dialog("destroy");
            });

            // ****** Default Move to Location ***************
            $(document).on("change", ".def_move_to", function() {
                var def_move_to = $(this).val();

                // When user picks the main warehouse location, then set all lines to that one
                $(".close_bar_item_row .move_to").each(function() {
                    if ($(this).val() == "----")
                        $(this).val(def_move_to);
                    else if (def_move_to == "----") // reset back to no value
                        $(this).val("----");
                });
            });
        }); // document.ready

        // After a bar item is dropped to another bar, this fucntion is called to open the pop-up for
        // qty selection and move
        // Also the same function is called when items are moved from bar back to wahrehouse
        function openDialogToCloseBar(lqbar_id) {
            // Create a drop-down for location where it should go
            var to_loc_dd = '<select class="#class#">' +
                '<option value="----">----</option>';
            for (var i in inv_levels_arr) {
                to_loc_dd += '<option value="' + inv_levels_arr[i].inv_level_id + '">' +
                    inv_levels_arr[i].level_name + '</option>';
            }
            to_loc_dd += '</select>';


            // Open a popup to show all bar items so user can use to close bar
            var bar_close_box = '<div class="bar_close_box card" lqbar_id="' + lqbar_id + '"><div>';

            // Show the bar to close name
            var bar_wrap = $(".bar_wrap[lqbar_id=" + lqbar_id + "]");
            var lqbar_name = bar_wrap.find('.room_name').text() +
                ' / ' + bar_wrap.find('.bartender').text();
            bar_close_box += '<h2>Close Bar: ' + lqbar_name + '</h2>' +
                "<strong>Move to:</strong> " + to_loc_dd.replace("#class#", "def_move_to") +
                '<hr />';

            // Now add one line for each bar item under this bar to close

            // Add title row
            var bar_items = '<p class="close_bar_item_row header"><span>Name</span><span>Qty</span> \
                              <span>Move To</span><span>Cases</span><span>Singles</span><span>Empties</span></p>';

            var row_num = 1;
            $("#cur_bar_items > .bar_item").each(function() {
                // Show product name and favorite icon if any
                var prod_name = $(this).find(".prod_name").text();
                var qty = $(this).find(".qty").text();

                // Find qty per package
                var prod_info = getProductBaseInfo($(this).attr("product_id"));
                if (prod_info.pkg_capacity > 1)
                    prod_name += ' / ' + prod_info.pkg_capacity + ' per case';

                // Use default of 1 for package in case not set by user
                var pkg_capacity = 1;
                if (prod_info.pkg_capacity)
                    pkg_capacity = prod_info.pkg_capacity;

                // Add each row
                bar_items += '<p class="close_bar_item_row actual_body"' +
                    ' lqbar_item_id="' + $(this).attr("lqbar_item_id") + '"' +
                    ' product_id="' + $(this).attr("product_id") + '"' +
                    ' pkg_capacity="' + pkg_capacity + '">';

                // Liquor name
                bar_items += '<span>' + row_num + ') ' + prod_name + '</span>';

                // Qty
                bar_items += '<span class="qty" value="' + qty + '">' + qty + '</span>';

                // Location where it should go
                bar_items += '<span>' + to_loc_dd.replace("#class#", "move_to") + '</span>';

                // Add two boxes so user can select cases and singles to add to the bar 

                // By case
                bar_items += '<span><input type="number" class="qty_case" set_by_user= "no" step="0" \
                                  value="0" min="0" /></span>';

                // Singles              
                bar_items += '<span><input type="number" class="qty_single" step=".01" \
                                  value="0" min="0" /></span>';

                // Empties              
                bar_items += '<span><input type="number" class="qty_empty" step="0" value="0" \
                                  min="0" /></span>';

                bar_items += '</p>';

                row_num++;
            }); // Each item being dropped 

            bar_close_box += bar_items;

            // Add the continue button
            bar_close_box += '<br /><span class="btn_close_bar_continue big_button">Continue</span>' +
                ' <span class="btn_close_bar_cancel big_button">Cancel</span>';

            bar_close_box += '</div></div>';

            $(bar_close_box).dialog({
                modal: true,
                width: 1180,
                title: 'Close Bar'
            });

            // Add the +/- buttons
            $(".bar_close_box").find(".qty_case, .qty_single, .qty_empty").each(function() {
                var prod_info = getProductBaseInfo($(this).closest(".close_bar_item_row").attr("product_id"));

                // Make sure to set the step to .25 for non beer products
                var qty_step = 1;
                if ($(this).hasClass("qty_single") && prod_info.lq_type != 23)
                    qty_step = .25;

                $(this).azbNumberPlugin({
                    add_num_pad: false,
                    step: qty_step,
                    validateBefore: validateCloseBarQtys,
                    runAfter: doAfterReturnQtyUpdated
                });
            });

        } // openDialogToCloseBar  

        // Makes sure total qty to move from one bar to another or to warehouse including cases 
        // and singles does not exceed avbl qty
        function validateCloseBarQtys(num_input, new_val) {
            var result = true;

            var parent_row = num_input.closest(".close_bar_item_row");
            var prod_info = getProductBaseInfo(parent_row.attr("product_id"));
            if (!prod_info) {
                xmlbWarn("Something gone wrong. Product not found!");
                return false;
            }

            // Only make sure the value for this input is not more than total. The reason is we 
            // adjust the other inputs after this one is updated
            var total_new_qty;
            if (num_input.hasClass("qty_case")) {
                total_new_qty = parseInt(new_val * prod_info.pkg_capacity) +
                    parseInt(parent_row.find(".qty_empty").val()) +
                    parseFloat(parent_row.find(".qty_single").val());
            } else if (num_input.hasClass("qty_single")) {
                total_new_qty = parseFloat(new_val) +
                    parseInt(parent_row.find(".qty_case").val() * prod_info.pkg_capacity) +
                    parseInt(parent_row.find(".qty_empty").val());
            } else if (num_input.hasClass("qty_empty")) {
                total_new_qty = parseInt(new_val) +
                    parseInt(parent_row.find(".qty_case").val() * prod_info.pkg_capacity) +
                    parseFloat(parent_row.find(".qty_single").val());
            }

            // We have to use the ceil here. Imagine we use .75 of a bottle however it will turn into
            // one empty
            var total_allowed = Math.ceil(parent_row.find(".qty").attr("value"));
            if (total_new_qty > total_allowed) {
                xmlbWarn("Max qty reached!", $(".bar_close_box"));
                result = false;
            }

            return result;
        } // validateCloseBarQtys

        // After qtys to return is updated, this function is called to adjust other Qtys
        function doAfterReturnQtyUpdated(num_input) {
            var parent_row = num_input.closest(".close_bar_item_row");

            // Flag this as set by user so we know 
            if (num_input.hasClass("qty_case"))
                num_input.attr("set_by_user", "yes");

            var prod_info = getProductBaseInfo(parent_row.attr("product_id"));
            if (!prod_info) {
                xmlbWarn("Something gone wrong. Product not found!");
                return false;
            }
            var total_allowed = parseFloat(parent_row.find(".qty").attr("value")); // Total of this item at this bar

            // Note: We do not adjust qty by case. We only set values for empty and single

            // Find how many is returned by case
            var qty_case = parseInt(parent_row.find(".qty_case").val());
            var total_by_case = qty_case * prod_info.pkg_capacity;
            var qty_single = parseFloat(parent_row.find(".qty_single").val());
            var qty_empty = parseInt(parent_row.find(".qty_empty").val());

            if (num_input.hasClass("qty_empty")) {
                // Empty is set by user, so adjust others

                // Set total by case only if not set by user and if there is a case of more than one
                if (parent_row.find(".qty_case").attr("set_by_user") == "no" &&
                    prod_info.pkg_capacity > 1) {
                    total_by_case = total_allowed - qty_empty;
                    qty_case = Math.floor(total_by_case / prod_info.pkg_capacity)
                    total_by_case = qty_case * prod_info.pkg_capacity; // Make sure floor will kick in
                }

                qty_single = total_allowed - qty_empty - total_by_case;
                parent_row.find(".qty_single").val(qty_single);
                parent_row.find(".qty_case").val(qty_case);
            } else if (num_input.hasClass("qty_single")) {
                // Single is set by user, so adjust the other twos

                if (parent_row.find(".qty_case").attr("set_by_user") == "no" &&
                    prod_info.pkg_capacity > 1) {
                    total_by_case = total_allowed - qty_single;
                    qty_case = Math.floor(total_by_case / prod_info.pkg_capacity);
                    total_by_case = qty_case * prod_info.pkg_capacity; // Make sure floor will kick in
                }

                qty_empty = total_allowed - Math.ceil(qty_single) - total_by_case;
                parent_row.find(".qty_empty").val(qty_empty);
                parent_row.find(".qty_case").val(qty_case);
            }

            // Note: We do not auto-update when number of cases changes. Because we have 3 variables
            // it is impossible to adjust

        } // doAfterReturnQtyUpdated
        </script>

        <style type="text/css">
        .close_bar_item_row {
            display: grid;
            grid-template-columns: 30% 6% 19% 15% 15% 15%;
            font-size: 1.5em;
        }

        .close_bar_item_row input {
            font-size: 1.9em;
            width: 3em;
            -moz-appearance: textfield;
        }

        .close_bar_item_row .btn_increment,
        .close_bar_item_row .btn_decrement,
        .close_bar_item_row .btn_move_all {
            font-size: 1.9em;
            margin: 0 .3em;
            color: #F7941E;
            cursor: pointer;
        }

        .close_bar_item_row select {
            max-width: 10em;
            font-size: 1.8em;
        }

        .bar_close_box .def_move_to,
        .bar_close_box strong {
            font-size: 1.8em;
        }

        .close_bar_item_row span:nth-child(3) {
            padding-top: .51em;
        }
        </style>




        <script type="text/javascript">
        $(function() {
            $(document).on("click", ".btn_close_bar_continue", function() {
                if (!confirm("Return the given items and close the bar?"))
                    return;

                var is_error = false;

                var close_items = '';
                $(".close_bar_item_row.actual_body").each(function() {
                    // Find qtys
                    var qty_case = parseInt($(this).find(".qty_case").val());
                    var qty_single = parseInt($(this).find(".qty_single").val());

                    // See where to move it
                    var move_to = $(this).find(".move_to").val()
                    if (move_to == "----" &&
                        (qty_case > 0 || qty_single > 0)) {
                        xmlbWarn("Please select the Move To location for all non-empty lines");
                        is_error = true;
                        return false; // break
                    }

                    if (close_items != '')
                        close_items += ',';
                    close_items += '{' +
                        '"lqbar_item_id": "' + $(this).attr("lqbar_item_id") + '"' +
                        ', "gn_prod_id": "' + $(this).attr("product_id") + '"' +
                        ', "pkg_capacity": "' + $(this).attr("pkg_capacity") + '"' +
                        ', "qty_case": "' + qty_case + '"' +
                        ', "qty_single": "' + qty_single + '"' +
                        ', "qty_empty": "' + $(this).find(".qty_empty").val() + '"' +
                        ', "inv_level_id": "' + move_to + '"' +
                        '}';
                });

                if (is_error)
                    return;

                close_items = '{"bar_items": [' + close_items + ']}';

                var lqbar_id = $(".bar_close_box").attr("lqbar_id");
                var prog = 'closeBarAndReturnItems(' + lqbar_id + ',\'' + close_items + '\') ;';
                console.log("prog: " + prog); // debug alert
                runBackEndProg(prog, null, 'doAfterBarClosed(' + lqbar_id + ') ;');
            });
        }); // document.ready

        // After a bar is closed this function removes it from screen and back-end arrays
        function doAfterBarClosed(lqbar_id) {
            $(".bar_close_box").dialog("destroy");
            $(".bar_wrap[lqbar_id=" + lqbar_id + "]").remove();

            // Also remove relate bar item from screen
            $(".bar_item[lqbar_id=" + lqbar_id + "]").remove();

            // Note: here we can also remove the entries related to this bar from all_bar_items 
            // however it is hard and not worth it
        } // doAfterBarClosed
        </script>


        <script type="text/javascript">
        $(function() {
            $(document).on("click", ".btn_re_open_bar", function() {
                // Get the list of recently closed bars so user can select to re-open them
                runStoredProcedure("open_bars", "liquor_bar_console", "json_get_liquor_bars",
                    'bar_status=C', "showBarsToReopen('#sproc_result#') ;");
            });

            // Cancel dialog
            $(document).on("click", ".btn_reopen_bar_cancel", function() {
                $(".reopen_bar_box").dialog("destroy");
            });

            // Open the clicked bar
            $(document).on("click", ".closed_bar_wrap", function() {
                if (!confirm("Re-open this bar?"))
                    return;

                var prog = '$msg = reopenLiquorBar(' + $(this).attr("lqbar_id") + ') ;' +
                    "\n" + '$prog_result = "doAfterBarReopened(\'" . $msg . "\',' +
                    $(this).attr("lqbar_id") + ',' +
                    '\'" . getOpenBarItems() . "\') ;" ;';
                runBackEndProg(prog);
            });
        }); // document.ready

        // After a bar is re-opened, this will show it on screen
        function doAfterBarReopened(msg, lqbar_id, open_bar_items) {
            // First update the bar items array to include the newly opened one
            all_bar_items = [];
            all_bar_items = JSON.parse(open_bar_items);
            all_bar_items = all_bar_items.bar_items; // Shorten syntax

            // Now show the newly opened bar on screen
            var new_bar = '<div class="bar_wrap" lqbar_id="' + lqbar_id + '">' +
                $(".closed_bar_wrap[lqbar_id=" + lqbar_id + "]").html() +
                '</div>';
            $("#open_bars_wrap").append(new_bar);

            // At the end close the dialog and make the new bar droppable
            $(".reopen_bar_box").dialog("destroy");
            makeBarsDroppable();

            // Show msg if any
            if (msg != '')
                xmlbWarn(xmlbDecodeFromAJAX(msg));
        } // doAfterBarReopened

        // Opens a dialog to show all the recently closed bars so user can select to-reopen them
        // in case of mistake
        function showBarsToReopen(return_data) {
            var closed_bars = JSON.parse(return_data);

            // Add each bar as a box to the dialog box so user can re-open it
            var reopen_box = '<div class="reopen_bar_box card"><div>' +
                '<h2>Reopen Bar</h2><hr />'

            for (var i in closed_bars.lqbars) {
                var lqbar = closed_bars.lqbars[i]; // Shorten syntax

                reopen_box += '<div class="closed_bar_wrap" lqbar_id="' + lqbar.lqbar_id + '">';

                // Link event id
                event_id = '<a href="https://www.royalambassador.ca/db_event/event_view.php?event_id=' + lqbar
                    .event_id + '" target="_blank">' +
                    lqbar.event_id + '</a>';

                // Make sure customer name is not too long
                if (lqbar.customer.length > 38)
                    lqbar.customer = lqbar.customer.substring(1, 35) + '...';

                reopen_box += '<span class="room_name">' + lqbar.room_name + '</span>' +
                    '<br /><span class="bartender">' + findBartenderName(lqbar.bartender_id) + '</span>' +
                    '<br />' + lqbar.customer + '<br />' + lqbar.event_type +
                    '<br />Event: ' + lqbar.event_id + ' / ' + lqbar.event_date +
                    '<br />Guests: ' + lqbar.guests;


                reopen_box += '</div>';
            }

            // Add cancel button. We do not need continue as they can click on each bar to re-open it
            reopen_box += '<br /><p><span class="big_button btn_reopen_bar_cancel">Cancel</span></p>';

            reopen_box += '</div></div>';

            $(reopen_box).dialog({
                modal: true,
                width: 980,
                title: 'Reopen Bar'
            });

        } // showBarsToReopen
        </script>

        <style type="text/css">
        .closed_bar_wrap {
            padding: .8em 1.1em;
            box-shadow: 0 0 5px 2px rgba(0, 0, 0, .35);
            height: 9em;
            line-height: 150%;
            cursor: pointer;
            font-size: 1.1em;
            overflow: hidden;
            margin: .1em;
            display: inline-block;
            width: 32.5%;
            vertical-align: top;
        }

        .closed_bar_wrap:hover {
            color: #FFF;
            background: #9d8c4d;
        }

        .closed_bar_wrap .room_name,
        .closed_bar_wrap .bartender {
            font-weight: bold;
        }
        </style>

    </span>

    <div class="top_right_bar">
        <span class="btn_re_open_bar big_button">RE-OPEN BAR</span>
        <span class="btn_close_bar big_button">CLOSE BAR</span>
        <span class="btn_show_bar_info big_button">INFO <svg class="svg-inline--fa fa-circle-info" aria-hidden="true"
                focusable="false" data-prefix="fas" data-icon="circle-info" role="img"
                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                <path fill="currentColor"
                    d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                </path>
            </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
        <span class="btn_move_items big_button">MOVE</span>
        <span class="btn_edit_bar big_button">EDIT</span>
        <span class="btn_open_new_bar big_button">NEW BAR <svg class="svg-inline--fa fa-circle-plus" aria-hidden="true"
                focusable="false" data-prefix="fas" data-icon="circle-plus" role="img"
                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                <path fill="currentColor"
                    d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z">
                </path>
            </svg><!-- <i class="fas fa-plus-circle"></i> Font Awesome fontawesome.com --></span>
    </div>

    <style type="text/css">
    #pg_liquor_bar_console h1 {
        font-size: 1.8em;
    }

    #pg_liquor_bar_console label {
        float: none;
        display: inline-block;
        width: 8em;
        vertical-align: top;
    }

    #pg_liquor_bar_console .element {
        float: none;
    }
    </style>
</div>
@endsection