<?php 
  $templete = 'playerEdit';
  $title = 'プレイヤー編集';
  $path = '../';
  include $path .'components/header.php';
  
  $playersId= $_GET['player'];
  
  // jsonデータの読み込み
  $jsonPlayers =  file_get_contents($path .'collections/players.json');

  $players = json_decode($jsonPlayers);

?>
<script type="text/javascript">
const playersList = JSON.parse('<?=$jsonPlayers;?>'); // プレイヤーデータ
</script>

<main class="playerEdit">
  <div class="container">
    <form class="form" name="playerEdit" method="post">
      <div class="form-wrap">
        <div class="form__contents">
          <label class="formLabel hissu">メールアドレス</label>
          <div class="formInputMedium inputStyle">
            <input class="input" type="text" name="mail" value="<?=$players[$playersId]->email;?>">
          </div>
        </div>
        <div class="form__contents">
          <label class="formLabel hissu">パスワード</label>
          <div class="formInputMedium inputStyle">
            <input class="input" type="text" name="password" value="<?=$players[$playersId]->pass;?>">
          </div>
        </div>
        <div class="spacer-xSmall"></div>
        <div class="form__contents">
          <label class="formLabel hissu">名前</label>
          <div class="formInputMedium inputStyle">
            <input class="input" type="text" name="name" value="<?=$players[$playersId]->name;?>">
          </div>
        </div>
        <div class="form__contents">
          <label class="formLabel hissu">源氏名</label>
          <div class="formInputMedium inputStyle">
            <input class="input" type="text" name="genname" value="<?=$players[$playersId]->genname;?>">
          </div>
        </div>
        <div class="form__contents">
          <label class="formLabel">役職</label>
          <div class="formInputMedium inputStyle">
            <input class="input" type="text" name="position" value="<?=$players[$playersId]->position;?>">
          </div>
        </div>
        <div class="form__contents">
          <label class="formLabel">身長</label>
          <div class="form__contents-box">
            <div class="formInputSmall inputStyle">
              <input class="input" type="text" name="height" value="<?=$players[$playersId]->height;?>">
            </div>
            <p>cm</p>
          </div>
        </div>
        <div class="form__contents">
          <label class="formLabel">血液型</label>
          <div class="formInputSmall inputStyle">
            <input class="input" type="text" name="blood" value="<?=$players[$playersId]->blood;?>">
          </div>
        </div>
        <div class="form__contents">
          <label class="formLabel">星座</label>
          <div class="formInputMedium inputStyle">
            <input class="input" type="text" name="sign" value="<?=$players[$playersId]->sign;?>">
          </div>
        </div>
        <div class="form__contents">
          <label class="formLabel">LINE:ID</label>
          <div class="formInputMedium inputStyle">
            <input class="input" type="text" name="line" value="<?=$players[$playersId]->line;?>">
          </div>
        </div>
        <div class="form__contents">
          <label class="formLabel">営業時間</label>
          <div class="flex-row">
            <div class="formCheck">
              <input type="radio" id="hours0" name="hours" value="hours0" <?php if($players[$playersId]->hour->hour_1 === true){
                  echo "checked";} ?>>
              <label for="hours0">1部</label>
            </div>
            <div class="formCheck">
              <input type="radio" id="hours1" name="hours" value="hours1" <?php if($players[$playersId]->hour->hour_2 === true){
                  echo "checked";} ?>>
              <label for="hours1">2部</label>
            </div>
          </div>
        </div>
        <div class="form__contents">
          <label class="formLabel">生年月日</label>
          <div class="form__contents-box">
            <div class="formInputSmall inputStyle">
              <input class="input" type="number" name="birth" value="<?=$players[$playersId]->birth->year;?>">
            </div>
            <div class="formInputSmall inputStyle">
              <input class="input" type="number" name="birth" value="<?=$players[$playersId]->birth->month;?>">

            </div>
            <div class="formInputSmall inputStyle">
              <input class="input" type="number" name="birth" value="<?=$players[$playersId]->birth->day;?>">
            </div>
          </div>
        </div>
        <div class="form__contents">
          <label class="formLabel">TEL</label>
          <div class="form__contents-box">
            <div class="formInputSmall inputStyle">
              <input class="input" type="number" name="tel" value="<?=$players[$playersId]->tel->number_1;?>">
            </div>
            <div class="formInputSmall inputStyle">
              <input class="input" type="number" name="tel" value="<?=$players[$playersId]->tel->number_2;?>">
            </div>
            <div class="formInputSmall inputStyle">
              <input class="input" type="number" name="tel" value="<?=$players[$playersId]->tel->number_3;?>">
            </div>
          </div>
        </div>
        <div class="form__contents">
          <label class="formLabel">身分証</label>
          <div class="flex-row">
            <div class="formCheck">
              <input type="checkbox" id="driver" name="id" value="driver" <?php if($players[$playersId]->id_card->driver === true){
                  echo "checked";} ?>>
              <label for="driver">運転免許</label>
            </div>
            <div class="formCheck">
              <input type="checkbox" id="passport" name="id" value="passport" <?php if($players[$playersId]->id_card->passport === true){
                  echo "checked";} ?>>
              <label for="passport">パスポート</label>
            </div>
            <div class="formCheck">
              <input type="checkbox" id="mynumber" name="id" value="mynumber" <?php if($players[$playersId]->id_card->mynumber === true){
                  echo "checked";} ?>>
              <label for="mynumber">マイナンバー</label>
            </div>
            <div class="formCheck">
              <input type="checkbox" id="health" name="id" value="health" <?php if($players[$playersId]->id_card->health === true){
                  echo "checked";} ?>>
              >
              <label for="health">保険証</label>
            </div>
            <div class="formCheck">
              <input type="checkbox" id="student" name="id" value="student" <?php if($players[$playersId]->id_card->student === true){
                  echo "checked";} ?>>

              <label for="student">学生証</label>
            </div>
            <div class="inputStyle formCheck-etc">
              <label>その他</label>
              <input class="input" type="text" name="id" value="<?=$players[$playersId]->id_card->other;?>">

            </div>
          </div>
        </div>
        <div class="form__contents">
          <label class="formLabel">住所1</label>
          <div class="formInputLarge inputStyle">
            <input class="input" type="text" name="address1" value="<?=$players[$playersId]->address->address_1;?>">

          </div>
        </div>
        <div class="form__contents">
          <label class="formLabel">住所2</label>
          <div class="formInputLarge inputStyle">
            <input class="input" type="text" name="address2" value="<?=$players[$playersId]->address->address_2;?>">

          </div>
        </div>
        <div class="form__contents">
          <label class="formLabel">タイプ</label>
          <div class="form__contents-box">
            <div class="inputStyle">
              <input class="input" type="text" name="type" value="<?=$players[$playersId]->type->type_1;?>">
            </div>
            <div class="inputStyle">
              <input class="input" type="text" name="type" value="<?=$players[$playersId]->type->type_2;?>">
            </div>
            <div class="inputStyle">
              <input class="input" type="text" name="type" value="<?=$players[$playersId]->type->type_3;?>">
            </div>
          </div>
        </div>
        <div class="form__contents">
          <label class="formLabel">コメント</label>
          <div class="formInputLarge inputStyle">
            <textarea class="textarea" rows="8"><?=$players[$playersId]->comment;?></textarea>
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
      <div class="spacer-xLarge"></div>
      <div class="form__playerStatus">
        <h3>雇用形態</h3>
        <div class="spacer-medium"></div>
        <div class="form__playerStatus-select">
          <p class="playerStatusSelect selected">正社員</p>
          <p class="playerStatusSelect">アルバイト</p>
        </div>
        <div class="spacer-medium"></div>
        <div class="form__playerStatus__plus">
          <div class="form__playerStatus__contents">
            <label>基本給</label>
            <div class="inputStyle">
              <input class="input" type="text" name="statusPlus0"
                value="<?=$players[$playersId]->salary->Basic_salary;?>">
            </div>
          </div>
          <div class="form__playerStatus__contents">
            <label>A指名(1回)</label>
            <div class="inputStyle">
              <input class="input" type="text" name="statusPlus1" value="<?=$players[$playersId]->salary->simei_A;?>">
            </div>
          </div>
          <div class="form__playerStatus__contents">
            <label>B指名(1回)</label>
            <div class="inputStyle">
              <input class="input" type="text" name="statusPlus2" value="<?=$players[$playersId]->salary->simei_B;?>">
            </div>
          </div>
          <div class="form__playerStatus__contents">
            <label>同伴(1回)</label>
            <div class="inputStyle">
              <input class="input" type="text" name="statusPlus3" value="<?=$players[$playersId]->salary->douhan;?>">
            </div>
          </div>
          <div class="form__playerStatus__contents">
            <label>役職手当</label>
            <div class="inputStyle">
              <input class="input" type="text" name="statusPlus4"
                value="<?=$players[$playersId]->salary->post_allowance;?>">

            </div>
          </div>
          <div class="form__playerStatus__contents">
            <label>皆勤手当</label>
            <div class="inputStyle">
              <input class="input" type="text" name="statusPlus5"
                value="<?=$players[$playersId]->salary->kaikin_allowance;?>">
            </div>
          </div>
        </div>
        <div class="spacer-medium"></div>
        <div class="form__playerStatus__minus">
          <div class="form__playerStatus__contents">
            <label>積立金</label>
            <div class="inputStyle">
              <input class="input" type="text" name="statusMinus0" value="<?=$players[$playersId]->salary->deposit;?>">

            </div>
          </div>
          <div class="form__playerStatus__contents">
            <label>寮費</label>
            <div class="inputStyle">
              <input class="input" type="text" name="statusMinus1"
                value="<?=$players[$playersId]->salary->Dormitory;?>">

            </div>
          </div>
        </div>
        <div class="spacer-medium"></div>
        <div class="form__playerStatus__per">
          <div class="form__playerStatus__contents">
            <label>バック%</label>
            <div class="inputStyle">
              <input class="input" type="text" name="statusPer0" value="<?=$players[$playersId]->salary->back;?>">

            </div>
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