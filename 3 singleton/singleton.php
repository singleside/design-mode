<?php
/**
 * singleton.php
 * @author     		singleside(singleside@singleside.cn)
 * @Create_Time		2017-12-4 11:35
 * @Last_Time		2017-12-4 11:35 + singleside
 * @des				php设计模式之单例模式
 */
header("Content-type:text/html;charset=utf-8");
/**
 * 1、正常类
 * 2、封锁new操作	protected __construct
 * 3、留下接口进行new对象	getIns()
 * 4、接口中判断实例是否被实例过
 * 5、防止继承，修改权限
 * 6、禁止类被克隆
 * 
 * 
 * 1、final protected __construct
 * 2、getIns()		获取实例
 * 3、final protected __clone		禁止克隆
 * 4、使用静态类成员变量对实例进行保存
 */
class singleton{
	protected static $ins = null;

	// 封锁new操作并防止继承重写
	final protected function __construct ()
	{

	}

	public static function getIns ()
	{
		// 判断$ins是否已经保存了实例
		if(self::$ins == null){
			self::$ins = new self();
		}
		return self::$ins;
	}

	// 封锁克隆并防止继承重写
	final protected function __clone()
	{

	}

}

$s1 = singleton::getIns();
$s2 = singleton::getIns();
if($s1 === $s2){
	echo "是一个对象";
}else{
	echo "不是一个对象";
}