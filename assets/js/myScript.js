document.querySelector("#image").addEventListener("change", (e) => {
  e.preventDefault();
  const valueOfInput = URL.createObjectURL(e.target.files[0]);
  const output = document.querySelector(".img-fluid");
  output.src = valueOfInput;
});
