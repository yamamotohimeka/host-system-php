<?php 
  $templete = 'playerDetail';
  $title = 'プレイヤー詳細';
  $path = '../';
  include $path .'components/header.php';

  $playerId = $_GET['player'];
  
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

<main id="playerDetail" class="playerDetail">
  <div class="container">
    <div class="playerDetail__top">
      <dl class="playerDetail__top__dl">
        <dt>入店日</dt>
        <dd>2022.05.22</dd>
      </dl>
      <dl class="playerDetail__top__dl">
        <dt>源氏名</dt>
        <dd class="playerDetail__top__dl-input inputStyle">
          <p class="input bgGray"><?=$players[$playerId]->genname;?></p>
        </dd>
      </dl>
      <dl class="playerDetail__top__dl">
        <dt>現在の売上</dt>
        <dd class="price">1,524,000 円</dd>
      </dl>
      <div class="spacer-xSmall"></div>
      <div class="flex-row">
        <?php include $path .'components/moleculesSearch.php'; ?>
        <div class="playerDetail__top-button inputButton">
          <button>
            未払いリスト
          </button>
        </div>
      </div>
    </div>
    <div class="spacer-medium"></div>
    <ul id="searchList">
    </ul>
    <div class="spacer-large"></div>
  </div>
</main>
<?php 
  include $path .'components/footer.php';
?>