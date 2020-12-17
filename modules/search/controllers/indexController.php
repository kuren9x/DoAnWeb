<?php

function construct()
{
    //    echo "DÙng chung, load đầu tiên";
    load_model('index');
}

function indexAction()
{
   if(isset($_POST['search'])){
       $search=$_POST['searchtext'];
        $list_search=get_search($search);
        $data=array(
            'list_search'=>$list_search
        );
    }
    load_view('index',$data);
}
