function biodata(string, angka) {
	var bio = {
		name : string,
		age : angka,
		address : 'Link. Ngambak RT.02 RW.05 Beru, Kec. Wlingi, Kab. Blitar, Jawa Timur 66184',
		hobbies : ['Basket', 'Berjualan', 'Photography', 'Pencak Silat', 'Berpetualang'],
		is_married : false,
		list_school : [
			{
				name : 'SDN Beru 01',
				year_in : 2008,
				year_out : 2014,
				major : null
			}, {
				name : 'SMPN 1 Wlingi',
				year_in : 2014,
				year_out : 2017,
				major : null
			}, {
				name : 'SMK PGRI Wlingi',
				year_in : 2017,
				year_out : 2020,
				major : null
			}
		],
		skills : [
			{
				skill_name : 'PHP',
				level : 'expert',
			}, {
				skill_name : 'MySQL',
				level : 'advanced'
			}, {
				skill_name : 'Javascript',
				level : 'advanced'
			}, {
				skill_name : 'Java',
				level : 'beginner',
			}, {
				skill_name : 'Laravel Framework',
				level : 'advanced'
			}, {
				skill_name : 'Codeigniter Framework',
				level : 'advanced'
			}, {
				skill_name : 'CSS',
				level : 'advanced'
			}, {
				skill_name : 'Microsoft Office',
				level : 'advanced'
			}
		],
		interest_in_coding : true
	}

	return JSON.stringify(bio);
}

console.log(biodata('Rendy Aldion', 18));