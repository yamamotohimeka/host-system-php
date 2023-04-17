// orderの処理
export const Order = () => {
  const orderCatItem = document.getElementsByClassName("orderCatItem");
  const orderCatCategory = document.getElementsByClassName("orderCatCategory");
  const orderCatName = document.getElementsByClassName("orderCatName");
  const orderCatPrice = document.getElementsByClassName("orderCatPrice");
  const orderCatQuantity = document.getElementsByClassName("orderCatQuantity");
  const orderCatMinus = document.getElementsByClassName("orderCatMinus");
  const orderCatPlus = document.getElementsByClassName("orderCatPlus");
  const orderCatTotal = document.getElementById("orderCatTotal");
  const orderCatNext = document.getElementById("orderCatNext");
  const orderCatContents = document.getElementById("orderCatContents");
  const orderAddContents = document.getElementById("orderAddContents");
  const orderAddTotal = document.getElementById("orderAddTotal");
  const orderAddRegister = document.getElementById("orderAddRegister");
  const orderCustomer = document.getElementById("orderCustomer");
  let total = 0;

  // カテゴリーチェック
  const orderCategoryCheck = (value) => {
    for (let i = 0; i < orderCatItem.length; i++) {
      const itemCategory = orderCatItem[i].className.replace(/orderCatItem|none| /g, "");
      if (itemCategory == value) {
        orderCatItem[i].classList.remove("none");
      } else {
        orderCatItem[i].classList.add("none");
      }
    }
  };

  // 数量のプラス, マイナス処理
  const orderQuantityHandle = (value, i) => {
    const itemInnerQuantity = orderCatQuantity[i].value;
    let itemQuantity = Number(itemInnerQuantity);
    if (value === "minus" && itemQuantity > 0) {
      itemQuantity = itemQuantity - 1;
    }
    if (value === "plus") {
      itemQuantity = itemQuantity + 1;
    }
    orderCatQuantity[i].value = itemQuantity;
  };

  // トータル計算処理
  const orderTotalCalc = () => {
    const priceArray = [];
    const quantityArray = [];
    total = 0;
    for (var i = 0; i < orderCatPrice.length; i++) {
      const itemInnerPrice = orderCatPrice[i].innerText;
      const itemInnerQuantity = orderCatQuantity[i].value;
      const itemPrice = Number(itemInnerPrice.replace(/,| 円/g, ""));
      const itemQuantity = Number(itemInnerQuantity);
      priceArray.push(itemPrice);
      quantityArray.push(itemQuantity);
      total += priceArray[i] * quantityArray[i];
    }
    const totalText = `${total.toLocaleString()} 円`;
    orderCatTotal.textContent = totalText;
  };

  // オーダーボタンクリック時処理
  const orderClickNext = () => {
    // ローカルストレージ のsendTotalとsendProductsを空にする
    localStorage.removeItem("sendTotal");
    localStorage.removeItem("sendProducts");

    // 注文情報 を sendProducts としてローカルストレージに保存
    const sendProducts = [];
    sendProducts.length = 0;
    for (let i = 0; i < orderCatItem.length; i++) {
      if (orderCatQuantity[i].value > 0) {
        sendProducts.push({
          name: orderCatName[i].innerText.replace(/\n| /g, ""),
          price: Number(orderCatPrice[i].innerText.replace(/,| 円/g, "")),
          quantity: Number(orderCatQuantity[i].value),
        });
      }
    }

    // 注文が1件以上ある場合はローカルストレージに保存する
    if (sendProducts.length > 0) {
      // ローカルストレージに sendTotal: 合計値 を保存する
      localStorage.setItem("sendTotal", orderCatTotal.innerText.replace(/,| 円/g, "").toLocaleString());
      // ローカルストレージに sendProducts: 値 を保存する（値は、並列を文字列にした状態で格納する）
      localStorage.setItem("sendProducts", JSON.stringify(sendProducts));
      // POST遷移
      $("#post").submit();
    } else {
      orderCatNext.setAttribute("href", "");
      alert(`商品が選択されていません。`);
    }
  };

  // 決定ボタンクリック時処理
  const orderAddFunc = () => {
    /* ローカルストレージから注文情報を取得する */
    const sendTotal = localStorage.getItem("sendTotal");
    let sendProducts = JSON.parse(localStorage.getItem("sendProducts"));
    // console.log(sendTotal);
    // console.log(sendProducts);

    /* 顧客IDを取得 */
    const customerId = orderCustomer.getAttribute("data-customerId");

    /* 注文情報を全てcustomerListに格納する */
    for (let value of sendProducts) {
      const productName = value.name; // 商品名
      const productsId = productsList.findIndex((products) => products.name === productName); //商品ID
      const quantity = value.quantity; // 注文数
      // 必要なデータを連想配列にする
      let addProduct = {
        product_id: productsId,
        quantity: quantity,
      };
      // 配列に格納
      customersList[customerId]["active"]["orders"].push(addProduct);
    }
    // customer.json にデータを書き込む
    const pastTotal = customersList[customerId]["active"]["total"].replace(",", "");

    const pastTotal_int = Number(pastTotal.replace(",", ""));
    const sendTotal_int = Number(sendTotal.replace(",", ""));
    // console.log(pastTotal_int);
    // console.log(sendTotal_int);

    let updateTotal = pastTotal_int + sendTotal_int;

    customersList[customerId]["active"]["total"] = updateTotal.toLocaleString();
    // console.log(customersList);

    // JSONデータを上書きする
    const update = JSON.stringify(customersList); // そのまま送ると空のデータが欠損してしまうので、JSON型にして送る

    $.ajax({
      type: "POST", //POST送信
      url: "update.php", //送信先のURL
      data: { newCustomers: update }, //送信するデータを指定
    })
      .done(function (data) {
        //通信成功時の処理
        // console.log(data);
        // ローカルストレージの sendTotal: 合計値 を空にする
        localStorage.removeItem("sendTotal");
        // ローカルストレージの sendProducts: 値 を空にする
        localStorage.removeItem("sendProducts");
        alert(`注文を確定しました。`);
      })
      .fail(function () {
        //通信失敗時の処理
        alert("失敗");
      });
  };

  // カテゴリーチェック呼び出し
  for (let i = 0; i < orderCatCategory.length; i++) {
    orderCatCategory[i].addEventListener("click", () => {
      const category = orderCatCategory[i].className.replace("orderCatCategory ", "");
      orderCategoryCheck(category);
    });
  }

  // 数量のプラス, マイナス ・ トータル計算処理呼び出し
  for (let i = 0; i < orderCatQuantity.length; i++) {
    orderCatMinus[i].addEventListener("click", () => {
      orderQuantityHandle("minus", i);
      orderTotalCalc();
    });
    orderCatPlus[i].addEventListener("click", () => {
      orderQuantityHandle("plus", i);
      orderTotalCalc();
    });
    orderCatQuantity[i].addEventListener("input", orderTotalCalc);
  }

  // オーダーボタンクリック時処理呼び出し
  if (orderCatNext) {
    orderCatNext.addEventListener("click", () => {
      orderClickNext();
    });
  }

  if (orderAddRegister) {
    orderAddRegister.addEventListener("click", () => {
      orderAddFunc();
    });
  }

  // オーダー確認ページ表示
  if (orderAddContents) {
    const receiveProducts = JSON.parse(localStorage.getItem("sendProducts"));
    const receiveTotal = localStorage.getItem("sendTotal");
    receiveProducts.map((value) => {
      const li = document.createElement("li");
      const h3 = document.createElement("h3");
      const p2 = document.createElement("p");
      const div = document.createElement("div");
      const p3 = document.createElement("p");
      const p4 = document.createElement("p");
      const text1 = document.createTextNode(value.name);
      const text2 = document.createTextNode(`数量: ${value.quantity}`);
      const text3 = document.createTextNode(`単価: ${value.price.toLocaleString()} 円`);
      const text4 = document.createTextNode(`合計: ${(value.price * value.quantity).toLocaleString()} 円`);
      h3.appendChild(text1);
      p2.appendChild(text2);
      p3.appendChild(text3);
      p4.appendChild(text4);
      li.appendChild(h3);
      li.appendChild(p2);
      li.appendChild(div);
      div.appendChild(p3);
      div.appendChild(p4);
      orderAddContents.appendChild(li);
    });
    const totalText = document.createTextNode(`${receiveTotal} 円`);
    orderAddTotal.appendChild(totalText);
  }

  // オーダー注文ページ表示
  if (orderCatContents) {
    const receiveProducts = JSON.parse(localStorage.getItem("sendProducts"));
    const receiveTotal = localStorage.getItem("sendTotal");
    console.log(receiveProducts);
    if (receiveTotal) {
      receiveProducts.map((value) => {
        const li = $("li[data-productName='" + value.name + "']");
        const quantity = li.find(".orderCatQuantity");
        quantity.val(value.quantity);
      });
      const totalText = receiveTotal + " 円";
      orderCatTotal.textContent = totalText;
    }
  }

  $("#Pay").click(function () {
    let confirmForm = $("#Pay_confirm");
    confirmForm.addClass("active");
  });

  $("#Confirm_cancel").on("click", function () {
    $("#Pay_confirm").removeClass("active");
  });

  $("#Pay_confirm").on("submit", function (event) {
    event.preventDefault();

    /* テーブルIDを取得 */
    const tableId = orderCustomer.getAttribute("data-tableId");
    /* 顧客IDを取得 */
    const customerId = orderCustomer.getAttribute("data-customerId");

    customersList[customerId]["active"]["total"] = "";
    customersList[customerId]["active"]["orders"] = [];
    customersList[customerId]["active"]["created_at"] = "";

    tablesList[tableId]["customer_id"] = tablesList[tableId]["customer_id"].filter((customer) => customer != customerId);

    // JSONデータを上書きする
    const updateCustomer = JSON.stringify(customersList); // そのまま送ると空のデータが欠損してしまうので、JSON型にして送る
    const updateTable = JSON.stringify(tablesList); // そのまま送ると空のデータが欠損してしまうので、JSON型にして送る

    $.ajax({
      type: "POST", //POST送信
      url: "../api/update.php", //送信先のURL
      data: {
        newCustomers: updateCustomer,
        newTables: updateTable,
      }, //送信するデータを指定
    })
      .done(function (data) {
        //通信成功時の処理
        // console.log(data);
        alert("会計完了");
        location.href = "../table/";
      })
      .fail(function () {
        //通信失敗時の処理
        alert("会計失敗");
      });
  });
};
