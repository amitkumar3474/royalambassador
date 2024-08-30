@extends('admin.layouts.master')
@section('title', 'Wine List per Supplier')
@section('content')
<div class="title_bar card">
    <h1>Wine List per Supplier</h1>
    <a href="#"><span class="pdf_export small_button button font-bold radius-0">PDF Export <svg  class="svg-inline--fa fa-file-pdf" aria-hidden="true" focusable="false" data-prefix="far" data-icon="file-pdf" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
        <path fill="currentColor" d="M64 464H96v48H64c-35.3 0-64-28.7-64-64V64C0 28.7 28.7 0 64 0H229.5c17 0 33.3 6.7 45.3 18.7l90.5 90.5c12 12 18.7 28.3 18.7 45.3V288H336V160H256c-17.7 0-32-14.3-32-32V48H64c-8.8 0-16 7.2-16 16V448c0 8.8 7.2 16 16 16zM176 352h32c30.9 0 56 25.1 56 56s-25.1 56-56 56H192v32c0 8.8-7.2 16-16 16s-16-7.2-16-16V448 368c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24H192v48h16zm96-80h32c26.5 0 48 21.5 48 48v64c0 26.5-21.5 48-48 48H304c-8.8 0-16-7.2-16-16V368c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H320v96h16zm80-112c0-8.8 7.2-16 16-16h48c8.8 0 16 7.2 16 16s-7.2 16-16 16H448v32h32c8.8 0 16 7.2 16 16s-7.2 16-16 16H448v48c0 8.8-7.2 16-16 16s-16-7.2-16-16V432 368z"></path>
        </svg><!-- <i class="far fa-file-pdf"></i> Font Awesome fontawesome.com --></span>
    </a>
    <a href="#"><span class="excel_export small_button button font-bold radius-0">Excel Export <svg  class="svg-inline--fa fa-file-excel" aria-hidden="true" focusable="false" data-prefix="far" data-icon="file-excel" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg="">
        <path fill="currentColor" d="M48 448V64c0-8.8 7.2-16 16-16H224v80c0 17.7 14.3 32 32 32h80V448c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16zM64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V154.5c0-17-6.7-33.3-18.7-45.3L274.7 18.7C262.7 6.7 246.5 0 229.5 0H64zm90.9 233.3c-8.1-10.5-23.2-12.3-33.7-4.2s-12.3 23.2-4.2 33.7L161.6 320l-44.5 57.3c-8.1 10.5-6.3 25.5 4.2 33.7s25.5 6.3 33.7-4.2L192 359.1l37.1 47.6c8.1 10.5 23.2 12.3 33.7 4.2s12.3-23.2 4.2-33.7L222.4 320l44.5-57.3c8.1-10.5 6.3-25.5-4.2-33.7s-25.5-6.3-33.7 4.2L192 280.9l-37.1-47.6z"></path>
        </svg><!-- <i class="far fa-file-excel"></i> Font Awesome fontawesome.com --></span>
    </a>
