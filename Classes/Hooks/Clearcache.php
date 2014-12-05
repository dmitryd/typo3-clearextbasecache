<?php
namespace DmitryDulepov\Clearextbasecache\Hooks;

/**
 * This class contains Extbase cache clearing code.
 *
 * @package DmitryDulepov\Clearextbasecache\Hooks
 *
 * @author Dmitry Dulepov <dmitry.dulepov@gmail.com>
 */
class Clearcache {

	/**
	 * Clears Extbase cache.
	 *
	 * @return void
	 */
	public function clearCache() {
		/** @noinspection PhpUndefinedMethodInspection */
		$result = $GLOBALS['TYPO3_DB']->sql_query('SHOW TABLES LIKE \'cf_extbase_%\'');
		/** @noinspection PhpUndefinedMethodInspection */
		while (FALSE !== ($tableInfo = $GLOBALS['TYPO3_DB']->sql_fetch_row($result))) {
			$tableName = $tableInfo[0];
			/** @noinspection PhpUndefinedMethodInspection */
			$GLOBALS['TYPO3_DB']->sql_query('TRUNCATE TABLE ' . $tableName);
		}
		/** @noinspection PhpUndefinedMethodInspection */
		$GLOBALS['TYPO3_DB']->sql_free_result($result);
	}

	/**
	 * Clears Extbase cache if all caches were cleared.
	 *
	 * @param array $params
	 * @return void
	 */
	public function clearCachePostProc(array $params) {
		if ($params['cacheCmd'] == 'all') {
			$this->clearCache();
		}
	}

}
