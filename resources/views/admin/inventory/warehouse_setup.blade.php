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

.title_bar h2 {
    color: #373232;
}

.special_action {
    margin: 6px;
    text-align: center;
    padding: 2px 9px 4px 9px;
    display: inline;
}

.w_wrap {
    display: inline-block;
    width: 50em;
    vertical-align: top;
    margin: .5em;
}

.w_wrap:first-child {
    margin-left: 0;
}

.warehouse_icon {
    width: 1.5em;
    margin-right: .8em;
}

.w_wrap>div {
    margin: 1em;
}

.inv_entity {
    width: 8em;
    text-align: center;
    padding: .5em;
    display: inline-block;
    vertical-align: top;
    font-size: 1.1em;
    margin: .3em;
}

.w_wrap,
.w_wrap ul,
.w_wrap li {
    position: relative;
    padding: 9px 12px;
}

.w_wrap ul {
    list-style: none;
    padding-left: 32px;
}

.w_wrap li::before,
.w_wrap li::after {
    content: "";
    position: absolute;
    left: -12px;
}

.w_wrap li::before {
    border-top: 1px solid #000;
    top: 19px;
    width: 8px;
    height: 0;
}

.w_wrap li::after {
    border-left: 1px solid #000;
    height: 100%;
    width: 0px;
    top: 1px;
}

.w_wrap ul>li:last-child::after {
    height: 19px;
}

#inv_levels {
    display: inline-flex;
    flex-direction: row;
    flex-wrap: wrap;
}

.qtip_tip {
    display: none;
}

.qtip_tip table {
    border-spacing: 0;
}

.qtip_tip td {
    padding: .2em .8em;
    border: 1px solid #000;
}
#ajax_obj label {
    font-weight: bold;
    padding-right: 5px;
    min-width: 125px;
    text-align: right;
    display: inline-block;
    vertical-align: top;
}
p {
    margin: 0 0 6px 0;
    line-height: 120%;
    padding: 2px;
}
</style>
@endsection
@section('content')
<div class="title_bar card">
    <h1>Warehouse Structure</h1>
    <h2>Current Warehouses: {{ $invLevels->count() }}
        <div class="special_action">
            <button type="button" id="warehouse_add_new" class="button">Add Warehouse</button>
        </div>
    </h2>
</div>