</div>
<div class="line_break"></div>
<form action="" method="get">
    <fieldset class="form_filters">
        <legend>Search by</legend> 
        <span class="show_recs">Records: 1 to 170 of 170 | Show: 
            <select name="show_records" id="show_records">
                <option value="all" selected="">All</option>
                <option value="10">10</option>
                <option value="30">30</option>
                <option value="50">50</option>
                <option value="100">100</option>
                <option value="170" selected="">170</option>
            </select>
        </span>
        <label>Name:</label> 
        <input name="wine_list_product_name" id="wine_list_PRODUCT_NAME" type="text" value="" maxlength="120" size="80" title="Product name" >
        <label>Supplier Name:</label> 
        <input name="wine_list_supplier_name" id="wine_list_SUPPLIER_NAME" type="text" value="" maxlength="60" size="32" title="Company name of this supplier" >
        <label>Bin Number:</label>
        <select name="wine_list_bin_number" id="wine_list_LNK_BIN_NUMBER" >
            <option value="--All--" selected="yes">--All--</option>
            <option value="464">100</option>
            <option value="541">101</option>
            <option value="465">102</option>
            <option value="466">103</option>
            <option value="467">104</option>
            <option value="468">105</option>
            <option value="469">106</option>
            <option value="470">107</option>
            <option value="471">108</option>
            <option value="472">109</option>
            <option value="473">110</option>
            <option value="474">111</option>
            <option value="475">112</option>
            <option value="476">113</option>
            <option value="477">114</option>
            <option value="478">115</option>
            <option value="479">116</option>
            <option value="480">117</option>
            <option value="481">118</option>
            <option value="482">119</option>
            <option value="483">120</option>
            <option value="484">121</option>
            <option value="485">122</option>
            <option value="486">123</option>
            <option value="487">124</option>
            <option value="488">125</option>
            <option value="543">126</option>
            <option value="489">127</option>
            <option value="490">128</option>
            <option value="491">129</option>
            <option value="492">130</option>
            <option value="493">131</option>
            <option value="494">132</option>
            <option value="549">133</option>
            <option value="551">134</option>
            <option value="495">135</option>
            <option value="496">136</option>
            <option value="497">137</option>
            <option value="498">138</option>
            <option value="499">139</option>
            <option value="552">140</option>
            <option value="500">141</option>
            <option value="555">142</option>
            <option value="501">143</option>
            <option value="556">144</option>
            <option value="502">145</option>
            <option value="503">146</option>
            <option value="563">147</option>
            <option value="504">148</option>
            <option value="557">149</option>
            <option value="505">150</option>
            <option value="506">151</option>
            <option value="507">152</option>
            <option value="508">153</option>
            <option value="509">154</option>
            <option value="566">155</option>
            <option value="567">156</option>
            <option value="510">157</option>
            <option value="511">158</option>
            <option value="512">159</option>
            <option value="513">160</option>
            <option value="514">161</option>
            <option value="574">162</option>
            <option value="575">163</option>
            <option value="515">164</option>
            <option value="576">165</option>
            <option value="516">166</option>
            <option value="517">167</option>
            <option value="518">168</option>
            <option value="577">169</option>
            <option value="519">170</option>
            <option value="578">171</option>
            <option value="579">172</option>
            <option value="520">173</option>
            <option value="580">175</option>
            <option value="581">176</option>
            <option value="582">177</option>
            <option value="521">178</option>
            <option value="522">179</option>
            <option value="523">180</option>
            <option value="570">181</option>
            <option value="584">182</option>
            <option value="585">183</option>
            <option value="586">184</option>
            <option value="583">185</option>
            <option value="587">186</option>
            <option value="588">187</option>
            <option value="589">188</option>
            <option value="590">189</option>
            <option value="591">190</option>
            <option value="592">194</option>
            <option value="573">198</option>
            <option value="572">199</option>
            <option value="431">200</option>
            <option value="432">201</option>
            <option value="433">202</option>
            <option value="434">203</option>
            <option value="435">204</option>
            <option value="436">205</option>
            <option value="437">206</option>
            <option value="438">207</option>
            <option value="439">208</option>
            <option value="440">209</option>
            <option value="441">210</option>
            <option value="442">211</option>
            <option value="443">212</option>
            <option value="444">213</option>
            <option value="445">214</option>
            <option value="446">215</option>
            <option value="447">216</option>
            <option value="448">217</option>
            <option value="548">218</option>
            <option value="449">219</option>
            <option value="450">220</option>
            <option value="451">221</option>
            <option value="452">222</option>
            <option value="453">223</option>
            <option value="454">224</option>
            <option value="455">225</option>
            <option value="456">226</option>
            <option value="457">227</option>
            <option value="528">228</option>
            <option value="529">229</option>
            <option value="383">230</option>
            <option value="458">231</option>
            <option value="530">232</option>
            <option value="531">233</option>
            <option value="532">234</option>
            <option value="533">235</option>
            <option value="534">236</option>
            <option value="459">237</option>
            <option value="460">238</option>
            <option value="461">239</option>
            <option value="462">240</option>
            <option value="535">242</option>
            <option value="536">243</option>
            <option value="524">244</option>
            <option value="463">245</option>
            <option value="547">246</option>
            <option value="550">247</option>
            <option value="554">248</option>
            <option value="562">249</option>
            <option value="565">250</option>
            <option value="553">251</option>
            <option value="564">252</option>
            <option value="384">300</option>
            <option value="385">301</option>
            <option value="386">302</option>
            <option value="387">303</option>
            <option value="388">304</option>
            <option value="389">305</option>
            <option value="390">306</option>
            <option value="391">307</option>
            <option value="392">308</option>
            <option value="393">309</option>
            <option value="394">310</option>
            <option value="395">311</option>
            <option value="571">312</option>
            <option value="397">313</option>
            <option value="398">314</option>
            <option value="399">315</option>
            <option value="400">316</option>
            <option value="401">317</option>
            <option value="402">318</option>
            <option value="403">319</option>
            <option value="404">320</option>
            <option value="405">321</option>
            <option value="406">322</option>
            <option value="407">323</option>
            <option value="408">324</option>
            <option value="409">325</option>
            <option value="410">326</option>
            <option value="411">327</option>
            <option value="412">328</option>
            <option value="413">329</option>
            <option value="414">330</option>
            <option value="415">331</option>
            <option value="416">332</option>
            <option value="417">333</option>
            <option value="418">334</option>
            <option value="419">335</option>
            <option value="420">336</option>
            <option value="421">337</option>
            <option value="396">338</option>
            <option value="422">339</option>
            <option value="423">340</option>
            <option value="424">341</option>
            <option value="425">342</option>
            <option value="426">344</option>
            <option value="427">345</option>
            <option value="428">346</option>
            <option value="429">347</option>
            <option value="430">349</option>
            <option value="544">350</option>
            <option value="542">351</option>
            <option value="545">352</option>
            <option value="546">353</option>
            <option value="559">354</option>
            <option value="560">355</option>
            <option value="561">356</option>
            <option value="558">357</option>
            <option value="526">400</option>
            <option value="525">401</option>
            <option value="527">402</option>
        </select>
        <button type="submit" id="wine_list_apply_filter" class="button font-bold radius-0" >Search</button>
        <button type="button"  id="wine_list_clear_filter" class="button font-bold radius-0" >Show All</button>
    </fieldset>
</form>
<div class="line_break"></div>

@endsection
