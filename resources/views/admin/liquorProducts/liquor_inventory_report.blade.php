@extends('admin.layouts.master')
@section('title', 'Liquor Inventory Report')
@section('content')
<div class="title_bar card">
    <h1>Liquor Inventory Report</h1>
</div>

<span id="inv_items_wine" class="xmlb_form">
    <form method="post" id="frm_inv_items_wine" action="" accept-charset="utf-8" enctype="multipart/form-data">

        <input type="hidden" name="PAGE_ID" value="liquor_inventory_report">
        <input type="hidden" name="inv_items_wine" value="inv_items_wine">
        <input type="hidden" id="inv_items_wine_submit" name="inv_items_wine_submit">
        <div class="card">
            <div class="invlevel_header_wine card">
                <div>Consulate Wine</div>
            </div>
            <div class="invlevel_wrap_wine">
                <span></span>
                <table class="bound">
                    <thead>
                        <tr>
                            <th><a href="#"
                                    onclick="handleListSorting('inv_items_wine','{cs:GN_PROD_ID}','{ns:PRODUCT_NAME ASC}') ; return false ;"
                                    title="Click to sort by Wine">Wine</a> </th>
                            <th><a href="#"
                                    onclick="handleListSorting('inv_items_wine','{cs:GN_PROD_ID}','{ns:LNK_BIN_NUMBER ASC}') ; return false ;"
                                    title="Click to sort by Bin Number">Bin Number</a> </th>
                            <th><a href="#"
                                    onclick="handleListSorting('inv_items_wine','{cs:GN_PROD_ID}','{ns:VINTAGE ASC}') ; return false ;"
                                    title="Click to sort by Vintage">Vintage</a> </th>
                            <th>Case</th>
                            <th>1st. Floor Wine Room</th>
                            <th>2nd. Floor Wine Room</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1275">Peter
                                        Franus Napa Valley Cabernet Sauvignon</a></span></td>
                            <td>338</td>
                            <td>2014</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">8</td>
                            <td class="ralign">8</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1403">Viva
                                        Spumante Colio</a></span></td>
                            <td>----</td>
                            <td></td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1404">LA
                                        SCALA SPUMANTE</a></span></td>
                            <td>----</td>
                            <td></td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1526">Fleixenetbrut
                                        Champagne</a></span></td>
                            <td>----</td>
                            <td></td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Tank</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1531">Pink
                                        Moet Champagne</a></span></td>
                            <td>----</td>
                            <td></td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Single</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1615">Moët
                                        &amp; Chandon Grand Vintage Extra Brut Rosé Champagne 2009</a></span></td>
                            <td>----</td>
                            <td></td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Single</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1636">Fuller's
                                        London Pride</a></span></td>
                            <td>----</td>
                            <td></td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Single</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1696">Butterfield
                                        Station Chardonnay BTG</a></span></td>
                            <td>----</td>
                            <td>2019</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">7</td>
                            <td class="ralign">0</td>
                            <td class="ralign">7</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1697">Bogle
                                        Chenin Blanc</a></span></td>
                            <td>203</td>
                            <td>2012</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">10</td>
                            <td class="ralign">0</td>
                            <td class="ralign">10</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1701">Podere
                                        Poggio Scalette Il Carbonaione</a></span></td>
                            <td>----</td>
                            <td>2010</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">5</td>
                            <td class="ralign">5</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1716">Sassicaia</a></span>
                            </td>
                            <td>----</td>
                            <td>2008</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 6</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">2</td>
                            <td class="ralign">2</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1719">Cave
                                        Spring Cabernet Franc</a></span></td>
                            <td>141</td>
                            <td>2007</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">3</td>
                            <td class="ralign">0</td>
                            <td class="ralign">3</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1733">Foppiano
                                        Petit Syrah</a></span></td>
                            <td>135</td>
                            <td>2014</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">3</td>
                            <td class="ralign">0</td>
                            <td class="ralign">3</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1734">Cristom
                                        Pinot Noir</a></span></td>
                            <td>123</td>
                            <td>2017</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">3</td>
                            <td class="ralign">0</td>
                            <td class="ralign">3</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1735">Peter
                                        Franus Napa Valley Merlot</a></span></td>
                            <td>131</td>
                            <td>2007</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">3</td>
                            <td class="ralign">3</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1737">Whitehall
                                        Lane Merlot</a></span></td>
                            <td>133</td>
                            <td>2005</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">6</td>
                            <td class="ralign">6</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1738">Merryvale
                                        Cabernet Sauvignon, Napa Valley</a></span></td>
                            <td>353</td>
                            <td>2004</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">5</td>
                            <td class="ralign">5</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1744">Ben
                                        Marco Plata</a></span></td>
                            <td>170</td>
                            <td>2020</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">12</td>
                            <td class="ralign">0</td>
                            <td class="ralign">12</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1747">Terres
                                        de Berne</a></span></td>
                            <td>----</td>
                            <td>2015</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">5</td>
                            <td class="ralign">0</td>
                            <td class="ralign">5</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1749">Cava
                                        Kripta Brut Nature Gran Reserva</a></span></td>
                            <td>----</td>
                            <td>2004</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 6</span></td>
                            <td class="ralign">5</td>
                            <td class="ralign">0</td>
                            <td class="ralign">5</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1752">Tawse
                                        Winery Meritage</a></span></td>
                            <td>----</td>
                            <td>2007</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">5</td>
                            <td class="ralign">5</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1753">Lungarotti
                                        Rubesco DOCG</a></span></td>
                            <td>----</td>
                            <td>2013</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1755">Poggio
                                        Stenti Pian di Staffa</a></span></td>
                            <td>347</td>
                            <td>2010</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">2</td>
                            <td class="ralign">2</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1756">Floral
                                        de Vinya</a></span></td>
                            <td>----</td>
                            <td>2014</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1765">Degani
                                        Amarone Della Valpolicella La Rosta</a></span></td>
                            <td>----</td>
                            <td>2012</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">5</td>
                            <td class="ralign">5</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1766">Cesari
                                        Amarone della Valpolicella Bosca Riserva</a></span></td>
                            <td>----</td>
                            <td>2006</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1768">Quintarelli
                                        Alzero</a></span></td>
                            <td>----</td>
                            <td>2005</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 6</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">2</td>
                            <td class="ralign">2</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1771">Louis
                                        Latour Château Corton Grancey Grand Cru</a></span></td>
                            <td>----</td>
                            <td>2009</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">2</td>
                            <td class="ralign">2</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1772">Chateau
                                        Cap de Mourlin Saint Emilion Grand Cru</a></span></td>
                            <td>----</td>
                            <td>1988</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">2</td>
                            <td class="ralign">2</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1774">Chateau
                                        Ducru Beaucaillou St Julien 2er Cru</a></span></td>
                            <td>----</td>
                            <td>2005</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 6</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">2</td>
                            <td class="ralign">2</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1775">Penfolds
                                        Grange</a></span></td>
                            <td>----</td>
                            <td>2003</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 6</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">2</td>
                            <td class="ralign">2</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1777">Shiraz
                                        Reserve "Geoff Merrill McLaren Vale"</a></span></td>
                            <td>138</td>
                            <td>2004</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">2</td>
                            <td class="ralign">2</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1780">Hilltop
                                        Cabernet Sauvignon</a></span></td>
                            <td>----</td>
                            <td>2012</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">3</td>
                            <td class="ralign">3</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1781">Duckhorn
                                        Vineyards Merlot</a></span></td>
                            <td>132</td>
                            <td>2006</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">7</td>
                            <td class="ralign">7</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1783">Signorello
                                        Estate Cabernet Sauvignon</a></span></td>
                            <td>110</td>
                            <td>2012</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 6</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">1</td>
                            <td class="ralign">1</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1784">Signorello
                                        Padrone</a></span></td>
                            <td>320</td>
                            <td>2010</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 6</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">3</td>
                            <td class="ralign">3</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1785">Bond
                                        Cabernet Sauvignon</a></span></td>
                            <td>----</td>
                            <td>2011</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 6</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">2</td>
                            <td class="ralign">2</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1794">Castello
                                        di Querceto Chianti</a></span></td>
                            <td>151</td>
                            <td>2018</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1795">Dolcetto
                                        D'Alba</a></span></td>
                            <td>179</td>
                            <td>2017</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1796">Fondo
                                        Antico Syrah</a></span></td>
                            <td>188</td>
                            <td>2016</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">6</td>
                            <td class="ralign">0</td>
                            <td class="ralign">6</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1800">Degani
                                        Ciciio Valpolicella Classico Ripasso</a></span></td>
                            <td>----</td>
                            <td>2020</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">6</td>
                            <td class="ralign">0</td>
                            <td class="ralign">6</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1802">Cesari
                                        Ripasso Bosan</a></span></td>
                            <td>176</td>
                            <td>2018</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">12</td>
                            <td class="ralign">0</td>
                            <td class="ralign">12</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1804">Farnese
                                        Fantini Edizione Cinque Autoctoni</a></span></td>
                            <td>190</td>
                            <td>2012</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">4</td>
                            <td class="ralign">0</td>
                            <td class="ralign">4</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1805">Finca
                                        Losada</a></span></td>
                            <td>149</td>
                            <td>2009</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1808">Chateau
                                        Teyssier Pezat Bordeaux Superior</a></span></td>
                            <td>----</td>
                            <td>2012</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1811">Lailey
                                        Cabernet Franc</a></span></td>
                            <td>140</td>
                            <td>2010</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">4</td>
                            <td class="ralign">0</td>
                            <td class="ralign">4</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1812">Vieilles
                                        Vignes Rouge Costières de Nîmes</a></span></td>
                            <td>----</td>
                            <td>2018</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">7</td>
                            <td class="ralign">0</td>
                            <td class="ralign">7</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1814">Rosehall
                                        Run Pinot Noir</a></span></td>
                            <td>----</td>
                            <td>2011</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">2</td>
                            <td class="ralign">2</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1815">Cordero
                                        Di Montezomolo Langhe Nebbiolo</a></span></td>
                            <td>184</td>
                            <td>2017</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">4</td>
                            <td class="ralign">0</td>
                            <td class="ralign">4</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1816">Cordero
                                        Di Montezomolo Langhe Nebbiolo</a></span></td>
                            <td>184</td>
                            <td>2015</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1818">Brigaldara
                                        Amarone della Valpolicella Classico</a></span></td>
                            <td>180</td>
                            <td>2017</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">4</td>
                            <td class="ralign">0</td>
                            <td class="ralign">4</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1819">Edge
                                        Cabernet Sauvignon</a></span></td>
                            <td>107</td>
                            <td>2018</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">14</td>
                            <td class="ralign">0</td>
                            <td class="ralign">14</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1820">Oscar
                                        Tobia Rioja Reserva</a></span></td>
                            <td>----</td>
                            <td>2010</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">1</td>
                            <td class="ralign">0</td>
                            <td class="ralign">1</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1822">Rocca
                                        Delle Macie Giulio Straccali Pinot Grigio</a></span></td>
                            <td>----</td>
                            <td>2020</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1825">Pellé
                                        Sancerre 'La Croix au Garde'</a></span></td>
                            <td>----</td>
                            <td>2018</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">5</td>
                            <td class="ralign">0</td>
                            <td class="ralign">5</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1830">Château
                                        De Maligney Chablis Primier Cru Vau de Vey</a></span></td>
                            <td>----</td>
                            <td>2015</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1834">Regnard
                                        Petit Chablis</a></span></td>
                            <td>----</td>
                            <td>2013</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">4</td>
                            <td class="ralign">0</td>
                            <td class="ralign">4</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1836">Augusti
                                        Torello Mata Cava Brut Reserva</a></span></td>
                            <td>----</td>
                            <td>2012</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">4</td>
                            <td class="ralign">0</td>
                            <td class="ralign">4</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1842">Mastroberardino
                                        Greco di Tufo</a></span></td>
                            <td>----</td>
                            <td>2014</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">3</td>
                            <td class="ralign">0</td>
                            <td class="ralign">3</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1845">Windrush</a></span>
                            </td>
                            <td>----</td>
                            <td>2018</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1846">Jean-Luc
                                        Colombo Cornas "les Ruchets" 2007</a></span></td>
                            <td>----</td>
                            <td>2007</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 6</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1848">Rosso
                                        di Toscana</a></span></td>
                            <td>160</td>
                            <td>2014</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">3</td>
                            <td class="ralign">0</td>
                            <td class="ralign">3</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1849">J.
                                        Lohr Seven Oaks Cabernet Sauvignon</a></span></td>
                            <td>108</td>
                            <td>2017</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Single</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1850">Penfolds
                                        Grange</a></span></td>
                            <td>----</td>
                            <td>2006</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 6</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">1</td>
                            <td class="ralign">1</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1851">Tawse
                                        Winery Meritage</a></span></td>
                            <td>----</td>
                            <td>2009</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">10</td>
                            <td class="ralign">10</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1852">Chateau
                                        Ducru Beaucaillou St Julien 2er Cru</a></span></td>
                            <td>----</td>
                            <td>2011</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 6</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">2</td>
                            <td class="ralign">2</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1854">Sassicaia</a></span>
                            </td>
                            <td>----</td>
                            <td>2009</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 6</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">2</td>
                            <td class="ralign">2</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1855">Crozes-Hermitage</a></span>
                            </td>
                            <td>----</td>
                            <td>2014</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">2</td>
                            <td class="ralign">0</td>
                            <td class="ralign">2</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1856">Farnese
                                        Fantini Edizione Cinque Autoctoni</a></span></td>
                            <td>190</td>
                            <td>2014</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">4</td>
                            <td class="ralign">0</td>
                            <td class="ralign">4</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1858">Vigneti
                                        del Salento ZOLLA Primitivo</a></span></td>
                            <td>199</td>
                            <td>2017</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1859">Farnese
                                        Fantini Edizione Cinque Autoctoni</a></span></td>
                            <td>190</td>
                            <td>2017</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1862">Chateau
                                        Teyssier Pezat Bordeaux Superior</a></span></td>
                            <td>----</td>
                            <td>2016</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">5</td>
                            <td class="ralign">0</td>
                            <td class="ralign">5</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1864">Peter
                                        Franus Napa Valley Cabernet Sauvignon</a></span></td>
                            <td>338</td>
                            <td>2012</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">10</td>
                            <td class="ralign">10</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1865">Ben
                                        Marco Plata</a></span></td>
                            <td>170</td>
                            <td>2016</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">3</td>
                            <td class="ralign">0</td>
                            <td class="ralign">3</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1866">Bond
                                        Cabernet Sauvignon</a></span></td>
                            <td>----</td>
                            <td>2014</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 6</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1867">Cesari
                                        Amarone della Valpolicella Bosca Riserva</a></span></td>
                            <td>----</td>
                            <td>2008</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">2</td>
                            <td class="ralign">2</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1870">Jean-Luc
                                        Colombo Cornas "les Ruchets" 2007</a></span></td>
                            <td>----</td>
                            <td>2017</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 6</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1871">Lungarotti
                                        Rubesco DOCG</a></span></td>
                            <td>----</td>
                            <td>2017</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1873">Signorello
                                        Estate Cabernet Sauvignon</a></span></td>
                            <td>110</td>
                            <td>2015</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 6</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1875">Tin
                                        Barn R8 Vineyards Cabernet Sauvignon</a></span></td>
                            <td>----</td>
                            <td>2016</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">2</td>
                            <td class="ralign">0</td>
                            <td class="ralign">2</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1880">Oscar
                                        Tobia Rioja Reserva</a></span></td>
                            <td>----</td>
                            <td>2015</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">8</td>
                            <td class="ralign">0</td>
                            <td class="ralign">8</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1887">Starmont
                                        Cabernet Sauvignon</a></span></td>
                            <td>313</td>
                            <td>2011</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">17</td>
                            <td class="ralign">17</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1893">Duckhorn
                                        Vineyards Merlot</a></span></td>
                            <td>132</td>
                            <td>2017</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1962">Adesso
                                        Merlot (House)</a></span></td>
                            <td>----</td>
                            <td></td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1963">Fantini
                                        Pinot Grigio (House)</a></span></td>
                            <td>----</td>
                            <td></td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1992">Bottega
                                        Vino Poeti Brut rose (Rose Champagne)</a></span></td>
                            <td>----</td>
                            <td></td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Single</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2002">Louis
                                        Latour Chateau Corton Grancey Grand Cru</a></span></td>
                            <td>----</td>
                            <td>2003</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">1</td>
                            <td class="ralign">1</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2003">Amarone
                                        Bosan</a></span></td>
                            <td>----</td>
                            <td>2006</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 6</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">7</td>
                            <td class="ralign">7</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2004">Jean-Luc
                                        Colombo Cornas, Les Ruchets</a></span></td>
                            <td>----</td>
                            <td>2007</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">2</td>
                            <td class="ralign">2</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2014">Moët
                                        &amp; Chandon Brut Imperial Champagne</a></span></td>
                            <td>----</td>
                            <td></td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Single</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2017">Finca
                                        Losada</a></span></td>
                            <td>149</td>
                            <td>2015</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">7</td>
                            <td class="ralign">0</td>
                            <td class="ralign">7</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2018">Farnese
                                        Fantini Edizione Cinque Autoctoni</a></span></td>
                            <td>190</td>
                            <td>2010</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2019">Logonovo
                                        Montalcino</a></span></td>
                            <td>171</td>
                            <td>2013</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">2</td>
                            <td class="ralign">0</td>
                            <td class="ralign">2</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2020">Logonovo
                                        Montalcino</a></span></td>
                            <td>171</td>
                            <td>2014</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">1</td>
                            <td class="ralign">0</td>
                            <td class="ralign">1</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2021">Rocca
                                        delle Macie Roccato IGT</a></span></td>
                            <td>165</td>
                            <td>2011</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 6</span></td>
                            <td class="ralign">8</td>
                            <td class="ralign">0</td>
                            <td class="ralign">8</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2024">Vigneti
                                        del Salento ZOLLA Primitivo</a></span></td>
                            <td>199</td>
                            <td>2013</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2026">Gold
                                        Series, Vigne Vecchie, Primitivo Di Manduria</a></span></td>
                            <td>198</td>
                            <td>2012</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">6</td>
                            <td class="ralign">0</td>
                            <td class="ralign">6</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2027">Fondo
                                        Antico Nero d'Avola</a></span></td>
                            <td>189</td>
                            <td>2015</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">11</td>
                            <td class="ralign">0</td>
                            <td class="ralign">11</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2028">Poggio
                                        Stenti Maremma Toscana Rosso</a></span></td>
                            <td>164</td>
                            <td>2015</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">5</td>
                            <td class="ralign">0</td>
                            <td class="ralign">5</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2030">Rosehall
                                        Run Pinot Noir</a></span></td>
                            <td>122</td>
                            <td>2016</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">8</td>
                            <td class="ralign">0</td>
                            <td class="ralign">8</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2032">Cordero
                                        Di Montezomolo Langhe Nebbiolo</a></span></td>
                            <td>184</td>
                            <td>2018</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 6</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2033">Meldville
                                        Syrah</a></span></td>
                            <td>137</td>
                            <td>2016</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">5</td>
                            <td class="ralign">0</td>
                            <td class="ralign">5</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2034">Argyle
                                        Pinot Noir</a></span></td>
                            <td>121</td>
                            <td>2014</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">6</td>
                            <td class="ralign">0</td>
                            <td class="ralign">6</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2035">Jean-Luc
                                        Colombo Cornas, Les Ruchets</a></span></td>
                            <td>----</td>
                            <td>2009</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">2</td>
                            <td class="ralign">2</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2038">DEI
                                        Rosso di Montepulciano</a></span></td>
                            <td>183</td>
                            <td>2019</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">6</td>
                            <td class="ralign">0</td>
                            <td class="ralign">6</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2040">Villa
                                        Bolgheri Tenuta</a></span></td>
                            <td>187</td>
                            <td>2018</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 6</span></td>
                            <td class="ralign">5</td>
                            <td class="ralign">0</td>
                            <td class="ralign">5</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2041">Dolcetto
                                        D'Alba</a></span></td>
                            <td>179</td>
                            <td>2018</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">9</td>
                            <td class="ralign">0</td>
                            <td class="ralign">9</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2044">Fattoria
                                        le Pupille Saffredi</a></span></td>
                            <td>350</td>
                            <td>2018</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Single</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">3</td>
                            <td class="ralign">3</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2046">Zardini
                                        Valpolicella Ripasso</a></span></td>
                            <td>177</td>
                            <td>2017</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">5</td>
                            <td class="ralign">0</td>
                            <td class="ralign">5</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2050">Fantini
                                        Montepulciano D'abruzzo</a></span></td>
                            <td>186</td>
                            <td>2015</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Single</span></td>
                            <td class="ralign">6</td>
                            <td class="ralign">0</td>
                            <td class="ralign">6</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2052">Brunello
                                        di Montalcino "La Gerla"</a></span></td>
                            <td>309</td>
                            <td>2015</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Single</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">5</td>
                            <td class="ralign">5</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2057">Brunello
                                        di Montalcino, Riserva "La Lecciaia"</a></span></td>
                            <td>312</td>
                            <td>2013</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">4</td>
                            <td class="ralign">4</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2059">Brunello
                                        Di Montalcino "San Polo"</a></span></td>
                            <td>341</td>
                            <td>2014</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 6</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">5</td>
                            <td class="ralign">5</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2060">Grayson
                                        Estate Merlot</a></span></td>
                            <td>130</td>
                            <td>2020</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">9</td>
                            <td class="ralign">0</td>
                            <td class="ralign">9</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2061">Grayson
                                        Estate Cabernet Sauvignon</a></span></td>
                            <td>102</td>
                            <td>2020</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2062">Brunello
                                        di Montalcino, Riserva "La Lecciaia"</a></span></td>
                            <td>312</td>
                            <td>2015</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">4</td>
                            <td class="ralign">4</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2064">Rubio
                                        Toscana IGT</a></span></td>
                            <td>163</td>
                            <td>2013</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Single</span></td>
                            <td class="ralign">6</td>
                            <td class="ralign">0</td>
                            <td class="ralign">6</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2066">Sassi
                                        Chiusi Toscana</a></span></td>
                            <td>162</td>
                            <td>2016</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Single</span></td>
                            <td class="ralign">8</td>
                            <td class="ralign">0</td>
                            <td class="ralign">8</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2069">Solid
                                        Ground Chardonnay</a></span></td>
                            <td>----</td>
                            <td>2019</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">1</td>
                            <td class="ralign">0</td>
                            <td class="ralign">0.75</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2071">Pinot
                                        Grigio Sot Lis Rivis</a></span></td>
                            <td>----</td>
                            <td>2010</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">5</td>
                            <td class="ralign">0</td>
                            <td class="ralign">5</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2072">Chateau
                                        De Maligny Chablis Carre de Cesar</a></span></td>
                            <td>----</td>
                            <td>2018</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">5</td>
                            <td class="ralign">0</td>
                            <td class="ralign">5</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2073">Cape
                                        Bleue Rose (Jean-Luc Colombo)</a></span></td>
                            <td>----</td>
                            <td>2020</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2074">Floral
                                        de Vinya</a></span></td>
                            <td>----</td>
                            <td>2015</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 6</span></td>
                            <td class="ralign">2</td>
                            <td class="ralign">0</td>
                            <td class="ralign">2</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2075">Agusti
                                        Torello Mata</a></span></td>
                            <td>----</td>
                            <td>2012</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2077">J.
                                        Lohr Seven Oaks Cabernet Sauvignon</a></span></td>
                            <td>108</td>
                            <td>2019</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Single</span></td>
                            <td class="ralign">6</td>
                            <td class="ralign">0</td>
                            <td class="ralign">6</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2078">Calatroni
                                        Pinot 64 Spumante</a></span></td>
                            <td>----</td>
                            <td>2016</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">2</td>
                            <td class="ralign">0</td>
                            <td class="ralign">2</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2079">Bodegas
                                        Itsasmendi Txakoli</a></span></td>
                            <td>----</td>
                            <td>2014</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2084">Vigneti
                                        del Salento ZOLLA Primitivo</a></span></td>
                            <td>199</td>
                            <td>2019</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">11</td>
                            <td class="ralign">0</td>
                            <td class="ralign">11</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2086">Rosso
                                        di Montalcino; San Polo</a></span></td>
                            <td>166</td>
                            <td>2019</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">8</td>
                            <td class="ralign">0</td>
                            <td class="ralign">8</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2088">Bricco
                                        Carlina Barbera d'Asti Superiore Bionzo</a></span></td>
                            <td>185</td>
                            <td>2017</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">8</td>
                            <td class="ralign">0</td>
                            <td class="ralign">8</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2092">Pouilly-Fuisse
                                        Vileilles Vignes</a></span></td>
                            <td>----</td>
                            <td>2015</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">9</td>
                            <td class="ralign">0</td>
                            <td class="ralign">9</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2094">Bersano
                                        Gavi Di Gavi</a></span></td>
                            <td>----</td>
                            <td>2014</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">2</td>
                            <td class="ralign">0</td>
                            <td class="ralign">2</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2096">2027
                                        Cellars Riesling</a></span></td>
                            <td>----</td>
                            <td>2016</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">1</td>
                            <td class="ralign">0</td>
                            <td class="ralign">1</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2098">Santa
                                        Barbara Winey; Chardonnay</a></span></td>
                            <td>----</td>
                            <td>2016</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2100">Cesari
                                        Ripasso Bosan</a></span></td>
                            <td>176</td>
                            <td>2017</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2109">Vini
                                        Fantini Calalenta IGP Rosato</a></span></td>
                            <td>----</td>
                            <td>2020</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 6</span></td>
                            <td class="ralign">4</td>
                            <td class="ralign">0</td>
                            <td class="ralign">4</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2112">Tio
                                        Pepe Extra Dry Fino</a></span></td>
                            <td>----</td>
                            <td></td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Single</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2134">Chateau
                                        De Maligny Chablis Carre de Cesar</a></span></td>
                            <td>----</td>
                            <td>2018</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">9</td>
                            <td class="ralign">0</td>
                            <td class="ralign">9</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2135">Astoria
                                        Prosecco La Robinia</a></span></td>
                            <td>235</td>
                            <td>2020</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Single</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2136">Windrush</a></span>
                            </td>
                            <td>----</td>
                            <td>2018</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2137">Solid
                                        Ground, Cabernet Sauvignon</a></span></td>
                            <td>101</td>
                            <td>2019</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">24</td>
                            <td class="ralign">0</td>
                            <td class="ralign">24</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2139">J.Lohr
                                        Hilltop Cabernet Sauvignon</a></span></td>
                            <td>----</td>
                            <td>2018</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">10</td>
                            <td class="ralign">0</td>
                            <td class="ralign">10</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2140">Taylor
                                        Fladgate 10-Year-Old Tawny Port</a></span></td>
                            <td>----</td>
                            <td></td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Single</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2143">Rosso
                                        di Toscana "Bevilo"</a></span></td>
                            <td>352</td>
                            <td>2015</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">7</td>
                            <td class="ralign">7</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2145">Barolo,
                                        Mauro Sebaste "Tresuri"</a></span></td>
                            <td>305</td>
                            <td>2017</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 6</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">5</td>
                            <td class="ralign">5</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2147">La
                                        Spinetta Pin</a></span></td>
                            <td>310</td>
                            <td>2008</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 6</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">3</td>
                            <td class="ralign">3</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2148">Shiraz
                                        Reserve "Geoff Merrill McLaren Vale"</a></span></td>
                            <td>138</td>
                            <td>2005</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">5</td>
                            <td class="ralign">5</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2151">Finca
                                        La Florencia</a></span></td>
                            <td>331</td>
                            <td>2019</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">2</td>
                            <td class="ralign">0</td>
                            <td class="ralign">2</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2152">Castello
                                        di Querceto Chianti</a></span></td>
                            <td>151</td>
                            <td>2020</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">8</td>
                            <td class="ralign">0</td>
                            <td class="ralign">7.5</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2154">Earthquake</a></span>
                            </td>
                            <td>112</td>
                            <td>2017</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">12</td>
                            <td class="ralign">0</td>
                            <td class="ralign">12</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2156">Shiraz,
                                        McPherson</a></span></td>
                            <td>134</td>
                            <td>2018</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">12</td>
                            <td class="ralign">0</td>
                            <td class="ralign">12</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2158">Villa
                                        Sandi Prosecco Il Fresco DOC</a></span></td>
                            <td>229</td>
                            <td>2020</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">4</td>
                            <td class="ralign">0</td>
                            <td class="ralign">4</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2165">Cordero
                                        Di Montezomolo Langhe Nebbiolo</a></span></td>
                            <td>184</td>
                            <td>2020</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 6</span></td>
                            <td class="ralign">2</td>
                            <td class="ralign">0</td>
                            <td class="ralign">2</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2179">CAN
                                        Valle de la Orotava</a></span></td>
                            <td>351</td>
                            <td>2014</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">6</td>
                            <td class="ralign">6</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2212">Tedeschi
                                        Amarone della Valpolicella</a></span></td>
                            <td>----</td>
                            <td></td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Single</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2214">Castello
                                        Del Poggio Moscato</a></span></td>
                            <td>----</td>
                            <td></td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Single</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2215">Prosecco
                                        DOC Treviso</a></span></td>
                            <td>232</td>
                            <td></td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 24</span></td>
                            <td class="ralign">16</td>
                            <td class="ralign">0</td>
                            <td class="ralign">16</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2218">Solid
                                        Ground Pinot Noir</a></span></td>
                            <td>120</td>
                            <td>2018</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">9</td>
                            <td class="ralign">0</td>
                            <td class="ralign">9</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2220">Solid
                                        Ground Riesling</a></span></td>
                            <td>211</td>
                            <td>2018</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">10</td>
                            <td class="ralign">0</td>
                            <td class="ralign">10</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2240">Cannonball
                                        Cabernet Sauvignon</a></span></td>
                            <td>157</td>
                            <td>2018</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">12</td>
                            <td class="ralign">0</td>
                            <td class="ralign">12</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2242">Angeline
                                        Pinot Noir</a></span></td>
                            <td>156</td>
                            <td>2020</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">14</td>
                            <td class="ralign">0</td>
                            <td class="ralign">14</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2244">Lungarotti
                                        Rubesco Rosso di Torgiano DOC</a></span></td>
                            <td>172</td>
                            <td>2019</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">12</td>
                            <td class="ralign">0</td>
                            <td class="ralign">12</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2245">Casa
                                        Gheller Prosecco</a></span></td>
                            <td>236</td>
                            <td></td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 6</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2246">Brunello
                                        di Montalcino "La Gerla"</a></span></td>
                            <td>309</td>
                            <td>2016</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 6</span></td>
                            <td class="ralign">6</td>
                            <td class="ralign">0</td>
                            <td class="ralign">6</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2248">Viticoltori
                                        Acquesi Brachetto D'Acqui</a></span></td>
                            <td>234</td>
                            <td></td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Single</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2250">Ca
                                        Del Doge Chianti</a></span></td>
                            <td>154</td>
                            <td>2019</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">7</td>
                            <td class="ralign">0</td>
                            <td class="ralign">7</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2255">47
                                        Anno Domini Moscato IGT Veneto</a></span></td>
                            <td>242</td>
                            <td>2022</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">5</td>
                            <td class="ralign">0</td>
                            <td class="ralign">5</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2257">Rizieri
                                        - Barolo DOCG</a></span></td>
                            <td>314</td>
                            <td>2014</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 6</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">2</td>
                            <td class="ralign">2</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2259">Col
                                        di Lamo - Brunello di Montalcino</a></span></td>
                            <td>318</td>
                            <td>2013</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 6</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">10</td>
                            <td class="ralign">10</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2261">Rizieri
                                        - Nebbiolo d'Alba DOC</a></span></td>
                            <td>182</td>
                            <td>2017</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 6</span></td>
                            <td class="ralign">5</td>
                            <td class="ralign">0</td>
                            <td class="ralign">5</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2262">Rizieri
                                        - Nebbiolo d'Alba DOC</a></span></td>
                            <td>182</td>
                            <td>2018</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 6</span></td>
                            <td class="ralign">5</td>
                            <td class="ralign">0</td>
                            <td class="ralign">5</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2264">Nottola
                                        - Rosso di Montepulciano DOC</a></span></td>
                            <td>161</td>
                            <td>2019</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">5</td>
                            <td class="ralign">0</td>
                            <td class="ralign">5</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2266">Concadoro
                                        - Chianti Classico Riserva</a></span></td>
                            <td>153</td>
                            <td>2015</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">15</td>
                            <td class="ralign">0</td>
                            <td class="ralign">15</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2268">Vogadori
                                        - Valpolicella Classico Superiore Ripasso</a></span></td>
                            <td>175</td>
                            <td>2016</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">8</td>
                            <td class="ralign">0</td>
                            <td class="ralign">8</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2303">Vecchia
                                        Cantina Chianti</a></span></td>
                            <td>326</td>
                            <td>2018</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 24</span></td>
                            <td class="ralign">6</td>
                            <td class="ralign">0</td>
                            <td class="ralign">6</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2305">Soave
                                        Doc Classico</a></span></td>
                            <td>220</td>
                            <td>2020</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 24</span></td>
                            <td class="ralign">12</td>
                            <td class="ralign">0</td>
                            <td class="ralign">12</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2307">Amarone
                                        della Valpolicella Classico</a></span></td>
                            <td>323</td>
                            <td>2016</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 24</span></td>
                            <td class="ralign">16</td>
                            <td class="ralign">0</td>
                            <td class="ralign">16</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2309">Octopoda
                                        Cabernet Sauvignon</a></span></td>
                            <td>106</td>
                            <td>2019</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 6</span></td>
                            <td class="ralign">7</td>
                            <td class="ralign">0</td>
                            <td class="ralign">7</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2311">CB
                                        Chianti DOCG</a></span></td>
                            <td>152</td>
                            <td>2020</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">5</td>
                            <td class="ralign">0</td>
                            <td class="ralign">5</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2315">Martini
                                        and Rossi Asti</a></span></td>
                            <td>----</td>
                            <td></td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Single</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2318">La
                                        Vieille Ferme Rose Ventoux AOC</a></span></td>
                            <td>----</td>
                            <td></td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Single</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2323">Barolo
                                        Serralunga</a></span></td>
                            <td>327</td>
                            <td>2015</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 6</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">3</td>
                            <td class="ralign">3</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2331">Produttori
                                        Del Barbaresco Barbaresco DOCG</a></span></td>
                            <td>168</td>
                            <td>2018</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 6</span></td>
                            <td class="ralign">24</td>
                            <td class="ralign">0</td>
                            <td class="ralign">24</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2334">Sassetti
                                        Livio Pertimali Brunello di Montalcino</a></span></td>
                            <td>311</td>
                            <td>2017</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 6</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">7</td>
                            <td class="ralign">7</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2336">Fantini
                                        Chardonnay</a></span></td>
                            <td>----</td>
                            <td></td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2359">Yarran
                                        Shiraz</a></span></td>
                            <td>136</td>
                            <td>2019</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">12</td>
                            <td class="ralign">0</td>
                            <td class="ralign">12</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2361">Astrolabe
                                        Sauvignon Blanc</a></span></td>
                            <td>202</td>
                            <td>2021</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">11</td>
                            <td class="ralign">0</td>
                            <td class="ralign">11</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2363">Cannonball
                                        Chardonnay</a></span></td>
                            <td>206</td>
                            <td>2020</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">12</td>
                            <td class="ralign">0</td>
                            <td class="ralign">12</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2364">Grayson
                                        Estate Cabernet Sauvignon</a></span></td>
                            <td>102</td>
                            <td>2021</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">14</td>
                            <td class="ralign">0</td>
                            <td class="ralign">14</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2378">Altesino
                                        Brunello di Montalcino</a></span></td>
                            <td>143</td>
                            <td>2017</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">12</td>
                            <td class="ralign">0</td>
                            <td class="ralign">12</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2382">Mohua
                                        Sauvignon Blanc</a></span></td>
                            <td>208</td>
                            <td>2021</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">10</td>
                            <td class="ralign">0</td>
                            <td class="ralign">10</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2384">Maggio
                                        Family Vineyards Cabernet Sauvignon</a></span></td>
                            <td>103</td>
                            <td>2019</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">11</td>
                            <td class="ralign">0</td>
                            <td class="ralign">11</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2385">Amarone
                                        Bosan</a></span></td>
                            <td>301</td>
                            <td>2013</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 6</span></td>
                            <td class="ralign">3</td>
                            <td class="ralign">0</td>
                            <td class="ralign">3</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2386">Cape
                                        Bleue Rose (Jean-Luc Colombo)</a></span></td>
                            <td>244</td>
                            <td>2021</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">1</td>
                            <td class="ralign">0</td>
                            <td class="ralign">1</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2391">CA’ROME’
                                        Barbaresco Rio Sordo DOCG</a></span></td>
                            <td>169</td>
                            <td>2018</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 6</span></td>
                            <td class="ralign">6</td>
                            <td class="ralign">0</td>
                            <td class="ralign">6</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2392">Rosso
                                        di Toscana</a></span></td>
                            <td>160</td>
                            <td>2018</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">18</td>
                            <td class="ralign">0</td>
                            <td class="ralign">18</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2394">Precision
                                        Napa Valley Cabernet Sauvignon</a></span></td>
                            <td>105</td>
                            <td>2020</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">12</td>
                            <td class="ralign">0</td>
                            <td class="ralign">12</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2396">Navigator
                                        Cabernet Sauvignon</a></span></td>
                            <td>----</td>
                            <td>2019</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">4</td>
                            <td class="ralign">0</td>
                            <td class="ralign">4</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2429">Dashe
                                        Cellars Zinfandel Vineyard Select</a></span></td>
                            <td>116</td>
                            <td>2021</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">12</td>
                            <td class="ralign">0</td>
                            <td class="ralign">12</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2437">Stags'
                                        Leap Winery Cabernet Sauvignon, V: 2019</a></span></td>
                            <td>113</td>
                            <td>2019</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Single</span></td>
                            <td class="ralign">4</td>
                            <td class="ralign">0</td>
                            <td class="ralign">4</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2441">Avignonesi
                                        Vino Nobile di Montepulciano, V: 2017</a></span></td>
                            <td>111</td>
                            <td>2017</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">12</td>
                            <td class="ralign">0</td>
                            <td class="ralign">12</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2443">Duckhorn
                                        Decoy Cabernet Sauvignon, V: 2020</a></span></td>
                            <td>104</td>
                            <td>2020</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">12</td>
                            <td class="ralign">0</td>
                            <td class="ralign">12</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2445">Volpaia
                                        Chianti Classico Riserva, V: 2019</a></span></td>
                            <td>----</td>
                            <td>2019</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 6</span></td>
                            <td class="ralign">6</td>
                            <td class="ralign">0</td>
                            <td class="ralign">6</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2447">Buehler
                                        Cabernet Sauvignon Napa Valley, V: 2019</a></span></td>
                            <td>115</td>
                            <td>2019</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">12</td>
                            <td class="ralign">0</td>
                            <td class="ralign">12</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2450">Valpolicella
                                        Classico Superiore Ripasso "Cicilio" DOC, V: 2020</a></span></td>
                            <td>----</td>
                            <td>2020</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">12</td>
                            <td class="ralign">0</td>
                            <td class="ralign">12</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2452">Sassarello
                                        Toscana IGT, V: 2016</a></span></td>
                            <td>167</td>
                            <td>2016</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">12</td>
                            <td class="ralign">0</td>
                            <td class="ralign">12</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2454">Bersano
                                        Barolo, Nirvasco, V: 2017</a></span></td>
                            <td>306</td>
                            <td>2017</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 6</span></td>
                            <td class="ralign">6</td>
                            <td class="ralign">0</td>
                            <td class="ralign">6</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2456">Rocca
                                        delle Macie Chianti Classico, V: 2020</a></span></td>
                            <td>355</td>
                            <td>2020</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 24</span></td>
                            <td class="ralign">24</td>
                            <td class="ralign">0</td>
                            <td class="ralign">24</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2458">J.
                                        Lohr Merlot, Los Osos, V: 2020</a></span></td>
                            <td>----</td>
                            <td>2020</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">12</td>
                            <td class="ralign">0</td>
                            <td class="ralign">12</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2459">Rocca
                                        Delle Macie Giulio Straccali Pinot Grigio</a></span></td>
                            <td>200</td>
                            <td>2021</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">16</td>
                            <td class="ralign">0</td>
                            <td class="ralign">16</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2462">J.
                                        Lohr Cabernet Sauvignon, Seven Oaks</a></span></td>
                            <td>----</td>
                            <td>2019</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">12</td>
                            <td class="ralign">0</td>
                            <td class="ralign">12</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2464">Cesari
                                        Ripasso, Bosan, V: 2018</a></span></td>
                            <td>----</td>
                            <td>2018</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2466">Hill
                                        &amp; Blade Lodi Zinfandel, V: 2018</a></span></td>
                            <td>117</td>
                            <td>2018</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">12</td>
                            <td class="ralign">0</td>
                            <td class="ralign">12</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2468">Col
                                        di Lamo - Brunello di Montalcino, V: 2013</a></span></td>
                            <td>308</td>
                            <td>2013</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 6</span></td>
                            <td class="ralign">3</td>
                            <td class="ralign">0</td>
                            <td class="ralign">3</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2477">Brunello
                                        Di Montalcino "San Polo"</a></span></td>
                            <td>304</td>
                            <td>2014</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 6</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">5</td>
                            <td class="ralign">5</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2479">J.
                                        Lohr Hilltop Cabernet Sauvignon, V: 2012</a></span></td>
                            <td>----</td>
                            <td>2012</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">3</td>
                            <td class="ralign">0</td>
                            <td class="ralign">3</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2481">Castelgreve
                                        Riserva Chianti Classico, V: 2018</a></span></td>
                            <td>----</td>
                            <td>2018</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">3</td>
                            <td class="ralign">0</td>
                            <td class="ralign">3</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2483">Castello
                                        di Volpaia Riserva Chianti Classico, V: 2019</a></span></td>
                            <td>----</td>
                            <td>2019</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">2</td>
                            <td class="ralign">0</td>
                            <td class="ralign">2</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2657">test</a></span>
                            </td>
                            <td>210</td>
                            <td></td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2658">test2</a></span>
                            </td>
                            <td>----</td>
                            <td></td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 4</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2667">hello2</a></span>
                            </td>
                            <td>118</td>
                            <td></td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 12</span></td>
                            <td class="ralign">1</td>
                            <td class="ralign">25</td>
                            <td class="ralign">26</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2672">test1212</a></span>
                            </td>
                            <td>----</td>
                            <td></td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 4</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2676">hello</a></span>
                            </td>
                            <td>----</td>
                            <td></td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 6</span></td>
                            <td class="ralign">6</td>
                            <td class="ralign">6</td>
                            <td class="ralign">12</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2677">hello</a></span>
                            </td>
                            <td>----</td>
                            <td>23</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 6</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2678">hello</a></span>
                            </td>
                            <td>----</td>
                            <td></td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 6</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2685">test12</a></span>
                            </td>
                            <td>212</td>
                            <td>2024</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 4</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2687">test133,
                                        V: 2024</a></span></td>
                            <td>----</td>
                            <td>2024</td>
                            <td><br><span class="package_type"
                                    pack_size="$GLOBALS['tmp_cur_rec']%PACKAGE_CAPACITY%">Case of 6</span></td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                            <td class="ralign">0</td>
                        </tr>
                        <tr>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <input type="submit" value="Consulate Wine Export to Excel" id="inv_items_wine_misc" name="inv_items_wine_misc"
            class="button"
            onclick="return presubmitListForm('inv_items_wine','inv_items_wine_submit','Export to excel?',false)">

        <script type="text/javascript">
        $(function() {
            // When user clicks on a category, open or close the items under it
            $(".invlevel_header_wine").click(function() {
                // First close all
                $(".invlevel_wrap_wine").slideUp(300);

                // If already closed, open it, otherwise close it
                invlevel_wrap_wine = $(this).next(".invlevel_wrap_wine");
                if (invlevel_wrap_wine.css("display") == "none")
                    invlevel_wrap_wine.slideDown(300);
                else
                    invlevel_wrap_wine.slideUp(300);
            });
        }); // document.ready
        </script>

        <style type="text/css">
        h1 {
            font-size: 24px;
            font-weight: normal;
        }

        h2 {
            padding-bottom: 15px;
            padding-top: 15px;
        }

        .invlevel_wrap_wine {
            display: none;
        }

        .invlevel_header_wine {
            cursor: pointer;
            margin: .4em 0;
        }

        .invlevel_header_wine>div {
            font-size: 1.8em;
            color: #666666;
            margin: .4em;
        }

        .product_liquor {
            font-size: 1.4em;
        }

        .bound td:first-child {
            width: 40%;
        }

        .bound td:nth-child(2) {
            width: 15%;
        }

        .bound td:last-child {
            width: 10%;
        }

        .total_price {
            font-weight: bold;
        }
        </style>
        <script type="text/javascript">
        function inv_items_wine_applyFilters() {
            var cur_page_path = location.pathname;
            var page_args = location.search;
            page_args = page_args.substr(1);
            if (page_args != "")
                document.location = cur_page_path + '?' + page_args;
            else
                document.location = cur_page_path;
        }
        </script>
    </form>
