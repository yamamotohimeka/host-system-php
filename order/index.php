<?php 
  $templete = 'orderTop';
  $title = '注文入力・会計';
  $path = '../';
  include $path .'components/header.php';
  $tableId = $_GET['table'];
  $customerId = $_GET['customer'];

  // jsonデータの読み込み
  $jsonCustomers = file_get_contents($path .'collections/customers.json');
  $jsonCategories =  file_get_contents($path .'collections/categories.json');
  $jsonTables = file_get_contents($path.'collections/tables.json');

  $customers = json_decode($jsonCustomers);
  $categories =  json_decode($jsonCategories);
  $tables = json_decode($jsonTables);

  // $customers[インデックス]->name or customer_id でアクセスできる
  // echo $jsonTables;

  ?>
<script type="text/javascript">
const customersList = JSON.parse('<?=$jsonCustomers;?>'); // 顧客データ
const categoriesList = JSON.parse('<?=$jsonCategories;?>'); // 商品カテゴリデータ
const tablesList = JSON.parse('<?=$jsonTables;?>'); // テーブルデータ
</script>

<main class="orderTop">
  <div class="container">
    <div class="orderTop__cx">
      <div class="orderTop__cx-name">
        <div class="orderTop__cx-name-input inputStyle">
          <p class="input bgGray"><?php echo $customers[$customerId]->name; ?></p>
        </div>
        <p>様</p>
      </div>
      <div class="orderTop__cx-table">
        <p>テーブル番号</p>
        <div class="orderTop__cx-table-input inputStyle">
          <p class="input bgGray"><?php echo $tables[$tableId]->name; ?></p>
        </div>
        <p>卓</p>
      </div>
    </div>
    <div class="spacer-large"></div>
    <ul class="orderTop__menu">
      <?php
          foreach($categories as $category):
      ?>
      <li>
        <a
          href="<?php echo $path; ?>order/category?cat=<?php echo $category->slug; ?>&table=<?php echo $tableId; ?>&customer=<?php echo $customerId ?>">
          <?php echo $category->name;?>
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