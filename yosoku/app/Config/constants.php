<?php

// 定数値の定義例
//define("C_SITE_NAME","サイト名（開発中）");
define("C_SITE_NAME","iotYosoku");

//define("S_SITE_CONTEXT","cakephp2");
define("S_SITE_CONTEXT","yosoku");

// 定数配列の定義例
$config['C_BIG_PREFS'] = array("東京","名古屋","大阪");

// 定数連想配列の定義例
$config['C_CATEGORIES'] = array(
		"A"=>"文房具",
		"B"=>"コスメ",
		"C"=>"キッチン",
);

// グローバル関数定義例
function getSum($x, $y){
	return $x + $y;
}
