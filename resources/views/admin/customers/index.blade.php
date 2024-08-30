@extends('admin.layouts.master')
@section('title', 'All Customers')
@section('content')
<div class="page-content">
    <div class="page-title-bar">
        <h1>Customers / Event Planners</h1>
        <div class="breadcrumb">
            <a href="#">Older Page</a>
        </div>
    </div>
    <div class="customers_wrap">
        <form action="{{route('admin.customer.index')}}" id="customer_filter" method="get">
            <div class="filters_wrap">
                <fieldset class="form_filters d-flex">
                    <legend>Search</legend>
                    <div class="id">
                        <strong class="mr-5">Id:</strong>
                        <input class="flt_by_id filter_elm_customer_id" id="flt_by_id" name="custome_id" value="{{request('custome_id')}}">
                    </div>
                    <div class="text">
                        <strong class="mr-5 ml-5">Text:</strong>
                        <input class="" id="flt_by_text" name="flt_by_text" value="{{request('flt_by_text')}}" title="Search by name, phone, cell phone or email">
                    </div>
                    <div class="type">
                        <strong class="mr-5 ml-5">Customer Type:</strong>
                        <select class="" id="flt_customer_type" name="customer_type">
                            <option value="" {{ request('customer_type') == '' ? 'selected' : '' }}>--All--</option>
                            <option value="1" {{ request('customer_type') == '1' ? 'selected' : '' }}>Personal</option>
                            <option value="2" {{ request('customer_type') == '2' ? 'selected' : '' }}>Corporate</option>
                            <option value="3" {{ request('customer_type') == '3' ? 'selected' : '' }}>Event Planner</option>
                        </select>
                    </div>
                    <button type="button" id="clearFilters" class="button font-bold radius-0">Clear Filters</button>
                </fieldset>
            </div>
        </form>
    </div>
    <div class="customer-rows-outer">
        <!-- <table class="customer-row-table">
            <tr>
                <td>
                    <strong>1)</strong>
                </td>
                <td>
                    <strong>Id:</strong>
                    <a href="#">45550</a>
                </td>
                <td>
                    <span class="customer_name">Leah Goodis</span>
                </td>
                <td>
                    <strong>Booked:</strong>
                    <span>0</span>
                </td>
                <td>
                    <strong>Tentative:</strong>
                    <span>0</span>
                </td>
                <td>
                    <strong>Added:</strong> 
                    <span>Sat, Dec 23 2023 </span>
                </td>
                <td>
                    <strong>By:</strong> 
                    <span>Nicolas Giancola</span>
                </td>
            </tr>
        </table> -->
        @php
            $numb = 1;
        @endphp
        @foreach ($customers as $_customer)
            <div class="customers-inner">
                <div class="customers">
                    <div class="sr-no">
                        <strong>{{$numb++}}) </strong>
                    </div>
                    <div class="customer-id">
                        <strong>Id:</strong>
                        <a href="{{ route('admin.customer.show',$_customer->id) }}" class="id-value">{{$_customer->id}}</a>
                    </div>
                    <div class="customer-name">
                        <a href="{{ route('admin.customer.show',$_customer->id) }}">{{$_customer->customer_name}} @if ($_customer->customer_type == 2) {{'(Corporate)'}} @elseif($_customer->customer_type == 3) {{('(Event Planner)')}} @endif</a>
                    </div>
                    <div class="booking-status">
                        <strong>Booked:</strong>
                        @php if ($_customer->events->isNotEmpty()) {
                            $count = $_customer->events->where('event_status', 2)->count();
                        }else {  $count =  0;  } @endphp
                        @if ($count != 0)
                        <span class="value counted">{{$count}}</span>
                        @elseif($count == 0)
                        <span class="value">{{$count}}</span>
                        @endif
                    </div>
                    <div class="tentative booking-status">
                        <strong>Tentative:</strong>
                        @php if ($_customer->events->isNotEmpty()) {
                            $count = $_customer->events->where('event_status', 1)->count();
                        }else {  $ount =  0;  } @endphp
                        @if ($count != 0)
                        <span class="value counted">{{$count}}</span>
                        @elseif($count == 0)
                        <span class="value">{{$count}}</span>
                        @endif
                    </div>
                    @php
                        $carbonDate = \Carbon\Carbon::parse($_customer->created_at);
                        $formattedDate = $carbonDate->format('D, M j Y');
                    @endphp
                    <div class="last-status">
                        <span><strong>Added:</strong> {{$formattedDate}} <strong>By:</strong> {{$_customer->user->name}}</span>
                    </div>
                </div>
                @if ($_customer->contacts->isNotEmpty())
                    @foreach ($_customer->contacts as $_contact)
                        <div class="customers-contact">
                            <div class="name">{{$_contact->last_name}}, {{$_contact->first_name}}</div>
                            <div class="number">
                                <strong>Phone:</strong>
                                <span>{{$_contact->cell_phone}}</span>
                            </div>
                            <div class="email">
                                <strong>Email:</strong>
                                <span>{{$_contact->main_email}}</span>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        @endforeach
        {{ $customers->links() }}
        {{-- <div class="pagination">
            <ul>
                <li class="current-page">
                    <span>1</span>
                </li>
                <li>
                    <span>2</span>
                </li>
                <li>
                    <span>3</span>
                </li>
                <li>
                    <span>4</span>
                </li>
                <li>
                    <span>5</span>
                </li>
                <li>
                    <span>6</span>
                </li>
                <li>
                    <span>7</span>
                </li>
                <li>
                    <span>8</span>
                </li>
                <li>
                    <span>9</span>
                </li>
                <li>
                    <span>10</span>
                </li>
                <li>
                    <span>11</span>
                </li>
            </ul>
        </div> --}}
    </div>
</div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#flt_by_id, #flt_by_text, #flt_customer_type').on('change', function () {
                $('#customer_filter').submit();
            });
            
            $('#clearFilters').on('click', function() {
                window.location.href = "{{ route('admin.customer.index') }}";
            });
        });
    </script>
@endsection