<span id="inv_levels" class="xmlb_form">
    @foreach($invLevels as $_invLevel)
    <div class="w_wrap card" warehouse_id="$_invLevel->id">
        <div>
            <h2>
                <img class="warehouse_icon" src="{{ asset('backend/assets/img/icon_warehouse.png') }}">
                <a href="#">{{ $_invLevel->level_code }}</a>
                <button type="button" id="" class="button inv_level_delete" inv_level_id="{{ $_invLevel->id }}">Delete</button>
                <button type="button" class="button inv_level_edit" inv_level_id="{{ $_invLevel->id }}">Edit</button>
                <a href="javascrept:void(0)" class="btn_new_warehouse_level" level_code="{{ $_invLevel->level_code }}">
                    <img src="{{ asset('backend/assets/img/icon_add.png') }}" class="" title="Add new level">
                </a>
            </h2>
            <hr>
            <img class="has_qtip" src="{{ asset('backend/assets/img/icon_info.png') }}" data-hasqtip="0">
            <div class="qtip_tip">
                <h3>Current Items</h3>
                <br>
                <table>
                    <tbody>
                        <tr>
                            <td>Qty</td>
                            <td>Item</td>
                        </tr>
                        <tr>
                            <td>1.0000</td>
                            <td>176834</td>
                        </tr>
                        <tr>
                            <td>6.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>23.0000</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endforeach
    <!-- <div class="w_wrap card" warehouse_id="10">
        <div>
            <h2><img class="warehouse_icon" src="/images/inv_mgmt/icon_warehouse.png"><a
                    href="https://www.royalambassador.ca/db_inventory/warehouse_level_view.php?inv_level_id=10">Conservatory
                    Beer Fridge</a> <input type="image" src="/images/icon_delete.png" id="inv_levels_delete"
                    name="inv_levels_delete" class="button"
                    onclick="if (confirm('Do you really want to delete this record?')) {$('#inv_levels_submit').val('10') ; deleteRecords('inv_levels','warehouse_setup','action_elm_id=action_ajax_delete','inv_levels_submit');} return false ;"
                    fdprocessedid="ucpbis"> <a href="#"
                    onclick="loadAjaxObject('obj=page&amp;page_id=inv_level_edit?inv_level_id=10') ; return false;"></a><a
                    href="#"
                    onclick="loadAjaxObject('obj=page&amp;page_id=inv_level_edit?inv_level_id=10') ; return false;"><img
                        src="/images/icon_edit.png" class="button"></a> <a href="#"
                    onclick="loadAjaxObject('obj=page&amp;page_id=warehouse_add_level?parent_level_id=10') ; return false;"></a><a
                    href="#"
                    onclick="loadAjaxObject('obj=page&amp;page_id=warehouse_add_level?parent_level_id=10') ; return false;"><img
                        src="/images/icon_add.png" class="button" title="Add new level"></a></h2>
            <hr>
        </div>
    </div>
    <div class="w_wrap card" warehouse_id="7">
        <div>
            <h2><img class="warehouse_icon" src="/images/inv_mgmt/icon_warehouse.png"><a
                    href="https://www.royalambassador.ca/db_inventory/warehouse_level_view.php?inv_level_id=7">Greenhouse
                    Beer Fridge</a> <input type="image" src="/images/icon_delete.png" id="inv_levels_delete"
                    name="inv_levels_delete" class="button"
                    onclick="if (confirm('Do you really want to delete this record?')) {$('#inv_levels_submit').val('7') ; deleteRecords('inv_levels','warehouse_setup','action_elm_id=action_ajax_delete','inv_levels_submit');} return false ;"
                    fdprocessedid="q35b8i"> <a href="#"
                    onclick="loadAjaxObject('obj=page&amp;page_id=inv_level_edit?inv_level_id=7') ; return false;"></a><a
                    href="#"
                    onclick="loadAjaxObject('obj=page&amp;page_id=inv_level_edit?inv_level_id=7') ; return false;"><img
                        src="/images/icon_edit.png" class="button"></a> <a href="#"
                    onclick="loadAjaxObject('obj=page&amp;page_id=warehouse_add_level?parent_level_id=7') ; return false;"></a><a
                    href="#"
                    onclick="loadAjaxObject('obj=page&amp;page_id=warehouse_add_level?parent_level_id=7') ; return false;"><img
                        src="/images/icon_add.png" class="button" title="Add new level"></a></h2>
            <hr> <img class="has_qtip" src="/images/icon_info.png" data-hasqtip="1">
            <div class="qtip_tip">
                <h3>Current Items</h3>
                <br>
                <table>
                    <tbody>
                        <tr>
                            <td>Qty</td>
                            <td>Item</td>
                        </tr>
                        <tr>
                            <td>8.0000</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="w_wrap card" warehouse_id="6">
        <div>
            <h2><img class="warehouse_icon" src="/images/inv_mgmt/icon_warehouse.png"><a
                    href="https://www.royalambassador.ca/db_inventory/warehouse_level_view.php?inv_level_id=6">Greenhouse
                    Liquor Room</a> <input type="image" src="/images/icon_delete.png" id="inv_levels_delete"
                    name="inv_levels_delete" class="button"
                    onclick="if (confirm('Do you really want to delete this record?')) {$('#inv_levels_submit').val('6') ; deleteRecords('inv_levels','warehouse_setup','action_elm_id=action_ajax_delete','inv_levels_submit');} return false ;"
                    fdprocessedid="lou0oe"> <a href="#"
                    onclick="loadAjaxObject('obj=page&amp;page_id=inv_level_edit?inv_level_id=6') ; return false;"></a><a
                    href="#"
                    onclick="loadAjaxObject('obj=page&amp;page_id=inv_level_edit?inv_level_id=6') ; return false;"><img
                        src="/images/icon_edit.png" class="button"></a> <a href="#"
                    onclick="loadAjaxObject('obj=page&amp;page_id=warehouse_add_level?parent_level_id=6') ; return false;"></a><a
                    href="#"
                    onclick="loadAjaxObject('obj=page&amp;page_id=warehouse_add_level?parent_level_id=6') ; return false;"><img
                        src="/images/icon_add.png" class="button" title="Add new level"></a></h2>
            <hr> <img class="has_qtip" src="/images/icon_info.png" data-hasqtip="2">
            <div class="qtip_tip">
                <h3>Current Items</h3>
                <br>
                <table>
                    <tbody>
                        <tr>
                            <td>Qty</td>
                            <td>Item</td>
                        </tr>
                        <tr>
                            <td>0.7500</td>
                            <td>20206</td>
                        </tr>
                        <tr>
                            <td>0.2500</td>
                            <td>20209</td>
                        </tr>
                        <tr>
                            <td>0.7500</td>
                            <td>20207</td>
                        </tr>
                        <tr>
                            <td>1.7500</td>
                            <td>20208</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="w_wrap card" warehouse_id="5">
        <div>
            <h2><img class="warehouse_icon" src="/images/inv_mgmt/icon_warehouse.png"><a
                    href="https://www.royalambassador.ca/db_inventory/warehouse_level_view.php?inv_level_id=5">Beer
                    Fridge (West)</a> <input type="image" src="/images/icon_delete.png" id="inv_levels_delete"
                    name="inv_levels_delete" class="button"
                    onclick="if (confirm('Do you really want to delete this record?')) {$('#inv_levels_submit').val('5') ; deleteRecords('inv_levels','warehouse_setup','action_elm_id=action_ajax_delete','inv_levels_submit');} return false ;"
                    fdprocessedid="tmos3r"> <a href="#"
                    onclick="loadAjaxObject('obj=page&amp;page_id=inv_level_edit?inv_level_id=5') ; return false;"></a><a
                    href="#"
                    onclick="loadAjaxObject('obj=page&amp;page_id=inv_level_edit?inv_level_id=5') ; return false;"><img
                        src="/images/icon_edit.png" class="button"></a> <a href="#"
                    onclick="loadAjaxObject('obj=page&amp;page_id=warehouse_add_level?parent_level_id=5') ; return false;"></a><a
                    href="#"
                    onclick="loadAjaxObject('obj=page&amp;page_id=warehouse_add_level?parent_level_id=5') ; return false;"><img
                        src="/images/icon_add.png" class="button" title="Add new level"></a></h2>
            <hr> <img class="has_qtip" src="/images/icon_info.png" data-hasqtip="3">
            <div class="qtip_tip">
                <h3>Current Items</h3>
                <br>
                <table>
                    <tbody>
                        <tr>
                            <td>Qty</td>
                            <td>Item</td>
                        </tr>
                        <tr>
                            <td>4887.0000</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="w_wrap card" warehouse_id="4">
        <div>
            <h2><img class="warehouse_icon" src="/images/inv_mgmt/icon_warehouse.png"><a
                    href="https://www.royalambassador.ca/db_inventory/warehouse_level_view.php?inv_level_id=4">Beer
                    Fridge (East)</a> <input type="image" src="/images/icon_delete.png" id="inv_levels_delete"
                    name="inv_levels_delete" class="button"
                    onclick="if (confirm('Do you really want to delete this record?')) {$('#inv_levels_submit').val('4') ; deleteRecords('inv_levels','warehouse_setup','action_elm_id=action_ajax_delete','inv_levels_submit');} return false ;"
                    fdprocessedid="2zz1x8"> <a href="#"
                    onclick="loadAjaxObject('obj=page&amp;page_id=inv_level_edit?inv_level_id=4') ; return false;"></a><a
                    href="#"
                    onclick="loadAjaxObject('obj=page&amp;page_id=inv_level_edit?inv_level_id=4') ; return false;"><img
                        src="/images/icon_edit.png" class="button"></a> <a href="#"
                    onclick="loadAjaxObject('obj=page&amp;page_id=warehouse_add_level?parent_level_id=4') ; return false;"></a><a
                    href="#"
                    onclick="loadAjaxObject('obj=page&amp;page_id=warehouse_add_level?parent_level_id=4') ; return false;"><img
                        src="/images/icon_add.png" class="button" title="Add new level"></a></h2>
            <hr> <img class="has_qtip" src="/images/icon_info.png" data-hasqtip="4">
            <div class="qtip_tip">
                <h3>Current Items</h3>
                <br>
                <table>
                    <tbody>
                        <tr>
                            <td>Qty</td>
                            <td>Item</td>
                        </tr>
                        <tr>
                            <td>8115.0000</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="w_wrap card" warehouse_id="3">
        <div>
            <h2><img class="warehouse_icon" src="/images/inv_mgmt/icon_warehouse.png"><a
                    href="https://www.royalambassador.ca/db_inventory/warehouse_level_view.php?inv_level_id=3">Banquet
                    Hall Liquor Room</a> <input type="image" src="/images/icon_delete.png" id="inv_levels_delete"
                    name="inv_levels_delete" class="button"
                    onclick="if (confirm('Do you really want to delete this record?')) {$('#inv_levels_submit').val('3') ; deleteRecords('inv_levels','warehouse_setup','action_elm_id=action_ajax_delete','inv_levels_submit');} return false ;"
                    fdprocessedid="2evajx"> <a href="#"
                    onclick="loadAjaxObject('obj=page&amp;page_id=inv_level_edit?inv_level_id=3') ; return false;"></a><a
                    href="#"
                    onclick="loadAjaxObject('obj=page&amp;page_id=inv_level_edit?inv_level_id=3') ; return false;"><img
                        src="/images/icon_edit.png" class="button"></a> <a href="#"
                    onclick="loadAjaxObject('obj=page&amp;page_id=warehouse_add_level?parent_level_id=3') ; return false;"></a><a
                    href="#"
                    onclick="loadAjaxObject('obj=page&amp;page_id=warehouse_add_level?parent_level_id=3') ; return false;"><img
                        src="/images/icon_add.png" class="button" title="Add new level"></a></h2>
            <hr> <img class="has_qtip" src="/images/icon_info.png" data-hasqtip="5">
            <div class="qtip_tip">
                <h3>Current Items</h3>
                <br>
                <table>
                    <tbody>
                        <tr>
                            <td>Qty</td>
                            <td>Item</td>
                        </tr>
                        <tr>
                            <td>7.5000</td>
                            <td>277954</td>
                        </tr>
                        <tr>
                            <td>5.0000</td>
                            <td>1487</td>
                        </tr>
                        <tr>
                            <td>7.0000</td>
                            <td>CA10009</td>
                        </tr>
                        <tr>
                            <td>38.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>4.5000</td>
                            <td>4101</td>
                        </tr>
                        <tr>
                            <td>3.0000</td>
                            <td>43703</td>
                        </tr>
                        <tr>
                            <td>2.0000</td>
                            <td>593889</td>
                        </tr>
                        <tr>
                            <td>8.0000</td>
                            <td>520320</td>
                        </tr>
                        <tr>
                            <td>5.0000</td>
                            <td>7617 </td>
                        </tr>
                        <tr>
                            <td>2.0000</td>
                            <td>605923</td>
                        </tr>
                        <tr>
                            <td>1.2500</td>
                            <td>20209</td>
                        </tr>
                        <tr>
                            <td>9.0000</td>
                            <td>437772</td>
                        </tr>
                        <tr>
                            <td>5.0000</td>
                            <td>605956</td>
                        </tr>
                        <tr>
                            <td>11.0000</td>
                            <td>631200</td>
                        </tr>
                        <tr>
                            <td>5.0000</td>
                            <td>631226</td>
                        </tr>
                        <tr>
                            <td>5.0000</td>
                            <td>605600</td>
                        </tr>
                        <tr>
                            <td>5.0000</td>
                            <td>215616</td>
                        </tr>
                        <tr>
                            <td>4.0000</td>
                            <td>10216</td>
                        </tr>
                        <tr>
                            <td>9.0000</td>
                            <td>605709</td>
                        </tr>
                        <tr>
                            <td>3.0000</td>
                            <td>518688</td>
                        </tr>
                        <tr>
                            <td>4.0000</td>
                            <td>491829</td>
                        </tr>
                        <tr>
                            <td>3.5000</td>
                            <td>215343</td>
                        </tr>
                        <tr>
                            <td>5.0000</td>
                            <td>631176</td>
                        </tr>
                        <tr>
                            <td>70.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2.0000</td>
                            <td>TR10166</td>
                        </tr>
                        <tr>
                            <td>3.0000</td>
                            <td>TR10167</td>
                        </tr>
                        <tr>
                            <td>2.0000</td>
                            <td>TR10168</td>
                        </tr>
                        <tr>
                            <td>2.0000</td>
                            <td>TR10169</td>
                        </tr>
                        <tr>
                            <td>1.0000</td>
                            <td>TR10170</td>
                        </tr>
                        <tr>
                            <td>3.0000</td>
                            <td>TR10171</td>
                        </tr>
                        <tr>
                            <td>1.0000</td>
                            <td>TR10172</td>
                        </tr>
                        <tr>
                            <td>5.0000</td>
                            <td>TR10173</td>
                        </tr>
                        <tr>
                            <td>7.0000</td>
                            <td>TR10174</td>
                        </tr>
                        <tr>
                            <td>3.0000</td>
                            <td>TR10175</td>
                        </tr>
                        <tr>
                            <td>3.0000</td>
                            <td>207662</td>
                        </tr>
                        <tr>
                            <td>7.0000</td>
                            <td>253914</td>
                        </tr>
                        <tr>
                            <td>6.0000</td>
                            <td>321562</td>
                        </tr>
                        <tr>
                            <td>2.0000</td>
                            <td>631218</td>
                        </tr>
                        <tr>
                            <td>3.0000</td>
                            <td>631234</td>
                        </tr>
                        <tr>
                            <td>10.0000</td>
                            <td>518670</td>
                        </tr>
                        <tr>
                            <td>11.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>216.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>168.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>144.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>4.0000</td>
                            <td>6049</td>
                        </tr>
                        <tr>
                            <td>10.0000</td>
                            <td>1925</td>
                        </tr>
                        <tr>
                            <td>2.0000</td>
                            <td>570002</td>
                        </tr>
                        <tr>
                            <td>24.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>77.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>30.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>6.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2.0000</td>
                            <td>637504</td>
                        </tr>
                        <tr>
                            <td>0.5000</td>
                            <td>1206 </td>
                        </tr>
                        <tr>
                            <td>5.5000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>9.0000</td>
                            <td>176834</td>
                        </tr>
                        <tr>
                            <td>48.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2.0000</td>
                            <td>103747</td>
                        </tr>
                        <tr>
                            <td>5.0000</td>
                            <td>117101</td>
                        </tr>
                        <tr>
                            <td>3.0000</td>
                            <td>400671</td>
                        </tr>
                        <tr>
                            <td>24.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>5.0000</td>
                            <td>10157</td>
                        </tr>
                        <tr>
                            <td>96.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>23.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>1.0000</td>
                            <td>220145</td>
                        </tr>
                        <tr>
                            <td>1.0000</td>
                            <td>631457</td>
                        </tr>
                        <tr>
                            <td>1.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>5.0000</td>
                            <td>56283</td>
                        </tr>
                        <tr>
                            <td>3.0000</td>
                            <td>896647</td>
                        </tr>
                        <tr>
                            <td>1.7500</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>1.5000</td>
                            <td>462424</td>
                        </tr>
                        <tr>
                            <td>6.0000</td>
                            <td>982264</td>
                        </tr>
                        <tr>
                            <td>4.0000</td>
                            <td>933796</td>
                        </tr>
                        <tr>
                            <td>9.0000</td>
                            <td>217802</td>
                        </tr>
                        <tr>
                            <td>5.0000</td>
                            <td>169441</td>
                        </tr>
                        <tr>
                            <td>7.5000</td>
                            <td>469643</td>
                        </tr>
                        <tr>
                            <td>12.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>7.0000</td>
                            <td>217448</td>
                        </tr>
                        <tr>
                            <td>1.0000</td>
                            <td>285163</td>
                        </tr>
                        <tr>
                            <td>2.0000</td>
                            <td>95935</td>
                        </tr>
                        <tr>
                            <td>3.0000</td>
                            <td>217554</td>
                        </tr>
                        <tr>
                            <td>3.0000</td>
                            <td>227405</td>
                        </tr>
                        <tr>
                            <td>3.0000</td>
                            <td>474528</td>
                        </tr>
                        <tr>
                            <td>6.0000</td>
                            <td>217653</td>
                        </tr>
                        <tr>
                            <td>6.0000</td>
                            <td>631432 </td>
                        </tr>
                        <tr>
                            <td>85.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>124.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>8.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>8.0000</td>
                            <td>446823</td>
                        </tr>
                        <tr>
                            <td>4.0000</td>
                            <td>447953</td>
                        </tr>
                        <tr>
                            <td>2.0000</td>
                            <td>180695</td>
                        </tr>
                        <tr>
                            <td>1.0000</td>
                            <td>398479</td>
                        </tr>
                        <tr>
                            <td>7.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2.0000</td>
                            <td>16833</td>
                        </tr>
                        <tr>
                            <td>36.0000</td>
                            <td>20231</td>
                        </tr>
                        <tr>
                            <td>28.0000</td>
                            <td>456996</td>
                        </tr>
                        <tr>
                            <td>5.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>4.0000</td>
                            <td>121749</td>
                        </tr>
                        <tr>
                            <td>1.0000</td>
                            <td>1867</td>
                        </tr>
                        <tr>
                            <td>3.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>1.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>6.0000</td>
                            <td>433417</td>
                        </tr>
                        <tr>
                            <td>12.0000</td>
                            <td>WN11246</td>
                        </tr>
                        <tr>
                            <td>2.0000</td>
                            <td>289496</td>
                        </tr>
                        <tr>
                            <td>1.0000</td>
                            <td>322297</td>
                        </tr>
                        <tr>
                            <td>6.0000</td>
                            <td>253948</td>
                        </tr>
                        <tr>
                            <td>108.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>3.0000</td>
                            <td>622134</td>
                        </tr>
                        <tr>
                            <td>2.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>1.0000</td>
                            <td>639906</td>
                        </tr>
                        <tr>
                            <td>2.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>7.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>48.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>1.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>1.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>1.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>5.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>6.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>6.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>1.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>1.0000</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="w_wrap card" warehouse_id="2">
        <div>
            <h2><img class="warehouse_icon" src="/images/inv_mgmt/icon_warehouse.png"><a
                    href="https://www.royalambassador.ca/db_inventory/warehouse_level_view.php?inv_level_id=2">2nd.
                    Floor Wine Room</a> <input type="image" src="/images/icon_delete.png" id="inv_levels_delete"
                    name="inv_levels_delete" class="button"
                    onclick="if (confirm('Do you really want to delete this record?')) {$('#inv_levels_submit').val('2') ; deleteRecords('inv_levels','warehouse_setup','action_elm_id=action_ajax_delete','inv_levels_submit');} return false ;"
                    fdprocessedid="ntwt"> <a href="#"
                    onclick="loadAjaxObject('obj=page&amp;page_id=inv_level_edit?inv_level_id=2') ; return false;"></a><a
                    href="#"
                    onclick="loadAjaxObject('obj=page&amp;page_id=inv_level_edit?inv_level_id=2') ; return false;"><img
                        src="/images/icon_edit.png" class="button"></a> <a href="#"
                    onclick="loadAjaxObject('obj=page&amp;page_id=warehouse_add_level?parent_level_id=2') ; return false;"></a><a
                    href="#"
                    onclick="loadAjaxObject('obj=page&amp;page_id=warehouse_add_level?parent_level_id=2') ; return false;"><img
                        src="/images/icon_add.png" class="button" title="Add new level"></a></h2>
            <hr> <img class="has_qtip" src="/images/icon_info.png" data-hasqtip="6">
            <div class="qtip_tip">
                <h3>Current Items</h3>
                <br>
                <table>
                    <tbody>
                        <tr>
                            <td>Qty</td>
                            <td>Item</td>
                        </tr>
                        <tr>
                            <td>8.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>9.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>1.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>1.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>10.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>3.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>5.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>5.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>5.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>1.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>10.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>10.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>3.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>6.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>5.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>17.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>3.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>3.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>9.0000</td>
                            <td>20968</td>
                        </tr>
                        <tr>
                            <td>4.0000</td>
                            <td>20977</td>
                        </tr>
                        <tr>
                            <td>9.0000</td>
                            <td>20981</td>
                        </tr>
                        <tr>
                            <td>2.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>6.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>1.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>5.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>3.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>5.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>7.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>1.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>1.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>7.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>3.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>7.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>5.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>4.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>4.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>3.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>3.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>5.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>5.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>1.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>3.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>7.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>5.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>25.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>6.0000</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="w_wrap card" warehouse_id="1">
        <div>
            <h2><img class="warehouse_icon" src="/images/inv_mgmt/icon_warehouse.png"><a
                    href="https://www.royalambassador.ca/db_inventory/warehouse_level_view.php?inv_level_id=1">1st.
                    Floor Wine Room</a> <input type="image" src="/images/icon_delete.png" id="inv_levels_delete"
                    name="inv_levels_delete" class="button"
                    onclick="if (confirm('Do you really want to delete this record?')) {$('#inv_levels_submit').val('1') ; deleteRecords('inv_levels','warehouse_setup','action_elm_id=action_ajax_delete','inv_levels_submit');} return false ;"
                    fdprocessedid="zgvug"> <a href="#"
                    onclick="loadAjaxObject('obj=page&amp;page_id=inv_level_edit?inv_level_id=1') ; return false;"></a><a
                    href="#"
                    onclick="loadAjaxObject('obj=page&amp;page_id=inv_level_edit?inv_level_id=1') ; return false;"><img
                        src="/images/icon_edit.png" class="button"></a> <a href="#"
                    onclick="loadAjaxObject('obj=page&amp;page_id=warehouse_add_level?parent_level_id=1') ; return false;"></a><a
                    href="#"
                    onclick="loadAjaxObject('obj=page&amp;page_id=warehouse_add_level?parent_level_id=1') ; return false;"><img
                        src="/images/icon_add.png" class="button" title="Add new level"></a></h2>
            <hr> <img class="has_qtip" src="/images/icon_info.png" data-hasqtip="7">
            <div class="qtip_tip">
                <h3>Current Items</h3>
                <br>
                <table>
                    <tbody>
                        <tr>
                            <td>Qty</td>
                            <td>Item</td>
                        </tr>
                        <tr>
                            <td>12.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>8.0000</td>
                            <td>20178</td>
                        </tr>
                        <tr>
                            <td>3.0000</td>
                            <td>20180</td>
                        </tr>
                        <tr>
                            <td>2.0000</td>
                            <td>20181</td>
                        </tr>
                        <tr>
                            <td>2.0000</td>
                            <td>20196</td>
                        </tr>
                        <tr>
                            <td>2.0000</td>
                            <td>20201</td>
                        </tr>
                        <tr>
                            <td>7.0000</td>
                            <td>20203</td>
                        </tr>
                        <tr>
                            <td>5.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>12.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>7.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>5.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>5.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>15.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>12.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>5.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>4.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>4.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>4.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>14.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>1.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>5.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>8.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>10.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>4.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>5.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>4.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>3.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>3.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>7.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>10.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>4.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>7.5000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>3.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>3.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>4.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>6.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>3.0000</td>
                            <td>20968</td>
                        </tr>
                        <tr>
                            <td>6.0000</td>
                            <td>201</td>
                        </tr>
                        <tr>
                            <td>3.0000</td>
                            <td>20981</td>
                        </tr>
                        <tr>
                            <td>6.0000</td>
                            <td>20989</td>
                        </tr>
                        <tr>
                            <td>5.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>12.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>5.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>14.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>0.7500</td>
                            <td>16081</td>
                        </tr>
                        <tr>
                            <td>6.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>3.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>12.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>7.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>6.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>6.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>1.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>5.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>8.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>3.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>11.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>5.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>8.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>5.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>6.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>9.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>5.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>6.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>9.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>6.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>12.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>3.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>5.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>7.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>8.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>6.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>8.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>0.7500</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>5.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>5.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>6.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>11.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>8.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>9.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>1.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>4.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>9.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>35.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>24.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>10.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>12.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>12.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>12.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>4.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>8.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>16.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>9.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>10.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>8.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>1.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>1.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>6.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>12.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>16.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>7.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>5.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>12.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>24.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>11.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>14.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>12.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>12.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>10.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>11.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>3.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>1.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>18.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>6.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>12.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>4.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>4.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>12.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>12.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>6.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>12.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>12.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>12.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>6.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>24.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>12.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>16.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>12.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>12.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>3.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>3.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>3.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>6.0000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>1.0000</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div> -->
