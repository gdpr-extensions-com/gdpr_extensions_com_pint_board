<?php
defined('TYPO3') || die();

$frontendLanguageFilePrefix = 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:';
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'GdprExtensionsComPintBoard',
    'gdprpinterest',
    'PinterestBoard'
);

$fields = [
    'gdpr_pinterest_board_url' => [
        'exclude' => true,
        'label' => 'LLL:EXT:gdpr_extensions_com_pint_board/Resources/Private/Language/locallang_db.xlf:tx_gdpr_extensions_com_pint_board_gdprpinterest.gdpr_vid_url',
        'description' => 'LLL:EXT:gdpr_extensions_com_pint_board/Resources/Private/Language/locallang_db.xlf:tx_gdpr_extensions_com_tiktik_gdprpinterest.gdpr_vid_url.description',
        'config' => [
            'type' => 'input',
            'renderType' => 'inputLink',
            'eval' => 'required'
        ]
    ],
    'scale_board_height' => [
        'exclude' => true,
        'label' => 'LLL:EXT:gdpr_extensions_com_pint_board/Resources/Private/Language/locallang_db.xlf:tx_gdpr_extensions_com_pint_board_gdprpinterest.scale_board_height',
        'description' => 'LLL:EXT:gdpr_extensions_com_pint_board/Resources/Private/Language/locallang_db.xlf:tx_gdpr_extensions_com_tiktik_gdprpinterest.scale_board_height.description',
        'config' => [
            'type' => 'input',
            'renderType' => 'input'
        ]
    ],
    'scale_board_width' => [
        'exclude' => true,
        'label' => 'LLL:EXT:gdpr_extensions_com_pint_board/Resources/Private/Language/locallang_db.xlf:tx_gdpr_extensions_com_pint_board_gdprpinterest.scale_board_width',
        'description' => 'LLL:EXT:gdpr_extensions_com_pint_board/Resources/Private/Language/locallang_db.xlf:tx_gdpr_extensions_com_tiktik_gdprpinterest.scale_board_width.description',
        'config' => [
            'type' => 'input',
            'renderType' => 'input'
        ]
    ],
    'pin_board_width' => [
        'exclude' => true,
        'label' => 'LLL:EXT:gdpr_extensions_com_pint_board/Resources/Private/Language/locallang_db.xlf:tx_gdpr_extensions_com_pint_board_gdprpinterest.board_width',
        'description' => 'LLL:EXT:gdpr_extensions_com_pint_board/Resources/Private/Language/locallang_db.xlf:tx_gdpr_extensions_com_tiktik_gdprpinterest.board_width.description',
        'config' => [
            'type' => 'input',
            'renderType' => 'input'
        ]
    ],
];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', $fields);

$GLOBALS['TCA']['tt_content']['types']['gdprextensionscompintboard_gdprpinterest'] = [
    'showitem' => '
                --palette--;' . $frontendLanguageFilePrefix . 'palette.general;general,
                gdpr_pinterest_board_url,scale_board_width,scale_board_height,pin_board_width,
                --div--;' . $frontendLanguageFilePrefix . 'tabs.appearance,
                --palette--;' . $frontendLanguageFilePrefix . 'palette.frames;frames,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
                --palette--;;language,
                --div--;' . $frontendLanguageFilePrefix . 'tabs.access,
                hidden;' . $frontendLanguageFilePrefix . 'field.default.hidden,
                --palette--;' . $frontendLanguageFilePrefix . 'palette.access;access,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,
        ',
];
