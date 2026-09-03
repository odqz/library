// Show all/Hide buttons below directly below staff/characters title on manga show page
let mangaStaffBtn = document.querySelector(".manga-staff-btn");
let mangaCharBtn = document.querySelector(".manga-chars-btn");

// Gets called immediately so it starts off with extra rows of staff/chars hidden
change_list_display('staff', mangaStaffBtn);
change_list_display('char', mangaCharBtn);

mangaStaffBtn.addEventListener('click', () => { change_list_display('staff', mangaStaffBtn); });
mangaCharBtn.addEventListener('click', () => { change_list_display('char', mangaCharBtn); });

// Shows or hides all rows aside from first depending on wether user is currently showing or hiding
function change_list_display(list_name, btn) {
  let n = 0;

  document.querySelectorAll(`.${list_name}`).forEach((element) => {
    n > 7 ? element.classList.toggle('hidden') : n += 1;
  });

  btn.textContent = btn.textContent == "show all" ? "hide" : "show all";
}