</span>

<div class="ui-widget-overlay ui-front d-none"></div>
<!-- Add New Warehouse Module -->
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-add-new-warehouse d-none "
    tabindex="-1" style="width: 600px; top:193px; left: 328px;" role="dialog" aria-describedby="ajax_obj"
    aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">New Warehouse</span>
        <button
            class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close add-new-warehouse-close"
            role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content" style="width: auto">
        <span id="new_inv_level" class="xmlb_form">
            <form method="post" id="frm_new_inv_level" action="{{ route('admin.warehouse-setup.store') }}" accept-charset="utf-8" enctype="multipart/form-data">
                @csrf
                <h1>Create New Warehouse</h1>
                <p>You are about to create a whole new warehouse from scratch.</p>
                    <br>
                    <p><label>Code/Name:</label>
                    <span class="element">
                        <input id="new_inv_level_level_code" name="level_code" type="text" maxlength="25" size="17" title="The code given to this level. Each code has to be unique within its top level." fdprocessedid="svz43y">
                    </span>
                    <span class="mand_sign">*</span>
                </p>
                <p>
                    <label>Notes:</label>
                    <span class="element">
                        <textarea id="new_inv_level_level_desc" name="level_desc" cols="40" rows="6" title="Description of this inventory structure if any" maxlength="254"></textarea>
                    </span>
                    <span class="mand_sign"></span>
                </p>
                <div class="line_break"></div>
                <div class="">
                    <button type="button" id="new_inv_level_save" class="button">Save</button>
                </div>
            </form>
        </span>
    </div>
