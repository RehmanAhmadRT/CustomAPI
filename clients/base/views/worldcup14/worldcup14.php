
<?php
if(!defined('sugarEntry'))define('sugarEntry', true);
$viewdefs['base']['view']['worldcup14'] = array(
    'dashlets' => array(
        array(
            'label' => 'LBL_DASHLET_WORLDCUP14',
            'description' => 'LBL_DASHLET_WC14_DESC',
            'config' => array(
                'todayorteam' => '-1',
                'team' => '14',
            ),
            'preview' => array(
                'todayorteam' => '-1',
                'team' => '14',
            ),
            'filter' => array(
                'module' => array(
                    'Cases',
                ),
                'view' => 'record'
            ),

        ),
    ),
    'config' => array(
        'fields' => array(

            array(
                'name' => 'todayorteam',
                'label' => 'LBL_DASHLET_WC14_TODAYTEAM',
                'type' => 'enum',
                'searchBarThreshold' => -1,
                'options' => 'DASHLET_WC14_list',
            ),
            array(
                'name' => 'team',
                'label' => 'LBL_DASHLET_WC14_FAVTEAM',
                'type' => 'enum',
                'searchBarThreshold' => 14,
                'options' => array(
					'ALG' => 'Algeria',
					'ARG' => 'Argentina',
					'AUS' => 'Australia',
					'BEL' => 'Belgium',
					'BIH' => 'Bosnia and Herzegovina',
					'BRA' => 'Brazil',
					'CMR' => 'Cameroon',
					'CHI' => 'Chile',
					'COL' => 'Colombia',
					'CRC' => 'Costa Rica',
					'CIV' => 'Côte d\'Ivoire (Ivory Coast)',
					'CRO' => 'Croatia',
					'ECU' => 'Ecuador',
					'ENG' => 'England',
					'FRA' => 'France',
					'GER' => 'Germany',
					'GHA' => 'Ghana',
					'GRE' => 'Greece',
					'HON' => 'Honduras',
					'IRN' => 'Iran',
					'ITA' => 'Italy',
					'JPN' => 'Japan',
					'KOR' => 'South Korea',
					'MEX' => 'Mexico',
					'NED' => 'Netherlands',
					'NGA' => 'Nigeria',
					'POR' => 'Portugal',
					'RUS' => 'Russia',
					'ESP' => 'Spain',
					'USA' => 'United States',
					'URU' => 'Uruguay'
				),
            ),
        ),
    ),
);
