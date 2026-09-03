// Show all/Hide buttons below directly below staff/characters title on anime show page
let animeStaffBtn = document.querySelector('.anime-staff-btn');
let animeCharBtn = document.querySelector('.anime-chars-btn');

// Gets called immediately so it starts off with extra rows of staff/chars hidden
change_list_display('staff', animeStaffBtn);
change_list_display('char', animeCharBtn);

animeStaffBtn.addEventListener('click', () => { change_list_display('staff', animeStaffBtn); });
animeCharBtn.addEventListener('click', () => { change_list_display('char', animeCharBtn); });

// Shows or hides all rows aside from first depending on wether user is currently showing or hiding
function change_list_display(list_name, btn) {
  let n = 0;

  document.querySelectorAll(`.${list_name}`).forEach((element) => {
    n > 7 ? element.classList.toggle('hidden') : n += 1;
  });

  btn.textContent = btn.textContent == "show all" ? "hide" : "show all";
}