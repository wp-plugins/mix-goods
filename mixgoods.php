<?php
/**
 * @package Mix-Goods
 * @version 1.0
 */
/*
Plugin Name: Mix-Goods
Plugin URI: http://www.mixmarket.biz/doc/partners/goods/programs/?from=wordpress
Description: Плагин для быстрой интеграции рекламных кодов Микс-Товары Партнерской сети Миксмаркет. Для блока "Где купить" нужно указать [gdekupit gk_id="номер товарной группы" brand="бренд" model="модель"] а также при необходимости другие параметры: type="vert или hor" - тип показа; pagesize="количество ссылок на одну страницу". Для блока "Контекстный товар" нужно указать [kt kt_id="номер товарной групп"], а можно указать ID нужной категории (cat_id="XXX"). Все настройки нужно производить в <a href=http://www.mixmarket.biz/doc/partners/goods/programs/?from=wordpress>кабинете партнера</a>
Author:  Партнерская сеть Миксмаркет 
Version: 1.0
Author URI: http://www.mixmarket.biz/doc/partners/goods/programs/?from=wordpress
*/

function gdekupit ( $atts ) {
	extract(shortcode_atts( array(
	'gk_id' => '',
	'brand' => '',
	'model' => '',
	'type' => 'vert',
	'pagesize' => '10',
	'cat_id' => ''
	), $atts ));
	$ref = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
	$gk_code = "<script language=\"javascript\" type=\"text/javascript\" src=\"http://".$gk_id.".gk.mixmarket.biz/".$gk_id."/?type=".$type."&pagesize=".$pagesize."&brand=".$brand."&model=".$model."&cat_id=".$cat_id."&div=&r=".$ref."&rnd=".rand(1, 10000)."\" charset=\"windows-1251\"></script>";
	return $gk_code;
}
add_shortcode( 'gdekupit', 'gdekupit' );

function kt ( $atts ) {
	extract(shortcode_atts( array(
	'kt_id' => '',
	'cat_id' => '***'
	), $atts ));
	$ref = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
	$kt_code = "<script language=\"javascript\" type=\"text/javascript\" src=\"http://".$kt_id.".kt.mixmarket.biz/show/".$kt_id."/div=&cat_id=".$cat_id."&div=&r=".$ref."&rnd=".rand(1, 10000)."\" charset=\"windows-1251\"></script>";
	return $kt_code;
}
add_shortcode( 'kt', 'kt' );
?>
