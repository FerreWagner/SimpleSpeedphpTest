<?php
class MainController extends BaseController {
	// 首页
	function actionIndex(){
	    $guest_book = new Model("guestbook");
//	    $this->records = $guest_book->findAll();
//	    var_dump($this->records);
	    //渲染页面
        $this->display("guestbook.html");
	}

	function actionWrite()
    {
//        dump(arg());die;
        //数据整理
        $new_form = [
            'title'      => arg('title'),
            'contents'   => arg('contents'),
            'username'   => arg('username'),
            'createtime' => time(),
        ];

        //实例化model
        $guest_model = new Model('guestbook');

        //使用model中的create方法将前面的数据插入表中
        $result = $guest_model->create($new_form);

        if ($result){
            echo 'good';
        }else{
            die('not good');
        }
        $this->tips("留言成功！", url("main", "index"));
    }



}