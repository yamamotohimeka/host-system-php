<?php 
  $templete = 'orderConfirm';
  $title = '会計';
  $path = '../';
  include $path .'components/header.php';
  $tableId = $_GET['table'];
  $customerId = $_GET['customer'];

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

<main class="orderConfirm">
  <div class="container">
    <p class="orderConfirm-cx" id="orderCustomer" data-customerId="<?=$customerId;?>" data-tableId="<?=$tableId;?>">
      <?php echo $tables[$tableId]->name; ?>卓 <?=$customers[$customerId]->name; ?> 様
    </p>
    <div class="spacer-large"></div>
    <ul id="orderConfirmContents" class="orderConfirm__contents">
      <?php
        foreach($customers[$customerId]->active->orders as $id => $order):
        $productTotal = number_format($products[$order->product_id]->price * $order->quantity);
      ?>
      <li>
        <h3><?php echo $products[$order->product_id]->name; ?></h3>
        <p>数量: <?php echo $order->quantity; ?></p>
        <div>
          <p>単価: <?php echo number_format($products[$order->product_id]->price); ?> 円</p>
          <p>合計: <?php echo $productTotal; ?> 円</p>
        </div>
      </li>
      <?php 
        endforeach;
      ?>
    </ul>
    <div class="spacer-large"></div>
    <div class="orderConfirm__total">
      <div class="orderConfirm__total-price">
        <p>TOTAL</p>
        <p id="orderConfirmTotal">
          <?php
            $totalPrice = $customers[$customerId]->active->total;
            echo $totalPrice; 
          ?>
        </p>
      </div>
      <a id="Pay">
        <!-- 会計ボタンクリックで、本当によろしいですか？ポップアップを表示して、OKを押したら$customers->active->ordersを空にする。 -->
        <button>
          会計
        </button>
      </a>
    </div>
  </div>
  <form id='Pay_confirm'>
    <div id='Confirm_content'>
      <p>本当によろしいですか？</p>
      <p>会計金額：<span class="total_price"><?=$totalPrice?></span>円</p>
      <div id='Button_wrap'>
        <button>
          <a>はい</a>
        </button>
        <a id='Confirm_cancel'>キャンセル</a>
      </div>

    </div>
  </form>
</main>

<script>
</script>
<style>
#Pay_confirm.active {
  display: block;
}

#Pay_confirm {
  display: none;
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  margin: auto;
  width: 150vw;
  height: 150vh;
  background-color: rgba(0, 0, 0, 0.7);
}

#Confirm_content {
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  margin: auto;
  padding: 60px 0;
  width: 80%;
  height: max-content;

  background-color: black;
  border: 2px solid white;

  text-align: center;
  font-size: 1.3em;
}

#Confirm_content p {
  margin: auto;
  padding-bottom: 30px;
  width: 80%;

  font-size: 1.5em;
}

#Button_wrap {
  display: flex;
  align-items: center;
  justify-content: space-around;
  margin: auto;
  width: 80%;
}

#Button_wrap a {
  padding: 16px 50px;
  text-align: center;
  background-color: rgba(134, 134, 134, 0.2);
}

#Button_wrap a:hover {
  background-color: rgba(134, 134, 134, 0.5);
}

.total_price {
  font-size: 1.5em;
}
</style>
<?php 
  include $path .'components/footer.php';
?>