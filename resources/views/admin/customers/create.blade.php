@extends('admin.layouts.master')
@section('title','Add a New Customer')
@section('style')
<style>
    .svg-inline--fa {
        display: var(--fa-display, inline-block);
        height: 1em;
        overflow: visible;
        vertical-align: -.125em;
    }
    .btn {
        font-size: 1em;
        margin-left: .2em;
        cursor: pointer;
        background: none;
        color: #F7941E;
        min-width: auto;
    }
    .new_customer_dups {
        position: absolute;
        top: 8em;
        left: 35em;
        -webkit-box-shadow: 5px 5px 15px 5px #000000;
        padding: 1em;
        box-shadow: 5px 5px 15px 5px #000000;
        background: #FFF;
    }
    .found_dup_row {
        display: grid;
        grid-gap: .2em;
        grid-template-columns: .3fr .8fr 4fr 3fr 2.2fr 2fr 1.8fr;
    }
    .header > span {
        font-weight: bold;
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
    .btn_close_cust_dups {
        float: right;
    }
    .actual_body:hover {
        background: #E2D9B5;
    }
</style>
@endsection
@section('content')
<div class="page-content">
    <div class="page-title-bar d-flex">
        <h1 class="mr-10">Add a New Customer</h1>
        <div class="customer_type_select">
            <button type="button" class="button checked" data-id="1">
                <svg class="svg-inline--fa fa-check" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                    <path fill="currentColor" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"></path>
                </svg>
                Personal</button>
            <button type="button" class="button" data-id="2">
                <svg class="svg-inline--fa fa-check" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                    <path fill="currentColor" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"></path>
                </svg>
                Corporate</button>
            <button type="button" class="button" data-id="3">
                <svg class="svg-inline--fa fa-check" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                    <path fill="currentColor" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"></path>
                </svg>
                Event Planner</button>
        </div>
    </div>
    <form action="{{ route('admin.customer.store') }}" method="post" id=customer_form>
        @csrf
        <input type="hidden" name="route" value="first">
        <div class="cus-row ">
            <div class="col-6 main-order-item">
                <div class="global-form main-form height-100">
                    <h2>Main</h2>
                    <hr>
                    <div class="cus-row">
                        <div class="col-4 mb-10">
                            <label class="align-right">Title:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <select class="mr_mrs" name="mr_mrs">
                                <option value="">----</option>
                                <option value="Mr." {{ old('mr_mrs') == 'Mr.' ? 'selected' : '' }}>Mr.</option>
                                <option value="Mrs." {{ old('mr_mrs') == 'Mrs.' ? 'selected' : '' }}>Mrs.</option>
                                <option value="Mis." {{ old('mr_mrs') == 'Mis.' ? 'selected' : '' }}>Mis.</option>
                                <option value="Dr." {{ old('mr_mrs') == 'Dr.' ? 'selected' : '' }}>Dr.</option>
                            </select>                            
                        </div>
                        <div class="col-4 mb-10">
                            <label class="align-right">Relation:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <select class="contact_relation" name="relation">
                                <option value="1" {{ old('relation') == '1' ? 'selected' : '' }}>Single Person</option>
                                <option value="2" {{ old('relation') == '2' ? 'selected' : '' }}>Bride</option>
                                <option value="3" {{ old('relation') == '3' ? 'selected' : '' }}>Groom</option>
                                <option value="4" {{ old('relation') == '4' ? 'selected' : '' }}>Wife</option>
                                <option value="5" {{ old('relation') == '5' ? 'selected' : '' }}>Husband</option>
                                <option value="6" {{ old('relation') == '6' ? 'selected' : '' }}>Child</option>
                                <option value="99" {{ old('relation') == '99' ? 'selected' : '' }}>Others</option>
                            </select>
                            <br>
                            @error('relation')
                                <span class="text-danger" style="color: rgb(255, 0, 0)">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-4 mb-10">
                            <label class="align-right">First Name:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <input size="34" class="first_name" name="first_name" value="{{ old('first_name') }}" type="text"><br>
                            @error('first_name')
                                <span class="text-danger" style="color: rgb(255, 0, 0)">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-4 mb-10">
                            <label class="align-right">Last Name:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <input size="34" class="last_name" name="last_name" value="{{ old('last_name') }}" type="text"><br>
                            @error('last_name')
                                <span class="text-danger" style="color: rgb(255, 0, 0)">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-4 mb-10">
                            <label class="align-right">Main Email:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <input size="34" class="main_email" type="email" name="main_email" value="{{ old('main_email') }}">
                            <button class="button add" data-id="1">
                                <svg class="svg-inline--fa fa-plus" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"></path></svg>
                            </button><br>
                            @error('main_email')
                                <span class="text-danger" style="color: rgb(255, 0, 0)">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="alt_email row d-none">
                            <div class="col-4 mb-10" style="float: left;">
                                <label class="align-right">Alt Email:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0" style="float:right;">
                                <input size="34" class="alt_email" type="email" name="alt_email" value="{{ old('alt_email') }}">
                            </div>
                        </div>

                        <div class="col-4 mb-10">
                            <label class="align-right">Cell Phone:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <input class="phone_cell" type="text" name="cell_phone" value="{{ old('cell_phone') }}">
                            <button class="button add" data-id="2">
                                <svg class="svg-inline--fa fa-plus" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"></path></svg>
                            </button><br>
                            @error('cell_phone')
                                <span class="text-danger" style="color: rgb(255, 0, 0)">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="alt_phone row d-none">
                            <div class="col-4 mb-10" style="float: left;">
                                <label class="align-right">Alt Phone:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <input class="phone cell" type="text" name="alt_phone" value="{{ old('alt_phone') }}">
                            </div>
                        </div>
                        <div class="col-4 mb-10">
                            <label class="align-right">Ad Campaign:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <select class="customer_ad_campaign" name="ad_campaign">
                                <option >----</option>
                                @foreach ($marketingCamps as $_marketingCamp)
                                    <option value="{{$_marketingCamp->id}}">{{$_marketingCamp->campaign_name}}</option>
                                @endforeach
                            </select><br>
                            @error('ad_campaign')
                                <span class="text-danger" style="color: rgb(255, 0, 0)">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-4 mb-10">
                            <label class="align-right">Street Addr:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <input size="34" class="street_addr" type="text" name="street_addr" value="{{ old('street_addr') }}">
                        </div>
                        <div class="col-4 mb-10">
                            <label class="align-right">City:</label>
                        </div>
                        <div class="col-2 mb-10 p-0">
                            <input class="city w-100" type="text" name="city" value="{{ old('city') }}">
                        </div>
                        <div class="col-2 mb-10 p-0">
                            <label class="align-right">Postal Code:</label>
                        </div>
                        <div class="col-3 mb-10">
                            <input class="postal_code w-100" type="text" name="postal_code" value="{{ old('postal_code') }}">
                        </div>
                        <div class="col-4 mb-10">
                            <label class="align-right">Country:</label>
                        </div>
                        <div class="col-3 mb-10 pl-0">
                            <select class="country w-100" name="country">
                                <option value="">----</option>
                                <option value="CA" {{ old('country') == 'CA' ? 'selected' : '' }}>Canada</option>
                                <option value="US" {{ old('country') == 'US' ? 'selected' : '' }}>United States</option>
                                <option value="AF" {{ old('country') == 'AF' ? 'selected' : '' }}>Afghanistan</option>
                                <option value="AL" {{ old('country') == 'AL' ? 'selected' : '' }}>Albania</option>
                                <option value="DZ" {{ old('country') == 'DZ' ? 'selected' : '' }}>Algeria</option>
                                <option value="AS" {{ old('country') == 'AS' ? 'selected' : '' }}>American Samoa</option>
                                <option value="AD" {{ old('country') == 'AD' ? 'selected' : '' }}>Andorra</option>
                                <option value="AO" {{ old('country') == 'AO' ? 'selected' : '' }}>Angola</option>
                                <option value="AI" {{ old('country') == 'AI' ? 'selected' : '' }}>Anguilla</option>
                                <option value="AQ" {{ old('country') == 'AQ' ? 'selected' : '' }}>Antarctica</option>
                                <option value="AG" {{ old('country') == 'AG' ? 'selected' : '' }}>Antigua &amp; Barbuda</option>
                                <option value="AR" {{ old('country') == 'AR' ? 'selected' : '' }}>Argentina</option>
                                <option value="AM" {{ old('country') == 'AM' ? 'selected' : '' }}>Armenia</option>
                            </select>
                        </div>
                        <div class="col-2 mb-10 pr-0">
                            <label class="align-right">Province:</label>
                        </div>
                        <div class="col-3 mb-10">
                            <select class="province w-100" name="province">
                                <option >----</option>
                                <option value="1" {{ old('province') == '1' ? 'selected' : '' }}>Alberta</option>
                                <option value="2" {{ old('province') == '2' ? 'selected' : '' }}>British Columbia</option>
                                <option value="3" {{ old('province') == '3' ? 'selected' : '' }}>Manitoba</option>
                                <option value="4" {{ old('province') == '4' ? 'selected' : '' }}>New Brunswick</option>
                                <option value="5" {{ old('province') == '5' ? 'selected' : '' }}>Newfoundland</option>
                                <option value="6" {{ old('province') == '6' ? 'selected' : '' }}>Northwest Territories</option>
                                <option value="7" {{ old('province') == '7' ? 'selected' : '' }}>Nova Scotia</option>
                                <option value="8" {{ old('province') == '8' ? 'selected' : '' }}>Nunavut</option>
                                <option value="9" {{ old('province') == '9' ? 'selected' : '' }}>Ontario</option>
                                <option value="10" {{ old('province') == '10' ? 'selected' : '' }}>Prince Edward Island</option>
                                <option value="11" {{ old('province') == '11' ? 'selected' : '' }}>Quebec</option>
                                <option value="12" {{ old('province') == '12' ? 'selected' : '' }}>Saskatchewan</option>
                            </select>
                        </div>
                        <div class="col-4 mb-10">
                            <label class="align-right">Contact Notes:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <textarea class="contact_notes" rows="3" cols="50" name="contact_notes">{{ old('contact_notes') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 second_contact second_contact_validete d-none mt-5">
                <div class="global-form main-form height-100 ">
                    <h2>Second Contact </h2>
                    <hr>
                    <div class="cus-row">
                        <div class="col-4 mb-10">
                            <label class="align-right">Title:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <select class="mr_mrs" name="second_mr_mrs">
                                <option value="">----</option>
                                <option value="Mr." {{ old('mr_mrs') == 'Mr.' ? 'selected' : '' }}>Mr.</option>
                                <option value="Mrs." {{ old('mr_mrs') == 'Mrs.' ? 'selected' : '' }}>Mrs.</option>
                                <option value="Mis." {{ old('mr_mrs') == 'Mis.' ? 'selected' : '' }}>Mis.</option>
                                <option value="Dr." {{ old('mr_mrs') == 'Dr.' ? 'selected' : '' }}>Dr.</option>
                            </select>
                        </div>
                        <div class="col-4 mb-10">
                            <label class="align-right">Relation:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <select class="contact_relation" name="second_relation">
                                <option value="1" {{ old('relation') == '1' ? 'selected' : '' }}>Single Person</option>
                                <option value="2" {{ old('relation') == '2' ? 'selected' : '' }}>Bride</option>
                                <option value="3" {{ old('relation') == '3' ? 'selected' : '' }}>Groom</option>
                                <option value="4" {{ old('relation') == '4' ? 'selected' : '' }}>Wife</option>
                                <option value="5" {{ old('relation') == '5' ? 'selected' : '' }}>Husband</option>
                                <option value="6" {{ old('relation') == '6' ? 'selected' : '' }}>Child</option>
                                <option value="99" {{ old('relation') == '99' ? 'selected' : '' }}>Others</option>
                            </select>
                        </div>
                        <div class="col-4 mb-10">
                            <label class="align-right">First Name:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <input size="34" class="first_name" type="text" name="second_first_name" value="{{ old('second_first_name') }}">
                        </div>
                        <div class="col-4 mb-10">
                            <label class="align-right">Last Name:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <input size="34" class="last_name" type="text" name="second_last_name" value="{{ old('second_last_name') }}">
                        </div>
                        <div class="col-4 mb-10">
                            <label class="align-right">Main Email:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <input size="34" class="main_email" type="email" name="second_main_email" value="{{ old('second_main_email') }}">
                            <button class="button add" data-id="1">
                                <svg class="svg-inline--fa fa-plus" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"></path></svg>
                            </button>
                        </div>

                        <div class="alt_email row d-none">
                            <div class="col-4 mb-10" style="float: left;">
                                <label class="align-right">Alt Email:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0" style="float:right;">
                                <input size="34" class="alt_email" type="email" name="second_alt_email" value="{{ old('second_alt_email') }}">
                            </div>
                        </div>

                        <div class="col-4 mb-10">
                            <label class="align-right">Cell Phone:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <input class="phone cell" type="text" name="second_cell_phone" value="{{ old('second_cell_phone') }}">
                            <button class="button add" data-id="2">
                                <svg class="svg-inline--fa fa-plus" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"></path></svg>
                            </button>
                        </div>
                        <div class="alt_phone row d-none">
                            <div class="col-4 mb-10" style="float: left;">
                                <label class="align-right">Alt Phone:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <input class="phone cell" type="text" name="second_alt_phone" value="{{ old('second_alt_phone') }}">
                            </div>
                        </div>
                        <div class="col-4 mb-10">
                            <label class="align-right">Street Addr:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <input size="34" class="street_addr" type="text" name="second_street_addr" value="{{ old('second_street_addr') }}">
                        </div>
                        <div class="col-4 mb-10">
                            <label class="align-right">City:</label>
                        </div>
                        <div class="col-2 mb-10 p-0">
                            <input class="city w-100" type="text" name="second_city" value="{{ old('second_city') }}">
                        </div>
                        <div class="col-2 mb-10 p-0">
                            <label class="align-right">Postal Code:</label>
                        </div>
                        <div class="col-3 mb-10">
                            <input class="postal_code w-100" type="text" name="second_postal_code" value="{{ old('second_postal_code') }}">
                        </div>
                        <div class="col-4 mb-10">
                            <label class="align-right">Country:</label>
                        </div>
                        <div class="col-3 mb-10 pl-0">
                            <select class="country w-100" name="second_country">
                                <option value="">----</option>
                                <option value="CA" {{ old('second_country') == 'CA' ? 'selected' : '' }}>Canada</option>
                                <option value="US" {{ old('second_country') == 'US' ? 'selected' : '' }}>United States</option>
                                <option value="AF" {{ old('second_country') == 'AF' ? 'selected' : '' }}>Afghanistan</option>
                                <option value="AL" {{ old('second_country') == 'AL' ? 'selected' : '' }}>Albania</option>
                                <option value="DZ" {{ old('second_country') == 'DZ' ? 'selected' : '' }}>Algeria</option>
                                <option value="AS" {{ old('second_country') == 'AS' ? 'selected' : '' }}>American Samoa</option>
                                <option value="AD" {{ old('second_country') == 'AD' ? 'selected' : '' }}>Andorra</option>
                                <option value="AO" {{ old('second_country') == 'AO' ? 'selected' : '' }}>Angola</option>
                                <option value="AI" {{ old('second_country') == 'AI' ? 'selected' : '' }}>Anguilla</option>
                                <option value="AQ" {{ old('second_country') == 'AQ' ? 'selected' : '' }}>Antarctica</option>
                                <option value="AG" {{ old('second_country') == 'AG' ? 'selected' : '' }}>Antigua &amp; Barbuda</option>
                                <option value="AR" {{ old('second_country') == 'AR' ? 'selected' : '' }}>Argentina</option>
                                <option value="AM" {{ old('second_country') == 'AM' ? 'selected' : '' }}>Armenia</option>
                            </select>
                        </div>
                        <div class="col-2 mb-10 pr-0">
                            <label class="align-right">Province:</label>
                        </div>
                        <div class="col-3 mb-10">
                            <select class="province w-100" name="second_province">
                                <option value="">----</option>
                                <option value="1" {{ old('second_province') == '1' ? 'selected' : '' }}>Alberta</option>
                                <option value="2" {{ old('second_province') == '2' ? 'selected' : '' }}>British Columbia</option>
                                <option value="3" {{ old('second_province') == '3' ? 'selected' : '' }}>Manitoba</option>
                                <option value="4" {{ old('second_province') == '4' ? 'selected' : '' }}>New Brunswick</option>
                                <option value="5" {{ old('second_province') == '5' ? 'selected' : '' }}>Newfoundland</option>
                                <option value="6" {{ old('second_province') == '6' ? 'selected' : '' }}>Northwest Territories</option>
                                <option value="7" {{ old('second_province') == '7' ? 'selected' : '' }}>Nova Scotia</option>
                                <option value="8" {{ old('second_province') == '8' ? 'selected' : '' }}>Nunavut</option>
                                <option value="9" {{ old('second_province') == '9' ? 'selected' : '' }}>Ontario</option>
                                <option value="10" {{ old('second_province') == '10' ? 'selected' : '' }}>Prince Edward Island</option>
                                <option value="11" {{ old('second_province') == '11' ? 'selected' : '' }}>Quebec</option>
                                <option value="12" {{ old('second_province') == '12' ? 'selected' : '' }}>Saskatchewan</option>
                            </select>
                        </div>
                        <div class="col-4 mb-10">
                            <label class="align-right">Contact Notes:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <textarea class="contact_notes" rows="3" cols="50" name="second_contact_notes">{{ old('second_contact_notes') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 corporate_info">
                <div class="global-form corporate-form height-100 d-none">
                    <h2>Corporate Info.</h2>
                    <hr>
                    <div class="cus-row">
                        <div class="col-4 mb-10">
                            <label class="align-right">Customer Name:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <input size="34" class="customer_name" name="customer_name" value="{{ old('customer_name') }}"><br>
                            @error('customer_name')
                                <span class="text-danger" style="color: rgb(255, 0, 0)">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-4 mb-10">
                            <label class="align-right">General Email:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <input type="email" size="34" name="general_email" value="{{ old('general_email') }}">
                        </div>
                        <div class="col-4 mb-10">
                            <label class="align-right">Num. Employees:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <select class="customer_num_emps" name="no_of_emps">
                                <option value="">----</option>
                                <option value="1" {{ old('employee_count') == '1' ? 'selected' : '' }}>1 to 10</option>
                                <option value="2" {{ old('employee_count') == '2' ? 'selected' : '' }}>11 to 50</option>
                                <option value="3" {{ old('employee_count') == '3' ? 'selected' : '' }}>51 to 100</option>
                                <option value="4" {{ old('employee_count') == '4' ? 'selected' : '' }}>101 to 500</option>
                                <option value="5" {{ old('employee_count') == '5' ? 'selected' : '' }}>501 to 5,000</option>
                                <option value="6" {{ old('employee_count') == '6' ? 'selected' : '' }}>More than 5,000</option>
                            </select>
                        </div>
                        <div class="col-4 mb-10">
                            <label class="align-right">Web:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <input size="34" class="customer_web" type="text" name="web_url" value="{{ old('web_url') }}">
                        </div>
                        <div class="col-4 mb-10">
                            <label class="align-right">Special Notes:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <textarea class="customer_notes" rows="3" cols="50" name="special_notes">{{ old('special_notes') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="form_footer mt-20">
            <button class="button submit-form font-bold radius-0" type="submit">Save</button>
            <button class="button btn_toggle_second_contact font-bold radius-0">Add Second Contact</button>
        </div>
    </form>
</div>

<div class="new_customer_dups d-none">
    
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $('.add').click(function(e) {
            e.preventDefault();
            var item = $(this).attr('data-id');
            console.log(item);
            if (item == 1) {
                $('.alt_email').show();
                $($(this)).hide();
            }else if(item == 2){
                $('.alt_phone').show();
                $($(this)).hide();
            }
        });

        var validator =  $("#customer_form").validate({
            rules: {
                'first_name': 'required',
                'last_name': 'required',
                'relation': 'required',
                'main_email': 'required',
                'cell_phone': 'required',
                'ad_campaign': 'number',
                'postal_code': {
                    maxlength: 10
                }
            },
            messages: {
                'first_name': 'First Name is required',
                'last_name': 'Last Name is required',
                'relation': 'The relation must be a number.',
                'main_email': 'The main email field is required.',
                'cell_phone': 'Cell Phone is required',
                'ad_campaign': 'The ad campaign must be a number.',
                'postal_code': 'Postal Code should not exceed 10 characters.',
            }
        });
        
        $(".customer_type_select button").click(function(e) {
            e.preventDefault();

            $(".customer_type_select button").removeClass("checked");
            $(".customer_type_select button svg").css('display', 'none');

            $(this).addClass("checked");
            $(this).find('svg').show();

            var selectedDataId = $(this).attr('data-id');
            localStorage.setItem('selectedDataId', selectedDataId);

            var value = $(this).attr('data-id');
            if (value == 1) {
                $('.main-form').show();
                $('.corporate-form').hide();
                $('.main-order-item').css('order', '0');
                $('.second_contact').css('order', 'revert');
            } else if (value == 2) {
                $('.corporate-form').show();
                $('.corporate_info').css('order', '1');
                $('.main-order-item').css('order', '2');
                $('.second_contact').css('order', '3');
                validator.settings.rules['customer_name'] = "required";
                validator.settings.messages['customer_name'] = "Please enter the customer name";
                validator.focusInvalid();
            } else {
                $('.corporate-form').show();
                $('.corporate_info').css('order', '1');
                $('.main-order-item').css('order', '2');
            }
        });
        var storedDataId = localStorage.getItem('selectedDataId');
        if (storedDataId) {
            $(".customer_type_select button[data-id='" + storedDataId + "']").addClass("checked");
            $(".customer_type_select button[data-id='" + storedDataId + "'] svg").show();
            $(".customer_type_select button[data-id='" + storedDataId + "']").trigger('click');
        }

        $('.btn_toggle_second_contact').click(function (e) { 
            e.preventDefault();
            if ($(this).text() === 'Add Second Contact') {
                $(this).text('Remove Second Contact');
                $('.second_contact').show();
                validator.settings.rules['second_first_name'] = "required";
                validator.settings.rules['second_last_name'] = "required";
                validator.settings.rules['second_main_email'] = {
                    required: true,
                    email: true
                };
                validator.settings.rules['second_postal_code'] = {
                    maxlength: 10
                };
                validator.settings.rules['second_cell_phone'] = "required";
                validator.settings.rules['second_relation'] = "required";
                validator.focusInvalid();
                
            } else {
                $(this).text('Add Second Contact');
                $('.second_contact').hide();
                delete validator.settings.rules['second_first_name'];
                delete validator.settings.rules['second_last_name'];
                delete validator.settings.rules['second_main_email'];
                delete validator.settings.rules['second_cell_phone'];
                delete validator.settings.rules['second_relation'];
                delete validator.settings.rules['second_postal_code'];
            }
        });

        $(document).on('input', '#customer_form', function() {
            var first_name = $('.first_name').val();
            var last_name = $('.last_name').val();
            var email = $('.main_email').val();
            var phone_cell = $('.phone_cell').val();
            if((first_name && last_name) || email || phone_cell){
                $.ajax({
                    url: "{{ route('admin.create-customer-search') }}",
                    type: 'GET',
                    data: { first_name: first_name, last_name: last_name, email: email, phone_cell: phone_cell}, 
                    success: function(customerData) {
                        $('.new_customer_dups').empty(html);
                        if(customerData.length > 0){
                            var html = '';
                            html += '<span class="btn_close_cust_dups btn">' +
                                    '<svg class="svg-inline--fa fa-circle-xmark" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">'+
                                    '<path fill="currentColor" d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z"></path>'+
                                    '</svg><!-- <i class="fa-solid fa-circle-xmark"></i> Font Awesome fontawesome.com -->'+
                                    '</span>'+
                                    '<h2>Please Consider the Following Existing Customers</h2>'+
                                    '<br>'+
                                    '<p class="found_dup_row header"><span></span> <span>Id</span><span>Name</span><span>Email</span><span>Phone</span><span>Cell</span><span></span></p>'
                            $.each(customerData, function(index, value) {
                                // Generating HTML dynamically
                                html += '<p class="found_dup_row actual_body" customer_id="' + value.lnk_customer + '">';
                                html += '<span><strong>' + (index + 1) + ') </strong></span>';
                                html += '<span>' + value.lnk_customer+ '</span>';
                                html += '<span>' + value.last_name +','+ value.first_name + '</span>';
                                html += '<span>' + value.main_email + '</span>';
                                html += '<span>' + (value.phone ? value.phone : '') + '</span>';
                                html += '<span>' + value.cell_phone + '</span>';
                                html += '<span><span class="small_button btn_this_is_it">This is it!</span></span>';
                                html += '</p>';
                            });
                            $('.new_customer_dups').append(html);
                            $('.new_customer_dups').removeClass('d-none')
                        }
                    },
                    error: function(error) {
                        console.error('Ajax request failed:', error);
                    }
                });
            }
        });

        $(document).on('click', '.btn_this_is_it', function() {
            sessionStorage.setItem("btn", '');
            sessionStorage.setItem("btn", 'This is it!');
            var customer_id = $(this).closest('.actual_body').attr('customer_id');
            var url = "{{ route('admin.customer.show', ':id') }}";
            url = url.replace(':id', customer_id);
            location.href = url;
        });

        $(document).on('click', '.btn_close_cust_dups', function() {
            $('.new_customer_dups').addClass('d-none')
        });
        
    });
    

</script>
@endsection
