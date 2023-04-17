<div class="moleculesLink">
  <div class="moleculesLink-name">
    <div class="moleculesLink-name-input inputStyle">
      <p id="searchName" class="input bgGray"></p>
    </div>
  </div>
  <?php 
    if ($templete == "customerTop"):
  ?>
  <div class="customerTop__cx-button inputButton">
    <button id="customerEditLink">
      詳細表示
    </button>
  </div>
  <?php
    elseif ($templete == "playerTop"):
  ?>
  <div class="moleculesLink-button-wrap">
    <div class="moleculesLink-button inputButton">
      <button id="playerEditLink">
        詳細表示
      </button>
    </div>
    <div class="moleculesLink-button inputButton">
      <button id="playerDetailLink">
        顧客表示
      </button>
    </div>
  </div>
  <?php
    endif
  ?>
</div>