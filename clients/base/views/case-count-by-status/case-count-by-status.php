<?php
/**
 * Metadata for the Case Count by Status example dashlet view
 *
 * This dashlet is only allowed to appear on the Case module's list view
 * which is also known as the 'records' layout.
 */
$viewdefs['base']['view']['case-count-by-status'] = array(
    'dashlets' => array(
        array(
            //Display label for this dashlet
            'label' => 'Case Count By Status',
            //Description label for this Dashlet
            'description' => 'Shows the number of Cases on the Cases List view by status.',
            'config' => array(
            ),
            'preview' => array(
            ),
            //Filter array decides where this dashlet is allowed to appear
            'filter' => array(
                //Modules where this dashlet can appear
                'module' => array(
                    'Cases',
                ),
                //Views where this dashlet can appear
                'view' => array(
                    'records',
                )
            )
        ),
    ),
);
