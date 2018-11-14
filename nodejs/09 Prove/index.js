const express = require('express')
const path = require('path')
const PORT = process.env.PORT || 444
var mailtype = "";
var price = 0;
function calculateRate(req) {
var weight = +(req.query.weight);
var mailtype = req.query.mailtype;
var result;
switch(mailtype) {
case "Letters (Stamped)":
result = "Letters (Stamped)";
	if(weight < 3.6 && weight > 0) {
		if(weight < 3.6 && weight > 3.0)
			price = 1.13
		else if	(weight < 3.5 && weight > 2.0)
			price = 0.92
		else if(weight < 3.0 && weight > 1.0)
			price = 0.71
		else if(weight < 2.0 && weight > 0)
			price = 0.50
	} else {
		price = 'N/A';
		result = "Package is either over max weight or under min weight.";
	}
break;
case "Letters (Metered)":
result = "Letters (Metered)";
	if(weight < 3.6 && weight > 0) {
		if(weight < 3.6 && weight > 3.0)
			price = 1.10
		else if	(weight < 3.5 && weight > 2.0)
			price = 0.89
		else if(weight < 3.0 && weight > 1.0)
			price = 0.68
		else if(weight < 2.0 && weight > 0)
			price = 0.47
	} else {
		price = 'N/A';
		result = "Package is either over max weight or under min weight.";
	}
break;
case "Large Envelopes (Flats)":
result = "Large Envelopes (Flats)";
	if(weight < 14 && weight > 0) {
		if(weight <= 13 && weight > 12)
			price = 3.52;
		else if	(weight <= 12 && weight > 11)
			price = 3.31;
		else if(weight <= 11 && weight > 10)
			price = 3.10;
		else if(weight <= 10 && weight > 9)
			price = 2.89;
		else if(weight <= 9 && weight > 8)
			price = 2.68;
		else if(weight <= 8 && weight > 7)
			price = 2.47;
		else if(weight <= 7 && weight > 6)
			price = 2.26;
		else if(weight <= 6 && weight > 5)
			price = 2.05;
		else if(weight <= 5 && weight > 4)
			price = 1.84;
		else if(weight <= 4 && weight > 3)
			price = 1.63;
		else if(weight <= 3 && weight > 2)
			price = 1.42;
		else if(weight <= 2 && weight > 1)
			price = 1.21;
		else if(weight <= 1 && weight > 0)
			price = 1.00;
	} else {
		price = 'N/A';
		result = "Package is either over max weight or under min weight.";		
	}
break;
case "First-Class Package Service—Retail":
result = "First-Class Package Service—Retail";
	if(weight < 14 && weight > 0) {
		if(weight <= 13 && weight > 12)
			price = 5.50;
		else if	(weight <= 12 && weight > 11)
			price = 5.15;
		else if(weight <= 11 && weight > 10)
			price = 4.80;
		else if(weight <= 10 && weight > 9)
			price = 4.45;
		else if(weight <= 9 && weight > 8)
			price = 4.10;
		else if(weight <= 8 && weight > 7)
			price = 3.75;
		else if(weight <= 7 && weight > 6)
			price = 3.75;
		else if(weight <= 6 && weight > 5)
			price = 3.75;
		else if(weight <= 5 && weight > 4)
			price = 3.75;
		else if(weight <= 4 && weight > 3)
			price = 3.50;
		else if(weight <= 3 && weight > 2)
			price = 3.50;
		else if(weight <= 2 && weight > 1)
			price = 3.50;
		else if(weight <= 1 && weight > 0)
			price = 3.50;
	} else {
		price = 'N/A';
		result = "Package is either over max weight or under min weight.";		
	}
break;
	}
	return result;
}
express()
  .use(express.static(path.join(__dirname, 'public')))
  .set('views', path.join(__dirname, 'views'))
  .set('view engine', 'ejs')
  .get('/', (req, res) => res.render('pages/index'))
  .get('/getRate', (req, res) => res.render('pages/postal'))
  .get('/postal', (req, res) => {
	var result = calculateRate(req)
  res.render('pages/response',{result:result,price:price})	
  }).listen(PORT, () => console.log(`Listening on ${ PORT }`))
