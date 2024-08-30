<?php

use App\Models\User;
use App\Models\Customer;
use App\Models\ProductGen;
use App\Models\MarketingCampaign;

if (!function_exists('customerType')) {
    function customerType($id)
    {
        if ($id) {
            $customer_type = '';
            if ($id == 1) {
                return $customer_type = 'Personal';
            } elseif ($id == 2) {
                return $customer_type = 'Corporate';
            } else {
                return $customer_type = 'Event Planner';
            }       
        } else {
            return null;
        }
        
    }
}

if (!function_exists('adCampaign')) {
    function adCampaign($id)
    {
        $adCampaign = MarketingCampaign::select('campaign_name')->whereId($id)->first();
        return $adCampaign->campaign_name;        
    }
}
if (!function_exists('province')) {
    function province($id)
    {
        if ($id) {
            if ($id == 1) {
                return 'Alberta';
            } elseif($id == 2){
                return 'British Columbia';
            } elseif($id == 3){
                return 'Manitoba';
            } elseif($id == 4){
                return 'New Brunswick';
            } elseif($id == 5){
                return 'Newfoundland';
            } elseif($id == 6){
                return 'Northwest Territories';
            } elseif($id == 7){
                return 'Nova Scotia';
            } elseif($id == 8){
                return 'Nunavut';
            } elseif($id == 9){
                return 'Ontario';
            } elseif($id == 10){
                return 'Prince Edward Island';
            } elseif($id == 11){
                return 'Quebec';
            } elseif($id == 12){
                return 'Saskatchewan';
            }
        } else {
            return null;
        }
               
    }
}
if (!function_exists('getUser')) {
    function getUser($id)
    {
        $user = User::select('name')->find($id);
        if ($user) {
            return $user->name;
        } else {
            return null; // or return null; or any other default value
        }       
    }
}

if (!function_exists('get_facility_data')) {
    function get_facility_data($datetime, $facilityId, $floorPlans= []){
        $facilities = [];
        foreach ($floorPlans as $floorPlan) {
            if (date('Y-m-d', strtotime($floorPlan->start_date_time)) == date('Y-m-d', strtotime($datetime)) && $facilityId ==  $floorPlan->lnk_facility) {
                $facilities[] = $floorPlan;
            }
        }
        return $facilities;
    }
}

