import 'whatwg-fetch'

// https://moduleair.fr/devices/API/nebulo_lastMeasure.php

let Nebulodata = {
    
    getData: async function (URL) {
         
    console.log(URL);
    
    return fetch(URL)
			.then((resp) => resp.json())
			.then((json) => {
        console.log('successful retrieved data');    
        return json;
    })
}
}

export default Nebulodata
