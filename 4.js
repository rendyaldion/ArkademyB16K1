var longest = longest("Halo Arkademian!");
console.log("Kata terpanjang adalah: " + longest);
alert("Kata terpanjang adalah: " + longest);

function longest(string) {
	var str = string.replace(/[^\w\s]/g, ''); // menghapus simbol pada kalimat
    var splitStr = str.split(" ");
    var longest = 0;
    var word = null;

    for (var i = 0; i < splitStr.length; i++) {
        if (longest < splitStr[i].length) {
            longest = splitStr[i].length;
            word = splitStr[i];
        }
    }

    return word;
}