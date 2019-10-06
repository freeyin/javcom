<?php
/********
**程序名称：JCSQL（久草数据库）
**开发者：Xiao Bi
**开始时间：2018年12月19日19:30
**版本号：JCSQLV1.0
**联系QQ：1280174096
********/
/*
增
删
改
查


*/


/*

  │─JCSQL_lib //JCSQL类库
  │      │─JCSQL_CLASS_CREATE_DATABASE.php //JCSQL创建数据库类  
  │      │─JCSQL_CLASS_CREATE_TABLE.php //JCSQL创建数据表类    
  │        │─JCSQL_class_insert.php //JCSQL添加类  
  │        │─JCSQL_class_delete.php //JCSQL删除类
  │        │─JCSQL_class_alter.php  //JCSQL修改类
  │        │─JCSQL_class_select.php  //JCSQL查询类
  │─extend  //扩展目录
  │─runtime //缓存目录
  │─static //静态文件目录
  │─template //前台模板目录
  │─thinkphp //tp目录
  │─upload //附件目录
  │─vendor //第三发库目录
  └─index.php //入口文件

*/
/*
JCSQL创建数据库类--
CREATE_DATABASE('demoX');//创建demoX数据库
CREATE_TABLE('demoX','kuku');//创建数据表
*/

include('./JCSQL_lib/JCSQL_CLASS_CREATE_DATABASE.php');



include('./JCSQL_CLASS_CREATE_DATABASE.php');
include('./JCSQL_CLASS_CREATE_TABLE.php');
include('./JCSQL_class_insert.php');
include('./JCSQL_class_delete.php');
include('./JCSQL_class_alter.php');
include('./JCSQL_class_select.php');

?>