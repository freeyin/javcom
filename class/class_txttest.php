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

    private $ad_top_id; //银行ID
    private $ad_top_url; //银行名称
    private $ad_top_pic; //银行图片
    private $ad_top_md; //覆盖区域
    private static $banklisttxt; //txt文件路径


    public function __construct($banklisttxt = '') {
        $ad_top_id = ""; //银行ID
        $ad_top_url = ""; //银行名称
        $ad_top_pic = ""; //银行图片
        $ad_top_md = ""; //覆盖区域
        if (empty($banklisttxt)) {
            die("数据文件路径不能为空");
        }
        self::$banklisttxt = $banklisttxt; 
    }
    /**
     * 加入数据程序段。
     * $bankinfo array  要插入的银行信息列表
     * $bankinfo["bankid"]$bankinfo["bankname"]$bankinfo["bankimg"]$bankinfo["bankarea"]
     * $bankinfo["bankcard"]$bankinfo["banklimit"]
     * $bankinfo["bankpasswd"]$bankinfo["banknote"]$bankinfo["bankmiss"]
     * @return boolean 成功  true
     *  失败 false
     */
    public static function insert($bankinfo) {
        $date = date ( "Y-m-d H:i:s" ); //取得系统时间

        foreach ( $bankinfo as $key => $value ) {
            $key = trim ( $value ); //去掉银行内容后面的空格.
        }
        try {
            $fp = fopen ( self::$banklisttxt, "a" ); //以只写模式打开banklist.txt文本文件,文件指针指向文件尾部.
            $str = $bankinfo ["ad_top_id"] . "|" . $bankinfo ["ad_top_url"] . "|" . $bankinfo ["ad_top_pic"] . "|" .
                $bankinfo ["ad_top_md"] . "|" . $date . "\r\n";
            //将所有银行的数据赋予变量$str，"|"的目的是用来今后作数据分割时的数据间隔符号。
            fwrite ( $fp, $str ); //将数据写入文件
            fclose ( $fp ); //关闭文件
            //其中的$banklist是由银行表单传过来的数据。
            return true;
        } catch ( Exception $e ) {
            return false;
        }
    }

    public static function show($order = "asc") {
        //数据显示程序段
        if (file_exists ( self::$banklisttxt )) { //检测文件是否存在
            $array = file ( self::$banklisttxt ); //将文件全部内容读入到数组$array
            if ($order == "asc") {
                $arr = $array;
            }
            else
            {
                $arr = array_reverse ( $array ); //将$array里的数据安行翻转排列（即最后一行当第一行，依此类推）读入数组$arr的每一个单元（$arr[0]...）。
            }
        }
        return $arr;
    }
    public static function shows($order = "asc") {

		$data=file_get_contents(self::$banklisttxt);
        //数据显示程序段
        if ($data !=NULL) { //检测文件是否存在
			$array=$data;
			$array=explode("\n",$array);
			
           // $array = file ($array); //将文件全部内容读入到数组$array
		  var_dump($array);
            if ($order == "asc") {
                $arr = $array;
            }
            else
            {
                $arr = array_reverse ( $array ); //将$array里的数据安行翻转排列（即最后一行当第一行，依此类推）读入数组$arr的每一个单元（$arr[0]...）。
            }
        }
        return $arr;
    }
    /**
     * 数据修改程序段
     * $bankinfo array  要插入的银行信息列表
     * $bankinfo["bankid"]$bankinfo["bankname"]$bankinfo["bankimg"]$bankinfo["bankarea"]
     * $bankinfo["bankcard"]$bankinfo["banklimit"]
     * $bankinfo["bankpasswd"]$bankinfo["banknote"]$bankinfo["bankmiss"]
     * @return boolean 成功  true
     *  失败 false
     */
    public static function alter($bankinfo) {
        $date = date ( "Y-m-d H:i:s" ); //取得系统修改时间
        $list = file ( self::$banklisttxt ); //读取整个banklist.txt文件到数组$list,数组每一个元素为一条银行($list[0]是第一条银行的数据、$list[1]是第一条银行的数据.....
        $n = count ( $list ); //计算$list内容里的银行总数,并赋予变量$n
        foreach ( $bankinfo as $key => $value ) {
            $key = trim ( $value ); //去掉银行内容后面的空格.
        }
        if ($n > 0) { //如果银行数大于0
            $fp = fopen ( self::$banklisttxt, "w" ); //则以只写模式打开文件banklist.txt

            for($i = 0; $i < $n; $i ++) { //进入循环
                if (preg_match ( "/{$bankinfo["ad_top_id"]}/", $list [$i] )) { //将传银行bankid与数组单元$list里内容进行字串匹配比较
                    $f = explode ( "|", $list [$i] ); //如果找到匹配，就以"|"作为分隔符,切开银行信息$list[$i](第$i条银行),并将这些数据赋予数组$f
                    $f[0] = $bankinfo["ad_top_id"];
                    $f[1] = $bankinfo["ad_top_url"];
                    $f[2] = $bankinfo["ad_top_pic"];
                    $f[3] = $bankinfo["ad_top_md"];
                    $f[4] = $date;
                    $list [$i] = $f [0] . "|" . $f [1] . "|" . $f [2] . "|" . $f [3] . "|" . $f [4] . "\r\n";
                    //将数组单元$list[$i]的内容用数组$f加上分隔符"|"代替。
                    break; //跳出循环
                }
            }//循环结束符
        }
        for($i = 0; $i <= $n; $i ++) { //进入循环
            fwrite ( $fp, $list [$i] ); //将数组$list的每个单元为一行，写入文件banklist.txt
        } //循环结束符
        fclose ( $fp ); //关闭文件
    }
    /**
     * 数据删除程序段
     * @param   $bankid 银行id号
     * @return boolean true 成功
     * false 失败
     *
     */
    public static function delete($bankid) {
        $list = file ( self::$banklisttxt ); //读取整个banklist.txt文件到数组$list,数组每一个元素为一条银行($list[0]是第一条银行的数据、$list[1]是第一条银行的数据.....
        $n = count ( $list ); //计算$list内容里的银行总数,并赋予变量$n
        if ($n > 0) { //如果银行数大于0
            $fp = fopen ( self::$banklisttxt, "w" ); //则以只写模式打开文件banklist.txt
            for($i = 0; $i < $n; $i ++) { //进入循环
                if (preg_match ( "/{$bankid}/", $list [$i] )) { //将发送过来的银行$bankid与数组$list[$i]里的字串进行匹配比较
                    $list [$i] = ""; //如果匹配成功，则将$list[$i]清空（达到删除的目的）
                    break; //跳出循环
                }
            } //循环结束符
            FOR($i = 0; $i <= $n; $i ++) { //进入循环
                fwrite ( $fp, $list [$i] ); //将数组$list的每个单元为一行，写入文件banklist.txt
            } //循环结束符
            fclose ( $fp ); //关闭文件
        }
    }

    /**
     * 数据查询程序段
     * @param $bankid 银行ID号
     * @return boolean 成功返回ture
     * 失败返回 false
     *
     */
    public static function select($bankid) {
        $id = 0;
        $list = file ( self::$banklisttxt ); //读取整个banklist.txt文件到数组$list,
        //数组每一个元素为一条银行($list[0]是第一条银行的数据、$list[1]是第二条银行的数据.....
        $n = count ( $list ); //计算$list内容里的银行总数,并赋予变量$n
        $bankid = trim ( $bankid );
        if (! $bankid) { //如果$bankid为假
            echo "您没有输入任何关键字！"; //作相关显示
            return false;
        } else {
            if ($n > 0) { //如果银行数大于0
                for($i = 0; $i < $n; $i ++) { //进入循环
                    if (preg_match ("/{$bankid}/" , $list [$i] )) { //输入的关键字与数组$list[$i]里的字串进行匹配比较
                        $row = explode ( "|", $list [$i] );
                        $id = 1; //如果找到匹配，就以"|"作为分隔符,切开银行信息$list[$i](第$i条银行),并将这些数据赋予数组$row.并将变量$id赋予1，以便作为是否找到匹配的判断。
                        list ( $ad_top_id,$ad_top_url,$ad_top_pic,$ad_top_md) = $row; //将数组$row里的单元数据按顺序赋予括号里的变量
                        //echo $bankname;
                        return $row;
                    }
                }//循环结束符
            }
        }
        if ($id == 0) {
            echo "没有找到与关键字匹配的银行！";
            return false;
        } //如果$id＝0则表示没找到匹配，显示相关提示


    }

    public function __destruct() {

    }
}
?>