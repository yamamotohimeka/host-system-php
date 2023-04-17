// tableの処理
export const Table = () => {
  const searchName = document.getElementById("searchName");
  const searchTable = document.getElementById("searchTable");
  const TableCustomerAdd = $("#TableCustomerAdd");

  /* １秒毎に経過時間を計算して出力する =================================================== */
  $("#TableDetail__contents li").each(function (i) {
    // console.log(i);
    // console.log(elem);
    // 時間の差分を計算
    const created_at = $('p.tableDetail__contents-in[data-id="' + i + '"]').attr("data-created_at");
    const contents_time = $('p.tableDetail__contents-time[data-id="' + i + '"]');

    console.log(created_at);

    // ロード時に実行
    calcTime(contents_time, created_at);

    // 1秒毎に実行
    setInterval(() => {
      calcTime(contents_time, created_at);
    }, 1000);
  });

  // 「出力場所の要素」と「対象の時間」を引数に指定して経過時間を計算
  function calcTime(contents_time, created_at) {
    // 現在の時間を取得
    const now = new Date();
    const Y = now.getFullYear();
    const m = ("0" + (now.getMonth() + 1)).slice(-2);
    const d = ("0" + now.getDate()).slice(-2);
    const H = ("0" + now.getHours()).slice(-2);
    const i = ("0" + now.getMinutes()).slice(-2);
    const s = ("0" + now.getSeconds()).slice(-2);
    const nowTime = Y + "-" + m + "-" + d + " " + H + ":" + i + ":" + s;
    // console.log(nowTime);
    // console.log(created_at);

    // 2つの日時を用意
    const time1 = new Date(nowTime);
    const time2 = new Date(created_at);

    const diff = (time1.getTime() - time2.getTime()) / 1000; // ミリ秒単位なので、/1000で秒単位になおす
    // console.log(diff);
    const diff_H = Math.floor(diff / 60 / 60); //時間
    const diff_i = ("0" + Math.floor((diff / 60) % 60)).slice(-2); //分
    const diff_s = ("0" + Math.floor((diff % 60) % 60)).slice(-2); //秒
    // console.log(diff_H);
    // console.log(diff_i);
    // console.log(diff_s);

    const calcTime = "経過時間 " + diff_H + "時間" + diff_i + "分" + diff_s + "秒";
    contents_time.text(calcTime);
  }

  // 注文ボタンクリックでローカルの合計額と注文商品（現在選択中）をリセット
  $("#tableOrderButton").click(function () {
    localStorage.removeItem("sendTotal");
    localStorage.removeItem("sendProducts");
  });

  /* テーブルに顧客追加をするときの確定ボタンを押したときの処理 */
  if (TableCustomerAdd) {
    TableCustomerAdd.click(function () {
      const nameText = searchName.textContent;
      const tableText = searchTable.value;

      if (nameText !== "" && tableText !== "") {
        const customer_id = customersList.findIndex(({ name }) => name === nameText);

        // 顧客データの active: {created_at}が空のときだけ、追加できる。
        const created_at = customersList[customer_id]["active"]["created_at"];
        // console.log(created_at);

        if (!created_at) {
          // 顧客データの "active": {"created_at":""} のとき

          // 現在の時間を取得
          const now = new Date();
          const Y = now.getFullYear();
          const m = ("0" + (now.getMonth() + 1)).slice(-2);
          const d = ("0" + now.getDate()).slice(-2);
          const H = ("0" + now.getHours()).slice(-2);
          const i = ("0" + now.getMinutes()).slice(-2);
          const s = ("0" + now.getSeconds()).slice(-2);
          const nowTime = Y + "-" + m + "-" + d + " " + H + ":" + i + ":" + s;

          tablesList[tableText - 1]["customer_id"].push(customer_id);
          const updateTable = JSON.stringify(tablesList); // そのまま送ると空のデータが欠損してしまうので、JSON型にして送る
          customersList[customer_id]["active"]["created_at"] = nowTime;
          const updateCustomer = JSON.stringify(customersList); // そのまま送ると空のデータが欠損してしまうので、JSON型にして送る

          $.ajax({
            type: "POST", //POST送信
            url: "../api/update.php", //送信先のURL
            data: {
              newTables: updateTable,
              newCustomers: updateCustomer,
            }, //送信するデータを指定
          })
            .done(function (data) {
              //通信成功時の処理
              // console.log(data);
              alert(`${nameText} 様を${tableText} 卓に追加しました。`);
            })
            .fail(function () {
              //通信失敗時の処理
              alert("失敗");
            });
        } else {
          // 顧客データの "active": {"created_at":""} じゃないとき
          alert("その顧客は既に登録されています。");
        }
      } else {
        alert("顧客情報またはテーブル番号が空白です。");
      }
    });
  }
};
