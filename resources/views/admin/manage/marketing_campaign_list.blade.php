@extends('admin.layouts.master')
@section('title', 'Ad/Marketing Campaigns')
@section('style')
<style>
    .svg-inline--fa {
        display: var(--fa-display, inline-block);
        height: 1em;
        overflow: visible;
        vertical-align: -.125em;
    }
    /* Style the pagination container */
    .pagination {
        margin-top: 20px;
        text-align: center;
    }

    /* Style the pagination links */
    .pagination a {
        padding: 3px;
        text-decoration: none;
        border: 1px solid #999;
        border-radius: 3px;
        color:#0782C1;
        margin-left: 3px;
        text-align:center;
    }
    .pagination a:hover {
        color: #9E0F29;
        text-decoration: none;
    }

    .pagination span span {
        background: #222;
        color: #fff;
        padding: 3px;
        text-decoration: none;
        border-radius: 3px;
        margin-left: 3px;
        text-align:center;
        
    }
    .pagination span span[aria-disabled="true"] {
        display: none;        
    }

    /* Style the disabled pagination link */
    .pagination .disabled {
        color: #ccc;
        pointer-events: none;
    }
    .hidden.sm\:flex-1.sm\:flex.sm\:items-center.sm\:justify-between div:first-child {
        display: none;
    }
    .flex.justify-between.flex-1.sm\:hidden a, 
    .flex.justify-between.flex-1.sm\:hidden span, 
    .relative.inline-flex.items-center.px-2.py-2 svg
    {
        display: none;
    }
    .relative.inline-flex.items-center.px-2.py-2.text-sm.font-medium.text-gray-500.bg-white.border.border-gray-300.rounded-l-md.leading-5.hover\:text-gray-400.focus\:z-10.focus\:outline-none.focus\:ring.ring-gray-300.focus\:border-blue-300.active\:bg-gray-100.active\:text-gray-500.transition.ease-in-out.duration-150::after {
        content: "<<";
        margin-left: 5px; /* Adjust as needed for spacing */
    }
    .relative.inline-flex.items-center.px-2.py-2.-ml-px.text-sm.font-medium.text-gray-500.bg-white.border.border-gray-300.rounded-r-md.leading-5.hover\:text-gray-400.focus\:z-10.focus\:outline-none.focus\:ring.ring-gray-300.focus\:border-blue-300.active\:bg-gray-100.active\:text-gray-500.transition.ease-in-out.duration-150::after {
        content: ">>";
        margin-left: 5px; /* Adjust as needed for spacing */
    }
</style>
@endsection
@section('content')
<div class="title_bar card">
    <h1>Ad Campaigns
        <a href="javascript:void(0)" class="new_ad_campaigns">
            <svg class="svg-inline--fa fa-plus" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                <path fill="currentColor"
                    d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z">
                </path>
            </svg><!-- <i class="fas fa-plus"></i> Font Awesome fontawesome.com -->
        </a>
    </h1>
</div>
<span id="marketing_campaign_list" class="xmlb_form">
    <div class="card">
        <div>
            <form action="{{ route('admin.marketing-campaign.index') }}" id="campaign_list_filter" method="get">
                <fieldset class="form_filters">
                    <legend>Search by</legend>
                    <label>Status:</label>
                    <select name="marketing_campaign_status" id="marketing_campaign_status" >
                        <option value="" selected="selected">--All--</option>
                        <option value="P">Planned</option>
                        <option value="A">Active</option>
                        <option value="C">Completed</option>
                        <option value="X">Aborted</option>
                        <option value="S">Scrapped/Never Activated</option>
                    </select>
                    <label>Is Active:</label>
                    <select name="is_active" id="is_active" >
                        <option value="">--All--</option>
                        <option value="1" selected="yes">Yes</option>
                        <option value="0">No</option>
                    </select>
                    <label>Campaign Name:</label> 
                    <input name="marketing_campaign_name" id="marketing_campaign_name" type="text" value="" maxlength="90" size="30" title="Name of this ad or marketing campaign" >
                    <button type="submit" id="marketing_campaign_list_apply_filter" class="button radius-0">Search</button>
                    <button type="button" id="marketing_campaign_list_clear_filter" class="button radius-0" >Show All</button>
                </fieldset>
                <div class="top-record mt-20 pages_p">
                    <p align="right">
                        <span id="records-display"></span> of <span id="total_records"> {{$allRecords}} </span> | Show:
                        <select id="perPageSelect" class="max-100" name="pages">
                            <option value="10" {{ request('pages') == 10?'selected':''}}>10</option>
                            <option value="20" {{ request('pages') == 20?'selected':''}} @if(request('pages') == null){{'selected'}}@endif>20</option>
                            <option value="30" {{ request('pages') == 30?'selected':''}}>30</option>
                            <option value="50" {{ request('pages') == 50?'selected':''}}>50</option>
                            <option value="100" {{ request('pages') == 100?'selected':''}}>100</option>
                        </select>
                    </p>
                </div>

            </form>
            <table class="product-list table mt-20">
                <tbody>
                    <tr>
                        <th>
                            <a href="#">Campaign Name</a> 
                        </th>
                        <th>
                            <a href="#">Status</a> 
                        </th>
                        <th> Customers </th>
                        <th> Events </th>
                        <th>  Value  </th>
                        <th>
                            <a href="#">Is Active</a>
                        </th>
                        <th></th>
                    </tr>
                    @foreach ($marketingCampaigns as $marketingCampaign)
                        <tr class="campaign-row">
                            <td><a href="#">{{ $marketingCampaign->campaign_name }}</a></td>
                            <td>
                                @php $statusLabels = [ 'A' => 'Active', 'C' => 'Completed', 'P' => 'Planned', 'X' => 'Aborted', 'S' => 'Scrapped/Never Activated', ]; @endphp
                                {{ $statusLabels[$marketingCampaign->campaign_status] }}
                            </td>
                            <td>0</td>
                            <td>0</td>
                            <td>$0.00</td>
                            <td> @if ($marketingCampaign->is_active == 1) {{'Yes'}} @else  {{'No'}} @endif </td>
                            <td>
                                <button type="button" data-campaign-id="{{$marketingCampaign->id}}" class="button radius-0 edit_marketing_campaign">Edit</button>
                                <button type="button" data-campaign-id="{{$marketingCampaign->id}}" class="button radius-0 delete_marketing_campaign">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div id="pagination-links" class="pagination">
                {{ $marketingCampaigns->links() }}
            </div>
        </div>
    </div>
