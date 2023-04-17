<?php 
  $templete = 'orderCat';
  $title = '注文入力';
  $path = '../';
  include $path .'components/header.php';
  $catId = $_GET['cat'];
  $tableId = $_GET['table'];
  $customerId = $_GET['customer'];

  // jsonデータの読み込み
  $jsonCustomers = file_get_contents($path .'collections/customers.json');
  $jsonCategories =  file_get_contents($path .'collections/categories.json');
  $jsonProducts =  file_get_contents($path .'collections/products.json');

  $customers = json_decode($jsonCustomers);
  $categories =  json_decode($jsonCategories);
  $products =  json_decode($jsonProducts);

  // $customers[インデックス]->name or customer_id でアクセスできる
  // echo $jsonTables;

  ?>
<script type="text/javascript">
const customersList = JSON.parse('<?=$jsonCustomers;?>'); // 顧客データ
const categoriesList = JSON.parse('<?=$jsonCategories;?>'); // 商品カテゴリデータ
const productsList = JSON.parse('<?=$jsonProducts;?>'); // 商品データ
</script>

<main class="orderCat">
  <div class="container">
    <div class="orderCat__top">
      <nav class="orderCat__top__nav">
        <ul class="orderCat__top__nav__list">
          <?php
            foreach($categories as $category):
            $catName = str_replace('</br>', '・', $category->name)
          ?>
          <li class="orderCatCategory <?php echo $category->slug; ?>">
            <?php echo $catName;?>
          </li>
          <?php 
            endforeach;
          ?>
        </ul>
      </nav>
      <p class="orderCat__top-cx">
        <?php echo $tables[$tableId]->name; ?>卓 <?php echo $customers[$customerId]->name; ?> 様
      </p>
    </div>
    <div class="spacer-large"></div>
    <ul id="orderCatContents" class="orderCat__contents">
      <?php
        foreach($products as $product):
        $productPrice = number_format($product->price);
      ?>
      <li class="orderCatItem <?php echo $product->cat; ?> <?php if($catId != $product->cat) echo 'none'; ?>"
        data-productName="<?=$product->name;?>">
        <h3 class="orderCatName">
          <?php echo $product->name;?>
        </h3>
        <div class=" orderCat__contents__inner">
          <div class="orderCat__contents__quantity">
            <p>数量</p>
            <div class="orderCat__contents__quantity-input inputStyle">
              <input class="orderCatQuantity input" type="number" placeholder="0">
            </div>
            <div class="orderCat__contents__quantity-icon orderCatMinus">
              −
            </div>
            <div class="orderCat__contents__quantity-icon orderCatPlus">
              ＋
            </div>
          </div>
          <p class="orderCat__contents-price orderCatPrice">
            <?php echo $productPrice;?> 円
          </p>
        </div>
      </li>
      <?php
        endforeach;
      ?>
    </ul>
    <div class="spacer-large"></div>
    <div class="orderCat__total">
      <div class="orderCat__total-price">
        <p>TOTAL</p>
        <p id="orderCatTotal">0 円</p>
      </div>
      <button>
        <!-- <a id="orderCatNext" href="<?php $path; ?>add?table=<?php echo $tableId; ?>&customer=<?php echo $customerId ?>"> -->
        <a id="orderCatNext">
          オーダー
        </a>
      </button>
    </div>
  </div>
  <form method="POST" id="post"
    action="<?php $path; ?>add?table=<?php echo $tableId; ?>&customer=<?php echo $customerId ?>">
  </form>
</main>
<?php 
  include $path .'components/footer.php';
?>