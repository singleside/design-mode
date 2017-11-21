#迭代器模式
php内置Iterator接口
---	

类需要实现接口方法

	Iterator::current	返回当前元素
	Iterator::key		返回当前键
	Iterator::next		移动当前位置到下一个元素
	Iterator::rewind	返回到迭代器的第一个元素
	Iterator::valid		检测当前位置是否有效		