</div>

<!-- Edit Warehouse Module -->
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-edit-warehouse d-none "
    tabindex="-1" style="width: 600px; top:193px; left: 328px;" role="dialog" aria-describedby="ajax_obj"
    aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">New Warehouse</span>
        <button
            class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close edit-warehouse-close"
            role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content" style="width: auto">
        <span id="edit_inv_level" class="xmlb_form">
            <form method="post" id="frm_edit_inv_level" action="" accept-charset="utf-8" enctype="multipart/form-data">
                @method('put')
                @csrf
                <br>
                <br>
                <p>
                    <label>Code/Name:</label>
                    <span class="element">
                        <input id="edit_inv_level_level_code" name="level_code" type="text" maxlength="25" size="17" value="" title="The code given to this level. Each code has to be unique within its top level." fdprocessedid="vct1c">
                    </span>
                    <span class="mand_sign">*</span>
                </p>
                <p>
                    <label>Notes:</label>
                    <span class="element">
                        <textarea id="edit_inv_level_level_desc" name="level_desc" cols="40" rows="6" title="Description of this inventory structure if any" maxlength="254"></textarea>
                    </span>
                    <span class="mand_sign"></span>
                </p>
                    <div class="line_break"></div>
                    <div class="">
                        <button type="button" id="edit_inv_level_save" class="button">Save</button>
                    </div>
            </form>
        </span>
    </div>
