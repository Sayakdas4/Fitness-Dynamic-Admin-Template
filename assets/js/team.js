$(document).ready(function(){
	var addTeamForm = $("#team");

	var validator = addTeamForm.validate({

		rules:{
			title :{ required : true },
			username :{ required : true },
			designation :{ required : true },
			education :{ required : true },
			image :{ required : true },
			about :{ required : true },
			certifications :{ required : true },
			industry_experience :{ required : true },
			clients_coached :{ required : true },
			current_location :{ required : true },
			fb_link :{ required : true },
			twitter_link :{ required : true },
			instagram_link :{ required : true },
			linkedin_link :{ required : true }
		},
		messages:{
			title :{ required : "The Title is required" },
			username :{ required : "The Username is required" },
			designation :{ required : "The Designation is required" },
			education :{ required : "The Education is required" },
			image :{ required : "The Image is required" },
			about :{ required : "The about is required" },
			certifications :{ required : "The Certifications is required" },
			industry_experience :{ required : "The Industry Experience is required" },
			clients_coached :{ required : "The Clients Coached is required" },
			current_location :{ required : "The Current Location is required" },
			fb_link :{ required : "The Dacebook Link is required" },
			twitter_link :{ required : "The Twitter Link is required" },
			instagram_link :{ required : "The Instagram Link is required" },
			linkedin_link :{ required : "The Linkedin Link is required" }
		}
	});

	// (function(module, __webpack_exports__, __webpack_require__) {

	// 	// "use strict";
	// 	__webpack_require__.r(__webpack_exports__);
	// 	/* harmony import */ var pristinejs__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! pristinejs */ "./node_modules/pristinejs/dist/pristine.js");
	// 	/* harmony import */ var pristinejs__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(pristinejs__WEBPACK_IMPORTED_MODULE_0__);
	// 	/* harmony import */ var toastify_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! toastify-js */ "./node_modules/toastify-js/src/toastify.js");
	// 	/* harmony import */ var toastify_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(toastify_js__WEBPACK_IMPORTED_MODULE_1__);

	// 	if (validator) {
	//      	toastify_js__WEBPACK_IMPORTED_MODULE_1___default()({
	// 	        text: "Registration success!",
	// 	        duration: 3000,
	// 	        newWindow: true,
	// 	        close: true,
	// 	        gravity: "bottom",
	// 	        position: "left",
	// 	        backgroundColor: "#91C714",
	// 	        stopOnFocus: true
	// 	     }).showToast();
	//     } else {
	//       	toastify_js__WEBPACK_IMPORTED_MODULE_1___default()({
	// 	        text: "Registration failed, please check the fileld form.",
	// 	        duration: 3000,
	// 	        newWindow: true,
	// 	        close: true,
	// 	        gravity: "bottom",
	// 	        position: "left",
	// 	        backgroundColor: "#D32929",
	// 	        stopOnFocus: true
	// 	    }).showToast();
	//     }
	// });
});