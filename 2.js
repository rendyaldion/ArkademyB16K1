// username check
if (usernameCheck('diandra'))
	alert('Username valid!');
else
	alert('Username not valid!');

// password check
if (passwordCheck('Kint4m@ni'))
	alert('Password valid!')
else
	alert('Password not valid!');

function usernameCheck(username) {
	var regex = /^[a-z]{5,7}$/;

	if (regex.test(username))
		return true; // jika password valid
	
	return false; // jika password tidak valid
}

function passwordCheck(password) {
	var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[@])[a-zA-Z0-9@]{9}$/;

	if (regex.test(password))
		return true; // jika password valid

	return false; // jika password tidak valid
}
