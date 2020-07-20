import { Application, Controller } from 'stimulus';
import { definitionsFromContext } from 'stimulus/webpack-helpers';
import platform from "./platform";

global.$ = global.jQuery = require('jquery');

require('popper.js');
require('bootstrap');
require('select2');

window.platform = platform();
window.application = Application.start();
window.Controller = Controller;

const context = require.context('./controllers', true, /\.js$/);
application.load(definitionsFromContext(context));

$(document).ready(function () {
    // Toggle the side navigation
    $("#sidebarToggle").on("click", function(e) {
        console.log('click');

        // e.preventDefault();
        $("body").toggleClass("sb-sidenav-toggled");
    });
});
