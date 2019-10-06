<?php
/**
php实现对文本数据库的数据显示、加入、修改、删除、查询五大基本操作的方法。
此文本数据库共有字段9个：
private $bankid;    //银行ID
private $bankname;  //银行名称
private $bankimg;   //银行图片
private $bankarea;  //覆盖区域
private $bankcard;  //受理卡种
private $banklimit; //支付限额
private $bankpasswd;    //交易密码
private $banknote;  //银行信息备注
private $bankmiss;  //银行其他信息内容。
@abstract   TxtDB store
@access     public
@author     yuchao1@staff.sina.com.cn

 */
date_default_timezone_set('PRC'); 
class TxtDB {

    private $ad_js; //银行ID

    private static $banklisttxt; //txt文件路径


    public function __construct($banklisttxt = '') {
        $ad_js = ""; //银行ID
        if (empty($banklisttxt)) {
            die("数据文件路径不能为空");
        }
        self::$banklisttxt = $banklisttxt; 
    }
  public static function alter($bankinfo) {

        $list = file ( self::$banklisttxt ); //读取整个banklist.txt文件到数组$list,数组每一个元素为一条银行($list[0]是第一条银行的数据、$list[1]是第一条银行的数据.....
  $fp = fopen ( self::$banklisttxt, "w" ); //则以只写模式打开文件banklist.txt
 fwrite ( $fp, $bankinfo["lmjs"]);   
  fclose ( $fp ); //关闭文件 

    }

    public function __destruct() {

    }
}
?>