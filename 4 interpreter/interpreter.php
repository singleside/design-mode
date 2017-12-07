<?php
/**
 * interpreter.php
 * 解释器模式
 * author			singleside(singleside@singleside.cn)
 * @create_time		2017-12-07 11:08
 * @Last_Time		2017-12-07 11:08 +singleside
 * @des				PHP设计模式之解释器模式
 */

header("Content-Type:text/html;charset=utf-8");


/**
 * 抽象解释器
 * 调用解释方法，对内容进行解释
 * 派生出一个解释器，用来对内容进行解释
 */
abstract class IEpress{
	public $content;
	#解释方法
	public function Translate ()
	{
		echo $this->Explain($this->content);
	}

	// 派生出的具体的解释器
	public abstract function Explain ();
}

/**
 * 解释器A:翻译成方言
 * 
 */

class ANode extends IEpress{
	// 实现解释器
	public function Explain ()
	{
		return "普通话中'".$this->content."'解释为:厉害";
	}
}


/**
 * 解释器B:翻译成英语
 * 
 */

class BNode extends IEpress{
	// 实现解释器
	public function Explain ()
	{
		return "英语中'".$this->content."解释为:someone is very good";
	}
}

/**
 * 解释器C:翻译成***
 * 
 */

class CNode extends IEpress{
	// 实现解释器
	public function Explain ()
	{
		return "日语中'".$this->content."解释为:斯国爱";
	}
}

$res = new ANode();
$res->content = "猴赛雷";
$res->Translate();

echo PHP_EOL;

$res = new BNode();
$res->content = "猴赛雷";
$res->Translate();

echo PHP_EOL;

$res = new CNode();
$res->content = "猴赛雷";
$res->Translate();

echo PHP_EOL;
