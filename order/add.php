<?php 
  $templete = 'orderAdd';
  $title = 'オーダー';
  $path = '../';
  include $path .'components/header.php';
  $tableId = $_GET['table'];
  $customerId = $_GET['customer'];

  // jsonデータの読み込み
  $jsonCustomers = file_get_contents($path.'collections/customers.json');
  $jsonProducts = file_get_contents($path.'collections/products.json');
  $jsonTables = file_get_contents($path.'collections/tables.json');

  $customers = json_decode($jsonCustomers);
  $products = json_decode($jsonProducts);
  $tables = json_decode($jsonTables);

  // $customers[インデックス]->name or customer_id でアクセスできる
  // echo $jsonTables;

  ?>

<script type="text/javascript">
const customersList = JSON.parse('<?=$jsonCustomers;?>'); // 顧客データ
const productsList = JSON.parse('<?=$jsonProducts;?>'); // 商品データ
const tablesList = JSON.parse('<?=$jsonTables;?>'); // テーブルデータ
</script>

<main class="orderAdd">
  <div class="container">
    <p class="orderAdd-cx" id="orderCustomer" data-customerId="<?=$customerId;?>">
      <?php echo $tables[$tableId]->name; ?>卓 <?php echo $customers[$customerId]->name; ?> 様
    </p>
    <div class=" spacer-large">
    </div>
    <ul id="orderAddContents" class="orderAdd__contents">
    </ul>
    <div class="spacer-large"></div>
    <div class="orderAdd__total">
      <div class="orderAdd__total-price">
        <p>TOTAL</p>
        <p id="orderAddTotal"></p>
      </div>
      <button>
        <a id="orderAddRegister" href="<?=$path;?>">
          <!-- <a id="orderAddRegister"> -->
          決定
        </a>
      </button>
    </div>
  </div>
  <form method="POST" id="post"
    action="<?php $path; ?>add?table=<?php echo $tableId; ?>&customer=<?php echo $customerId ?>">
    <input type="hidden" name="token" value="<?=$token;?>" />
  </form>
</main>
<?php 
  include $path .'components/footer.php';
?>