var triangle = triangle(5);

if (triangle) {
	alert('Berhasil! cek di console hasilnya!');
	console.log(triangle);
} else {
	alert('Gagal! format tidak tepat!');
}

function triangle(number) {
	var regex = /^[0-9]$/;
	if (!regex.test(number)) {
		return false;
	}

	var result = '';
	for (var i = 0; i <= number; i++) {
        for (var j = 0; j < i; j++) {
            result += '#';
        }
        result += '\n';
    }

    return result;
}