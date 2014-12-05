<?php
namespace DmitryDulepov\Clearextbasecache\Hooks;

/**
 * This class contains a cache clearing menu item hook.
 *
 * @package DmitryDulepov\clearextbasecache\Hooks
 *
 * @author Dmitry Dulepov <dmitry.dulepov@gmail.com>
 */
class Clearcachemenuitem implements \TYPO3\CMS\Backend\Toolbar\ClearCacheActionsHookInterface {

	/**
	 * Adds a new menu item to the cache clearing menu.
	 *
	 * @param array $cacheActions
	 * @param array $optionValues
	 */
	public function manipulateCacheActions(&$cacheActions, &$optionValues) {
		/** @noinspection PhpUndefinedMethodInspection */
		$title = $GLOBALS['LANG']->sL('LLL:EXT:clearextbasecache/Resources/Private/Language/locallang.xlf:clear_extbase_cache');
		/** @noinspection PhpUndefinedMethodInspection */
		$iconTitle = $GLOBALS['LANG']->sL('LLL:EXT:clearextbasecache/Resources/Private/Language/locallang.xlf:clear_extbase_cache_title', TRUE);
		$cacheActions[] = array(
			'id' => 'clearextbasecache',
			'title' => $title,
			'href' => 'ajax.php?ajaxID=clearextbasecache',
			'icon' => '<img src="' . \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::siteRelPath('clearextbasecache') . 'ext_icon.gif" title="' . $iconTitle . '" alt="' . $iconTitle . '" />',
		);
	}
}
