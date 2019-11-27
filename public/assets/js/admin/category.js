"use strict";
var KTDatatablesDataSourceAjaxServer = function() {

	var initTable1 = function() {
		var table = $('#category_list');

		// begin first table
		table.DataTable({
			responsive: true,
			searchDelay: 500,
		});
	};

	return {

		//main function to initiate the module
		init: function() {
			initTable1();
		},

	};

}();

jQuery(document).ready(function() {
	KTDatatablesDataSourceAjaxServer.init();
	$("form.category_delete_form").css('display','inline')
});