<?php
 
 //Адрес базы данных
 define('AD_DBSERVER','localhost');

 //Логин БД
// define('AD_DBUSER','u0166698_default');
 define('AD_DBUSER','root');

 //Пароль БД
// define('AD_DBPASSWORD','hhi_GC45');
 define('AD_DBPASSWORD','');

 //БД
// define('AD_DATABASE','u0166698_auht');
 define('AD_DATABASE','batl');

 //Префикс БД
// define('AD_DBPREFIX','ad_');

 //Errors
 define('AD_ERROR_CONNECT','Не могу соеденится с БД');

 //Errors
 define('AD_NO_DB_SELECT','Данная БД отсутствует на сервере');

 //Адрес хоста сайта
 define('AD_HOST','http://'. $_SERVER['HTTP_HOST'] .'/');
 
 //Адрес почты от кого отправляем
 define('AD_MAIL_AUTOR','no-replay@ilikeit.one');
 
 //Адрес почты для заказов
 define('AD_MAIL_ZAKAZ','zakaz@ilikeit.one');
 
//Адрес технической подержки
define('AD_MAIL_SUPPORT','support@ilikeit.one');

?>