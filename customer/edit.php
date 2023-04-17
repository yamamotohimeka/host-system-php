<?php 
  $templete = 'customerEdit';
  $title = '顧客編集';
  $path = '../';
  include $path .'components/header.php';
  
  $customerId = $_GET['customer'];

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

<main class="customerEdit">
  <div class="container">
    <form class="form" name="customerEdit" method="post">
      <div class="form-wrap">
        <div class="form__contents">
          <label class="formLabel">担当</label>
          <div class="formInputMedium inputStyle">
            <p><?=$players[$customers[$customerId]->player_id]->name;?></p>
          </div>
          <div class="form-input-button">
            <div class="inputButton">
              <p>
                編集
              </p>
            </div>
            <div class="inputButton">
              <p>
                登録する
              </p>
            </div>
          </div>
        </div>
        <div class="spacer-xSmall"></div>
        <div class="form__contents">
          <label class="formLabel hissu">名前</label>
          <div class="formInputMedium inputStyle">
            <input class="input" type="text" name="name" value="<?=$customers[$customerId]->name;?>">
          </div>
        </div>
        <div class="form__contents">
          <label class="formLabel">生年月日</label>
          <div class="form__contents-box">
            <div class="formInputSmall inputStyle">
              <input class="input" type="number" name="birth" min=<?=Date("Y")-200;?> max=<?=Date("Y");?>
                value="<?=$customers[$customerId]->birth->year;?>">
            </div>
            <div class="formInputSmall inputStyle">
              <input class="input" type="number" name="birth" min=1 max=12
                value="<?=$customers[$customerId]->birth->month;?>">
            </div>
            <div class="formInputSmall inputStyle">
              <input class="input" type="number" name="birth" min=1 max=31
                value="<?=$customers[$customerId]->birth->day;?>">
            </div>
          </div>
        </div>
        <div class="form__contents">
          <label class="formLabel">TEL</label>
          <div class="form__contents-box">
            <div class="formInputSmall inputStyle">
              <input class="input" type="number" name="tel" value="<?=$customers[$customerId]->tel->number_1;?>">
            </div>
            <div class="formInputSmall inputStyle">
              <input class="input" type="number" name="tel" value="<?=$customers[$customerId]->tel->number_2;?>">
            </div>
            <div class="formInputSmall inputStyle">
              <input class="input" type="number" name="tel" value="<?=$customers[$customerId]->tel->number_3;?>">
            </div>
          </div>
        </div>

        <div class="form__contents">
          <label class="formLabel">身分証</label>
          <div class="flex-row">
            <div class="formCheck">
              <input type="checkbox" id="driver" name="id" value="driver" <?php if($customers[$customerId]->id_card->driver === true){
                  echo "checked";} ?>>
              <label for="driver">運転免許</label>
            </div>
            <div class="formCheck">
              <input type="checkbox" id="passport" name="id" value="passport" <?php if($customers[$customerId]->id_card->passport === true){
                  echo "checked";} ?>>
              <label for="passport">パスポート</label>
            </div>
            <div class="formCheck">
              <input type="checkbox" id="mynumber" name="id" value="mynumber" <?php if($customers[$customerId]->id_card->mynumber === true){
                  echo "checked";} ?>>
              <label for="mynumber">マイナンバー</label>
            </div>
            <div class="formCheck">
              <input type="checkbox" id="health" name="id" value="health" <?php if($customers[$customerId]->id_card->health === true){
                  echo "checked";} ?>>
              <label for="health">保険証</label>
            </div>
            <div class="formCheck">
              <input type="checkbox" id="student" name="id" value="student" <?php if($customers[$customerId]->id_card->student === true){
                  echo "checked";} ?>>
              <label for="student">学生証</label>
            </div>
            <div class="inputStyle formCheck-etc">
              <label>その他</label>
              <input class="input" type="text" name="id" value="<?=$customers[$customerId]->id_card->other;?>">
            </div>
          </div>
        </div>
        <div class="form__contents">
          <label class="formLabel">住所1</label>
          <div class="formInputLarge inputStyle">
            <input class="input" type="text" name="address1" value="<?=$customers[$customerId]->address->address_1;?>">
          </div>
        </div>
        <div class="form__contents">
          <label class="formLabel">住所2</label>
          <div class="formInputLarge inputStyle">
            <input class="input" type="text" name="address2" value="<?=$customers[$customerId]->address->address_2;?>">
          </div>
        </div>
        <div class="form__contents">
          <label class="formLabel">備考</label>
          <div class="formInputLarge inputStyle">
            <textarea class="textarea" rows="8"><?=$customers[$customerId]->remarks;?></textarea>
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
          <canvas id="canvas"></canvas>
        </div>

      </div>
      <div class="spacer-large"></div>
      <div class="form-button inputButton">
        <button>登録する</button>
      </div>
    </form>
    <div class="spacer-large"></div>
    <ul class="customerEdit__contents">
      <?php
      foreach($customers[$customerId]->history as $history){
        
      ?>
      <li class="customerEdit__contents-detail">
        <p class="date">
          <?=$history->date;?>
        </p>
        <p class="in">
          in <?=$history->in;?>
        </p>
        <p class="out">
          out <?=$history->out;?>
        </p>
        <p class="price">
          <?=$history->price;?>円
        </p>
        <p class="status">
          <?=$history->status;?>
        </p>
      </li>
      <?php
      }
      ?>
    </ul>
  </div>
</main>
<?php 
  include $path .'components/footer.php';
?>