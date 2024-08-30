@extends('admin.layouts.master')
@section('title', 'On Hand PO List')
@section('style')
<style>
    .svg-inline--fa {
        display: var(--fa-display, inline-block);
        height: 1em;
        overflow: visible;
        vertical-align: -.125em;
    }
    .btn_copy_live_db_to_training {
        cursor: pointer;
        margin-left: .5em;
        color: #A04710;
        font-size: 19px;
    }
</style>
@endsection
@section('content')
<div class="title_bar card">
    <h1>Global Settings
        <a href="#" onclick="loadAjaxObject('obj=page&amp;page_id=sys_setting_new') ; return false;" class="q_tip"
            data-hasqtip="0" oldtitle="New Setting" title="" aria-describedby="qtip-0"><svg
                class="svg-inline--fa fa-plus" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus"
                role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                <path fill="currentColor"
                    d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z">
                </path>
            </svg><!-- <i class="fas fa-plus"></i> Font Awesome fontawesome.com --></a>
        <span class="btn_copy_live_db_to_training q_tip" data-hasqtip="11" oldtitle="Copy live database to training"
            title="" aria-describedby="qtip-11">
            <svg class="svg-inline--fa fa-copy" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="copy"
                role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                <path fill="currentColor"
                    d="M272 0H396.1c12.7 0 24.9 5.1 33.9 14.1l67.9 67.9c9 9 14.1 21.2 14.1 33.9V336c0 26.5-21.5 48-48 48H272c-26.5 0-48-21.5-48-48V48c0-26.5 21.5-48 48-48zM48 128H192v64H64V448H256V416h64v48c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V176c0-26.5 21.5-48 48-48z">
                </path>
            </svg><!-- <i class="fas fa-copy"></i> Font Awesome fontawesome.com -->
        </span>

    </h1>
</div>
@endsection
@section('scripts')
@endsection