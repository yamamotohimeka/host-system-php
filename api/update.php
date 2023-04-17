<?php

  if(isset($_POST["newCustomers"])){ // POSTでデータが送られてきた場合
    /* POSTで送られたデータでtables.phpファイルを上書きする ============================ */
    $path = '../'; // パス設定
    $url = $path .'collections/customers.json'; // ファイルを指定
    $newTables = ""; // 初期化
    
    $newCustomers = $_POST["newCustomers"]; // POSTデータを取得(JSON型で綴られた文字列)

    file_put_contents($url , $newCustomers); // 指定のファイルをPOSTされたデータで上書きする。
  }

  // テーブルjsonの上書き
  if(isset($_POST["newTables"])){ // POSTでデータが送られてきた場合
    /* POSTで送られたデータでtables.phpファイルを上書きする ============================ */
    $path = '../'; // パス設定
    $url = $path .'collections/tables.json'; // ファイルを指定
    $newTables = ""; // 初期化
    
    $newTables = $_POST["newTables"]; // POSTデータを取得(JSON型で綴られた文字列)

    file_put_contents($url , $newTables); // 指定のファイルをPOSTされたデータで上書きする。
  }
?>