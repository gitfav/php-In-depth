#### 一、介绍SAPI
##### 1、PHP内核架构
    请求执行  UA->apache（或者其它）->SAPI(mod_php)（或其它）->zend engine->php script
             |                                                                 |  然后返回
             <-   <-                <-                <-                      <-
##### 2、PHP SAPI介绍
    · The Server API(API的规范)
    · 提供与外部通讯的接口
##### 3、PHP SAPI总览
###### PHP运行模式
    · cgi(通用网关接口Common Gateway Interface)
    · fast-cgi(cgi的升级版本)
    · cli(Command Line Interface 命令行模式)
    · isapi(Internet Server Application Program Interface,是微软提供的一套面向Internet服务的API接口)
    · apache2handler(将php作为apache的模块，nginx类似)
    · 其他(continuity,embed,listespeed,milter等)
###### 如何选择PHP的运行模式
查看运行模式的方法
```php
php -r phpinfo();|find/grep "Server API"
php -r "echo php_sapi_name();"
phpinfo();
```

选择运行模式前提  
>  1).了解这些运行模式的优缺点和应用场景  
>  2).根据业务选择

##### 4、CLI模式
1.Command Line Interface的简称，即命令行接口，在windows和linux下都支持PHP_CLI模式  
2.它可以直接在命令行下运行，可以完全不用任何http容器  
例如：php test.php  

应用场景  
> · 定时任务  
> · 开发桌面应用就是使用PHP-CLI和GTK包  
> · 开发shell脚本   

##### 5、CGI模式
cgi(通用网关接口Common Gateway Interface)，它是一段程序，像桥一样把网页和web服务器中的执行程序连接起来，它把http服务器接收的指令传递给执行程序，再把执行程序的结果返回给http服务器。CGI的跨平台性能极佳，几乎可以在任何操作系统上实现。  

执行过程
> · http服务器接受到用户请求后，例如index.php，会通过它配置的CGI服务来执行  
> · 生成一个php-cgi.exe的进程，并执行php程序  
> · 执行结果返回交给web服务器

应用场景
> · 提供http服务

优缺点
> · 跨平台性能极佳，几乎可以在任何操作系统上实现  
> · web和server是独立的，结构清晰，可控性强  
> · 性能比较差，来一个请求，fork一个进程，100个请求就会fork100个进程，消耗资源较多(fork-and-execute模式)

最近几年已经很少见到使用这种模式了