</span>

<span id="inv_items" class="xmlb_form">
    <form method="post" id="frm_inv_items" action="" accept-charset="utf-8" enctype="multipart/form-data">

        <input type="hidden" name="PAGE_ID" value="liquor_inventory_report">
        <input type="hidden" name="inv_items" value="inv_items">
        <input type="hidden" id="inv_items_submit" name="inv_items_submit">
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="card">
            <div class="invlevel_header card">
                <div>Banquet Hall Liquor Room</div>
            </div>
            <div class="invlevel_wrap" style="display: none;">
                <table class="bound">
                    <thead>
                        <tr>
                            <th><a href="/db_inventory/liquor_inventory_report.php?sort_by=PRODUCT_NAME">Product
                                    Name</a></th>
                            <th><a href="/db_inventory/liquor_inventory_report.php?sort_by=BIN_NUMBER">Bin #</a></th>
                            <th><a href="/db_inventory/liquor_inventory_report.php?sort_by=VINTAGE">Vintage</a></th>
                            <th>Quantity</th>
                            <th>Purchase Price</th>
                            <th>Selling Price</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1977">1800
                                        Reposado Tequila</a></span><br><span class="package_type"
                                    pack_size="1.00">Package: Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>5</td>
                            <td class="ralign">$41.45</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1962">Adesso
                                        Merlot (House)</a></span><br><span class="package_type"
                                    pack_size="12.00">Package: Case of 12</span></td>
                            <td>----</td>
                            <td></td>
                            <td>120<span class="tooltip" title="10 Packs / 0 Singles "> (10 / 0)</span></td>
                            <td class="ralign">$8.45</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1399">Amaro
                                        Averna</a></span><br><span class="package_type" pack_size="1.00">Package:
                                    Single</span></td>
                            <td>----</td>
                            <td>0</td>
                            <td>2</td>
                            <td class="ralign">$28.40</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1595">Amaro
                                        Lucano</a></span><br><span class="package_type" pack_size="1.00">Package:
                                    Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>1</td>
                            <td class="ralign">$26.05</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2186">Amaro
                                        Tosolini</a></span><br><span class="package_type" pack_size="6.00">Package: Case
                                    of 6</span></td>
                            <td>----</td>
                            <td></td>
                            <td>1<span class="tooltip" title="0 Packs / 1 Singles "> (0 / 1)</span></td>
                            <td class="ralign">$51.99</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1572">Aperol</a></span><br><span
                                    class="package_type" pack_size="1.00">Package: Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>2</td>
                            <td class="ralign">$28.65</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2135">Astoria
                                        Prosecco La Robinia</a></span><br><span class="package_type"
                                    pack_size="1.00">Package: Single</span></td>
                            <td>235</td>
                            <td>2020</td>
                            <td>11</td>
                            <td class="ralign">$15.80</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1608">Bacardi
                                        Gold Rum</a></span><br><span class="package_type" pack_size="1.00">Package:
                                    Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>0.5</td>
                            <td class="ralign">$29.50</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1414">Bacardi
                                        Superior White Rum</a></span><br><span class="package_type"
                                    pack_size="1.00">Package: Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>7</td>
                            <td class="ralign">$43.75</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1464">Baileys
                                        Irish Cream</a></span><br><span class="package_type" pack_size="1.00">Package:
                                    Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>4.5</td>
                            <td class="ralign">$42.90</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1517">Ballatines's
                                        Scotch</a></span><br><span class="package_type" pack_size="1.00">Package:
                                    Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>5</td>
                            <td class="ralign">$43.95</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2144">Barolo,
                                        Mauro Sebaste "Tresuri"</a></span><br><span class="package_type"
                                    pack_size="6.00">Package: Case of 6</span></td>
                            <td>305</td>
                            <td></td>
                            <td>6<span class="tooltip" title="1 Packs / 0 Singles "> (1 / 0)</span></td>
                            <td class="ralign">$55.19</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1412">Beefeater
                                        Gin</a></span><br><span class="package_type" pack_size="1.00">Package:
                                    Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>1</td>
                            <td class="ralign">$43.25</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2326">Beer
                                        Gas</a></span><br><span class="package_type" pack_size="1.00">Package:
                                    Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>2</td>
                            <td class="ralign">$0.00</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1426">Belvedere
                                        Pure Vodka</a></span><br><span class="package_type" pack_size="1.00">Package:
                                    Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>10</td>
                            <td class="ralign">$52.30</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1371">Ben
                                        Marco Plata</a></span><br><span class="package_type" pack_size="12.00">Package:
                                    Case of 12</span></td>
                            <td>170</td>
                            <td></td>
                            <td>12<span class="tooltip" title="1 Packs / 0 Singles "> (1 / 0)</span></td>
                            <td class="ralign">$0.00</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1618">Birra
                                        Moretti</a></span><br><span class="package_type" pack_size="24.00">Package: Case
                                    of 24</span></td>
                            <td>----</td>
                            <td></td>
                            <td>48<span class="tooltip" title="2 Packs / 0 Singles "> (2 / 0)</span></td>
                            <td class="ralign">$2.25</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1411">Bombay
                                        Sapphire London Dry Gin</a></span><br><span class="package_type"
                                    pack_size="4.00">Package: Case of 4</span></td>
                            <td>----</td>
                            <td></td>
                            <td>1.75<span class="tooltip" title="0 Packs / 1 Singles "> (0 / 1)</span></td>
                            <td class="ralign">$34.05</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1484">Budweiser</a></span><br><span
                                    class="package_type" pack_size="24.00">Package: Case of 24</span></td>
                            <td>----</td>
                            <td></td>
                            <td>240<span class="tooltip" title="10 Packs / 0 Singles "> (10 / 0)</span></td>
                            <td class="ralign">$1.80</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2390">CA’ROME’
                                        Barbaresco Rio Sordo DOCG</a></span><br><span class="package_type"
                                    pack_size="6.00">Package: Case of 6</span></td>
                            <td>169</td>
                            <td></td>
                            <td>6<span class="tooltip" title="1 Packs / 0 Singles "> (1 / 0)</span></td>
                            <td class="ralign">$90.00</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1664">Cabot
                                        Trail Maple Cream</a></span><br><span class="package_type"
                                    pack_size="1.00">Package: Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>1.5</td>
                            <td class="ralign">$30.95</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1397">Campari
                                        Aperitivo</a></span><br><span class="package_type" pack_size="1.00">Package:
                                    Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>4</td>
                            <td class="ralign">$30.40</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1532">Captain
                                        Morgan Dark Rum</a></span><br><span class="package_type"
                                    pack_size="1.00">Package: Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>3</td>
                            <td class="ralign">$43.25</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1418">Captain
                                        Morgan Original Spiced Rum</a></span><br><span class="package_type"
                                    pack_size="1.00">Package: Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>3</td>
                            <td class="ralign">$44.75</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2270">Cardhu
                                        12 Year Old Single Malt Scotch Whisky</a></span><br><span class="package_type"
                                    pack_size="1.00">Package: Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>2</td>
                            <td class="ralign">$89.95</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1794">Castello
                                        di Querceto Chianti</a></span><br><span class="package_type"
                                    pack_size="12.00">Package: Case of 12</span></td>
                            <td>151</td>
                            <td>2018</td>
                            <td>12<span class="tooltip" title="1 Packs / 0 Singles "> (1 / 0)</span></td>
                            <td class="ralign">$36.00</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1320">Castello
                                        di Querceto Chianti</a></span><br><span class="package_type"
                                    pack_size="12.00">Package: Case of 12</span></td>
                            <td>151</td>
                            <td>2015</td>
                            <td>48<span class="tooltip" title="4 Packs / 0 Singles "> (4 / 0)</span></td>
                            <td class="ralign">$0.00</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1336">Cesari
                                        Ripasso Bosan</a></span><br><span class="package_type"
                                    pack_size="12.00">Package: Case of 12</span></td>
                            <td>176</td>
                            <td>2013</td>
                            <td>24<span class="tooltip" title="2 Packs / 0 Singles "> (2 / 0)</span></td>
                            <td class="ralign">$0.00</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1419">Chivas
                                        Regal 12 Year Old Scotch Whisky</a></span><br><span class="package_type"
                                    pack_size="1.00">Package: Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>5</td>
                            <td class="ralign">$78.95</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1545">Ciroc</a></span><br><span
                                    class="package_type" pack_size="1.00">Package: Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>6</td>
                            <td class="ralign">$50.95</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1976">Ciroc
                                        Pineapple</a></span><br><span class="package_type" pack_size="1.00">Package:
                                    Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>8</td>
                            <td class="ralign">$50.95</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1515">Clamato</a></span><br><span
                                    class="package_type" pack_size="1.00">Package: Tank</span></td>
                            <td>----</td>
                            <td></td>
                            <td>2</td>
                            <td class="ralign">$53.50</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1516">Co2</a></span><br><span
                                    class="package_type" pack_size="1.00">Package: Tank</span></td>
                            <td>----</td>
                            <td></td>
                            <td>4</td>
                            <td class="ralign">$22.00</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1427">Cointreau</a></span><br><span
                                    class="package_type" pack_size="4.00">Package: Case of 4</span></td>
                            <td>----</td>
                            <td></td>
                            <td>30<span class="tooltip" title="7 Packs / 2 Singles "> (7 / 2)</span></td>
                            <td class="ralign">$0.00</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1507">Cola</a></span><br><span
                                    class="package_type" pack_size="1.00">Package: Tank</span></td>
                            <td>----</td>
                            <td></td>
                            <td>3</td>
                            <td class="ralign">$45.50</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1485">Coors
                                        Light</a></span><br><span class="package_type" pack_size="24.00">Package: Case
                                    of 24</span></td>
                            <td>----</td>
                            <td></td>
                            <td>192<span class="tooltip" title="8 Packs / 0 Singles "> (8 / 0)</span></td>
                            <td class="ralign">$1.80</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1486">Corona</a></span><br><span
                                    class="package_type" pack_size="24.00">Package: Case of 24</span></td>
                            <td>----</td>
                            <td></td>
                            <td>120<span class="tooltip" title="5 Packs / 0 Singles "> (5 / 0)</span></td>
                            <td class="ralign">$2.33</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1436">Courvoisier
                                        VS Cognac</a></span><br><span class="package_type" pack_size="1.00">Package:
                                    Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>5</td>
                            <td class="ralign">$65.95</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1512">Cranberry</a></span><br><span
                                    class="package_type" pack_size="1.00">Package: Tank</span></td>
                            <td>----</td>
                            <td></td>
                            <td>3</td>
                            <td class="ralign">$64.00</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1400">Crown
                                        Royal Whisky</a></span><br><span class="package_type" pack_size="1.00">Package:
                                    Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>1.5</td>
                            <td class="ralign">$31.95</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1508">Diet</a></span><br><span
                                    class="package_type" pack_size="1.00">Package: Tank</span></td>
                            <td>----</td>
                            <td></td>
                            <td>1</td>
                            <td class="ralign">$45.50</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1462">Disaronno
                                        Originale Amaretto</a></span><br><span class="package_type"
                                    pack_size="1.00">Package: Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>8.5</td>
                            <td class="ralign">$42.90</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1975">Dr.
                                        McGillicuddy's Intense Butterscotch</a></span><br><span class="package_type"
                                    pack_size="1.00">Package: Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>3</td>
                            <td class="ralign">$19.65</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2142">Drambuie</a></span><br><span
                                    class="package_type" pack_size="1.00">Package: Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>1</td>
                            <td class="ralign">$47.95</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2238">Evangelista
                                        Punch Abruzzo</a></span><br><span class="package_type" pack_size="1.00">Package:
                                    Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>3</td>
                            <td class="ralign">$33.10</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1963">Fantini
                                        Pinot Grigio (House)</a></span><br><span class="package_type"
                                    pack_size="12.00">Package: Case of 12</span></td>
                            <td>----</td>
                            <td></td>
                            <td>108<span class="tooltip" title="9 Packs / 0 Singles "> (9 / 0)</span></td>
                            <td class="ralign">$10.00</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1671">Fernet-Branca
                                        Amer/Bitters</a></span><br><span class="package_type" pack_size="1.00">Package:
                                    Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>1</td>
                            <td class="ralign">$25.10</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1980">Fireball
                                        Cinnamon Whisky</a></span><br><span class="package_type"
                                    pack_size="1.00">Package: Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>3</td>
                            <td class="ralign">$24.95</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1703">Frangelico</a></span><br><span
                                    class="package_type" pack_size="1.00">Package: Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>6</td>
                            <td class="ralign">$29.95</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1510">Gingerale</a></span><br><span
                                    class="package_type" pack_size="1.00">Package: Tank</span></td>
                            <td>----</td>
                            <td></td>
                            <td>3</td>
                            <td class="ralign">$45.50</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1421">Glenfiddich
                                        12 Year Old Single Malt Scotch Whisky</a></span><br><span class="package_type"
                                    pack_size="1.00">Package: Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>8</td>
                            <td class="ralign">$99.95</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2329">Glenrothers
                                        12 Year Old</a></span><br><span class="package_type" pack_size="1.00">Package:
                                    Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>1</td>
                            <td class="ralign">$85.20</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1635">Glenrothes
                                        Select Reserve Single Malt Scotch Whisky</a></span><br><span
                                    class="package_type" pack_size="1.00">Package: Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>1</td>
                            <td class="ralign">$0.00</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2227">Goldschlager</a></span><br><span
                                    class="package_type" pack_size="1.00">Package: Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>2</td>
                            <td class="ralign">$29.95</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1468">Grand
                                        Marnier Cordon Rouge</a></span><br><span class="package_type"
                                    pack_size="1.00">Package: Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>5</td>
                            <td class="ralign">$70.70</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2222">Grappa
                                        Rialto</a></span><br><span class="package_type" pack_size="1.00">Package:
                                    Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>2</td>
                            <td class="ralign">$28.90</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2216">Grappa
                                        Sarpa Di Poli</a></span><br><span class="package_type" pack_size="1.00">Package:
                                    Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>6</td>
                            <td class="ralign">$45.00</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1424">Grey
                                        Goose Vodka</a></span><br><span class="package_type" pack_size="1.00">Package:
                                    Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>1</td>
                            <td class="ralign">$51.95</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2228">Havana
                                        Club Original 3 Year Old</a></span><br><span class="package_type"
                                    pack_size="1.00">Package: Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>3</td>
                            <td class="ralign">$44.25</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1487">Heineken
                                        Rest D</a></span><br><span class="package_type" pack_size="24.00">Package: Case
                                    of 24</span></td>
                            <td>----</td>
                            <td></td>
                            <td>138<span class="tooltip" title="5 Packs / 18 Singles "> (5 / 18)</span></td>
                            <td class="ralign">$2.25</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1598">Hendrick's
                                        Gin</a></span><br><span class="package_type" pack_size="1.00">Package:
                                    Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>2</td>
                            <td class="ralign">$52.95</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1410">Hennessy
                                        VSOP Cognac</a></span><br><span class="package_type" pack_size="1.00">Package:
                                    Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>2</td>
                            <td class="ralign">$109.60</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1513">Ice
                                        Tea</a></span><br><span class="package_type" pack_size="1.00">Package:
                                    Tank</span></td>
                            <td>----</td>
                            <td></td>
                            <td>2</td>
                            <td class="ralign">$53.50</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1469">Jack
                                        Daniels</a></span><br><span class="package_type" pack_size="1.00">Package:
                                    Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>4.5</td>
                            <td class="ralign">$48.95</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1398">Jagermeister</a></span><br><span
                                    class="package_type" pack_size="1.00">Package: Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>3.5</td>
                            <td class="ralign">$30.00</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1654">Jameson
                                        Irish Whisky</a></span><br><span class="package_type" pack_size="1.00">Package:
                                    Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>9.5</td>
                            <td class="ralign">$36.96</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1570">Johnnie
                                        Walker Black Label Scotch Whisky</a></span><br><span class="package_type"
                                    pack_size="1.00">Package: Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>11</td>
                            <td class="ralign">$82.95</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1470">Kahlua</a></span><br><span
                                    class="package_type" pack_size="1.00">Package: Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>3</td>
                            <td class="ralign">$39.95</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2318">La
                                        Vieille Ferme Rose Ventoux AOC</a></span><br><span class="package_type"
                                    pack_size="1.00">Package: Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>3</td>
                            <td class="ralign">$12.75</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2365">Laphroaig
                                        Select Islay Single Malt Scotch Whisky</a></span><br><span class="package_type"
                                    pack_size="1.00">Package: Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>1</td>
                            <td class="ralign">$69.95</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1509">Lemon</a></span><br><span
                                    class="package_type" pack_size="1.00">Package: Tank</span></td>
                            <td>----</td>
                            <td></td>
                            <td>3</td>
                            <td class="ralign">$45.50</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2269">Lillet
                                        Blanc</a></span><br><span class="package_type" pack_size="1.00">Package:
                                    Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>1</td>
                            <td class="ralign">$22.55</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2671">Lime
                                        Juice</a></span><br><span class="package_type" pack_size="1.00">Package:
                                    Tank</span></td>
                            <td>----</td>
                            <td></td>
                            <td>3</td>
                            <td class="ralign">$64.00</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1989">Lost
                                        Craft Revivale</a></span><br><span class="package_type"
                                    pack_size="24.00">Package: Case of 24</span></td>
                            <td>----</td>
                            <td></td>
                            <td>28<span class="tooltip" title="1 Packs / 4 Singles "> (1 / 4)</span></td>
                            <td class="ralign">$3.15</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1990">Lost
                                        Craft Summer Session Pils</a></span><br><span class="package_type"
                                    pack_size="24.00">Package: Case of 24</span></td>
                            <td>----</td>
                            <td></td>
                            <td>36<span class="tooltip" title="1 Packs / 12 Singles "> (1 / 12)</span></td>
                            <td class="ralign">$3.25</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1626">Maker's
                                        Mark Kentucky Bourbon</a></span><br><span class="package_type"
                                    pack_size="1.00">Package: Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>6</td>
                            <td class="ralign">$43.45</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1417">Malibu
                                        Coconut Rum</a></span><br><span class="package_type" pack_size="1.00">Package:
                                    Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>7</td>
                            <td class="ralign">$38.25</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1478">Martini
                                        &amp; Rossi Sweet Vermouth Red</a></span><br><span class="package_type"
                                    pack_size="1.00">Package: Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>3</td>
                            <td class="ralign">$15.75</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2315">Martini
                                        and Rossi Asti</a></span><br><span class="package_type"
                                    pack_size="1.00">Package: Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>6</td>
                            <td class="ralign">$14.50</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1471">Martini
                                        Dry Vermouth White</a></span><br><span class="package_type"
                                    pack_size="1.00">Package: Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>5.5</td>
                            <td class="ralign">$15.75</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1465">Mcguinness
                                        Blue Curacao</a></span><br><span class="package_type" pack_size="1.00">Package:
                                    Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>6</td>
                            <td class="ralign">$19.95</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1684">McGuinness
                                        Cherry Brandy</a></span><br><span class="package_type" pack_size="1.00">Package:
                                    Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>1</td>
                            <td class="ralign">$23.95</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1473">Mcguinness
                                        Creme de Banane</a></span><br><span class="package_type"
                                    pack_size="1.00">Package: Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>4</td>
                            <td class="ralign">$19.95</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1466">Mcguinness
                                        Creme de Cacao White</a></span><br><span class="package_type"
                                    pack_size="1.00">Package: Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>7</td>
                            <td class="ralign">$22.95</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1481">Mcguinness
                                        Creme de Menthe White</a></span><br><span class="package_type"
                                    pack_size="1.00">Package: Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>7</td>
                            <td class="ralign">$24.95</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1482">McGuinness
                                        Melon</a></span><br><span class="package_type" pack_size="1.00">Package:
                                    Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>2</td>
                            <td class="ralign">$19.95</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1472">Mcguinness
                                        Peach Schnapps</a></span><br><span class="package_type"
                                    pack_size="1.00">Package: Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>1</td>
                            <td class="ralign">$19.95</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1479">McGuinness
                                        Triple Sec</a></span><br><span class="package_type" pack_size="1.00">Package:
                                    Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>11</td>
                            <td class="ralign">$21.50</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2014">Moët
                                        &amp; Chandon Brut Imperial Champagne</a></span><br><span class="package_type"
                                    pack_size="1.00">Package: Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>3</td>
                            <td class="ralign">$70.50</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1490">Molson
                                        Canadian</a></span><br><span class="package_type" pack_size="24.00">Package:
                                    Case of 24</span></td>
                            <td>----</td>
                            <td></td>
                            <td>70<span class="tooltip" title="2 Packs / 22 Singles "> (2 / 22)</span></td>
                            <td class="ralign">$1.80</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1492">Moosehead
                                        Rest</a></span><br><span class="package_type" pack_size="24.00">Package: Case of
                                    24</span></td>
                            <td>----</td>
                            <td></td>
                            <td>23<span class="tooltip" title="0 Packs / 23 Singles "> (0 / 23)</span></td>
                            <td class="ralign">$1.90</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1637">Nonino
                                        Quintessentia Amaro</a></span><br><span class="package_type"
                                    pack_size="1.00">Package: Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>6</td>
                            <td class="ralign">$46.60</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1423">Olmeca
                                        Tequila Gold</a></span><br><span class="package_type" pack_size="1.00">Package:
                                    Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>13</td>
                            <td class="ralign">$49.75</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1514">Orange</a></span><br><span
                                    class="package_type" pack_size="1.00">Package: Tank</span></td>
                            <td>----</td>
                            <td></td>
                            <td>1</td>
                            <td class="ralign">$64.00</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1521">Pernod</a></span><br><span
                                    class="package_type" pack_size="1.00">Package: Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>4</td>
                            <td class="ralign">$30.70</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1581">Peroni
                                        Nastro Azzurro</a></span><br><span class="package_type"
                                    pack_size="24.00">Package: Case of 24</span></td>
                            <td>----</td>
                            <td></td>
                            <td>24<span class="tooltip" title="1 Packs / 0 Singles "> (1 / 0)</span></td>
                            <td class="ralign">$0.00</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2670">Pineapple
                                        Juice</a></span><br><span class="package_type" pack_size="1.00">Package:
                                    Tank</span></td>
                            <td>----</td>
                            <td></td>
                            <td>3</td>
                            <td class="ralign">$64.00</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1406">Remy
                                        Martin VSOP Congac</a></span><br><span class="package_type"
                                    pack_size="1.00">Package: Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>7.5</td>
                            <td class="ralign">$105.00</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1704">Rossi
                                        D'Asiago Limoncello</a></span><br><span class="package_type"
                                    pack_size="1.00">Package: Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>7</td>
                            <td class="ralign">$23.75</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1474">Sambuca
                                        Ramazzotti</a></span><br><span class="package_type" pack_size="1.00">Package:
                                    Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>3</td>
                            <td class="ralign">$34.60</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1583">Sleeman
                                        Clear</a></span><br><span class="package_type" pack_size="24.00">Package: Case
                                    of 24</span></td>
                            <td>----</td>
                            <td></td>
                            <td>96<span class="tooltip" title="4 Packs / 0 Singles "> (4 / 0)</span></td>
                            <td class="ralign">$0.00</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2316">Sleeman
                                        Original Draught</a></span><br><span class="package_type"
                                    pack_size="24.00">Package: Case of 24</span></td>
                            <td>----</td>
                            <td></td>
                            <td>72<span class="tooltip" title="3 Packs / 0 Singles "> (3 / 0)</span></td>
                            <td class="ralign">$0.00</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1445">Soho
                                        Lychee Liqueur</a></span><br><span class="package_type"
                                    pack_size="1.00">Package: Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>3</td>
                            <td class="ralign">$30.55</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1657">Solid
                                        Ground, Cabernet Sauvignon</a></span><br><span class="package_type"
                                    pack_size="12.00">Package: Case of 12</span></td>
                            <td>101</td>
                            <td>2018</td>
                            <td>96<span class="tooltip" title="8 Packs / 0 Singles "> (8 / 0)</span></td>
                            <td class="ralign">$0.00</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1475">Sour
                                        Puss Apple Liquor</a></span><br><span class="package_type"
                                    pack_size="1.00">Package: Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>10</td>
                            <td class="ralign">$21.45</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1444">Sour
                                        Puss Raspberry Liquor</a></span><br><span class="package_type"
                                    pack_size="1.00">Package: Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>6</td>
                            <td class="ralign">$21.45</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1476">Southern
                                        Comfort</a></span><br><span class="package_type" pack_size="1.00">Package:
                                    Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>4.5</td>
                            <td class="ralign">$35.95</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1477">Sperone
                                        Dry Marsala *for kitchen</a></span><br><span class="package_type"
                                    pack_size="1.00">Package: Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>1</td>
                            <td class="ralign">$15.00</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1974">St-Germain
                                        Elderflower Liqueur</a></span><br><span class="package_type"
                                    pack_size="1.00">Package: Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>4</td>
                            <td class="ralign">$49.95</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2337">Swish
                                        Gin</a></span><br><span class="package_type" pack_size="1.00">Package:
                                    Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>1</td>
                            <td class="ralign">$37.95</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2140">Taylor
                                        Fladgate 10-Year-Old Tawny Port</a></span><br><span class="package_type"
                                    pack_size="1.00">Package: Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>4</td>
                            <td class="ralign">$35.95</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2212">Tedeschi
                                        Amarone della Valpolicella</a></span><br><span class="package_type"
                                    pack_size="1.00">Package: Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>6</td>
                            <td class="ralign">$47.95</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2432">Tequila
                                        Rose Strawberry Cream Liqueur</a></span><br><span class="package_type"
                                    pack_size="1.00">Package: Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>1</td>
                            <td class="ralign">$31.95</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2431">The
                                        Glenlivet Caribbean Reserve Single Malt Scotch</a></span><br><span
                                    class="package_type" pack_size="1.00">Package: Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>1</td>
                            <td class="ralign">$63.80</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1576">The
                                        Glenlivet Founder's Reserve Scotch Whisky</a></span><br><span
                                    class="package_type" pack_size="1.00">Package: Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>3</td>
                            <td class="ralign">$62.95</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1511">Tonic</a></span><br><span
                                    class="package_type" pack_size="1.00">Package: Tank</span></td>
                            <td>----</td>
                            <td></td>
                            <td>2</td>
                            <td class="ralign">$45.50</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2338">True
                                        Theory Vodka</a></span><br><span class="package_type" pack_size="1.00">Package:
                                    Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>16</td>
                            <td class="ralign">$34.95</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2157">Villa
                                        Sandi Prosecco Il Fresco DOC</a></span><br><span class="package_type"
                                    pack_size="12.00">Package: Case of 12</span></td>
                            <td>229</td>
                            <td></td>
                            <td>5<span class="tooltip" title="0 Packs / 5 Singles "> (0 / 5)</span></td>
                            <td class="ralign">$10.60</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2248">Viticoltori
                                        Acquesi Brachetto D'Acqui</a></span><br><span class="package_type"
                                    pack_size="1.00">Package: Single</span></td>
                            <td>234</td>
                            <td></td>
                            <td>6</td>
                            <td class="ralign">$15.00</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1403">Viva
                                        Spumante Colio</a></span><br><span class="package_type"
                                    pack_size="12.00">Package: Case of 12</span></td>
                            <td>----</td>
                            <td></td>
                            <td>6<span class="tooltip" title="0 Packs / 6 Singles "> (0 / 6)</span></td>
                            <td class="ralign">$0.00</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1401">Wiser's
                                        Special Blend Whisky</a></span><br><span class="package_type"
                                    pack_size="1.00">Package: Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>10.5</td>
                            <td class="ralign">$37.59</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2332">Wray
                                        &amp; Nephew White Overproof Rum</a></span><br><span class="package_type"
                                    pack_size="1.00">Package: Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>2</td>
                            <td class="ralign">$42.35</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="ralign"><span class="total_price">Total Prices:</span></td>
                            <td class="ralign"><span class="total_price">$22,261.66</span></td>
                            <td class="ralign"><span class="total_price">$0.00</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="invlevel_header card">
                <div>Beer Fridge (East)</div>
            </div>
            <div class="invlevel_wrap" style="">
                <table class="bound">
                    <thead>
                        <tr>
                            <th><a href="/db_inventory/liquor_inventory_report.php?sort_by=PRODUCT_NAME">Product
                                    Name</a></th>
                            <th><a href="/db_inventory/liquor_inventory_report.php?sort_by=BIN_NUMBER">Bin #</a></th>
                            <th><a href="/db_inventory/liquor_inventory_report.php?sort_by=VINTAGE">Vintage</a></th>
                            <th>Quantity</th>
                            <th>Purchase Price</th>
                            <th>Selling Price</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2667">hello2</a></span><br><span
                                    class="package_type" pack_size="12.00">Package: Case of 12</span></td>
                            <td>118</td>
                            <td></td>
                            <td>8115<span class="tooltip" title="676 Packs / 3 Singles "> (676 / 3)</span></td>
                            <td class="ralign">$2.00</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="ralign"><span class="total_price">Total Prices:</span></td>
                            <td class="ralign"><span class="total_price">$16,230.00</span></td>
                            <td class="ralign"><span class="total_price">$0.00</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="invlevel_header card">
                <div>Beer Fridge (West)</div>
            </div>
            <div class="invlevel_wrap" style="">
                <table class="bound">
                    <thead>
                        <tr>
                            <th><a href="/db_inventory/liquor_inventory_report.php?sort_by=PRODUCT_NAME">Product
                                    Name</a></th>
                            <th><a href="/db_inventory/liquor_inventory_report.php?sort_by=BIN_NUMBER">Bin #</a></th>
                            <th><a href="/db_inventory/liquor_inventory_report.php?sort_by=VINTAGE">Vintage</a></th>
                            <th>Quantity</th>
                            <th>Purchase Price</th>
                            <th>Selling Price</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2667">hello2</a></span><br><span
                                    class="package_type" pack_size="12.00">Package: Case of 12</span></td>
                            <td>118</td>
                            <td></td>
                            <td>4887<span class="tooltip" title="407 Packs / 3 Singles "> (407 / 3)</span></td>
                            <td class="ralign">$2.00</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="ralign"><span class="total_price">Total Prices:</span></td>
                            <td class="ralign"><span class="total_price">$9,774.00</span></td>
                            <td class="ralign"><span class="total_price">$0.00</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="invlevel_header card">
                <div>Greenhouse Beer Fridge</div>
            </div>
            <div class="invlevel_wrap" style="">
                <table class="bound">
                    <thead>
                        <tr>
                            <th><a href="/db_inventory/liquor_inventory_report.php?sort_by=PRODUCT_NAME">Product
                                    Name</a></th>
                            <th><a href="/db_inventory/liquor_inventory_report.php?sort_by=BIN_NUMBER">Bin #</a></th>
                            <th><a href="/db_inventory/liquor_inventory_report.php?sort_by=VINTAGE">Vintage</a></th>
                            <th>Quantity</th>
                            <th>Purchase Price</th>
                            <th>Selling Price</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2676">hello</a></span><br><span
                                    class="package_type" pack_size="6.00">Package: Case of 6</span></td>
                            <td>----</td>
                            <td></td>
                            <td>8<span class="tooltip" title="1 Packs / 2 Singles "> (1 / 2)</span></td>
                            <td class="ralign">$0.00</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="ralign"><span class="total_price">Total Prices:</span></td>
                            <td class="ralign"><span class="total_price">$0.00</span></td>
                            <td class="ralign"><span class="total_price">$0.00</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="invlevel_header card">
                <div>Consulate Warehouse</div>
            </div>
            <div class="invlevel_wrap" style="">
                <table class="bound">
                    <thead>
                        <tr>
                            <th><a href="/db_inventory/liquor_inventory_report.php?sort_by=PRODUCT_NAME">Product
                                    Name</a></th>
                            <th><a href="/db_inventory/liquor_inventory_report.php?sort_by=BIN_NUMBER">Bin #</a></th>
                            <th><a href="/db_inventory/liquor_inventory_report.php?sort_by=VINTAGE">Vintage</a></th>
                            <th>Quantity</th>
                            <th>Purchase Price</th>
                            <th>Selling Price</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1572">Aperol</a></span><br><span
                                    class="package_type" pack_size="1.00">Package: Single</span></td>
                            <td>----</td>
                            <td></td>
                            <td>1</td>
                            <td class="ralign">$28.65</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2676">hello</a></span><br><span
                                    class="package_type" pack_size="6.00">Package: Case of 6</span></td>
                            <td>----</td>
                            <td></td>
                            <td>6<span class="tooltip" title="1 Packs / 0 Singles "> (1 / 0)</span></td>
                            <td class="ralign">$0.00</td>
                        </tr>
                        <tr>
                            <td colspan="20" class="h_sep"></td>
                        </tr>
                        <tr class="actual_body">
                            <td><span class="product_liquor"><a
                                        href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2667">hello2</a></span><br><span
                                    class="package_type" pack_size="12.00">Package: Case of 12</span></td>
                            <td>118</td>
                            <td></td>
                            <td>23<span class="tooltip" title="1 Packs / 11 Singles "> (1 / 11)</span></td>
                            <td class="ralign">$2.00</td>
                        </tr>
                        <tr class="actual_body">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="ralign"><span class="total_price">Total Prices:</span></td>
                            <td class="ralign"><span class="total_price">$74.65</span></td>
                            <td class="ralign"><span class="total_price">$0.00</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
        <br>
        <input type="submit" value="Export to Excel" id="inv_items_misc" name="inv_items_misc" class="button"
            onclick="return presubmitListForm('inv_items','inv_items_submit','Export to excel?',false)">

        <script type="text/javascript">
        $(function() {
            // When user clicks on a category, open or close the items under it
            $(".invlevel_header").click(function() {
                // First close all
                $(".invlevel_wrap").slideUp(300);

                // If already closed, open it, otherwise close it
                invlevel_wrap = $(this).next(".invlevel_wrap");
                if (invlevel_wrap.css("display") == "none")
                    invlevel_wrap.slideDown(300);
                else
                    invlevel_wrap.slideUp(300);
            });
        }); // document.ready
        </script>

        <style type="text/css">
        h1 {
            font-size: 24px;
            font-weight: normal;
        }

        h2 {
            padding-bottom: 15px;
            padding-top: 15px;
        }

        .invlevel_wrap {
            display: none;
        }

        .invlevel_header {
            cursor: pointer;
            margin: .4em 0;
        }

        .invlevel_header>div {
            font-size: 1.8em;
            color: #666666;
            margin: .4em;
        }

        .product_liquor {
            font-size: 1.4em;
        }

        .bound td:first-child {
            width: 40%;
        }

        .bound td:nth-child(2) {
            width: 15%;
        }

        .bound td:last-child {
            width: 10%;
        }

        .total_price {
            font-weight: bold;
        }
        </style>
        <script type="text/javascript">
        function inv_items_applyFilters() {
            var cur_page_path = location.pathname;
            var page_args = location.search;
            page_args = page_args.substr(1);
            if (page_args != "")
                document.location = cur_page_path + '?' + page_args;
            else
                document.location = cur_page_path;
        }
        </script>
    </form>
</span>
@endsection