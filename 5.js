function groupNumber(str) {
	var str2 = str.replace(/[^a-zA-Z0-9]/g, '');
	var string = str2.split('');
	var result = '';

	if (string.length % 3 == 0) {
		for (let i = 0; i < string.length; i++) {
			result += string[i];
			if ((i + 1) % 3 == 0 && i != string.length - 1) {
				result += '-';
			}
		}
	} else {
		for (let i = 0; i < string.length; i++) {
			result += string[i];
			if ((i + 1) % 3 == 0 && (i + 1) != string.length - 2 && i != string.length - 2) {
				result += '-';
			} else if ((i + 1) == string.length - 2) {
				result += '-';
			}
		}
	}

	return result;
}

console.log(groupNumber('abjskd -a asks sm-232'));
alert(groupNumber('abjskd -a asks sm-232'));