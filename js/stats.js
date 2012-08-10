var Stats = {
	ViewModel: null,
	init: function() {
		$.getJSON('backend/tribunal.php', function(data) {
			this.afterLoad(data);
		}.bind(this));
	},
	afterLoad: function(data) {
		this.ViewModel = {
			champions: data.reported_champions,
			reasons: data.report_reasons
		}

		ko.applyBindings(this.ViewModel);
	}
}

$().ready(function() {
	Stats.init();
});