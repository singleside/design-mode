<?php
/**
 * 设计模式之迭代器模式
 * singleside
 */

header("Content-type:text/html; charset=utf-8");
/**
 * php内置接口Iterator
 * Iterator::current	返回当前元素
 * Iterator::key		返回当前键
 * Iterator::next		移动当前位置到下一个元素
 * Iterator::rewind		返回到迭代器的第一个元素
 * Iterator::valid		检测当前位置是否有效
 */
class singleside implements \Iterator
{
	//定义指针和数据
	protected $index = 0;
	protected $data = [];

	//将传入的参数保存到$data中
	public function __construct($data)
	{
		$this->data = $data;
	}

	// 重置迭代器
	public function rewind(){
		$this->index = 0;
	}

	//验证传入的参数是否有数据
	public function valid()
	{
		return $this->index < count($this->data);
	}

	// 获取当前内容
	public function current()
	{
		return $this->data[$this->index];
	}

	// 移动key到下一位
	public function next()
	{
		return $this->index++;
	}

	// 获取迭代器key的位置
	public function key()
	{
		return $this->index;
	}



}