</div>

<!-- New Warehouse Level Module -->
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-add-new-warehouse-level d-none "
    tabindex="-1" style="width: 600px; top:193px; left: 328px;" role="dialog" aria-describedby="ajax_obj"
    aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">New Warehouse</span>
        <button
            class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close add-warehouse-level-close"
            role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content" style="width: auto">
        <span id="new_inv_level" class="xmlb_form">
            <form method="post" id="frm_new_inv_level" action="" accept-charset="utf-8" enctype="multipart/form-data">
                <input type="hidden" name="PAGE_PARAMS" value="parent_level_id=11">
                <h2>Add Level to Existing Warehouse</h2>
                <p>You are about to add a new level under <strong class="un_level_code"></strong></p>
                <br>
                <p>
                    <label>Code/Name:</label>
                    <span class="element">
                        <input id="new_inv_level_level_code" name="new_inv_level_level_code" type="text" maxlength="25" size="17" title="The code given to this level. Each code has to be unique within its top level." fdprocessedid="tsozf6">
                    </span>
                    <span class="mand_sign">*</span>
                </p>
                <p>
                    <label>Notes:</label>
                    <span class="element">
                        <textarea id="new_inv_level_level_desc" name="new_inv_level_level_desc" cols="40" rows="6" title="Description of this inventory structure if any" maxlength="254"></textarea>
                    </span>
                    <span class="mand_sign"></span>
                </p>
                <p>
                    <label>Level Pic:</label>
                    <span class="element">
                        <input id="new_inv_level_level_pic" name="new_inv_level_level_pic" type="file" title="Picture or photo of this inventory level within the warehouse. Can be sometimes useful to locate the item" size="40">
                    </span>
                    <span class="mand_sign"></span>
                </p>
                <div class="line_break"></div>
                <div class="form_footer">
                    <input type="submit" value="Save" id="new_inv_level_save" name="new_inv_level_save" class="button" onclick="return preSubmitnew_inv_level() ;" fdprocessedid="bevnge">
                </div>
            </form>
