<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'GdprExtensionsComPintBoard',
        'gdprpinterest',
        [
            \GdprExtensionsCom\GdprExtensionsComPintBoard\Controller\GdprPinterestController::class => 'index'
        ],
        // non-cacheable actions
        [
            \GdprExtensionsCom\GdprExtensionsComPintBoard\Controller\GdprPinterestController::class => '',
            \GdprExtensionsCom\GdprExtensionsComPintBoard\Controller\GdprManagerController::class => 'create, update, delete'
        ],
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
    );

    // register plugin for cookie widget
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'GdprExtensionsComPintBoard',
        'gdprcookiewidget',
        [
            \GdprExtensionsCom\GdprExtensionsComPintBoard\Controller\GdprCookieWidgetController::class => 'index'
        ],
        // non-cacheable actions
        [],
    );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    gdprcookiewidget {
                        iconIdentifier = gdpr_extensions_com_pint_board-plugin-gdprpinterest
                        title = cookie
                        description = LLL:EXT:gdpr_extensions_com_pint_board/Resources/Private/Language/locallang_db.xlf:tx_gdpr_extensions_com_pint_board_gdprpinterest.description
                        tt_content_defValues {
                            CType = list
                            list_type = gdprextensionscompintboard_gdprcookiewidget
                        }
                    }
                }
                show = *
            }
       }'
    );
    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod.wizards.newContentElement.wizardItems {
               gdpr.header = LLL:EXT:gdpr_extensions_com_pint_board/Resources/Private/Language/locallang_db.xlf:tx_gdpr_extensions_com_pint_board_gdprpinterest.name.tab
        }'
    );

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.gdpr {
                elements {
                    gdprpinterest {
                        iconIdentifier = gdpr_extensions_com_pint_board-plugin-gdprpinterest
                        title = LLL:EXT:gdpr_extensions_com_pint_board/Resources/Private/Language/locallang_db.xlf:tx_gdpr_extensions_com_pint_board_gdprpinterest.name
                        description = LLL:EXT:gdpr_extensions_com_pint_board/Resources/Private/Language/locallang_db.xlf:tx_gdpr_extensions_com_pint_board_gdprpinterest.description
                        tt_content_defValues {
                            CType = gdprextensionscompintboard_gdprpinterest
                        }
                    }
                }
                show = *
            }
       }'
    );
})();
