<?php 

  $templete = 'tableDetail';
  $title = '座席管理';
  $path = '../';
  include $path .'components/header.php';
  $tableId = $_GET['table'];

  $jsonCustomers = file_get_contents($path .'collections/customers.json');
  $jsonTables = file_get_contents($path .'collections/tables.json');

  $customers = json_decode($jsonCustomers);
  $tables = json_decode($jsonTables);

  // $tables[インデックス]->name or customer_id でアクセスできる
  // echo $jsonTables;

  ?>
<script type="text/javascript">
const customersList = JSON.parse('<?=$jsonCustomers;?>'); // 顧客データ
const tablesList = JSON.parse('<?=$jsonTables;?>'); // テーブルデータ
</script>

<main class="tableDetail">
  <div class="container">
    <p class="tableDetail-top">
      <?php echo $tables[$tableId]->name; ?>卓
    </p>
  </div>
  <div class="spacer-large"></div>
  <ul class="tableDetail__contents" id="TableDetail__contents">

    <?php
      foreach($tables[$tableId]->customer_id as $index => $value):
        // $values = customer_id;
        // $index = 
    ?>
    <li>
      <h3>
        <?php echo $customers[$value]->name; ?> 様
      </h3>
      <p class="tableDetail__contents-in" data-id="<?=$index;?>"
        data-created_at="<?php echo $customers[$value]->active->created_at; ?>">
        in <?php echo $customers[$value]->active->created_at; ?>
      </p>
      <p class="tableDetail__contents-time" data-id="<?=$index;?>">経過時間 時間 分 秒</p>
      <div class="tableDetail__contents-buttonWrap">
        <div class="tableDetail__contents-button inputButton">
          <a id="tableOrderButton"
            href="<?php echo $path; ?>order?table=<?php echo $tableId; ?>&customer=<?php echo $value ?>">
            <button>注文</button>
          </a>
        </div>
        <div class="tableDetail__contents-button inputButton">
          <a href="<?php echo $path; ?>order/confirm?table=<?php echo $tableId; ?>&customer=<?php echo $value ?>">
            <button>会計</button>
          </a>
        </div>
      </div>
    </li>
    <?php
      endforeach;
    ?>
  </ul>
</main>
<?php 
  include $path .'components/footer.php';
?>