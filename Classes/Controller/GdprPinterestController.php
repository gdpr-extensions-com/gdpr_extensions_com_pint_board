<?php

declare(strict_types=1);

namespace GdprExtensionsCom\GdprExtensionsComPintBoard\Controller;


use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * This file is part of the "gdpr-extensions-com-pint-board" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2023
 */

/**
 * gdprpinterestController
 */
class GdprPinterestController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{


    /**
     * gdprManagerRepository
     *
     * @var \GdprExtensionsCom\GdprExtensionsComPintBoard\Domain\Repository\GdprManagerRepository
     */

    protected $gdprManagerRepository = null;

    /**
     * ContentObject
     *
     * @var ContentObject
     */
    protected $contentObject = null;

    /**
     * Action initialize
     */
    protected function initializeAction()
    {
        $this->contentObject = $this->configurationManager->getContentObject();

        // intialize the content object
    }

    /**
     * @param \GdprExtensionsCom\GdprExtensionsComPintBoard\Domain\Repository\GdprManagerRepository $gdprManagerRepository
     */
    public function injectGdprManagerRepository(\GdprExtensionsCom\GdprExtensionsComPintBoard\Domain\Repository\GdprManagerRepository $gdprManagerRepository)
    {
        $this->gdprManagerRepository = $gdprManagerRepository;
    }

    /**
     * action index
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function indexAction(): \Psr\Http\Message\ResponseInterface
    {
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('tx_gdprextensionscomyoutube_domain_model_gdprmanager');
        $gdprSettingPinterest = $queryBuilder
            ->select('*')
            ->from('tx_gdprextensionscomyoutube_domain_model_gdprmanager')->where(
                $queryBuilder->expr()->like('extension_title', $queryBuilder->createNamedParameter('%' . (string)'pinterest' . '%'))
            );
        $settings =  $gdprSettingPinterest->execute()->fetchAssociative();

        $pinterestUrl = $this->contentObject->data['gdpr_pinterest_board_url'];
        $boardId = '';

        // Regular expression for Pinterest URL format
        if (preg_match('/pinterest\.com\/@[^\/]+\/board\/(\d+)/', $pinterestUrl, $matches)) {
            $boardId = $matches[1];
        }

        // Construct the Pinterest embed URL
        $embedUrl = $boardId ? "https://www.pinterest.com/embed/v2/$boardId" : '';

        if (!empty($embedUrl)) {
            $this->contentObject->data['gdpr_pinterest_board_url'] = $embedUrl;
        }
        $this->view->assign('PinterestData', $this->contentObject->data);
        $this->view->assign('rootPid', $GLOBALS['TSFE']->site->getRootPageId());
        $this->view->assign('PinterestSettings', $settings);
        return $this->htmlResponse();
    }
}
