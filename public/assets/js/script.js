
  document.getElementById("updateBtn").onclick = function () {
    let inputs = document.querySelectorAll("#profileForm input");
    inputs.forEach((input) => (input.disabled = false));

    document.getElementById("saveBtn").style.display = "inline-block";
    document.getElementById("updateBtn").style.display = "none";
  };

