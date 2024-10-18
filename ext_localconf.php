<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'GdprExtensionsComPinterest',
        'gdprpinterest',
        [
            \GdprExtensionsCom\GdprExtensionsComPinterest\Controller\GdprPinterestController::class => 'index'
        ],
        // non-cacheable actions
        [
            \GdprExtensionsCom\GdprExtensionsComPinterest\Controller\GdprPinterestController::class => '',
            \GdprExtensionsCom\GdprExtensionsComPinterest\Controller\GdprManagerController::class => 'create, update, delete'
        ],
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
    );

    // register plugin for cookie widget
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'GdprExtensionsComPinterest',
        'gdprcookiewidget',
        [
            \GdprExtensionsCom\GdprExtensionsComPinterest\Controller\GdprCookieWidgetController::class => 'index'
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
                        iconIdentifier = gdpr_extensions_com_pinterest-plugin-gdprpinterest
                        title = cookie
                        description = LLL:EXT:gdpr_extensions_com_pinterest/Resources/Private/Language/locallang_db.xlf:tx_gdpr_extensions_com_pinterest_gdprpinterest.description
                        tt_content_defValues {
                            CType = list
                            list_type = gdprextensionscompinterest_gdprcookiewidget
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
               gdpr.header = LLL:EXT:gdpr_extensions_com_pinterest/Resources/Private/Language/locallang_db.xlf:tx_gdpr_extensions_com_pinterest_gdprpinterest.name.tab
        }'
    );

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.gdpr {
                elements {
                    gdprpinterest {
                        iconIdentifier = gdpr_extensions_com_pinterest-plugin-gdprpinterest
                        title = LLL:EXT:gdpr_extensions_com_pinterest/Resources/Private/Language/locallang_db.xlf:tx_gdpr_extensions_com_pinterest_gdprpinterest.name
                        description = LLL:EXT:gdpr_extensions_com_pinterest/Resources/Private/Language/locallang_db.xlf:tx_gdpr_extensions_com_pinterest_gdprpinterest.description
                        tt_content_defValues {
                            CType = gdprextensionscompinterest_gdprpinterest
                        }
                    }
                }
                show = *
            }
       }'
    );
})();
