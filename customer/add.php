<?php 
  $templete = 'customerAdd';
  $title = '顧客追加';
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

<main class="customerAdd">
  <div class="container">
    <div id="playerPage">
      <?php include $path .'components/moleculesSearch.php'; ?>
    </div>
    <div class="spacer-medium"></div>
    <ul id="searchList">
    </ul>
    <div class="spacer-medium"></div>
    <form class="form" name="customerAdd" method="post">
      <div class="form-wrap">
        <div class="form__contents">
          <label class="formLabel hissu">プレイヤー選択</label>
          <div class="formInputMedium inputStyle">
            <p id="searchName" class="input bgGray" type="text"></p>
          </div>
          <div class="formCheck">
            <input type="checkbox" id="free" name="player" value="free">
            <label for="free">フリー</label>
          </div>
        </div>
        <div class="form__contents">
          <label class="formLabel hissu">名前</label>
          <div class="formInputMedium inputStyle">
            <input class="input" type="text" name="name">
          </div>
        </div>
        <div class="form__contents">
          <label class="formLabel">生年月日</label>
          <div class="form__contents-box">
            <div class="formInputSmall inputStyle">
              <input class="input" type="number" name="birth">
            </div>
            <div class="formInputSmall inputStyle">
              <input class="input" type="number" name="birth">
            </div>
            <div class="formInputSmall inputStyle">
              <input class="input" type="number" name="birth">
            </div>
          </div>
        </div>
        <div class="form__contents">
          <label class="formLabel">TEL</label>
          <div class="form__contents-box">
            <div class="formInputSmall inputStyle">
              <input class="input" type="number" name="tel">
            </div>
            <div class="formInputSmall inputStyle">
              <input class="input" type="number" name="tel">
            </div>
            <div class="formInputSmall inputStyle">
              <input class="input" type="number" name="tel">
            </div>
          </div>
        </div>
        <div class="form__contents">
          <label class="formLabel">身分証</label>
          <div class="flex-row">
            <div class="formCheck">
              <input type="checkbox" id="driver" name="id" value="driver">
              <label for="driver">運転免許</label>
            </div>
            <div class="formCheck">
              <input type="checkbox" id="passport" name="id" value="passport">
              <label for="passport">パスポート</label>
            </div>
            <div class="formCheck">
              <input type="checkbox" id="mynumber" name="id" value="mynumber">
              <label for="mynumber">マイナンバー</label>
            </div>
            <div class="formCheck">
              <input type="checkbox" id="health" name="id" value="health">
              <label for="health">保険証</label>
            </div>
            <div class="formCheck">
              <input type="checkbox" id="student" name="id" value="student">
              <label for="student">学生証</label>
            </div>
            <div class="inputStyle formCheck-etc">
              <label>その他</label>
              <input class="input" type="text" name="id">
            </div>
          </div>
        </div>
        <div class="form__contents">
          <label class="formLabel">住所1</label>
          <div class="formInputLarge inputStyle">
            <input class="input" type="text" name="address1">
          </div>
        </div>
        <div class="form__contents">
          <label class="formLabel">住所2</label>
          <div class="formInputLarge inputStyle">
            <input class="input" type="text" name="address2">
          </div>
        </div>
        <div class="form__contents">
          <label class="formLabel">備考</label>
          <div class="formInputLarge inputStyle">
            <textarea class="textarea" rows="8"></textarea>
          </div>
        </div>
        <div class="form__contents">
          <label class="formLabel"></label>
          <div class="form-input-button">
            <div class="inputButton">
              <label for="inputImage">画像選択</label>
              <input id="inputImage" type="file" name="image" class="none">
            </div>
            <p>※顔写真や身分証のコピーを添付する</p>
            <p>※2枚まで表示可能</p>
          </div>
        </div>
      </div>
      <div class="spacer-large"></div>
      <div class="form-button inputButton">
        <button>登録する</button>
      </div>
    </form>
  </div>
</main>
<?php 
  include $path .'components/footer.php';
?>