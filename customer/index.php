<?php 
  $templete = 'customerTop';
  $title = '顧客管理';
  $path = '../';
  include $path .'components/header.php';
  
  // jsonデータの読み込み
  $jsonCustomers = file_get_contents($path .'collections/customers.json');
  $jsonPlayers =  file_get_contents($path .'collections/players.json');

  $customers = json_decode($jsonCustomers);
  $players = json_decode($jsonPlayers);

?>
<script type="text/javascript">
const customersList = JSON.parse('<?=$jsonCustomers;?>'); // 顧客データ
const playersList = JSON.parse('<?=$jsonPlayers;?>'); // プレイヤーデータ
</script>

<main class="customerTop">
  <div class="container">
    <div class="flex-row">
      <?php include $path .'components/moleculesSearch.php'; ?>
      <div class="customerTop-addLink">
        <a href="<?php echo $path; ?>customer/add">
          新規登録はこちらから
        </a>
      </div>
    </div>
    <div class="spacer-medium"></div>
    <ul id="searchList">
    </ul>
    <div class="spacer-large"></div>
    <?php include $path .'components/moleculesLink.php'; ?>
  </div>
</main>
<?php 
  include $path .'components/footer.php';
?>