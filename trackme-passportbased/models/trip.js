
var mongoose = require('mongoose');

module.exports = mongoose.model('Trip',{
	// id: String,
	username: String,
	name: String,
	markers: []
});