</span>
<div class="ui-widget-overlay ui-front d-none"></div>
{{-- popup module --}}
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj ui-draggable-add-campaign d-none" tabindex="-1" style="position: absolute; height: auto; width: 600px; top: 110.5px; left: 344px;" role="dialog" aria-describedby="ajax_obj" aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">Add/Edit Advertising Sources</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close" role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick closethick-btn"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content" style="width: auto">
        <span id="event_new" class="xmlb_form">
            <form method="post" id="frm_marketing_campaign_new" action="" accept-charset="utf-8" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="campaign_edit_id" value="">
                <p>
                    <label>Campaign Name:</label>
                    <span class="element">
                        <input id="marketing_campaign_name" name="marketing_campaign_name" type="text" maxlength="90" size="50" title="Name of this ad or marketing campaign">
                    </span>
                    <span class="mand_sign">*</span>
                </p>
                <br>
                <p>
                    <label>Includes Gift Cert.:</label>
                    <span class="element">
                        <input id="marketing_campaign_includes_gift_cert" value="1" name="marketing_campaign_includes_gift_cert" type="checkbox">
                    </span>
                </p>
                <br>
                <div class="edit_items_column d-none">
                    <p>
                        <label>Status:</label>
                        <span class="element">
                            <select id="marketing_campaign_status_edit" name="marketing_campaign_status_edit">
                                <option value="P">Planned</option>
                                <option value="A">Active</option>
                                <option value="C">Completed</option>
                                <option value="X">Aborted</option>
                                <option value="S">Scrapped/Never Activated</option>
                            </select>
                        </span>
                        <span class="mand_sign">*</span>
                    </p>
                    <br>
                    <p>
                        <label>Show Order:</label>
                        <span class="element">
                            <input id="marketing_campaign_edit_show_order" name="marketing_campaign_edit_show_order" type="text" maxlength="3" size="2" value="" title="The order by which to show the source">
                        </span>
                        <span class="mand_sign">*</span>
                    </p>
                    <br>
                    <p>
                        <label>Is Active:</label>
                        <span class="element">
                            <select id="marketing_campaign_edit_is_active" name="marketing_campaign_edit_is_active">
                                <option value="1" >Yes</option>
                                <option value="0">No</option>
                            </select>
                        </span>
                        <span class="mand_sign">*</span>
                    </p>
                    <br>
                </div>
                <button type="submit" id="marketing_campaign_new_save" class="button radius-0">Save</button>
            </form>
        </span>
    </div>
