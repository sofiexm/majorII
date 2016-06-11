(() => {

const parse = data => {
	
console.log(parse);
	let $title = document.createElement('h1');
	data.foreach(trucks => {
		console.log(trucks.title);
	})

	}
}


const init = () =>{
	fetch('../assets/JSON/karishma.json')
	.then(result => result.json())
	.then(parse);

};

}

init();

})();