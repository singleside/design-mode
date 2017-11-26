<?php
/**
 * 设计模式之观察者模式
 * singleside
 */
header("Content-type:text/html;charset=utf-8");

/**
 * php内置接口SplOberver
 * SplOberver	: 观察者
 *     update,
 * SplSubject	: 被观察者
 * 	SplSubject接口中的方法
 *      attach，添加(注册)一个观察者
 *      detach，删除一个观察者
 *      notify,当状态发生改变时，通知所有的观察者
 *使用SplObjectStorage类存储唯一对象
 */

/**
 * 被观察者
 */
class User implements SplSubject
{
    // $observers保存注册过的观察者
    // 使用 SplObjectStorage 内置类进行
    private $observers;

    public function __construct ()
    {
        $this->observers = new SplObjectStorage();
    }

    /**
     * 添加一个观察者
     */
    public function attach (SplObserver $observer)
    {
        $this->observers->attach($observer);
    }

    /**
     * 删除一个观察者
     */
    public function detach (SplObserver $observer)
    {
        $this->observers->detach($observer);
    }

    /**
     * 当状态发生改变时通知观察者
     */
    
    public function notify ()
    {
        // 将指针先指向头部
        $this->observers->rewind();
        // while循环通知观察者
        while( $this->observers->valid() ){
            //获取当前指针对象
            $observer = $this->observers->current();

            // 调用当前对象的方法
            $observer->update($this);

            // 指针指向下一个对象
            $this->observers->next();

        }
    }

    // 被观察者动作
    
    public function create ()
    {
        echo __METHOD__,PHP_EOL;
        // 通知观察者
        $this->notify();
    }

}

// 观察者1
class EmailSender implements SplObserver
{

    public function update (SplSubject $subject)
    {
        // 邮件发送
        echo "观察者email",PHP_EOL;
        print_r($subject);
    }
}

// 观察者2

class TencentSender implements SplObserver
{
    public function update (SplSubject $subject)
    {
        echo "观察者Tencent",PHP_EOL;
        print_r($subject);
    }
}


$user = new User;

// 注册观察者
// $user->attach(new EmailSender());
$user->attach(new TencentSender());

// 调用当前观察者观察的动作

$user->create();