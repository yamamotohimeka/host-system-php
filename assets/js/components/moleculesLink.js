// 編集・詳細ページ移動の処理
export const Link = () => {
  const searchName = document.getElementById("searchName");
  const customerEditLink = document.getElementById("customerEditLink");
  const playerEditLink = document.getElementById("playerEditLink");
  const playerDetailLink = document.getElementById("playerDetailLink");

  //詳細表示へページ移動
  const customerDetailLinkHandle = (value) => {
    const selectedName = searchName.innerHTML;
    let selectedId;

    if (customerEditLink === value) {
      for (let i = 0; i < customersList.length; i++) {
        if (customersList[i].name === selectedName) {
          selectedId = i;
        }
      }
      if (selectedId !== undefined) {
        const locateUrl = new URL(
          `${window.location.href}edit?customer=${selectedId}`
        );
        window.location.href = locateUrl;
      }
    } else if (playerEditLink === value) {
      for (let i = 0; i < playersList.length; i++) {
        if (playersList[i].genname === selectedName) {
          selectedId = i;
        }
      }
      if (selectedId !== undefined) {
        const locateUrl = new URL(
          `${window.location.href}edit?player=${selectedId}`
        );
        window.location.href = locateUrl;
      }
    } else if (playerDetailLink === value) {
      for (let i = 0; i < playersList.length; i++) {
        if (playersList[i].genname === selectedName) {
          selectedId = i;
        }
      }
      if (selectedId !== undefined) {
        const locateUrl = new URL(
          `${window.location.href}detail?player=${selectedId}`
        );
        window.location.href = locateUrl;
      }
    } else {
      return;
    }
  };

  //カスタマー編集ページ移動呼び出し
  if (customerEditLink) {
    customerEditLink.addEventListener("click", () => {
      customerDetailLinkHandle(customerEditLink);
    });
  }

  //プレイヤー編集ページ移動呼び出し
  if (playerEditLink) {
    playerEditLink.addEventListener("click", () => {
      customerDetailLinkHandle(playerEditLink);
    });
  }

  //プレイヤー詳細ページ移動呼び出し
  if (playerDetailLink) {
    playerDetailLink.addEventListener("click", () => {
      customerDetailLinkHandle(playerDetailLink);
    });
  }
};