</div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            // module popup
            $('.new_ad_campaigns').click(function() {
                $('.ui-draggable-add-campaign').removeClass('d-none');
                $('.ui-widget-overlay').removeClass('d-none');
            });
            $('.closethick-btn').click(function() {
                $('.ui-draggable-add-campaign').addClass('d-none');
                $('.ui-widget-overlay').addClass('d-none');
                $('.edit_items_column').addClass('d-none');
                $('#frm_marketing_campaign_new')[0].reset();
                $('#frm_marketing_campaign_new input[name="campaign_edit_id"]').val('');

            });

            $('#marketing_campaign_list_clear_filter').click(function () { 
                window.location.href = "{{ route('admin.marketing-campaign.index') }}"
            });
            $('#perPageSelect').on('change', function() {
                const perPage = $(this).val();
                const url = new URL(window.location.href);
                url.searchParams.set('perPage', perPage);
                window.location.href = url.toString();
                $('#campaign_list_filter').submit();
            });

            $('#pagination-links a').on('click', function(event) {
                event.preventDefault();
                const page = $(this).attr('href').split('page=')[1];
                const url = new URL(window.location.href);
                url.searchParams.set('page', page);
                window.location.href = url.toString();
            });

            var totalRecords = parseInt($('#total_records').text());
            var perPageSelect = parseInt($('#perPageSelect').val());
            updateRecordsDisplay(totalRecords, perPageSelect);

            $('#frm_marketing_campaign_new').validate({
                rules: {
                    'marketing_campaign_name': 'required',
                    'marketing_campaign_status_edit': 'required',
                    'marketing_campaign_edit_show_order': {
                        required: true,
                        number: true
                    },
                    'marketing_campaign_edit_is_active': 'required'
                },
                messages: {
                    'marketing_campaign_name': 'Please enter Ad Source Name or Ad Source Name too short.',
                    'marketing_campaign_status_edit': 'Please select Campaign Status.',
                    'marketing_campaign_edit_show_order': {
                        required: 'Please enter Show Order.',
                        number: 'Please enter a number.'
                    },
                    'marketing_campaign_edit_is_active': 'Please select is active.'
                }
            })
            $('#frm_marketing_campaign_new').submit(function(e) {
                e.preventDefault();
                if ($(this).valid()) {
                    var formData = $('#frm_marketing_campaign_new').serialize();
                    $.ajax({
                        type: "POST",
                        url: "{{ route('admin.marketing-campaign.store') }}",
                        data: formData,
                        success: function (response) {
                            if (response.success) {
                                alert(response.message);
                                window.location.reload();
                            } else {
                                alert(response.message);
                                location.reload();
                            }
                        },
                        error: function(xhr, status, error) {
                            // Handle errors
                            console.error(error);
                        }
                    });
                }
            });
            $('.edit_marketing_campaign').click(function () { 
                var campaign_id = $(this).data('campaign-id');
                console.log(campaign_id); 
                var url = "{{ route('admin.marketing-campaign.edit',':id') }}";
                url = url.replace(':id',campaign_id);
                $.ajax({
                    type: "GET",
                    url: url,
                    success: function (response) {
                        $('#frm_marketing_campaign_new input[name="campaign_edit_id"]').val(response.marketingCampaign.id)
                        $('#frm_marketing_campaign_new input[name="marketing_campaign_name"]').val(response.marketingCampaign.campaign_name)
                        $('#frm_marketing_campaign_new input[name="marketing_campaign_includes_gift_cert"]').prop('checked', response.marketingCampaign.includes_gift_cert);
                        $('#frm_marketing_campaign_new select[name="marketing_campaign_status_edit"]').val(response.marketingCampaign.campaign_status)
                        $('#frm_marketing_campaign_new input[name="marketing_campaign_edit_show_order"]').val(response.marketingCampaign.show_order)
                        $('#frm_marketing_campaign_new select[name="marketing_campaign_edit_is_active"]').val(response.marketingCampaign.is_active)
                        $('.ui-draggable-add-campaign').removeClass('d-none');
                        $('.ui-widget-overlay').removeClass('d-none');
                        $('.edit_items_column').removeClass('d-none');
                    }
                });
            });
            $('.delete_marketing_campaign').click(function () { 
                var campaign_id = $(this).data('campaign-id');
                if (confirm("Are you sure you want to delete this Marketing Campaign?") == true) {
                    var url = "{{ route('admin.marketing-campaign.destroy',':id') }}";
                    url = url.replace(':id',campaign_id);
                    $.ajax({
                        type: "Delete",
                        url: url,
                        data: {_token: "{{csrf_token()}}"},
                        success: function (response) {
                            if (response.success) {
                                alert(response.message);
                                window.location.reload();
                            }
                        }
                    });
                }
            });
        });
        
        function updateRecordsDisplay(totalRecords, perPageSelect) {
            const currentPage = parseInt(getParameterByName('page')) || 1;
            const perPage = parseInt(getParameterByName('perPage')) || perPageSelect;
            const startRecord = (currentPage - 1) * perPage + 1;
            const endRecord = Math.min(startRecord + perPage - 1, totalRecords);
            const displayText = `Records: ${startRecord} to ${endRecord}`;
            $('#records-display').text(displayText);
        }

        // Function to get URL parameters
        function getParameterByName(name, url = window.location.href) {
            name = name.replace(/[\[\]]/g, '\\$&');
            const regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
                results = regex.exec(url);
            if (!results) return null;
            if (!results[2]) return '';
            return decodeURIComponent(results[2].replace(/\+/g, ' '));
        }
    </script>
@endsection