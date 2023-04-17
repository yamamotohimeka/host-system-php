<?php 
  $templete = 'tableTop';
  $title = '座席管理';
  $path = '../';
  include $path .'components/header.php';

  // jsonデータの読み込み
  $jsonCustomers = file_get_contents($path .'collections/customers.json');
  $jsonPlayers =  file_get_contents($path .'collections/players.json');
  $jsonTables = file_get_contents($path .'collections/tables.json');

  $customers = json_decode($jsonCustomers);
  $players =  json_decode($jsonPlayers);
  $tables = json_decode($jsonTables);

  // $tables[インデックス]->name or customer_id でアクセスできる
  // echo $jsonTables;

  ?>
<script type="text/javascript">
const customersList = JSON.parse('<?=$jsonCustomers;?>'); // 顧客データ
const playersList = JSON.parse('<?=$jsonPlayers;?>'); // プレイヤーデータ
const tablesList = JSON.parse('<?=$jsonTables;?>'); // テーブルデータ
// console.log(customersList);
// console.log(playersList);
// console.log(tablesList);
</script>
<main class="tableTop">
  <div class="container">
    <div class="flex-row">
      <?php include $path .'components/moleculesSearch.php'; ?>
      <div class="tableTop-addLink">
        <a href="<?php echo $path; ?>customer/add">
          新規登録はこちらから
        </a>
      </div>
    </div>
    <div class="spacer-medium"></div>
    <ul id="searchList">
    </ul>
    <div class="spacer-large"></div>
    <div class="tableTop__cx">
      <div class="tableTop__cx-name">
        <div class="tableTop__cx-name-input inputStyle">
          <p id="searchName" class="input bgGray"></p>
        </div>
        <p>様</p>
      </div>
      <div class="tableTop__cx-table">
        <p>テーブル番号</p>
        <div class="tableTop__cx-table-input inputStyle">
          <input id="searchTable" class="input" type="number" min=1 value="">
        </div>
        <p>卓</p>
      </div>
      <div class="tableTop__cx-button inputButton">
        <button id="TableCustomerAdd">確定</button>
      </div>
    </div>
    <div class="spacer-large"></div>
    <ul class="tableTop__menu">
      <?php
      foreach($tables as $table => $val):
        // echo $val->name;
        // echo $val->customer_id[0]
    ?>
      <!-- 顧客が存在するテーブルのみ：色が変わり、クリックするとテーブル情報ページへ遷移できる -->
      <li <?php if(count($val->customer_id)) echo "class='active'";?>>
        <a <?php if(count($val->customer_id)) echo "href=".$path."table/detail?table=".$table; ?>>
          <?php echo $val->name;?>
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