<?php
$enableExtension = $GLOBALS['TYPO3_CONF_VARS']['BE']['debug'] || !isset($_SERVER['SITE_ENV']) || ($_SERVER['SITE_ENV'] != 'live');

if (TYPO3_MODE == 'BE' && $enableExtension) {
	$GLOBALS['TYPO3_CONF_VARS']['BE']['AJAX']['clearextbasecache'] = 'DmitryDulepov\\Clearextbasecache\\Hooks\\Clearcache->clearCache';
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['additionalBackendItems']['cacheActions']['clearextbasecache'] = 'DmitryDulepov\\Clearextbasecache\\Hooks\\Clearcachemenuitem';
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['clearCachePostProc'][] = 'DmitryDulepov\\Clearextbasecache\\Hooks\\Clearcache->clearCachePostProc';
}

unset($enableExtension);
