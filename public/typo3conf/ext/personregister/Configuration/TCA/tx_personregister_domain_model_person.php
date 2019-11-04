<?php

return [
    'ctrl' => [
        'title' => 'Person',
        'label' => 'last_name',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'dividers2tabs' => true,
        'versioningWS' => true,
        'origUid' => 't3_origuid',
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'default_sortby' => 'ORDER BY last_name ASC',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
    ],
    'interface' => [
        'showRecordFieldList' => 'first_name,last_name,phone,room,gender',
    ],
    'types' => [
        '1' => [
            'showitem' => 'first_name,last_name,phone,room,gender'
        ],
    ],
    'columns' => [
        'hidden' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:powermail/Resources/Private/Language/locallang_db.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
            ],
        ],
        'starttime' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:powermail/Resources/Private/Language/locallang_db.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime',
                'size' => 13,
                'checkbox' => 0,
                'default' => 0,
                'range' => [
                    'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
                ],
            ],
        ],
        'endtime' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:powermail/Resources/Private/Language/locallang_db.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime',
                'size' => 13,
                'checkbox' => 0,
                'default' => 0,
                'range' => [
                    'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
                ],
            ],
        ],

        'last_name' => [
            'exclude' => true,
            'label' => 'Nachname',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ],
        ],
        'first_name' => [
            'exclude' => true,
            'label' => 'Vorname',
            'config' => [
                'type' => 'input',
                'size' => 30
            ],
        ],
        'phone' => [
            'exclude' => true,
            'label' => 'Telefon',
            'config' => [
                'type' => 'input',
                'size' => 30
            ],
        ],
        'room' => [
            'exclude' => true,
            'label' => 'Raum',
            'config' => [
                'type' => 'input',
                'size' => 30
            ],
        ],
        'gender' => [
            'exclude' => true,
            'label' => 'Geschlecht weiblich?',
            'config' => [
                'type' => 'check',
            ],
        ],
    ]
];
