<div class="moleculesSearch">
  <?php 
    if ($templete == "tableTop" || $templete == "customerTop" || $templete == "playerDetail"):
  ?>
  <p>顧客検索</p>
  <?php
    elseif ($templete == "customerAdd" || $templete == "playerTop"):
  ?>
  <p>プレイヤー検索</p>
  <?php
    endif
  ?>
  <div class="moleculesSearch-input inputStyle">
    <input id="searchInput" class="input" type="text">
  </div>
  <button id="searchButton">検索</button>
</div>