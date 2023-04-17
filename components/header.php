<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $title; ?> | ホストシステム</title>
  <meta name="description" content="" />
  <link rel="stylesheet" href="<?php echo $path; ?>assets/css/style.css" />
  <!-- <link rel="icon" href="<?php echo $path; ?>assets/images/favicon.ico" /> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>

<body>
  <header class="header">
    <div class="container">
      <div class="flex">
        <h1>
          <a href="<?php echo $path; ?>">
            <span>XXXX GROUP</span>CLUB XXXX
          </a>
        </h1>
        <?php 
          if ($templete == "top"):
        ?>
        <h2>TOP</h2>
        <?php
          elseif ($templete == "orderTop" || $templete == "orderCat" || $templete == "orderAdd" || $templete == "orderConfirm"):
        ?>
        <h2><img class="menu0" src="<?php echo $path; ?>assets/images/menu0.png" alt="注文入力・会計">注文入力・会計</h2>
        <?php
          elseif ($templete == "tableTop" || $templete == "tableDetail"):
        ?>
        <h2><img class="menu1" src="<?php echo $path; ?>assets/images/menu1.png" alt="座席管理">座席管理</h2>
        <?php
          elseif ($templete == "customerTop" || $templete == "customerAdd" || $templete == "customerEdit"):
        ?>
        <h2><img class="menu2" src="<?php echo $path; ?>assets/images/menu2.png" alt="顧客管理">顧客管理</h2>
        <?php
          elseif ($templete == "playerTop" || $templete == "playerAdd" || $templete == "playerEdit" || $templete == "playerDetail"):
        ?>
        <h2><img class="menu3" src="<?php echo $path; ?>assets/images/menu3.png" alt="プレイヤー">プレイヤー</h2>
        <?php
          endif
        ?>
      </div>
    </div>
  </header>