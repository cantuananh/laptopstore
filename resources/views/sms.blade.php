<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        Firebase Phone Number Auth
    </title>
</head>
<body>
<form>
    <input type="text" id="phone" value="+84343417170">
    <input type="text" id="verificationcode" value="enter verification">
    <input type="button" value="Submit" onclick="myFunction()">
    <div id="recaptcha-container"></div>
</form>
<div id="recaptcha-container"></div>
<script src="https://www.gstatic.com/firebasejs/ui/4.5.0/firebase-ui-auth.js"></script>
<link type="text/css" rel="stylesheet" href="https://www.gstatic.com/firebasejs/ui/4.5.0/firebase-ui-auth.css" />
<script src="https://www.gstatic.com/firebasejs/4.8.1/firebase.js"></script>
<script src="https://www.gstatic.com/firebasejs/ui/4.5.0/firebase-ui-auth.js"></script>
<link type="text/css" rel="stylesheet" href="https://www.gstatic.com/firebasejs/ui/4.5.0/firebase-ui-auth.css" />
<script type="text/javascript">
    var config = {
        apiKey: "AIzaSyCZKNowbet0V4rE51FTMlRQH4NcV-1rJjI",
        authDomain: "envent-payment.firebaseapp.com",
        databaseURL: "https://envent-payment.firebaseio.com",
        projectId: "envent-payment",
        storageBucket: "envent-payment.appspot.com",
        messagingSenderId: "945729548867",
        appId: "1:945729548867:web:f971fc748c9df09b18daf6",
        measurementId: "G-H1K6T1H1BY"
    };
    firebase.initializeApp(config);
</script>
<script>
    var testVerificationCode = "654321";
    var appVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
    var number = document.getElementById('phone').value;

    firebase.auth().signInWithPhoneNumber(number, appVerifier )
        .then(function (confirmationResult) {
            alert('success');
            return confirmationResult.confirm(testVerificationCode)
        }).catch(function (error) {
        console.error('Error during signInWithPhoneNumber', error);
        window.alert('Error during signInWithPhoneNumber:\n\n'
            + error.code + '\n\n' + error.message);
    });

    var myFunction = function () {
        window.confirmationResult.confirm(document.getElementById("verificationcode").value)
            .then(function (result) {
                alert('login process successfull!\n redirecting');
                alert('<a href="javascript:alert(\'hi\');">alert</a>')
                window.location.href = "details.html";
            }, function (error) {
                alert(error);
            });
    };

</script>
</body>
</html>
