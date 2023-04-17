<?php 

session_start();
$token = sha1(uniqid(rand(), true));
$_SESSION['key'] = $token;

  $templete = 'top';
  $title = 'トップ';
  $path = './';
  include $path .'components/header.php';
?>
<main class="top">
  <div class="container">
    <ul class="top__menu">
      <?php
        $menus = [
          [
            'slug'=>'order',
            'name'=>'注文入力・会計'
          ], [
            'slug'=>'table',
            'name'=>'座席管理'
          ], [
            'slug'=>'customer',
            'name'=>'顧客管理'
          ], [
            'slug'=>'player',
            'name'=>'プレイヤー'
          ], [
            'slug'=>'',
            'name'=>'出席管理'
          ], [
            'slug'=>'',
            'name'=>'ランキング'
          ], [
            'slug'=>'',
            'name'=>'売上管理'
          ], [
            'slug'=>'',
            'name'=>'給与管理'
          ], [
            'slug'=>'',
            'name'=>'マスタ登録'
          ]
        ];
        foreach($menus as $id => $menu):
      ?>
      <li>
        <a href="<?php echo $path; echo $menu['slug']; ?>">
          <?php echo $menu['name'];?>
        </a>
      </li>
      <?php 
        endforeach;
      ?>
    </ul>
  </div>
</main>
<?php 
  include $path .'components/footer.php';
?>