if (!function_exists('getAllCountryNames')) {
    function getAllCountryNames()
    {
        $countryCodesWithNames = [
            'CA' => 'Canada',
            'US' => 'United States',
            'AF' => 'Afghanistan',
            'AL' => 'Albania',
            'DZ' => 'Algeria',
            'AS' => 'American Samoa',
            'AD' => 'Andorra',
            'AO' => 'Angola',
            'AI' => 'Anguilla',
            'AQ' => 'Antarctica',
            'AG' => 'Antigua & Barbuda',
            'AR' => 'Argentina',
            'AM' => 'Armenia',
            'AW' => 'Aruba',
            'AU' => 'Australia',
            'AT' => 'Austria',
            'AZ' => 'Azerbaijan',
            'BS' => 'Bahama',
            'BH' => 'Bahrain',
            'BD' => 'Bangladesh',
            'BB' => 'Barbados',
            'BY' => 'Belarus',
            'BE' => 'Belgium',
            'BZ' => 'Belize',
            'BJ' => 'Benin',
            'BM' => 'Bermuda',
            'BT' => 'Bhutan',
            'BO' => 'Bolivia',
            'BA' => 'Bosnia and Herzegovina',
            'BW' => 'Botswana',
            'BV' => 'Bouvet Island',
            'BR' => 'Brazil',
            'IO' => 'British Indian Ocean Territory',
            'VG' => 'British Virgin Islands',
            'BN' => 'Brunei',
            'BG' => 'Bulgaria',
            'BF' => 'Burkina Faso',
            'BI' => 'Burundi',
            'CI' => 'Cote D\'ivoire (Ivory Coast)',
            'KH' => 'Cambodia',
            'CM' => 'Cameroon',
            'CV' => 'Cape Verde',
            'KY' => 'Cayman Islands',
            'CF' => 'Central African Republic',
            'TD' => 'Chad',
            'CL' => 'Chile',
            'CN' => 'China',
            'CX' => 'Christmas Island',
            'CC' => 'Cocos (Keeling) Islands',
            'CO' => 'Colombia',
            'KM' => 'Comoros',
            'CK' => 'Cook Islands',
            'CR' => 'Costa Rica',
            'HR' => 'Croatia',
            'CU' => 'Cuba',
            'CY' => 'Cyprus',
            'CZ' => 'Czech Republic',
            'DK' => 'Denmark',
            'DJ' => 'Djibouti',
            'DM' => 'Dominica',
            'DO' => 'Dominican Republic',
            'TP' => 'East Timor',
            'EC' => 'Ecuador',
            'EG' => 'Egypt',
            'SV' => 'El Salvador',
            'DG' => 'Diego Garcia',
            'GQ' => 'Equatorial Guinea',
            'ER' => 'Eritrea',
            'EE' => 'Estonia',
            'ET' => 'Ethiopia',
            'FK' => 'Falkland Islands (Malvinas)',
            'FO' => 'Faroe Islands',
            'FJ' => 'Fiji',
            'FI' => 'Finland',
            'FR' => 'France',
            'GF' => 'French Guiana',
            'PF' => 'French Polynesia',
            'TF' => 'French Southern Territories',
            'GA' => 'Gabon',
            'GM' => 'Gambia',
            'GE' => 'Georgia',
            'DE' => 'Germany',
            'GH' => 'Ghana',
            'GI' => 'Gibraltar',
            'GR' => 'Greece',
            'GL' => 'Greenland',
            'GD' => 'Grenada',
            'GP' => 'Guadeloupe',
            'GU' => 'Guam',
            'GT' => 'Guatemala',
            'GN' => 'Guinea',
            'GW' => 'Guinea-Bissau',
            'GY' => 'Guyana',
            'HT' => 'Haiti',
            'HM' => 'Heard & McDonald Islands',
            'HN' => 'Honduras',
            'HK' => 'Hong Kong',
            'HU' => 'Hungary',
            'IS' => 'Iceland',
            'IN' => 'India',
            'ID' => 'Indonesia',
            'IR' => 'Iran',
            'IQ' => 'Iraq',
            'IE' => 'Ireland',
            'IL' => 'Israel',
            'IT' => 'Italy',
            'JM' => 'Jamaica',
            'JP' => 'Japan',
            'JO' => 'Jordan',
            'KZ' => 'Kazakhstan',
            'KE' => 'Kenya',
            'KI' => 'Kiribati',
            'KP' => 'Korea, North',
            'KR' => 'Korea, South',
            'KW' => 'Kuwait',
            'KG' => 'Kyrgyzstan',
            'LA' => 'Laos',
            'LV' => 'Latvia',
            'LB' => 'Lebanon',
            'LS' => 'Lesotho',
            'LR' => 'Liberia',
            'LY' => 'Libya',
            'LI' => 'Liechtenstein',
            'LT' => 'Lithuania',
            'LU' => 'Luxembourg',
            'MO' => 'Macau',
            'MG' => 'Madagascar',
            'MW' => 'Malawi',
            'MY' => 'Malaysia',
            'MV' => 'Maldives',
            'ML' => 'Mali',
            'MT' => 'Malta',
            'MH' => 'Marshall Islands',
            'MQ' => 'Martinique',
            'MR' => 'Mauritania',
            'MU' => 'Mauritius',
            'YT' => 'Mayotte',
            'MX' => 'Mexico',
            'FM' => 'Micronesia',
            'MD' => 'Moldova',
            'MC' => 'Monaco',
            'MN' => 'Mongolia',
            'MS' => 'Montserrat',
            'MA' => 'Morocco',
            'MZ' => 'Mozambique',
            'MM' => 'Myanmar',
            'NA' => 'Namibia',
            'NR' => 'Nauru',
            'NP' => 'Nepal',
            'NL' => 'Netherlands',
            'AN' => 'Netherlands Antilles',
            'NC' => 'New Caledonia',
            'NZ' => 'New Zealand',
            'NI' => 'Nicaragua',
            'NE' => 'Niger',
            'NG' => 'Nigeria',
            'NU' => 'Niue',
            'NF' => 'Norfolk Island',
            'MP' => 'Northern Mariana Islands',
            'NO' => 'Norway',
            'OM' => 'Oman',
            'PK' => 'Pakistan',
            'PW' => 'Palau',
            'PA' => 'Panama',
            'PG' => 'Papua New Guinea',
            'PY' => 'Paraguay',
            'PE' => 'Peru',
            'PH' => 'Philippines',
            'PN' => 'Pitcairn',
            'PL' => 'Poland',
            'PT' => 'Portugal',
            'PR' => 'Puerto Rico',
            'QA' => 'Qatar',
            'RE' => 'Reunion',
            'RO' => 'Romania',
            'RU' => 'Russian Federation',
            'RW' => 'Rwanda',
            'LC' => 'Saint Lucia',
            'WS' => 'Samoa',
            'SM' => 'San Marino',
            'ST' => 'Sao Tome & Principe',
            'SA' => 'Saudi Arabia',
            'SN' => 'Senegal',
            'SC' => 'Seychelles',
            'SL' => 'Sierra Leone',
            'SG' => 'Singapore',
            'SK' => 'Slovakia',
            'SI' => 'Slovenia',
            'SB' => 'Solomon Islands',
            'SO' => 'Somalia',
            'ZA' => 'South Africa',
            'ES' => 'Spain',
            'LK' => 'Sri Lanka',
            'SH' => 'St. Helena',
            'KN' => 'St. Kitts and Nevis',
            'PM' => 'St. Pierre & Miquelon',
            'VC' => 'St. Vincent & the Grenadines',
            'SR' => 'Suriname',
            'SU' => 'Sudan',
            'SY' => 'Syria',
            'SJ' => 'Svalbard & Jan Mayen Islands',
            'SZ' => 'Swaziland',
            'SE' => 'Sweden',
            'CH' => 'Switzerland',
            'TW' => 'Taiwan',
            'TJ' => 'Tajikistan',
            'TZ' => 'Tanzania',
            'TH' => 'Thailand',
            'TG' => 'Togo',
            'TK' => 'Tokelau',
            'TO' => 'Tonga',
            'TT' => 'Trinidad & Tobago',
            'TN' => 'Tunisia',
            'TR' => 'Turkey',
            'TM' => 'Turkmenistan',
            'TC' => 'Turks & Caicos Islands',
            'TV' => 'Tuvalu',
            'UG' => 'Uganda',
            'UA' => 'Ukraine',
            'AE' => 'United Arab Emirates',
            'UK' => 'United Kingdom',
            'UM' => 'United States Minor Islands',
            'VI' => 'United States Virgin Islands',
            'UY' => 'Uruguay',
            'UZ' => 'Uzbekistan',
            'VU' => 'Vanuatu',
            'VA' => 'Vatican City',
            'VE' => 'Venezuela',
            'VN' => 'Vietnam',
            'WF' => 'Wallis & Futuna Islands',
            'EH' => 'Western Sahara',
            'YE' => 'Yemen',
            'YU' => 'Yugoslavia',
            'ZB' => 'Zimbabwe',
            'ZR' => 'Zaire',
            'ZM' => 'Zambia'
        ];
        return $countryCodesWithNames;          
    }
}

if (!function_exists('productSizes')) {
    function productSizes()
    {
        return [
            '1' => '4 oz.',
            '2' => '6 oz.',
            '3' => '8 oz.',
            '4' => 'Supreme',
            '5' => 'Single Portion',
            '6' => 'Dual Portion',
            '7' => 'Combo',
            '8' => 'Combo Portion',
            '9' => '3 oz.',
        ];
    }
}

if (!function_exists('serveTitleMastersproduct')) {
    function serveTitleMastersproduct($id)
    {
        return ProductGen::where('id', $id)->first();
    }
}

if(!function_exists('catUsageDoc')) {
    function catUsageDoc()
    {
        return [
            'MKT' => 'Marketing',
            'EVT' => 'Event',
            'PRT' => 'Product',
            'PCT' => 'Product Category',
            'CTR' => 'Customer',
            'STF' => 'Staff',
            'TSK' => 'User Task',
            'ITN' => 'Itinerary'
        ];
    }
}

