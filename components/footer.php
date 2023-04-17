<?php
//ページのディレクトリを取得して、トップページじゃない場合のみ「戻るボタン」を設置
  $pageDir = explode('/',$_SERVER["PHP_SELF"]);
  // var_dump($pageDir);
  if($pageDir[2] !== "index.php"){
?>
<button id="pageBack">&lt;&ensp;戻る</button>
<style>
#pageBack {
  display: block;
  margin: auto;
  width: max-content;

  font-size: 22px;
}
</style>
<?php
}
?>
<script>
$('#pageBack').click(function() {
  history.back();
});
</script>
<footer class="footer">
  <div class="container">
  </div>
</footer>
<script type="module" src="<?php echo $path; ?>assets/js/index.js"></script>
</body>

</html>