function initializedModal(modalID) {
  const modalElement = document.getElementById(modalID);
  return modalElement ? new bootstrap.Modal(modalElement) : null;
}

function showToastr(msg, type, duration) {
  if (typeof msg != "string" || typeof type != "string") {
    console.log("Sorry, only strings are allowed");
  }
  const time = duration ? duration : 3000;
  toastr[type](msg, "", {
    timeOut: time, // Set the duration to 2000 milliseconds (2 seconds)
  });
}
