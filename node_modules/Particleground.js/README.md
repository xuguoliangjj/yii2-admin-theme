[![npm version](https://badge.fury.io/js/Particleground.js.svg)](https://badge.fury.io/js/Particleground.js)



## 安装 · Install

```
npm install Particleground.js --save

// using
import Particleground from 'Particleground.js';
new Particleground.particle('#demo');
```
	



## 介绍 · Intro

> Particleground.js（以下简称pjs）是一款基于canvas的不依赖于其他库的简洁，高效，轻量级的canvas粒子运动特效插件库。提供一些比较绚丽，实用的特效应用于界面，希望能达到锦上添花的作用，给用户带来些许惊喜。

> pjs的特效多数来源于他人分享，pjs像一个搬运工一样把它们集合在一起，并做了细节或功能上的改进，在此，感谢原作者的创意或代码。



## 理念 · Thought

> API设计理念信仰 `"The Write Less, Do More"` 和 `"Keep it Simple and Stupid"` ，希望插件使用起来非常的简单便捷，五分钟上手，立竿见影，不必花太多的时间来学习插件，因为工具是帮助人们更快捷的实现想要的功能，而不是占用人们太多的时间去学习，简而言之：既要强大，易扩展，又要简单！

> pjs希望代码封装得简洁直观，并且高效。 感谢市面上缤纷的开源项目或者其他，因为pjs无疑克隆（借鉴/参考/站在巨人的肩膀之上）了你们优秀的代码或者思想。



## 使用 · Usage
```
<!DOCTYPE html>
<html>
<header>
    <meta charset="utf-8">
    <!-- 引入 Particleground.js -->
    <script src="particleground.js"></script>
    <!-- 引入 粒子特效js -->
    <script src="particle.js"></script>
</header>
<body>
    <!-- 准备一个具有一定宽高的DOM元素，用于显示粒子特效 -->
    <div id="demo" style="width: 400px; height: 250px;"></div>

    <script>
        // 使用 new Particleground.特效名 创建特效
        new Particleground.particle( '#demo' );
    </script>
</body>
</html>
```


## 文档 · Document
[打开官网查阅详细文档：http://particleground.duapp.com/examples/preface](http://particleground.duapp.com/examples/preface)



## 协议 · License
[MIT](http://www.opensource.org/licenses/mit-license.php)