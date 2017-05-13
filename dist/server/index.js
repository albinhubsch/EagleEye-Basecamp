"use strict";

exports.__esModule = true;
exports.Server = undefined;

var _express = require("express");

var _express2 = _interopRequireDefault(_express);

var _bodyParser = require("body-parser");

var _bodyParser2 = _interopRequireDefault(_bodyParser);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { "default": obj }; }

var Server = exports.Server = function Server() {

    var port = 5000;
    var server = (0, _express2["default"])();

    server.use(_bodyParser2["default"].urlencoded({ extended: false }));
    server.use(_bodyParser2["default"].json());

    server.get("/", function (req, res) {
        res.end("Boomchakalacka! we're live");
    });

    /**
     * Check if server is alive
     */
    server.get("/alive", function (req, res) {
        res.end("Ye, sure im alive");
    });

    // Start server
    server.listen(port);
};