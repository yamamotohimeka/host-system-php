// playerの処理
export const Player = () => {
  const playerStatusSelect = document.getElementsByClassName("playerStatusSelect");

  for (let i = 0; i < playerStatusSelect.length; i++) {
    playerStatusSelect[i].addEventListener("click", () => {
      for (let j = 0; j < playerStatusSelect.length; j++) {
        playerStatusSelect[j].classList.remove("selected");
      }
      playerStatusSelect[i].classList.add("selected");
    });
  }
};
