<?php 
  $templete = 'playerAdd';
  $title = 'プレイヤー追加';
  $path = '../';
  include $path .'components/header.php';
  
  // jsonデータの読み込み
  $jsonPlayers =  file_get_contents($path .'collections/players.json');

  $players = json_decode($jsonPlayers);

?>
<script type="text/javascript">
const playersList = JSON.parse('<?=$jsonPlayers;?>'); // プレイヤーデータ
</script>

<main class="playerAdd">
  <div class="container">
    <form class="form" name="playerAdd" method="post">
      <div class="form-wrap">
        <div class="form__contents">
          <label class="formLabel hissu">メールアドレス</label>
          <div class="formInputMedium inputStyle">
            <input class="input" type="text" name="mail">
          </div>
        </div>
        <div class="form__contents">
          <label class="formLabel hissu">パスワード</label>
          <div class="formInputMedium inputStyle">
            <input class="input" type="text" name="password">
          </div>
        </div>
        <div class="spacer-xSmall"></div>
        <div class="form__contents">
          <label class="formLabel hissu">名前</label>
          <div class="formInputMedium inputStyle">
            <input class="input" type="text" name="name">
          </div>
        </div>
        <div class="form__contents">
          <label class="formLabel hissu">源氏名</label>
          <div class="formInputMedium inputStyle">
            <input class="input" type="text" name="genname">
          </div>
        </div>
        <div class="form__contents">
          <label class="formLabel">役職</label>
          <div class="formInputMedium inputStyle">
            <input class="input" type="text" name="position">
          </div>
        </div>
        <div class="form__contents">
          <label class="formLabel">身長</label>
          <div class="form__contents-box">
            <div class="formInputSmall inputStyle">
              <input class="input" type="text" name="height">
            </div>
            <p>cm</p>
          </div>
        </div>
        <div class="form__contents">
          <label class="formLabel">血液型</label>
          <div class="formInputSmall inputStyle">
            <input class="input" type="text" name="blood">
          </div>
        </div>
        <div class="form__contents">
          <label class="formLabel">星座</label>
          <div class="formInputMedium inputStyle">
            <input class="input" type="text" name="sign">
          </div>
        </div>
        <div class="form__contents">
          <label class="formLabel">LINE:ID</label>
          <div class="formInputMedium inputStyle">
            <input class="input" type="text" name="line">
          </div>
        </div>
        <div class="form__contents">
          <label class="formLabel">営業時間</label>
          <div class="flex-row">
            <div class="formCheck">
              <input type="radio" id="hours0" name="hours" value="hours0">
              <label for="hours0">1部</label>
            </div>
            <div class="formCheck">
              <input type="radio" id="hours1" name="hours" value="hours1">
              <label for="hours1">2部</label>
            </div>
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
          <label class="formLabel">タイプ</label>
          <div class="form__contents-box">
            <div class="inputStyle">
              <input class="input" type="text" name="type">
            </div>
            <div class="inputStyle">
              <input class="input" type="text" name="type">
            </div>
            <div class="inputStyle">
              <input class="input" type="text" name="type">
            </div>
          </div>
        </div>
        <div class="form__contents">
          <label class="formLabel">コメント</label>
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
              <input class="input" type="text" name="statusPlus0">
            </div>
          </div>
          <div class="form__playerStatus__contents">
            <label>A指名(1回)</label>
            <div class="inputStyle">
              <input class="input" type="text" name="statusPlus1">
            </div>
          </div>
          <div class="form__playerStatus__contents">
            <label>B指名(1回)</label>
            <div class="inputStyle">
              <input class="input" type="text" name="statusPlus2">
            </div>
          </div>
          <div class="form__playerStatus__contents">
            <label>同伴(1回)</label>
            <div class="inputStyle">
              <input class="input" type="text" name="statusPlus3">
            </div>
          </div>
          <div class="form__playerStatus__contents">
            <label>役職手当</label>
            <div class="inputStyle">
              <input class="input" type="text" name="statusPlus4">
            </div>
          </div>
          <div class="form__playerStatus__contents">
            <label>皆勤手当</label>
            <div class="inputStyle">
              <input class="input" type="text" name="statusPlus5">
            </div>
          </div>
        </div>
        <div class="spacer-medium"></div>
        <div class="form__playerStatus__minus">
          <div class="form__playerStatus__contents">
            <label>積立金</label>
            <div class="inputStyle">
              <input class="input" type="text" name="statusMinus0">
            </div>
          </div>
          <div class="form__playerStatus__contents">
            <label>寮費</label>
            <div class="inputStyle">
              <input class="input" type="text" name="statusMinus1">
            </div>
          </div>
        </div>
        <div class="spacer-medium"></div>
        <div class="form__playerStatus__per">
          <div class="form__playerStatus__contents">
            <label>バック%</label>
            <div class="inputStyle">
              <input class="input" type="text" name="statusPer0">
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