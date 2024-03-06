  // Get the toast element
  var myToastEl = document.getElementById('myToast');
  // Create a Bootstrap Toast instance
  var myToast = new bootstrap.Toast(myToastEl);
  // Get the button to trigger the toast
  var showToastBtn = document.getElementById('showToastBtn');
  // Add event listener to show the toast when the button is clicked
  showToastBtn.addEventListener('click', function() {
      myToast.show();
  });