</span>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $('#warehouse_add_new').click(function(){
            $('.ui-widget-overlay').removeClass('d-none');
            $('.ui-draggable-add-new-warehouse').removeClass('d-none');
        });

        $('.add-new-warehouse-close').click(function(){
            $('.ui-widget-overlay').addClass('d-none');
            $('.ui-draggable-add-new-warehouse').addClass('d-none');
        });

        $('.btn_new_warehouse_level').click(function(){
            var level_code = $(this).attr('level_code');
            $('#frm_new_inv_level .un_level_code').html(level_code);
            $('.ui-widget-overlay').removeClass('d-none');
            $('.ui-draggable-add-new-warehouse-level').removeClass('d-none');
        });

        $('.add-warehouse-level-close').click(function(){
            $('.ui-widget-overlay').addClass('d-none');
            $('.ui-draggable-add-new-warehouse-level').addClass('d-none');
        });

        $('.inv_level_edit').click(function(){
            var inv_level_id = $(this).attr('inv_level_id');
            var url = "{{ route('admin.warehouse-setup.edit', ':id') }}";
            url = url.replace(':id', inv_level_id);
            $.ajax({
                type: "get",
                url: url,
                success: function (response) {
                    var upurl = "{{ route('admin.warehouse-setup.update', ':id') }}"
                    upurl = upurl.replace(':id', response.invLevel.id);
                    $('#frm_edit_inv_level').attr('action', upurl);
                    $('#frm_edit_inv_level input[name="level_code"]').val(response.invLevel.level_code);
                    $('#frm_edit_inv_level textarea[name="level_desc"]').val(response.invLevel.level_desc);

                    $('.ui-widget-overlay').removeClass('d-none');
                    $('.ui-draggable-edit-warehouse').removeClass('d-none');
                }
            });
        });

        $('.edit-warehouse-close').click(function(){
            $('.ui-widget-overlay').addClass('d-none');
            $('.ui-draggable-edit-warehouse').addClass('d-none');
        });

        $('#new_inv_level_save').click(function(){
           var level_code = $('#frm_new_inv_level input[name="level_code"]').val();
           if(level_code.length > 0){
                $('#frm_new_inv_level').submit();
           }else{
                alert('Please enter level code.');
           }
        });

        $('#edit_inv_level_save').click(function(){
           var level_code = $('#frm_edit_inv_level input[name="level_code"]').val();
           if(level_code.length > 0){
                $('#frm_edit_inv_level').submit();
           }else{
                alert('Please enter level code.');
           }
        });

        $('.inv_level_delete').click(function(){
            if(confirm("Do you really want to delete this record?")){
                var inv_level_id = $(this).attr('inv_level_id');
                var url = "{{ route('admin.warehouse-setup.destroy', ':id') }}";
                url = url.replace(':id', inv_level_id);
                $.ajax({
                    type: "DELETE",
                    url: url,
                    data:{_token: "{{ csrf_token() }}"},
                    success: function (response) {
                        alert(response.success);
                        window.location.reload();
                    }
                });
            }
        });
    });
</script>
@endsection