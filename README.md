# design-mode
1. 迭代器模式

2. 观察者模式

	1. php内置SplObserver接口实现
	2. 原生js实现观察者模式

3. 单例模式

	步骤
		1. 编写一个正常类
		2. 封锁new操作，并防止被继承修改权限 final protected function __construct
		3. 创建静态变量并通过预留接口对类进行实例并保存在静态变量中，且只能实例一次 getIns() return self::$ins;
		4. 禁止类被克隆和继承 final protected function __clone()
4. 解释器模式
