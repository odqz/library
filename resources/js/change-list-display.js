let staffBtn = document.querySelector('.staff-btn');
let charBtn = document.querySelector('.chars-btn');

// Gets called immediately so it starts off with extra rows of staff/chars hidden
change_list_display('staff', staffBtn);
change_list_display('char', charBtn);

staffBtn.addEventListener('click', () => { change_list_display('staff', staffBtn); });
charBtn.addEventListener('click', () => { change_list_display('char', charBtn); });

// Shows or hides all rows aside from first depending on wether user is currently showing or hiding
function change_list_display(list_name, btn) {
  let n = 0;

  document.querySelectorAll(`.${list_name}`).forEach((element) => {
    n > 7 ? element.classList.toggle('hidden') : n += 1;
  });

  btn.textContent = btn.textContent == "show all" ? "hide" : "show all";
}