function getReg() {
  var login = $('#login').val();
  var password = $('#password').val();
  var name = $('#name').val();
  var email = $('#email').val();
  var confirm_password = $('#confirm_password').val();
  $.ajax(
    {
    url: "registration.php",
    method: 'POST',
    timeout: 25000,
    data: {
      flogin: login,
      fpassword: password,
      fname: name,
      femail: email,
      fconfirm_password: confirm_password
    },
    success: function(json) {
    data2 = $.parseJSON(json);

    switch (data2) {
      case 1:
        alert("Успех");
        $('#erunique').hide();
        $('#erconfirm_password').hide();
        $('#erpassword').hide();
        $('#ername').hide();
        $('#erlogin').hide();
        $('#eremail').hide();
        break;

      case 2:
        alert("Различные пароли");
        $('#erunique').show();
        $('#erconfirm_password').hide();
        $('#erpassword').hide();
        $('#ername').hide();
        $('#erlogin').hide();
        $('#eremail').hide();
        break;

      case 3:
        alert("Проверьте данные на уникальность");
        $('#erlogin').show();
        $('#erconfirm_password').hide();
        $('#erpassword').hide();
        $('#ername').hide();
        $('#erunique').hide();
        $('#eremail').hide();
        break;

      case 4:
        alert("Проверьте верность введенного пароля");
        $('#erpassword').show();
        $('#erconfirm_password').hide();
        $('#ername').hide();
        $('#erlogin').hide();
        $('#erunique').hide();
        $('#eremail').hide();
        break;

      case 5:
        alert("Проверьте верность введенного имени");
        $('#ername').show();
        $('#erconfirm_password').hide();
        $('#erpassword').hide();
        $('#erlogin').hide();
        $('#erunique').hide();
        $('#eremail').hide();
        break;

      case 6:
        alert("Проверьте верность введенного логина");
        $('#erlogin').show();
        $('#erconfirm_password').hide();
        $('#erpassword').hide();
        $('#ername').hide();
        $('#erunique').hide();
        $('#eremail').hide();
        break;

        case 7:
          alert("Проверьте верность введенного email");
          $('#eremail').show();
          $('#erlogin').hide();
          $('#erconfirm_password').hide();
          $('#erpassword').hide();
          $('#ername').hide();
          $('#erunique').hide();
          break;

      default:
        break;
    }
    }
  })
}


function getAuth() {
  var name = $('#login').val();
  var rno = $('#password').val();
  let x = document.getElementById('stn');
  $.ajax({
url: "authorization.php",
method: 'POST',
timeout: 25000,
data: {
  fname: name,
  id: rno
},
success: function(json) {
data2 = $.parseJSON(json);
if (data2 == 1) {
  x.style.display = "none";
  $("#msg").html("Hello " + name + "<a href='logout.php' class='btn btn-lg btn-primary btn-block'>Logout</a>");
  $("#error").html(JSON.stringify(json));
} else {
  alert("Error");
}
}
})
}
