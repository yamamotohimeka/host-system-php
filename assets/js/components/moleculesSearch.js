// searchの処理
export const Search = () => {
  const searchInput = document.getElementById("searchInput");
  const searchButton = document.getElementById("searchButton");
  const searchList = document.getElementById("searchList");
  const searchName = document.getElementById("searchName");
  const searchTable = document.getElementById("searchTable");
  const searchAddButton = document.getElementById("searchAddButton");
  const playerPage = document.getElementById("playerPage");
  const playerDetail = document.getElementById("playerDetail");
  const playerDetailItems = [];

  // playerDetailページの処理
  if (playerDetail) {
    customersList.map((value) => {
      // playerDetailのplayerのidを1に変更
      if (value.player_id === 1) {
        playerDetailItems.push(value);
      }
    });
    for (let i = 0; i < playerDetailItems.length; i++) {
      const li = document.createElement("li");
      const p = document.createElement("p");
      const text = document.createTextNode(`${playerDetailItems[i].name} 様`);
      p.appendChild(text);
      li.appendChild(p);
      searchList.appendChild(li);
    }
  }

  const searchCheckFunc = (e) => {
    searchList.innerHTML = "";
    const searchFilter = e.toUpperCase();
    const resultItems = [];

    if (playerPage) {
      for (let i = 0; i < playersList.length; i++) {
        if (playersList[i].genname.toUpperCase().indexOf(searchFilter) > -1) {
          const li = document.createElement("li");
          const p1 = document.createElement("p");
          const p2 = document.createElement("p");
          const div1 = document.createElement("div");
          const div2 = document.createElement("div");
          const button = document.createElement("button");
          const text1 = document.createTextNode(`${playersList[i].genname}`);
          const text3 = document.createTextNode("選択");
          div1.classList.add("searchListText");
          li.appendChild(div1);
          p1.appendChild(text1);
          div1.appendChild(p1);
          button.appendChild(text3);
          button.classList.add("searchItemButton");
          div2.classList.add("inputButton");
          div2.appendChild(button);
          li.appendChild(div2);
          searchList.appendChild(li);
          resultItems.push(playersList[i].genname);
        }
      }
    } else if (playerDetail) {
      for (let i = 0; i < playerDetailItems.length; i++) {
        if (playerDetailItems[i].name.toUpperCase().indexOf(searchFilter) > -1) {
          const li = document.createElement("li");
          const p = document.createElement("p");
          const text = document.createTextNode(`${playerDetailItems[i].name} 様`);
          p.appendChild(text);
          li.appendChild(p);
          searchList.appendChild(li);
        }
      }
    } else {
      for (let i = 0; i < customersList.length; i++) {
        if (customersList[i].name.toUpperCase().indexOf(searchFilter) > -1) {
          const li = document.createElement("li");
          const p1 = document.createElement("p");
          const p2 = document.createElement("p");
          const div1 = document.createElement("div");
          const div2 = document.createElement("div");
          const button = document.createElement("button");
          const text1 = document.createTextNode(`${customersList[i].name} 様`);
          const text2 = document.createTextNode(`担当: ${playersList[customersList[i].player_id].genname}`);
          const text3 = document.createTextNode("選択");
          div1.classList.add("searchListText");
          li.appendChild(div1);
          p1.appendChild(text1);
          p2.appendChild(text2);
          div1.appendChild(p1);
          div1.appendChild(p2);
          button.appendChild(text3);
          button.classList.add("searchItemButton");
          div2.classList.add("inputButton");
          div2.appendChild(button);
          li.appendChild(div2);
          searchList.appendChild(li);
          resultItems.push(customersList[i].name);
        }
      }
    }
    if (searchList.innerHTML === "") {
      const li = document.createElement("li");
      const text = document.createTextNode(`「${e}」の検索結果はありません。`);
      li.appendChild(text);
      searchList.appendChild(li);
    }

    const searchItemButton = document.getElementsByClassName("searchItemButton");
    for (let i = 0; i < searchItemButton.length; i++) {
      searchItemButton[i].addEventListener("click", () => {
        searchName.innerText = resultItems[i];
      });
    }
  };

  if (searchButton) {
    searchButton.addEventListener("click", () => {
      searchCheckFunc(searchInput.value);
    });
  }
};
