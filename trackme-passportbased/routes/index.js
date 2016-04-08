var express = require('express');
var router = express.Router();


var Trip = require('../models/trip.js');

var isAuthenticated = function (req, res, next) {
	// if user is authenticated in the session, call the next() to call the next request handler 
	// Passport adds this method to request object. A middleware is allowed to add properties to
	// request and response objects
	if (req.isAuthenticated())
		return next();
	// if the user is not authenticated then redirect him to the login page
	res.redirect('/');
}

module.exports = function(passport){

	/* GET login page. */
	router.get('/', function(req, res) {
    	// Display the Login page with any flash message, if any
		res.render('index', { message: req.flash('message') });
	});

	/* Handle Login POST */
	router.post('/login', passport.authenticate('login', {
		successRedirect: '/myaccount',
		failureRedirect: '/',
		failureFlash : true  
	}));

	/* GET Registration Page */
	router.get('/signup', function(req, res){
		res.render('register',{message: req.flash('message')});
	});

	/* Handle Registration POST */
	router.post('/signup', passport.authenticate('signup', {
		successRedirect: '/myaccount',
		failureRedirect: '/signup',
		failureFlash : true  
	}));

	/* GET account Page */
	router.get('/myaccount', isAuthenticated, function(req, res){

		var trips;
		var alltrips = Trip.find( {username:req.user.username}, function(err, docs) {
			if (docs) {
				console.log(docs)
				console.log(req.user)
				res.render('myaccount', { user: req.user, trips: docs });
			}
		});
		// console.log(trips)



		// console.log(trips)
		// res.render('myaccount', { user: req.user });
	});

	/* Handle Logout */
	router.get('/signout', function(req, res) {
		req.logout();
		res.redirect('/');
	});

	return router;
}





